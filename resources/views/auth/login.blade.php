<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('images/LogoforIT.webp') }}">
<title>Login - {{ config('app.name') }}</title>
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
<div class="auth-wrapper">
  <div class="auth-brand">
    <div class="auth-brand-logo"><img src="{{ asset('images/Web_Sidnet.webp') }}" alt="Logo" height="40"></div>
    <div class="auth-brand-quote">
      <h2>Koneksi cepat, layanan digital yang andal.</h2>
      <p>Masuk untuk mengelola akun Anda atau memantau layanan Metro FTTH SIDNet dan proyek pengembangan web bersama kami.</p>
    </div>
    <div class="auth-brand-foot">© {{ date('Y') }} PT. ForIT Asta Solusindo — Cimahi, Indonesia</div>
  </div>

  <div class="auth-form-side">
    <div class="auth-form-box">
      <h4>Selamat Datang</h4>
      <p class="sub">Masuk ke akun Anda sebagai Admin atau User</p>

      @php
        $seconds = session('lockout_seconds', $lockoutSeconds ?? null);
      @endphp

      @if ($seconds && $seconds > 0)
        <div class="alert-lockout" id="lockoutAlert">
          <i class="fa-solid fa-lock"></i>
          <span>Terlalu banyak percobaan gagal. Coba lagi dalam <strong id="countdown">{{ $seconds }}</strong> detik.</span>
        </div>
      @elseif ($errors->any())
        <div class="alert-error">
          <i class="fa-solid fa-triangle-exclamation me-1"></i> {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('login.submit') }}" id="formLogin">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus {{ ($seconds && $seconds > 0) ? 'disabled' : '' }}>
        </div>
        <div class="mb-4">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required {{ ($seconds && $seconds > 0) ? 'disabled' : '' }}>
        </div>
        <button type="submit" class="btn-auth" id="btnLogin" {{ ($seconds && $seconds > 0) ? 'disabled' : '' }}>
          Masuk
        </button>
      </form>

      <div class="auth-divider">— atau —</div>

      <p class="text-center small auth-links mb-1">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
      <p class="text-center small auth-links"><a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left me-1"></i>Kembali ke Beranda</a></p>
    </div>
  </div>

</div>

@if ($seconds && $seconds > 0)
<script>
let sisaDetik = {{ $seconds }};
const countdownEl = document.getElementById('countdown');
const btnLogin = document.getElementById('btnLogin');
const inputs = document.querySelectorAll('#formLogin input');

const timer = setInterval(() => {
  sisaDetik--;
  if (countdownEl) countdownEl.textContent = sisaDetik;

  if (sisaDetik <= 0) {
    clearInterval(timer);
    inputs.forEach(el => el.disabled = false);
    if (btnLogin) btnLogin.disabled = false;
    document.getElementById('lockoutAlert')?.remove();
  }
}, 1000);
</script>
@endif
</body>
</html>