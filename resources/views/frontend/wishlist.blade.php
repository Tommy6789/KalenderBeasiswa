@extends('frontend.partials.master')

@section('content')
<!-- Spacing before content -->
<div class="container my-5">

<!-- Main Row -->
<div class="row">

<!-- Main Content Area -->
<div class="col-lg-9">

<!-- Flash Messages for Feedback -->
@if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif
@if (session('info'))
<div class="alert alert-info">
{{ session('info') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<!-- Wishlist Section -->
<section class="content">
<div class="row" id="wishlistArticles">
@if ($wishlists->isEmpty())
<!-- No Items in Wishlist -->
<div class="col-12 text-center">
<h2>Wishlist Kosong</h2>
<p>Belum ada item di wishlist Anda. Tambahkan item untuk melihatnya di sini.</p>
</div>
@else
<!-- Display Wishlist Items -->
@foreach ($wishlists as $wishlist)
@if ($wishlist->kalenderBeasiswa)
<div class="col-lg-6 mb-4">
<div class="card h-100 shadow-sm">

  <!-- Card Body -->
  <div class="card-body">
      
      <!-- Tags for Study Level and Country -->
      <div class="mb-3">
          @foreach ($wishlist->kalenderBeasiswa->tingkatStudi as $tingkat)
              <span class="badge bg-primary">{{ $tingkat->nama }}</span>
          @endforeach
          @foreach ($wishlist->kalenderBeasiswa->negara as $negara)
              <span class="badge bg-success">{{ $negara->nama }}</span>
          @endforeach
      </div>

      <!-- Scholarship Type -->
      @if (is_array($wishlist->kalenderBeasiswa->jenis_beasiswa))
          @foreach ($wishlist->kalenderBeasiswa->jenis_beasiswa as $jenis)
              <p>{{ $jenis == 'full' ? 'Full Scholarship' : 'Partial Scholarship' }}</p>
          @endforeach
      @elseif(is_string($wishlist->kalenderBeasiswa->jenis_beasiswa))
          <p>{{ $wishlist->kalenderBeasiswa->jenis_beasiswa == 'full' ? 'Beasiswa Penuh' : 'Beasiswa Sebagian' }}</p>
      @endif

      <!-- Scholarship Title -->
      <h5 class="card-title text-center mt-3">{{ $wishlist->kalenderBeasiswa->judul }}</h5>

      <!-- Scholarship Dates -->
      <div class="bg-light p-3 mt-3 rounded">
          <div class="d-flex justify-content-between">
              <p><strong>Tanggal Registrasi:</strong></p>
              <p>{{ $wishlist->kalenderBeasiswa->tanggal_registrasi }}</p>
          </div>
          <div class="d-flex justify-content-between">
              <p><strong>Deadline:</strong></p>
              <p class="text-danger">{{ $wishlist->kalenderBeasiswa->deadline }}</p>
          </div>
      </div>

      <!-- Action Buttons -->
      <a href="{{ route('detail', ['id' => $wishlist->kalenderBeasiswa->id]) }}" class="btn btn-primary mt-3 w-100">Detail Beasiswa</a>
      <form action="{{ route('wishlist.remove', $wishlist->kalenderBeasiswa->id) }}" method="POST" class="mt-2">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-warning w-100">Hapus dari Wishlist</button>
      </form>
  </div>
</div>
</div>
@endif
@endforeach
@endif
</div>
</section>
</div>
</div>
</div>
@endsection
