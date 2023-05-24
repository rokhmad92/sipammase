<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
        <div class="sidebar">
            <!-- User panel) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('images') }}/logo.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Administrator</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/beranda" class="nav-link {{ ($title == 'Beranda') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pengajuan" class="nav-link {{ ($title == 'Pengajuan Harmonisasi') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p class="text-sm">Pengajuan Harmonisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/administrasi" class="nav-link {{ ($title == 'Administrasi Dan Analisis Konsepsi') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-search"></i>
                                <p>Administrasi Dan Analisis Konsepsi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/rapat" class="nav-link {{ ($title == 'Rapat Harmonisasi') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-receipt"></i>
                                <p>Rapat Harmonisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/penyampaian" class="nav-link {{ ($title == 'Penyampaian Harmonisasi') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p class="text-sm">Penyampaian Harmonisasi</p>
                            </a>
                        </li>
                        @admin(auth()->user())
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ ($title == 'Grafik Harmonisasi') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-chart-line"></i>
                                    <p>Grafik Harmonisasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ ($title == 'Agenda Rapat') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>Agenda Rapat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ ($title == 'Role' || $title == 'Tahun' || $title == 'Rancangan' || $title == 'Keterangan Pengajuan' || $title == 'PEMRAKARSA' || $title == 'Posisi') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>Master Data <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/role" class="nav-link {{ ($title == 'Role') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i><p> Role</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/tahun" class="nav-link {{ ($title == 'Tahun') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i><p> Tahun</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/rancangan" class="nav-link {{ ($title == 'Rancangan') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i><p class="text-sm"> Rancangan Harmonisasi</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/kpengajuan" class="nav-link {{ ($title == 'Keterangan Pengajuan') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i><p> Keterangan Pengajuan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/pemrakarsa" class="nav-link {{ ($title == 'PEMRAKARSA') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i><p> Pemrakarsa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item d-none">
                                        <a href="/posisi" class="nav-link {{ ($title == 'Posisi Administrasi') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i><p> Posisi Administrasi</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="/users" class="nav-link {{ ($title == 'Users') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        @endadmin
                        <li class="nav-item">
                            <a href="/profile/{{ auth()->user()->username }}" class="nav-link {{ ($title == 'Profile') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
        </div>
    <!-- /.sidebar -->
</aside>