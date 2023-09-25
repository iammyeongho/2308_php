<?php

	/*
	$list_cnt = 5 : 한 페이지 최대 표시 수
	$page_num = 1 : 페이지 번호 초기화
	$bolck_num = 5 : 한 블럭 당 페이지 수
	$boards_cnt : 총 페이지 카운트
	$max_page_num : 최대 페이지 수
	$page_num : get로 넘어온 페이지 넘버
	$offset : 페이지당 게시굴 수 제한
	$prev_page_num : 이전 버튼
	$next_page_num : 다음 버튼
	$now_block : 현재 블럭
	*/


	// SERVER 웹서버와 관련된 모든 정보가 담겨있는 슈퍼 글로벌 변수에서 키가 ROOT인 애를 데리고옴
	// C:\Apache24\htdocs의 ROOT정보를 가지고옴
	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");
	$conn = null;
	
	$list_cnt = 5; // 한 페이지 최대 표시 수
	$page_num = 1; // 페이지 번호 초기화
	$block_num = 10; // 한 블럭 당 페이지 수

	try {
		// DB 접속
		if(!my_db_conn($conn))
		{
			//강제 예외 발생 : DB Instance
			throw new Exception("DB Error : PDO Instance");
		}

		// 페이징 처리
		// 총 게시글 수 검색
		$boards_cnt = my_db_select_boards_cnt($conn);
		if($boards_cnt === false)
		{
			throw new Exception("DB Error : SELECT Count");
		}

		//최대 페이지 수 :ex) 전체데이터(19개) / 페이지당 데이터 개수(5) = 3.8 | 5/5/5/4 이런식으로 페이지가 구성됨 -> 총 4개의 페이지가 필요
		$max_page_num = ceil($boards_cnt / $list_cnt);

		// if(isset($_GET["page"]))
		// {
		// 	//유저가 보내온 페이지 세팅
		// 	$page_num = $_GET["page"]; // 페이지가 GET로 넘어올 때 PAGE_NUM에 할당
		// 	// else {
		// 	// 	$page_num = 1; // 넘어온 페이지가 없으면 1로 설정
		// 	// }
		// }
		$page_num = isset($_GET["page"]) ? $_GET["page"] : 1;

		// 오프셋 계산
		$offset = ($page_num - 1) * $list_cnt;
		
		// 이전버튼 설정
		$prev_page_num = $page_num - 1;
		if($prev_page_num === 0)
		{
			$prev_page_num = 1;
		}

		// 다음버튼 설정
		$next_page_num = $page_num + 1;
		if($next_page_num > $max_page_num)
		{
			$next_page_num = $max_page_num;
		}

		// 현재 블럭 지정
		$now_block = ceil($page_num / $block_num);

		// 블럭의 시작 지점
		$block_start = ($now_block-1) * $block_num + 1;

		// 블럭의 마지막 지점
		$block_end = $block_start + $block_num - 1;

		// 한 페이지당 블럭 개수 제한
		if($block_end > $max_page_num) {
			$block_end = $max_page_num;
		}
		
		// DB 조회시 사용할 데이터 배열
		$arr_param = 
		[
			"list_cnt" => $list_cnt
			,"offset" => $offset
		];

		// 게시글 리스트 조회
		$result = my_db_select_boards_paging($conn, $arr_param);
		if(!$result)
		{
			throw new Exception("DB Error : SELECT boards");
		}
	}

	catch(Exception $e) {
		echo $e->getMessage(); // 예외발생 메세지 출력
		exit; // 처리 종료
	}

	finally {
		my_db_destroy_conn($conn); // DB 파기
	}
?>


<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/mini_board/src/css/common.css">
		<title>리스트 페이지</title>
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
			<table>
				<colgroup>
					<col width="15%" />
					<col width="50%" />
					<col width="35%" />
				</colgroup>
				
				<tr class="table-title">
					<th>번호</th>
					<th>제목</th>
					<th>작성일자</th>
				</tr>
				<?php
					// 리스트를 생성
					foreach($result as $item) {
				?>
						<tr class="colored">
							<td><?php echo $item["id"]; ?></td>
							<td class="th-title">
								<a class="table-tr-td-a" href="/mini_board/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>"><?php echo $item["title"]; ?></a>
							</td>
							<td><?php echo $item["creat_at"]; ?></td>
						</tr>
				<?php	
					} 
				?>
			</table>	
			
			<section>
				<a class="page-btn" href="/mini_board/src/list.php/?page=<? echo 1; ?>"><<</a>
				<a class="page-btn" href="/mini_board/src/list.php/?page=<? echo $prev_page_num; ?>"><</a>
				<?php
					for($page_link = $block_start; $page_link <= $block_end; $page_link++) {
						if($page_link == $page_num) {
				?> 
						<a class="page-on page-btn" href="/mini_board/src/list.php/?page=<?php echo $page_link; ?>"><?php echo $page_link; ?></a>
					<?php } 
					else {
				?>
						<a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $page_link; ?>"><?php echo $page_link; ?></a>
				<?php
						}
					}
				?>
				<a class="page-btn" href="/mini_board/src/list.php/?page=<? echo $next_page_num; ?>">></a>
				<a class="page-btn" href="/mini_board/src/list.php/?page=<? echo $max_page_num ?>">>></a>
			</section>
		</main>
		<div class="insert-box"><a class="insert-btn" href="/mini_board/src/insert.php">글 작성</a></div>
	</body>
</html>