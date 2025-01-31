<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Region;
use App\Models\Province;
use App\Models\Profession;
use App\Models\Specialization;
use App\Models\EducationLevel;
use App\Models\StructurePosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $regions = Region::all();
        $professions = Profession::all();
        $specializations = Specialization::all();
        $structurePositions = StructurePosition::all();

        $query = Member::with(['region', 'province', 'profession', 'specialization', 'structurePosition']);

        // Apply filters
        if ($request->filled('region_id')) {
            $query->where('members.region_id', $request->region_id);
        }
        if ($request->filled('province_id')) {
            $query->where('members.province_id', $request->province_id);
        }
        if ($request->filled('profession_id')) {
            $query->where('members.profession_id', $request->profession_id);
        }
        if ($request->filled('specialization_id')) {
            $query->where('members.specialization_id', $request->specialization_id);
        }
        if ($request->filled('structure_position_id')) {
            $query->where('members.structure_position_id', $request->structure_position_id);
        }
        if ($request->filled('academic_year')) {
            $query->where('members.academic_year', $request->academic_year);
        }
        if ($request->filled('gender')) {
            $query->where('members.gender', $request->gender);
        }

        // Get summary statistics
        $baseQuery = Member::query();
        if ($request->filled('region_id')) {
            $baseQuery->where('members.region_id', $request->region_id);
        }
        if ($request->filled('province_id')) {
            $baseQuery->where('members.province_id', $request->province_id);
        }
        if ($request->filled('academic_year')) {
            $baseQuery->where('members.academic_year', $request->academic_year);
        }

        $stats = [
            'total_members' => $baseQuery->count(),
            'gender_distribution' => $baseQuery->select('gender', DB::raw('count(*) as count'))
                ->groupBy('gender')
                ->pluck('count', 'gender'),
            'by_region' => $baseQuery->select('regions.name_ar', DB::raw('count(*) as count'))
                ->join('regions', 'members.region_id', '=', 'regions.id')
                ->groupBy('regions.id', 'regions.name_ar')
                ->orderBy('count', 'desc')
                ->pluck('count', 'name_ar'),
            'by_profession' => $baseQuery->select('professions.name_ar', DB::raw('count(*) as count'))
                ->join('professions', 'members.profession_id', '=', 'professions.id')
                ->groupBy('professions.id', 'professions.name_ar')
                ->orderBy('count', 'desc')
                ->pluck('count', 'name_ar')
        ];

        // Get academic years for filter
        $academicYears = Member::select('academic_year')
            ->distinct()
            ->orderBy('academic_year', 'desc')
            ->pluck('academic_year');

        $members = $query->latest('members.created_at')->paginate(10);

        return view('admin.members.index', compact(
            'members',
            'regions',
            'professions',
            'specializations',
            'structurePositions',
            'academicYears',
            'stats'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
        $provinces = Province::all();
        $professions = Profession::all();
        $specializations = Specialization::all();
        $educationLevels = EducationLevel::all();
        $structurePositions = StructurePosition::all();

        return view('admin.members.create', compact(
            'regions',
            'provinces',
            'professions',
            'specializations',
            'educationLevels',
            'structurePositions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            // 'national_id' => 'required|string|max:20|unique:members',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255|unique:members',
            // 'address' => 'required|string|max:500',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'profession_id' => 'required|exists:professions,id',
            'specialization_id' => 'required|exists:specializations,id',
            'education_level_id' => 'required|exists:education_levels,id',
            'structure_position_id' => 'required|exists:structure_positions,id',
            // 'membership_number' => 'required|string|max:50|unique:members',
            // 'membership_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.members.create')
                ->withErrors($validator)
                ->withInput();
        }

        Member::create($request->all());

        return redirect()
            ->route('admin.members.index')
            ->with('success', __('Member created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        $regions = Region::all();
        $provinces = Province::where('region_id', $member->region_id)->get();
        $professions = Profession::all();
        $specializations = Specialization::all();
        $educationLevels = EducationLevel::all();
        $structurePositions = StructurePosition::all();

        return view('admin.members.edit', compact(
            'member',
            'regions',
            'provinces',
            'professions',
            'specializations',
            'educationLevels',
            'structurePositions'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'national_id' => 'required|string|max:20|unique:members,national_id,' . $member->id,
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255|unique:members,email,' . $member->id,
            'address' => 'required|string|max:500',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'profession_id' => 'required|exists:professions,id',
            'specialization_id' => 'required|exists:specializations,id',
            'education_level_id' => 'required|exists:education_levels,id',
            'structure_position_id' => 'required|exists:structure_positions,id',
            'membership_number' => 'required|string|max:50|unique:members,membership_number,' . $member->id,
            'membership_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.members.edit', $member)
                ->withErrors($validator)
                ->withInput();
        }

        $member->update($request->all());

        return redirect()
            ->route('admin.members.index')
            ->with('success', __('Member updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()
            ->route('admin.members.index')
            ->with('success', __('Member deleted successfully'));
    }

    /**
     * Fetch provinces based on region ID
     */
    public function getProvinces($regionId)
    {
        $provinces = Province::where('region_id', $regionId)->get();
        return response()->json($provinces);
    }
}
