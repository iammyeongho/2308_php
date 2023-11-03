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
	}