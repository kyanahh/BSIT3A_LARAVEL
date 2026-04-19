<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Display register page
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Submit register
Route::post('/register', [AuthController::class, 'register']);

// Display login page
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Submit login form
Route::post('/login', [AuthController::class, 'login']);

// Display dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

// Display users table page
Route::get('/users', [UserController::class, 'userstable'])->name('users');

Route::post('/users', [UserController::class, 'addUser']);

// Logout
Route::get('/logout', [AuthController::class, 'logout']);

// Display ToDo Page
Route::get('/todo', [ToDoController::class, 'showToDo'])->name('todo');

// Insert task
Route::post('/todo', [ToDoController::class, 'todo']);

// Delete Task
Route::get('/deleteToDo/{id}', [ToDoController::class, 'deleteTodo']);

// Edit Task
Route::post('/updateTask/{id}', [ToDoController::class, 'updateTask']);

// Display Profile Page
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('user_account');

// Update Profile Info
Route::post('/updateProfile', [ProfileController::class, 'updateProfile']);