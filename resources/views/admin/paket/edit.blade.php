@extends('layouts.admin')

@section('page-title', 'Edit Paket')

@section('content')
<div class="page-header">
  <div>
    <h5>Edit Paket</h5>
    <p>Perbarui informasi paket "{{ $paket->nama_paket }}".</p>
  </div>
</div>

<div class="form-panel">
  <form method="POST" action="{{ route('admin.paket.update', $paket) }}">
    @csrf @method('PUT')

    <p class="section-title">Informasi Paket</p>
    <div class="mb-3">
      <label class="form-label">Layanan</label>
      <select name="layanan_id" class="form-select" required>
        @foreach ($layananList as $l)
        <option value="{{ $l->id }}" {{ $paket->layanan_id == $l->id ? 'selected' : '' }}>{{ $l->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Nama Paket</label>
      <input type="text" name="nama_paket" class="form-control" value="{{ old('nama_paket', $paket->nama_paket) }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Kecepatan / Spesifikasi</label>
      <input type="text" name="kecepatan" class="form-control" value="{{ old('kecepatan', $paket->kecepatan) }}">
    </div>

    <p class="section-title">Harga & Detail</p>
    <div class="mb-3">
      <label class="form-label">Harga (Rp)</label>
      <input type="number" name="harga" class="form-control" value="{{ old('harga', $paket->harga) }}" required min="0">
    </div>
    <div class="mb-3">
      <label class="form-label">Tipe</label>
      <input type="text" name="tipe" class="form-control" value="{{ old('tipe', $paket->tipe) }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Warna Tampilan</label>
      <select name="warna" class="form-select" required>
        <option value="primary" {{ $paket->warna == 'primary' ? 'selected' : '' }}>Biru</option>
        <option value="success" {{ $paket->warna == 'success' ? 'selected' : '' }}>Hijau</option>
        <option value="warning" {{ $paket->warna == 'warning' ? 'selected' : '' }}>Kuning</option>
        <option value="info" {{ $paket->warna == 'info' ? 'selected' : '' }}>Cyan</option>
        <option value="dark" {{ $paket->warna == 'dark' ? 'selected' : '' }}>Gelap</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Urutan Tampil</label>
      <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $paket->urutan) }}">
    </div>

    <div class="form-actions">
      <button type="submit" class="btn-admin">Simpan Perubahan</button>
      <a href="{{ route('admin.paket.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection