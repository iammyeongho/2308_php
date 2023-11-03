<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>자유 게시판</title>
</head>
<body>
	<?php require_once("view/inc/header.php"); ?>
	<div class="text-center mt-4">
		<h1>자유게시판</h1>
		<button class="btn" data-bs-toggle="modal" data-bs-target="#modalInsert">
			<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
				<path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
			</svg>
		</button>
	</div>

	<!-- <div id="modal" class="displayNone">
		<div id="modalW"></div>
		<button id="btnModalClose">닫기</button>
	</div> -->
	
	<main class="mt-4">
		<div class="card">
			<img src="/view/img/237795_289308_367.jpg" class="card-img-top h-50" alt="...">
			<div class="card-body">
				<h5 class="card-title">라멘 짱구</h5>
				<p class="card-text">《짱구는 못말려 극장판: 아뵤! 쿵후 보이즈 ~라면대란~》은 일본에서 2018년 4월 13일에 개봉한 짱구는 못말려의 애니메이션 영화 시리즈의 제 26부작이다. 대한민국에서는 2018년 12월 19일에 개봉했다. </p>
				<button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/3923e9c2864f44be9000dc1b3b8b7299.jpeg" class="card-img-top h-50" alt="...">
			<div class="card-body">
				<h5 class="card-title">흰둥이 짱구</h5>
				<p class="card-text">본 작품은 나의 여름방학 시리즈에 포함되는 작품은 아니나, 동일한 제작사인 밀레니엄 키친[7] 및 중요 제작자인 '아야카베 카즈'와 중심 스텝이 개발에 참여하는 만큼 정신적 후속작에 가까운 위치의 작품이다.</p>
				<button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/80242953-짱구는_못말려_극장판__폭풍수면!_꿈꾸는_세계_대돌격.jpeg" class="card-img-top h-50" alt="...">
			<div class="card-body">
				<h5 class="card-title">화가 짱구</h5>
				<p class="card-text">뭔지 모르겠음</p>
				<button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/background.png" class="card-img-top h-50" alt="...">
			<div class="card-body">
				<h5 class="card-title">크레용 짱구</h5>
				<p class="card-text">크레용 신짱 극장판 시리즈의 28번째 작품이다. 일본에서는 2020년 4월 24일에 개봉할 예정이었으나 코로나19로 연기되었다가 9월 15일로 확정되었다.</p>
				<button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
		<div class="card">
			<img src="/view/img/h3T-4SqU48UsemeLAvkedw.jpg" class="card-img-top h-50" alt="...">
			<div class="card-body">
				<h5 class="card-title">달리는 짱구</h5>
				<p class="card-text">코피 흘리면서 달림</p>
				<button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button>
			</div>
		</div>
	</main>
	
  <!-- 상세 모달 -->
  <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
	  <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">짱구입니다.</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<span>살려주세요</span>
			<img src="./img/80242953-짱구는_못말려_극장판__폭풍수면!_꿈꾸는_세계_대돌격.jpeg" class="card-img-top" alt="">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
		</div>
	  </div>
	</div>
  </div>
	
	<!-- 작성 모달 -->
	<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<form action="">
					<div class="modal-header">
						<input type="text" class="form-control" placeholder="제목을 입력하세요.">
					</div>

					<div class="modal-body">
						<textarea class="form-control" cols="30" rows="20" placeholder="내용을 입력하세요."></textarea>
					</div>

					<div class="modal-body mb-3">
						<input class="form-control" type="file" id="formFile" accept="image/*">
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
						<button type="button" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footercl class="fixed-bottom bg-dark text-light text-center p-3">저작권</footercl>
	<script src="/view/js/common.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>