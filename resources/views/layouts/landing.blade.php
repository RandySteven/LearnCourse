@extends('layouts.app')

@section('title', 'Learn Course')

@section('content')

<div class="container text-center" style="background-color: silver">
    <h1>About Us</h1>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem est, voluptate reprehenderit quae laborum non accusamus magnam excepturi similique beatae nam tempora eligendi dignissimos saepe veniam sunt consequuntur? Similique, fugit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque corrupti magnam nulla atque, error suscipit veniam, repellat architecto assumenda aperiam deleniti non facere consequatur soluta? Excepturi minima dolore repellendus libero!
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed molestias veritatis laboriosam fuga odit ipsum voluptate enim, obcaecati ab autem minus beatae, culpa cumque sunt omnis soluta numquam quia pariatur.
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit maxime id quaerat? Asperiores architecto ex tempore dolorem dignissimos, quis ad cum hic, quos vel non rerum minus vero inventore voluptatem.
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quia sint magni voluptatum debitis rem. Quasi, nulla. Ad nostrum placeat voluptatem accusantium ratione ipsum, excepturi quaerat laudantium eos velit dicta.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. A dolor minus architecto beatae esse, qui, et quia libero, error eaque ea quae alias optio necessitatibus dolorum fugit officiis voluptatibus voluptatum?
    </p>
</div>

<div class="container">
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <a href="{{ route('course.index', $course->slug) }}" class="card-link">See Course</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4">
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

<div class="container">
    <div class="row">
        @foreach ($forums as $forum)
            <div class="card">
                <div class="card-header">
                Forum
                </div>
                <div class="card-body">
                <h5 class="card-title">{{ $forum->title_forum }}</h5>
                <p class="card-text">{{ Str::limit($forum->body_forum, 120, '...') }}</p>
                <a href="{{ route('forum.show', $forum->slug) }}" class="btn btn-primary">See Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container my-2">
    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('/images/246x0w.png') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Check this website</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('/images/200503051913-15-ju.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Check this website</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('/images/traveloka_logo.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Check this website</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
