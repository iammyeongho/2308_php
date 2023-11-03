<?php
	// 인덱스에 어떤 url이 왔는지 분석해줌 그 후 컨트롤러로 이동

	// 클래스 이름이 겹칠 수도 있기 때문에 해당 경로를 적어줌
	namespace router;
	
	// 사용할 컨트롤러들 위치 지정
	use controller\UserController as UC;
	use controller\BoardController as BC;

	// 라우터 : 유저의 요청을 분석해서 해당 Controller로 연결해주는 클래스
	class Router {
		public function __construct() {
			// URL 규칙
			// 1. 회원 정보 관련 URL
			// 			user/[해당기능]
			// 			ex) 로그인 : 호스트/user/login
			// 			ex) 회원가입 : 호스트/user/regist
			// 2. 게시판 관련 URL
			// 			board/[해당기능]
			// 			ex) 리스트 : 호스트/board/list
			// 			ex) 수정 : 호스트/board/edit

			$url = $_GET["url"]; //접속 url 획득
			$method = $_SERVER["REQUEST_METHOD"]; // 메소드 획득

			if($url === "user/login") {
				if($method === "GET") {
					// 해당 컨트롤러 호출
					// new 클래스("메소드명");
					// 소괄호가 있으면 해당 메소드의 CONSTRUCT를 실행 
					new UC("loginGet");
				} else {
					// 해당 컨트롤러 호출
					new UC("loginPost"); 
				}
			} else if($url === "user/logout") {
				if($method === "GET") {
					// 해당 컨트롤러 호출
					new UC("logoutGet");
				} else {
					// 해당 컨트롤러 호출
				}
			} else if($url === "user/regist") {
				if($method === "GET") {
					new UC("registGet");
				} else {

				}
			} else if($url === "board/list") {
				if($method === "GET") {
					new BC("listGet");
				} else {

				}
			}
			echo "이상한 URL : ".$url;
			exit();
		}
	}