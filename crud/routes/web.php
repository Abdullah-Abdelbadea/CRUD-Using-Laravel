<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts',PostController::class);
Route::post('/posts/softdeleted',[PostController::class,'softdeleted'])->name('softdeleted');
Route::post('/posts/restore/{post}',[PostController::class,'restore'])->name('restore');
Route::post('/posts/forcedelete/{post}',[PostController::class,'forcedelete'])->name('forcedelete');