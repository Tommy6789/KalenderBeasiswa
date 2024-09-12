<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BenuaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust this if you have authorization logic
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
     * Customize the validation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required' => 'Kolom nama wajib diisi.',
            'nama.string'   => 'Kolom nama harus berupa string.',
            'nama.max'      => 'Kolom nama tidak boleh lebih dari 255 karakter.',
        ];
    }
    
}
