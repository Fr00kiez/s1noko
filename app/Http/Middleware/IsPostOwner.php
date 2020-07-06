<?php

namespace App\Http\Middleware;

use Closure;

class IsPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $post = $request->route()->parameter('post');
        if ($post->author_id !== auth()->user()->id) {
            return redirect()
                ->route('posts.show', ['post' => $post->id])
                ->with('error', 'You do not have the permission to do this action.');
        }
        return $next($request);
    }
}
