<?php

// use controller\UserController;list
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can registrationr web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 오류 츌력 부 = lang/en/validation/required 부분 한글로 수정 | 최하단 attributes 값 확인

Route::get('/', function () {
    return view('login');
});

// Route::resource('/user', UserController::class);
// php artisan route:list

// php artisan make:controller UserController --resource로는 로그인 처리를 완벽하게 하기 힘듬
// GET|HEAD        user . user.index › UserController@index         로그인화면 이동
// GET|HEAD        user/{user}/edit ............. user.edit › UserController@edit           로그인 처리

// GET|HEAD        user/create .................. user.create › UserController@create       회원가입 화면 이동 
// POST            user . user.store › UserController@store         회원가입 처리

// GET|HEAD        user/{user} .................. user.show › UserController@show           회원 정보 화면 이동
// PUT|PATCH       user/{user} .................. user.update › UserController@update       회원 정보 수정 처리

// DELETE          user/{user} .................. user.destroy › UserController@destroy     회원 탈퇴 처리


// 유저 관련
// 로그인 화면 이동
Route::get('/user/login', [UserController::class, 'loginget'])->name('user.login.get');
// 로그인 처리
// 해당 미들웨어 사용 시에 Kernel의 최하단 작성
Route::middleware('my.user.validation')->post('/user/login', [UserController::class, 'loginpost'])->name('user.login.post');

// 로그아웃 처리
Route::get('/user/logout', [UserController::class, 'logoutget'])->name('user.logout.get');

// 회원가입 화면 이동
Route::get('/user/registration', [UserController::class, 'registrationget'])->name('user.registration.get');
// 회원가입 처리
Route::middleware('my.user.validation')->post('/user/registration', [UserController::class, 'registrationpost'])->name('user.registration.post');


// ----------------------------------------------------------------------------------------
// 보드 관련
// GET|HEAD        board ..................... board.index › BoardController@index  
// POST            board ..................... board.store › BoardController@store  작성
// GET|HEAD        board/create ............ board.create › BoardController@create  작성 페이지
// GET|HEAD        board/{board} ............... board.show › BoardController@show  디테일 페이지
// PUT|PATCH       board/{board} ........... board.update › BoardController@update  
// DELETE          board/{board} ......... board.destroy › BoardController@destroy  
// GET|HEAD        board/{board}/edit .......... board.edit › BoardController@edit  

// Middleware/Authenticate/protected function redirectTo
// Middleware 수정 후 kernel 수정해야함
// 로그인 인증과 관련된 내용
// middleware('auth')로 로그인 관련 체크를 해줌
Route::middleware('auth')->resource('/board', BoardController::class);