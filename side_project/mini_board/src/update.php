<?php
    define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
    define("FILE_HEADER", ROOT."header.php");
    require_once(ROOT."lib/lib_db.php");

    $conn = null;
    $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"];
    $page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];

    $http_method = $_SERVER["REQUEST_METHOD"]; //Method 확인

    try {
        if(!my_db_conn($conn))
			{
				throw new Exception("DB Error : PDO Instance");
			}

        if($http_method === "GET") {
            // GET Method의 경우
            // 게시글 데이터 조회를 위한 파라미터 세팅
            $arr_param = [
                "id" => $id
            ];

            $result = my_db_select_boards_id($conn, $arr_param);

            // 게시글 조회 예외처리
            if($result === false) {
                throw new Exception("DB Error : PDO Select_id");
                
            }
            else if(!(count($result) === 1)) {
                throw new Exception("DB Error : PDO Select_id count, ".count($result));
            }
            $item = $result[0];
        }
        else {
            // POST Method의 경우
            // 게시글 수정을 위해 파라미터 세팅
            $arr_param = [
                "id" => $id
                ,"title" => $_POST["title"]
                ,"content" => $_POST["content"]
            ];

            // 게시글 수정 처리
            $conn->beginTransaction(); // 트랜잭션 시작

            if(!my_db_update_boards_id($conn, $arr_param)) {
				throw new Exception("DB Error : UPDATE Boards id");
			}
			$conn->commit(); // 모든 처리 완료 시 커밋

            header("Location: detail.php/?id={$id}&page={$page}"); //디테일 페이지로 이동
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
        my_db_destroy_conn($conn);
    }

?>


<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/mini_board/src/css/common.css">
        <title>수정 페이지</title>
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

            <div class="detail-page">
                <form action="/mini_board/src/update.php" method="post">
                    <table>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <rowgroup>
                        <row width="33%" />
                        <row width="33%" />
                        <row width="33%" />
                    </rowgroup>
                        <tr>
                            <th>글 번호</th>
                            <td><?php echo $item["id"]; ?></td>
                            
                        </tr>

                        <tr>
                            <th>제목</th>
                            <td><input type="text" name="title" value="<?php echo $item["title"]; ?>"></td>
                        </tr>

                        <tr>
                            <th>내용</th>
                            <td><textarea name="content" id="content" cols="125" rows="20"><?php echo $item["content"]; ?></textarea></td>
                        </tr>
                    </table>
                    
                    <div class="detail-page-a">
					<button class="insert-but" type="submit">확인</button>
					<a href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
				    </div>
                </form>
			</div>
        </main>
    </body>
</html>