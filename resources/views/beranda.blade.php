@extends('partviewAdmin.mainBeranda')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <img src="{{ asset('images') }}/dashboard.jpeg" alt="Beranda" class="rounded-md" style="width: 100%;">
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        {{-- swipe foto --}}
            @if($agendaCheck)
                <div class="swiper mx-3 mt-3 mb-5">
                    <h3>Kegiatan Rapat</h3>
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($agenda as $item)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage') }}/{{ $item->foto }}" alt="Foto" class="img-fluid" style="border-radius: 10px; object-fit: cover;height: 500px;width: 100%;">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif
        {{-- End swipe foto --}}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalPengajuan }}</h3>
        
                            <p class="text-sm">Pengajuan Harmonisasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation"></i>
                        </div>
                            <a href="/beranda/Pengajuan" class="small-box-footer">Lihat Hasil <i class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="/beranda/Administrasi Dan Analisis Konsep" class="small-box-footer">Lihat Hasil <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
        
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalRapat }}</h3>
        
                            <p class="text-sm">Rapat Harmonisasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                            <a href="/beranda/Rapat Harmonisasi" class="small-box-footer">Lihat Hasil <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
        
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalPenyampaian }}</h3>
        
                            <p class="text-sm">Penyampaian/Selesai Harmonisasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-folder-open"></i>
                        </div>
                            <a href="/beranda/Penyampaian Harmonisasi" class="small-box-footer">Lihat Hasil <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                
                {{-- Total Permohonan Harmonisasi --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total Permohonan Harmonisasi</h3>
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
                </div>
        </section>
@endsection