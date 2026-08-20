<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('images/LogoForIT.webp') }}">
<title>{{ config('app.name') }}</title>
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stack('styles')
</head>
<body>
@include('partials.navbar')

<main class="main-content">
    @yield('content')
</main>

@include('partials.footer')

<script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@stack('scripts')
</body>
</html>