<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/student/store',[App\Http\Controllers\APIs\StudentController::class, 'store']);
Route::get('/student/list/{id}',[App\Http\Controllers\APIs\StudentController::class, 'singleStudent']);
Route::get('/student/list',[App\Http\Controllers\APIs\StudentController::class, 'listStudent']);
Route::post('/student/update/{id}',[App\Http\Controllers\APIs\StudentController::class, 'update']);
Route::delete('/student/delete/{id}',[App\Http\Controllers\APIs\StudentController::class, 'destroy']);