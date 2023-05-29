@extends('login.mainLogin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="d-flex flex-wrap  bd-highlight" style="margin-top: 100px;">
            <div class="flex-grow-1 bd-highlight col-md-8 col-sm mx-auto my-auto">
                <img src="{{ asset('images') }}/header.jpg" alt="Foto" class="img-fluid mb-3">
            </div>

            <div class="bd-highlight mx-auto my-auto">
                <div class="card p-5">
                    <h3 class="display-4 mb-3">LOGIN</h3>
                    <form method="POST" action="">
                    @csrf
                        <div class="form-group mb-3">
                            <label for="username">Username</label> <br>
                            <input type="text" class="rounded-pill shadow-sm px-4 @error('username') is-invalid @enderror" id="username" name="username" style="background-color: azure">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password mb-3">Password</label> <br>
                            <input type="password" class="rounded-pill shadow-sm px-4 @error('password') is-invalid @enderror" id="password" name="password" style="background-color: azure">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
{{-- fooer --}}
<div style="position: relative;bottom: 0; left:0; right: 0;" class="ml-3">
    <p style="color: #334155;">&copy; Copyright <strong>SIPAMMASE.</strong> All rights reserved</p>
</div>
@endsection