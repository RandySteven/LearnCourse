<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request){
        $attr = $request->all();
        $request->validate([
            'video'=>'image|mimes:png,jpg,jpeg|max:2048',
            'title'=>'required|max:20'
        ]);
        $attr['slug'] = \Str::slug($request->title);
        $attr['video'] = request()->file('video')->store("videos/tutorial");
        $attr['post_id'] = $request->get('post_id');
        Video::create($attr);
        return back();
    }

    public function show(Video $video){
        return view('posts.video.show', compact('video'));
    }
}
