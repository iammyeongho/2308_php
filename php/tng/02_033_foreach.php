<?
    // ID만 출력해 주세요.
    $arr = [
        [
            "id" => "meerket1"
            ,"pw" => "php504"
        ]
        ,[
            "id" => "meerket2"
            ,"pw" => "php504"
        ]
        ,[
            "id" => "meerket3"
            ,"pw" => "php504"
        ]
    ];

    echo "ID list \n";
    foreach($arr as $val)
    {
        echo $val["id"],"\n";
    }



?>