// console.log("ㅎㅇ");
// ---------------
// 변수 선언 (var, let, const)
// ---------------
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프

	// var i_name = "홍길동";

	// console.log(i_name);

	// // 재할당 var 없어도 됨

	// i_name = "갑순이";

	// console.log(i_name);

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프

	// let i_name = "홍길동";

	// console.log(i_name);

	// // 상단에 let를 사용하면 아래에 중복 선언 불가능 i_name = "홍길동" 처럼 재할당은 가능

	// let i_name = "갑순이";

	// console.log(i_name);

// const : 중복 선언 불가능, 재할당 불가능, 

	// const AGE = 19;
	// console.log(AGE);


// ---------------
// 스코프
// ---------------

// // 전역 스코프
// 	let gender = "M";

// 함수레벨 스코프 (함수 변수)
	// function test() {
	// 	let test1 = "test1";
	// 	console.log(test1);
	// }
	// // if 안에서만 구둥되는 let 펑션 안의 let와 if 안의 let는 다름 만약 if안의 test1에 let을 넣으면 적용 안됨, console가 밖에 있기 때문에 if는 호출 안함
	// function test() {
	// 	var test1 = "test1";
	// 	{
	// 		var test1 = "test2";
	// 	}
	// 	console.log(test1);
	// }

// 블록레벨 스코프 (지역 변수)
	// function test() {
	// 	let test1 = "test1";
	// 	if(true) {
	// 		let test1 = "test2";
	// 		test1 = "test3";
	// 		console.log(test1);
	// 	}
	// 	console.log(test1);
	// }

	// function test() {
	// 	let test1 = "test1";
	// 	{
	// 		let test1 = "test2";
	// 		test1 = "test3";
	// 		console.log(test1);
	// 	}
	// 	console.log(test1);
	// 	console.log(gender);
	// }
	// if 안에서만 구둥되는 let 펑션 안의 let와 if 안의 let는 다름 만약 if안의 test1에 let을 넣으면 적용 안됨, console가 밖에 있기 때문에 if는 호출 안함 | if없어 됨


// ---------------
// 호이스팅 (hoisting)
// ---------------
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// (인터프리터 : 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경)
// 코드가 실행되기 전에 변수와 함수를 최상단에 끌어 올려지는 것

	console.log(htest1());
	// 함수가 아래에 있어도 사용 가능

	console.log(hver);
	// 변수가 아래에 있기 때문에 hver을 할당하지만 undefined가 출력

	console.log(hlet);
	// 해당 변수는 에러가 뜸 | 호이스팅이 안되기 때문

	function htest1() {
		return "htest1 함수입니다.";
	}

	var hver = "var로 선언";
	// 해당 부분에서 출력
	console.log(hver);
	
	let hlet = "let으로 선언";
	// 상단에서 에러가 뜨기 때문에 출력 x
	console.log(hlet);