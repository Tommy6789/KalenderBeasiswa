@extends('frontend.partials.master')

@section('content')
{{-- Mashead Section --}}
<div id="carouselHeader" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <header class="masthead" id="home" style="background-image: url('{{ asset('assets/img/bg-masthead.jpg') }}'); background-size: cover; background-position: center; position: relative;">
        <!-- Dark Overlay -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.463);"></div>
        <div class="container h-100 d-flex align-items-center justify-content-center">
          <div class="row text-center">
            <div class="col-lg-10 mx-auto" style="position: relative; z-index: 1;">
              <h1 class="text-white font-weight-bold">Masa Depan Dimulai di Sini</h1>
              <p class="text-light mt-3 mb-5">Temukan berbagai beasiswa dan program studi yang akan membawa karirmu ke level selanjutnya.</p>
            </div>
          </div>
        </div>
      </header>
    </div>
    <div class="carousel-item">
      <header class="masthead" id="home" style="background-image: url('{{ asset('assets/img/bg-masthead3.png') }}'); background-size: cover; background-position: center; position: relative;">
        <!-- Dark Overlay -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.463);"></div>
        <div class="container h-100 d-flex align-items-center justify-content-center">
          <div class="row text-center">
            <div class="col-lg-10 mx-auto" style="position: relative; z-index: 1;">
              <h1 class="text-white font-weight-bold">Temukan Beasiswa Terbaik</h1>
              <p class="text-light mt-3 mb-5">Berbagai program beasiswa menantimu, tingkatkan potensi dirimu sekarang!</p>
            </div>
          </div>
        </div>
      </header>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselHeader" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselHeader" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

{{-- Section Event Terkini --}}
<section id="events" class="page-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading text-uppercase">Event Terkini</h2>
      <p class="section-subheading text-muted">Ikuti seminar, workshop, dan event terbaru terkait dunia pendidikan dan beasiswa.</p>
    </div>
    <div class="row">
      {{-- Event 1 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Webinar: Peluang Beasiswa 2024</h5>
            <p class="card-text text-muted">Tanggal: 5 Oktober 2024<br>Waktu: 10.00 WIB<br>Tempat: Online</p>
          </div>
        </div>
      </div>
      {{-- Event 2 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Workshop: Persiapan Studi ke Luar Negeri</h5>
            <p class="card-text text-muted">Tanggal: 12 Oktober 2024<br>Waktu: 09.00 WIB<br>Tempat: Universitas X</p>
          </div>
        </div>
      </div>
      {{-- Event 3 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Seminar: Masa Depan Pendidikan Digital</h5>
            <p class="card-text text-muted">Tanggal: 19 Oktober 2024<br>Waktu: 13.00 WIB<br>Tempat: Auditorium Universitas Y</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Section Artikel Berita --}} 
<section id="artikel" class="page-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading text-uppercase">Berita Terbaru</h2>
      <p class="section-subheading text-muted">Dapatkan informasi terbaru mengenai dunia pendidikan dan beasiswa.</p>
    </div>
    <div class="row">
      {{-- Artikel 1 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          {{-- <img src="path/to/image1.jpg" class="card-img-top" alt="Deskripsi gambar artikel 1"> --}}
          <div class="card-body">
            <h5 class="card-title">Beasiswa ke Luar Negeri Meningkat di Tahun 2024</h5>
            <p class="card-text text-muted">Jumlah mahasiswa yang mendapatkan beasiswa ke luar negeri terus meningkat...</p>
          </div>
        </div>
      </div>
      {{-- Artikel 2 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          {{-- <img src="path/to/image2.jpg" class="card-img-top" alt="Deskripsi gambar artikel 2"> --}}
          <div class="card-body">
            <h5 class="card-title">Program Magister Baru di Bidang AI</h5>
            <p class="card-text text-muted">Universitas X meluncurkan program magister baru yang berfokus pada kecerdasan buatan...</p>
          </div>
        </div>
      </div>
      {{-- Artikel 3 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          {{-- <img src="path/to/image3.jpg" class="card-img-top" alt="Deskripsi gambar artikel 3"> --}}
          <div class="card-body">
            <h5 class="card-title">Panduan Lengkap Melamar Beasiswa</h5>
            <p class="card-text text-muted">Berikut tips dan trik melamar beasiswa agar sukses mendapatkan peluang terbaik...</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Section Beasiswa --}}
<section id="beasiswa" class="page-section py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading text-uppercase">Beasiswa Terbaru</h2>
      <p class="section-subheading text-muted">Dapatkan informasi terbaru mengenai beasiswa di dalam maupun luar negeri.</p>
    </div>
    <div class="row">
      {{-- Beasiswa Item 1 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Beasiswa S1 Luar Negeri</h5>
            <p class="card-text text-muted">Beasiswa penuh untuk studi di universitas-universitas ternama di Eropa dan Amerika.</p>
          </div>
        </div>
      </div>
      {{-- Beasiswa Item 2 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Beasiswa Riset S2</h5>
            <p class="card-text text-muted">Beasiswa riset untuk mahasiswa pascasarjana di bidang teknologi dan kesehatan.</p>
          </div>
        </div>
      </div>
      {{-- Beasiswa Item 3 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Beasiswa Pengembangan SDM</h5>
            <p class="card-text text-muted">Dukungan finansial untuk pengembangan keterampilan manajemen dan kepemimpinan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Section Program Studi --}}
<section id="program" class="page-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading text-uppercase">Program Studi Unggulan</h2>
      <p class="section-subheading text-muted">Pilih program studi yang sesuai dengan minat dan bakatmu.</p>
    </div>
    <div class="row">
      {{-- Program Studi 1 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Teknologi Informasi</h5>
            <p class="card-text text-muted">Mengembangkan keterampilan di bidang pemrograman, keamanan siber, dan AI.</p>
          </div>
        </div>
      </div>
      {{-- Program Studi 2 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Kesehatan Masyarakat</h5>
            <p class="card-text text-muted">Fokus pada peningkatan kualitas kesehatan masyarakat melalui penelitian.</p>
          </div>
        </div>
      </div>
      {{-- Program Studi 3 --}}
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Manajemen Bisnis</h5>
            <p class="card-text text-muted">Mengembangkan keterampilan kepemimpinan dan manajerial dalam dunia bisnis.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Section Testimoni --}}
<section id="testimoni" class="page-section bg-light py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading text-uppercase">Apa Kata Mereka</h2>
      <p class="section-subheading text-muted">Pengalaman dan testimoni dari penerima beasiswa kami.</p>
    </div>
    <div class="row">
      {{-- Testimoni 1 --}}
      <div class="col-lg-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5>"Berhasil mendapatkan beasiswa ke Eropa berkat informasi yang saya temukan di portal ini."</h5>
            <p class="text-muted">- Rina, Mahasiswa S2 Teknik</p>
          </div>
        </div>
      </div>
      {{-- Testimoni 2 --}}
      <div class="col-lg-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5>"Portal ini membantu saya memilih program studi yang tepat untuk karir masa depan saya."</h5>
            <p class="text-muted">- Andi, Alumni Kesehatan Masyarakat</p>
          </div>
        </div>
      </div>
      {{-- Testimoni 3 --}}
      <div class="col-lg-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5>"Dukungan beasiswa sangat membantu dalam mengembangkan kemampuan manajemen saya."</h5>
            <p class="text-muted">- Budi, Penerima Beasiswa Pengembangan SDM</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Section FAQ --}}
<section id="faq" class="page-section py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading text-uppercase">Pertanyaan yang Sering Diajukan</h2>
      <p class="section-subheading text-muted">Temukan jawaban atas pertanyaan umum mengenai beasiswa dan program studi.</p>
    </div>
    <div class="row">
      {{-- FAQ 1 --}}
      <div class="col-md-6">
        <h5 class="font-weight-bold">Bagaimana cara melamar beasiswa?</h5>
        <p class="text-muted">Anda dapat melamar beasiswa melalui website resmi pemberi beasiswa. Pastikan Anda memenuhi syarat dan melengkapi semua dokumen yang diperlukan.</p>
      </div>
      {{-- FAQ 2 --}}
      <div class="col-md-6">
        <h5 class="font-weight-bold">Apa saja persyaratan umum untuk beasiswa luar negeri?</h5>
        <p class="text-muted">Persyaratan umum biasanya meliputi IPK minimal, kemampuan bahasa asing (seperti TOEFL atau IELTS), serta rekomendasi dari dosen atau atasan.</p>
      </div>
      {{-- FAQ 3 --}}
      <div class="col-md-6">
        <h5 class="font-weight-bold">Apakah ada beasiswa untuk riset?</h5>
        <p class="text-muted">Ya, ada banyak beasiswa riset yang ditawarkan oleh berbagai lembaga, baik dalam negeri maupun luar negeri. Biasanya beasiswa ini mendukung riset di bidang teknologi, kesehatan, dan sains.</p>
      </div>
      {{-- FAQ 4 --}}
      <div class="col-md-6">
        <h5 class="font-weight-bold">Apakah saya bisa mendaftar lebih dari satu program studi?</h5>
        <p class="text-muted">Ya, beberapa universitas memperbolehkan Anda mendaftar lebih dari satu program studi, namun setiap universitas memiliki kebijakan yang berbeda-beda.</p>
      </div>
    </div>
  </div>
</section>

{{-- Section Kemitraan --}}
<section id="kemitraan" class="page-section bg-light py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-heading text-uppercase">Kemitraan & Sponsor</h2>
      <p class="section-subheading text-muted">Kami bekerja sama dengan berbagai lembaga untuk menyediakan beasiswa terbaik.</p>
    </div>
    <div class="row">
      {{-- Partner 1 --}}
      <div class="col-md-4 text-center">
        {{-- <img src="path/to/partner-logo1.jpg" class="img-fluid" alt="Logo Partner 1"> --}}
        <h5 class="mt-3">Lembaga XYZ</h5>
      </div>
      {{-- Partner 2 --}}
      <div class="col-md-4 text-center">
        {{-- <img src="path/to/partner-logo2.jpg" class="img-fluid" alt="Logo Partner 2"> --}}
        <h5 class="mt-3">Universitas ABC</h5>
      </div>
      {{-- Partner 3 --}}
      <div class="col-md-4 text-center">
        {{-- <img src="path/to/partner-logo3.jpg" class="img-fluid" alt="Logo Partner 3"> --}}
        <h5 class="mt-3">Yayasan DEF</h5>
      </div>
    </div>
  </div>
</section>


@endsection