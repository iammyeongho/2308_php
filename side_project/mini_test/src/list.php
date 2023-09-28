<?php 

	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");
	$conn = null;


	try {
		if(!db_conn($conn))
		{
			//강제 예외 발생 : DB Instance
			throw new Exception("DB Error : PDO Instance");
		}

		$boards_cnt = db_select_boards_cnt($conn);

		if($boards_cnt === false)
		{
			throw new Exception("DB Error : SELECT Count");
		}

		$list_cnt = 8;
		$page = 1; // 페이지 번호 초기화
		$block = 10; // 한 블럭 당 페이지 수

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

		// DB 조회시 사용할 데이터 배열
		$arr_param = 
		[
			"list_cnt" => $list_cnt
			,"offset" => $offset
		];
		

		// 게시글 리스트 조회
		$result = db_select_boards_paging($conn, $arr_param);
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
		db_destroy_conn($conn); // DB 파기
	}


?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/mini_test/src/css/style.css">
		<title>리스트 페이지</title>
	</head>

	<body>
		<main>
			<div class="side">
				<div class="side-top">
					<a href="">New Jeans</a>
				</div>

				<div class="side-search">
					<form action="/mini_test/src/list.php" method="get">
						<table>
							<button class="side-search-btm"><img src="/mini_test/src/css/icon/search.png" alt=""></button>
							<input class="side-search-input" type="text" name="search" id="search" required="required">
						</table>
					</form>
				</div>

				<div class="side-calendar">
					<img src="./img/calendar.png" alt="">
				</div>

				<div class="side-content">
					<ul class="slides">
						<input type="radio" name="radio-btn" id="img-1" checked />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans1.jpg" />
							</div>
						<div class="nav">
							<label for="img-5" class="prev">&#x2039;</label>
							<label for="img-2" class="next">&#x203a;</label>
						</div>
						</li>
					
						<input type="radio" name="radio-btn" id="img-2" />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans2.jpg" />
							</div>
						<div class="nav">
							<label for="img-1" class="prev">&#x2039;</label>
							<label for="img-3" class="next">&#x203a;</label>
						</div>
						</li>
					
						<input type="radio" name="radio-btn" id="img-3" />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans3.jpg" />
							</div>
						<div class="nav">
							<label for="img-2" class="prev">&#x2039;</label>
							<label for="img-4" class="next">&#x203a;</label>
						</div>
						</li>
					
						<input type="radio" name="radio-btn" id="img-4" />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans4.jpg" />
							</div>
						<div class="nav">
							<label for="img-3" class="prev">&#x2039;</label>
							<label for="img-5" class="next">&#x203a;</label>
						</div>
						</li>
					
						<input type="radio" name="radio-btn" id="img-5" />
						<li class="slide-container">
							<div class="slide">
								<img src="/mini_test/src/css/new/newjeans5.jpg" />
							</div>
						<div class="nav">
							<label for="img-4" class="prev">&#x2039;</label>
							<label for="img-1" class="next">&#x203a;</label>
						</div>
						</li>
					
					
						<li class="nav-dots">
							<label for="img-1" class="nav-dot" id="img-dot-1"></label>
							<label for="img-2" class="nav-dot" id="img-dot-2"></label>
							<label for="img-3" class="nav-dot" id="img-dot-3"></label>
							<label for="img-4" class="nav-dot" id="img-dot-4"></label>
							<label for="img-5" class="nav-dot" id="img-dot-5"></label>
						</li>
					</ul>
				</div>
			</div>

			<section>
				<div class="content-top">
					<table class="content-table">
						<colgroup>
							<col width="10%" />
							<col width="40%" />
							<col width="15%" />
							<col width="15%" />
						</colgroup>
						<tr>
							<th class="content-top-grid-1">번호</th>
							<th class="content-top-grid-2">제목</th>
							<th class="content-top-grid-3">작성자</th>
							<th class="content-top-grid-4">작성일자</th>
						</tr>
					</table>
				</div>
				

				<div class="content-mid">
					<table class="content-table">
						<colgroup>
							<col width="10%" />
							<col width="40%" />
							<col width="15%" />
							<col width="15%" />
						</colgroup>
						<?php
							// 리스트를 생성
							foreach($result as $item) {
						?>
							<tr class="content-top-tr">
								<td class="content-top-td"><?php echo $item["id"]; ?></td>
								<td class="content-top-td">
									<a href="/mini_test/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page; ?>"><?php echo $item["title"]; ?></a>
								</td>
								<td class="content-top-td"><?php echo $item["writet"]; ?></td>
								<td class="content-top-td"><?php echo $item["date"]; ?></td>
							</tr>
						<?php	
							} 
						?>
					</table>
				</div>

				<div class="content-btm">
					<a  href="/mini_test/src/list.php/?page=<? echo $prev_page; ?>"><</a>
					<?php
						for($page_link = $block_start; $page_link <= $block_end; $page_link++) {
							if($page_link == $page) {
					?> 
							<a class="page-on" href="/mini_test/src/list.php/?page=<?php echo $page_link; ?>"><?php echo $page_link; ?></a>
						<?php } 
						else {
					?>
							<a href="/mini_test/src/list.php/?page=<?php echo $page_link; ?>"><?php echo $page_link; ?></a>
					<?php
							}
						}
					?>
					<a href="/mini_test/src/list.php/?page=<? echo $next_page; ?>">></a>
				</div>
			</section>
		</main>
	</body>
</html>