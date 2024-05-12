@extends('layouts.app')    

    @section('title', 'Fashions')

    @section('content')
    
    <div class="container">
        @session('message')
            <div class="alert alert-success">
                {{ $value }}
            </div>
        @endsession
        @session('available_account')
            <div class="alert alert-primary">
                {{ $value }}
            </div>
        @endsession
        <h1>All Fashions <a class="btn btn-success" href="{{ url('/fashions/create') }}"> + </a> <a class="btn btn-danger" href="{{ url('/fashions/trash') }}">🗑️</a></h1>
        @foreach($fashions as $fashion)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$fashion->title}}</h5>
                <p class="card-text">{{$fashion->content}}</p>
                <p class="card-text"><small class="text-muted">Last update {{$fashion->updated_at}}</small></p>
                <a href="{{ url("fashions/$fashion->id") }}" class="btn btn-primary">Selengkapnya</a>
                <a href="{{ url("fashions/$fashion->id/edit") }}" class="btn btn-warning">Ubah</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="model position-absolute w-100 h-100 z-3 top-0 {{session('login_assignment') ? '' : 'd-none'}} " style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{session('login_assignment')}}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ url("auth/login") }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        const modal = document.querySelector('.model');
        const btn_close = document.querySelector('.btn-close');
        btn_close.addEventListener('click', ()=>{
            modal.classList.add('d-none')
        });
        modal.addEventListener('click', (e)=>{
            if(e.target.classList[0] == "model"){
                modal.classList.add('d-none')
            }
        });
    </script>
    @endsection   
       