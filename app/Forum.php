<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = [
        'title_forum', 'slug', 'course_id', 'body_forum'
    ];

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
