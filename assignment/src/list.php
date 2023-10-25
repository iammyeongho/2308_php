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
			// ------------------------------------------------------------------------
			// 페이징 처리
			// ------------------------------------------------------------------------
			$boards_cnt = select_boards_cnt($conn);
			if($boards_cnt === false)
			{
				throw new Exception("DB Error : SELECT Count");
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
			
	
			// 게시글 리스트 조회
			$result = select_boards_paging($conn, $arr_param);
			if(!$result)
			{
				throw new Exception("DB Error : SELECT boards");
			}

		}
		else {
			
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
			<div class="header">
				<div class="user-icon" onclick="location.href='/assignment/src/user.php'"></div>
				<a class="header-a" href="/assignment/src/list.php">짱구는 못말려</a>
				<div class="search-icon"></div>
			</div>

			<div class="list-main">
				<div class="list-content">
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
						<tr class="list-content-btn" onclick="location.href='/assignment/src/detail.php/?id=<?php echo $item["list_id"]; ?>&page=<?php echo $page; ?>'">
							<td><?php echo $item["user_name"]?></td>
							<td><?php echo $item["list_id"]?></td>
							<td><?php echo $item["title"]?></td>
							<td><?php echo $item["date_val"]?></td>
							<td><?php echo $item["views"]?></td>
						</tr>
						<?php } ?>
					</table>
					<div class="list-content-num-btn">
						<a href="/assignment/src/list.php/?page=<? echo $prev_page; ?>"><</a>
						<?php 
							for($page_link = $block_start; $page_link <= $block_end; $page_link++) {
							if($page_link == $page) {?>
							<a class="page-on" href="/assignment/src/list.php/?page=<?php echo $page_link; ?>"><?php echo $page_link; ?></a>
						<?php } 
							else {
						?>
							<a href="/assignment/src/list.php/?page=<?php echo $page_link; ?>"><?php echo $page_link; ?></a>
						<?php
								}
							}
						?>
						<a href="/assignment/src/list.php/?page=<? echo $next_page; ?>">></a>
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