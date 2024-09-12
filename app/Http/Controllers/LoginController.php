<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
    }

    public function register()
    {
        return view('login.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = new User();
        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->nomer_telepon = $validatedData['nomer_telepon'];
        $user->alamat = $validatedData['alamat'];
        $user->tanggal_lahir = $validatedData['tanggal_lahir'];
        $user->id_level_user = 3; // Set level user ID to 3

        $user->save();

        // Log the user in after successful registration
        Auth::login($user);

        return redirect()->route('login.index')->with('success', 'Akun Anda berhasil dibuat!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LoginRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login_check(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect dengan pesan sukses
            return redirect()->intended('/kalenderBeasiswa')->with('success', 'Login berhasil!');
        }

        // Redirect kembali dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->with('error', 'Login gagal! Periksa email dan password Anda.');
    }

    public function logout()
    {
        Auth::logout(); // Log out the user
        return redirect('/login'); // Redirect to the login page
    }

    public function subscriber_login()
    {
        return view('frontend.loginSubscriber');
    }

    public function subscriber_register()
    {
        return view('frontend.registerSubscriber');
    }

    public function subscriber_store(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $user = new User();
        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->nomer_telepon = $validatedData['nomer_telepon'];
        $user->alamat = $validatedData['alamat'];
        $user->tanggal_lahir = $validatedData['tanggal_lahir'];
        $user->id_level_user = 3; // Set level user ID to 3

        $user->save();

        // Log the user in after successful registration
        Auth::login($user);

        return redirect()->route('subscriber_login')->with('success', 'Akun Anda berhasil dibuat!');
    }

    public function subscriber_check(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
