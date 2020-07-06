<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'picture', 'author_id', 'tags'
    ];

    public function isLikedBy(User $user) {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->count();
    }

    public function comments()
    {
        return $this->hasMany("App\PostComment");
    }

    public function likes()
    {
        return $this->hasMany("App\PostLike");
    }

    public function author()
    {
        return $this->belongsTo("App\User", "author_id");
    }
}
