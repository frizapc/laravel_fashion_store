
@extends('layouts.app')    

    @section('title', 'Register Page')

    @section('content')
    <div class="row justify-content-center ">
        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{ $message }}</div>
        @endforeach

        <div class="card col-md-4 ">
            <div class="card-body">
                <h1 class="text-center">Registrasi</h1>
                <form action="{{url("/auth/register")}}" method="post">
                    @csrf
                    @session('error')
                        <p class="alert alert-danger">{{$value}}</p>
                    @endsession

                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
