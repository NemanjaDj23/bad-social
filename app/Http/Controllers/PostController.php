<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
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

    public function show(Post $post) 
    {
        return view('posts.show')->with('post', $post);
    }

    public function edit(Post $post) 
    {
        return view('posts.edit')->with('post', $post);
    }

    public function update(Post $post)
    {
        $content = request('content');
    
        if(!empty($content))
        {
            $post->content = $content; 
            $post->update();

            return redirect('/index')->with('success', 'Post has been updated successfully!');
        }
        else 
        {
            return redirect('/index')->with('error', 'Empty post can not been updated!');
        }
        
    }

    public function destroy(Post $post) {
        $post->delete();
        return back()->with('success', 'Post has been deleted successfully!');
    }
}
