<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- ngrok --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>{{ $title }}</title>
    {{-- template style --}}
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
    {{-- swipe image --}}
    <link rel="stylesheet" href="{{ asset('template') }}/swipeJS/swiper-bundle.min.css"/>
    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    {{-- Calender --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('template') }}/source/jsCalendar.css">
    {{-- my style --}}
    <link rel="icon" href="{{ asset('images') }}/logo.png" type="image/gif" sizes="30x30">
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
</head>
<body style="background-color: #F4F6F9;">
<a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a>