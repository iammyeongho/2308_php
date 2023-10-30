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
        } else {
            $user = isset($_POST["user"]) ? $_POST["user"] : "";
            $title = isset($_POST["title"]) ? $_POST["title"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";

            if($user === "" ) {
				$arr_err_msg[] = "Parameter Error : user";
			}
            if($title === "" ) {
				$arr_err_msg[] = "Parameter Error : user";
			}
            if($content === "" ) {
				$arr_err_msg[] = "Parameter Error : user";
			}
            // if(count($arr_err_msg) >= 1) {
			// }

            if(count($arr_err_msg) === 0) {

                $conn->beginTransaction();

                $arr_param = [
                    "user" => $_POST["user"]
					,"title" => $_POST["title"]
					,"content" => $_POST["content"]
				];

                if(!insert_boards($conn, $arr_param)) {
                    // DB Insert 에러
                    throw new Exception("DB Error : Insert Boards");
                }
    
                $conn->commit();
    
                // 리스트 페이지로 이동
                header("Location: /assignment/src/list.php/?user=$user");
                exit;
            }

        }

    } catch(Exception $e) {
        if($conn !== null) {
				$conn->rollBack();
			}
			echo $e->getMessage(); // 예외발생 메세지 출력
			header("Location: /assignment/src/list.php"); // 에러 메세지 error.php로 이동
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
                <form action="/assignment/src/insert.php/?user=<?php echo $user; ?>" method="post">
                    <div class="insert-content">
                        <input type="hidden" name="user" value="<?php echo $user; ?>">
                        <div class="insert-content-item insert-color-title-1<?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">작성자</div>
                        <div class="insert-content-item insert-color-content-1"><?php if($user == 1) { echo "신짱구" ;} else if($user == 2) { echo "안철수"; } else if($user == 3) { echo "유나이티드 맹구"; } else if($user == 4) { echo "한유라"; }?></div>
                        <div class="insert-content-item insert-color-title-1<?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">제목</div>
                        <div class="insert-content-item insert-color-content-1"><input type="text" name="title" placeholder="제목을 입력해주세요. (16자 제한)" maxlength='16'></div>
                        <div class="insert-content-item insert-color-title-2<?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">내용</div>
                        <div class="insert-content-item insert-color-content-2"><textarea type="text" name="content" placeholder="내용을 입력해주세요."></textarea></div>

                        <div class="insert-btn <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>"><button></button></div>
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