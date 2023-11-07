// // 모달 열기 버튼 클릭 시 모달을 보이게 하기
// document.querySelector("#open-header-modal-btn").addEventListener("click", function() {
//     document.querySelector("#header-modal-id").style.display = "block";
// });

// // 모달 외부 클릭 시 모달을 숨기게 하기
// window.addEventListener("click", function(event) {
//     if (event.target == document.querySelector("#header-modal-id")) {
//         document.querySelector("#header-modal-id").style.display = "none";
//     }
// });

const lyrics = [
    "천방지축 어리둥절 빙글빙글 돌아가는 짱구의 하루"
    ,"우리의 짱구는 정말 못말려 짱구야~!"
    ,"짖굳은 장난은 나에게 맡기세요~"
    ,"이 세상 누구보다 자신이 있다구요"
    ,"이리 모여 모두 모여 양파를 먹어보렴"
    ,"그런 눈으로 바라보면 부끄럽죠"
    ,"엄마 아빠 나는 인기만점 짱구야~"
    ,"천방지축 어리둥절 빙글빙글 모두가 정신이 없네"
    ,"짱구는 대단하네 짱구는 천재라네~"
    ,"다음엔 무엇을 할까"
];

const lyricsLine = document.getElementById("lyrics-line");
let currentLine = 0;

function typeLyrics() {
    if (currentLine < lyrics.length) {
    const line = lyrics[currentLine];
    let index = 0;

    function typeNextChar() {
        if (index < line.length) {
        lyricsLine.textContent += line.charAt(index);
        index++;
          setTimeout(typeNextChar, 50); // 타이핑 속도
        } else {
          setTimeout(eraseLyrics, 1000); // 지우기 전 대기 시간
        }
    }

    typeNextChar();
    }
}

function eraseLyrics() {
    if (lyricsLine.textContent.length > 0) {
    lyricsLine.textContent = lyricsLine.textContent.slice(0, -1);
      setTimeout(eraseLyrics, 25); // 지우는 속도
    } else {
    currentLine++;
    if (currentLine >= lyrics.length) {
        currentLine = 0; // 가사 반복
    }
      setTimeout(typeLyrics, 500); // 타이핑 대기
    }
}

  typeLyrics(); // 타이핑 효과
