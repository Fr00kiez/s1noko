<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    public function liker(){
        return $this->belongsTo("App\User", "liker_id");
    }

    public function post(){
        return $this->belongsTo("App\Post");
    }
}
