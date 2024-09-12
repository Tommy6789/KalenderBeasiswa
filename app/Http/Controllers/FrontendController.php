<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontendKalenderRequest;
use App\Models\KalenderBeasiswa;
use App\Models\Negara;
use App\Models\TingkatStudi;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function home()
   {
      return view('frontend.home');
   }

   public function kalender(FrontendKalenderRequest $request)
   {
      $tingkatStudiOptions = TingkatStudi::all(); // Ambil data Tingkat Studi
      $negaraOptions = Negara::all(); // Ambil data Negara
      $sort = $request->query('sort', 'desc'); // Default sort adalah descending (terbaru)

      $data = KalenderBeasiswa::with(['negara', 'tingkatStudi'])
         ->where('status_tampil', 1)
         ->orderBy('tanggal_registrasi', $sort)
         ->get();

      if ($request->ajax()) {
         return response()->json([
            'data' => $data,
            'negara' => $negaraOptions,
            'tingkatStudi' => $tingkatStudiOptions,
            'sort' => $sort
         ]);
      }

      return view('frontend.kalender', compact('data', 'negaraOptions', 'tingkatStudiOptions', 'sort'));
   }

   public function filter(Request $request)
   {
      $query = KalenderBeasiswa::query();

      // Track if the filter is applied
      $isJenisBeasiswaFiltered = $request->has('jenis_beasiswa');
      $sort = $request->query('sort', 'desc'); // Default sort is descending (newest first)

      // Filter by Tingkat Studi
      if ($request->has('id_tingkat_studi')) {
         $query->whereHas('tingkatStudi', function ($q) use ($request) {
            $q->whereIn('tingkat_studis.id', $request->id_tingkat_studi);
         });
      }

      // Filter by Jenis Beasiswa
      if ($isJenisBeasiswaFiltered) {
         $query->whereIn('jenis_beasiswa', $request->jenis_beasiswa);
      }

      // Filter by Negara
      if ($request->has('id_negara')) {
         $query->whereHas('negara', function ($q) use ($request) {
            $q->whereIn('negaras.id', $request->id_negara);
         });
      }

      $data = $query->with('negara', 'tingkatStudi')->orderBy('tanggal_registrasi', $sort)->get();
      $negara = Negara::all();
      $tingkatStudi = TingkatStudi::all();

      // Redirect to kalender view with a not found message if no articles are found
      if ($data->isEmpty()) {
         $message = $isJenisBeasiswaFiltered ? 'No articles found for the selected "Jenis Beasiswa"' : 'No articles found';

         return view('frontend.kalender', [
            'data' => collect(), // Passing an empty collection
            'negara' => $negara,
            'tingkatStudi' => $tingkatStudi,
            'message' => $message,
            'sort' => $sort // Pass sort parameter to view
         ]);
      }

      return view('frontend.kalender', [
         'data' => $data,
         'negara' => $negara,
         'tingkatStudi' => $tingkatStudi,
         'sort' => $sort // Pass sort parameter to view
      ]);
   }


   public function detail($id)
   {
      $data = KalenderBeasiswa::with('negara', 'tingkatStudi')->findOrFail($id);
      $negara = Negara::all();
      $tingkatStudi = TingkatStudi::all();

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

   public function daftarBeasiswa($id)
   {
      $beasiswa = KalenderBeasiswa::findOrFail($id);

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
