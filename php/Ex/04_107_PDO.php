<?
	// 현재 PHP에서 MySQL 데이터베이스에 연결하기 위해 사용할 수 있는 API는 다음과 같다.

	// 1. MySQL improved extension(MySQLi extension)
	// 2. PHP Data Objects(PDO)
	// 이 두 확장 라이브러리는 각각 장단점이 있으며, 사용 방법과 기능도 조금씩 다르다. 
	// 다만 두 가지 API는 각각 장단점을 가지지만, MySQL 환경에서 성능상의 큰 차이를 보이지는 않는다. 
	// 따라서 자신이 사용하기 편한 API를 선택하는 것이 좋다.

	$db_host 	= "localhost"; //host | 127.0.0.1 = localhost 
	$db_user 	= "root"; // user
	$db_pw 		= "php504"; // password
	$db_name 	= "employees"; // DB name
	$db_charset = "utf8mb4"; // charset
	$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

	// static을 사용 (::)
	$db_options = [
		// DB의 Prepared Statement 기능을 사용하도록 설정
		PDO::ATTR_EMULATE_PREPARES		=> false
		// PDO Exception을 Throws하도록 설정 | 에러가 났을 시 종료하지말고 에러에 대해 설명하게 하는 구문
		,PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION
		// 연상배열로 Fetch를 하도록 설정 | 텍스트 파일로 들어오는걸 연상배열로 만드는 구문
		,PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC
	];

	// PDO Class로 DB 연동
	$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

	// SQL 작성
	// 10004번 사원정보를 출력해주세요
	// 앞 뒤로 공백 넣어줘야함 | php에서 slq할 때 세미클론은 X | 보안성 때문
	// where 값은 유저가 보내는 값이기 때문에 매직넘버를 적으면 안됨 | 별칭으로 지칭 | db로 보내서 값 변경 | prepared statement
	// WHERE 값을 ?로 설정하거나 :로 새로운 이름으로 설정
	// $sql = 	" SELECT "
	// 		." 		* "
	// 		." FROM " 
	// 		." 		employees " 
	// 		." WHERE "
	// 		." 		emp_no = :emp_no "
	// 		;
	
	// // $sql의 emp_no가 10004번인 사용자를 부르기 위해
	// // prepared statement 세팅
	// $arr_ps = [
	// 	":emp_no" => 10004 
	// ];

	// // prepared statement 생성
	// // slq에 있는 emp_no가 없기 때문에 prepared statement을 생성해서 안에 넣어야하기 때문에
	// $stmt = $obj_conn -> prepare($sql); // = new PDOStatement();
	// $stmt -> execute($arr_ps); //쿼리 실행
	// $result = $stmt -> fetchAll(); // 쿼리 결과를 fetch | fetchAll(); 배열로 가져온다는 뜻
	// print_r($result);

	// 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리

	// $sql = 	" SELECT "
	// 		." 		sal.salary "
	// 		."		,sal.emp_no "
	// 		."		,emp.birth_date "
	// 		." FROM " 
	// 		." 		employees as emp "
	// 		." JOIN "
	// 		." 		salaries as sal "
	// 		." ON "  
	// 		."		emp.emp_no = sal.emp_no "
	// 		." WHERE "
	// 		." 		sal.to_date >= now() "
	// 		." AND "
	// 		."		(sal.emp_no = :emp_no1 "
	// 		." OR "
	// 		."		sal.emp_no = :emp_no2) "
	// 		;

		// $sql = 	" SELECT "
		// 	." 		sal.salary "
		// 	."		,sal.emp_no "
		// 	."		,emp.birth_date "
		// 	." FROM " 
		// 	." 		employees as emp "
		// 	." JOIN "
		// 	." 		salaries as sal "
		// 	." ON "  
		// 	."		emp.emp_no = sal.emp_no "
		// 	." WHERE "
		// 	." 		sal.to_date >= now() "
		// 	." AND ("
		// 	."		sal.emp_no = :emp_no1
		// 			OR	sal.emp_no = :emp_no2 "
		// 	." ) ";

	// $sql = 	" SELECT "
	// 		." 		sal.salary "
	// 		."		,sal.emp_no "
	// 		."		,emp.birth_date "
	// 		." FROM " 
	// 		." 		employees emp "
	// 		." JOIN "
	// 		." 		salaries sal "
	// 		." ON "  
	// 		."		emp.emp_no = sal.emp_no "
	// 		." WHERE "
	// 		." 		sal.to_date >= now() "
	// 		." AND "
	// 		."		sal.emp_no "
	// 		." IN "
	// 		." 		(:emp_no1, :emp_no2) "
	// 		;


	// $arr_ps = [
	// 	":emp_no1" => 10001
	// 	,":emp_no2" => 10002
	// ];

	// $stmt = $obj_conn -> prepare($sql); 
	// $stmt -> execute($arr_ps);
	// $result = $stmt -> fetchAll(); 
	// print_r($result);

	// insert
	// 부서번호가 "d010', 부서명이 'php504'

	// $sql = 
	// " INSERT INTO departments ( "
	// ."		dept_no " 
	// ."		,dept_name "
	// ." 		) "
	// ." VALUES ( "
	// ."			:dept_no "
	// ."			,:dept_name "
	// ." 		) ";

	// $arr_ps = [
	// 	":dept_no" => "d010"
	// 	,":dept_name" => "php504"
	// ];

	// $stmt = $obj_conn -> prepare($sql);
	// $result = $stmt -> execute($arr_ps); // insert update delete에는 넣어줘서 bool 값을 봐야함 
	// $obj_conn -> commit(); // 커밋

	// var_dump($result);


	// FLUSH PRIVILEGES; | php에서 INSERT INTO 구문을 실행 후 해당 | FLUSH PRIVILEGES; 구문을 DB에서 실행해줘야 DB에 들어감

	// $sql = " DELETE FROM departments "
	// ." WHERE " 
	// ." dept_no = :dept_no ";

	// $arr_ps = [
	// 	":dept_no" => "d010"
	// ];

	// $stmt = $obj_conn -> prepare($sql);
	// $result = $stmt -> execute($arr_ps); // insert update delete에는 넣어줘서 bool 값을 봐야함 
	// $res_cnt = $stmt ->rowCount();
	// $obj_conn -> commit(); // 커밋

	// var_dump($res_cnt);

	// if($res_cnt >= 2)
	// {
	// 	$obj_conn -> rollBack();
	// 	echo "rollback";
	// }
	// else
	// {
	// 	$obj_conn -> commit();
	// 	echo "commit";
	// }

	// var_dump($result);

	// rollback
	// if ( !$result )
	// {
	// 	$obj_conn -> rollBack(); //롤백
	// }
	// else
	// {
	// $obj_conn -> commit(); //커밋
	// }

	$obj_conn = null; // 파기

?>