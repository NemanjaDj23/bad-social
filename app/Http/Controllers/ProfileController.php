<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');      
    }

    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('profiles.index')->with( 'posts', $posts );
    }
    
    public function show(User $user)
    {
        $posts = $user->posts()->orderBy('updated_at', 'desc')->get();
        return view('profiles.show')->with([ 'user' => $user, 'posts' => $posts, ]);
    }

    public function edit(User $user) 
    {
        return view('profiles.edit')->with( 'user', $user );
    }

    public function update(User $user)
    {
        $occupation = request('occupation');
        $description = request('description');

        $user->profile->occupation = $occupation;
        $user->profile->description = $description;
        $user->profile->id = $user->id;
        $user->profile->update();

        return redirect('/profile/' . $user->id)->with('success', 'Profile has been updated successfully!');
    }
}
