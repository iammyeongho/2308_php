<?

    // 두 수를 받아서 더해주는 함수
    // 리턴이 없는 함수
    // function my_sum($a, $b)
    // {
    //     echo $a + $b;
    // }
    
    // my_sum(5, 4);

    echo "\n";

    // 리턴이 있는 함수 | 값을 넘겨주지만 출력하지는 않음
    // function my_sum($a, $b)
    // {
    //     return $a + $b;
    // }

    // echo my_sum(1, 2);

    // function my_min($a, $b)
    // {
    //     return $a - $b;
    // }
    // echo my_min(1, 2);
    // echo "\n";

    // function my_mult($a, $b)
    // {
    //     return $a * $b;
    // }
    // echo my_mult(1, 2);
    // echo "\n";

    // function my_div($a, $b)
    // {
    //     return $a / $b;
    // }
    // echo my_div(1, 2);
    // echo "\n";

    // function my_value($a, $b)
    // {
    //     return $a % $b;
    // }
    // echo my_value(1, 2);

    // 파라미터는 펑션 안에 들어 있는 함수, 아규먼트는 리턴 값을 호출 했을 때

    // 파라미터의 기본 값이 설정되어 있는 함수 | 디폴트 값을 지정할 시 제일 뒤로
    // function my_sum($a, $b = 5, $c = 3)
    // {
    //     return $a + $b + $c;
    // }

    // echo my_sum(3);

    // 가변 파라미터 | ...$items는 배열로 정렬됨

    // php 5-5 이하에서 사용 방법

    // function my_args_param(...$items)
    // {
    //     $items = func_gat_args();
    //     print_r($items);
    // }
    // my_args_param("a","b","c")


    // php-5.6 이상에서 사용 방법
    function my_args_param(...$items)
    {
        echo $items[1];
    }
    my_args_param("a","b","c");

?>