<?php 
	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/assignment/src/");
	define("ERROR_MSG_PARAM", "%s : 필수 입력 사항입니다.");
	require_once(ROOT."lib/lib.php");

	$conn = null;
	$http_method = $_SERVER["REQUEST_METHOD"];
	$arr_err_msg = [];

	try {
		if(!db_conn($conn)) {
			throw new Exception("DB Error : PDO Instance");
		}
		
		if($http_method === "GET") {
			// *************************************************************************************
			// 디테일 페이지에 필요한 기본 url값 확인
			$user = isset($_GET["user"]) ? $_GET["user"] : "";
			$id = isset($_GET["id"]) ? $_GET["id"] : "";
			$page = isset($_GET["page"]) ? $_GET["page"] : "";
			// *************************************************************************************
			
			// *************************************************************************************
			// 값 여부 확인 후 에러 처리
			if($id === "" ) {
				$arr_err_msg[] = "Parameter Error : id";
			}

			if($page === "") {
				$arr_err_msg[] = "Parameter Error : page";
			}

			if(count($arr_err_msg) >= 1) {
				throw new Exception(implode("<br>", $arr_err_msg));
			}
			// *************************************************************************************

			// *************************************************************************************
			// 조회수 부분
			if(count($arr_err_msg) === 0) {

				$arr_param = [
					"id" => $id
				];

				$result = update_views_id($conn, $arr_param);

				if($result === false) {
					throw new Exception("DB Error : Select id");
				}
			}
			$arr_param = [
				"id" => $id
			];

			$result = select_boards_id($conn, $arr_param);

			if($result === false) {
				throw new Exception("DB Error : Select id");
			}

			else if(!(count($result) === 1)) {
				throw new Exception("DB Error : Select id Count");
			}
			$item = $result[0];
			} else {
				// *************************************************************************************
				// 삭제 처리
				$user = isset($_POST["user"]) ? $_POST["user"] : "";
				$id = isset($_POST["id"]) ? $_POST["id"] : "";

				$conn->beginTransaction();

				$arr_param = [
					"id" => $id
				];

				if(!delete_id($conn, $arr_param)) {
					throw new Exception("DB Error : Delete Boards id");
				}
				$conn->commit(); // 모든 처리 완료 시 커밋

				header("Location: /assignment/src/list.php/?user=$user"); //리스트 페이지로 이동
				exit;
				// *************************************************************************************
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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="/assignment/src/css/style.css">
		<title>디테일 페이지</title>
	</head>
	<body>
		<div class="background">
		<?php require_once(ROOT."header.php"); ?>

		<div class="container">
			<div class="detail-main">
					<div class="detail-content">
						<div class="detail-content-item detail-color-title-1 <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>"><h1>글 작성자</h1></div>
						<div class="detail-content-item detail-color-content-1"><?php echo $item["user_name"];?></div>
						<div class="detail-content-item detail-color-title-1 <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">작성일자</div>
						<div class="detail-content-item detail-color-content-2"><?php echo $item["date_val"];?></div>
						<div class="detail-content-item detail-color-title-1 <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">제목</div>
						<div class="detail-content-item detail-color-content-1 merged-2"><?php echo $item["title"];?></div>
						<div class="detail-content-item detail-color-title-2 <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">내용</div>
						<div class="detail-content-item merged" colspan="3"><?php echo $item["content"];?></div>
					</div>
					<div class="detail-content-icon <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">
						<div class="icon-1" onclick="location.href='/assignment/src/list.php?user=<?php echo $user; ?>'"></div>
						<div class="icon-2" onclick="location.href='/assignment/src/update.php?user=<?php echo $user; ?>&id=<?php echo $id;?>&page=<?php echo $page?>'"></div>
						<button type="button" class="icon-3" data-bs-toggle="modal" data-bs-target="#btn-delete"></button>

						<div class="modal fade" id="btn-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-delete-maxwidth">
								<div class="modal-content modal-content-option">
									<div class="modal-header">
										<h5 class="modal-title modal-title-delete-color" id="exampleModalLabel">정말로 삭제하시겠습니까?</h5>
									</div>
									<div class="modal-body">
										삭제하시면 되돌릴 수 없습니다.
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
										<form action="/assignment/src/detail.php" method="POST">
											<input type="hidden" name="user" value="<?php echo $user; ?>">
											<input type="hidden" name="id" value="<?php echo $id; ?>">
											<button class="btn btn-primary modal-delete-btn">삭제</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php require_once(ROOT."footer.php"); ?>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>