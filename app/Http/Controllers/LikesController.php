<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    /**
     * Don't allow guests see 'likes'.
     *
     * LikesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store 'like' in database.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post)
    {
        Like::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ]);

        return back();
    }

    /**
     * Delete 'like' from database.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        Like::where('post_id', $post->id)
            ->where('user_id', auth()->id())
            ->delete();

        return back();
    }
}
