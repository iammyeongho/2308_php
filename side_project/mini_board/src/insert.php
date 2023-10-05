<?
	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER", ROOT."header.php");
	define("ERROR_MSG_PARAM", "%s : 필수 입력 사항입니다.");
	require_once(ROOT."lib/lib_db.php");

	$conn = null;
	// POST로 request가 왔을 때 처리
	$http_method = $_SERVER["REQUEST_METHOD"];
	// var_dump($http_method);
	$arr_err_msg = []; // 에러 메세지 저장용

	$title = "";
	$content = "";

	if($http_method === "POST") {

		try {

			$arr_post = $_POST;
			
			// 파라미터 획득
			$title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 셋팅
			$content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 셋팅

			if($title === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
			}
			if($content === "") {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
			}

			if(count($arr_err_msg) === 0) {

				if(!my_db_conn($conn))
				{
					throw new Exception("DB Error : PDO Instance");
				}
				$conn->beginTransaction();

				// 게시글 작성을 위헤 파라미터 셋팅
				$arr_param = [
					"title" => $_POST["title"]
					,"content" => $_POST["content"]
				];

				// insert
				if(!my_db_insert_boards($conn, $arr_param)) {
					// DB Insert 에러
					throw new Exception("DB Error : Insert Boards");
				}

				$conn->commit();

				// 리스트 페이지로 이동
				header("Location: list.php"); //Location을 콜론(:) 이후의 주소로 이동하라는 헤더 메시지이다
				exit;
			}
		

			
		}
		catch(Exception $e) {
			if($conn !== null) {
				$conn->rollBack();
			}
			// echo $e->getMessage(); // 예외발생 메세지 출력
			header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}"); // 에러 메세지 error.php로 이동
			exit;
		}
		
		finally {
			my_db_destroy_conn($conn); // DB 파기
		}

	}


?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/mini_board/src/css/common.css">
		<title>작성 페이지</title>
	</head>

	<body>
		<?php foreach($arr_err_msg as $val) {
			?> <p class="err_msg"><?php echo $val; ?></p>
		<?php } ?>
		<main>
			<?php
			require_once(FILE_HEADER);
			?>
			<div class="main-top">
				<div class="main-top-1"></div>
				<div class="main-top-2"></div>
				<div class="main-top-3"></div>
			</div>


			<form class="insert-form" action="/mini_board/src/insert.php" method="post">
				<!-- <fieldset> -->
					<table class="insert-table">
						<div class="title-box">
							<label for="title">제목 : </label>
							<input type="text" name="title" id="title" value="<?php echo $title ?>">
						</div>
						
						<div class="content-box">
							<label for="content">내용 : </label>
							<textarea name="content" id="content" cols="125" rows="20"><?php $content; ?></textarea>
						</div>
						<div class="but-box">
							<button class="insert-but" type="submit">작성</button>
							<a class="insert-but" href="/mini_board/src/list.php/">취소</a>
						</div>
					</table>
				<!-- </fieldset> -->
			</form>
			
		</main>
	</body>
</html>	