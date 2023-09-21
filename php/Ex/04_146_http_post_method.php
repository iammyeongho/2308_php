<?
	// POST Mathod
	print_r($_POST);


?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>POST</title>
</head>
<body>
	<form action="/04_146_http_post_method.php" method="post">
		<fieldset>
			<label for="id">ID :</label>
				<input
				type="text"
				name="id"
				id="id"
				placeholder="아이디 입력"
				required
				/>
				<br />

				<label for="pw">PW :</label>
				<input
				type="password"
				name="pw"
				id="pw"
				placeholder="패스워드 입력"
				required
				/>
				<br />

				<button type="submit">전송</button>
		</fieldset>
	</form>
</body>
</html>