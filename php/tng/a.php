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
	// ."			:emp_no "
	// ."			,:birth_date "
	// ."			,:first_name "
	// ."			,:last_name "
	// ."			,:gender "
	// ."			,:hire_date "
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

	// $sql =
	// " UPDATE employees "
	// ." SET first_name = :first_name "
	// ." ,last_name = :last_name "
	// ." WHERE " 
	// ." emp_no = 500003 ";

	// $arr_ps = [
	// 	":first_name" => "Dooly"
	// 	,":last_name" => "Hoi"
	// ];

	// $stmt = $conn -> prepare($sql);
	// $result = $stmt -> execute($arr_ps); // insert update delete에는 넣어줘서 bool 값을 봐야함 
	// $conn -> commit(); // 커밋

	// db_destroy_conn($conn);

	// var_dump($result);

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

	
	$sql = " DELETE FROM employees "
	." WHERE " 
	." emp_no = :emp_no ";

	$arr_ps = [
		":emp_no" => 500003
	];

	$stmt = $conn -> prepare($sql); 	
	$result = $stmt -> execute($arr_ps);
	$res_cnt = $stmt -> rowCount();
	$conn -> commit();

	var_dump($res_cnt);


?>