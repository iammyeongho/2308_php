<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('my.user.validation')->post('/Login', [UserController::class, 'loginpost']);

Route::middleware('my.user.validation')->post('/Logout', [UserController::class, 'logout']);

Route::middleware('my.user.validation')->post('/registration', [UserController::class, 'store']);