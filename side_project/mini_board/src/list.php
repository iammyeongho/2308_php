<?php

	// SERVER 웹서버와 관련된 모든 정보가 담겨있는 슈퍼 글로벌 변수에서 키가 ROOT인 애를 데리고옴
	// C:\Apache24\htdocs의 ROOT정보를 가지고옴
	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	require_once(ROOT."lib/lib_db.php");
	$conn = null;

	// DB 접속
	if(!my_db_conn($conn))
	{
		echo "DB Error : PDO Instance";
		exit;
	}

	// 게시글 리스트 조회
	$result = my_db_select_boards_paging($conn);
	if(!$result)
	{
		echo "DB Error : SELECT boards";
		exit;
	}

	my_db_destroy_conn($conn);

	var_dump($result);

?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/common.css">
	<title>리스트 페이지</title>
</head>
<body>
	<header>
		<h1>mini Board</h1>
	</header>
	<main>
		<table>
			<colgroup>
				<col width="20%" />
				<col width="50%" />
				<col width="30%" />
			</colgroup>
			
			<tr class="table-title">
				<th>번호</th>
				<th>제목</th>
				<th>작성일자</th>
			</tr>
			<tr>
				<td>5</td>
				<td>5번게시글</td>
				<td>2023/09/20 14:50</td>
			</tr>
			<tr>
				<td>4</td>
				<td>4번게시글</td>
				<td>2023/09/19 13:50</td>
			</tr>
			<tr>
				<td>3</td>
				<td>3번게시글</td>
				<td>2023/09/18 12:50</td>
			</tr>
			<tr>
				<td>2</td>
				<td>2번게시글</td>
				<td>2023/09/17 11:50</td>
			</tr>
			<tr>
				<td>1</td>
				<td>1번게시글</td>
				<td>2023/09/16 10:50</td>
			</tr>
		</table>
		
		<section>
			<a href="#">이전</a>
			<a href="#">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">다음</a>
		</section>
	</main>
</body>
</html>