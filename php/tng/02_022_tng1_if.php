<?
    //성적

    $i = 99;
    $l = 0;

    // if( $i === 100)
    // {
    //     echo "당신의 점수는 {$i}점 입니다. <A+>";
    // }
    // else if( $i < 100 && $i >= 90 )
    // {
    //     echo "당신의 점수는 {$i}점 입니다. <A>";
    // }
    // else if( $i < 90 && $i >= 80 )
    // {
    //     echo "당신의 점수는 {$i}점 입니다. <B>";
    // }
    // else if( $i < 80 && $i >= 70 )
    // {
    //     echo "당신의 점수는 {$i}점 입니다. <C>";
    // }
    // else if( $i < 70 && $i >= 60 )
    // {
    //     echo "당신의 점수는 {$i}점 입니다. <D>";
    // } 
    // else
    // {
    //     echo "당신의 점수는 {$i}점 입니다. <F>";
    // }

    $i = 1000;
    $l = 0;
    $answer = "당신의 점수는 %u점 입니다. %s" ;// %u int  |  &s stirng
    $error = "잘못된 값을 입력 하셨습니다.";
    
    // if( $i > 100 || $i < 0)
    // {
    //     echo $error;
    // }
    // else 
    // {
    //     if( $i === 100)
    //     {
    //         $l = "<A+>";
    //     }
    //     else if( $i < 100 && $i >= 90 )
    //     {
    //         $l = "<A>";
    //     }
    //     else if( $i < 90 && $i >= 80 )
    //     {
    //         $l = "<B>";
    //     }
    //     else if( $i < 80 && $i >= 70 )
    //     {
    //         $l = "<C>";
    //     }
    //     else if( $i < 70 && $i >= 60 )
    //     {
    //         $l = "<D>";
    //     } 
    //     else if( $i < 60 && $i >= 0 )
    //     {
    //         $l = "<F>";
    //     }
    //     $str = sprintf($answer, $i, $l);
    //         echo $str;
    // }

    if( $i >= 0 && $i <= 100)
    {
        if( $i === 100)
        {
            $l = "<A+>";
        }
        else if( $i < 100 && $i >= 90 )
        {
            $l = "<A>";
        }
        else if( $i < 90 && $i >= 80 )
        {
            $l = "<B>";
        }
        else if( $i < 80 && $i >= 70 )
        {
            $l = "<C>";
        }
        else if( $i < 70 && $i >= 60 )
        {
            $l = "<D>";
        } 
        else if( $i < 60 && $i >= 0 )
        {
            $l = "<F>";
        }
        else
        {
            $str = sprintf($answer, $i, $l);
            echo $str;
        }
    }
    else 
    {
        echo $error;
    }

    // echo "당신의 점수는 {$i}점 입니다. $l";

    // echo "\n";

    // $str = sprintf($answer, $i, $l);
    // echo $str;
    

?>

