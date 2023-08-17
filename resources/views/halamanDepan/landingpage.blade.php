@extends('halamanDepan.mainLanding')

@section('landing')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert" style="right:20px; z-index: 9;top: 80px">
            <strong><i class="fa-solid fa-x"></i> {{ session('success') }}</strong>
        </div>
    @endif
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img  src="{{ asset('images') }}/logo.png" alt="AdminLTELogo" width="150">
    </div>

    <div class="col-12">
        <div class="container-fluid">
            {{-- logo --}}
            <div class="row">
                <img src="{{ asset('images') }}/header.jpg" alt="Beranda" class="img-fluid mx-auto">
            </div>

            {{-- runnig text --}}
            @if($kegiatanCheck != null)
                <div class="row col-12 bg-primary mx-auto mt-4 rounded">
                        <marquee behavior="scroll" direction="left" class="text-lg text-white p-3">
                            @foreach ($kegiatan as $item)
                                <span style="margin-left: 60px;">{{ $item->pemrakarsa->nama }}, {{ $item->harmonisasi }}, {{ $item->tanggal }}</span>
                            @endforeach
                        </marquee>
                </div>
            @endif

            {{-- slide Foto --}}
            @if($agendaCheck)
                <div class="swiper mx-3 mt-4">
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
                    <a href="/show/Pengajuan" class="small-box-footer">Lihat Hasil <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="/show/Administrasi Dan Analisis Konsep" class="small-box-footer">Lihat Hasil <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="/show/Rapat Harmonisasi" class="small-box-footer">Lihat Hasil <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="/show/Penyampaian Harmonisasi" class="small-box-footer">Lihat Hasil <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                        <div class="bd-highlight col-md-6">
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
                                    <form action="/grafik" method="POST" target="_blank">
                                    @csrf
                                        <div class="form-group col-auto">
                                            <label for="grafik">Pemrakarsa</label>
                                            <select class="form-control filter" id="grafik" name="grafik">
                                                @foreach ($pemrakarsa as $item)
                                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <label for="grafikTahun">Tahun</label>
                                            <select class="form-control filter" id="grafikTahun" name="grafikTahun">
                                                @foreach ($tahun as $item)
                                                    <option value="{{ $item->no }}">{{ $item->no }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success ml-2">Lihat Grafik</button>
                                    </form>
                                    {{-- <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
                                </div>
                            </div>

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Total Harmonisasi</h3>
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
                                    <div class="card-header bg-white mb-3">
                                        <h5>Filter</h5>
                                        <div class="d-flex flex-wrap">
                                            {{-- filtering --}}
                                            <form action="" method="POST">
                                            @csrf
                                            <div class="d-flex flex-wrap mt-3">
                                                <div class="form-group col-auto">
                                                    <label for="tahun">Tahun</label>
                                                    <select class="form-control filter" id="filter_tahun" name="tahun">
                                                        @if ($post_tahun)
                                                            <option value="{{ $post_tahun }}" selected>{{ $post_tahun }}</option>
                                                        @else
                                                            <option value="" selected></option>
                                                        @endif
                
                                                        @foreach ($tahun as $item)
                                                            @if ($item->no == $post_tahun)
                                                                <option value="" class="d-none"></option>
                                                            @else
                                                                <option value="{{ $item->no }}">{{ $item->no }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                    <div class="form-group col-auto">
                                                        <label for="harmonisasi">Harmonisasi</label>
                                                        <select class="form-control filter" id="filter_harmonisasi" name="harmonisasi">
                                                            @if ($post_harmonisasi)
                                                                <option value="{{ $post_harmonisasi }}" selected>{{ $post_harmonisasi }}</option>
                                                            @else
                                                                <option value="" selected></option>
                                                            @endif
                
                                                            @foreach ($rancangan as $item)
                                                                @if ($item->nama == $post_harmonisasi)
                                                                    <option value="" class="d-none"></option>
                                                                @else
                                                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-auto">
                                                        <label for="pemrakarsa">Pemrakarsa</label>
                                                        <select class="form-control filter" id="filter_pemrakarsa" name="pemrakarsa">
                                                            @if ($post_pemrakarsa)
                                                                <option value="{{ $post_pemrakarsa }}" selected>{{ $post_pemrakarsa }}</option>
                                                            @else
                                                                <option value="" selected></option>
                                                            @endif
                
                                                            @foreach ($pemrakarsa as $item)
                                                                @if ($item->nama == $post_pemrakarsa)
                                                                    <option value="" class="d-none"></option>
                                                                @else
                                                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-secondary ml-2"><i class="fas fa-filter"></i> Filter</button>
                                                <a href="/" class="btn btn-danger ml-2"><i class="fas fa-filter"></i> Reset</a>
                                            </form>
                                        </div>
                                    </div>
                                    <table class="dataTable table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Pemrakarsa</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Masukan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($harmonisasi as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ $item->pemrakarsa->nama }}</td>
                                                    <td>{{ $item->tanggal }}</td>

                                                    {{-- Posisi --}}
                                                    @if ($item->padministrasi->nama == 'Pengajuan')
                                                        <td class="text-center"><p class="badge badge-info p-1">{{ $item->padministrasi->nama }}</p></td>
                                                    @elseif($item->padministrasi->nama == 'Administrasi Dan Analisis Konsep')
                                                        <td class="text-center"><p class="badge badge-secondary p-1">{{ $item->padministrasi->nama }}</p></td>
                                                    @elseif ($item->padministrasi->nama == 'Rapat Harmonisasi')
                                                        <td class="text-center"><p class="badge badge-danger p-1">{{ $item->padministrasi->nama }}</p></td>
                                                    @elseif ($item->padministrasi->nama == 'Penyampaian Harmonisasi' || $item->padministrasi->nama == 'Selesai Harmonisasi')
                                                        <td class="text-center"><p class="badge badge-success p-1">{{ $item->padministrasi->nama }}</p></td>
                                                    @endif

                                                    {{-- Masukan --}}
                                                    @if ($item->masukan_masyarakat)
                                                        <td class="text-center">
                                                            <span class="badge badge-success mb-2 p-2" style="cursor: pointer;"><i class="fas fa-check"></i> Selesai</span> 
                                                        </td>
                                                    @elseif ($item->padministrasi->nama == 'Pengajuan')
                                                        <td class="text-center">
                                                            <a href="/pengajuan/masukan/{{ $item->judul }}" class="badge badge-info mb-2 p-2" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</a> 
                                                        </td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="bd-highlight col-md-6">
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
                                    <table class="dataTable table table-bordered table-responsive">
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