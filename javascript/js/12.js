// ---------------
// 함수
// ---------------

// 함수 생성
// 함수 선언식 : 호이스팅의 영향을 받음
	function fnc_sum(a, b) {
		return a + b;
	}

// 함수 표현식 : 호이스팅의 영향을 안 받음
	let fnc1 = function(a, b) {
		return a + b; 
	}

// 로컬에서 fnc_sum() 또는 fnc1을 쓰면 함수 사용 가능

// 익명 함수 : 이름이 없는 함수
	// function () {
	// 	return 1;
	// }

// 콜백 함수 : 다시 호출되는 함수
	function fnc_callBack(call) {
		call();
	}

	fnc_callBack(function() {
		console.log('익명 함수');
	});

// 배열 객체의 sort의 콜백 함수 예시
	// sort_arr.sort( function(a,b) {
	// 	return a-b
	// });

	// function sort(call) {
	// 	let num = call();
	// 	if(num < 0) {
	// 		//처리
	// 	} else [
	// 		//처리
	// 	]
	// }

// Function 생성자 함수 잘 사용하지않음
	let tt = Function('a', 'b', 'return a+b;');

// 화살표 함수(Arrow Function)
// 파라미터가 없는 경우
	let f1 = function() {
		return "f1";
	}

	let f2 = () => "f2";

// 파라미터가 1개인 경우
	let f3 = function(a) {
		return a + '입니다.';
	}

	let f4 = a => a + '입니다.';

// 파라미터가 2개인 경우
	let f5 = function(a,b) {
		return a + b;
	}

	let f6 = (a,b) => a+b;

	let f7 = function(a,b) {
		if (a > b) {
			return 'a가 큼';
		} else {
			return 'b가 큼';
		}
	}

	let f8 = (a,b) => {
		if(a > b) {
			return 'a가 큼';
		} else {
			return 'b가 큼';
		}
	}