<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/common.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title><?php echo $this->titleBoardName; ?></title>
</head>
<body>
	<?php require_once("view/inc/header.php"); ?>
	<div class="text-center mt-4">
		<h1><?php echo $this->titleBoardName; ?></h1>
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
		<?php
			foreach($this->arrBoardInfo as $item) {
		?>
		<div class="card" id="card<?php echo $item["id"]; ?>">
			<img src="<?php echo isset($item["b_img"]) ? "/"._PATH_USERIMG.$item["b_img"] : "";?>" class="card-img-top h-50" alt="이미지없음">
			<div class="card-body">
				<h5 class="card-title"><?php echo $item["b_title"];?></h5>
				<p class="card-text"><?php echo mb_substr($item["b_content"],0,10)."...";?> </p>
				<button class="btn btn-dark" onclick="openDetail(<?php echo $item['id']; ?>); 
				return false;">상세</button>
				<!-- <button id="btnDetail" class="btn btn-dark"data-bs-toggle="modal" data-bs-target="#modalDetail">상세</button> -->
			</div>
		</div>
		<?php 
			}
		?>
	</main>
	
  <!-- 상세 모달 -->
  <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
	  <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="b_title"></h5>
			<button type="button" onclick="closeDetailModal(); return false;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<span>작성 일자 :</span>
			<span id="created_at"></span>
			<br>
			<span>수정 일자 :</span>
			<span id="updated_at"></span>
			<img id="b_img" src="" class="card-img-top" alt="">
			<span id="b_content"></span>
		</div>
		<div class="modal-footer">
			<!-- <a id="modalPk" class="btn btn-secondary me-auto p-2 bd-highlight">삭제</a> -->
			<input id="del_id" type="hidden" value="">
			<button type="button" id="btn_del" onclick="deleteCard(); return false;" class="btn btn-secondary me-auto p-2 bd-highlight d-none">삭제</button>
			<button type="button" class="btn btn-secondary">수정</button>
			<button type="button" onclick="closeDetailModal(); return false;" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
		</div>
	  </div>
	</div>
  </div>
	
	<!-- 작성 모달 -->
	<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<form action="/board/add" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="b_type" value="<?php echo $this->boardType; ?>">
					<div class="modal-header">
						<input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요.">
					</div>

					<div class="modal-body">
						<textarea name="b_content" class="form-control" cols="30" rows="20" placeholder="내용을 입력하세요."></textarea>
					</div>

					<div class="modal-body mb-3">
						<input name="b_img" class="form-control" type="file" id="formFile" accept="image/*">
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
						<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footercl class="fixed-bottom bg-dark text-light text-center p-3">저작권</footercl>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="/view/js/common.js"></script>
</body>
</html>