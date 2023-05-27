<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- template style --}}
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
    {{-- my style --}}
    <link rel="icon" href="{{ asset('images') }}/logo.png" type="image/gif" sizes="30x30">
    <style>
        .login, .image {
            min-height: 100vh
        }
        .bg-image {
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body style="background-color: #F4F6F9;">
    @if (session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show position-absolute" role="alert" style="right:20px; z-index: 9;top: 80px">
            <strong><i class="fa-solid fa-x"></i> {{ session('failed') }}</strong>
        </div>
    @endif
@include('halamanDepan.navLanding')
    @yield('content')

<!-- Bootstrap 4 -->
<script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('template') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{ asset('template') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
</body>
</html>