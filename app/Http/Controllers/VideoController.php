<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request){
        $attr = $request->all();
        $request->validate([
            'title'=>'required|max:20'
        ]);
        $attr['slug'] = \Str::slug($request->title);
        $file = request()->file('video');
        $filename = $file->getClientOriginalName();
        $path = public_path().'/upload/';
        $attr['video'] = $file->move($path, $filename);
        $attr['post_id'] = $request->get('post_id');
        Video::create($attr);
        return back();
    }

    public function show(Video $video){
        return view('posts.video.show', compact('video'));
    }
}
