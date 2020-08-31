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
            @if (auth()->user()->id == $post->user->id)
                <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-success">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            @endif
        </div>
        {{ $post->created_at->format("d M, Y") }}
        <h5><a href="{{ route('course.index', $post->course->slug) }}">{{ $post->course->name }}</a></h5>
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
