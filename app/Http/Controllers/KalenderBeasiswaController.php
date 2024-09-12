<?php

namespace App\Http\Controllers;

use App\Http\Requests\KalenderBeasiswaRequest;
use App\Models\kalenderBeasiswa;
use App\Models\negara;
use App\Models\tingkatStudi;
use Illuminate\Http\Request;

class KalenderBeasiswaController extends Controller
{
  /**
   * Display a listing of the resource.
   * Retrieves all scholarship calendars with related countries and study levels.
   */
  public function index()
  {
    $data = kalenderBeasiswa::with('negara', 'tingkatStudi')->get();
    $negara = negara::all();
    $tingkatStudi = tingkatStudi::all();
    return view('kalenderBeasiswa.index', ['data' => $data, 'negara' => $negara, 'tingkatStudi' => $tingkatStudi]);
  }

  /**
   * Store a newly created resource in storage.
   * Validates and stores a new scholarship calendar entry.
   */
  public function store(KalenderBeasiswaRequest $request)
{
    try {
        // Create a new kalenderBeasiswa record with validated data
        $kalenderBeasiswa = kalenderBeasiswa::create($request->validated());

        // Attach related Negara models if specified
        if ($request->has('id_negara')) {
            $kalenderBeasiswa->negara()->attach($request->id_negara);
        }

        // Attach related Tingkat Studi models if specified
        if ($request->has('id_tingkat_studi')) {
            $kalenderBeasiswa->tingkatStudi()->attach($request->id_tingkat_studi);
        }

        return redirect()->route('kalenderBeasiswa.index')->with('success', 'Kalender Beasiswa created successfully.');
    } catch (\Exception $e) {
        return redirect()->route('kalenderBeasiswa.index')->with('error', 'Failed to create Kalender Beasiswa.');
    }
}

  /**
   * Show the form for editing the specified resource.
   * Retrieves data for editing a specific scholarship calendar entry.
   */
  public function edit($id)
  {
    $data = kalenderBeasiswa::with('negara', 'tingkatStudi')->findOrFail($id);
    $negara = negara::all();
    $tingkatStudi = tingkatStudi::all();

    return view('kalenderBeasiswa.edit', compact('data', 'negara', 'tingkatStudi'));
  }

  /**
   * Update the specified resource in storage.
   * Validates and updates an existing scholarship calendar entry.
   */
  public function update(KalenderBeasiswaRequest $request, $id)
{
    try {
        // Find the specific Kalender Beasiswa record by ID
        $kalenderBeasiswa = kalenderBeasiswa::findOrFail($id);

        // Update the Kalender Beasiswa record with validated data
        $kalenderBeasiswa->update($request->validated());

        // Sync the pivot tables for negara and tingkatStudi based on request data
        if ($request->has('id_negara')) {
            $kalenderBeasiswa->negara()->sync($request->id_negara);
        } else {
            $kalenderBeasiswa->negara()->detach();
        }

        if ($request->has('id_tingkat_studi')) {
            $kalenderBeasiswa->tingkatStudi()->sync($request->id_tingkat_studi);
        } else {
            $kalenderBeasiswa->tingkatStudi()->detach();
        }

        return redirect()->route('kalenderBeasiswa.index')->with('success', 'Kalender Beasiswa updated successfully.');
    } catch (\Exception $e) {
        return redirect()->route('kalenderBeasiswa.index')->with('error', 'Failed to update Kalender Beasiswa.');
    }
}

  /**
   * Remove the specified resource from storage.
   * Deletes a scholarship calendar entry and detaches related records.
   */
  public function destroy($id)
  {
    try {
      $kalenderBeasiswa = kalenderBeasiswa::findOrFail($id);

      // Soft delete the main kalenderBeasiswa record
      $kalenderBeasiswa->delete();

      return redirect()->route('kalenderBeasiswa.index')->with('success', 'Kalender Beasiswa deleted successfully.');
    } catch (\Exception $e) {
      return redirect()->route('kalenderBeasiswa.index')->with('error', 'Failed to delete Kalender Beasiswa.');
    }
  }

  /**
   * Display a listing of soft deleted resources.
   * Retrieves all soft deleted scholarship calendars.
   */
  public function softDelete()
  {
    $trash = kalenderBeasiswa::onlyTrashed()->get();

    return view('kalenderBeasiswa.softDelete', compact('trash'));
  }

  public function restore($id)
  {
    try {
      $kalenderBeasiswa = kalenderBeasiswa::withTrashed()->findOrFail($id);

      // Restore the main kalenderBeasiswa record
      $kalenderBeasiswa->restore();

      return redirect()->route('kalenderBeasiswa.index')->with('success', 'Kalender Beasiswa restored successfully.');
    } catch (\Exception $e) {
      return redirect()->route('kalenderBeasiswa.index')->with('error', 'Failed to restore Kalender Beasiswa.');
    }
  }

  public function forceDelete($id)
  {
    // Find the Kalender Beasiswa with the given ID, including soft-deleted records
    $kalender = kalenderBeasiswa::withTrashed()->findOrFail($id);

    // Perform force delete
    $kalender->forceDelete();

    // Redirect back with success message
    return redirect()->route('kbeasiswa_softDelete')->with('success', 'Kalender Beasiswa permanently deleted.');
  }

  public function pendingKalender()
  {
    // Mendapatkan entri dengan status 'pending' dalam tabel kalenderBeasiswa beserta hubungannya dengan negara dan tingkatStudi
    $data = kalenderBeasiswa::with('negara', 'tingkatStudi')->where('status_tampil', 0)->get();
    $negara = negara::all();
    $tingkatStudi = tingkatStudi::all();

    return view('pending_kalender.index', ['data' => $data, 'negara' => $negara, 'tingkatStudi' => $tingkatStudi]);
  }

  public function accept($id)
  {
    try {
      $kalenderBeasiswa = kalenderBeasiswa::findOrFail($id);
      $kalenderBeasiswa->status_tampil = 1; // Assuming '1' means accepted
      $kalenderBeasiswa->save();

      return redirect()->route('kalenderBeasiswa.index')->with('success', 'Proposal accepted successfully.');
    } catch (\Exception $e) {
      return redirect()->route('kalenderBeasiswa.index')->with('error', 'Failed to accept proposal.');
    }
  }
}
