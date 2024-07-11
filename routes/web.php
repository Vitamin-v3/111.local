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
