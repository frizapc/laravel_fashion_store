
@extends('layouts.app')    

    @section('title', "$fashion->title")

    @section('content')

    <article class="blog-post container">
        <h2 class="blog-post-title mb-1">{{ $fashion->title }}</h2>
        <p class="blog-post-meta">{{ $fashion->updated_at }}</p>
        <p>{{ $fashion->content }}</p>
        <a href="{{ url('/fashions') }}">< Kembali</a>

        <div class="mt-4">
            <h3>Komentar</h3>
            <p>Komentar {{ $count }}</p>
            @foreach($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text">{{$comment->comment}}</p>
                </div>
            </div>
            @endforeach
    </div>
    </article>
    @endsection