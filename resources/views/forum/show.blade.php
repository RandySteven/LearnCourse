@extends('layouts.app')

@section('title', $forum->title_forum)

@section('style')

@endsection

@section('content')
<div class="container">
    <h1>{{ $forum->title_forum }}</h1>
    <div class="text-secondary">
        <p>{{ $forum->user->name }}</p>
        {{ $forum->created_at->format("d M, Y") }}
    </div>
    <p>{!! nl2br($forum->body_forum) !!}</p>
</div>


<div class="container">
    <h5>Comment</h5>
    @include('forum.answer.answer-form', ['answers'=>$forum->answers, 'forum_id'=>$forum->id])
    <form action="{{ route('answer.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="answer" id="" class="form-control" rows="10" placeholder="Write your answer ..."></textarea>
            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Reply</button>
    </form>
</div>
@endsection

@section('script')

@endsection
