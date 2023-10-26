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

			}

	} catch(Exception $e) {

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
			<div class="header">
				<div class="user-icon" onclick="location.href='/assignment/src/user.php'"></div>
				<a class="header-a" href="/assignment/src/list.php">짱구는 못말려</a>
				<div class="search-icon"></div>
			</div>

			<div class="detail-main">
				<div class="detail-content">
					<table>
						<tr>
							<th>a</th>
							<td>1</td>
						</tr>
						<tr>
							<th>b</th>
							<td>2</td>
						</tr>
						<tr>
							<th>c</th>
							<td>3</td>
						</tr>
						<tr>
							<th>d</th>
							<td>4</td>
						</tr>
						<tr>
							<th>e</th>
							<td>5</td>
						</tr>
					</table>

				</div>
			</div>

			<div class="footer">
				<div class="music-icon"></div>
				<div class="music-lyrics">노래 가사 들어감</div>
			</div>
		</div>	
	</body>
</html>