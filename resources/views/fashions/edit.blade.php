@extends('layouts.app')    

    @section('title', 'Blog | Edit Blog')

    @section('content')
    <div class="container p-2">
        <h1>Edit Blog  <span class="text-danger">{{ $fashion->title  }}</span></h1>
        <form method="post" action="{{ url("fashions/$fashion->id") }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input name="title" value="{{ $fashion->title }}" type="text" class="form-control" id="title" >
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea name="content" class="form-control" id="content" rows="3">{{ $fashion->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-warning">Edit</button>
        </form>

        <form class="my-2" method="post" action="{{ url("fashions/$fashion->id") }}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
        <a href="/fashions">< Kembali</a>
    </div>
    @endsection