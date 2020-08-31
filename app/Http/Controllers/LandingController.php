<?php

namespace App\Http\Controllers;

use App\Course;
use App\Forum;
use App\Post;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $posts = Post::where(function($query){
            $query->limit(6);
        });
        $courses = Course::all();
        $forums = Forum::where(function($query){
          $query->limit(6);
        });
        return view('layouts.landing', compact('posts', 'courses', 'forums'));
    }
}
