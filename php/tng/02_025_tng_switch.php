<?

    $i = "1등";
    $l = "";

    switch ( $i )
    {   
        case "1등":
            $l = "금상";
            break;

        case "2등":
            $l = "은상";
            break;

        case "3등":
            $l = "동상";
            break;
        
        case "4등":
            $l = "장려상";
            break;

        default:
        $l = "노력상";
            break;
    }
    echo $l;

    echo "\n";
    
    $a = 6;
    $b = ["금상", "은상", "동상", "장려상", "노력상", "오류"];

    switch ( $a )
    {   
        case "1":
            echo $b[0];
            break;

        case "2":
            echo $b[1];
            break;

        case "3":
            echo $b[2];
            break;

        case "4":
            echo $b[3];
            break;

        case $a >= 5:
            echo $b[4];
            break;
    
        default:
            echo $b[5];
            break;
    }
// 위 처럼 하면 안됨 | switch는 참 거짓으로 인식하기 때문


    echo "\n";

    $x = 3;
    $y = "";
    
    if( $x === 1 )
    {
        $y = "금상";
    }
    else if ( $x === 2)
    {
        $y = "은상";
    }
    else if ( $x === 3)
    {
        $y = "동상";
    }
    else if ( $x === 4)
    {
        $y = "장려상";
    }
    else
    {
        $y = "노력싱";
    }
    
    echo $y;




?>