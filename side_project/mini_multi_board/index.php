<?php
	require_once("config.php"); // 설정 파일 로드
	require_once("autoload.php"); // 오토 로드 파일 로드

	// 라우터 호출
	new router\Router();