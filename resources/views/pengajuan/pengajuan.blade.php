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
                                    <th>Dokumen Harmonisasi</th>
                                    <th>Status</th>
                                    <th>Status Harmonisasi</th>
                                    <th>Posisi</th>
                                    <th>Proses</th>
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

                                        {{-- dokumen pengajuan --}}
                                        @if ($item->surat_pemda_id == null && $item->surat_dprd_id == null && $item->surat_rperkada_id == null)
                                            <td><p class="badge badge-danger">Belum ada dokumen</p></td>
                                        @elseif($item->surat_pemda_id !== null)
                                            <td>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_pemda->docx1 }}" target="_blank">Surat Permohonan. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_pemda->docx2 }}" target="_blank">NA. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_pemda->docx3 }}" target="_blank">SK Tim. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_pemda->docx4 }}" target="_blank">DRAFT RANPERDA (PDF). <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_pemda->docx5 }}" target="_blank">DRAFT RANPERDA (DOC). <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_pemda->docx6 }}" target="_blank">SK Propemperda/SK Bersama jika di Luar. <i class="fas fa-download"></i></a>
                                            </td>
                                        @elseif($item->surat_dprd_id !== null)
                                            <td>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_dprd->docx1 }}" target="_blank">Surat Permohonan. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_dprd->docx2 }}" target="_blank">NA. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_dprd->docx3 }}" target="_blank">DRAFT RANPERDA. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_dprd->docx4 }}" target="_blank">SK Propemperda. <i class="fas fa-download"></i></a>
                                            </td>
                                        @elseif($item->surat_rperkada_id !== null)
                                            <td>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_rperkada->docx1 }}" target="_blank">Surat Permohonan. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_rperkada->docx2 }}" target="_blank">Penjelasan/Keterangan. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->surat_rperkada->docx3 }}" target="_blank">DRAFT RANPERKADA. <i class="fas fa-download"></i></a>
                                            </td>
                                        @endif

                                        {{-- dokumen harmonisasi --}}
                                        @if ($item->doc_administrasi_id == null && $item->doc_rapat_id == null && $item->doc_penyampaian_id == null)
                                            <td><p class="badge badge-danger">Belum ada dokumen</p></td>
                                        @else
                                            <td>
                                                @if ($item->doc_administrasi->docx1 !== null)
                                                    <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->doc_administrasi->docx1 }}" target="_blank">Dokumen LPA/AK. <i class="fas fa-download"></i></a>
                                                @else
                                                    <a class="badge badge-danger mr-2 mt-1 p-1" target="_blank"> Belum ada dokumen</a>
                                                @endif

                                                @if ($item->doc_rapat_id == null)
                                                    <a class="badge badge-danger mr-2 mt-1 p-1" target="_blank"> Belum ada dokumen</a>
                                                @elseif($item->doc_rapat->docx1 !== null)
                                                    <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->doc_rapat->docx1 }}" target="_blank">Dokumen Kegiatan. <i class="fas fa-download"></i></a>
                                                @else
                                                    <a class="badge badge-danger mr-2 mt-1 p-1" target="_blank"> Belum ada dokumen</a>
                                                @endif

                                                @if ($item->doc_penyampaian_id == null)
                                                    <a class="badge badge-danger mr-2 mt-1 p-1" target="_blank"> Belum ada dokumen</a>
                                                @elseif($item->doc_penyampaian->docx1 !== null)
                                                    <a class="badge badge-info mr-2 mt-1 p-1" href="{{ asset('storage') }}/{{ $item->doc_penyampaian->docx1 }}" target="_blank">Dokumen Penyampaian. <i class="fas fa-download"></i></a>
                                                @else
                                                    <a class="badge badge-danger mr-2 mt-1 p-1" target="_blank"> Belum ada dokumen</a>
                                                @endif
                                            </td>
                                        @endif

                                        <td>{{ $item->kpengajuan->nama }}</td>

                                        {{-- status harmonisasi --}}
                                        @if ($item->status_penyampaian != null)
                                            @if ($item->status_penyampaian == 'Di Tolak')
                                                <td class="text-center">
                                                    <p class="badge badge-danger">Di Tolak</p>
                                                </td>
                                            @elseif($item->status_penyampaian == null)
                                                <td class="text-center">
                                                    <p class="badge badge-primary">Di Proses</p>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <p class="badge {{ $item->status_penyampaian == 'Dikembalikan' ? 'badge-danger' : 'badge-primary' }}">{{ $item->status_penyampaian }}</p>
                                                </td>
                                            @endif
                                        @elseif ($item->status_rapat != null)
                                            @if ($item->status_rapat == 'Di Tolak')
                                                <td class="text-center">
                                                    <p class="badge badge-danger">Di Tolak</p>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <p class="badge badge-primary">Di Proses</p>
                                                </td>
                                            @endif
                                        @elseif ($item->status_administrasi != null)
                                            @if ($item->status_administrasi == 'Di Tolak')
                                                <td class="text-center">
                                                    <p class="badge badge-danger">Di Tolak</p>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <p class="badge badge-primary">Di Proses</p>
                                                </td>
                                            @endif
                                        @elseif ($item->status_administrasi == null && $item->status_rapat == null && $item->status_penyampaian == null)
                                            <td class="text-center">
                                                <p class="badge badge-primary">Di Proses</p>
                                            </td>
                                        @endif

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

                                        {{-- proses --}}
                                        @if ($item->user)
                                            <td>
                                                {{ $item->user->namaPanjang }}
                                            </td>
                                        @else
                                            <td>Belum Ada</td>
                                        @endif

                                        {{-- masukan masyarakat --}}
                                        @if ($item->masukan_masyarakat)
                                            <td>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->masukan_masyarakat) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->masukan_masyarakat }}" target="_blank"><i class="fas fa-download"></i> Masukan Masyarakat</a>
                                            </td>
                                        @else
                                            <td>Belum Ada</td>
                                        @endif

                                        {{-- keterangan --}}
                                        @if ($item->doc_penyampaian_id !== null)
                                            <td>{{ $item->doc_penyampaian->keterangan }}</td>
                                        @elseif($item->doc_rapat_id !== null)
                                            <td>{{ $item->doc_rapat->keterangan }}</td>
                                        @elseif($item->doc_administrasi_id !== null)
                                            <td>{{ $item->doc_administrasi->keterangan }}</td>
                                        @else
                                            <td>{{ $item->keterangan }}</td>
                                        @endif

                                        <td class="text-center">
                                            {{-- edit --}}
                                            @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                                <a href="/pengajuan/edit/{{ $item->judul }}" class="badge badge-info mb-2" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</a> <br>
                                            @elseif($item->status_administrasi == 'Di Tolak' || $item->status_rapat == 'Di Tolak' || $item->status_penyampaian == 'Di Tolak')
                                                <a href="/pengajuan/edit/{{ $item->judul }}" class="badge badge-info mb-2" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</a>
                                            @else
                                                <p class="badge badge-primary">Di Proses</p>
                                            @endif

                                            {{-- hapus --}}
                                            @admin(auth()->user())
                                                <a href="/pengajuan/destroy/{{ $item->judul }}" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            @endadmin
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