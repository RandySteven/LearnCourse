<?php

namespace App\Http\Controllers;

use App\Course;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post){
        $posts = Post::where('course_id', $post->course_id)->latest()->limit(6);
        return view('posts.show', compact('posts', 'post'));
    }
    public function index(){
        $posts = Post::latest()->paginate(9);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        $courses = Course::get();
        return view('posts.create', compact('courses'));
    }

    public function store(Request $request){
        $attr = $request->all();

        $request->validate([
            'title' => 'required|min:5|max:199',
            'thumbnail' => 'image|mimes:png,jpg,jpeg,svg|max:2048',
            'body' => 'required|min:5'
        ]);

        $attr['slug'] = \Str::slug(request('title'));
        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images/posts") : null;
        $attr['thumbnail'] = $thumbnail;

        $attr['course_id'] = request('course');
        $post = auth()->user()->posts()->create($attr);

        return redirect('/');
    }

    public function edit(Post $post){
        $courses = Course::get();
        return view('posts.edit', compact('post', 'courses'));
    }

    public function update(Request $request, Post $post){
        $attr = $request->all();

        $request->validate([
            'title' => 'required|min:5|max:199',
            'thumbnail' => 'image|mimes:png,jpg,jpeg,svg|max:2048',
            'body' => 'required|min:5'
        ]);

        $attr['slug'] = \Str::slug(request('title'));
        if($request->thumbnail){
            \Storage::delete(request('thumbnail'));
            $thumbnail = request()->file('thumbnail')->store("images/posts");
        }else{
            $thumbnail = $post->thumbnail;
        }
        $attr['thumbnail'] = $thumbnail;

        $attr['course_id'] = request('course');
        $post->update($attr);
        return redirect('/');
    }
}
