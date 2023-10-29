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
			$result = select_user_name($conn);
			if(!$result)
			{
				throw new Exception("DB Error : SELECT boards");
			}
		}

	} catch(Exception $e) {
		echo $e->getMessage();
		exit;
	} finally { 
        db_destroy_conn($conn);
    }


?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/style.css">
		<title>사용자 리스트</title>
	</head>
	<body>
		<div class="background">
			<div class="header">
				<div class="user-icon"></div>
				<a class="header-a" href="/assignment/src/user.php">캐릭터를 선택하세요</a>
				<div class="search-icon"></div>
			</div>

			<div class="user-main">
				<div class="user-content">
					<div class="user-character-jjanggu user-character" onclick="location.href='/assignment/src/list.php/?user=<?php echo $result[0]["user_id"]; ?>'">
						<p class="user_name_gap"><?php echo $result[0]["user_name"] ?></p>
					</div>
					<div class="user-character-cheolsu user-character" onclick="location.href='/assignment/src/list.php?user=<?php echo $result[1]["user_id"]; ?>'">
						<p class="user_name_gap"><?php echo $result[1]["user_name"] ?></p>
					</div>
					<div class="user-character-maenggu user-character" onclick="location.href='/assignment/src/list.php?user=<?php echo $result[2]["user_id"]; ?>'">
						<p class="user_name_gap"><?php echo $result[2]["user_name"] ?></p>
					</div>
					<div class="user-character-yuli user-character" onclick="location.href='/assignment/src/list.php?user=<?php echo $result[3]["user_id"]; ?>'">
						<p class="user_name_gap"><?php echo $result[3]["user_name"] ?></p>
					</div>
				</div>
			</div>

			<div class="footer">
				<div class="music-icon"></div>
				<div class="music-lyrics">노래 가사 들어감</div>
			</div>
		</div>
	</body>
</html>