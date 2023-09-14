<?

    // $in_str = fgets(STDIN);

    // echo "입력값 : {$in_str}";

    // 가위 : scissors
    // 바위 : rock
    // 보 : paper

    

    // $scissors = "Scissors";
    // $rock = "Rock";
    // $paper = "Paper";

    $user = trim(fgets(STDIN));
    $computer = ["scissors", "rock", "paper"];
    $computer_rand = array_rand($computer);
    $computer_value = $computer[$computer_rand];
    $error = "잘못된 입력입니다.";

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
    
    
    if($user === "scissors")
    {
        if("$computer_value" === "seissors")
        {
            echo "(무승부)\n당신의 패는 {$user} 상대의 패는 {$computer_value} ";
        }
        else if($computer_value === "rock")
        {
            echo "(패)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
        }
        else if($computer_value === "paper")
        {
            echo "(승)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
        }
    }
    
    else if($user === "rock")
    {
        if($computer_value === "seissors")
        {
            echo "(승)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
        }
        else if($computer_value === "rock")
        {
            echo "(무승부)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
        }
        else if($computer_value === "paper")
        {
            echo "(패)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
        }
    }

    else if($user === "paper")
    {
        if($computer_value === "seissors")
        {
            echo "(패)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
        }
        else if($computer_value === "rock")
        {
            echo "(승)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
        }
        else if($computer_value === "paper")
        {
            echo "(무승부)\n당신의 패는 {$user} 상대의 패는 {$computer_value}";
        }
    } 

    else
    {
        echo $error;
    }

exit;

?>