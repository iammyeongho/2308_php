<?php 
		define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/assignment/src/");
		// define("FILE_HEADER", ROOT."header.php");
		define("ERROR_MSG_PARAM", "%s : 필수 입력 사항입니다.");
		require_once(ROOT."lib/lib.php");
	
		$conn = null;
		$http_method = $_SERVER["REQUEST_METHOD"];
		$arr_err_msg = [];

		try {
			if(!db_conn($conn))
			{
				throw new Exception("DB Error : PDO Instance");
			}
			if($http_method === "GET") { 
				$user = isset($_GET["user"]) ? $_GET["user"] : "";
				$id = isset($_GET["id"]) ? $_GET["id"] : "";
				$page = isset($_GET["page"]) ? $_GET["page"] : "";
			

			if($id === "" ) {
				$arr_err_msg[] = "Parameter Error : id";
			}

			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}

			if(count($arr_err_msg) === 0) {

				$arr_param = [
					"id" => $id
				];

				$result = update_views_id($conn, $arr_param);

				if($result === false) {
					throw new Exception("DB Error : Select id");
				}


				$arr_param = [
					"id" => $id
				];

				$result = select_boards_id($conn, $arr_param);

				if($result === false) {
					throw new Exception("DB Error : Select id");
				}

				else if(!(count($result) === 1)) {
					throw new Exception("DB Error : Select id Count");
				}
				$item = $result[0];
			}
		} else {

		}
		} catch(Exception $e) {
			echo $e->getMessage();
			exit;
		} finally {

		}
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="/assignment/src/css/style.css">
		<title>삭제 페이지</title>
	</head>
	<body>
		<div class="background">
			<?php require_once(ROOT."header.php"); ?>

		<div class="container">
			<div class="update-main">
				<div class="update-content-box">
					<div class="update-title">
						<input class="update-title-input" type="text" name="" id="">
					</div>
					<div class="update-content">
						<textarea style="background-color: #fff" name="" id=""></textarea>
					</div>
				</div>
			</div>
		</div>
		
			<div class="footer">
				<div class="music-icon"></div>
				<div class="music-lyrics">노래 가사 들어감</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>