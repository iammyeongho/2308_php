<?php
	namespace controller;

	use model\UserModel as UM;
	use lib\Validation;

	class UserController extends ParentsController {
		// 로그인 페이지 이동
		protected function loginGet() {
			return "view/login"._EXTENSION_PHP;
		}

		// 로그인 처리
		protected function loginPost() {
			$inputData = [
				"u_id" => $_POST["u_id"]
				,"u_pw" => $_POST["u_pw"]
			];
			// 유효성 체크
			if(!Validation::userChk($inputData)) {
				$this->arrErrorMsg = Validation::getArrErrorMsg();
				return "view/login.php";
			}

			// ID, PW 설정 (DB에서 사용할 데이터 가공)
			$arrInput = [];
			$arrInput["u_id"] = $_POST["u_id"];
			$arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);
			

			// 유저 정보 획득
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
			// $u_id = $_POST["u_id"];
			// $u_pw = $_POST["u_pw"];
			// $u_name = $_POST["u_name"];
			// $u_pw_chk = $_POST["u_pw_chk"];
			$inputData = [
				"u_id" => $_POST["u_id"]
				,"u_pw" => $_POST["u_pw"]
				,"u_name" => $_POST["u_name"]
				,"u_pw_chk" => $_POST["u_pw_chk"]
			];

			$arrAddUserInfo = [
				"u_id" => $_POST["u_id"]
				,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
				,"u_name" => $_POST["u_name"]
			];
			
			// 유효성 체크
			// 받는 파라미터에 POST를 넣어주면 원본 데이터를 건드리지않고 값을 받아옴
			if(!Validation::userChk($inputData)) {
				$this->arrErrorMsg = Validation::getArrErrorMsg();
				return "view/regist.php";
			}

			// TODO : 아이디 중복 체크 필요

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

		// protected function userIdChk() {
		// 	$id = isset($_POST["u_id"]) ? $_POST["u_id"] : "";

		// 	$arrUserIdChkInfo = [
		// 		"u_id" => $u_id
		// 	];

		// 	$userModel = new UM(); 
		// 	$result = $userModel->getBoardDetail($arrUserIdChkInfo);

		// 	// 레스폰스 데이터 작성
		// 	$arrTmp = [
		// 		"errflg" => "0"
		// 		,"msg" => ""
		// 		,"data" => $result[0]
		// 	];
		// 	$response = json_encode($arrTmp);

		// 	// rsponse 처리
		// 	header('Content-type: application/json');
		// 	echo $response;
		// 	exit();
		// }

		// protected function idChkGet() {
		// 	$u_id = $_GET["u_id"];
		// 	$userModel = new UM();

		// 	$result = $userModel->userIdChk($u_id);

		// 	$arrTmp = [
		// 		"errflg" => "0"
		// 		,"msg" => ""
		// 		,"data" => $result[0]
		// 	];
		// 	$response = json_encode($arrTmp);
			
		// 	// response 처리
		// 	header('Content-type: application/json');
		// 	echo $response;
		// 	exit();
    	// }

		protected function idChkPost() {
			$errorFlg = "0";
			$errorMlg = "";
			$inputData = [
				"u_id" => $_POST["u_id"]
			];

			// 유효성 체크
			if(!Validation::userChk($inputData)) {
				$errorFlg = "1";
				$errorMlg = Validation::getArrErrorMsg()[0];
			}

			$userModel = new UM();
			$result = $userModel->getUserInfo($inputData);
			$userModel->destroy();

			if(count($result) > 0) {
				$errorFlg = "1";
				$errorMlg = "중복된 아이디입니다.";
			}

			$response = [
				"errflg" => $errorFlg
				,"msg" => $errorMsg
			];
			// $response = json_encode($arrTmp);
			
			header('Content-type: application/json');
			echo json_encode($response);
			exit();
    	}
	
		// 비밀번호 암호화
		private function encryptionPassword($pw) {
			return base64_encode($pw);
		}
	}