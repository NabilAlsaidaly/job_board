<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ConatactController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',indexController::class);
Route::get('/about',AboutController::class);
Route::get('/contact',ConatactController::class);

Route::get('/job',[JobController::class,'index']);
Route::resource('blog', PostController::class);

