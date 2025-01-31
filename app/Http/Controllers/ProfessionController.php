<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professions = Profession::withCount('members')
            ->paginate(10);

        return view('admin.professions.index', compact('professions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.professions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        Profession::create($validated);

        return redirect()
            ->route('admin.professions.index')
            ->with('success', 'Profession created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profession $profession)
    {
        return view('admin.professions.edit', compact('profession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profession $profession)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $profession->update($validated);

        return redirect()
            ->route('admin.professions.index')
            ->with('success', 'Profession updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profession $profession)
    {
        if ($profession->members()->exists()) {
            return redirect()
                ->route('admin.professions.index')
                ->with('error', 'Cannot delete profession with associated members.');
        }

        $profession->delete();

        return redirect()
            ->route('admin.professions.index')
            ->with('success', 'Profession deleted successfully.');
    }
}
