<?php 

	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");
	$conn = null;

	try {
		if(!db_conn($conn))
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

			$result = db_select_boards_id($conn, $arr_param);
	
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
			if(!db_delete_boards_id($conn, $arr_param)) {
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
		echo $e->getMessage();
		exit;
	}
	finally {
		db_destroy_conn($conn);
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/mini_test/src/css/style.css">
        <title>상세 페이지</title>
    </head>

    <body>
        <main>
        <div class="side">
				<div class="side-top">
					<a href="">New Jeans</a>
				</div>

				<div class="side-search">
					<form action="/mini_test/src/list.php" method="get">
						<table>
							<button class="side-search-btm"><img src="/mini_test/src/css/icon/search.png" alt=""></button>
							<input class="side-search-input" type="text" name="search" id="search" required="required">
						</table>
					</form>
				</div>

				<div class="side-calendar">
					<img src="./img/calendar.png" alt="">
				</div>

				<div class="side-content">
					<ul class="slides">
						<input type="radio" name="radio-btn" id="img-1" checked />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans1.jpg" />
							</div>
						<div class="nav">
							<label for="img-5" class="prev">&#x2039;</label>
							<label for="img-2" class="next">&#x203a;</label>
						</div>
						</li>
					
						<input type="radio" name="radio-btn" id="img-2" />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans2.jpg" />
							</div>
						<div class="nav">
							<label for="img-1" class="prev">&#x2039;</label>
							<label for="img-3" class="next">&#x203a;</label>
						</div>
						</li>
					
						<input type="radio" name="radio-btn" id="img-3" />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans3.jpg" />
							</div>
						<div class="nav">
							<label for="img-2" class="prev">&#x2039;</label>
							<label for="img-4" class="next">&#x203a;</label>
						</div>
						</li>
					
						<input type="radio" name="radio-btn" id="img-4" />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans4.jpg" />
							</div>
						<div class="nav">
							<label for="img-3" class="prev">&#x2039;</label>
							<label for="img-5" class="next">&#x203a;</label>
						</div>
						</li>
					
						<input type="radio" name="radio-btn" id="img-5" />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans5.jpg" />
							</div>
						<div class="nav">
							<label for="img-4" class="prev">&#x2039;</label>
							<label for="img-1" class="next">&#x203a;</label>
						</div>
						</li>
					
					
						<li class="nav-dots">
							<label for="img-1" class="nav-dot" id="img-dot-1"></label>
							<label for="img-2" class="nav-dot" id="img-dot-2"></label>
							<label for="img-3" class="nav-dot" id="img-dot-3"></label>
							<label for="img-4" class="nav-dot" id="img-dot-4"></label>
							<label for="img-5" class="nav-dot" id="img-dot-5"></label>
						</li>
					</ul>
				</div>
			</div>

			<section>
				<div class="content-top">
					<h1>글 번호 : <?php echo $item["id"]; ?></h1>
					<h1>|</h1>
					<h1>제목 : <?php echo $item["title"] ?></h1>
					<h1>|</h1>
					<h1>작성자 : <?php echo $item["writet"] ?></h1>
				</div>
				

				<div class="content-mid">
					<table>
					<rowgroup>
						<row width="20%" />
						<row width="20%" />
					</rowgroup>
						<tr>
							<th>내용</th>
							<td><?php echo $item["content"] ?></td>
						</tr>

						<tr>
							<th>작성일자</th>
							<td><?php echo $item["created_date"] ?></td>
						</tr>
					</table>
				</div>

				<div class="content-btm">
				</div>
			</section>
		</main>
    </body>
</html>