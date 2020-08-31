<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Forum;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        return back();
    }

    public function storeAnswer(Request $request){
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $forum = Forum::find($request->forum_id);
        $forum->comments()->save($comment);
        return back();
    }

    public function replyAnswerStore(Request $request){
        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $forum = Forum::find($request->get('forum_id'));
        $forum->comments()->save($reply);
        return back();
    }

    public function replyStore(Request $request){
        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($reply);
        return back();
    }
}
