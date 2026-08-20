@extends('layouts.app')

@section('content')
<section class="py-5" style="margin-top:76px;">
  <div class="container">
    <div class="text-center mb-5">
      <p class="section-label mb-2">TENTANG DEVELOPER</p>
      <h2 class="fw-bold">Profil Pengembang Website</h2>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card p-4 p-md-5">

          <div class="row g-4 align-items-center mb-4">
            <div class="col-md-4 text-center">
              <img src="{{ asset('images/profil.jpg') }}"
                   class="img-fluid rounded-circle"
                   style="width:180px; height:180px; object-fit:cover; border:3px solid #EAF4FF;"
                   alt="Foto Profil">
            </div>
            <div class="col-md-8">
              <h3 class="fw-bold mb-1">FATHIR MUHAMAD AR RAHMAN</h3>
              <p class="text-muted mb-3">12 RPL 1 &middot; SMK Negeri 1 Maja</p>
              <p class="mb-0">
                Perkenalkan, saya Fathir Muhamad Ar Rahman. Saya adalah seorang siswa kelas 12 jurusan Rekayasa Perangkat Lunak di SMK Negeri 1 Maja. Saya memiliki minat yang besar dalam bidang pengembangan web dan ingin menjadi seorang web developer profesional.
              </p>
            </div>
          </div>

          <hr class="my-4">
          <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
              <p class="bukti-label mb-1">Kelas</p>
              <p class="fw-medium mb-0">12 RPL 1</p>
            </div>
            <div class="col-6 col-md-3">
              <p class="bukti-label mb-1">Jurusan</p>
              <p class="fw-medium mb-0">Rekayasa Perangkat Lunak</p>
            </div>
            <div class="col-6 col-md-3">
              <p class="bukti-label mb-1">Asal Sekolah</p>
              <p class="fw-medium mb-0">SMK Negeri 1 Maja</p>
            </div>
          </div>

          <div class="bukti-paket-box p-3 mb-4">
            <p class="bukti-label mb-2">TENTANG PROJECT INI</p>
            <h6 class="fw-bold mb-1">Website Company Profile PT. ForIT Asta Solusindo</h6>
            <p class="small text-muted mb-0">
              Project ini adalah sebuah website company profile untuk PT. ForIT Asta Solusindo yang dibuat dengan menggunakan Laravel, Bootstrap, dan MySQL. Project ini dibuat sebagai tugas untuk memenuhi Sertifikasi Kompetensi dan juga untuk memperkenalkan perusahaan kepada masyarakat luas.
            </p>
          </div>

          <div>
            <p class="bukti-label mb-2">KONTAK</p>
            <div class="d-flex flex-wrap gap-3">
              <a href="mailto:[fathirmar@gmail.com]" class="footer-link-alt">
                <i class="fa-solid fa-envelope me-2"></i>fathirmar@gmail.com
              </a>
              <a href="https://wa.me/6285860020965" class="footer-link-alt" target="_blank">
                <i class="fa-brands fa-whatsapp me-2"></i>+6285860020965
              </a>
              <a href="https://instagram.com/fathirm.a.r" class="footer-link-alt" target="_blank">
                <i class="fa-brands fa-instagram me-2"></i>fathirm.a.r
              </a>
              <a href="https://github.com/FathirAja" class="footer-link-alt" target="_blank">
                <i class="fa-brands fa-github me-2"></i>FathirAja
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection