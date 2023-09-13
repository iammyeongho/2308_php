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
    // echo date("Y-m-d H:i:s",time());

    // echo date("Y-m-d H:i:s",time() + (60 * 60 * 24 * 30));
    


    // 기본 별
    // for ($x = 1; $x <= 5; $x++)
    // {
    //     for ($y = 1; $y <=  $x; $y++)
    //     {
    //         echo "*";
    //     }
    //     echo "\n";
    // }

    // for($x = 1; $x <= 5; $x++)
    // {
    //     echo str_repeat("*",$x);
    //     echo "\n";
    // }

    // while문의 경우 전역 변수로 $y를 지정하면 $x와 값이 같아지기 때문에  54번 줄이 1번만 실행함
    // $x = 1;
    // $y = 1;
    // while($x <= 5)
    // {
    //     while($y <= $x)
    //     {
    //         echo "*";
    //         $y++;
    //     }
    //     $x++;
    //     $y = 1;
    //     echo "\n";
    // }

    // 반대 별
    // for
    // $gap = 5;
    // for ($x = 1; $x <= 5; $x++)
    // {
    //     for($z = 1; $z <= $gap - $x; $z++)
    //     {
    //         echo " ";
    //     }
    //     for ($y = 1; $y <= $x; $y++)
    //     {
    //         echo "*";
    //     }
    //     echo "\n";
    // }

    // for if
    // $gap = 5;
    // for ($x = $gap; $x >= 1; $x--)
    // {
    //     for($z = 1; $z <= $gap; $z++)
    //     if($z >= $x)
    //     {
    //         echo "*";
    //     }
    //     else
    //     {
    //         echo " ";
    //     }
    //     echo "\n";
    // }

    // while
    // $x = 1;
    // $gap = 5;
    // while($x <= 5)
    // {
    //     $y = 1;
    //     $z = 1;
    //     while($z <= $gap - $x)
    //     {
    //         echo " ";
    //         $z++;
    //     }
    //     while($y <= $x)
    //     {
    //         echo "*";
    //         $y++;
    //     }
    //     $x++;
    //     echo "\n";
    // }


    // 삼각형
    // $gap = 5;
    //     for ($x = 1; $x <= $gap; $x++) 
    // {
    //     for ($y = 1; $y <= $gap - $x; $y++) 
    //     {
    //         echo " ";
    //     }

    //     for ($z = 1; $z <= 2 * $x - 1; $z++)
    //     {
    //         echo "*";
    //     }
    
    // echo "\n";
    // }



    // 마름모
    // $gap = 6;

    // for ($x = 1; $x <= $gap; $x++) 
    // {
    //     for ($y = 1; $y <= $gap - $x; $y++) 
    //     {
    //         echo " ";
    //     }

    //     for ($z = 1; $z <= 2 * $x - 1; $z++) 
    //     {
    //         echo "*";
    //     }
    
    // echo "\n";
    // }

    // for ($a = 0; $a < $gap - 1; $a++) 
    // {
        
    //     for ($b = 1; $b < $a + 2; $b++) 
    //     {
    //         echo " ";
    //     }

    //     for ($c = $gap; $c >= 2 * $a - 2; $c--) 
    //     {
    //         echo "*";
    //     }
        
    // echo "\n";
    // }


?>