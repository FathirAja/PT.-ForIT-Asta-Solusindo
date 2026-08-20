<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('images/LogoforIT.webp') }}">
<title>Daftar Akun - {{ config('app.name') }}</title>
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<div class="auth-wrapper">
  <div class="auth-brand">
    <div class="auth-brand-logo"><img src="{{ asset('images/Web_Sidnet.webp') }}" alt="Logo" height="40"></div>
    <div class="auth-brand-quote">
      <h2>Bergabunglah bersama kami.</h2>
      <p>Buat akun untuk mengakses layanan dan mengajukan langganan Paket Metro FTTH SIDNet dengan lebih mudah.</p>
      <ul class="auth-brand-list">
        <li><i class="fa-solid fa-check"></i>Ajukan langganan paket internet</li>
        <li><i class="fa-solid fa-check"></i>Pantau status pesanan Anda</li>
        <li><i class="fa-solid fa-check"></i>Akses informasi layanan terbaru</li>
      </ul>
    </div>
    <div class="auth-brand-foot">© {{ date('Y') }} PT. ForIT Asta Solusindo — Cimahi, Indonesia</div>
  </div>

  <div class="auth-form-side">
    <div class="auth-form-box">
      <h4>Buat Akun Baru</h4>
      <p class="sub">Lengkapi data berikut untuk mendaftar</p>

      @if ($errors->any())
      <div class="alert-error">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" minlength="6" required>
        </div>
        <div class="mb-4">
          <label class="form-label">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control" minlength="6" required>
        </div>
        <button type="submit" class="btn-auth">Daftar Sekarang</button>
      </form>

      <p class="text-center small auth-links mt-4 mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
    </div>
  </div>

</div>
</body>
</html>