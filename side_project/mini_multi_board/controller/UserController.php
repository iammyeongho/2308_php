<?php
	namespace controller;

	use model\UserModel as UM;

	class UserController extends ParentsController {
		// 로그인 페이지 이동
		protected function loginGet() {
			return "view/login"._EXTENSION_PHP;
		}

		// 로그인 처리
		protected function loginPost() {
			// ID, PW 설정 (DB에서 사용할 데이터 가공)
			$arrInput = [];
			$arrInput["u_id"] = $_POST["u_id"];
			$arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);
			
			$modelUser = new UM();
			$resultUserInfo = $modelUser->getUserInfo($arrInput, true);

			// 유저 유무 체크
			if(count($resultUserInfo) === 0) {
				$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
				// 로그인 페이지로 리턴
				return "view/login"._EXTENSION_PHP;
			}
			
			// 세션에 u_id 저장
			// 로케이션으로 들어가야함 리턴으로하면 url값이 이상해짐
			$_SESSION["u_pk"] = $resultUserInfo[0]["id"];
			
			return "Location: /board/list?b_type=0";
		}

		// 로그아웃 처리
		protected function logoutGet() {
			session_unset();
			session_destroy();

			// 로그인 페이지 리턴
			return "Location: /user/login";
		}
		
		// 회원가입 페이지 이동
		protected function registGet() {
			return "view/regist"._EXTENSION_PHP;
		}

		// 회원가입 처리
		protected function registPost() {
			$u_id = $_POST["u_id"];
			$u_pw = $_POST["u_pw"];
			$u_name = $_POST["u_name"];
			$u_pw_chk = $_POST["u_pw_chk"];

			$arrAddUserInfo = [
				"u_id" => $u_id
				,"u_pw" => $this->encryptionPassword($u_pw)
				,"u_name" => $u_name
			];

			$patternId = "/^[a-zA-Z0-9]{8,20}$/";
			$patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
			$patternName = "/^[a-zA-Z가-힣]{2,20}$/u";

			if(preg_match($patternId, $u_id, $match) === 0) {
				// ID 에러 처리
				$this->arrErrorMsg[] = "아이디는 영어와 숫자로 8~20자로 입력해 주세요.";
			}
			if(preg_match($patternPw, $u_pw, $match) === 0) {
				// PW 에러 처리
				$this->arrErrorMsg[] = "비밀번호는 영어와 숫자에 특수문자(!, @)를 포함한 8~20자로 입력해 주세요.";
			}
			if(preg_match($patternName, $u_name, $match) === 0) {
				// Name 에러 처리
				$this->arrErrorMsg[] = "이름은 영어또는 한글로 8~50자로 입력해 주세요.";
			}
			if($u_pw !== $u_pw_chk) {
				// Name 에러 처리
				$this->arrErrorMsg[] = "비밀번호가 맞지않습니다.";
			}

			// 나중에 해야할 일을 TODO로 해놓고 편집기로 찾으면 진행 가능
			// TODO : 아이디 중복 체크 필요
			
			// 유효성 체크 값 오류
			if(count($this->arrErrorMsg) > 0) {
				return "view/regist.php";
				exit();
			}

			// 회원가입 처리
			$userModel = new UM();
			$userModel->beginTransaction();
			$result = $userModel->addUserInfo($arrAddUserInfo);

			if($result !== true) {
				$userModel->rollBack();
			} else {
				$userModel->commit();
			}
			$userModel->destroy();

			return "Location: /user/login";
		}

		// 비밀번호 암호화
		private function encryptionPassword($pw) {
			return base64_encode($pw);
		}

	}