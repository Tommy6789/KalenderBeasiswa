<?php

namespace App\Http\Controllers;

use App\Http\Requests\BenuaRequest;
use App\Models\Benua;
use Illuminate\Http\Request;

class BenuaController extends Controller
{
/**
 * Display a listing of the resource.
 */
public function index()
{
    $data = Benua::all();
    return view('benua.index', compact('data'));
}

/**
 * Show the form for creating a new resource.
 */
public function create()
{
    //
}

/**
 * Update the specified resource in storage.
 */
public function store(BenuaRequest $request)
    {
        try {
            $benua = Benua::create($request->validated());

            return redirect('/benua')->with('success', 'Record created successfully!');
        } catch (\Exception $e) {
            return redirect('/benua')->with('error', 'Failed to create record.');
        }
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
    $data = Benua::findOrFail($id);
    return view('benua.edit', compact('data'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BenuaRequest  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BenuaRequest $request, string $id)
    {
        try {
            $benua = Benua::findOrFail($id);
            $benua->update($request->validated());

            return redirect('/benua')->with('success', 'Record updated successfully!');
        } catch (\Exception $e) {
            return redirect('/benua')->with('error', 'Failed to update record.');
        }
    }


/**
 * Remove the specified resource from storage.
 */
// public function destroy(string $id)
// {
//     $data = Benua::findOrFail($id);
//     $data->delete();
//     return redirect('/benua')->with('success', 'Record deleted successfully!');
// }

public function destroy($id)
{
    try {
    $benua = Benua::findOrFail($id);

    // Soft delete the main benua record
    $benua->softDeleteBenua();

    return redirect()->route('benua.index')->with('success', 'Benua deleted successfully.');
    } catch (\Exception $e) {
    return redirect()->route('benua.index')->with('error', 'Failed to delete benua.');
    }
}

public function softDelete()
{
    $trash = Benua::onlyTrashed()->get();

    return view('benua.softDelete', compact('trash'));
}

public function restore($id)
{
    try {
    $benua = Benua::withTrashed()->findOrFail($id);

    // Restore the main benua record
    $benua->restoreBenua();

    return redirect()->route('benua.index')->with('success', 'Benua restored successfully.');
    } catch (\Exception $e) {
    return redirect()->route('benua.index')->with('error', 'Failed to restore Benua.');
    }
}

public function forceDelete($id)
{
    try {
    // Find the Benua with the given ID, including soft-deleted records
    $benua = Benua::withTrashed()->findOrFail($id);

    // Perform force delete
    $benua->forceDeleteBenua();

    return redirect()->route('benua_softDelete')->with('success', 'Benua permanently deleted.');
    } catch (\Exception $e) {
    return redirect()->route('benua_softDelete')->with('error', 'Failed to permanently delete Benua.');
    }
}
}
