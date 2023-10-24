// ---------------
// 기본 데이터 타입
// ---------------
// typeof를 콘솔에 쓰면 타입 확인 가능

// 숫자(number)
	let num = 1;

// 문자열(string)
	let str = "string"

// 불리언(boolean)
	let boo = true;

// null
	let nu = null;

// nudefined
	let und;

// symbol : 고유한 ID를 가진 데이터 타입
	let symbol_1 = Symbol("symbol");
	let symbol_2 = Symbol("symbol");


// 객체 타입
// Object
let obj = {
	food1: "탕수육"
	,food2: "짜장면"
	,food3: "라조기"
	,eat: function() {
		console.log("먹자");
	}
	,list: {
		list1: "리스트1"
		,list2: "리스트2"
	}
};

let user = {
	name: "정명호"
	,age: "28"
	,gender: "남성"
	,birth_date: "1996-01-06"
	,address: "대구광역시 중구 공평로 105 노마즈하우스 1528호"
	,hobby: "독서, 음악 감상, 술"
	,girl_friend: "젤다의 전설 : 링크"
}

// Array : 콘솔에 arr.length 치면 배열 길이 알 수 있음
let arr = [1,2,3];
// Date
// Math
// 그 외 기본 데이터 타입을 제외한 모든 것