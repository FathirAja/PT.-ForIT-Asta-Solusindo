<div class="admin-sidebar text-white p-3" style="background:#0A2E5C;">
  <div class="text-center mb-4">
    <img src="{{ asset('images/LogoforIT.webp') }}" alt="Logo" height="40" style="filter: brightness(0) invert(1);">
  </div>
  <ul class="nav flex-column gap-1">
    <li class="nav-item mb-2">
      <a class="nav-link text-white bg-primary bg-opacity-25" href="{{ route('home') }}">
        <i class="fa-solid fa-arrow-left me-2"></i>Kembali ke Website
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-gauge me-2"></i>Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ request()->routeIs('admin.layanan.*') ? 'bg-primary' : '' }}" href="{{ route('admin.layanan.index') }}">
        <i class="fa-solid fa-briefcase me-2"></i>Kelola Layanan
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ request()->routeIs('admin.paket.*') ? 'bg-primary' : '' }}" href="{{ route('admin.paket.index') }}">
        <i class="fa-solid fa-box me-2"></i>Kelola Paket
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ request()->routeIs('admin.pesanan-paket.*') ? 'bg-primary' : '' }}" href="{{ route('admin.pesanan-paket.index') }}">
        <i class="fa-solid fa-cart-shopping me-2"></i>Pesanan Paket
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ request()->routeIs('admin.pesan.*') ? 'bg-primary' : '' }}" href="{{ route('admin.pesan.index') }}">
        <i class="fa-solid fa-envelope me-2"></i>Pesan Masuk
      </a>
    </li>
    <li class="nav-item mt-3">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link text-white bg-transparent border-0 w-100 text-start">
          <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
        </button>
      </form>
    </li>
  </ul>
</div>