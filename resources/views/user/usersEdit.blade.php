@extends('partviewAdmin.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">
                <h1 class="m-0">{{ $users->username }} Edit</h1>
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
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-5">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autocomplete="off" value="{{ $users->username }}" placeholder="Username">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="namaPanjang">Nama Panjang</label>
                                            <input type="text" class="form-control @error('namaPanjang') is-invalid @enderror" id="namaPanjang" name="namaPanjang" autocomplete="off" placeholder="Nama Panjang" value="{{ $users->namaPanjang }}">
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
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" autocomplete="off" value="{{ $users->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" autocomplete="off" value="{{ $users->alamat }}">
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
                                        <div class="form-group col-md-5">
                                            <label for="rancangan">Rancangan Harmonisasi</label>
                                            <select class="form-control" id="rancangan" name="rancangan">
                                                <option value="{{ $users->rancangan->id }}" selected>{{ $users->rancangan->nama }}</option>
                                                @foreach ($rancangan as $item)
                                                    @if ($item->id == $users->rancangan->id)
                                                        <option value="" style="display: none;"></option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="PEMRAKARSA">Pemrakarsa</label>
                                            <select class="form-control" id="PEMRAKARSA" name="pemrakarsa">
                                                <option value="{{ $users->pemrakarsa->id }}" selected>{{ $users->pemrakarsa->nama }}</option>
                                                @foreach ($pemrakarsa as $item)
                                                    @if ($item->id == $users->pemrakarsa->id)
                                                        <option value="" style="display: none;"></option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-5">
                                            <label for="role">Role</label>
                                            <select class="form-control" id="role" name="role">
                                                <option value="{{ $users->role->id }}" selected>{{ $users->role->nama }}</option>
                                                @foreach ($role as $item)
                                                    @if ($item->id == $users->role->id)
                                                        <option value="" style="display: none;"></option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="passwordAdd">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordAdd" name="password" value="">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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