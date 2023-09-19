<?
	// PDO클래스를 이용해서 아래 쿼리를 실행해 주세요.
	// 1. 자신의 사원 정보를 employees 테이블에 등록해 주세요.
	// 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요.
	// 3. 자신의 정보를 출력해 주세요.
	// 4. 자신의 정보를 삭제해 주세요.
	// 5. PDO클래스 사용법 숙지

	require_once("./conn.php");
	db_destroy_home_conn($conn);
	my_db_home_conn($conn);

    
    // 1. titles 테이블에 데이터가 없는 사원을 검색
        $sql =
            " SELECT "
            ."       * "
            ." FROM "
            ."       employees AS emp "
            ." WHERE "
            ."       NOT EXISTS "
            ."           ( "
            ."           SELECT "
            ."               tit.emp_no "
            ."           FROM "
            ."               titles AS tit "
            ."           WHERE "
            ."               emp.emp_no = tit.emp_no "
            ."           ) "
        ;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute(); // 쿼리 실행
        $result = $stmt->fetchAll();
        print_r($result);
        // $conn = null;


    foreach ($result as $key => $val)
    {
        $sql = " INSERT INTO titles ( "
            ." emp_no "
            ." ,title "
            ." ,from_date "
            ." ,to_date "
            ." ) "
            ." VALUES ( "
            ." :emp_no "
            ." ,:title " 
            ." ,:from_date "
            ." ,:to_date "
            ." ) ";

        $arr_ps = [
			":emp_no" => $val["emp_no"]
			,":title" => "green"
			,":from_date" => 20230919
			,":to_date" => 99990101
		];
    }

    $stmt = $conn -> prepare($sql);
	$result = $stmt -> execute($arr_ps);
	$result = $stmt -> fetchAll(); 
	$conn -> commit();
	print_r($result);
			
?>