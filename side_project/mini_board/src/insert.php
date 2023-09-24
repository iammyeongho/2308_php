<?
	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");

	// POST로 request가 왔을 때 처리
	$http_method = $_SERVER["REQUEST_METHOD"];
	// var_dump($http_method);
	if($http_method === "POST") {

		try {
			$arr_post = $_POST;
			$conn = null;

			if(!my_db_conn($conn))
			{
				throw new Exception("DB Error : PDO Instance");
			}
			$conn->beginTransaction();

			// insert
			if(!my_db_insert_boards($conn, $arr_post)) {
				throw new Exception("DB Error : Insert Boards");
			}
			$conn->commit(); // 모든 처리 완료 시 커밋

			// 리스트 페이지로 이동
			header("Location: list.php"); //Location을 콜론(:) 이후의 주소로 이동하라는 헤더 메시지이다
			exit;
		}
		catch(Exception $e) {
			$conn->rollBack();
			echo $e->getMessage(); // Exception 메세지 출력
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
		<main>
			<?php
			require_once(FILE_HEADER);
			?>
			<div class="main-top">
				<div class="main-top-1"></div>
				<div class="main-top-2"></div>
				<div class="main-top-3"></div>
					<!-- <p>: MINI BOARD</p> -->
			</div>

			<form class="insert-form" action="/mini_board/src/insert.php" method="post">
				<!-- <fieldset> -->
					<table class="insert-table">
						<div class="title-box">
							<label for="title">제목 : </label>
							<input type="text" name="title" id="title">
						</div>
						
						<div class="content-box">
							<label for="content">내용 : </label>
							<textarea name="content" id="content" cols="125" rows="20"></textarea>
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