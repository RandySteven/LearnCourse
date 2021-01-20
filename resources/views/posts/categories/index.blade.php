@extends('layouts.app')

@section('title', 'All Course')

@section('style')

@endsection

@section('content')
<div class="row">
    @foreach ($courses as $course)

        <div class="col-md-4">
            <div class="card mb-2" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{ $course->name }}</h5>
                <a href="{{ route('course.show', $course->slug) }}" class="card-link">See Course</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('script')

@endsection
