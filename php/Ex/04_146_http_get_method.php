<?
	// GET Method

	// url에 대한 구조 설명
	// 프로토콜 /  도메인    /         패스          /쿼리스트링 or 파라미터로 (page=2와 num=10이 연상배열로 옴)
	// http://www.naver.com/mini_board/src/list.php.page=2&num=10
	// 프로토콜 : 통신을 하기위한 규약, 약속, 규칙 (http:)
	// 도메인 : 우리가 접속하고자 하는 서버의 ip또는 별칭(www.naver.com)
	// 패스 : 실행 시키고자 하는 처리의 주소(mini_board/src/list.php)
	// 쿼리스트링(파라미터) : Get Method로 통신할 때 유저가 보내주는 데이터(page=2&num=10)
	// 쿼리스트릥 사용시 제일 앞 부분에 ? 를 붙여야함
	print_r($_GET);

?>