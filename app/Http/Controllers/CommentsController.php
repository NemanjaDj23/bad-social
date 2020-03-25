<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;

class CommentsController extends Controller
{
    // this function add comment to the database
    public function store()
    {
        Comment::create(request()->validate([
            'comment_body' => ['required', 'min:1'],
            'post_id' => ['required'],
            'user_id' => ['required'],
        ]));

        return back();
    }
}
