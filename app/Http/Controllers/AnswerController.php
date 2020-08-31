<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Forum;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request){
        $answer = new Answer;
        $answer->answer = $request->answer;
        $answer->user()->associate($request->user());
        $forum = Forum::find($request->forum_id);
        $forum->answers()->save($answer);
        return back();
    }

    public function storeReplies(Request $request){
        $answer = new Answer();
        $answer->answer = $request->get('answer');
        $answer->user()->associate($request->user());
        $answer->parent_id = $request->get('answer_id');
        $forum = Forum::find($request->get('forum_id'));
        $forum->answers()->save($answer);
        return back();
    }
}
