<?php 

	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");
	$conn = null;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/mini_test/src/css/style.css">
        <title>상세 페이지</title>
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
				</div>
				

				<div class="content-mid">
				</div>

				<div class="content-btm">
				</div>
			</section>
		</main>
    </body>
</html>