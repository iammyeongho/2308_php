// 1. 버튼을 클릭시 아래 내용의 알러트가 나옴
// 안녕하세요, 숨어있는 duv를 찾아보세요

// 2. 특정 영역에 마웃 ㅡ포인터가 진입하면 아래 내용의 알러트가 나옵니다. 들킨 상태에서는 알러트가 안나옵니다.
// 두근두근

// 3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 바뀝니다.
// 들켰다

// 4. 3번의 상태에서 다시 한번 더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 안보이게 됩니다
// 다시 숨는다

// const SUBURB = document.querySelector('#suburb');
// const INTERIOR = document.querySelector('#interior');
// let i = 0;

// SUBURB.addEventListener('mouseenter', divmous);
// function divmous() {
//     if (i === 0) {
//         alert('두근두근');
//     }
// }

// INTERIOR.addEventListener('click', divClick);
// function divClick() {
//     if (i === 0) {
//         alert('들켰다');
//         INTERIOR.style.backgroundColor = '#000000';
//         i = 1; // 들켰다 상태로 변경
//         INTERIOR.removeEventListener('click', divClick);
//         SUBURB.removeEventListener('mouseenter', divmous);
//         INTERIOR.addEventListener('click', divClick2);
//     }
// }

// function divClick2() {
//     alert('다시 숨는다');
//     INTERIOR.style.backgroundColor = '#ffffff';

//     var x = Math.floor(Math.random() * window.innerWidth);
//     var y = Math.floor(Math.random() * window.innerHeight);

//     // div의 위치 변경
//     SUBURB.style.left = x + 'px';
//     SUBURB.style.top = y + 'px';
    
//     i = 0; // 다시 숨는다 상태로 변경
// }

const SUBURB = document.querySelector('#suburb');
const INTERIOR = document.querySelector('#interior');
let i = true;
// let i_false = true;

SUBURB.addEventListener('mouseenter', divmous);

function divmous() {
    if (i) {
        alert('두근두근');
    }
}

INTERIOR.addEventListener('click', divClick);

function divClick() {
    if (i) {
        alert('들켰다');
        INTERIOR.style.backgroundColor = '#000000';
    } else {
        alert('다시 숨는다');
        INTERIOR.style.backgroundColor = '#ffffff';

        var x = Math.floor(Math.random() * window.innerWidth);
        var y = Math.floor(Math.random() * window.innerHeight);

        // INTERIOR 위치 변경
        SUBURB.style.left = x + 'px';
        SUBURB.style.top = y + 'px';
    }

    i = !i;
}