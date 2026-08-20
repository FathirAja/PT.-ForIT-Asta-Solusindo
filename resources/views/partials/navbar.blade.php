<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('images/Web_Sidnet.webp') }}" alt="Logo" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navMenu">
      <ul class="navbar-nav gap-1 align-items-lg-center">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tentang') }}">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('layanan') }}">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tentang.developer') }}">Developer</a></li>

        @auth
            @if (auth()->user()->isAdmin())
            <li class="nav-item dropdown ms-2">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user-shield me-1"></i>{{ auth()->user()->nama }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge me-2"></i>Dashboard Admin</a></li>
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</button>
                  </form>
                </li>
              </ul>
            </li>
            @else
            <li class="nav-item dropdown ms-2">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fa-solid fa-circle-user me-1"></i>{{ auth()->user()->nama }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</button>
                  </form>
                </li>
              </ul>
            </li>
            @endif
        @else
        <li class="nav-item ms-2">
          <a href="{{ route('login') }}" class="btn btn-primary btn-sm px-4"><i class="fa-solid fa-right-to-bracket me-1"></i> Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>