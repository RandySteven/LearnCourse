@extends('layouts.app')

@section('title', 'Create Forum')

@section('style')

@endsection

@section('content')
<form action="{{ route('forum.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title_forum" id="" class="form-control @error('title_forum') is-invalid @enderror">
        <div class="text text-danger">
            @error('title_forum')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="">Course</label>
        <select name="course" id="" class="form-control @error('course') is-invalid @enderror">
            <option disabled selected>Choose one</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        <div class="text text-danger">
            @error('course')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="">Forum</label>
        <textarea name="body_forum" id="" class="form-control @error('body_forum') is-invalid @enderror" rows="15"></textarea>
        <div class="text text-danger">
            @error('body_forum')
                {{ $message }}
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection

@section('script')

@endsection
