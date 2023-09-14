<?

    // 버블정렬
    // $tmp = $arr[0];
    // $arr[0] = $arr[1];
    // $arr[1] = $tmp;

    $arr = [123, 12, 53, 34, 44, 232, 553, 341, 3];

    $a = 0;

    $count = count($arr);


    // for($x = $count - 2; $x >= 0; $x--)
    // {
    //     for($y = 0; $y <= $count - 2 - $x; $y++)
    //     {
    //         if($arr[$y] > $arr[$y + 1])
    //         {
    //             $tmp = $arr[$y];
    //             $arr[$y] = $arr[$y + 1];     
    //             $arr[$y + 1] = $tmp;    
    //         }
    //     }
    // }
    // print_r ($arr);

    for($x = 0; $x <= $count - 1; $x++)
    {
        for($y = 0; $y < $count - 1 - $x; $y++)
        {
            if($arr[$y] > $arr[$y + 1])
            {
                $tmp = $arr[$y];
                $arr[$y] = $arr[$y + 1];     
                $arr[$y + 1] = $tmp;    
            }
            // $y < $count - 1 - $x에 $x가 들어가는 이유는 뒤로간 높은 수를 굳이 확인하지 않아도 되기 때문 아래 로직보면 이해 쉬움  
            // echo "{$x} : {$y}\n"; 
        }
    }
    print_r ($arr); 

    // $x = 0;
    // while($x <= $count - 1)
    // {
    //     $y = 0;
    //     while($y <= $count - 2)
    //     {
    //         if($arr[$y] > $arr[$y + 1])
    //         {
    //             $tmp = $arr[$y];
    //             $arr[$y] = $arr[$y + 1];     
    //             $arr[$y + 1] = $tmp;    
    //         }
    //         $y++;
    //     }
    //     $x++;
    // }
    // print_r ($arr);




?>