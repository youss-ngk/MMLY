<?php

namespace App\Http\Controllers;

use App\Models\CardReport;
use App\Models\Region;
use App\Models\Province;
use App\Models\Member;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $regions = Region::all();

        // Get members query based on filters
        $membersQuery = Member::query();
        
        if ($request->filled('region_id')) {
            $membersQuery->where('region_id', $request->region_id);
        }
        if ($request->filled('province_id')) {
            $membersQuery->where('province_id', $request->province_id);
        }
        if ($request->filled('academic_year')) {
            $membersQuery->where('academic_year', $request->academic_year);
        }

        // Calculate totals from members
        $totalCards = $membersQuery->count();
        $totalAmount = $totalCards * 100; // 100 MAD per card

        // Calculate shares
        $officeShare = $totalAmount * 0.5;  // 50%
        $regionShare = $totalAmount * 0.2;  // 20%
        $provinceShare = $totalAmount * 0.3; // 30%

        // Get payments from incomes
        $incomesQuery = Income::where('type', 'card');
        if ($request->filled('region_id')) {
            $incomesQuery->where('region_id', $request->region_id);
        }
        if ($request->filled('province_id')) {
            $incomesQuery->where('province_id', $request->province_id);
        }

        // Group members by region and province
        $reports = $membersQuery->select(
            'region_id',
            'province_id',
            'academic_year',
            DB::raw('COUNT(*) as card_count'),
            DB::raw('COUNT(*) * 100 as total_amount'),
            DB::raw('COUNT(*) * 100 * 0.5 as office_share'),
            DB::raw('COUNT(*) * 100 * 0.2 as region_share'),
            DB::raw('COUNT(*) * 100 * 0.3 as province_share')
        )
        ->with(['region', 'province'])
        ->groupBy('region_id', 'province_id', 'academic_year')
        ->paginate(10);

        // Try to get academic years from incomes first
        $academicYears = Income::where('type', 'card')
            ->select('academic_year')
            ->distinct()
            ->orderBy('academic_year', 'desc')
            ->pluck('academic_year');

        // If no academic years found in incomes, get from members
        if ($academicYears->isEmpty()) {
            $academicYears = Member::select('academic_year')
                ->distinct()
                ->orderBy('academic_year', 'desc')
                ->pluck('academic_year');
        }

        $totals = (object)[
            'total_cards' => $totalCards,
            'total_amount' => $totalAmount,
            'total_office_share' => $officeShare,
            'total_region_share' => $regionShare,
            'total_province_share' => $provinceShare
        ];

        return view('admin.card-reports.index', compact(
            'reports',
            'regions',
            'academicYears',
            'totals'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.card-reports.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'academic_year' => 'required|string',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.card-reports.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // Get member count for the specified region and province
            $membersCount = Member::where([
                'region_id' => $request->region_id,
                'province_id' => $request->province_id,
                'academic_year' => $request->academic_year
            ])->count();

            // Calculate amounts
            $cardPrice = 100; // 100 MAD per card
            $totalAmount = $membersCount * $cardPrice;
            $officeShare = $totalAmount * 0.5; // 50%
            $regionShare = $totalAmount * 0.2; // 20%
            $provinceShare = $totalAmount * 0.3; // 30%

            // Create card report
            $cardReport = CardReport::create([
                'academic_year' => $request->academic_year,
                'region_id' => $request->region_id,
                'province_id' => $request->province_id,
                'card_count' => $membersCount,
                'total_amount' => $totalAmount,
                'paid_amount' => 0,
                'remaining_amount' => $totalAmount,
                'office_share' => $officeShare,
                'region_share' => $regionShare,
                'province_share' => $provinceShare,
                'notes' => $request->notes
            ]);

            // Create income record for the cards
            Income::create([
                'type' => 'cards',
                'description' => __('Card payment for :year - :region - :province', [
                    'year' => $request->academic_year,
                    'region' => $cardReport->region->name_fr,
                    'province' => $cardReport->province->name_fr
                ]),
                'date' => now(),
                'academic_year' => $request->academic_year,
                'region_id' => $request->region_id,
                'province_id' => $request->province_id,
                'amount' => $totalAmount,
                'notes' => $request->notes
            ]);

            DB::commit();

            return redirect()
                ->route('admin.card-reports.index')
                ->with('success', __('Card Report created successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('admin.card-reports.create')
                ->with('error', __('An error occurred while creating the card report'))
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CardReport $cardReport)
    {
        $regions = Region::all();
        return view('admin.card-reports.edit', compact('cardReport', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CardReport $cardReport)
    {
        $validator = Validator::make($request->all(), [
            'academic_year' => 'required|string',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.card-reports.edit', $cardReport)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // Get member count for the specified region and province
            $membersCount = Member::where([
                'region_id' => $request->region_id,
                'province_id' => $request->province_id,
                'academic_year' => $request->academic_year
            ])->count();

            // Calculate amounts
            $cardPrice = 100; // 100 MAD per card
            $totalAmount = $membersCount * $cardPrice;
            $officeShare = $totalAmount * 0.5; // 50%
            $regionShare = $totalAmount * 0.2; // 20%
            $provinceShare = $totalAmount * 0.3; // 30%

            // Update card report
            $cardReport->update([
                'academic_year' => $request->academic_year,
                'region_id' => $request->region_id,
                'province_id' => $request->province_id,
                'card_count' => $membersCount,
                'total_amount' => $totalAmount,
                'remaining_amount' => $totalAmount - $cardReport->paid_amount,
                'office_share' => $officeShare,
                'region_share' => $regionShare,
                'province_share' => $provinceShare,
                'notes' => $request->notes
            ]);

            DB::commit();

            return redirect()
                ->route('admin.card-reports.index')
                ->with('success', __('Card Report updated successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('admin.card-reports.edit', $cardReport)
                ->with('error', __('An error occurred while updating the card report'))
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CardReport $cardReport)
    {
        $cardReport->delete();
        return redirect()
            ->route('admin.card-reports.index')
            ->with('success', __('Card Report deleted successfully'));
    }

    /**
     * Get provinces for a region (API endpoint)
     */
    public function getProvinces($regionId)
    {
        $provinces = Province::where('region_id', $regionId)->get(['id', 'name_ar', 'name_en']);
        return response()->json($provinces);
    }
}
