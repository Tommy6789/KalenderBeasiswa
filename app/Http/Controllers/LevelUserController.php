<?php

namespace App\Http\Controllers;

use App\Models\levelUser;
use App\Models\User;
use Illuminate\Http\Request;

class LevelUserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = levelUser::all();
    return view('levelUser.index', compact('data'));
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
  public function store(Request $request)
  {
    $validasiData = $request->validate([
      'nama' => 'required'
    ]);

    $simpan = levelUser::create($validasiData);
    return redirect('/levelUser')->with('success', 'Record created successfully!');
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
    $data = levelUser::findOrFail($id);
    return view('levelUser.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $validatedData = $request->validate([
      'nama' => 'required',
    ]);

    $data = levelUser::findOrFail($id);
    $data->update($validatedData);

    return redirect('/levelUser')->with('success', 'Record updated successfully!');
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    try {
      $levelUser = levelUser::findOrFail($id);

      // Soft delete the main levelUser record
      $levelUser->delete();

      return redirect()->route('levelUser.index')->with('success', 'Level user deleted successfully.');
    } catch (\Exception $e) {
      return redirect()->route('levelUser.index')->with('error', 'Failed to delete level user.');
    }
  }

  /**
   * Display a listing of soft deleted resources.
   * Retrieves all soft deleted level_users.
   */
  public function softDelete()
  {
    $trash = levelUser::onlyTrashed()->get();

    return view('levelUser.softDelete', compact('trash'));
  }

  /**
   * Restore the soft deleted levelUser record.
   *
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function restore($id)
  {
    try {
      $levelUser = levelUser::withTrashed()->findOrFail($id);

      // Restore the main levelUser record
      $levelUser->restore();

      return redirect()->route('levelUser.index')->with('success', 'Level user restored successfully.');
    } catch (\Exception $e) {
      return redirect()->route('levelUser.index')->with('error', 'Failed to restore level user.');
    }
  }

  /**
   * Force delete (permanently delete) the levelUser record.
   *
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function forceDelete($id)
  {
    try {
      // Find the levelUser with the given ID, including soft-deleted records
      $levelUser = levelUser::withTrashed()->findOrFail($id);

      // Perform force delete
      $levelUser->forceDelete();

      // Redirect back with success message
      return redirect()->route('level_user_softDelete')->with('success', 'Level user permanently deleted.');
    } catch (\Exception $e) {
      return redirect()->route('level_user_softDelete')->with('error', 'Failed to permanently delete level user.');
    }
  }
}
