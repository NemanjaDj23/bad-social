<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Category;
use Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');      
    }
    
    // this function returns all posts from logged-in user
    public function show(User $user)
    {
        if(request('category'))
        {
            $posts = Category::where('name', request('category'))->firstOrFail()->posts()->users()->get();
        } else {
            $posts = $user->posts()->orderBy('updated_at', 'desc')->get();
        }

        $categories = Category::all();

        return view('users.show')->with([ 'user' => $user, 'posts' => $posts, 'categories' => $categories, ]);
    }

    // this function returns the logged-in user 
    public function edit(User $user) 
    {
        return view('users.edit')->with( 'user', $user );
    }

    // this function update user profile photo
    public function update(Request $request, User $user)
    {
        request()->validate([
            'occupation' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3'],
        ]);
        $photo = $request->file('profile_photo');

        // This code will be executed if a photo has been added to the form
        if ($photo)
        {
            // this row will delete previous profile photo if exist in the uploads folder
            Storage::disk('public')->delete($user->filename);

            // this rows will add a profile photo in public/uploads folder
            $extension = $photo->getClientOriginalExtension();
            Storage::disk('public')->put($photo->getFilename().'.'.$extension,  File::get($photo));
            
            // this code will add data type, original filename and encrypted filename to database 
            $user->mime = $photo->getClientMimeType();
            $user->original_filename = $photo->getClientOriginalName();
            $user->filename = $photo->getFilename().'.'.$extension;
        }
        
        $user->occupation = $request->occupation;
        $user->description = $request->description;
        $user->id = $user->id;
        $user->update();

        return redirect('/users/'.$user->id)->with('success', 'Profile has been updated successfully!');
    }
}
