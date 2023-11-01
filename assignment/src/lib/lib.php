<?php
	// ----------------------------
	// 함수명 	: db_conn
	// 기능 	: DB Connecy
	// 파라미터 : PDO &$conn
	// 리턴 	: 없음
	// ----------------------------

	

	function db_conn( &$conn )
	{
		$db_host 	= "localhost"; //host | 127.0.0.1 = localhost 
		$db_user 	= "root"; // user
		$db_pw 		= "php504"; // password
		$db_name 	= "assignment"; // DB name
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
	// 함수명 	: select_boards_paging
	// 기능 	: boards paging 조회
	// 파라미터 : PDO 		&$conn
	// 			: Array 	&$arr_param | 쿼리 작성용 배열
	// 리턴 	: Array / false
	// ----------------------------

	function select_boards_paging(&$conn, &$arr_param) {
		$sql = 
			" SELECT "
			."		list_t.list_id "
			."		,list_t.title "
			."		,list_t.content "
			."		,list_t.views "
			."		,date_format(list_t.create_date, '%Y-%m-%d') date_val "
			."		,list_t.delete_date "
			."		,user_t.user_name "
			." FROM "
			."		list_table list_t "
			." JOIN "
			." 		user_table user_t "
			." ON "
			." 		list_t.user_id = user_t.user_id "
			." WHERE "
			." 		list_t.delete_date "
			." IS "
			."		NULL "
			." ORDER BY "
			." 		list_t.list_id DESC "
			." LIMIT :list_cnt OFFSET :offset "
			;
				
		$arr_ps = 
		[
			":list_cnt" => $arr_param["list_cnt"]
			,":offset" => $arr_param["offset"]
		];

		try {
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
	// 함수명 	: select_boards_cnt
	// 기능 	: boards count 조회
	// 파라미터 : PDO 		&$conn
	// 리턴 	: int / false
	// ----------------------------

	function select_boards_cnt(&$conn) {
		$sql =
			" SELECT "
			." 		count(list_id) as cnt "
			." FROM "
			." 		list_table "
			." WHERE "
			."		delete_date "
			." IS "
			."		NULL "
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
	// 함수명 	: select_boards_id
	// 기능 	: boards id 조회
	// 파라미터 : PDO 		&$conn
	// 리턴 	: Array / false
	// ----------------------------

	function select_boards_id(&$conn, &$arr_param) {
		$sql = 
			" SELECT "
			."		user_t.user_name "
			."		,date_format(list_t.create_date, '%Y-%m-%d') date_val "
			."		,list_t.title "
			."		,list_t.content "
			."		,list_t.views "
			."		,list_t.delete_date "
			." FROM "
			."		list_table list_t "
			." JOIN "
			." 		user_table user_t "
			." ON "
			." 		list_t.user_id = user_t.user_id "
			." WHERE "
			." 		list_t.list_id = :id "
			." AND "
			." 		list_t.delete_date "
			." IS "
			."		NULL "
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
	// 함수명 	: update_views_id
	// 기능 	: 조회수 증가
	// 파라미터 : PDO 		&$conn
	// 리턴 	: Array / false
	// ----------------------------

	function update_views_id(&$conn, &$arr_param) {
		$sql =
			" UPDATE "
			." 		list_table "
			." SET "
			." 		views = views + 1 "
			." WHERE "
			." 		list_id = :id "
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
	// 함수명 	: select_user_name
	// 기능 	: 유저 네임 조회
	// 파라미터 : PDO 		&$conn
	// 리턴 	: Array / false
	// ----------------------------

	function select_user_name(&$conn) {
		$sql =
			" SELECT "
			." 		user_id "
			." 		,user_name "
			." FROM "
			." 		user_table "
			;

		try {
			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll();
			return $result;
		}
		catch(Exception $e) {
			return false; // 예외 발생 : flase 리턴
		} 
	}

	// ----------------------------
	// 함수명 	: insert_boards
	// 기능 	: boards 레코드 작성
	// 파라미터 : PDO 		&$conn
	// 			: Array 	&$arr_param | 쿼리 작성용 배열
	// 리턴 	: Boolean
	// ----------------------------

	function insert_boards(&$conn, &$arr_param) {
		$sql = 
			" INSERT INTO list_table ( "
			." 		user_id "
			."		,title "
			."		,content "
			." ) "
			." VALUES ( "
			." 		:user "
			."		,:title "
			."		,:content "
			." ) "
			;

		$arr_ps = [
			":user" => $arr_param["user"]
			,":title" => $arr_param["title"]
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
	// 함수명 	: delete_id
	// 기능 	: 게시물 삭제
	// 파라미터 : PDO 		&$conn
	// 			: Array 	&$arr_param | 쿼리 작성용 배열
	// 리턴 	: Boolean
	// ----------------------------

	function delete_id(&$conn, &$arr_param) {
		$sql =
			" UPDATE "

		$arr_ps = [

		]
		try {
			
		} catch(Exception $e) {
			return false; // 예외 발생 : flase 리턴
		}
	}
?>