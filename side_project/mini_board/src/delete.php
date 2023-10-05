<?php 
	define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");
	$conn = null;
	
	try {
		if(!my_db_conn($conn))
		{
			//강제 예외 발생 : DB Instance
			throw new Exception("DB Error : PDO Instance");
		}

		$http_method = $_SERVER["REQUEST_METHOD"];

		if($http_method === "GET") {
			$id = isset($_GET["id"]) ? $_GET["id"] : "";
			$page = isset($_GET["page"]) ? $_GET["page"] : "";
			$arr_err_msg = [];

			if($id === "" ) {
				$arr_err_msg[] = "Parameter Error : id";
			}

			if($page === "") {
				$arr_err_msg[] = "Parameter Error : page";
			}

			// 위의 2가지의 if문에 배열이 2가지 이상 들어가면 해당 에러 출력
			if(count($arr_err_msg) >= 1) {
				// 배열을 특정 문자열로 qoduf
				throw new Exception(implode("<br>", $arr_err_msg));
			}

			$arr_param = [
				"id" => $id
			];

			$result = my_db_select_boards_id($conn, $arr_param);
	
			if($result === false) {
				throw new Exception("DB Error : Select id");
			}

			else if(!(count($result) === 1)) {
				throw new Exception("DB Error : Select id Count");
			}
			$item = $result[0];
		} 
		else {
			$id = isset($_POST["id"]) ? $_POST["id"] : "";

			$arr_err_msg = [];

			if($id === "" ) {
				$arr_err_msg[] = "Parameter Error : id";
			}

			if(count($arr_err_msg) >= 1) {
				// 배열을 특정 문자열로 qoduf
				throw new Exception(implode("<br>", $arr_err_msg));
			}

			$conn->beginTransaction();

			// 게시글 아이디 정보
			$arr_param = [
				"id" => $id
			];

			// 예외 처리
			if(!my_db_delete_boards_id($conn, $arr_param)) {
				throw new Exception("DB Error : Delete Boards id");
			}
			$conn->commit(); // 모든 처리 완료 시 커밋

            header("Location: list.php"); //리스트 페이지로 이동
            exit;
		}
	}
	catch(Exception $e) {
		if($http_method === "POST") {
            $conn->rollBack(); //rollback
        }
		// echo $e->getMessage(); // 예외발생 메세지 출력
		header("Location: error.php/?err_msg={$e->getMessage()}"); // 에러 메세지 error.php로 이동
		exit;
	}
	finally {
		my_db_destroy_conn($conn);
	}


?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/mini_board/src/css/common.css">
		<title>삭제 페이지</title>
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
			</div>

			<table class="table-box">
				<caption class="box">
					삭제하면 영구적으로 복구할 수 없습니다.
					<br>
					정말로 삭제 하시겠습니까?
					<br>
				</caption>
				<tr>
					<th>게시글 번호</th>
					<td><?php echo $item["id"];?></td>
				</tr>
				<tr>
					<th>작성일</th>
					<td><?php echo $item["creat_at"];?></td>
				</tr>
				<tr>
					<th>제목</th>
					<td><?php echo $item["title"];?></td>
				</tr>
				<tr>
					<th>내용</th>
					<td><?php echo $item["content"];?></td>
				</tr>
			</table>
		</main>
		
		<section>
			<form action="/mini_board/src/delete.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
				<button class="insert-but" type="submit">동의</button>
				<a class="insert-but" href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
			</form>
		</section>
	</body>
</html>