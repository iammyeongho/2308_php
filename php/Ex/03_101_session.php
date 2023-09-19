<?

	// session : 데이터를 웹서버에 저장, 쿠키보다 보안성과 속도가 빠름
	// 보안성과 관련된 데이터는 전부 데이터베이스에 넣어야함 | 필요시 데이터베이스에 요청하여 받아와야함
	// 클라이언트와 웹 서버 세션에 둘 다 저장

	// ****** 주의사항 ******
	// 개인정보, 민감한 정보들은 되도록 저장하지 말아야한다.
	// 세션을 만들면 자동으로 쿠키값이 지정됨
	// 세션의 암호화된 쿠키는 주기적으로 계속 바뀜 따라서 쿠키에 비해 보안성이 좋음
	// 웹서버의 용량은 크지않기 때문에 최대한 빠른 시간 내에 삭제를 해줘야함

	// session 이름 설정
	// session_name을 설정하면 관련 session php 파일에 다 넣어줘야함
	session_name("login");

	// session 시작
	session_start();

	$_SESSION["green"] = "PHP";
	$_SESSION["green2"] = "JAVA";
	
	// 특정 세션 삭제
	// unset($_SESSION["green"]);

	// 모든 세션 삭제
	// 웹 서버에 있는 세션은 사라졌지만, php의 글로벌 변수가 남아있기 때문에 해당 페이지로 이동해도 남아있음
	// 따라서 03_101_session_destroy와 03_097_cookie_chk로 나눠줘야함
	session_destroy(); 

	// print_r($_SESSION);


?>