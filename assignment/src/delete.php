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
		<link rel="stylesheet" href="/assignment/src/css/style.css">
		<title>디테일 페이지</title>
	</head>
	<body>
		<div class="background">
			<?php require_once(ROOT."header.php"); ?>

			<div class="delete-main">
					<div class="delete-content">
						<div class="delete-content-item delete-color-title-1 <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>"><h1>글 작성자</h1></div>
						<div class="delete-content-item delete-color-content-1"><?php echo $item["user_name"];?></div>
						<div class="delete-content-item delete-color-title-1 <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">작성일자</div>
						<div class="delete-content-item delete-color-content-2"><?php echo $item["date_val"];?></div>
						<div class="delete-content-item delete-color-title-1 <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">제목</div>
						<div class="delete-content-item delete-color-content-1 merged-2"><?php echo $item["title"];?></div>
						<div class="delete-content-item delete-color-title-2 <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">내용</div>
						<div class="delete-content-item merged" colspan="3"><?php echo $item["content"];?></div>
					</div>
					<div class="delete-content-icon <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">
						<div class="delete-icon-1" onclick="location.href='/assignment/src/detail.php/?user=<?php echo $user ?>&id=<?php echo $id; ?>&page=<?php echo $page?>'"></div>
						<div class="delete-icon-3" onclick="location.href='/assignment/src/delete.php/?user=<?php echo $user ?>&id=<?php echo $id; ?>'"></div>
					</div>
				</div>

			<div class="footer">
				<div class="music-icon"></div>
				<div class="music-lyrics">노래 가사 들어감</div>
			</div>
		</div>
	</body>
</html>