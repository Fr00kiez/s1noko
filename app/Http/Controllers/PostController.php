<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostComment;
use App\PostLike;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('isPostOwner')->only(['update', 'destroy']);
    }

    public function show(Post $post)
    {
        $post = Post::query()
            ->where('id', $post->id)
            ->with([
                'author',
                'likes',
                'comments' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
            ])
            ->firstOrFail();

        return view('pages.posts.show', compact('post'));
    }

    public function like(Post $post)
    {
        PostLike::create([
            'liker_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);

        return redirect()
            ->route('posts.show', ['post' => $post->id])
            ->with('success', 'Post liked successfully.');
    }

    public function unlike(Post $post)
    {
        $like = PostLike::query()
            ->where('post_id', $post->id)
            ->where('liker_id', auth()->user()->id)
            ->first();

        try {
            $like->delete();

            return redirect()
                ->route('posts.show', ['post' => $post->id])
                ->with('success', 'Post unliked successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->route('posts.show', ['post' => $post->id])
                ->with('error', 'Failed to unlike post.');
        }
    }

    public  function comment(Post $post, Request $request)
    {
        $request->validate(['comment' => 'required']);

        PostComment::create([
            'author_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comment' => $request->input('comment'),
        ]);

        return redirect()
            ->route('posts.show', ['post' => $post->id])
            ->with('success', 'Comment posted successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'file|image'
        ]);

        $userId = auth()->user()->id;

        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'picture' => $request->file('picture')->store('public/user_pictures/'.$userId),
            'author_id' => $userId,
            'tags' => '',
        ]);

        return redirect()
            ->route('posts.show', ['post' => $post->id]);
    }

    public function update(Request $request, Post $post)
    {
        $post->findOrFail($post->id)->update([
            'title' => $request->input('title', $post->title),
            'description' => $request->input('description', $post->description)
        ]);

        return redirect()
            ->route('posts.show', ['post' => $post->id])
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('index')
            ->with('success', 'Post has been deleted successfully.');
    }
}
