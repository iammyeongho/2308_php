function openErrorModal(errorMessage) {
    var modal = document.getElementById("errorModal");
    var errorMessageElement = document.getElementById("errorMessage");
    errorMessageElement.innerHTML = errorMessage;
    modal.style.display = "block";
}

  // 오류 모달 닫기
function closeErrorModal() {
    var modal = document.getElementById("errorModal");
    modal.style.display = "none";
}