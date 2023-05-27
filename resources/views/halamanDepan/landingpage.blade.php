@extends('halamanDepan.mainLanding')

@section('landing')
    <div class="col-12">
        <div class="container-fluid">
            {{-- logo --}}
            <div class="row">
                <img src="{{ asset('images') }}/header.jpg" alt="Beranda" class="img-fluid mx-auto">
            </div>

            {{-- slide Foto --}}
            @if($agendaCheck)
                <div class="swiper mx-3 mt-5">
                    <h3>Kegiatan Rapat</h3>
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($agendaFoto as $item)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage') }}/{{ $item->foto }}" alt="Foto" class="img-fluid" style="border-radius: 10px; object-fit: cover; height: 500px; width: 100%;">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif

            {{-- Informasi Card --}}
            <div class="row mt-5">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalPengajuan }}</h3>
    
                        <p class="text-sm">Pengajuan Harmonisasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    </div>
                </div>
    
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $totalAdministrasi }}</h3>
    
                        <p class="text-sm">Administrasi & Analisis Konsepsi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-search"></i>
                    </div>
                    </div>
                </div>
    
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $totalRapat }}</h3>
    
                        <p class="text-sm">Rapat Harmonisasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    </div>
                </div>
    
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $totalPenyampaian }}</h3>
    
                        <p class="text-sm">Penyampaian/Selesai Harmonisasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                        <div class="bd-highlight col">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Grafik Harmonisasi</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Total Permohonan Harmonisasi</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="dataTable table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Pemrakarsa</th>
                                                <th>Tanggal Permohonan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($harmonisasi as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ $item->pemrakarsa->nama }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="bd-highlight col">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Jam Layanan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Senin - Kamis</th>
                                                <th>Jumat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>(07.30 WIB - 16.00 WIB)</td>
                                                <td>(07.30 WIB - 16.30 WIB)</td>
                                            </tr>
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Istirahat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>(12.00 WIB - 13.00 WIB)</td>
                                                    <td>(11.30 WIB - 13.00 WIB)</td>
                                                </tr>
                                            </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="auto-jsCalendar material-theme green mx-auto" data-day-format="DDD"></div>
                            </div>

                            <div class="card card-danger mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Jadwal Agenda Rapat</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="dataTable table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Rapat</th>
                                                <th>PEMRAKARSA</th>
                                                <th>Harmonisasi</th>
                                                <th>Tanggal</th>
                                                <th>Lokasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agenda as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->pemrakarsa->nama }}</td>
                                                    <td>{{ $item->harmonisasi }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                </div>
            </div>

            {{-- fooer --}}
            <div>
                <p style="color: #334155;">&copy; Copyright <strong>SIPAMMASE.</strong> All rights reserved</p>
            </div>
        </div>
    </div>
@endsection