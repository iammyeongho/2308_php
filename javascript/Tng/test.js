//  두 수를 받아서 더한 값을 리턴해주는 함수를 만들어 봅시다.

// function mySum (a,b) {
// 	return a+b;
// }

// // 콜백 함수
// function myCallBack(fnc) {
// 	fnc();
// }

// myCallBack(function() {
// 	console.log('123');
// });

// 함수를 3개 만들어주세요
// - php를 출력하는 함수
// - 504를 출력하는 함수
// - 풀스택을 출력하는 함수

// 1번 함수는 3초 뒤에 출력
// 2번 함수는 5초 뒤에 출력
// 3번 함수는 바로 출력

// function php_echo() {
// 	console.log('php');
// }
// setInterval(php_echo,3000);

// function php504_echo() {
// 	console.log('504');
// }
// setInterval(php504_echo,5000);

// function pull_echo() {
// 	console.log('풀스택');
// }
// pull_echo();


// 현재 시간 구해주세요.
// const DATE = new Date();
// DATE.toLocaleTimeString();


// let now_date = new Date();

// let year = now_date.getFullYear()
// let month = now_date.getMonth()+1;
// // let month_sum = month > 12 ? '0' + month : month;
// let date = now_date.getDate()

// let hours = ('0' + now_date.getHours()).slice(-2);
// let minutes = ('0' + now_date.getMinutes()).slice(-2);
// let seconds = ('0' + now_date.getSeconds()).slice(-2);
// // let hours = now_date.getHours();
// // let minutes = now_date.getMinutes();
// // let seconds = now_date.getSeconds();
// let calendar = year + '-' +  month + '-' + date + ' ' + hours + ':' + minutes + ':' + seconds;

// console.log(calendar);

// 버튼을 하나 만듭니다.
// 버튼을 클릭하면 네이버로 이동시켜주세요.

const NAVER = document.getElementById('naver_btn');
// NAVER.onclick = function() {
// 	location.href = 'http:\/\/www.naver.com'
// }

NAVER.addEventListener('click',  function() {
	location.href = 'http://www.naver.com'
})

