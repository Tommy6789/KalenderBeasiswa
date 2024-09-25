@extends('frontend.partials.master')

@section('content')
<br>
<br>
<br>

<!-- Form Proposal Beasiswa -->
<div class="container mt-5">
  <section class="proposal">
    <form action="{{ route('proposal.store') }}" method="post">
      @csrf
      
      <!-- Bagian Kategori -->
      <div class="form-section mb-5">
        <h2 class="mb-4"><strong>Kategori</strong></h2>

        <!-- Pilih Negara -->
        <div class="form-group mb-4">
          <label for="option_negara" class="form-label">Negara</label>
          <select class="form-control" name="id_negara[]" id="option_negara" multiple required>
            @foreach ($negara as $i)
              <option value="{{ $i->id }}">{{ $i->nama }}</option>
            @endforeach
          </select>
        </div>

        <!-- Pilih Tingkat Studi -->
        <div class="form-group mb-4">
          <label for="option_tingkat_studi" class="form-label">Tingkat Studi</label>
          <select class="form-control" name="id_tingkat_studi[]" id="option_tingkat_studi" multiple required>
            @foreach ($tingkatStudi as $i)
              <option value="{{ $i->id }}">{{ $i->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- Bagian Tentang Beasiswa -->
      <div class="form-section mb-5">
        <h2 class="mb-4"><strong>Tentang Beasiswa</strong></h2>

        <!-- Tanggal Registrasi -->
        <div class="form-group mb-4">
          <label for="tanggal_registrasi" class="form-label">Tanggal Registrasi</label>
          <input type="date" class="form-control" name="tanggal_registrasi" id="tanggal_registrasi" required>
        </div>

        <!-- Deadline -->
        <div class="form-group mb-4">
          <label for="deadline" class="form-label">Deadline</label>
          <input type="date" class="form-control" name="deadline" id="deadline" required>
        </div>

        <!-- Judul Beasiswa -->
        <div class="form-group mb-4">
          <label for="judul" class="form-label">Judul Beasiswa</label>
          <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Beasiswa" required>
        </div>

        <!-- Nama Universitas -->
        <div class="form-group mb-4">
          <label for="nama" class="form-label">Nama Universitas</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Universitas" required>
        </div>

        <!-- Deskripsi Beasiswa -->
        <div class="form-group mb-4">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Deskripsi Beasiswa" required></textarea>
        </div>

        <!-- Jurusan -->
        <div class="form-group mb-4">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan yang Diterima" required>
        </div>

        <!-- Jenis Beasiswa -->
        <div class="form-group mb-4">
          <label for="jenis_beasiswa" class="form-label">Jenis Beasiswa</label>
          <select class="form-control" name="jenis_beasiswa" id="jenis_beasiswa" required>
            <option value="">Pilih Jenis Beasiswa</option>
            <option value="full">Full</option>
            <option value="partial">Partial</option>
          </select>
        </div>
      </div>

      <!-- Bagian Keuntungan -->
      <div class="form-section mb-5">
        <h2 class="mb-4"><strong>Keuntungan</strong></h2>
        <div class="form-group">
          <label for="keuntungan" class="form-label">Keuntungan Beasiswa</label>
          <textarea class="form-control" name="keuntungan" id="keuntungan" rows="5" placeholder="Jelaskan keuntungan yang akan didapatkan" required></textarea>
        </div>
      </div>

      <!-- Bagian Persyaratan -->
      <div class="form-section mb-5">
        <h2 class="mb-4"><strong>Persyaratan</strong></h2>

        <!-- Umur -->
        <div class="form-group mb-4">
          <label for="umur" class="form-label">Batasan Umur</label>
          <input type="text" class="form-control" name="umur" id="umur" placeholder="Contoh: 18 - 30 tahun" required>
        </div>

        <!-- GPA -->
        <div class="form-group mb-4">
          <label for="gpa" class="form-label">GPA Minimum</label>
          <input type="text" class="form-control" name="gpa" id="gpa" placeholder="Contoh: 3.5" required>
        </div>

        <!-- Tes Bahasa Inggris -->
        <div class="form-group mb-4">
          <label for="tes_english" class="form-label">Tes Bahasa Inggris</label>
          <input type="text" class="form-control" name="tes_english" id="tes_english" placeholder="Contoh: TOEFL, IELTS" required>
        </div>

        <!-- Tes Bahasa Lain -->
        <div class="form-group mb-4">
          <label for="tes_bahasa_lain" class="form-label">Tes Bahasa Lain</label>
          <input type="text" class="form-control" name="tes_bahasa_lain" id="tes_bahasa_lain" placeholder="Jika diperlukan">
        </div>

        <!-- Tes Standar Lain -->
        <div class="form-group mb-4">
          <label for="tes_standard" class="form-label">Tes Standar Lainnya</label>
          <input type="text" class="form-control" name="tes_standard" id="tes_standard" placeholder="Contoh: GMAT, GRE" required>
        </div>

        <!-- Dokumen Pendukung -->
        <div class="form-group mb-4">
          <label for="dokumen" class="form-label">Dokumen Pendukung</label>
          <input type="text" class="form-control" name="dokumen" id="dokumen" placeholder="Daftar dokumen yang dibutuhkan" required>
        </div>

        <!-- Persyaratan Lainnya -->
        <div class="form-group mb-4">
          <label for="lainnya" class="form-label">Persyaratan Lainnya</label>
          <input type="text" class="form-control" name="lainnya" id="lainnya" placeholder="Jika ada persyaratan tambahan">
        </div>
      </div>

      <!-- Tombol Submit -->
      <div class="form-footer text-center">
        <button type="submit" class="btn btn-primary px-5">Kiriman Proposal</button>
      </div>
    </form>
  </section>
</div>

<!-- JavaScript untuk Multi-Select -->
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new MultiSelectTag('option_negara');
    new MultiSelectTag('option_tingkat_studi');
});
</script>
@endsection
