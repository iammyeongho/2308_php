<?
	// PDO클래스를 이용해서 아래 쿼리를 실행해 주세요.
	// 1. 자신의 사원 정보를 employees 테이블에 등록해 주세요.
	// 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요.
	// 3. 자신의 정보를 출력해 주세요.
	// 4. 자신의 정보를 삭제해 주세요.
	// 5. PDO클래스 사용법 숙지

	require_once("../Ex/04_107_fnc_db_connect.php");
	db_destroy_conn($conn);
	my_db_conn($conn);

	// 1. 자신의 사원 정보를 employees 테이블에 등록해 주세요.
	// $sql = 
	// " INSERT INTO employees ( "
	// ."		emp_no " 
	// ."		,birth_date "
	// ."		,first_name "
	// ."		,last_name "
	// ."		,gender "
	// ."		,hire_date "
	// ." 		) "
	// ." VALUES ( "
	// ."		:emp_no "
	// ."		,:birth_date "
	// ."		,:first_name "
	// ."		,:last_name "
	// ."		,:gender "
	// ."		,:hire_date "
	// ." 		) ";

	// $arr_ps = [
	// 	":emp_no" => 500003
	// 	,":birth_date" => 19960106
	// 	,":first_name" => "myeongho"
	// 	,":last_name" => "jung"
	// 	,":gender" => "M"
	// 	,":hire_date" => 20230918
	// ];

	// $stmt = $conn -> prepare($sql);
	// $result = $stmt -> execute($arr_ps); // insert update delete에는 넣어줘서 bool 값을 봐야함 
	// $conn -> commit(); // 커밋

	// db_destroy_conn($conn);

	// var_dump($result);

	// 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요.
	// $sql =
	// " UPDATE employees "
	// ." SET "
	// ." first_name = :first_name "
	// ." ,last_name = :last_name "
	// ." WHERE " 
	// ." emp_no = :emp_no ";

	// $arr_ps = [
	// 	":first_name" => "Dooly"
	// 	,":last_name" => "Hoi"
	// 	,":emp_no" => 500003
	// ];

	// $stmt = $conn -> prepare($sql);
	// $result = $stmt -> execute($arr_ps); // insert update delete에는 넣어줘서 bool 값을 봐야함 
	// $conn -> commit(); // 커밋

	// db_destroy_conn($conn);

	// var_dump($result);

	// 3. 자신의 정보를 출력해 주세요.
	// $sql = 	" SELECT "
	// 	." 		* "
	// 	." FROM " 
	// 	." 		employees "
	// 	." WHERE "
	// 	." 		emp_no = :emp_no "
	// 	;

	// $arr_ps = [
	// 	":emp_no" => 500003
	// ];

	// $stmt = $conn -> prepare($sql); 
	// $stmt -> execute($arr_ps);
	// $result = $stmt -> fetchAll(); 
	// print_r($result);

	// 4. 자신의 정보를 삭제해 주세요.	
	// $sql = " DELETE FROM employees "
	// ." WHERE " 
	// ." emp_no = :emp_no ";

	// $arr_ps = [
	// 	":emp_no" => 500003
	// ];

	// $stmt = $conn -> prepare($sql); 	
	// $result = $stmt -> execute($arr_ps);
	// $res_cnt = $stmt -> rowCount();
	// $conn -> commit();

	// var_dump($res_cnt);


	// ---------------------------------------------------------------------------------

	// 1.titles 테이블에 데이터가 없는 사원을 검색
	// 2.[1]번에 해당하는 사원의 직책 정보를 INSERT
	// 	2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
	// 3.DB에 저장될 것


	// ---------------LEFT OUTER JOIN 방법-----------------------
	// $sql = 	" SELECT "
	// 	."		emp.emp_no "
	// 	." 		,tit.title "
	// 	." 		,tit.from_date "
	// 	." 		,tit.to_date "
	// 	." FROM " 
	// 	." 		employees emp "
	// 	." LEFT OUTER JOIN "
	// 	." 		titles tit "
	// 	." ON "
	// 	." 		emp.emp_no = tit.emp_no "
	// 	." WHERE "
	// 	." tit.emp_no IS NULL "
	// 	;

	// ------$stmt -> execute($arr_ps); 사용------
	// $arr_ps = [
		
	// ];

	// $stmt = $conn -> prepare($sql); 
	// $stmt -> execute($arr_ps);
	// $result = $stmt -> fetchAll(); 
	// print_r($result);
	// --------------------------------------

	// -----$stmt -> execute(); 사용------
	// $stmt = $conn -> prepare($sql); 
	// $stmt -> execute();
	// $result = $stmt -> fetchAll(); 
	// print_r($result);
	// $conn -> commit();
	// --------------------------------------

	// ------$stmt = $conn -> query($sql); 사용------
	// $stmt = $conn -> query($sql); 
	// $result = $stmt -> fetchAll(); 
	// print_r($result);
	// $conn -> commit();
	// --------------------------------------

	// ---------------NOT EXISTS 방법-----------------------
	// $sql = 	" SELECT "
	// ." 		* "
	// ." FROM " 
	// ." 		employees emp "
	// ." WHERE "
	// ." NOT EXISTS ( "
	// ." SELECT "
	// ." 		* "
	// ." FROM " 
	// ." 		titles tit "
	// ." WHERE " 
	// ." 		emp_no "
	// ." AND " 
	// ." 		emp.emp_no = tit.emp_no "
	// ." ) "
	// ;
	
	// $arr_ps = [
	// ];

	// $stmt = $conn -> prepare($sql); 
	// $stmt -> execute($arr_ps);
	// $result = $stmt -> fetchAll(); 
	// print_r($result);
	// $conn -> commit();
	// --------------------------------------


	// ---------------1번째 방법-----------------------
	// foreach($result as $key => $val)
	// {
	// 	$sql = " INSERT INTO titles ( "
	// 	."		emp_no " 
	// 	."		,title "
	// 	."		,from_date "
	// 	."		,to_date "
	// 	." 		) "
	// 	." VALUES ( "
	// 	."		:emp_no "
	// 	."		,:title "
	// 	."		,NOW()"
	// 	."		,99990101 "
	// 	." 		) ";

	// 	$arr_ps = [
	// 		":emp_no" => $val["emp_no"]
	// 		,":title" => "green"
	// 	];
		
	// }
	

	// $stmt = $conn -> prepare($sql);
	// $result = $stmt -> execute($arr_ps);
	// $result = $stmt -> fetchAll(); 
	// $conn -> commit();
	// print_r($result);
	// --------------------------------------

	// ---------------2번째 방법-----------------------
	// $sql = " INSERT INTO titles ( "
	// ."		emp_no " 
	// ."		,title "
	// ."		,from_date "
	// ."		,to_date "
	// ." 		) "
	// ." VALUES ( "
	// ."		:emp_no "
	// ."		,:title "
	// ."		,:from_date "
	// ."		,:to_date "
	// ." 		) ";

	// foreach($result as $key => $val)
	// {
	// 	$arr_ps = [
	// 		":emp_no" => $val["emp_no"]
	// 		,":title" => "green"
	// 		,":from_date" => 20230919
	// 		,":to_date" => 99990101
	// 	];
	// $stmt = $conn -> prepare($sql);
	// $result = $stmt -> execute($arr_ps);
	// if(!$result)
	// {
	// 	throw new Exception("Insert Error")
	// }

	// }
	// $conn -> commit();
	// --------------------------------------

	try
	{
		if( !my_db_conn($conn))
		{
			echo "DB Connect Error";
			exit;
		}
		$sql = 	" SELECT "
		."		emp.emp_no "
		." 		,tit.title "
		." 		,tit.from_date "
		." 		,tit.to_date "
		." FROM " 
		." 		employees emp "
		." LEFT OUTER JOIN "
		." 		titles tit "
		." ON "
		." 		emp.emp_no = tit.emp_no "
		." WHERE "
		." tit.emp_no IS NULL "
		;

		$stmt = $conn -> query($sql); 
		$result = $stmt -> fetchAll(); 

		$sql = " INSERT INTO titles ( "
		."		emp_no " 
		."		,title "
		."		,from_date "
		."		,to_date "
		." 		) "
		." VALUES ( "
		."		:emp_no "
		."		,:title "
		."		,NOW() "
		."		,99990101 "
		." 		) ";

		foreach($result as $key => $val)
		{
			$arr_ps = [
				":emp_no" => $val["emp_no"]
				,":title" => "green"
			];
		$stmt = $conn -> prepare($sql);
		$result = $stmt -> execute($arr_ps);
		if(!$result)
		{
			throw new Exception("Insert Error")
		}

		}
		$conn -> commit();
	}

	catch (Exception $e)
	{
		$conn->rollback();
		echo "ERROR : {$e->getMessage()}";
	}

	finally
	{
		$conn = null; 
	}

			
?>