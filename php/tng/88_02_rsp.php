<?

    // $in_str = fgets(STDIN);

    // echo "입력값 : {$in_str}";

    // 가위 : scissors
    // 바위 : rock
    // 보 : paper

    

    // $scissors = "Scissors";
    // $rock = "Rock";
    // $paper = "Paper";

    // $user = trim(fgets(STDIN));
    // $computer = ["scissors", "rock", "paper"];
    // $computer_rand = array_rand($computer);
    // $computer_value = $computer[$computer_rand];
    // $error = "잘못된 입력입니다.";

    // $user = "scissors";

    // if($user === "scissors")
    // {
    //     if("$computer_value" === "seissors")
    //     {
    //         echo "무승부";
    //     }
    //     else if($computer_value === "rock")
    //     {
    //         echo "패";
    //     }
    //         else if($computer_value === "paper")
    //     {
    //         echo "승";
    //     }
    //     else
    //     {
    //         echo $error;
    //     }
    // }
    
    
//     if($user === "scissors")
//     {
//         if("$computer_value" === "seissors")
//         {
//             echo "(무승부)\n당신의 패는 {$user} 상대의 패는 {$computer_value} ";
//         }
//         else if($computer_value === "rock")
//         {
//             echo "(패)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
//         }
//         else if($computer_value === "paper")
//         {
//             echo "(승)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
//         }
//     }
    
//     else if($user === "rock")
//     {
//         if($computer_value === "seissors")
//         {
//             echo "(승)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
//         }
//         else if($computer_value === "rock")
//         {
//             echo "(무승부)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
//         }
//         else if($computer_value === "paper")
//         {
//             echo "(패)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
//         }
//     }

//     else if($user === "paper")
//     {
//         if($computer_value === "seissors")
//         {
//             echo "(패)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
//         }
//         else if($computer_value === "rock")
//         {
//             echo "(승)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
//         }
//         else if($computer_value === "paper")
//         {
//             echo "(무승부)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
//         }
//     } 

//     else
//     {
//         echo $error;
//     }

// exit;

    // $user = trim(fgets(STDIN));
    // $computer = ["0", "1", "2"];
    // $computer_rand = array_rand($computer);
    // $error = "잘못된 입력입니다.";

    // echo "가위는 0, 주먹은 1, 보자기는 2\n\n";

    // while(1)
    // {
    //     $computer_rand = array_rand($computer);
    //     echo "\n당신의 입력값은\n";
    //     $user = trim(fgets(STDIN));

    //     if($user === "0")
    //     {
    //         if($computer_rand === 0)
    //         {
    //             echo "----------(무승부)----------\n";
    //             echo "\n당신의 패는 가위 상대의 패는 가위";
    //         }
    //         else if($computer_rand === 1)
    //         {
    //             echo "------------(패)------------\n";
    //             echo "\n당신의 패는 가위 상대의 패는 주먹";
    //         }
    //         else if($computer_rand === 2)
    //         {
    //             echo "------------(승)------------\n";
    //             echo "\n당신의 패는 가위 상대의 패는 보자기";
    //         }
    //     }
        
    //     else if($user === "1")
    //     {
    //         if($computer_rand === 0)
    //         {
    //             echo "------------(승)------------\n";
    //             echo "\n당신의 패는 주먹 상대의 패는 가위";
    //         }
    //         else if($computer_rand === 1)
    //         {
    //             echo "----------(무승부)----------\n";
    //             echo "\n당신의 패는 주먹 상대의 패는 주먹";
    //         }
    //         else if($computer_rand === 2)
    //         {
    //             echo "------------(패)------------\n";
    //             echo "\n당신의 패는 주먹 상대의 패는 보자기";
    //         }
    //     }

    //     else if($user === "2")
    //     {
    //         if($computer_rand === 0)
    //         {
    //             echo "------------(패)------------\n";
    //             echo "\n당신의 패는 보자기 상대의 패는 가위";
    //         }
    //         else if($computer_rand === 1)
    //         {
    //             echo "------------(승)------------\n";
    //             echo "\n당신의 패는 보자기 상대의 패는 주먹";
    //         }
    //         else if($computer_rand === 2)
    //         {
    //             echo "----------(무승부)----------\n";
    //             echo "\n당신의 패는 보자기 상대의 패는 보자기";
    //         }
    //     } 

    //     else if($user === "esc")
    //     {
    //         break;
    //     }

    //     else
    //     {
    //         echo $error;
    //     }
    // }

    // 필요 x
    // $user = trim(fgets(STDIN));
    // $computer_rand = array_rand($computer);
    // $computer_value = $computer[$computer_rand];
     // $result = "당신의 패는 {$user} 상대의 패는 {$computer_value}";


    // $computer = ["0", "1", "2"];
    // $error = "잘못된 입력입니다.";
    // $rule = "가위는 0, 주먹은 1, 보자기는 2";

    // while(1)
    // {
    // echo $rule, "\n";
    // echo "\n당신의 입력값은 ";
    // $user = trim(fgets(STDIN));
    // $computer_rand = array_rand($computer);
    // $computer_value = $computer[$computer_rand];
    // $result = "당신의 패는 {$user} 상대의 패는 {$computer_value}";

    //     if ($user === $computer_value)
    //     {
    //         echo $result, "\n";
    //         echo "결과는 : 무승부 \n";
    //     }
        
    //     else if ((($user === $computer[0]) && ($computer_value === $computer[2]))
    //     || (($user === $computer[1]) && ($computer_value === $computer[0]))
    //     || (($user === $computer[2]) && ($computer_value === $computer[1])))
    //     {
    //         echo $result, "\n";
    //         echo "결과는 : 승 \n";
    //     }

    //     else if ((($user === $computer[0]) && ($computer_value === $computer[1]))
    //     || (($user === $computer[1]) && ($computer_value === $computer[2]))
    //     || (($user === $computer[2]) && ($computer_value === $computer[0])))
    //     {
    //         echo $result, "\n";
    //         echo "결과는 : 패 \n";
    //     }

    //     else if($user === "esc")
    //     {
    //         break;
    //     }

    //     else
    //     {
    //         echo "잘못된 입력값입니다.";
    //     }
    // }


    $rand = rand(1, 100);
    $rand_num = $rand;
    // $user = (int)trim(fgets(STDIN));
    $count = 0;
    
    while(1)
    {
        
        echo "\n입력값 : ";
        $user = (int)trim(fgets(STDIN));
        $count++;
        $i = 5 - $count;

        if($user < 1 || $user > 100)
        {
            echo "잘못된 값을 입력하셨습니다.";
        }

        else if($user === $rand_num)
        {
            echo "정답\n";
            break;
        }

        else if($user >= $rand_num)
        {
            echo "더 작음\n남은 횟수는 : $i\n";
        }

        else if($user <= $rand_num)
        {
            echo "더 큼\n남은 횟수는 : $i\n";
        }

        if($count === 5)
        {
        echo "정답 : {$rand_num} \n 결과 : 실패";
        break;
        }
    }



?>