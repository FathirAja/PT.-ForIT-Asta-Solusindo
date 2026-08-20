<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('images/LogoForIT.webp') }}">
<title>Admin - {{ config('app.name') }}</title>
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
</head>
<body>
<div class="admin-layout">
    @include('partials.sidebar')
    <div class="admin-content">
        <nav class="navbar navbar-light bg-white shadow-sm px-3 px-md-4">
            <button class="btn-sidebar-toggle d-lg-none" id="sidebarToggle">
                <i class="fa-solid fa-bars"></i>
            </button>
            <span class="fw-bold">@yield('page-title', 'Dashboard')</span>
            <span class="d-none d-md-inline">Halo, {{ auth()->user()->nama }}</span>
        </nav>
        <div class="container-fluid p-3 p-md-4">
            @if (session('sukses'))
                <div class="alert alert-success">{{ session('sukses') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
<div class="sidebar-overlay" id="sidebarOverlay"></div>
<script>
const toggle = document.getElementById('sidebarToggle');
const overlay = document.getElementById('sidebarOverlay');
const sidebar = document.querySelector('.admin-sidebar');

if (toggle) {
  toggle.addEventListener('click', () => {
    sidebar.classList.toggle('show');
    overlay.classList.toggle('show');
  });
}
if (overlay) {
  overlay.addEventListener('click', () => {
    sidebar.classList.remove('show');
    overlay.classList.remove('show');
  });
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>