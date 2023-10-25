// 클래스 아님
// Date : 오늘 date
let now = new Date();
let sDate = new Date('2023-09-30 19:20:10');

// getFullYear() : 연도만 가져오는 메소드
let year = now.getFullYear()
console.log(now.getFullYear());

// getMonth() : 월만 가져오는 메소드 (+1을 해줘야 현재 월과 같음)
let month = now.getMonth()
console.log(now.getMonth()+1);

// getDate() : 일만 가져오는 메소드 (+1을 해줘야 현재 월과 같음)
let date = now.getDate()
console.log(now.getDate());

// getDay() : 요일을 가져오는 메소드 (0 : 일요일, ~ 6 : 토요일)
console.log(now.getDay());
let day = now.getDate();
let kDay = '';
switch (day) {
	case 0:
		kDay = '일요일';
		break;
	case 1:
		kDay = '월요일';
		break;
	case 2:
		kDay = '화요일';
		break;
	case 3:
		kDay = '수요일';
		break;
	case 4:
		kDay = '목요일';
		break;
	case 5:
		kDay = '금요일';
		break;
	case 6:
		kDay = '토요일';
		break;
}
console.log(now.getDay() + ':' + kDay);

// getHours() : 시를 가져오는 메소드
console.log(now.getHours());

// getMinutes() : 분를 가져오는 메소드
console.log(now.getMinutes());

// getSeconds() : 초를 가져오는 메소드
console.log(now.getSeconds());

// getMilliseconds() : 밀리초를 가져오는 메소드
console.log(now.getMilliseconds());

// getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초 단위로
console.log(now.getTime());

// 기준일 : 2023-09-30 19:20:10
// 오늘로부터 며칠 전인지 구하기
now = new Date();
sDate = new Date('2023-09-30 19:20:10');

// const getDateDiff = (d1, d2) => {
// 	let date1 = new Date(d1);
// 	let date2 = new Date(d2);

// 	let diffDate = date1.getTime() - date2.getTime();

// 	return Math.ceil(diffDate / (1000 * 60 * 60 * 24));
// }

let diffDate = now - sDate;
console.log(Math.ceil(diffDate / (1000 * 60 * 60 * 24)));
let now2 = new Date(year, month, date, 0, 0, 0, 0);

let diff = Math.abs(Math.floor((now2- sDate) / 86400000));