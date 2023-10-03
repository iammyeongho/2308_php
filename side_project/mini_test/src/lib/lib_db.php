<?php
	// ----------------------------
	// 함수명 	: my_db_conn
	// 기능 	: DB Connecy
	// 파라미터 : PDO &$conn
	// 리턴 	: 없음
	// ----------------------------

	

	function db_conn( &$conn )
	{
		$db_host 	= "localhost"; //host | 127.0.0.1 = localhost 
		$db_user 	= "root"; // user
		$db_pw 		= "php504"; // password
		$db_name 	= "newjeans"; // DB name
		$db_charset = "utf8mb4"; // charset
		$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
	
		try
		{
			$db_options = [
			PDO::ATTR_EMULATE_PREPARES		=> false
			,PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION
			,PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC
			];
		
			$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
			return true;
		}
		catch (Exception $e)
		{
			$conn = null;
			return false;
		}
	}

	// ----------------------------
	// 함수명 	: db_destroy_conn
	// 기능 	: DB Destoroy
	// 파라미터 : PDO &$conn
	// 리턴 	: 없음
	// ----------------------------

	function db_destroy_conn(&$conn)
	{
		$conn = null;
	}

		
	// ----------------------------
	// 함수명 	: db_select_boards_paging
	// 기능 	: boards paging 조회
	// 파라미터 : PDO 		&$conn
	// 			: Array 	&$arr_param | 쿼리 작성용 배열
	// 리턴 	: Array / false
	// ----------------------------

	function db_select_boards_paging(&$conn, &$arr_param) {
		try {
			$sql = 
				" SELECT "
				."		id "
				."		,title "
				."		,writet "
				."		,date_format(created_date, '%Y-%m-%d') date "
				." FROM "
				."		boards "
				." ORDER BY "
				." 		id DESC "
				." LIMIT :list_cnt OFFSET :offset "
				;
				
			$arr_ps = 
			[
				":list_cnt" => $arr_param["list_cnt"]
				,":offset" => $arr_param["offset"]
			];

			$stmt = $conn->prepare($sql);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll();
			return $result; // 정상 : 쿼리 결과 리턴
		}
		catch(Exception $e) {
			return false; // 예외 발생 : flase 리턴
		}
	}

		// ----------------------------
	// 함수명 	: db_select_boards_paging
	// 기능 	: boards count 조회
	// 파라미터 : PDO 		&$conn
	// 리턴 	: int / false
	// ----------------------------

	function db_select_boards_cnt(&$conn) {
		$sql =
			" SELECT "
			." 		count(id) as cnt "
			." FROM "
			." 		boards "
			// ." WHERE "
			// ."		delete_flg = '0' "
			;
			
		try {
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll();
			
			return (int)$result[0]["cnt"];
		}
		catch(Exception $e) {
			return false; // 예외 발생 : flase 리턴
		}
	}

	// ----------------------------
	// 함수명 	: db_select_search
	// 기능 	: boards search
	// 파라미터 : PDO 		&$conn
	// 리턴 	: int / false
	// ----------------------------

	function db_select_search(&$conn, &$arr_param) {
		$sql =
			" SELECT "
			." 		* "
			." 		,date_format(created_date, '%Y-%m-%d') date "
			." FROM "
			." 		boards "
			." WHERE "
			."		title "
			." LIKE "
			." 		:search " // 서치 변수가 포함된 단어 조건
			// ." OR "
			// ."		writet = '%search%' "
			." ORDER BY "
			." 		id desc "
			." LIMIT :list_cnt OFFSET :offset "
			;
			
			// 검색 결과도 출력값 개수에 제한을 줘야하기 때문에
			$arr_ps = 
			[
				":search" => $arr_param["search"]
				,":list_cnt" => $arr_param["list_cnt"]
				,":offset" => $arr_param["offset"]
			];

			
		try {
			// $result = $conn->query($sql);
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':search', $search_term, PDO::PARAM_STR);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll();
			return $result;
		}
		catch(Exception $e) {
			return false; // 예외 발생 : flase 리턴
		}
	}

	// ----------------------------
	// 함수명 	: db_select_search
	// 기능 	: boards search
	// 파라미터 : PDO 		&$conn
	// 리턴 	: int / false
	// ----------------------------

	function db_search_boards_cnt(&$conn, &$arr_param) {
		$sql =
			" SELECT "
			." 		count(id) as cnt "
			." FROM "
			." 		boards "
			." WHERE "
			."		title "
			." LIKE "
			." 		:search " // 서치 변수가 포함된 단어 조건
			;

			$arr_ps = 
			[
				":search" => $arr_param["search"]
			];

		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll();
			return (int)$result[0]["cnt"];
		}
		catch(Exception $e) {
			return false; // 예외 발생 : flase 리턴
		}
	}

	
		// ----------------------------
	// 함수명 	: db_select_created_date
	// 기능 	: boards created_date
	// 파라미터 : PDO 		&$conn
	// 리턴 	: int / false
	// ----------------------------

	// function db_search_created_date(&$conn, &$arr_param) {
	// 	$sql =
	// 		" SELECT "
	// 		." 		* "
	// 		." 		,date_format(created_date, '%Y-%m-%d') AS created_date "
	// 		." FROM "
	// 		." 		boards "
	// 		." WHERE "
	// 		." 		date_format(created_date, '%Y-%m-%d') "
	// 		." BETWEEN "
	// 		."		:first_date "
	// 		." AND "
	// 		." 		:last_date " // 서치 변수가 포함된 단어 조건
	// 		;

	// 		$arr_ps = 
	// 		[
	// 			":first_date" => $arr_param["first_date"]
	// 			,":last_date" => $arr_param["last_date"]
	// 		];

	// 	try {
	// 		$stmt = $conn->prepare($sql);
	// 		$stmt->execute($arr_ps);
	// 		$result = $stmt->fetchAll();
	// 		return $result;
	// 	}
	// 	catch(Exception $e) {
	// 		die("DB Error: " . $e->getMessage());
	// 		return false; // 예외 발생 : flase 리턴
	// 	}
	// }
?>