<?php
	echo base64_encode('123456');
	echo base64_decode('MTIzNDU2');

	// $(document).ready(function() {
	// 	$("#deleteButton").click(function() {
	// 		var postId = 123; // 삭제할 게시물 ID를 여기에 설정
	
	// 		$.ajax({
	// 			type: "POST",
	// 			url: "deletePost.php", // 게시물 삭제를 처리하는 PHP 파일의 경로
	// 			data: { post_id: postId },
	// 			success: function(response) {
	// 				var result = JSON.parse(response);
	// 				if (result.success) {
	// 					// 성공적으로 삭제된 경우의 처리
	// 					alert("게시물이 성공적으로 삭제되었습니다.");
	// 				} else {
	// 					// 삭제 실패의 처리
	// 					alert("게시물 삭제에 실패했습니다.");
	// 				}
	// 			}
	// 		});
	// 	});
	// });

// 	<script>
// function deleteCard(cardId) {
//     $.ajax({
//         type: "POST",
//         url: "deleteCard.php", // 게시물 삭제를 처리하는 PHP 파일의 경로
//         data: { card_id: cardId },
//         success: function(response) {
//             if (response === "success") {
//                 // 성공적으로 삭제된 경우의 처리
//                 $("#card" + cardId).remove(); // 카드를 삭제
//             } else {
//                 // 삭제 실패의 처리
//                 alert("카드 삭제에 실패했습니다.");
//             }
//         }
//     });
// }
// </script>