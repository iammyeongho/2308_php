<?php

    $n = "\n";

    // $str1 = "안녕";
    // $str2 = "하세요.";
    // $str3 = $str1.$str2;

    // echo $str3;

    // echo $n;

    // int와 str 값이 str에 합쳐지기 때문에 해당 사항 고려해서 코딩할 것

    // $str4 = "문자";
    // $num1 = 1;
    // $str5 = $str4.$num1;

    // echo $str5;

    // 상수 : 절대 변하지 않는 값 | 상수 이름은 대문자로만 작성할 것 | 상수 선언 후에 상수에 다른 값을 선언 시에 에러가 뜸
    define("NUM", 100);
    define("STR", "원");
    echo NUM, STR;

    echo $n;

    define("NS", NUM.STR);
    echo NS;


?>