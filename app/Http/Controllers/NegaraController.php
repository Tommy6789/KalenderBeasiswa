<?php

namespace App\Http\Controllers;

use App\Models\benua;
use App\Models\negara;
use App\Http\Requests\NegaraRequest; // Import NegaraRequest
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = negara::with('benua')->get();
        $benua = benua::all();
        return view('negara.index', ['data' => $data, 'benua' => $benua]);
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
    public function store(NegaraRequest $request)
    {
        $validatedData = $request->validated();

        negara::create($validatedData);

        return redirect('/negara')
            ->with('success', 'Berhasil Menambah Negara');
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
        $benua = benua::all();
        $data = negara::findOrFail($id);

        return view('negara.edit', compact('data', 'benua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NegaraRequest $request, string $id)
    {
        $data = negara::findOrFail($id);

        $validatedData = $request->validated();
        $data->update($validatedData);

        return redirect('/negara')->with('success', 'Berhasil mengupdate negara');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $Negara = negara::findOrFail($id);

            // Soft delete the main negara record
            $Negara->delete();

            return redirect()->route('negara.index')->with('success', 'Negara deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('negara.index')->with('error', 'Failed to delete Negara.');
        }
    }

    /**
     * Display a listing of soft deleted resources.
     * Retrieves all soft deleted negara.
     */
    public function softDelete()
    {
        $trash = negara::onlyTrashed()->get();

        return view('negara.softDelete', compact('trash'));
    }

    public function restore($id)
    {
        try {
            $Negara = negara::withTrashed()->findOrFail($id);

            // Restore the main negara record
            $Negara->restore();

            return redirect()->route('negara.index')->with('success', 'Negara restored successfully.');
        } catch (\Exception $e) {
            return redirect()->route('negara.index')->with('error', 'Failed to restore Negara.');
        }
    }

    public function forceDelete($id)
    {
        try {
            // Find the Negara with the given ID, including soft-deleted records
            $Negara = negara::withTrashed()->findOrFail($id);

            // Perform force delete
            $Negara->forceDelete();

            // Redirect back with success message
            return redirect()->route('negara_softDelete')->with('success', 'Negara permanently deleted.');
        } catch (\Exception $e) {
            return redirect()->route('negara_softDelete')->with('error', 'Failed to permanently delete Negara.');
        }
    }
}