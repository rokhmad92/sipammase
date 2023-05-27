@extends('login.mainLogin')

@section('content')
<div class="container-fluid">
    <div class="row no-gutter"> 
        <div class="col-md-6 d-none d-md-flex bg-image" style="background-image: url({{ asset('images') }}/header.jpg)"></div> 
        <div class="col-md-6 bg-light"> 
            <div class="login d-flex align-items-center py-5"> 
                <div class="container"> 
                    <div class="row"> 
                        <div class="col-lg-7 col-xl-6 mx-auto"> 
                            <h3 class="display-4">LOGIN</h3> <br> 
                            <form action="" method="POST">
                            @csrf
                                <div class="form-group mb-3"> 
                                    <label for="username">Username</label>
                                    <input id="username" type="text" placeholder="Username" required class="form-control rounded-pill border-0 shadow-sm px-4 @error('username') is-invalid @enderror" name="username"> 
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> 
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" placeholder="Password" required class="form-control rounded-pill border-0 shadow-sm px-4 @error('password') is-invalid @enderror" name="password"><br> 
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> 
                                <button type="submit" class="btn btn-info btn-block text-uppercase mb-2 rounded-pill shadow-sm">Login</button> 
                            </form> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>
</div>
@endsection