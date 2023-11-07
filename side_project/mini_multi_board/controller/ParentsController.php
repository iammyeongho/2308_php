<?php
	namespace controller;

	use model\BoardNameModel as BNM;

	class ParentsController {
		// 헤더 표시 제어용 문자열
		protected $controllerChkUrl;

		// 화면 표시용 에러메세지 리스트
		protected $arrErrorMsg = [];

		// 헤더 게시판 드롭박스 표시용
		protected $arrBoardNameInfo;

		// 비로그인 시 접속 불가능한 URL 리스트
		private $arrNeedAuth = [
			"board/list"
			,"board/add"
			,"board/detail"
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

			// 헤더 게시판 드롭박스 데이터 획득 
			// arrBoardNameInfo 클래스에서 접근, boardNameModel 지역변수 
			$boardNameModel = new BNM(); 
			$this->arrBoardNameInfo = $boardNameModel->getBoardNameList();
			$boardNameModel->destroy();

			// controller 메소드 호출
			$resultAction = $this->$action();

			// view 호출
			$this->callView($resultAction);
			exit();
		}

		// 유저 권한 체크용 메소드
		private function chkAuthorization() {
			$url = $_GET["url"];
			// 접속 권한이 없는 페이지 접속 차단
			if(!isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth)) {
				header("Location: /user/login");
				exit();
			} 
			// 로그인한 상태에서 로그인 페이지 접속 시 board/list로 이동
			if(isset($_SESSION["u_pk"]) && $url === "user/login") {
				header("Location: /board/list");
				exit();
			}

		}

		// 뷰 호출용 메소드
		//제공된 PHP 코드는 callView 함수로, 주어진 $path에 따라 뷰를 로드하거나, "Location:" 접두사가 있는 경우에는 헤더를 통해 페이지를 리디렉션하는 역할을 합니다.
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