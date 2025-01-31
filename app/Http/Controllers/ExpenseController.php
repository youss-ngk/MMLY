<?php
namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Region;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with(['region', 'province'])->paginate(10);
        return view('admin.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.expenses.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:cards,other',
            'description' => 'required|string',
            'date' => 'required|date',
            'academic_year' => 'required|string',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'count' => 'required|integer|min:0',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.expenses.create')
                ->withErrors($validator)
                ->withInput();
        }

        Expense::create($request->all());

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', __('Expense created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $regions = Region::all();
        $provinces = Province::where('region_id', $expense->region_id)->get();
        return view('admin.expenses.edit', compact('expense', 'regions', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:cards,other',
            'description' => 'required|string',
            'date' => 'required|date',
            'academic_year' => 'required|string',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'count' => 'required|integer|min:0',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.expenses.edit', $expense)
                ->withErrors($validator)
                ->withInput();
        }

        $expense->update($request->all());

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', __('Expense updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', __('Expense deleted successfully'));
    }
}
