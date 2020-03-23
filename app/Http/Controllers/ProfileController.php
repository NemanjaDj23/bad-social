<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');      
    }
    
    // this function returns all posts from logged-in user
    public function show(User $user)
    {
        $posts = $user->posts()->orderBy('updated_at', 'desc')->get();
        return view('profiles.show')->with([ 'user' => $user, 'posts' => $posts, ]);
    }

    // this function returns the logged-in user 
    public function edit(User $user) 
    {
        return view('profiles.edit')->with( 'user', $user );
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
            Storage::disk('public')->delete($user->profile->filename);

            // this rows will add a profile photo in public/uploads folder
            $extension = $photo->getClientOriginalExtension();
            Storage::disk('public')->put($photo->getFilename().'.'.$extension,  File::get($photo));
            
            // this code will add data type, original filename and encrypted filename to database 
            $user->profile->mime = $photo->getClientMimeType();
            $user->profile->original_filename = $photo->getClientOriginalName();
            $user->profile->filename = $photo->getFilename().'.'.$extension;
        }
        
        $user->profile->occupation = $request->occupation;
        $user->profile->description = $request->description;
        $user->profile->id = $user->id;
        $user->profile->update();

        return redirect('/profile/'.$user->id)->with('success', 'Profile has been updated successfully!');
    }
}
