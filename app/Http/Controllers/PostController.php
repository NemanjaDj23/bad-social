<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $content = request('content');
        $id = Auth::user()->id;

        if (!empty($content)) {
            $post = new Post;
            $post->user_id = $id;
            $post->content = $content;
            $post->save();

            return back()->with('success', 'Post published!');
        }
        else {
            return back()->with('error', 'Nothing to publish!');
        }
    }

    public function show(\App\Post $post) 
    {
        return view('posts.show', compact('post'));
    }
}
