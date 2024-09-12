<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TingkatStudiRequest extends FormRequest
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
            'nama.required' => 'Nama tingkat studi harus diisi.',
            'nama.string' => 'Nama tingkat studi harus berupa teks.',
            'nama.max' => 'Nama tingkat studi tidak boleh lebih dari 255 karakter.',
        ];
    }
}
