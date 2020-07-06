<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $postsQuery = Post::query()
            ->orderBy('id', 'desc')
            ->get();

        $posts = $postsQuery
            ->split(4)
            ->all();

        return view('pages.index', compact('posts'));
    }

    public function home()
    {
        return view('pages.home');
    }

    public function favorites()
    {
        $postsQuery = Post::query()
            ->orderBy('id', 'desc')
            ->whereHas('likes', function (Builder $query) {
                $query->where('author_id', auth()->user()->id);
            })
            ->get();

        $posts = $postsQuery
            ->split(4)
            ->all();

        return view('pages.favorites', compact('posts'));
    }
}
