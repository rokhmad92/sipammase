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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="dataTable table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pemrakarsa</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Dokumen Pengajuan</th>
                                    <th>Dokumen Penyampaian</th>
                                    <th>Status</th>
                                    <th>Posisi</th>
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

                                        @if ( $item->docx3 == null && $item->docx4 == null)
                                            <td><p class="badge badge-danger">Belum ada dokumen</p></td>
                                        @elseif ($item->rancangan->nama == 'RPERDA PEMDA' || $item->rancangan->nama == 'RPERKADA')
                                            <td class="text-center">
                                                <a class="badge badge-info mr-2 mt-1 p-2 {{ ($item->docx4) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->docx4 }}" target="_blank">4. <i class="fas fa-download"></i></a>
                                            </td>
                                        @elseif ($item->rancangan->nama == 'RPERDA DPRD')
                                            <td class="text-center">
                                                <a class="badge badge-info mr-2 mt-1 p-2 {{ ($item->docx3) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->docx3 }}" target="_blank">3. <i class="fas fa-download"></i></a>
                                            </td>
                                        @endif

                                        @if ($item->doc_penyampaian->docx1 == null && $item->doc_penyampaian->docx2 == null && $item->doc_penyampaian->docx3 == null && $item->doc_penyampaian->docx4 == null && $item->doc_penyampaian->docx5 == null)
                                            <td><p class="badge badge-danger">Belum ada dokumen</p></td>
                                        @else
                                            <td>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->doc_penyampaian->docx1) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->doc_penyampaian->docx1 }}" target="_blank">1. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->doc_penyampaian->docx2) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->doc_penyampaian->docx2 }}" target="_blank">2. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->doc_penyampaian->docx3) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->doc_penyampaian->docx3 }}" target="_blank">3. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->doc_penyampaian->docx4) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->doc_penyampaian->docx4 }}" target="_blank">4. <i class="fas fa-download"></i></a>
                                                <a class="badge badge-info mr-2 mt-1 p-1 {{ ($item->doc_penyampaian->docx5) ? '' : 'd-none' }}" href="{{ asset('storage') }}/{{ $item->doc_penyampaian->docx5 }}" target="_blank">5. <i class="fas fa-download"></i></a>
                                            </td>
                                        @endif

                                        @if ($item->status_penyampaian == 'Selesai Harmonisasi')
                                            <td><p class="badge badge-success">Selesai</p></td>
                                        @else
                                            <td><p class="badge {{ ($item->status_penyampaian == 'Di Tolak') ? 'badge-danger' : '' }}">{{ $item->status_penyampaian }}</p></td>
                                        @endif
                                        <td><p class="badge badge-success">{{ $item->padministrasi->nama }}</p></td>

                                        <td>{{ $item->doc_penyampaian->keterangan }}</td>
                                        <td class="text-center">
                                            <a href="/penyampaian/{{ $item->judul }}" class="badge badge-info mb-2" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</a> <br>
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