<?

	// ***************************
	// 파일명 	: 04_107_fnc_db_connect.php
	// 기능 	: 디비 연동 함수
	// 버전 	: v001 new jung.mh 230918
	// 			: v002 dbconn 설정 변경 (수정자)
	// ***************************

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
	// 파라미터 : PDO &$conn
	// 리턴 	: Array / false
	// ----------------------------

	function my_db_select_boards_paging(&$conn) 
	{
		try
		{
			$sql = 
				" SELECT "
				."		id "
				."		,title "
				."		,creat_at "
				." FROM "
				."		boards "
				." ORDER BY "
				." 		id DESC "
				;
			$arr_ps = [];

			$stmt = $conn->prepare($sql);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll();
			return $result; // 정상 : 쿼리 결과 리턴
		}
		catch(Exception $e)
		{
			return false; // 예외 발생 : flase 리턴
		}
	}

?>