<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;

Route::get('/', [TodoController::class,'index'])->name('dashboard');
Route::post('edit-todo', [TodoController::class, 'update'])->name('todo.edit')->middleware('auth.basic'); 
Route::post('create-todo', [TodoController::class, 'store'])->name('todo.create')->middleware('auth.basic'); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth.basic');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::post('post-profile', [AuthController::class, 'postProfile'])->name('profile.post');
//Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
