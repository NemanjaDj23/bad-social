<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('profiles.index', array(
            'posts' => $posts,
        ));
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();
        return view('profiles.show', array(
            'user' => $user,
            'posts' => $posts,
        ));
    }

    public function edit(User $user) 
    {
        return view('profiles.edit', compact($user));
    }
}
