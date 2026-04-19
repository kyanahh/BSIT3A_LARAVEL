<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function showProfile(){
        return view('profile');
    }

    public function updateProfile(Request $request){
        $user = User::find(session('user')->id);


        if($request->hasFile('profile')){

            // Get the filename
            $filename = $request->file('profile');

            // Create a unique file name
            $newfilename = time() . $filename->getClientOriginalExtension(); // .jpg 

            // Move to permanent folder
            $filename->move(public_path('uploads'), $newfilename);

            // Save the newfilename to the database
            $user->profile_pic = $newfilename;

        }

        // Update the name and the email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update users SET ... || Apply to all changes in the database table
        $user->save();

        session(['user' => $user]); // Refresh session

        return back()->with('success', 'Profile updated successfully');

    }
}
