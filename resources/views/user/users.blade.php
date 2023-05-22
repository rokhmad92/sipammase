@extends('partviewAdmin.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">
                <h1 class="m-0">List User SIPAMMASE</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a href="/users/tambah" class="btn btn-success">
                            <i class="fas fa-plus"></i> Tambah User
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="dataTable table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Nama Panjang</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>PEMRAKARSA</th>
                                    <th>Rancangan Harmonisasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    @if ($item->namaPanjang == 'Administrator')
                                        {{-- <tr style="display: none;"></tr> --}}
                                    @else
                                        <tr>
                                            <td>{{ $loop->iteration - 1 }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->role->nama }}</td>
                                            <td>{{ $item->namaPanjang }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->pemrakarsa->nama }}</td>
                                            <td>{{ $item->rancangan->nama }}</td>
                                            <td class="text-center">
                                                <a href="/users/{{ $item->username }}" class="badge badge-info mb-2" style="cursor: pointer;"><i class="fas fa-edit"></i> Edit</a> <br>
                                                <a href="/user/{{ $item->username }}" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection