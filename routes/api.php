<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\ShowingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('showings', [ShowingController::class,'getAll'])->name('showings.getAll')->middleware('auth:sanctum');

Route::post('auth/login', [authController::class,'apiLogin']);
