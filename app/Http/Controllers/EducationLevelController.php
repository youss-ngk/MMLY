<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationLevels = EducationLevel::withCount('members')
            ->orderBy('level', 'asc')
            ->paginate(10);

        return view('admin.education-levels.index', compact('educationLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education-levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:education_levels',
            'name_en' => 'required|string|max:255|unique:education_levels',
            'level' => 'required|integer|min:1|unique:education_levels',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.education-levels.create')
                ->withErrors($validator)
                ->withInput();
        }

        EducationLevel::create($request->all());

        return redirect()
            ->route('admin.education-levels.index')
            ->with('success', __('Education Level created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationLevel $educationLevel)
    {
        return view('admin.education-levels.edit', compact('educationLevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EducationLevel $educationLevel)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:education_levels,name_ar,' . $educationLevel->id,
            'name_en' => 'required|string|max:255|unique:education_levels,name_en,' . $educationLevel->id,
            'level' => 'required|integer|min:1|unique:education_levels,level,' . $educationLevel->id,
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.education-levels.edit', $educationLevel)
                ->withErrors($validator)
                ->withInput();
        }

        $educationLevel->update($request->all());

        return redirect()
            ->route('admin.education-levels.index')
            ->with('success', __('Education Level updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EducationLevel $educationLevel)
    {
        if ($educationLevel->members()->count() > 0) {
            return redirect()
                ->route('admin.education-levels.index')
                ->with('error', __('Cannot delete education level with members'));
        }

        $educationLevel->delete();

        return redirect()
            ->route('admin.education-levels.index')
            ->with('success', __('Education Level deleted successfully'));
    }
}
