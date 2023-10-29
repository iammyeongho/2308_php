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
		<link rel="stylesheet" href="/assignment/src/css/style.css">
		<title>리스트 페이지</title>
	</head>
	<body>
		<div class="background">
			<?php require_once(ROOT."header.php"); ?>

			<div class="insert-main">
                <form action="/assignment/src/insert.php" method="post">
                    <div class="insert-content">
                        <div class="insert-content-item insert-color-title-1<?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">작성자</div>
                        <div class="insert-content-item insert-color-content-1"><?php if($user == 1) { echo "신짱구" ;} else if($user == 2) { echo "안철수"; } else if($user == 3) { echo "유나이티드 맹구"; } else if($user == 4) { echo "한유라"; }?></div>
                        <div class="insert-content-item insert-color-title-1<?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">제목</div>
                        <div class="insert-content-item insert-color-content-1"><input type="text" placeholder="제목을 입력해주세요."></div>
                        <div class="insert-content-item insert-color-title-2<?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">내용</div>
                        <div class="insert-content-item insert-color-content-2"><textarea type="text" placeholder="내용을 입력해주세요."></textarea></div>

                        <div class="insert-btn <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>"></div>
                    </div>  
                </form>
            </div>

			<div class="footer">
				<div class="music-icon"></div>
				<div class="music-lyrics">노래 가사 들어감</div>
			</div>
		</div>
	</body>
</html>