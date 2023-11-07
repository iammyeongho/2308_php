<?php 
	namespace model;

	class BoardModel extends ParentsModel {
		public function getBoardList($arrBoardInfo) {
			$sql =
				" SELECT "
				." 		id "
				." 		,u_pk "
				." 		,b_title	"
				." 		,b_content "
				."		,b_img "
				."		,created_at "
				."		,updated_at "
				." FROM "
				." 		board "
				." WHERE "
				." 		b_type = :b_type "
				." AND "
				." 		deleted_at IS NULL "
				;

			$prepare = [
				":b_type" => $arrBoardInfo["b_type"]
			];

			try {
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($prepare);
				$result = $stmt->fetchAll();
				return $result;
			}catch(Excption $e) {
				echo "BoardModel->getBoardList Error : ".$e->getMessage();
				exit();
			}
		}

		public function addBoard($arrAddBoardInfo) {
			$sql =
				" INSERT INTO board ( "
				." 		u_pk "
				." 		,b_type "
				." 		,b_title "
				." 		,b_content "
				." 		,b_img "
				." 		) "
				." VALUES ( "
				." 		:u_pk "
				." 		,:b_type "
				." 		,:b_title "
				." 		,:b_content "
				." 		,:b_img "
				." 		) "
				;

			$prepare = [
				"u_pk" => $arrAddBoardInfo["u_pk"]
				,"b_type" => $arrAddBoardInfo["b_type"]
				,"b_title" => $arrAddBoardInfo["b_title"]
				,"b_content" => $arrAddBoardInfo["b_content"]
				,"b_img" => $arrAddBoardInfo["b_img"]
			];

			try {
				$stmt = $this->conn->prepare($sql);
				$result = $stmt->execute($prepare);
				return $result; // 결과 리턴
			}
			catch(Exception $e) {
				echo "BoardModel->addBoard Error : ".$e->getMessage();
				return false; // 예외 발생 : flase 리턴
			}
		}
		
		// 디테일 조회
		public function getBoardDetail($arrBoardDetailInfo) {
			$sql =
				" SELECT "
				." 		id "
				." 		,u_pk "
				." 		,b_title	"
				." 		,b_content "
				."		,b_img "
				."		,created_at "
				// ."		,DATE_FORMAT(created_at, '%Y년 %m월 %d일') created_at "
				."		,updated_at "
				." FROM "
				." 		board "
				." WHERE "
				." 		id = :id "
				;

			$prepare = [
				":id" => $arrBoardDetailInfo["id"]
			];

			try {
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($prepare);
				$result = $stmt->fetchAll();
				return $result;
			}catch(Excption $e) {
				echo "BoardModel->getBoardDetail Error : ".$e->getMessage();
				exit();
			}
		}
	}