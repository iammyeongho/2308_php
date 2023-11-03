<?php

	// 유저 -> 인덱스 -> 라우터 -> 컨트롤러 -> 모델 -> 컨트롤러 -> 뷰 -> 유저

	require_once("config.php"); // 설정 파일 로드
	require_once("autoload.php"); // 오토 로드 파일 로드

	// 라우터 호출
	new router\Router();