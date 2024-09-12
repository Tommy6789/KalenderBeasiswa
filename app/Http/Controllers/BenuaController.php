<?php

namespace App\Http\Controllers;

use App\Http\Requests\BenuaRequest;
use App\Models\Benua;
use Illuminate\Http\Request;

class BenuaController extends Controller
{
    // Other methods...

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BenuaRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BenuaRequest $request)
    {
        try {
            $benua = Benua::create($request->validated());

            return redirect('/benua')->with('success', 'Record created successfully!');
        } catch (\Exception $e) {
            return redirect('/benua')->with('error', 'Failed to create record.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BenuaRequest  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BenuaRequest $request, string $id)
    {
        try {
            $benua = Benua::findOrFail($id);
            $benua->update($request->validated());

            return redirect('/benua')->with('success', 'Record updated successfully!');
        } catch (\Exception $e) {
            return redirect('/benua')->with('error', 'Failed to update record.');
        }
    }
}
