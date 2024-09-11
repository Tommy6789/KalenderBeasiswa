<?php

namespace App\Http\Controllers;

use App\Models\kalenderBeasiswa;
use App\Models\Negara;
use App\Models\tingkatStudi;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function kalender(Request $request)
    {
        $sort = $request->query('sort', 'desc'); // Default sort is descending (newest first)
        $data = kalenderBeasiswa::with(['negara', 'tingkatStudi'])
            ->where('status_tampil', 1)
            ->orderBy('tanggal_registrasi', $sort)
            ->get();
        $negara = Negara::all();
        $tingkatStudi = tingkatStudi::all();

        if ($request->ajax()) {
            return response()->json([
                'data' => $data,
                'negara' => $negara,
                'tingkatStudi' => $tingkatStudi,
                'sort' => $sort
            ]);
        }

        return view('frontend.kalender', compact('data', 'negara', 'tingkatStudi', 'sort'));
    }

    public function detail($id)
    {
        $data = kalenderBeasiswa::with('negara', 'tingkatStudi')->findOrFail($id);
        $negara = Negara::all();
        $tingkatStudi = tingkatStudi::all();

        if (request()->ajax()) {
            return response()->json([
                'data' => $data,
                'negara' => $negara,
                'tingkatStudi' => $tingkatStudi
            ]);
        }

        return view('frontend.detail', [
            'data' => $data,
            'negara' => $negara,
            'tingkatStudi' => $tingkatStudi
        ]);
    }

    public function filter(Request $request)
    {
        $query = kalenderBeasiswa::query();
        $isJenisBeasiswaFiltered = $request->has('jenis_beasiswa');
        $sort = $request->query('sort', 'desc'); // Default sort is descending (newest first)

        if ($request->has('id_tingkat_studi')) {
            $query->whereHas('tingkatStudi', function ($q) use ($request) {
                $q->whereIn('tingkat_studis.id', $request->id_tingkat_studi);
            });
        }

        if ($isJenisBeasiswaFiltered) {
            $query->whereIn('jenis_beasiswa', $request->jenis_beasiswa);
        }

        if ($request->has('id_negara')) {
            $query->whereHas('negara', function ($q) use ($request) {
                $q->whereIn('negaras.id', $request->id_negara);
            });
        }

        $data = $query->with('negara', 'tingkatStudi')->orderBy('tanggal_registrasi', $sort)->get();
        $negara = Negara::all();
        $tingkatStudi = tingkatStudi::all();

        if ($request->ajax()) {
            return response()->json([
                'data' => $data,
                'negara' => $negara,
                'tingkatStudi' => $tingkatStudi,
                'message' => $data->isEmpty() ? 'No articles found' : null,
                'sort' => $sort
            ]);
        }

        return view('frontend.kalender', [
            'data' => $data,
            'negara' => $negara,
            'tingkatStudi' => $tingkatStudi,
            'sort' => $sort
        ]);
    }

    public function daftarBeasiswa($id)
    {
        $beasiswa = kalenderBeasiswa::findOrFail($id);

        if (request()->ajax()) {
            return response()->json([
                'beasiswa' => $beasiswa
            ]);
        }

        return view('frontend.daftar', [
            'beasiswa' => $beasiswa
        ]);
    }

    public function wishlist()
    {
        return view('frontend.wishlist');
    }
}
