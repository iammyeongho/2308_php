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

	// & 레퍼런스 파라미터 | 주소 값 참조
	function my_db_home_conn( &$conn )
	{
		$db_host 	= "localhost"; //host | 127.0.0.1 = localhost 
		$db_user 	= "root"; // user
		$db_pw 		= "jmhaudgh1!"; // password
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
		$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
	}

	
	// ----------------------------
	// 함수명 	: db_destroy_conn
	// 기능 	: DB Destoroy
	// 파라미터 : PDO &$conn
	// 리턴 	: 없음
	// ----------------------------

	function db_destroy_home_conn(&$conn)
	{
		$conn = null;
	}

	



?>