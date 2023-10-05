<?php
	define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
	define("FILE_HEADER", ROOT."header.php");
	require_once(ROOT."lib/lib_db.php");
	$conn = null;

	$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";
	

?>


<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/mini_board/src/css/common.css">
		<title>에러 페이지</title>
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
			<section class="error-box">
				<p>해당 페이지를 찾을 수 없습니다.</p>
				<p>이전 버튼을 눌러주시면 감사하겠습니다.</p>
				<p><?php echo $err_msg; ?></p>
				<a class="error-btn" href="">메인으로 이동</a>
			</section>
		</main>
	</body>
</html>