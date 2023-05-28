@extends('partviewAdmin.main')

@section('content')
{{-- @dd($harmonisasi) --}}
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
                    <div class="card-header">
                        <h5 style="margin-bottom: -30px;">Filter</h5>
                        <div class="d-flex justify-content-between flex-wrap">
                            {{-- filtering --}}
                            <form action="" method="POST">
                            @csrf
                            <div class="d-flex flex-wrap mt-5">
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
                                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
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
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-secondary ml-2"><i class="fas fa-filter"></i> Filter</button>
                                <a href="/pengajuan" class="btn btn-danger ml-2"><i class="fas fa-filter"></i> Reset</a>
                            </form>
                            {{-- insert data --}}
                            <div class="my-auto">
                                <div class="dropdown my-auto">
                                    
                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-plus"></i> Tambah Harmonisasi
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (auth()->user()->role->nama == 'Pemda')
                                            <a class="dropdown-item" href="/pengajuan/RPERDA PEMDA">RPERDA PEMDA</a>
                                            <a class="dropdown-item" href="/pengajuan/RPERKADA">RPERKADA</a>
                                        @elseif (auth()->user()->role->nama == 'DPRD')
                                            <a class="dropdown-item" href="/pengajuan/RPERDA DPRD">RPERDA DPRD</a>
                                        @else
                                            @foreach ($rancangan as $item)
                                                <a class="dropdown-item" href="/pengajuan/{{ $item->nama }}">{{ $item->nama }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
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
                                        @if ($item->docx1 == null && $item->docx2 == null && $item->docx3 == null && $item->docx4 == null && $item->docx5 == null)
                                            <td>Belum ada dokumen</td>
                                        @else
                                            <td>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->docx1) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->docx1 }}" target="_blank">1. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->docx2) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->docx2 }}" target="_blank">2. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->docx3) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->docx3 }}" target="_blank">3. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->docx4) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->docx4 }}" target="_blank">4. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->docx5) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->docx5 }}" target="_blank">5. <i class="fas fa-download"></i></a>
                                            </td>
                                        @endif
                                        <td>{{ $item->kpengajuan->nama }}</td>
                                        @if ($item->padministrasi->nama == 'Pengajuan' || $item->padministrasi->nama == 'Administrasi Dan Analisis Konsep')
                                            <td><p class="badge badge-info p-1">{{ $item->padministrasi->nama }}</p></td>
                                        @elseif ($item->padministrasi->nama == 'Rapat Harmonisasi')
                                            <td><p class="badge badge-success p-1">{{ $item->padministrasi->nama }}</p></td>
                                        @elseif ($item->padministrasi->nama == 'Penyampaian')
                                            <td><p class="badge badge-secondary p-1">{{ $item->padministrasi->nama }}</p></td>
                                        @endif
                                        @if ($item->masukan_masyarakat)
                                            <td>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->masukan_masyarakat) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->masukan_masyarakat }}" target="_blank"><i class="fas fa-download"></i> Masukan Masyarakat</a>
                                            </td>
                                        @else
                                            <td>Belum Ada</td>
                                        @endif
                                        <td>{{ $item->keterangan }}</td>
                                        <td class="text-center">
                                            <a href="/pengajuan/edit/{{ $item->judul }}" class="badge badge-info mb-2" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</a> <br>
                                            <a href="/pengajuan/destroy/{{ $item->judul }}" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
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