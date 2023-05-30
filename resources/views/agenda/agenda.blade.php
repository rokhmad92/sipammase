@extends('partviewAdmin.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">
                <h1 class="m-0">{{ $title }} Settings</h1>
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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                            <i class="fas fa-plus"></i> Tambah Agenda
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="dataTable table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Rapat</th>
                                    <th>PEMRAKARSA</th>
                                    <th>Harmonisasi</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
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
                                        @if ($item->foto)
                                            <td><a href="{{ asset('storage') }}/{{ $item->foto }}" target="_blank"><p class="badge badge-success"><i class="fas fa-image"></i> Lihat Gambar</p></a></td>
                                        @else
                                            <td><p class="badge badge-danger">Tidak Ada Gambar</p></td>
                                        @endif
                                        <td class="text-center">
                                            <span class="badge badge-info" style="cursor: pointer;" data-toggle="modal" data-target="#modal-edit{{ $item->id }}"><i class="fas fa-edit"></i> Edit</span>
                                            <a href="/agenda/{{ $item->nama }}" onclick="return confirm('Yakin Ingin menghapus Data')" class="badge badge-danger mt-2"><i class="fas fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Agenda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="nama">Nama Rapat</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autocomplete="off">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="pemrakarsa">PEMRAKARSA</label>
                        <select class="form-control @error('pemrakarsa') is-invalid @enderror" id="pemrakarsa" name="pemrakarsa">
                            @foreach ($pemrakarsa as $item)
                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('pemrakarsa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="harmonisasi">Harmonisasi</label>
                        <input type="text" class="form-control @error('harmonisasi') is-invalid @enderror" id="harmonisasi" name="harmonisasi" required maxlength="50" autocomplete="off">
                        @error('harmonisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required>
                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" required maxlength="100" autocomplete="off">
                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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

@foreach ($agenda as $item)
<div class="modal fade" id="modal-edit{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Agenda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/agenda/{{ $item->nama }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="nama">Nama Rapat</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autocomplete="off" value="{{ $item->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="pemrakarsa">PEMRAKARSA</label>
                        <select class="form-control @error('pemrakarsa') is-invalid @enderror" id="pemrakarsa" name="pemrakarsa">
                            <option value="{{ $item->pemrakarsa->nama }}">{{ $item->pemrakarsa->nama }}</option>
                            @foreach ($pemrakarsa as $pemra)
                                @if ($pemra->nama == $item->pemrakarsa->nama)
                                    <option value="" class="d-none"></option>
                                @else
                                    <option value="{{ $pemra->nama }}">{{ $pemra->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('pemrakarsa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="harmonisasi">Harmonisasi</label>
                        <input type="text" class="form-control @error('harmonisasi') is-invalid @enderror" id="harmonisasi" name="harmonisasi" required maxlength="50" autocomplete="off" value="{{ $item->harmonisasi }}">
                        @error('harmonisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required value="{{ $item->tanggal }}">
                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" required maxlength="100" autocomplete="off" value="{{ $item->lokasi }}">
                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <h5>Upload Foto Kegiatan</h5>
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

                        <h5>Lihat & Hapus Foto Kegiatan</h5>
                        <div class="col">
                            <div class="custom-file">
                                @if ($item->foto == null)
                                    <div class="form-group col">
                                        <label class="badge badge-danger">Belum Ada Foto</label>
                                    </div>
                                @endif
                                @if ($item->foto)
                                    <div class="form-group col">
                                        <a target="_blank" class="badge badge-success mr-3" href="{{ asset('storage') }}/{{ $item->foto }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Foto</a>
                                        <a class="badge badge-danger mt-2" onclick="return confirm('Yakin ingin hapus Foto?')" href="/agenda/hapus/{{ $item->nama }}" style="cursor: pointer;"><i class="fas fa-trash"></i> Hapus Foto</a>
                                    </div>
                                @endif
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