<?

	// 1. db_conn 이라는 함수를 만들어주세요
	// 		1-1. 기능 : db설정 및 pdo객체 생성

	require_once("./04_107_db_conn.php");
	db_destroy_learn_conn($db_conn);
	my_db_learn_conn($db_conn);

	// 2. 사원별 현재가 80,000이상인 사원을조회하기
	// $sql = " SELECT "
	// ."		salary "
	// ."		,emp_no "
	// ."		FROM "
	// ."		salaries "
	// ."		WHERE "
	// ."		to_date >= now() "
	// ."		and "
	// ."		salary >= :salary "
	// ;

	// $arr_ps = [
	// 	":salary" => 80000
	// ];

	// $stmt = $db_conn -> prepare($sql); 
	// $stmt -> execute($arr_ps);
	// $result = $stmt -> fetchAll(); 
	// print_r($result);
	
	// $db_conn = null;

	// 3. 조회한 데이터를 루프하면서 급여가 100,000이상이면 사원 번호 출력해주세요

	// $sql = " SELECT "
	// ."		salary "
	// ."		,emp_no "
	// ."		FROM "
	// ."		salaries "
	// ."		WHERE "
	// ."		to_date >= now() "
	// ."		and "
	// ."		salary >= :salary "
	// ;

	// $arr_ps = [
	// 	":salary" => 80000
	// ];

	// $stmt = $db_conn -> prepare($sql); 
	// $stmt -> execute($arr_ps);
	// $result = $stmt -> fetchAll(); 

	// $i = 0;

	// foreach($result as $key => $val)
	// {
	// 	if($val["salary"] >= 100000)
	// 	{
	// 		echo $val["emp_no"]. "\n";
	// 		$i++;
	// 	}
	// } 

	// echo $i;

	// $db_conn = null;



?>