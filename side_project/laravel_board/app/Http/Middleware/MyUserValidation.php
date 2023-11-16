<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MyUserValidation
{
    // 파일 생성 명령어
    // php artisan make:middleware 미들웨어명
    // 미들웨어 생성 -> kernel 최하단에 작성 -> 라우터에서 사용
    // TODO jwt 공부
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 해당 로그 파일은 storage -> logs에 해당 날짜의 파일이 생성됨
        Log::debug("****************** 유저 유효성 체크 시작 ******************");
        // TODO 미들웨어 / Log::debug 해당 부분 공부

        // 항목 리스트
        $arrBaseKey = [
            'email'
            ,'name'
            ,'password'
            ,'passwordchk'
        ];

        // 유효성 체크 리스트
        $arrBaseValidation = [
            'email' => 'required|email|max:50'
            ,'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
            ,'password' => 'required'
            ,'passwordchk' => 'same:password'
        ];

        // request 파라미터
        $arrRequestParam = [];

        // 루프 돌려서 값이 있으면 해당 값을 리퀘스트에 넣어줌
        // Log::debug("****************** foreach 시작 ******************");
        foreach($arrBaseKey as $val) {
            // Log::debug("항목 :" .$val);
            if($request->has($val)) {
                $arrRequestParam[$val] = $request->$val;
            } else {
                // 배열 안에 없는 값은 바리데이션에서 제거
                unset($arrBaseValidation[$val]);
            }
            // Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
            // Log::debug("유효성 체크 리스트 획득", $arrBaseValidation);
        }
        // Log::debug("****************** foreach 끝 ******************");

        // 유효성 검사 | regex(정규식)
        $validator = Validator::make($arrRequestParam, $arrBaseValidation);

        // 유효성 검사 실패 시 (호)처리
        if($validator->fails()) {
            return redirect('/'.$request->path())->withErrors($validator->errors());
        }

        Log::debug("****************** 유저 유효성 체크 종료 ******************");
        return $next($request);
    }
}
