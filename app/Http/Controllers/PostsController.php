<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Post;
use App\Category;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // this function returns all posts
    public function index()
    {
        if(request('category'))
        {
            $posts = Category::where('name', request('category'))->firstOrFail()->posts()->orderBy('updated_at', 'desc')->get();
        } else {
            $posts = Post::orderBy('updated_at', 'desc')->get();
        }

        $categories = Category::all();

        return view('posts.index')->with([ 'posts' => $posts, 'categories' => $categories, ]);
    }

    // this function add post to the database
    public function store(Request $request) {

        request()->validate([
            'post_body' => ['required', 'min:3'],
            'user_id' => ['required'],
            'categories' => ['exists:categories,id'],
        ]);
        
        $post = new Post();
        $post->user_id = $request->user_id;
        $post->post_body = $request->post_body;
        $post->save();

        if ($categories = $request->categories){
            foreach($categories as $category) {
                $post->categories()->attach($category, ['post_id' => $post->id, 'category_id' => $category]);
            }
        }
        

        return back()->with('success', 'Post successfully published!');
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
