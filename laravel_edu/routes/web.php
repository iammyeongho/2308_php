<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});


// |--------------------------------------------------------------------------
// 라우터 설계
// |--------------------------------------------------------------------------
// 콜백 함수가 아닌 클로저
// 문자열 리턴
Route::get('/hi', function() {
    return '안녕하세요.';
});

// 없는 뷰 파일을 리턴할 때
Route::get('/myview', function() {
    return view('myview');
});

// |--------------------------------------------------------------------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의된 것이 실행
// |--------------------------------------------------------------------------
// GET메소드로 localhost/home으로 접속했을 때 home라는 뷰 파일을 리턴해주세요.

Route::get('/home', function() {
    return view('home');
});

// POST 요청
Route::post('/home', function() {
    return '메소드 : POST';
});

// PUT 요청
// view의 form에 [@method('PUT')]을 추가
Route::put('/home', function() {
    return '메소드 : PUT';
});

// DELETE 요청
Route::delete('/home', function() {
    return '메소드 : DELETE';
});

// |--------------------------------------------------------------------------
// 라우터에서 파라미터 제어
// |--------------------------------------------------------------------------
// 쿼리 스트링에 파라미터가 세팅돼서 요청이 올 때 파라미터 획득 (GET)
Route::get('/query', function(Request $request) {
    return $request->id.", ".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}', function($id) {
    return '세그먼트 파라미터 :'.$id;
});

Route::get('/segment/{id}/{name}', function($id, $name) {
    return '세그먼트 파라미터 2개 이상 :'.$id.', '.$name;
});

// 아래처럼 객체를 생성하기보단 위에 처럼 정해진 값을 받아오는 방식이 선호됨
// http://localhost/segment2/1/ttt
Route::get('/segment2/{id}/{name}', function(Request $request) {
    return '쿼리스트링 파라미터 2개 이상 : '.$request->id.', '.$request->name;
});


// 쿼리 스트링과 세그먼트 파라미터를 병행해서 사용 가능
Route::get('/segment3/{id}/{name}', function(Request $request, $id) {
    return '쿼리스트링 세그머트 파라미터 3개 이상 : '.$request->id.', '.$id.', '.$request->name;
});

// URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
// 파라미터에 값을 따로 지정하지 않으면 기본값이 세팅됨
Route::get('/segment4/{id?}', function ($id = 'base') {
    return 'segment4 : '.$id;
});

// |--------------------------------------------------------------------------
// 라우터 매칭 실패 시 대체 라우터 정의
// 로컬에서 이상한 url로 이동 시에 잘못된 경로를 입력하셨습니다 출력
// |--------------------------------------------------------------------------
Route::fallback(function () {
    return '잘못된 경로를 입력하셨습니다.';
});

// |--------------------------------------------------------------------------
// 라우터의 이름 지정
// |--------------------------------------------------------------------------
Route::get('/name', function () {
    return view('name');
});

Route::get('/name/home/php504/root', function () {
    return '이름없는 라우터';
});

Route::get('/name/home/php504/user', function () {
    return '이름있는 라우터';
})->name('name.user'); // 체이닝 기법

// |--------------------------------------------------------------------------
// 컨트롤러
// |--------------------------------------------------------------------------
// 커맨드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
// App는 폴더가 소문자라도 저렇게 대문자로 해줘야함
use App\Http\Controllers\TestController;
// name을 지정할 때 앞에는 기능명을 뒤에는 액션명으로 작성
Route::get('/test', [TestController::class,'index'])->name('test.index');

// php artisan make:controller 컨트롤러명 --resource
// php artisan make:controller TaskController --resource
use App\Http\Controllers\TaskController;
// Route:get('/task', [TaskController::class, 'index']->name('task.index'));
// resource 안의 값을 지우면 에러 걸림
Route::resource('/task', TaskController::class);
//GET|HEAD        task .................... task.index › TaskController@index  
//POST            task .................... task.store › TaskController@store  
//GET|HEAD        task/create ............. task.create › TaskController@create  
//GET|HEAD        task/{task} ............. task.show › TaskController@show  
//PUT|PATCH       task/{task} ............. task.update › TaskController@update  
//DELETE          task/{task} ............. task.destroy › TaskController@destroy  
//GET|HEAD        task/{task}/edit ........ task.edit › TaskController@edit


Route::get('/layout', function () {
    return view('inc.layout');
});

// child1,2는 html 값이 없지만 화면에 표시되는 이유는 layout를 상속 받기 때문에
Route::get('/child1', function () {
    $arr = [
        'name' => '김민정'
        ,'age' => '30'
        ,'gender' => '에이젠더'
    ];
    $arr2 = [];
    return view('child1')
                ->with('gender', '0')
                ->with('data', $arr)
                ->with('data2', $arr2);
});

Route::get('/child2', function () {
    return view('child2');
});