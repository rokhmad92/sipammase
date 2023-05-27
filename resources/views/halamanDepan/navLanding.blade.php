<nav class="navbar navbar-expand-lg" style="background-color: rgba(240,241,243, 0.5);{{ ($title !== 'Daftar Perancang') ? 'position: absolute;top: 0;left: 0;right: 0;z-index: 999;' : ''}}">
    @if ($title !== 'Selamat Datang Di SIPAMMASE')
        <a class="navbar-brand mb-2" href="/" style="color: black;">
            <img src="{{ asset('images') }}/logo.png" width="23" height="30" class="d-inline-block align-top rounded-lg ml-2 mr-3" alt="Logo">
            Selamat Datang Di SIPAMMASE
        </a>
    @endif

    <button class="navbar-toggler bg-light p-2 border" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>

        <div>
            <a href="/perancang" class="btn btn-secondary mr-2">Daftar Perancang</a>
            <a href="/login" class="btn btn-success mr-2">Login</a>
        </div>
    </div>
</nav>