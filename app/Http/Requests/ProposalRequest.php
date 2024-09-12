<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalRequest extends FormRequest
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
            'tanggal_registrasi' => 'nullable|date',
            'deadline' => 'nullable|date',
            'judul' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'jurusan' => 'nullable|string|max:255',
            'jenis_beasiswa' => 'nullable|string|max:255',
            'keuntungan' => 'nullable|string',
            'umur' => 'nullable|integer',
            'gpa' => 'nullable|numeric|min:0|max:4',
            'tes_english' => 'nullable|numeric|min:0|max:100',
            'tes_bahasa_lain' => 'nullable|numeric|min:0|max:100',
            'tes_standard' => 'nullable|numeric|min:0|max:100',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'lainnya' => 'nullable|string',
            'status_tampil' => 'nullable|boolean'
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
            'tanggal_registrasi.date' => 'Tanggal registrasi harus berupa tanggal yang valid.',
            'deadline.date' => 'Tanggal deadline harus berupa tanggal yang valid.',
            'judul.string' => 'Judul harus berupa string.',
            'nama.string' => 'Nama harus berupa string.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
            'jurusan.string' => 'Jurusan harus berupa string.',
            'jenis_beasiswa.string' => 'Jenis beasiswa harus berupa string.',
            'keuntungan.string' => 'Keuntungan harus berupa string.',
            'umur.integer' => 'Umur harus berupa angka.',
            'gpa.numeric' => 'GPA harus berupa angka.',
            'tes_english.numeric' => 'Tes English harus berupa angka.',
            'tes_bahasa_lain.numeric' => 'Tes Bahasa Lain harus berupa angka.',
            'tes_standard.numeric' => 'Tes Standard harus berupa angka.',
            'dokumen.file' => 'Dokumen harus berupa file.',
            'dokumen.mimes' => 'Dokumen harus berupa file PDF, DOC, atau DOCX.',
            'dokumen.max' => 'Dokumen tidak boleh lebih dari 2MB.',
            'status_tampil.boolean' => 'Status tampil harus berupa boolean.',
        ];
    }
}
