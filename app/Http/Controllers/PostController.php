<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // this function returns all posts
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('posts.index')->with( 'posts', $posts );
    }

    // this function add post to the database
    public function store()
    {
        Post::create(request()->validate([
            'post_body' => ['required', 'min:3'],
            'user_id' => ['required'],
        ]));

        return back()->with('success', 'Post published!');
    }

    //this function returns the current post to the post show page 
    public function show(Post $post) 
    {
        return view('posts.show')->with('post', $post);
    }

    // this function returns the current post to the post edit page
    public function edit(Post $post) 
    {
        return view('posts.edit')->with('post', $post);
    }

    // this function update post
    public function update(Post $post)
    {
        $post->update(request()->validate([
            'post_body' => ['required', 'min:3'],
        ]));

        return redirect('/posts')->with('success', 'Post has been updated successfully!');
    }

    //this function delete post
    public function destroy(Post $post) {
        $post->delete();
        return back()->with('success', 'Post has been deleted successfully!');
    }
}
