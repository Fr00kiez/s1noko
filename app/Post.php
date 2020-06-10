<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments(){
    return $this->hasMany("App\PostComment");

    }

    public function likes(){
        return $this->hasMany("App\PostLike");

    }

    public function author(){
        return $this->belongsTo("App\User", "author_id");
    }
}
