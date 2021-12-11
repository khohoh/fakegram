<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
// use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Route::get('/email', function () {
//     return new NewUserWelcomeMail();
// });

Route::get('/', [HomeController::class, 'index']);

Route::post('follow/{user}', [FollowsController::class, 'store']);

Route::get('/p/index',[PostsController::class, 'index']);
Route::get('/p/create', [PostsController::class, 'create']);
Route::post('/p', [PostsController::class, 'store']);
Route::get('/p/{post}', [PostsController::class, 'show']);
Route::delete('/p/{post}/delete', [PostsController::class, 'destroy']);

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profiles.update');
