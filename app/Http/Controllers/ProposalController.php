<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProposalRequest; // Import ProposalRequest
use App\Models\kalenderBeasiswa;
use App\Models\negara;
use App\Models\tingkatStudi;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProposalRequest $request)
    {
        $validatedData = $request->validated();

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
    public function update(ProposalRequest $request, string $id)
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
