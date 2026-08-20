@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

<div class="mb-4">
  <h5 class="fw-bold mb-1">Selamat datang, {{ auth()->user()->nama }}</h5>
  <p class="text-muted small mb-0">Berikut ringkasan aktivitas Profil Company hari ini.</p>
</div>

<div class="row g-3 mb-4">
  <div class="col-md-3">
    <div class="dash-card">
      <div class="dash-icon bg-primary bg-opacity-10 text-primary">
        <i class="fa-solid fa-briefcase"></i>
      </div>
      <div>
        <h3 class="mb-0">{{ $totalLayanan }}</h3>
        <p class="text-muted small mb-0">Layanan Aktif</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="dash-card">
      <div class="dash-icon bg-primary bg-opacity-10 text-primary">
        <i class="fa-solid fa-box"></i>
      </div>
      <div>
        <h3 class="mb-0">{{ $totalPaket }}</h3>
        <p class="text-muted small mb-0">Paket Tersedia</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="dash-card">
      <div class="dash-icon bg-success bg-opacity-10 text-success">
        <i class="fa-solid fa-envelope"></i>
      </div>
      <div>
        <h3 class="mb-0">{{ $totalPesan }}</h3>
        <p class="text-muted small mb-0">Pesan Masuk</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <a href="{{ route('admin.pesanan-paket.index') }}" class="text-decoration-none">
      <div class="dash-card {{ $totalPesananBaru > 0 ? 'dash-card-alert' : '' }}">
        <div class="dash-icon bg-danger bg-opacity-10 text-danger">
          <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <div>
          <h3 class="mb-0">{{ $totalPesananBaru }}</h3>
          <p class="text-muted small mb-0">Pesanan Baru</p>
        </div>
      </div>
    </a>
  </div>
</div>

<div class="row g-3">
  <div class="col-md-6">
    <div class="dash-panel">
      <h6 class="fw-bold mb-3"><i class="fa-solid fa-bolt text-primary me-2"></i>Aksi Cepat</h6>
      <div class="d-grid gap-2">
        <a href="{{ route('admin.layanan.create') }}" class="dash-action">
          <i class="fa-solid fa-plus"></i> Tambah Layanan Baru
        </a>
        <a href="{{ route('admin.paket.create') }}" class="dash-action">
          <i class="fa-solid fa-plus"></i> Tambah Paket Baru
        </a>
        <a href="{{ route('admin.pesanan-paket.index') }}" class="dash-action">
          <i class="fa-solid fa-list-check"></i> Kelola Pesanan Masuk
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="dash-panel">
      <h6 class="fw-bold mb-3"><i class="fa-solid fa-circle-info text-primary me-2"></i>Informasi Akun</h6>
      <table class="table table-sm table-borderless mb-0">
        <tr>
          <td class="text-muted">Nama</td>
          <td class="fw-medium">{{ auth()->user()->nama }}</td>
        </tr>
        <tr>
          <td class="text-muted">Email</td>
          <td class="fw-medium">{{ auth()->user()->email }}</td>
        </tr>
        <tr>
          <td class="text-muted">Role</td>
          <td><span class="badge bg-primary bg-opacity-10 text-primary">Administrator</span></td>
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection