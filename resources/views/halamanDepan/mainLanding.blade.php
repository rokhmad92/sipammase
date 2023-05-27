@include('halamanDepan.headerLanding')
    @include('halamanDepan.navLanding')
        @yield('landing')
@if($title == 'Daftar Perancang')
    @include('halamanDepan.footerPerancang')
@else
    @include('halamanDepan.footerLanding')
@endif