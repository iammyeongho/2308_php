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
		<link rel="stylesheet" href="/mini_test/src/css/style.css">
		<title>Document</title>
	</head>

	<body>
		<main>
			<div class="side">
				<div class="side-top">
					<a href="">New Jeans</a>
				</div>

				<div class="side-search">
					<table>
						<label for="search"><img src="/mini_test/src/css/icon/search.png" alt=""></label>
						<input type="text" name="search" id="search">
					</table>
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
					<div class="content-grid">
						<span class="content-top-grid-1">번호</span>
						<span class="content-top-grid-2">제목</span>
						<span class="content-top-grid-3">작성자</span>
						<span class="content-top-grid-4">작성일자</span>
					</div>
				</div>
				

				<div class="content-mid">
						<div class="content-grid">
							<span class="content-top-grid-span">번호</span>
							<span class="content-top-grid-span">제목</span>
							<span class="content-top-grid-span">작성자</span>
							<span class="content-top-grid-span">작성일자</span>
						</div>
						<div class="content-grid">
							<span class="content-top-grid-span">번호</span>
							<span class="content-top-grid-span">제목</span>
							<span class="content-top-grid-span">작성자</span>
							<span class="content-top-grid-span">작성일자</span>
						</div>
						<div class="content-grid">
							<span class="content-top-grid-span">번호</span>
							<span class="content-top-grid-span">제목</span>
							<span class="content-top-grid-span">작성자</span>
							<span class="content-top-grid-span">작성일자</span>
						</div>
						<div class="content-grid">
							<span class="content-top-grid-span">번호</span>
							<span class="content-top-grid-span">제목</span>
							<span class="content-top-grid-span">작성자</span>
							<span class="content-top-grid-span">작성일자</span>
						</div>
						<div class="content-grid">
							<span class="content-top-grid-span">번호</span>
							<span class="content-top-grid-span">제목</span>
							<span class="content-top-grid-span">작성자</span>
							<span class="content-top-grid-span">작성일자</span>
						</div>
						<div class="content-grid">
							<span class="content-top-grid-span">번호</span>
							<span class="content-top-grid-span">제목</span>
							<span class="content-top-grid-span">작성자</span>
							<span class="content-top-grid-span">작성일자</span>
						</div>
						<div class="content-grid">
							<span class="content-top-grid-span">번호</span>
							<span class="content-top-grid-span">제목</span>
							<span class="content-top-grid-span">작성자</span>
							<span class="content-top-grid-span">작성일자</span>
						</div>
						<div class="content-grid">
							<span class="content-top-grid-span">번호</span>
							<span class="content-top-grid-span">제목</span>
							<span class="content-top-grid-span">작성자</span>
							<span class="content-top-grid-span">작성일자</span>
						</div>
		
				</div>

				<div class="content-btm">
					<a href="#"><</a>
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
					<a href="#">5</a>
					<a href="#">6</a>
					<a href="#">7</a>
					<a href="#">8</a>
					<a href="#">9</a>
					<a href="#">10</a>
					<a href="#">></a>
				</div>
			</section>
		</main>
	</body>
</html>