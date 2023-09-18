<?

	require_once("./04_107_fnc_db_connect.php");

	db_destroy_conn($conn); // conn 값 초기화 및 파기

	my_db_conn($conn);

	$sql = 	" SELECT "
		." 		* "
		." FROM " 
		." 		employees " 
		." WHERE "
		." 		emp_no = :emp_no "
		;
	
	$arr_ps = [
		":emp_no" => 10004
	];

	$stmt = $conn -> prepare($sql);
	$stmt -> execute($arr_ps);
	$result = $stmt -> fetchAll();

	print_r($result);

	



?>