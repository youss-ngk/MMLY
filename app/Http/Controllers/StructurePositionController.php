<?php

namespace App\Http\Controllers;

use App\Models\StructurePosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StructurePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = StructurePosition::withCount('members')
            ->orderBy('level', 'asc')
            ->paginate(10);

        return view('admin.structure-positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.structure-positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:structure_positions',
            'name_en' => 'required|string|max:255|unique:structure_positions',
            'level' => 'required|integer|min:1|unique:structure_positions',
            'description' => 'nullable|string',
            'responsibilities' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.structure-positions.create')
                ->withErrors($validator)
                ->withInput();
        }

        StructurePosition::create($request->all());

        return redirect()
            ->route('admin.structure-positions.index')
            ->with('success', __('Structure Position created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StructurePosition $structurePosition)
    {
        return view('admin.structure-positions.edit', compact('structurePosition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StructurePosition $structurePosition)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:structure_positions,name_ar,' . $structurePosition->id,
            'name_en' => 'required|string|max:255|unique:structure_positions,name_en,' . $structurePosition->id,
            'level' => 'required|integer|min:1|unique:structure_positions,level,' . $structurePosition->id,
            'description' => 'nullable|string',
            'responsibilities' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.structure-positions.edit', $structurePosition)
                ->withErrors($validator)
                ->withInput();
        }

        $structurePosition->update($request->all());

        return redirect()
            ->route('admin.structure-positions.index')
            ->with('success', __('Structure Position updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StructurePosition $structurePosition)
    {
        if ($structurePosition->members()->count() > 0) {
            return redirect()
                ->route('admin.structure-positions.index')
                ->with('error', __('Cannot delete position with members'));
        }

        $structurePosition->delete();

        return redirect()
            ->route('admin.structure-positions.index')
            ->with('success', __('Structure Position deleted successfully'));
    }
}
