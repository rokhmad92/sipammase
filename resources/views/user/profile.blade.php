@extends('partviewAdmin.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">
                <h1 class="m-0">Profile Settings</h1>
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
                                        <div class="form-group col-md-5">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $getUser->username }}" autocomplete="off" {{ ($getUser->namaPanjang == 'Administrator' ? '' : 'readonly') }}>
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="namaPanjang">Nama Panjang</label>
                                            <input type="text" class="form-control @error('namaPanjang') is-invalid @enderror" id="namaPanjang" name="namaPanjang" value="{{ $getUser->namaPanjang }}" autocomplete="off" readonly>
                                            @error('namaPanjang')
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
                                        <div class="form-group col-md-5">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" name="email" autocomplete="off" value="{{ $getUser->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $getUser->alamat }}">
                                            @error('alamat')
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
                                        @if ($getUser->admin == false)
                                            <div class="form-group col-md-5">
                                                <label for="rancangan">Rancangan Harmonisasi</label>
                                                <select class="form-control" id="rancangan" name="rancangan">
                                                    <option value="{{ $getUser->rancangan->nama }}">{{ $getUser->rancangan->nama }}</option>
                                                </select>
                                            </div>
                                        @endif
                                        <div class="form-group col-6">
                                            <label for="tahun">Tahun</label>
                                            <select class="form-control" id="tahun" name="tahun">
                                                <option value="{{ $getUser->tahun->no }}" selected>{{ $getUser->tahun->no }}</option>
                                                @foreach ($tahun as $item)
                                                    @if ($item->no == $getUser->tahun->no)
                                                        <option value="" style="display: none;"></option>
                                                    @else
                                                        <option value="{{ $item->no }}">{{ $item->no }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($getUser->admin == false)
                                <div class="row ml-1 mt-3 mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="PEMRAKARSA">Pemrakarsa</label>
                                        <select class="form-control" id="PEMRAKARSA" name="pemrakarsa">
                                            <option value="{{ $getUser->pemrakarsa->nama }}">{{ $getUser->pemrakarsa->nama }}</option>
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <h4>Ganti Password</h4>
                            <div class="row mb-3 mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-5">
                                            <label for="newPasswordInput">Password Baru</label>
                                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" name="new_password" autocomplete="off" placeholder="Password Baru">
                                            @error('new_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="confirmNewPasswordInput">Confirmasi Password</label>
                                            <input type="password" class="form-control" id="confirmNewPasswordInput" name="new_password_confirmation" autocomplete="off" placeholder="Confirm Password Baru">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success ml-2">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection