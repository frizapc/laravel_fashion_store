@extends('layouts.app')    

    @section('title', 'Trash Blog')

    @section('content')
    <div class="container">
        <h1>Blog | Trash Blog <a href="{{ url("fashions/") }}" class="btn btn-secondary">Back</a></h1>
        @foreach($fashions as $fashion)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$fashion->title}}</h5>
                <p class="card-text">{{$fashion->content}}</p>
                <p class="card-text"><small class="text-muted">Last update {{$fashion->updated_at}}</small></p>
                <a href="{{ url("fashions/$fashion->id/undo") }}" class="btn btn-primary">Undo</a>
                <a href="{{ url("fashions/$fashion->id/remove") }}" class="btn btn-danger">Remove</a>
            </div>
        </div>
        @endforeach
    </div>
    @endsection