<?php
	namespace controller;

	class ParentsController {
		// 헤더 표시 제어용 문자열
		protected $controllerChkUrl;

		// 화면 표시용 에러메세지 리스트
		protected $arrErrorMsg = [];

		// 비로그인 시 접속 불가능한 URL 리스트
		private $arrNeedAuth = [
			"board/list"
		];
		
		public function __construct($action) {
			// 뷰 관련 체크 접속 url 셋팅
			$this->controllerChkUrl = $_GET["url"];

			// 세션 시작 | 보안이 필요한 정보의 경우 세션에 저장 (꼭 필요한 정보만), 쿠키는 보안이 필요없는 경우
			if(!isset($_SESSION)) {
				session_start();
			}

			// 유저 로그인 및 권한 체크
			$this->chkAuthorization();

			// controller 메소드 호출
			$resultAction = $this->$action();

			// view 호출
			$this->callView($resultAction);
			exit();
		}

		// 유저 권한 체크용 메소드
		private function chkAuthorization() {
			$url = $_GET["url"];
			if(!isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth)) {
				header("Location: /user/login");
				exit();
			} 
		}

		// 뷰 호출용 메소드
		private function callView($path) {
			// view/list.php //유저 진입 시 ex) user/login 진입시에 user/login이 url에 표시되지만 화면은 list임
			// LocationL: /board/list // 유저 진입 시 ex) url도 list 화면도 list로 출력됨
			if(strpos($path, "Location:") === 0) {
				header($path);
			} else {
				require_once($path);
			}
		}
	}