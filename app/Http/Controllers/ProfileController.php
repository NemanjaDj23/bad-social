<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function viewProfile($id)
    {
        $user = User::findOrFail($id);
        
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();
        return view('profile', array(
            'user' => $user,
            'posts' => $posts,
        ));
    }
}
