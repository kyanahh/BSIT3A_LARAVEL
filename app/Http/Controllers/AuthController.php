<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Display register page
    public function showRegister(){
        return view('register');
    }

    // Submit register page
    public function register(Request $request) {

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

    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->with('error', 'Invalid credentials');
        }

        session(['user' => $user]);

        return redirect('/dashboard')->with('success', 'Logged-in successfully');
    }

    public function logout(){
        session()->forget('users');
        return redirect('/login')->with('success', 'Logged-out successfully');
    }
}
