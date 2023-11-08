<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>회원가입 페이지</title>
</head>
<body class="vw-100 vh-100">

	<?php require_once("view/inc/header.php"); ?>
	<main class="d-flex justify-content-center align-items-center h-75">
		<form style="width: 500px;" action="/user/regist" method="POST">
			<div id="errorMsg" class="form-text text-danger">
				<?php echo count($this->arrErrorMsg) > 0 ? implode("<br>",$this->arrErrorMsg) : ""?>
			</div>
			<div class="mb-3">
				<label for="u_name" class="form-label">이름</label>
				<input type="text" class="form-control" id="u_name" name="u_name" maxlength="50">
			</div>
			<div class="mb-3">
				<label for="u_id" class="form-label">아이디</label>
				<input type="text" class="form-control" id="u_id" name="u_id" minlength="8" maxlength="20">
				<button type="button" onclick="idChk(); return false;" class="btn btn-dark">아이디 확인</button>
				<span id="idChkMsg" class="float-end"></span>
			</div>
			<div class="mb-3">
				<label for="u_pw" class="form-label">비밀번호</label>
				<input type="password" class="form-control" id="u_pw" name="u_pw" minlength="8" maxlength="20">
			<div class="mb-3">
				<label for="u_pw" class="form-label">비밀번호 확인</label>
				<input type="password" class="form-control" id="u_pw_chk" name="u_pw_chk" minlength="8" maxlength="20">
			</div>
			<a href="/user/login" class="btn btn-secondary">취소</a>
			<button type="submit" class="btn btn-dark float-end">가입</button>
		</form>
	</main>
	<footercl class="fixed-bottom bg-dark text-light text-center p-3">저작권</footercl>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>