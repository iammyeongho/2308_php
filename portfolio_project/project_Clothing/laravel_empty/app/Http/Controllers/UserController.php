<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    function store (Request $request) {
        Log::debug("============================== 오류 확인 ==============================");
        $data = $request->only('user_id', 'email', 'password', 'password_chk', 'name', 'birthdate', 'phone_number');

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);
        Log::info($request);
        // 회원가입 정보 DB 저장
        $result = User::create($data);

        // // Eloquent 모델을 사용하여 데이터베이스에 저장
        // $user = User::create($validatedData);
        

        // 저장된 사용자를 반환하거나 다른 작업을 수행할 수 있습니다.
        // return response()->json(['user' => $user, 'message' => 'User created successfully']);
        Log::debug("============================== 오류 끝 ==============================");
    }
}
