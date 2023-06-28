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
                        {{-- form --}}
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-4">
                                            <label for="tahun">Tahun</label>
                                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ auth()->user()->tahun->no }}" readonly>
                                            @error('tahun')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="pemrakarsa">PEMRAKARSA</label>
                                            <select class="form-control @error('pemrakarsa') is-invalid @enderror" id="pemrakarsa" name="pemrakarsa">
                                                <option value="{{ $getHarmonisasi->pemrakarsa->nama }}" selected>{{ $getHarmonisasi->pemrakarsa->nama }}</option>
                                                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                                    @foreach ($pemrakarsa as $item)
                                                        @if ($item->nama == $getHarmonisasi->pemrakarsa->nama)
                                                            <option value="" style="display: none;"></option>
                                                        @else
                                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('pemrakarsa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-5">
                                            <label for="judul">Judul Rancangan</label>
                                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul" name="judul" autocomplete="off" value="{{ $getHarmonisasi->judul }}">
                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="rancangan">Rancangan Harmonisasi</label>
                                            <input type="text" class="form-control" id="rancangan" name="rancangan" value="{{ $rancangan }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-5">
                                            <label for="permohonan">Tanggal Permohonan</label>
                                            <input type="date" class="form-control @error('permohonan') is-invalid @enderror" id="permohonan" name="permohonan" value="{{ $getHarmonisasi->tanggal }}">
                                            @error('permohonan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="status">Status Pengajuan Harmonisasi</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                <option value="{{ $getHarmonisasi->kpengajuan->nama }}" selected>{{ $getHarmonisasi->kpengajuan->nama }}</option>

                                                @foreach ($kpengajuan as $item)
                                                    @if ($item->nama == $getHarmonisasi->kpengajuan->nama)
                                                        <option value="" style="display: none;"></option>
                                                    @else
                                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @admin(auth()->user())
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group col-5">
                                                <label>Posisi Harmonisasi</label>
                                                <select class="form-control @error('padministrasi') is-invalid @enderror" id="padministrasi" name="padministrasi">
                                                    <option value="{{ $getHarmonisasi->padministrasi->nama }}" selected>{{ $getHarmonisasi->padministrasi->nama }}</option>
                                                    @foreach ($posisi as $item)
                                                        @if ($item == $getHarmonisasi->padministrasi->nama)
                                                            <option value="" style="display: none;"></option>
                                                        @else
                                                            <option value="{{ $item }}">{{ $item }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('padministrasi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            @if (auth()->user()->role_id == 2)
                                                <div class="form-group col-6">
                                                    <label>Proses</label>
                                                    @if ($getHarmonisasi->user)
                                                        <input type="text" class="form-control" value="{{ $getHarmonisasi->user->namaPanjang }}" name="proses" readonly>
                                                        @else
                                                        <input type="text" class="form-control" name="proses" readonly>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="form-group col-6">
                                                    <label>Proses</label>
                                                    <select class="form-control @error('proses') is-invalid @enderror" id="proses" name="proses">
                                                        @if ($getHarmonisasi->user)
                                                            <option value="{{ $getHarmonisasi->user->namaPanjang }}" selected>{{ $getHarmonisasi->user->namaPanjang }}</option>
                                                            @foreach ($users as $item)
                                                                @if ($item == $getHarmonisasi->user->namaPanjang)
                                                                    <option value="" style="display: none;"></option>
                                                                @else
                                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <option value=""></option>
                                                            @foreach ($users as $item)
                                                                <option value="{{ $item }}">{{ $item }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('proses')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endadmin

                            <div class="row mt-3 ml-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" rows="3" placeholder="Enter ..." name="keterangan">{{ $getHarmonisasi->keterangan }}</textarea>
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @include('pengajuan.docEditPengajuan')

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success inline">Simpan Data</button>
                                <a href="/pengajuan" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection