// 1. 현재 시간을 화면에 표시
// 2. 실시간으로 시간을 화면에 표시
// 3. 멈춰 버튼을 누르면, 시간이 정지
// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시

// const date = new Date();

// const hours = ('0' + date.getHours()).slice(-2);
// const minutes = ('0' + date.getMinutes()).slice(-2);
// const seconds = ('0' + date.getSeconds()).slice(-2);
// const timeStr = hours + ':' + minutes + ':' + seconds;

// Date.prototype.amPm = function() {
//     let h = this.getHours() < 12 ? "오전 " : "오후 ";
//     return h;
// }

// let today = new Date();
// let amPm = today.amPm();

// setInterval(() => {
// 	const H1 = document.createElement('h1');
// 	H1.innerHTML = '현재 시각'+amPm+timeStr;
// 	document.body.appendChild(H1);
// },1000)



// function date_new() {
// 	const DATE = new Date();
//     TIME.innerHTML = '현재 시각 '+DATE.toLocaleTimeString();
// }

// function date_new() {
// 	setInterval(() => {const DATE = new Date();
//     TIME.innerHTML = '현재 시각 '+DATE.toLocaleTimeString();
// 	},0);
// }



// let date_new = setInterval(() => { 
// 	const DATE = new Date();
//     TIME.innerHTML = '현재 시각 '+DATE.toLocaleTimeString();
// 	},0);

const TIME = document.getElementById('time');
let date_all = setInterval(date_new, 1000);

function date_new() {
	const DATE = new Date();
    TIME.innerHTML = '현재 시각 '+DATE.toLocaleTimeString();
};

const STOP = document.getElementById('stop');

STOP.addEventListener('click', () => clearInterval(date_all))

const ReStart = document.getElementById('re_start')
ReStart.addEventListener('click', () => date_all = setInterval(date_new, 100))
document.body.appendChild(ReStart)

