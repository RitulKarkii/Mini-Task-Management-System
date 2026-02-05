<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Users;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/category',[CategoryController::class,'create']);
Route::post('/category',[CategoryController::class,'category']);
Route::get('editCategory/{id}',[CategoryController::class,'editCategory']);
Route::put('edit-category/{id}',[CategoryController::class,'updateCategory']);
Route::get('deleteCategory/{id}',[CategoryController::class,'deleteCategory']);
Route::get('search',[CategoryController::class,'search']);

Route::get('/dashboard', [DashboardController::class, 'create'])->middleware('auth');
Route::get('edit/{id}', [DashboardController::class, 'edit']);
Route::post('/tasks',[DashboardController::class,'task']);
Route::put('edit-task/{id}',[DashboardController::class,'editTask']);
Route::get('delete/{id}',[DashboardController::class,'delete']);
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/users', [Users::class, 'index']);

Route::post('/register',[RegisterController::class,'register']);

Route::post('/login',[LoginController::class,'login']);





