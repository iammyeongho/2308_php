<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index() {
        return view('test')->with('name', '미스터 존시나'); // with 체이닝 메소드  name은 변수가 되고 미스터 존시나는 값이 됨, 체이닝 메소드는 길어지면 계행함
    }
}
