<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[indexController::class,'index']);
Route::get('/about',[indexController::class,'about']);
Route::get('/contact',[indexController::class,'contact']);

Route::get('/job',[JobController::class,'index']);
Route::get('/blog',[PostController::class,'index']);
Route::get('/create-posts',[PostController::class,'create']);

