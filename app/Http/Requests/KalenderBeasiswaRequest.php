<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KalenderBeasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Allow all users to make this request; adjust as needed for authorization logic
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
            'tanggal_registrasi' => 'required|date',
            'deadline' => 'required|date',
            'judul' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jurusan' => 'required|string|max:255',
            'jenis_beasiswa' => 'required|string|in:full,partial',
            'keuntungan' => 'required|string',
            'umur' => 'required|integer|min:0',
            'gpa' => 'required|numeric|min:0|max:4',
            'tes_english' => 'required|string|max:255',
            'tes_bahasa_lain' => 'required|string|max:255',
            'tes_standard' => 'required|string|max:255',
            'dokumen' => 'required|string',
            'lainnya' => 'required|string',
            'status_tampil' => 'required|boolean',
            'id_negara' => 'required|array',
            'id_negara.*' => 'required|exists:negara,id',
            'id_tingkat_studi' => 'required|array',
            'id_tingkat_studi.*' => 'required|exists:tingkat_studi,id'
        ];
    }

    /**
     * Get the custom validation messages for the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'tanggal_registrasi.required' => 'Tanggal registrasi wajib diisi.',
            'tanggal_registrasi.date' => 'Tanggal registrasi harus merupakan tanggal yang valid.',
            'deadline.required' => 'Deadline wajib diisi.',
            'deadline.date' => 'Deadline harus merupakan tanggal yang valid.',
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa string.',
            'judul.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jurusan.string' => 'Jurusan harus berupa string.',
            'jurusan.max' => 'Jurusan tidak boleh lebih dari 255 karakter.',
            'jenis_beasiswa.required' => 'Jenis beasiswa wajib diisi.',
            'jenis_beasiswa.string' => 'Jenis beasiswa harus berupa string.',
            'jenis_beasiswa.in' => 'Jenis beasiswa harus berupa "full" atau "partial".',
            'keuntungan.required' => 'Keuntungan wajib diisi.',
            'keuntungan.string' => 'Keuntungan harus berupa string.',
            'umur.required' => 'Umur wajib diisi.',
            'umur.integer' => 'Umur harus berupa angka bulat.',
            'umur.min' => 'Umur harus minimal 0.',
            'gpa.required' => 'GPA wajib diisi.',
            'gpa.numeric' => 'GPA harus berupa angka.',
            'gpa.min' => 'GPA harus minimal 0.',
            'gpa.max' => 'GPA tidak boleh lebih dari 4.',
            'tes_english.required' => 'Tes English wajib diisi.',
            'tes_english.string' => 'Tes English harus berupa string.',
            'tes_english.max' => 'Tes English tidak boleh lebih dari 255 karakter.',
            'tes_bahasa_lain.required' => 'Tes Bahasa Lain wajib diisi.',
            'tes_bahasa_lain.string' => 'Tes Bahasa Lain harus berupa string.',
            'tes_bahasa_lain.max' => 'Tes Bahasa Lain tidak boleh lebih dari 255 karakter.',
            'tes_standard.required' => 'Tes Standard wajib diisi.',
            'tes_standard.string' => 'Tes Standard harus berupa string.',
            'tes_standard.max' => 'Tes Standard tidak boleh lebih dari 255 karakter.',
            'dokumen.required' => 'Dokumen wajib diisi.',
            'dokumen.string' => 'Dokumen harus berupa string.',
            'lainnya.required' => 'Lainnya wajib diisi.',
            'lainnya.string' => 'Lainnya harus berupa string.',
            'status_tampil.required' => 'Status tampil wajib diisi.',
            'status_tampil.boolean' => 'Status tampil harus berupa true atau false.',
            'id_negara.required' => 'ID Negara wajib diisi.',
            'id_negara.array' => 'ID Negara harus berupa array.',
            'id_negara.*.required' => 'Setiap ID Negara wajib diisi.',
            'id_negara.*.exists' => 'Setiap ID Negara harus ada dalam tabel negara.',
            'id_tingkat_studi.required' => 'ID Tingkat Studi wajib diisi.',
            'id_tingkat_studi.array' => 'ID Tingkat Studi harus berupa array.',
            'id_tingkat_studi.*.required' => 'Setiap ID Tingkat Studi wajib diisi.',
            'id_tingkat_studi.*.exists' => 'Setiap ID Tingkat Studi harus ada dalam tabel tingkat_studi.',
        ];
    }
}
