@extends('layouts.app')

@section('title', $post->title)

@section('style')

@endsection

@section('content')
<div class="container">
    <img src="{{ $post->takeImage }}" alt="" class="img-thumbnail">
</div>
<div class="container">
    <h1>{{ $post->title }}</h1>
    <div class="text-secondary">
        <div>
           <img src="{{ $post->user->gravatar() }}" class="rounded-circle" width="30" alt="">
            Created by : <strong>{{ $post->user->name }}</strong>
            <br>
        </div>

        <div class="float-right">
            @if (auth()->user()->id == $post->user_id)
                <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-success">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            @endif
        </div>
        {{ $post->created_at->format("d M, Y") }}
        <h5><a href="{{ route('course.index', $post->course->slug) }}">{{ $post->course->name }}</a></h5>
        @if (auth()->user()->id == $post->user_id)
            @include('posts.video.create', ['post'=>$post])
        @endif
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($post->videos as $video)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a href="{{ route('show.video', $video->slug) }}">
                            {{ $video->title }}
                        </a>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                        </svg>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <p>
        {!! nl2br($post->body) !!}
    </p>

    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($posts as $post)
                <div class="card mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ $post->takeImage }}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>Kamu akan belajar tentang {{ $post->title }}</p>
                        <p>{{ $post->created_at->format("d M, Y") }}</p>
                        <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">See Detail</a>
                        </div>
                        <div class="card-footer">
                            {{-- <img src="" class="rounded" alt=""> --}}
                            {{ $post->user->name }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div>
    <h6>Comments</h6>
</div>
<div class="container">
    @include('posts.comments.comment-form', ['comments'=>$post->comments, 'post_id'=>$post->id])
    @if (auth()->user())
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="comment" id="" class="form-control" rows="10" placeholder="Write your comment ..."></textarea>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        You must login to comment
    @endif
</div>
@endsection

@section('script')

@endsection
