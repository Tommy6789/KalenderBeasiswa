<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontendKalenderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Mengizinkan semua pengguna untuk membuat permintaan ini; sesuaikan jika diperlukan logika otorisasi
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
            'sort' => 'sometimes|in:asc,desc',
            'id_tingkat_studi' => 'sometimes|array',
            'id_tingkat_studi.*' => 'integer|exists:tingkat_studi,id',
            'jenis_beasiswa' => 'sometimes|array',
            'jenis_beasiswa.*' => 'string|in:partial,full',
            'id_negara' => 'sometimes|array',
            'id_negara.*' => 'integer|exists:negara,id',
        ];
    }

    /**
     * Get the custom messages for the validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sort.in' => 'Sort harus berupa "asc" atau "desc".',
            'id_tingkat_studi.array' => 'ID Tingkat Studi harus berupa array.',
            'id_tingkat_studi.*.integer' => 'ID Tingkat Studi harus berupa integer.',
            'id_tingkat_studi.*.exists' => 'ID Tingkat Studi tidak ditemukan di database.',
            'jenis_beasiswa.array' => 'Jenis Beasiswa harus berupa array.',
            'jenis_beasiswa.*.string' => 'Jenis Beasiswa harus berupa string.',
            'jenis_beasiswa.*.in' => 'Jenis Beasiswa harus berupa "partial" atau "full".',
            'id_negara.array' => 'ID Negara harus berupa array.',
            'id_negara.*.integer' => 'ID Negara harus berupa integer.',
            'id_negara.*.exists' => 'ID Negara tidak ditemukan di database.',
        ];
    }
}
