@extends('layouts.app')

@section('content')
<section class="py-5" style="margin-top:76px;">
  <div class="container">
    <div class="text-center mb-5">
      <p class="section-label mb-2">TENTANG KAMI</p>
      <h2 class="fw-bold">Mengenal Profil Company</h2>
    </div>
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <img src="{{ asset('images/unnamed.webp') }}" class="img-fluid w-100" style="border-radius:6px; height:480px; object-fit:cover;" alt="Profil Perusahaan">
      </div>
      <div class="col-md-6">
        <h5 class="fw-bold">Sejarah Perusahaan</h5>
        <p class="text-muted">​Perusahaan kami, yang berfokus pada pengadaan dan jasa telekomunikasi, telah berdiri sejak tahun 2019 dengan misi utama untuk memberikan solusi IT yang komprehensif dan inovatif. Kami memahami bahwa setiap pelanggan memiliki kebutuhan unik dan tantangan yang beragam, baik itu di bidang teknis maupun non-teknis. Oleh karena itu, kami hadir untuk menawarkan berbagai layanan dan solusi yang dirancang khusus untuk membantu pelanggan kami mengatasi setiap masalah yang mereka hadapi di lapangan.
          <br>
          <br>
          ​Dengan tim ahli yang berpengalaman dan teknologi mutakhir, kami tidak hanya menyediakan produk telekomunikasi berkualitas tinggi, tetapi juga menawarkan dukungan teknis yang handal serta layanan konsultasi yang dapat membantu perusahaan Anda mencapai efisiensi operasional yang maksimal. Kami berkomitmen untuk selalu memberikan layanan terbaik dan solusi yang tepat guna memastikan bahwa kebutuhan dan harapan pelanggan kami terpenuhi secara optimal.
        </p>
        <div class="row mt-4 g-3">
          <div class="col-6">
            <div class="p-3 border h-100" style="border-radius:6px;">
              <h6 class="fw-bold">Visi</h6>
              <p class="small text-muted mb-0">Menjadi perusahaan IT terdepan yang dipercaya oleh klien lokal maupun nasional.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="p-3 border h-100" style="border-radius:6px;">
              <h6 class="fw-bold">Misi</h6>
              <p class="small text-muted mb-0">Menghadirkan solusi teknologi berkualitas dan mengutamakan kepuasan klien.</p>
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
      <p class="section-label mb-2">MITRA KAMI</p>
      <h2 class="fw-bold">Kemitraan yang Kami Bangun</h2>
      <p class="text-muted">Kami percaya pada kemitraan yang berkelanjutan dengan pelanggan kami, bekerja sama untuk mengidentifikasi dan memenuhi kebutuhan mereka dengan solusi yang paling efektif dan efisien.</p>
    </div>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
      @php
        $mitraList = [
          'TIS.webp',
          'winter-access.webp',
          'AUTODESK.webp',
          'BESTPATH.webp',
          'CISCO.webp',
          'TELKOMSEL.webp',
          'IDNIC.webp',
          'INTEL.webp',
          'JAGONET.webp',
          'LINKSYS.webp',
          'METRODATA.webp',
          'MSOS.webp',
          'MTA.webp',
          'NIXTRAIN.webp',
          'PKSTI.webp',
          'ACA.webp',
          'APJII.webp',
          'CIMAHI.webp',
          'CTP.webp',
          'KEMKOMINFO.webp'
        ];
      @endphp
      @foreach ($mitraList as $logo)
      <div class="col">
        <div class="card h-100 d-flex align-items-center justify-content-center p-3 mitra-card">
          <img src="{{ asset('images/mitra/' . $logo) }}" class="img-fluid" style="max-height:110px;" alt="Mitra">
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection