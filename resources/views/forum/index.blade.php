@extends('layouts.app')

@section('title', 'Forums')

@section('style')

@endsection

@section('content')
<div class="row">
    <a href="{{ route('forum.create') }}" class="btn btn-success float-right">Create Forum</a>
    <div class="col-md-6">
        <h3>Forum</h3>
        @forelse ($forums as $forum)
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('forum.delete', $forum->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                Forum
                </div>
                <div class="card-body">
                <h5 class="card-title">{{ $forum->title_forum }}</h5>
                <p class="card-text">{{ Str::limit($forum->body_forum, 120, '...') }}</p>
                <a href="{{ route('forum.show', $forum->slug) }}" class="btn btn-primary">See Detail</a>
                </div>
            </div>
        @empty

        @endforelse
        <div>
            {{ $forums->links() }}
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
