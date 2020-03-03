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

        return view('profiles.index', array(
            'posts' => $posts,
        ));
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        $posts = $user->posts()->orderBy('updated_at', 'desc')->get();
        return view('profiles.show', array(
            'user' => $user,
            'posts' => $posts,
        ));
    }

    public function edit($id) 
    {
        $user = User::find($id);
        return view('profiles.edit')->with('user', $user);
    }

    public function update($id)
    {
        $occupation = request('occupation');
        $description = request('description');

        $user = User::find($id);
        $user->profile->occupation = $occupation;
        $user->profile->description = $description;
        $user->profile->id = $id;
        $user->profile->update();

        return redirect('/profile/' . $user->id)->with('success', 'Profile has been updated successfully!');
    }
}
