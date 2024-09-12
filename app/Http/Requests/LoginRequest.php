<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
{
    if ($this->is('register') || $this->is('subscriber_register')) {
        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'nomer_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'terms' => 'required',
        ];
    }

    if ($this->is('login') || $this->is('subscriber_check')) {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    return [];
}


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'terms.required' => 'Anda harus menyetujui persyaratan dan ketentuan.',
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.confirmed' => 'Password konfirmasi tidak cocok.',
            'nomer_telepon.required' => 'Nomor telepon harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
        ];
    }
}
