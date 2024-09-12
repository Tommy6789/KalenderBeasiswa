<?php

namespace App\Http\Controllers;

use App\Http\Requests\TingkatStudiRequest; // Import TingkatStudiRequest
use App\Models\tingkatStudi;

class TingkatStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = tingkatStudi::all();
        return view('tingkatStudi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TingkatStudiRequest $request)
    {
        $validatedData = $request->validated();

        $simpan = tingkatStudi::create($validatedData);
        return redirect('/tingkatStudi')->with('success', 'Record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = tingkatStudi::findOrFail($id);
        return view('tingkatStudi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TingkatStudiRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $data = tingkatStudi::findOrFail($id);
        $data->update($validatedData);

        return redirect('/tingkatStudi')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $tingkatStudi = tingkatStudi::findOrFail($id);

            // Soft delete the main TingkatStudi record
            $tingkatStudi->delete();

            return redirect()->route('tingkatStudi.index')->with('success', 'Tingkat Studi deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('tingkatStudi.index')->with('error', 'Failed to delete Tingkat Studi.');
        }
    }

    /**
     * Display a listing of soft deleted resources.
     * Retrieves all soft deleted TingkatStudi records.
     */
    public function softDelete()
    {
        $trash = tingkatStudi::onlyTrashed()->get();

        return view('tingkatStudi.softDelete', compact('trash'));
    }

    /**
     * Restore the specified soft deleted resource.
     */
    public function restore($id)
    {
        try {
            $tingkatStudi = tingkatStudi::withTrashed()->findOrFail($id);

            // Restore the main TingkatStudi record
            $tingkatStudi->restore();

            return redirect()->route('tingkatStudi.index')->with('success', 'Tingkat Studi restored successfully.');
        } catch (\Exception $e) {
            return redirect()->route('tingkatStudi.index')->with('error', 'Failed to restore Tingkat Studi.');
        }
    }

    /**
     * Permanently delete the specified soft deleted resource.
     */
    public function forceDelete($id)
    {
        try {
            $tingkatStudi = tingkatStudi::withTrashed()->findOrFail($id);

            // Perform force delete
            $tingkatStudi->forceDelete();

            return redirect()->route('tingkat_studi_softDelete')->with('success', 'Tingkat Studi permanently deleted.');
        } catch (\Exception $e) {
            return redirect()->route('tingkat_studi_softDelete')->with('error', 'Failed to permanently delete Tingkat Studi.');
        }
    }
}
