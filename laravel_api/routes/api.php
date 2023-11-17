<?php

use App\Http\Controllers\ItemController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // });

// 라우트 그룹
Route::prefix('/item')->group( function () {
    // 게시글 전체 조회
    Route::get('/', [ItemController::class, 'index']); 
    // 게시글 작성
    Route::post('/', [ItemController::class, 'store']);
    // 게시글 수정
    Route::put('/{id}', [ItemController::class, 'update']);
    // 게시글 삭제
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});