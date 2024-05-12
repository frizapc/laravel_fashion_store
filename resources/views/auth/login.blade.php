
@extends('layouts.app')    

    @section('title', 'Login Page')

    @section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="card col-md-4">
            <div class="card-body">
                <h1 class="text-center">Login</h1>
                <form action="{{url("/auth/login")}}" method="post">
                    @csrf
                    
                    @session('error')
                        <div class="alert alert-danger">{{ $value }}</div>
                    @endsession

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">* {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <p class="text-danger">* {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                    <div class="mb-3 text-center">
                        <p>Belum punya akun? <a href="{{ url('/auth/register') }}">Buat</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
