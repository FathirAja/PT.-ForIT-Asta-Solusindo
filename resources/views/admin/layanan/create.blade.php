@extends('layouts.admin')

@section('page-title', 'Tambah Layanan')

@section('content')
<div class="page-header">
  <div>
    <h5>Tambah Layanan</h5>
    <p>Lengkapi informasi layanan baru di bawah ini.</p>
  </div>
</div>

<div class="form-panel">
  <form method="POST" action="{{ route('admin.layanan.store') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Layanan</label>
      <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Icon</label>
      <input type="text" name="icon" class="form-control" placeholder="fa-solid fa-globe" value="{{ old('icon') }}" required>
      <p class="form-text-hint">Gunakan class Font Awesome, contoh: fa-solid fa-wifi</p>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn-admin">Simpan Layanan</button>
      <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection