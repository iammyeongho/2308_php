<?
	// ----------------------------
	// 함수명 	: my_db_conn
	// 기능 	: DB Connecy
	// 파라미터 : PDO &$conn
	// 리턴 	: 없음
	// ----------------------------

	function my_db_conn( &$conn )
	{
		$db_host 	= "localhost"; //host | 127.0.0.1 = localhost 
		$db_user 	= "root"; // user
		$db_pw 		= "php504"; // password
		$db_name 	= "mini_board"; // DB name
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

	function my_db_destroy_conn(&$conn)
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

	function my_db_select_boards_paging(&$conn, &$arr_param) {
		try {
			$sql = 
				" SELECT "
				."		id "
				."		,title "
				."		,creat_at "
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

	function my_db_select_boards_cnt(&$conn) {
		$sql =
			" SELECT "
			." 		count(id) as cnt "
			." FROM "
			." 		boards "
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
	// 함수명 	: my_db_insert_boards
	// 기능 	: boards 레코드 작성
	// 파라미터 : PDO 		&$conn
	// 			: Array 	&$arr_param | 쿼리 작성용 배열
	// 리턴 	: Boolean
	// ----------------------------

	function my_db_insert_boards(&$conn, &$arr_param) {
		$sql = 
			" INSERT INTO boards ( "
			."		title "
			."		,content "
			." ) "
			." VALUES ( "
			."		:title "
			."		,:content "
			." ) "
			;

		$arr_ps = [
			":title" => $arr_param["title"]
			,":content" => $arr_param["content"]
		];

		try {
			$stmt = $conn->prepare($sql);
			$result = $stmt->execute($arr_ps);
			return $result; // 결과 리턴
		}
		catch(Exception $e) {
			return false; // 예외 발생 : flase 리턴
		}
	}

	
	// ----------------------------
	// 함수명 	: my_db_select_boards_id
	// 기능 	: boards id 조회
	// 파라미터 : PDO 		&$conn
	// 리턴 	: Array / false
	// ----------------------------

	// function my_db_select_boards_id(&$conn, $id) {
	// 	$sql =
	// 		" SELECT "
	// 		." 		title "
	// 		." 		,content "
	// 		." FROM "
	// 		." 		boards "
	// 		." WHERE "
	// 		." 		id = :id "
	// 		;

	// 		$arr_ps = [
	// 			":id" => $id
	// 		];
			
	// 	try {
	// 		$stmt = $conn->prepare($sql);
	// 		$stmt->execute($arr_ps);
	// 		$result = $stmt->fetchAll();
	// 		return $result;
	// 	}
	// 	catch(Exception $e) {
	// 		return false; // 예외 발생 : flase 리턴
	// 	} 
	// }

	function my_db_select_boards_id(&$conn, &$arr_param) {
		$sql =
			" SELECT "
			." 		id "
			." 		,title "
			." 		,content "
			." 		,creat_at "
			." FROM "
			." 		boards "
			." WHERE "
			." 		id = :id "
			;

			$arr_ps = [
				":id" => $arr_param["id"]
			];
			
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll();
			return $result;
		}
		catch(Exception $e) {
			return false; // 예외 발생 : flase 리턴
		} 
	}

	// ----------------------------
	// 함수명 	: my_db_update_boards_id
	// 기능 	: boards 레코드 업데이트
	// 파라미터 : PDO 		&$conn
	// 리턴 	: boolean
	// ----------------------------
	
	function my_db_update_boards_id(&$conn, &$arr_param) {
		$sql = 
			" UPDATE boards "
			" SET "
			." title = :title "
			" ,content = :content "
			" WHERE id = :id "
			;
	}


	// $conn = null;
	// my_db_conn($conn);
	// echo my_db_select_boards_cnt($conn);
	// $conn = null;

?> 