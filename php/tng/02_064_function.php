<?
    // 몇개인지 모르는 숫자를 다 더해주는 함수를 만들어주세요

    // echo my_sum(1, 5, 3);

    // function my_sum(...$i)
    // {
    //     $sum = 0; 
    //     foreach($i as $plus)
    //     {
    //         $sum += $plus;
    //     }
    //     return $sum;
    // }

    // echo "\n";

    // echo my_min(10, 5, 3);

    // function my_min(...$l)
    // {
    //     $min = 0;
    //     foreach($l as $sub)
    //     {
    //         $min -= $sub;
    //     }
    //     return $min;
    // }

    // echo "\n";

    // echo my_min(10, 5, 3) + my_sum(10, 5, 3);


    //     echo my_sum(1, 5, 3);

    // function my_all(...$i)
    // {
    //     $sum = 0; 
    //     foreach($i as $plus)
    //     {
    //         $plus--;
    //         $sum += $plus;
    //     }
    //     return $sum;
    // }


    // function my_all($a)
    // {
    //     $sum = 0;
    //     for($i = 0; $i <= $a; $i++)
    //     {
    //         $sum += $i;
    //     }
    //     return $sum;
    // }
    
    // echo my_all(5);

    // function my_ap($b)
    // {
    //     $i = $b;
    //     while($i >= 1)
    //     {
    //     $i--;
    //     $b += $i;
    //     }
    //     return $b;
    // }
    // echo my_ap(100);

    // echo "\n";

    // 재귀함수
    // function my_recursion($i)
    // {
    //     if($i === 0)
    //     {
    //         return 0;
    //     }
    //     return $i + my_recursion($i - 1);
    // }
    // echo my_recursion(100);

    // 숫자로 이루어진 문자열을 하나 받습니다.
    // 이 문자열의 모든 숫자를 더 해주세요

    // function my_str($str)
    // {
    //     $sum = 0;
    //     for($i = 0; $i < mb_strlen($str); $i++)
    //     {
    //         $sum += $str[$i];
    //     }
    //     return $sum;
    // }
    // echo my_str("3467");

   
    // $str = "43433";
    // function my_str(string $str)
    // {   
    //     $str_mb = mb_strlen($str); // mb_strlen() 문자열의 길이를 구하는 함수
    //     $sum = 0;
    //     for($i = 0; $i <= $str_mb - 1; $i++)
    //     {
    //         $sum += (int)mb_substr($str, $i, 1); // mb_substr() 문자열, 시작 지점, 길이
    //     }
    //     return $sum;
    // }
    // echo my_str($str);


    $str = "4343344";
    function my_str(string $str)
    {
        $arr = str_split($str); //str_split() 대상 문자열을 분할하여 배열로 리턴하는 역활
        return array_sum($arr);

    }
    echo my_str($str); 

?>