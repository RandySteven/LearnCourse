<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course){
        $posts = $course->posts()->latest()->paginate(9);
        return view('posts.index', compact('posts', 'course'));
    }

    public function index(){
        $courses = Course::all();
        return view('posts.categories.index', compact('courses'));
    }
}
