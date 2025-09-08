<?php

use App\Http\Controllers\api\PostapiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('post', PostapiController::class);
