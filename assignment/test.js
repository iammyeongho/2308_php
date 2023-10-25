const lyrics = "천방지축 어리둥절 빙글빙글 돌아가는 짱구의 하루 우리의 짱구는 정말 못말려 짱구야 짖굳은 장난은 나에게 맡기세요 이 세상 누구보다 자신이 있다구요 이리 모여 모두 모여 양파를 먹어보렴 그런 눈으로 바라보면 부끄럽죠 엄마 아빠 나는 인기만점 짱구야 천방지축 어리둥절 빙글빙글 모두가 정신이 없네 짱구는 대단하네 짱구는 천재라네 다음엔 무엇을 할까 ";

const textElement = document.getElementById("lyrics");
let currentIndex = 0;

function displayLyrics() {
  textElement.textContent = lyrics.substring(currentIndex) + lyrics.substring(0, currentIndex);
  currentIndex = (currentIndex + 1) % lyrics.length;
}

setInterval(displayLyrics, 1000);