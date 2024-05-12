@extends('layouts.app')    

    @section('title', 'Blog | Membuat Blog')

    @section('content')
    <div class="container p-2">

        @foreach($errors->all() as $message)
            <div class="alert alert-danger">{{ $message }}</div>
        @endforeach

        <h1>Buat Blog Baru</h1>
        <form method="post" action="{{ url('fashions') }}">
        @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" >
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3">{{ old('content') }}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </form>
    </div>
    @endsection
