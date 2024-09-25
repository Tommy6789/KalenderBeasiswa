<?php

namespace App\Http\Controllers;

use App\Models\kalenderBeasiswa;
use App\Models\negara;
use App\Models\tingkatStudi;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = kalenderBeasiswa::with('negara', 'tingkatStudi')->get();
        $negara = negara::all();
        $tingkatStudi = tingkatStudi::all();
        return view('frontend.proposal', ['data' => $data, 'negara' => $negara, 'tingkatStudi' => $tingkatStudi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validation rules for incoming request data
        $validatedData = $request->validate([
            'tanggal_registrasi' => 'nullable',
            'deadline' => 'nullable',
            'judul' => 'nullable',
            'nama' => 'nullable',
            'deskripsi' => 'nullable',
            'jurusan' => 'nullable',
            'jenis_beasiswa' => 'nullable',
            'keuntungan' => 'nullable',
            'umur' => 'nullable',
            'gpa' => 'nullable',
            'tes_english' => 'nullable',
            'tes_bahasa_lain' => 'nullable',
            'tes_standard' => 'nullable',
            'dokumen' => 'nullable',
            'lainnya' => 'nullable',
            'status_tampil' => 'nullable'
        ]);

        // Create a new kalenderBeasiswa record with validated data
        $kalenderBeasiswa = kalenderBeasiswa::create($validatedData);

        // Attach related Negara models if specified
        if ($request->has('id_negara')) {
            $kalenderBeasiswa->negara()->attach($request->id_negara);
        }

        // Attach related Tingkat Studi models if specified
        if ($request->has('id_tingkat_studi')) {
            $kalenderBeasiswa->tingkatStudi()->attach($request->id_tingkat_studi);
        }

        return redirect()->route('frontend.proposal')->with('success', 'Proposal created successfully.');
    }



    /**
     * Store a newly created resource in storage.
     */


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
    public function update(Request $request, string $id)
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
}
