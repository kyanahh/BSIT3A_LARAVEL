<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function userstable(){

        $users = User::all();

        // [ 'users' => $users ]
        return view('users', compact('users'));
    }

    public function addUser(Request $request){

        // Checks if user email already exists
        if(User::where('email', $request->email)->exists()){
            return back()->with('error', 'Email already exists');
        }

        // Check if both passwords match
        if($request->password !== $request->confirmpassword){
            return back()->with('error', 'Passwords do not match');
        }

        User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Account created successfully');
    }
}
