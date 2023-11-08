<?php
	namespace lib;
	
	class Validation {
		private static $arrErrorMsg = [];

		// getter : 에러메세지 반환용 메세지
		public static function getArrErrorMsg() {
			return self::$arrErrorMsg;
		}

		// setter : 에러메세지 저장용 메소드
		public static function setArrErrorMsg($msg) {
			self::$arrErrorMsg[] = $msg;
		}


		// 유효성 체크 메소드
		public static function userChk(array $inputData) :bool {
			$patternId = "/^[a-zA-Z0-9]{8,20}$/";
			$patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
			$patternName = "/^[a-zA-Z가-힣]{2,20}$/u";

			// 아이디 체크
			if(array_key_exists("u_id", $inputData))
			{
				if(preg_match($patternId, $inputData["u_id"], $match) === 0) {
					// ID 에러 처리
					$msg = "아이디는 영어와 숫자로 8~20자로 입력해 주세요.";
					self::setArrErrorMsg($msg);
				}
			}
			// 비밀번호 체크
			if(array_key_exists("u_pw", $inputData))
			{
				if(preg_match($patternPw, $inputData["u_pw"], $match) === 0) {
					// PW 에러 처리
					$msg = "비밀번호는 영어와 숫자에 특수문자(!, @)를 포함한 8~20자로 입력해 주세요.";
					self::setArrErrorMsg($msg);
				}
			}
			// 비밀번호 확인 체크
			if(array_key_exists("u_pw_chk", $inputData))
			{
				if($inputData["u_pw"] !== $inputData["u_pw_chk"]) {
					// Name 에러 처리
					$msg = "비밀번호가 맞지않습니다.";
					self::setArrErrorMsg($msg); 
				}
			}
			// 이름 체크
			if(array_key_exists("u_name", $inputData))
			{
				if(preg_match($patternName, $inputData["u_name"], $match) === 0) {
					// Name 에러 처리
					$msg = "이름은 영어또는 한글로 8~50자로 입력해 주세요.";
					self::setArrErrorMsg($msg);
				}
			}

			// 리턴 처리
			if(count(self::$arrErrorMsg) > 0) {
				return false;
			}
			return true;
		}
	}

	// 테스트용
	// $arr = [
	// 	"u_id" => "admin1234"
	// 	,"u_pw" => "12345678"
	// ];

	// var_dump(Validation::userChk($arr));

	// var_dump(Validation::getArrErrorMsg());