<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = ['author_id', 'post_id', 'comment'];

    public function author()
    {
        return $this->belongsTo("App\User", "author_id");
    }

    public function post()
    {
        return $this->belongsTo("App\Post");
    }
}
