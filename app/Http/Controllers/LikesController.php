<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    $posts = post::all();

        return view('PostsController', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function like(Post $post)
    {
        $post->likeBy();

        return back();
    }

    public function unlike(Post $post)
    {
        $post->unlikeBy();

        return back();
    }

}
