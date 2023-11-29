<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MyUserValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Log::debug("****************** 유저 유효성 체크 시작 ******************");
        Log::debug("값 :" .$request);
        $arrBaseKey = [
            'email'
            ,'password'
            ,'password_chk'
            ,'name'
            ,'phone_number'
            ,'birthdate'
            ,'gender'
        ];

        $arrBaseValidation = [
            'email' => 'regex:/^\S+@\S+\.\S+$/'
            ,'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ,'password_chk' => 'required|string|same:password'
            ,'name' => 'required|string|min:2|regex:/^[a-zA-Z ]+$/'
            ,'phone_number' => 'required|string|min:10|regex:/^\d+$/'
            ,'birthdate' => 'required|date_format:Y-m-d'
            ,'gender' => 'required|string|in:0,1'
        ];

        $arrRequestParam = [];

        Log::debug("****************** foreach 시작 ******************");
        foreach($arrBaseKey as $val) {
            Log::debug("항목 :" .$val);
            if($request->has($val)) {
                $arrRequestParam[$val] = $request->$val;
            } else {
                // 배열 안에 없는 값은 바리데이션에서 제거
                unset($arrBaseValidation[$val]);
            }
            Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
            Log::debug("유효성 체크 리스트 획득", $arrBaseValidation);
        }
        Log::debug("****************** foreach 끝 ******************");

        if (Auth::check()) {
            // 로그인 상태에서의 추가 로직
            Log::debug("사용자가 이미 로그인한 상태입니다.");
    
            // 예: 로그인한 사용자를 다른 페이지로 리다이렉트하거나 추가 처리 등
            return redirect('/');
        }

        $allSessionData = session()->all();

        Log::debug( $allSessionData);

        // 유효성 검사 | regex(정규식)
        $validator = Validator::make($arrRequestParam, $arrBaseValidation);

        // 유효성 검사 실패 시 처리
        // if($validator->fails()) {
        //     return redirect('/'.$request->path())->withErrors($validator->errors());
        // }

        Log::debug("****************** 유저 유효성 체크 종료 ******************");
        return $next($request);
    }
}
