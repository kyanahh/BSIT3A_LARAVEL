<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function showDashboard(){

        $userCount = User::count();
        $todoCount = ToDo::count();

        return view('dashboard', compact('userCount', 'todoCount'));
    }
}
