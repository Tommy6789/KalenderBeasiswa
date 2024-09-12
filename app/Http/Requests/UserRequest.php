<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Set to true to allow all users to use this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId = $this->route('user'); // Get the user ID from route

        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'nullable|min:6|confirmed', // Password is nullable but should be confirmed
            'password_confirmation' => 'nullable|required_with:password',
            'id_level_user' => 'required|exists:level_users,id',
            'nomer_telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Password harus terdiri dari minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'id_level_user.required' => 'Level user harus dipilih.',
            'id_level_user.exists' => 'Level user yang dipilih tidak valid.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
        ];
    }
}
