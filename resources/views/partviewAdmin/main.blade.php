@include('partviewAdmin.header')

<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('images') }}/logo.png" alt="AdminLTELogo" width="150">
    </div>
    @include('partviewAdmin.navbar')
    @include('partviewAdmin.sidebar')
        @yield('content')
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

@include('partviewAdmin.footer')