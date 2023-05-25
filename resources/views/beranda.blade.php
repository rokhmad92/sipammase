@extends('partviewAdmin.main')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <img src="{{ asset('images') }}/dashboard.jpeg" alt="Beranda" class="img-fluid">
                    <div class="col-sm-6 mt-3">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

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
                        <!-- small box -->
                        <div class="small-box bg-success">
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
                        <!-- small box -->
                        <div class="small-box bg-danger">
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