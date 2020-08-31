<?php

namespace App\Http\Controllers;

use App\Course;
use App\Forum;
use Illuminate\Http\Request;
// $table->string('title_forum');
//             $table->string('slug');
//             $table->foreignId('course_id');
//             $table->foreignId('user_id');
//             $table->text('body_forum');
class ForumController extends Controller
{
    public function show(Forum $forum){
        return view('forum.show', compact('forum'));
    }

    public function index(){
        $forums = Forum::latest()->paginate(9);
        return view('forum.index', compact('forums'));
    }

    public function create(){
        $courses = Course::get();
        return view('forum.create', compact('courses'));
    }

    public function store(Request $request){
        $attr = $request->all();
        $request->validate([
            'title_forum' => 'required|min:3|max:199',
            'body_forum' => 'required|min:5'
        ]);
        $attr['slug'] = \Str::slug(request('title_forum'));
        $attr['course_id'] = request('course');

        auth()->user()->forums()->create($attr);
        return redirect('/forums');
    }

    public function destroy($id){
        Forum::destroy($id);
        return back();
    }
}
