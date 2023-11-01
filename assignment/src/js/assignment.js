// 모달 열기 버튼 클릭 시 모달을 보이게 하기
document.querySelector("#open-header-modal-btn").addEventListener("click", function() {
    document.querySelector("#header-modal-id").style.display = "block";
});

// 모달 외부 클릭 시 모달을 숨기게 하기
window.addEventListener("click", function(event) {
    if (event.target == document.querySelector("#header-modal-id")) {
        document.querySelector("#header-modal-id").style.display = "none";
    }
});