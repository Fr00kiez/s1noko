<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostsDataTable;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function index(PostsDataTable $dataTable)
    {
        $totalPosts = Post::query()
            ->count();
        $newPostsThisMonth = Post::query()
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->count();
        $activePostsToday = Post::query()
            ->where(function (Builder $query) {
              $query
                  ->whereDate('created_at', '=', date('Y-m-d'))
                  ->orWhereDate('updated_at', '=', date('Y-m-d'))
                  ->orWhereHas('likes', function (Builder $likeQuery) {
                      $likeQuery->whereDate('created_at', '=', date('Y-m-d'));
                  })
                  ->orWhereHas('comments', function (Builder $commentQuery) {
                      $commentQuery->whereDate('created_at', '=', date('Y-m-d'));
                  });
            })
            ->count();
        $newPostsToday = Post::query()
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();

        $viewData = compact('totalPosts', 'newPostsThisMonth', 'activePostsToday', 'newPostsToday');

        return $dataTable->render('admin.posts.index', $viewData);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post has been deleted successfully.');
    }
}
