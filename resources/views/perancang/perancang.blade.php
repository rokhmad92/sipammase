@extends('partviewAdmin.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">
                <h1 class="m-0">Perancang</h1>
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
                        {{-- <a href="/jabatan" class="btn btn-info" data-toggle="modal" data-target="#modal-default1">
                            <i class="fas fa-medal"></i> Jabatan
                        </a> --}}
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                            <i class="fas fa-plus"></i> Tambah Perancang
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="dataTable table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th class="col-md-2">Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perancang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('storage') }}/{{ $item->foto }}" alt="Foto" width="130">
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-info" style="cursor: pointer;" data-toggle="modal" data-target="#modal-edit{{ $item->id }}"><i class="fas fa-edit"></i> Edit</span>
                                                <a href="/pendiri/{{ $item->id }}" onclick="return confirm('Tunggu Fitur Selesai')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Perancang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="namaRole">Nama Perancang</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaRole" name="nama" required autocomplete="off" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP Perancang</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" required autocomplete="off" value="{{ old('nip') }}">
                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required value="{{ old('jabatan') }}">
                        @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <h5>Upload Foto</h5>
                        <div class="col mb-5">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="upload" name="foto">
                                <label class="custom-file-label" for="upload">Choose file</label>
                                <small>Type : jpg, jpeg, png | Max : 5MB</small>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($perancang as $item)
<div class="modal fade" id="modal-edit{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Perancang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pendiri/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="perancangEdit">Nama Perancang</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="perancangEdit" name="nama" required autocomplete="off" value="{{ $item->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nipedit">NIP Perancang</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nipedit" name="nip" required autocomplete="off" value="{{ $item->nip }}">
                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required value="{{ $item->jabatan }}">
                        @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <h5>Upload Foto</h5>
                        <div class="col mb-5">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="upload" name="foto">
                                <label class="custom-file-label" for="upload">Choose file</label>
                                <small>Type : jpg, jpeg, png | Max : 5MB</small>
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection