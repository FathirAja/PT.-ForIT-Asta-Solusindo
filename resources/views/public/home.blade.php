@extends('layouts.app')

@section('content')
<section class="hero-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h1 class="text-white">PT. ForIT Asta Solusindo</h1>
        <p class="my-3">perusahaan yang berfokus pada pengadaan barang dan jasa di sektor telekomunikasi dan aplikasi </p>
        <a href="{{ route('tentang') }}" class="btn btn-light btn-lg me-2">Tentang Kami</a>
        <a href="{{ route('kontak') }}" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
      </div>
      <div class="col-lg-6"></div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <img src="{{ asset('images/unnamed.webp') }}" class="img-fluid w-100" style="border-radius:6px; height:340px; object-fit:cover;" alt="Profil Perusahaan">
      </div>
      <div class="col-md-6">
        <p class="section-label mb-2">TENTANG PERUSAHAAN</p>
        <h2 class="fw-bold mb-3">Profil Company</h2>
        <p class="text-muted">Perusahaan kami, yang berfokus pada pengadaan dan jasa telekomunikasi, telah berdiri sejak tahun 2019 dengan misi utama untuk memberikan solusi IT yang komprehensif dan inovatif. Kami memahami bahwa setiap pelanggan memiliki kebutuhan unik dan tantangan yang beragam, baik itu di bidang teknis maupun non-teknis. Oleh karena itu, kami hadir untuk menawarkan berbagai layanan dan solusi yang dirancang khusus untuk membantu pelanggan kami mengatasi setiap masalah yang mereka hadapi di lapangan.</p>
        <div class="row mt-4">
          <div class="col-6">
            <div class="p-3 border" style="border-radius:6px;">
              <h6 class="fw-bold">Visi</h6>
              <p class="small text-muted mb-0">Menjadi mitra IT terpercaya bagi setiap bisnis di Indonesia.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="p-3 border" style="border-radius:6px;">
              <h6 class="fw-bold">Misi</h6>
              <p class="small text-muted mb-0">Memberikan layanan IT berkualitas, inovatif, dan berkelanjutan.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light-blue">
  <div class="container">
    <div class="text-center mb-5">
      <p class="section-label mb-2">LAYANAN KAMI</p>
      <h2 class="fw-bold">Apa yang Kami Tawarkan</h2>
    </div>
    <div class="row g-4 justify-content-center">
      @foreach ($layanan as $item)
      <div class="col-md-5">
        <div class="card h-100 service-card">
          <i class="{{ $item->icon }}"></i>
          <h5 class="fw-bold">{{ $item->nama }}</h5>
          <p class="text-muted small mb-0">{{ $item->deskripsi }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection