@extends('layouts.app')

@section('title', 'Create Course')

@section('style')

@endsection

@section('content')
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
        <div class="text-danger">
            @error('title')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="">Thumbnail</label>
        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
        <div class="text-danger">
            @error('thumbnail')
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
        <div class="text-danger">
            @error('category')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="">Text</label>
        <textarea name="body" id="" class="form-control @error('body') is-invalid @enderror" rows="10"></textarea>
        <div class="text-danger">
            @error('body')
                {{ $message }}
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@section('script')

@endsection
