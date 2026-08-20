@extends('layouts.admin')

@section('page-title', 'Tambah Paket')

@section('content')
<div class="page-header">
  <div>
    <h5>Tambah Paket</h5>
    <p>Buat paket berlangganan baru untuk salah satu layanan.</p>
  </div>
</div>

<div class="form-panel">
  <form method="POST" action="{{ route('admin.paket.store') }}">
    @csrf

    <p class="section-title">Informasi Paket</p>
    <div class="mb-3">
      <label class="form-label">Layanan</label>
      <select name="layanan_id" class="form-select" required>
        <option value="">Pilih layanan</option>
        @foreach ($layananList as $l)
        <option value="{{ $l->id }}" {{ old('layanan_id') == $l->id ? 'selected' : '' }}>{{ $l->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Nama Paket</label>
      <input type="text" name="nama_paket" class="form-control" placeholder="Contoh: SIDFiber 50" value="{{ old('nama_paket') }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Kecepatan / Spesifikasi</label>
      <input type="text" name="kecepatan" class="form-control" placeholder="Contoh: 50 Mbps" value="{{ old('kecepatan') }}">
    </div>

    <p class="section-title">Harga & Detail</p>
    <div class="mb-3">
      <label class="form-label">Harga (Rp)</label>
      <input type="number" name="harga" class="form-control" placeholder="250000" value="{{ old('harga') }}" required min="0">
    </div>
    <div class="mb-3">
      <label class="form-label">Tipe</label>
      <input type="text" name="tipe" class="form-control" placeholder="FTTH SIDNet" value="{{ old('tipe', 'FTTH') }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Warna Tampilan</label>
      <select name="warna" class="form-select" required>
        <option value="primary" {{ old('warna') == 'primary' ? 'selected' : '' }}>Biru</option>
        <option value="success" {{ old('warna') == 'success' ? 'selected' : '' }}>Hijau</option>
        <option value="warning" {{ old('warna') == 'warning' ? 'selected' : '' }}>Kuning</option>
        <option value="info" {{ old('warna') == 'info' ? 'selected' : '' }}>Cyan</option>
        <option value="dark" {{ old('warna') == 'dark' ? 'selected' : '' }}>Gelap</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Urutan Tampil</label>
      <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}">
      <p class="form-text-hint">Angka lebih kecil tampil lebih dulu di halaman Layanan.</p>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-admin">Simpan Paket</button>
      <a href="{{ route('admin.paket.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection