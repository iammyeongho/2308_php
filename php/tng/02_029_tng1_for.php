<?

    // 문제 1: 1에서 10까지의 숫자를 출력하는 프로그램을 작성하세요.
    // for($i = 1; $i <= 10; $i++)
    // {
    //     echo "$i\n";
    // }


    // 문제 2: 1에서 100까지의 홀수를 출력하는 프로그램을 작성하세요.
    // for($i = 1; $i <= 100; $i+= 2)
    // {
    //     echo "$i\n";
    // }

    // 문제 3: 사용자로부터 양의 정수를 입력받아 해당 숫자의 팩토리얼을 계산하는 프로그램을 작성하세요.
    // $l = 1;
    // $a = 10;
    // for($i = 1; $i <= 10; $i++)
    // {
    //     $l *= $i;
    //     echo $i,"!=",$l, "\n";
    // }


    // 문제 4: 배열 [3, 6, 9, 12, 15]를 순회하면서 각 요소를 2배로 만든 후 출력하는 프로그램을 작성하세요.
    // $x = [3,6,9,12,15,13];
    // $i = count($x);
    // for($y = 0; $y <= $i - 1; $y++ )
    // {
    //     $z = $x[$y] * 2;
    //     echo  $z, "\n";
    // }

    // foreach($x as $num) 
    // {
    //     echo $num * 2, "\n";
    //   }

    // 문제 5: 사용자로부터 정수를 입력받아, 해당 정수의 구구단을 출력하는 프로그램을 작성하세요.

    // $y = 2;
    // for($x = 1; $x <= 9; $x++)
    // {
    //     $z = $y * $x;
    //     echo "$y x $x = $z \n";
    // }


    // 문제 6: 배열 [1, 2, 3, 4, 5]를 역순으로 출력하는 프로그램을 작성하세요.

    // $x = [1,2,3,4,5];
    // for($y = 4; $y >= 0; $y--)
    // {
    //     $z = $x[$y];
    //     echo $z, "\n";
    // }


    // 문제 7: 사용자로부터 문자열을 입력받아, 해당 문자열을 거꾸로 출력하는 프로그램을 작성하세요.

    // $x = "abcdefg";
    // $y = strlen($x);

    // for($z = $y - 1; $z >= 0; $z--)
    // {
    //     echo $x[$z];
    // }


    // 문제 3: 별 피라미드 출력하기

    // $h = 5;

    // for ($i = 1; $i <= $h; $i++) 
    // {
    //     for ($j = 1; $j <= $h - $i; $j++) 
    //     {
    //         echo " ";
    //     }
    // for ($s = 1; $s <= 2 * $i - 1; $s++) 
    // {
    //     echo "*";
    // }
    // echo "\n";
    // }

    // 구구단
    // for($x = 1; $x <= 9; $x++)
    // {
    //     $y = 2;
    //     echo "$x X $y = ",$x * $y, "\n";
    // }

    // for($x = 1; $x <= 9; $x++)
    // {
    //     echo "{$x}단 \n";

    //     for($y = 1; $y <= 9; $y++)
    //     {
    //         $z = $x * $y;
    //         echo "$x X $y = $z \n";
    //     }
    // }

    // for($x = 1; $x <= 9; $x+=8)
    // {
    //     echo "{$x}단 \n";

    //     for($y = 1; $y <= 9; $y++)
    //     {
    //         $z = $x * $y;
    //         echo "$x X $y = $z \n";
    //     }
    // }

    // for($x = 1; $x <= 9; $x++)
    // {
    //     if($x != 1 && $x != 9)
    //     {
    //         continue;
    //     }
    //     echo "{$x}단 \n";

    //     for($y = 1; $y <= 9; $y++)
    //     {
    //         $z = $x * $y;
    //         echo "$x X $y = $z \n";
    //     }
    // }

    // for($x = 1; $x <= 9; $x++)
    // {
    //     if($x === 1 || $x === 9)
    //     {
    //         echo "{$x}단 \n";

    //         for($y = 1; $y <= 9; $y++)
    //         {
    //             $z = $x * $y;
    //             echo "$x X $y = $z \n";
    //         }
    //     }
    // }

    // for($x = 1; $x <= 9; $x++)
    // {
    //     if($x >= 2 && $x <= 8)
    //     {
    //         continue;
    //     }
    //     echo "{$x}단 \n";

    //     for($y = 1; $y <= 9; $y++)
    //     {
    //         $z = $x * $y;
    //         echo "$x X $y = $z \n";
    //     }
    // }


    // for($x = 1; $x <= 9; $x+=2)
    // {
    //     echo "{$x}단 \n";

    //     for($y = 1; $y <= 9; $y++)
    //     {
    //         $z = $x * $y;
    //         echo "$x X $y = $z \n";
    //     }
    // }

    // for($x = 1; $x <= 9; $x++)
    // {
    //     if($x %2 == 0)
    //     {
    //         continue;
    //     }
    //     echo "{$x}단 \n";

    //     for($y = 1; $y <= 9; $y++)
    //     {
    //         $z = $x * $y;
    //         echo "$x X $y = $z \n";
    //     }
    // }

?>