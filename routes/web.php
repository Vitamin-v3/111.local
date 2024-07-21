<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/v1', function () {
    return 'welcome';
});


//use App\Http\Controllers\HelloController;
Route::get('/user', [HelloController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/posts/update', [PostController::class, 'update']);

Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/restore', [PostController::class, 'restore']);

Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);

Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);
