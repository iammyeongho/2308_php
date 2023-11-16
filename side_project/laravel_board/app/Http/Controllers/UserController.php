<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function loginget() {
        // 로그인 한 유저는 보드 리스트로 이동
        if(Auth::check()) {
            return redirect()->route('board.index');
        }
        return view('login');
    }
    public function loginpost(Request $request) {
        // // *del 231116 미들웨어(MyUserValiattilon으로 이관
        // // 유효성 검사
        // $validator = Validator::make(
        //     $request->only('email', 'password')
        //     ,[
        //         'email' => 'required|email|max:50'
        //         ,'password' => 'required'
        //     ]
        // );

        // // 유효성 검사 실패 시 (호)처리
        // if($validator->fails()) {
        //     return view('login')->withErrors($validator->errors());
        // }

        // 유저 정보 획득
        $result = User::where('email', $request->email)->first();
        // 받은 값과 있는 값의 비밀번호를 체크
        if(!$result || !(Hash::check($request->password, $result->password))) {
            $errorMsg = '아이디와 비밀번호를 확인해주세요.';
            return view('login')->withErrors($errorMsg);
        }

        // 유저 인증 작업
        Auth::login($result);
        if(Auth::check()) {
            session($result->only('id'));
        } else {
            $errorMsg = '인증 에러가 발생했습니다.';
            return view('login')->withErrors($errorMsg);
        }

        // url 변경 시에 redirect 사용
        return redirect()->route('board.index');
    }

    public function logoutget() {
        // 세션 파기
        Session::flush();
        // 로그아웃 처리
        Auth::logout();

        return redirect()->route('user.login.get');
    }

    public function registrationget() {
        return view('registration');
    }
    public function registrationpost(Request $request) {
        // // *del 231116 미들웨어(MyUserValiattilon으로 이관
        // 유효성 검사
        // regex(정규식)
        // $validator = Validator::make(
        //     $request->only('email', 'password', 'passwordchk' ,'name')
        //     ,[
        //         'email' => 'required|email|max:50'
        //         ,'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
        //         ,'password' => 'required|same:passwordchk'
        //     ]
        // );
        // // 바리데이션 에러 체크
        // // var_dump($validator->errors());

        // // 유효성 검사 실패 시 (호)처리
        // if($validator->fails()) {
        //     return view('registration')->withErrors($validator->errors());
        // }

        // only를 사용하면 Request에서 원하는 값만 배열로 받아옴
        // 데이터베이스에 저장할 데이터 획득
        $data = $request->only('email', 'password', 'name');

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);

        // 회원가입 정보 DB 저장
        $result = User::create($data);

        return redirect()->route('user.login.get');
    }
}
