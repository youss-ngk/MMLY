<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Region;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = Income::with(['region', 'province'])->paginate(10);
        return view('admin.incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.incomes.create', compact('regions'));
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
                ->route('admin.incomes.create')
                ->withErrors($validator)
                ->withInput();
        }

        Income::create($request->all());

        return redirect()
            ->route('admin.incomes.index')
            ->with('success', __('Income created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $regions = Region::all();
        $provinces = Province::where('region_id', $income->region_id)->get();
        return view('admin.incomes.edit', compact('income', 'regions', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
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
                ->route('admin.incomes.edit', $income)
                ->withErrors($validator)
                ->withInput();
        }

        $income->update($request->all());

        return redirect()
            ->route('admin.incomes.index')
            ->with('success', __('Income updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        $income->delete();

        return redirect()
            ->route('admin.incomes.index')
            ->with('success', __('Income deleted successfully'));
    }
}
