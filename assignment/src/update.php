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

			}
		} else {	
			$user = isset($_POST["user"]) ? $_POST["user"] : "";
			$id = isset($_POST["id"]) ? $_POST["id"] : "";
			$page = isset($_POST["page"]) ? $_POST["page"] : "";
			$title = trim(isset($_POST["title"]) ? trim($_POST["title"]) : "");
			$content = trim(isset($_POST["content"]) ? trim($_POST["content"]) : ""); 

			if($id === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
			}
			if($page === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
			}
	
			// id, page가 없을 경우(예외처리)
			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}

			if($title === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
			}
			if($content === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
			}

			if(count($arr_err_msg) === 0) {
				$arr_param = [
					"id" => $id
					,"title" => $title
					,"content" => $content
				];
				$conn->beginTransaction(); // 123line catch 업데이트 위치 전으로 트랜잭션 시작

				if(!update_boards_id($conn, $arr_param)) {
					// DB  Update_Boards 에러 
					// 에러 발생했을 경우 catch로 throw
					throw new Exception("DB Error : Update_Boards_id");
				}
				$conn->commit(); // 정상 처리가 될 경우 commit

				// 게시글 수정 했을 경우 detail page로 이동
				header("Location: /assignment/src/detail.php/?id=$id&page=$page&user=$user");
				exit;
			}
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
		<title>수정 페이지</title>
	</head>
	<body>
		<div class="background">
			<?php require_once(ROOT."header.php"); ?>
		<div class="container">
			<div class="update-main">
				<div class="update-content-box">
					<div class="update-title">
					<form action="/assignment/src/update.php/" method="POST">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="page" value="<?php echo $page; ?>">
						<input type="hidden" name="user" value="<?php echo $user; ?>">
						<input class="update-title-input <?php if($user == 1) { ?> color-1 <?php } else if($user == 2) { ?> color-2 <?php } else if($user == 3) {?> color-3 <?php } else if($user == 4) { ?> color-4 <?php } ?>" type="text" name="title" id="" placeholder="변경할 제목을 입력해주세요. (50자 제한)" maxlength='50'>
					</div>
					<div class="update-content">
						<textarea class="upadte-content-textarea <?php if($user == 1) { ?> color-1 <?php } else if($user == 2) { ?> color-2 <?php } else if($user == 3) {?> color-3 <?php } else if($user == 4) { ?> color-4 <?php } ?>" name="content" id="" placeholder="변경할 내용을 입력해주세요. (100자 제한)" maxlength='100'></textarea>
					</div>
					<div class="update-btn-box">
						<button class="update-btn <?php if($user == 1) { ?> color-1 <?php } else if($user == 2) { ?> color-2 <?php } else if($user == 3) {?> color-3 <?php } else if($user == 4) { ?> color-4 <?php } ?>">작성</button>
						<div onclick="location.href='/assignment/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>&user=<?php echo $user;?>'" class="update-close-btn <?php if($user == 1) { ?> color-1 <?php } else if($user == 2) { ?> color-2 <?php } else if($user == 3) {?> color-3 <?php } else if($user == 4) { ?> color-4 <?php } ?>">취소</div>
					</form>
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