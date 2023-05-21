@extends('partviewAdmin.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">
                <h1 class="m-0">{{ $title }}</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">        
        {{-- Total pengajuan Harmonisasi --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-right">
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-plus"></i> Tambah Harmonisasi
                            </button>
                            <div class="dropdown-menu">
                                @foreach ($rancangan as $item)
                                    <a class="dropdown-item" href="/pengajuan/{{ $item->nama }}">{{ $item->nama }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="dataTable table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pemrakarsa</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Dokumen Pengajuan</th>
                                    <th>Status</th>
                                    <th>Posisi</th>
                                    <th>Masukan Masyarakat</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($harmonisasi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->pemrakarsa->nama }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>Docx Pengajuan</td>
                                        <td>{{ $item->kpengajuan->nama }}</td>
                                        <td>{{ $item->padministrasi->nama }}</td>
                                        <td>Masukan Masyarakat</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>Aksi</td>
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