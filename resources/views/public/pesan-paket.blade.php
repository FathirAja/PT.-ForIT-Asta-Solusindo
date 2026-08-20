@extends('layouts.app')

@section('content')
<section class="py-5" style="margin-top:76px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="text-center mb-4">
          <p class="section-label mb-2">BERLANGGANAN</p>
          <h2 class="fw-bold">{{ $paket->nama_paket }} - {{ $paket->kecepatan }}</h2>
          <p class="text-muted">Lengkapi data berikut untuk berlangganan paket ini.</p>
        </div>
        <div class="card p-4">
          <form method="POST" action="{{ route('paket.pesan', $paket) }}">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
              @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
              @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">No. Telepon</label>
              <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
              @error('telepon') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat Pemasangan</label>
              <textarea name="alamat" rows="3" class="form-control" required>{{ old('alamat') }}</textarea>
              @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Catatan (opsional)</label>
              <textarea name="catatan" rows="2" class="form-control">{{ old('catatan') }}</textarea>
            </div>
            <button type="submit" class="btn btn-{{ $paket->warna }} w-100">Kirim Pesanan</button>
            <a href="{{ route('layanan') }}" class="btn btn-outline-secondary w-100 mt-2">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection