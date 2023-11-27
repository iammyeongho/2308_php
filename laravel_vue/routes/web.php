<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 넘겨주는 데이터는 제이슨으로 인코딩해서 리턴해야함 json_encode($data)

Route::get('/', function () {
    $data = [
        'name' => 'root',
        'id' => 1,
    ];
    return view('welcome')->with('data', json_encode($data));
});


Route::get('/login', function () {
    $data = [
        'name' => 'login',
        'id' => 1,
    ];
    return view('welcome')->with('data', json_encode($data));
});


Route::get('/board', function () {
    $data = [
        'name' => 'board',
        'id' => 1,
    ];
    return view('welcome')->with('data', json_encode($data));
});
