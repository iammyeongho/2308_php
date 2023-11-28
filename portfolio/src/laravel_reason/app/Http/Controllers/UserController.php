<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function store(Request $request) {
        // 요청에서 받은 데이터를 데이터베이스에 저장하기 전에 유효성 검사 등을 수행할 수 있습니다.
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'gender' => 'required|string|max:255',
        //     'birthdate' => 'required|date',
        //     'phone_number' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users|max:255',
        //     'password' => 'required|string|min:6|same:passwordchk',
        //     'password_cnk' => 'required|string|min:6|confirmed',
        // ]);

        $data = $request->only('email', 'password', 'name', 'gender', 'birthdate', 'phone_number');

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);

        // 회원가입 정보 DB 저장
        $result = User::create($data);

        // // Eloquent 모델을 사용하여 데이터베이스에 저장
        // $user = User::create($validatedData);
        

        // 저장된 사용자를 반환하거나 다른 작업을 수행할 수 있습니다.
        // return response()->json(['user' => $user, 'message' => 'User created successfully']);
    }
    
}
