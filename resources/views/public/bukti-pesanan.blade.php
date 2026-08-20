@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/bukti-pesanan.css') }}">
@endpush

@section('content')
<section class="py-5" style="margin-top:76px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">

        <div class="text-center mb-4">
          <div class="success-icon mb-3">
            <i class="fa-solid fa-check"></i>
          </div>
          <h2 class="fw-bold">Pesanan Berhasil Dikirim</h2>
          <p class="text-muted">Simpan atau unduh bukti pemesanan Anda di bawah ini. Tim kami akan segera menghubungi Anda.</p>
        </div>

        <div class="card p-4 p-md-5 bukti-card">
          <div class="d-flex justify-content-between align-items-start mb-4 pb-3 border-bottom">
            <div>
              <p class="section-label mb-1">BUKTI PEMESANAN</p>
              <h5 class="fw-bold mb-0 bukti-id">#{{ str_pad($pesananPaket->id, 6, '0', STR_PAD_LEFT) }}</h5>
            </div>
            <span class="badge bg-primary bg-opacity-10 text-primary text-uppercase">{{ $pesananPaket->status }}</span>
          </div>

          <div class="row g-3 mb-4">
            <div class="col-6">
              <p class="bukti-label mb-1">Nama Pemesan</p>
              <p class="fw-medium mb-0">{{ $pesananPaket->nama }}</p>
            </div>
            <div class="col-6">
              <p class="bukti-label mb-1">Tanggal Pemesanan</p>
              <p class="fw-medium mb-0">{{ $pesananPaket->created_at->format('d F Y, H:i') }}</p>
            </div>
            <div class="col-6">
              <p class="bukti-label mb-1">Email</p>
              <p class="fw-medium mb-0">{{ $pesananPaket->email }}</p>
            </div>
            <div class="col-6">
              <p class="bukti-label mb-1">No. Telepon</p>
              <p class="fw-medium mb-0">{{ $pesananPaket->telepon }}</p>
            </div>
            <div class="col-12">
              <p class="bukti-label mb-1">Alamat Pemasangan</p>
              <p class="fw-medium mb-0">{{ $pesananPaket->alamat }}</p>
            </div>
          </div>

          <div class="border rounded p-3 mb-4 bukti-paket-box">
            <p class="bukti-label mb-2">PAKET YANG DIPESAN</p>
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="fw-bold mb-0">{{ $pesananPaket->paket->nama_paket }}</h6>
                <p class="small text-muted mb-0">{{ $pesananPaket->paket->layanan->nama ?? '-' }} &middot; {{ $pesananPaket->paket->kecepatan }}</p>
              </div>
              <span class="badge bg-{{ $pesananPaket->paket->warna }}">{{ $pesananPaket->paket->tipe }}</span>
            </div>
          </div>

          <div class="d-grid gap-2">
            <a href="{{ route('pesanan.bukti', ['pesananPaket' => $pesananPaket->id, 'download' => 1]) }}" class="btn btn-primary">
              <i class="fa-solid fa-download me-2"></i>Unduh Bukti (PDF)
            </a>
            <a href="{{ route('layanan') }}" class="btn btn-outline-secondary">
              Kembali ke Halaman Layanan
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection