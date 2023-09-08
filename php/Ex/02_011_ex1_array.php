<?
    // 인덱스 배열

    // 멀티 타입 배열 : 인덱스에 자동으로 0 1 2 순으로 키 값 지정
    // $arr = array(0, "a", 2);
    // $arr2 = [0, "a", 2];
    // $arr3 = ["배열", $arr[1], $arr2[1]];

    // var_dump($arr);
    // var_dump($arr[1]);
    // var_dump ($arr3);

    // 연상 배열 : 인덱스에 키 값을 지정
    // $arr4 = [
    //     "name" => "홍길동" 
    //     ,"age" => 2004
    //     ,"gender" => "남자"
    // ];

    // var_dump($arr4["name"]);

    // 다차원 배열
    // 2차원 배열
    // $arr5 = [
    //     [11, 12, 13]
    //     ,[21, 22, 23]
    //     ,[31, 32, 33]
    // ];

    // var_dump($arr5[2][1]);

    // // 3차원 배열
    // $arr6 = [
    //     [11, 12, 13]
    //     ,[
    //         [211, 212, 215]
    //         ,[221, 222, 223]
    //     ]
    //     ,[31, 32, 33]
    // ];

    // var_dump($arr6[1][0][2]);

    // // 3차원 연상 배열
    // $arr7 = [
    //     "msg" => "ok"
    //     ,"info" => [
    //         "name" => "홍길동"
    //         ,"age" => 20
    //     ]
    // ];

    // var_dump($arr7["info"]["age"]);

    // unset() : 배열의 원소 삭제
    // $arr_week = [
    //     "Sun"
    //     ,"Mon"
    //     ,"Delete"
    //     ,"Tue"
    //     ,"Wed"
    // ];

    // unset($arr_week[2]);

    // print_r($arr_week);

    // 배열의 정렬 : asort(), arsort(), ksort(), krsort()
    // asort() : 배열의 값을 오름차순 정렬

    $arr_asort = ["b", "a", "d", "c"];

    asort( $arr_asort );
    print_r( $arr_asort );

    // arsort() : 배열의 값을 내림차순 정렬

    $arr_arsort = ["b", "a", "d", "c"];

    arsort( $arr_asort );
    print_r( $arr_asort );

    // ksort() : 배열의 키를 기준으로 오름차순 정렬

    $arr_ksort = [
        "b" => "1"
        ,"a" => "2"
        ,"d" => "3"
        ,"c" => "4"
    ];

    ksort( $arr_ksort );
    print_r( $arr_ksort );

    // krsort() : 배열의 키를 기준으로 내림차순 정렬

    $arr_krsort = [
        "b" => "1"
        ,"a" => "2"
        ,"d" => "3"
        ,"c" => "4"
    ];

    krsort( $arr_krsort );
    print_r( $arr_krsort );

    // count() : 배열 혹은 그 외 것들의 사이즈를 반환하는 함수
    echo count($arr_ksort);

    // array_diff() : A배열과 B배열을 비교해서 중복되지 않는 A배열의 원소를 반환
    $arr_diff1 = [ 1, 2, 3 ];
    $arr_diff2 = [ 1, 4, 5 ];
    $arr_diff = array_diff( $arr_diff1, $arr_diff2 );
    print_r( $arr_diff );

    // array_push() : 기존 배열에 값을 추가 하는 함수
    $arr_push = [ 1, 2, 3 ];
    array_push( $arr_push, 4, 5);

    print_r( $arr_push );

?>