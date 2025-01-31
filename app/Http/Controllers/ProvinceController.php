<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::with('region')->paginate(10);
        return view('admin.provinces.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.provinces.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:provinces',
            'name_en' => 'required|string|max:255|unique:provinces',
            'region_id' => 'required|exists:regions,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.provinces.create')
                ->withErrors($validator)
                ->withInput();
        }

        Province::create($request->all());

        return redirect()
            ->route('admin.provinces.index')
            ->with('success', __('Province created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Province $province)
    {
        $regions = Region::all();
        return view('admin.provinces.edit', compact('province', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Province $province)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:provinces,name_ar,' . $province->id,
            'name_en' => 'required|string|max:255|unique:provinces,name_en,' . $province->id,
            'region_id' => 'required|exists:regions,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.provinces.edit', $province)
                ->withErrors($validator)
                ->withInput();
        }

        $province->update($request->all());

        return redirect()
            ->route('admin.provinces.index')
            ->with('success', __('Province updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $province)
    {
        $province->delete();

        return redirect()
            ->route('admin.provinces.index')
            ->with('success', __('Province deleted successfully'));
    }

    /**
     * Get provinces by region (API endpoint)
     */
    public function getByRegion(Region $region)
    {
        $provinces = Province::where('region_id', $region->id)
            ->get(['id', 'name_ar', 'name_en']);
        return response()->json($provinces);
    }
}
