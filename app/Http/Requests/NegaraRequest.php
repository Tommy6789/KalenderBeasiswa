<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NegaraRequest extends FormRequest
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
            'id_benua' => 'required|exists:benua,id', // Ensure the id_benua exists in the benua table
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
            'nama.required' => 'Nama negara harus diisi.',
            'id_benua.required' => 'Benua harus dipilih.',
            'id_benua.exists' => 'Benua yang dipilih tidak valid.',
        ];
    }
}
