<?php
	namespace model;

	class UserModel extends ParentsModel {
		// pwFlg 비밀번호를 받을 수도 있고 안 받을 수도 있다는 얘기
		// 특정 유저를 조회하는 메소드
		public function getUserInfo($arrUserInfo, $pwFlg = false) {
			$sql =
				" SELECT "
				." 		* "
				." FROM "
				." 		user "
				." WHERE "
				." 		u_id = :u_id "
				;

			$prepare = [
				":u_id" => $arrUserInfo["u_id"]
			];

			if($pwFlg) {
				$sql .=" AND u_pw = :u_pw ";
				$prepare[":u_pw"] = $arrUserInfo["u_pw"];
			}

			try {
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($prepare);
				$result = $stmt->fetchAll();
				return $result;
			}catch(Excption $e) {
				echo "UserModel->getUserInfo Error : ".$e->getMessage();
				exit();
			}
		}

		// 유저 정보 insert
		// Array 타입 힌팅 | 파라미터 값이 Array로만 와야함
		// public function addUserInfo(Array $arrAddUserInfo) {
		public function addUserInfo($arrAddUserInfo) {
			$sql =
				" INSERT INTO user ( "
				." 		u_id "
				." 		,u_pw "
				." 		,u_name "
				." 		) "
				." VALUES ( "
				." 		:u_id "
				." 		,:u_pw "
				." 		,:u_name "
				." 		) "
				;

			$prepare = [
				"u_id" => $arrAddUserInfo["u_id"]
				,"u_pw" => $arrAddUserInfo["u_pw"]
				,"u_name" => $arrAddUserInfo["u_name"]
			];

			try {
				$stmt = $this->conn->prepare($sql);
				$result = $stmt->execute($prepare);
				return $result; // 결과 리턴
			}
			catch(Exception $e) {
				echo "UserModel->addUserInfo Error : ".$e->getMessage();
				return false; // 예외 발생 : flase 리턴
			}
		}

		// public function userIdChk($arrUserIdChkInfo) {
		// 	$sql =
		// 		" SELECT "
		// 		." 		count(u_id) as id_cnt "
		// 		." FROM "
		// 		." 		user "
		// 		." WHERE "
		// 		." 		u_id = u_id "
		// 		;

		// 		$prepare = [
		// 			"u_id" => $arrUserIdChkInfo["u_id"]
		// 		];

		// 		try {
		// 			$stmt = $this->conn->prepare($sql);
		// 			$result = $stmt->execute($prepare);
		// 			return $result; // 결과 리턴
		// 		}
		// 		catch(Exception $e) {
		// 			echo "UserModel->addUserInfo Error : ".$e->getMessage();
		// 			return false; // 예외 발생 : flase 리턴
		// 		}
		// }

	// 	public function userIdChk($u_id) {
    //     $sql =
    //         " SELECT "
    //         ."     count(u_id) as cnt "
    //         ." FROM "
	// 		." 		user "
    //         ." WHERE "
    //         ."     u_id = :u_id "
    //     ;
    //     $prepare = [
    //         ":u_id" => $u_id
    //     ];
    //     try {
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute($prepare);
    //         $result = $stmt->fetchAll();
    //         return $result;
    //     } catch (Exception $e) {
    //         echo "UserModel->idChk Error: " . $e->getMessage();
    //         exit();
    //     }
    // }
	}