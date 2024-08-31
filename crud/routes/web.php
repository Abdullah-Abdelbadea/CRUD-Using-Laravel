<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/**Posts routs */
Route::resource('posts',PostController::class);
Route::post('/posts/softdeleted',[PostController::class,'softdeleted'])->name('softdeleted');
Route::post('/posts/restore/{post}',[PostController::class,'restore'])->name('restore');
Route::post('/posts/forcedelete/{post}',[PostController::class,'forcedelete'])->name('forcedelete');

/** User Routes */
Route::resource('users',UserController::class);