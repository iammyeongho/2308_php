<?php
	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/assignment/src/");
	// define("FILE_HEADER", ROOT."header.php");
	define("ERROR_MSG_PARAM", "%s : 결과가 없습니다.");
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
			$search = isset($_GET["search"]) ? $_GET["search"] : "";

			$search_term = '%' . $search . '%';

			if($user === "" ) {
				$arr_err_msg[] = "Parameter Error : user";
			}

			// if($search === "" ) {
			// 	$arr_err_msg[] = "Parameter Error : user";
			// }

			if(count($arr_err_msg) >= 1) {
				header("Location: /assignment/src/user.php");
				exit;
			}
			// ------------------------------------------------------------------------
			// 페이징 처리
			// ------------------------------------------------------------------------

			// $boards_cnt = select_boards_cnt($conn);
			// if($boards_cnt === false)
			// {
			// 	throw new Exception("DB Error : SELECT Count");
			// }

			$arr_param = 
			[
				"search" => $search_term
			];

			$boards_cnt = select_search_cnt($conn, $arr_param);
			if($boards_cnt === false)
			{
				throw new Exception("DB Error : select_search");
			}
		
			$list_cnt = 6; // 한 페이지당 데이터 수
			$page = 1; // 페이지 번호 초기화
			$block = 5; // 한 블럭 당 페이지 수
			
			//최대 페이지 수 :ex) 전체데이터(19개) / 페이지당 데이터 개수(5) = 3.8 | 5/5/5/4 이런식으로 페이지가 구성됨 -> 총 4개의 페이지가 필요
			$max_page = ceil($boards_cnt / $list_cnt);
			
			$page = isset($_GET["page"]) ? $_GET["page"] : 1;
	
			// 오프셋 계산
			$offset = ($page - 1) * $list_cnt;
	
			// 이전버튼 설정
			$prev_page = $page - 1;
			if($prev_page === 0)
			{
				$prev_page = 1;
			}
	
			// 다음버튼 설정
			$next_page = $page + 1;
			if($next_page > $max_page)
			{
				$next_page = $max_page;
			}
	
			// 현재 블럭 지정
			$now_block = ceil($page / $block);
	
			// 블럭의 시작 지점
			$block_start = ($now_block-1) * $block + 1;
	
			// 블럭의 마지막 지점
			$block_end = $block_start + $block - 1;
	
			// 한 페이지당 블럭 개수 제한
			if($block_end > $max_page) {
				$block_end = $max_page;
			}
	
			// ------------------------------------------------------------------------
			// 게시글 조회
			// ------------------------------------------------------------------------
			$arr_param = 
			[
				"list_cnt" => $list_cnt
				,"offset" => $offset
			];
	
			if (!empty($search_term)) {
				$arr_param["search"] = $search_term;
			}
			// 게시글 리스트 조회
			$result = select_boards_paging($conn, $arr_param);

			if(empty($result)) {
				$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "검색");
			}

			if(count($arr_err_msg) >= 1) {
				// throw new Exception(implode("<br>", $arr_err_msg));
			}


			if($result === false)
			{
				throw new Exception("DB Error : SELECT boards");
			}

		} else {

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
		<title>리스트 페이지</title>
	</head>
	<body>
		<div class="background">
			<?php require_once(ROOT."header.php"); ?>
			<a class="list-insert-btn icon-2" href="/assignment/src/insert.php/?user=<?php echo $user; ?>"></a>
			<div class="container">
				<div class="list-main">
					<div class="list-content <?php if($user == 1) { ?> list-content-1<?php } else if($user == 2) { ?> list-content-2 <?php } else if($user == 3) {?> list-content-3 <?php } else if($user == 4) { ?> list-content-4 <?php } ?> ">
						<table>
							<colgroup>
								<col width="15%" />
								<col width="10%" />
								<col width="45%" />
								<col width="20%" />
								<col width="10%" />
							</colgroup>
							<tr>
								<th>유저</th>
								<th>번호</th>
								<th>제목</th>
								<th>날짜</th>
								<th>조회수</th>
							</tr>
							<?php foreach($result as $item) { ?>
							<tr class="list-content-btn" onclick="location.href='/assignment/src/detail.php/?id=<?php echo $item["list_id"]; ?>&page=<?php echo $page; ?>&user=<?php echo $user;?>'">
								<td><?php echo $item["user_name"]?></td>
								<td><?php echo $item["list_id"]?></td>
								<td><?php echo $item["title"]?></td>
								<td><?php echo $item["date_val"]?></td>
								<td><?php echo $item["views"]?></td>
							</tr>
							<?php } ?>
						</table>
						<?php if(count($arr_err_msg)>=1) { ?> <div class="arr_err_msg"><?php echo implode("<br>", $arr_err_msg); ?></div><?php }?>
						<div class="list-content-num-btn <?php if($user == 1) { ?> background-color-1 <?php } else if($user == 2) { ?> background-color-2 <?php } else if($user == 3) {?> background-color-3 <?php } else if($user == 4) { ?> background-color-4 <?php } ?>">
							<a href="/assignment/src/list.php/?page=<? echo $prev_page; ?>&user=<?php echo $user;?>"><</a>
							<?php 
								for($page_link = $block_start; $page_link <= $block_end; $page_link++) {
								if($page_link == $page) { ?>
								<a class="page-on" href="/assignment/src/list.php/?page=<?php echo $page_link; ?>&user=<?php echo $user;?>"><?php echo $page_link; ?></a>
							<?php } 
								else {
							?>
								<a href="/assignment/src/list.php/?page=<?php echo $page_link; ?>&user=<?php echo $user;?>&search=<?php echo $search;?>"><?php echo $page_link; ?></a>
							<?php
									}
								}
							?>
							<a href="/assignment/src/list.php/?page=<? echo $next_page; ?>&user=<?php echo $user;?>">></a>
						</div>
					</div>
				</div>
			</div>

			<div class="footer">
				<div class="music-icon"></div>
				<div class="music-lyrics">노래 가사 들어감</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>