<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }

}
