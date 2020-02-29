<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Auth;
use App\User; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('home', array(
            'posts' => $posts,
        ));
    }

    public function publish()
    {
        $content = request('content');
        $id = Auth::user()->id;

        if (!empty($content)) {
            $post = new Post;
            $post->user_id = $id;
            $post->content = $content;
            $post->save();

            return redirect('/home')->with('success', 'Post published!');
        }
        else {
            return redirect('/home')->with('error', 'Nothing to publish!');
        }
    }
}
