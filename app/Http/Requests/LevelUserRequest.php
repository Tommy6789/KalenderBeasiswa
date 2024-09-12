<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelUserRequest extends FormRequest
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
        return [
            'nama' => 'required|string|max:255',
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
            'nama.required' => 'Nama level pengguna harus diisi.',
            'nama.string'   => 'Nama level pengguna harus berupa teks.',
            'nama.max'      => 'Nama level pengguna tidak boleh lebih dari :max karakter.',
        ];
    }
}
