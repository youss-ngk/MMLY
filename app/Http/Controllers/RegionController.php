<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::withCount(['provinces', 'members'])
            ->paginate(10);

        return view('admin.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:regions',
            'name_en' => 'required|string|max:255|unique:regions',
            'code' => 'required|string|max:10|unique:regions',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.regions.create')
                ->withErrors($validator)
                ->withInput();
        }

        Region::create($request->all());

        return redirect()
            ->route('admin.regions.index')
            ->with('success', __('Region created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return view('admin.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:regions,name_ar,' . $region->id,
            'name_en' => 'required|string|max:255|unique:regions,name_en,' . $region->id,
            'code' => 'required|string|max:10|unique:regions,code,' . $region->id,
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.regions.edit', $region)
                ->withErrors($validator)
                ->withInput();
        }

        $region->update($request->all());

        return redirect()
            ->route('admin.regions.index')
            ->with('success', __('Region updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        if ($region->provinces()->count() > 0) {
            return redirect()
                ->route('admin.regions.index')
                ->with('error', __('Cannot delete region with provinces'));
        }

        if ($region->members()->count() > 0) {
            return redirect()
                ->route('admin.regions.index')
                ->with('error', __('Cannot delete region with members'));
        }

        $region->delete();

        return redirect()
            ->route('admin.regions.index')
            ->with('success', __('Region deleted successfully'));
    }
}
