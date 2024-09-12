<?php

namespace App\Http\Controllers;

use App\Models\levelUser;
use App\Models\user;
use App\Http\Requests\UserRequest; // Import UserRequest
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = user::with('levelUser')->get();
        $levelUser = levelUser::all();
        return view('user.index', ['data' => $data, 'levelUser' => $levelUser]);
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
    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();

        // Create a new user instance
        $user = new user();

        // Assign validated data to the user instance
        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->id_level_user = $request->id_level_user;
        $user->nomer_telepon = $request->nomer_telepon;
        $user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;

        // Save the user instance to the database
        $user->save();

        return redirect()->route('user.index')->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = user::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = user::findOrFail($id);
        $levelUser = levelUser::all();
        return view('user.edit', compact('data', 'levelUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $validatedData = $request->validated();
        $user = user::findOrFail($id);
        $user->nama = $request->nama;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->id_level_user = $request->id_level_user;
        $user->nomer_telepon = $request->nomer_telepon;
        $user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = user::findOrFail($id);

            // Soft delete the main user record
            $user->delete();

            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Failed to delete user.');
        }
    }

    /**
     * Display a listing of soft deleted resources.
     * Retrieves all soft deleted users.
     */
    public function softDelete()
    {
        $trash = user::onlyTrashed()->get();

        return view('user.softDelete', compact('trash'));
    }

    public function restore($id)
    {
        try {
            $user = user::withTrashed()->findOrFail($id);

            // Restore the main user record
            $user->restore();

            return redirect()->route('user.index')->with('success', 'User restored successfully.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Failed to restore user.');
        }
    }

    public function forceDelete($id)
    {
        try {
            // Find the user with the given ID, including soft-deleted records
            $user = user::withTrashed()->findOrFail($id);

            // Perform force delete
            $user->forceDelete();

            // Redirect back with success message
            return redirect()->route('user_softDelete')->with('success', 'User permanently deleted.');
        } catch (\Exception $e) {
            return redirect()->route('user_softDelete')->with('error', 'Failed to permanently delete user.');
        }
    }
}
