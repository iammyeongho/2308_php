<?php

	// function = 익명함수 X, 클로저 객체(클래스)
	spl_autoload_register( function($path) {
		$path = str_replace("\\", "/", $path); //우리가 보낸 require_once 값이 객체로 들어올 떄 \로 오기 때문에 /로 바꾸기 위함
		
		require_once($path._EXTENSION_PHP);
	});
