<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;


class UserController extends Controller
{

    // 로그인
    public function loginpost(Request $request) {
        // Log::debug("****************** login 시작 ******************");
        // 유저 정보 획득
        $result = User::where('email', $request->email)->first();

        // Log::debug("값 :" .$request);
        // Log::debug("값 :" .$result);
        // 받은 값과 있는 값의 비밀번호를 체크
        if(!$result || !(Hash::check($request->password, $result->password))) {
            return response()->json([
                'success' => false,
                'message' => '아이디와 비밀번호를 확인해주세요.',
            ]);
        }
    
        // 유저 인증 작업
        Auth::login($result);
    
        $token = Str::random(60);

        // 데이터베이스에 토큰 저장
        $result->update(['remember_token' => $token]);

        Log::debug($token);
        Log::debug($request);
        if (Auth::check()) {
            session(['user' => Auth::user()]);
            $allSessionData = session()->all();

            Log::debug($allSessionData);

            // $request->session()->put('login_status', 'authenticated');

            return response()->json([
                'success' => true,
                'message' => '로그인이 성공적으로 수행되었습니다.',
                'cookie' => $token,
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => '인증 에러가 발생했습니다.',
            ]);
        }
    }

    // 로그아웃 처리
    public function logout() {
        // 세션 파기
        Session::flush();
        // 로그아웃 처리
        Auth::logout();

        return response()->json(['message' => '로그아웃 성공']);
    }

    // 회원가입
    function store (Request $request) {

        $data = $request->only('email', 'password', 'password_chk', 'name', 'gender', 'birthdate', 'phone_number');

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);
        Log::info($request);
        // 회원가입 정보 DB 저장
        $result = User::create($data);

        // // Eloquent 모델을 사용하여 데이터베이스에 저장
        // $user = User::create($validatedData);
        

        // 저장된 사용자를 반환하거나 다른 작업을 수행할 수 있습니다.
        // return response()->json(['user' => $user, 'message' => 'User created successfully']);
    }
    
}
