<?
    // trim() : 문자열의 공백을 없애주는 함수

    // strtoupper // strtolower : 문자열을 대/소문자로 변환하는 함수
    
    // strlen() : 문자열의 길이를 빈환

    // mb_strlen() : 멀티바이트 문자열의 길이를 반환 (utp-8의 경우 한글은 한 문자를 3바이트를 보기 때문에)

    // str_replace() : 특정 문자를 치환해주는 함수

    // substr() : 문자열을 자르는 함수

    // strpos() : 문자열에서 특정 문자의 위치를 반환하는 함수

    // $str = "abcdefg";
    // echo substr($str, strpos($str, "d"));  

    // isset() : 변수의 존재를 확인하는 함수

    // empty() : 변수의 값이 비어있는지 확인하는 함수
    
    // time() : 1970/01/01을 기준으로 타임스탬프 시간 확인하는 함수 (초단위)
    // echo time();

    // date() : 원하는 형식으로 시간을 표시 해주는 함수
    echo date("Y-m-d H:i:s",time());

    echo date("Y-m-d H:i:s",time() + (60 * 60 * 24 * 30));
    

?>