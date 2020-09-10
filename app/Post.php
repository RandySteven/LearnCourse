<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'thumbnail', 'body', 'course_id', 'slug'
    ];

    public function getTakeImageAttribute(){
        return "/storage/".$this->thumbnail;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
