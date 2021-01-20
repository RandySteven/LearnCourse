@extends('layouts.app')

@section('title', $video->title)

@section('content')
    <div class="container background">
        <a href="{{ route('post.show',$video->post->slug) }}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-back" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
            </svg>
        </a>
    </div>
    <div class="container center">
        <video width="320" height="420" controls>
            <source src="{{ asset('/upload/'.$video->video) }}" type="video/mp4">
        </video>
    </div>
@endsection
