<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializations = Specialization::paginate(10);
        return view('admin.specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:specializations',
            'name_en' => 'required|string|max:255|unique:specializations',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.specializations.create')
                ->withErrors($validator)
                ->withInput();
        }

        Specialization::create($request->all());

        return redirect()
            ->route('admin.specializations.index')
            ->with('success', __('Specialization created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialization $specialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        return view('admin.specializations.edit', compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialization $specialization)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required|string|max:255|unique:specializations,name_ar,' . $specialization->id,
            'name_en' => 'required|string|max:255|unique:specializations,name_en,' . $specialization->id,
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.specializations.edit', $specialization)
                ->withErrors($validator)
                ->withInput();
        }

        $specialization->update($request->all());

        return redirect()
            ->route('admin.specializations.index')
            ->with('success', __('Specialization updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialization $specialization)
    {
        $specialization->delete();

        return redirect()
            ->route('admin.specializations.index')
            ->with('success', __('Specialization deleted successfully'));
    }
}
