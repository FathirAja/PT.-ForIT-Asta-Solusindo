@extends('layouts.app')

@section('content')
<section class="py-5" style="margin-top:76px;">
  <div class="container">
    <div class="text-center mb-5">
      <p class="section-label mb-2">KONTAK</p>
      <h2 class="fw-bold">Hubungi Kami</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-5">
        <div class="p-4 border h-100" style="border-radius:6px;">
          <p><i class="fa-solid fa-location-dot text-primary me-2"></i>Cimahi, Indonesia</p>
          <p><i class="fa-solid fa-envelope text-primary me-2"></i>sales@sid.net.id</p>
          <p><i class="fa-solid fa-phone text-primary me-2"></i>0821-1900-1500</p>
          <div class="ratio ratio-4x3 mt-3 overflow-hidden" style="border-radius:6px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9610317303523!2d107.53965587601668!3d-6.895264667478377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e56fca03dc83%3A0xc6c42797bedcc686!2sPT.%20ForIT%20Asta%20Solusindo%20-%20SIDNet!5e0!3m2!1sid!2sid!4v1786450187587!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="card p-4">
          @if (session('sukses'))
          <div class="alert alert-success">{{ session('sukses') }}</div>
          @endif
          <form method="POST" action="{{ route('kontak.kirim') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
              @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
              @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Subjek</label>
              <input type="text" name="subjek" class="form-control" value="{{ old('subjek') }}" required>
              @error('subjek') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Pesan</label>
              <textarea name="pesan" rows="5" class="form-control" required>{{ old('pesan') }}</textarea>
              @error('pesan') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection