@extends('layouts.app')

@section('title', 'All Post')

@section('style')

@endsection

@section('content')
<a href="{{ route('post.create') }}" class="btn btn-success mt-3 float-right">Add Post +</a>
<div class="container">
    @isset($course)
        <h3>Course : {{ $course->name }}</h3>
    @endisset
    @if (!isset($course))
        <h3>Post</h3>
    @endif
</div>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                        <img class="card-img-top" src="{{ $post->takeImage }}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>Kamu akan belajar tentang {{ $post->title }}</p>
                        <p>
                            {{ $post->created_at->format("d M, Y") }} <br>
                            <a href="{{ route('course.show', $post->course->slug) }}">{{ $post->course->name }}</a>
                        </p>

                        <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">See Detail</a>
                        </div>
                        <div class="card-footer">
                            {{-- <img src="" class="rounded" alt=""> --}}
                            {{ $post->user->name }}
                        </div>
                </div>
            </div>
        @empty
                No Learning Course yet
        @endforelse
    </div>

        <div>
            {{ $posts->links() }}
        </div>
@endsection

@section('script')

@endsection
