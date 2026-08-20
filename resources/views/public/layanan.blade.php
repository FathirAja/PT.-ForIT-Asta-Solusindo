@extends('layouts.app')

@section('content')
<section class="py-5" style="margin-top:76px;">
  <div class="container">
    <div class="text-center mb-5">
      <p class="section-label mb-2">LAYANAN</p>
      <h2 class="fw-bold">Layanan Yang Kami Sediakan</h2>
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

@foreach ($layanan as $item)
  @if ($item->pakets->count() > 0)
  <section class="py-5 {{ $loop->even ? '' : 'bg-light-blue' }}">
    <div class="container">
      <div class="text-center mb-5">
        <p class="section-label mb-2">PILIHAN PAKET</p>
        <h2 class="fw-bold">{{ $item->nama }}</h2>
        <p class="text-muted">Beberapa pilihan paket {{ strtolower($item->nama) }} yang bisa Anda sesuaikan dengan kebutuhan.</p>
      </div>
      <div class="row row-cols-2 row-cols-md-4 g-3 justify-content-center">
        @foreach ($item->pakets as $paket)
        <div class="col">
          <div class="card h-100 paket-card overflow-hidden text-center">
            <div class="paket-header text-white py-2 bg-{{ $paket->warna }}">
              {{ $paket->nama_paket }}
            </div>
            <div class="py-4">
              <span class="display-6 fw-bold">{{ $paket->kecepatan }}</span>
            </div>
            <div class="pb-2">
              <div class="paket-tipe py-2 bg-{{ $paket->warna }} bg-opacity-25">{{ $paket->tipe }}</div>
            </div>
            <div class="p-3">
              <a href="{{ route('paket.form', $paket) }}" class="btn btn-{{ $paket->warna }} w-100">Berlangganan</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
@endforeach
@endsection