@extends('layouts.admin')

@section('page-title', 'Edit Layanan')

@section('content')
<div class="page-header">
  <div>
    <h5>Edit Layanan</h5>
    <p>Perbarui informasi layanan "{{ $layanan->nama }}".</p>
  </div>
</div>

<div class="form-panel">
  <form method="POST" action="{{ route('admin.layanan.update', $layanan) }}">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label">Nama Layanan</label>
      <input type="text" name="nama" class="form-control" value="{{ old('nama', $layanan->nama) }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Icon</label>
      <input type="text" name="icon" class="form-control" value="{{ old('icon', $layanan->icon) }}" required>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn-admin">Simpan Perubahan</button>
      <a href="{{ route('admin.layanan.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection