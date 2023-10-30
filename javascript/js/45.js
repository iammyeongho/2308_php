// 1. promise 객체
// - 비동기 프로그래밍의 근간이 되는 기법 중 하나
// - 프로미스를 사용하면 콜백 함수를 대체하고, 비동기 작업의 흐름을 쉽게 제어 가능
// - promise 객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체

// 2.promise 사용법

const PROMISE1 = new Promise( function(resolve, reject) {
	let flg = true;
	if(flg) {
		return resolve('성공'); //요청 성공 시 resolve() 호출
	} else {
		return reject('실패'); //요청 실패 시 reject() 호출
	}
});

PROMISE1
.then(data => console.log(data)) // 위에서 성공 시 data에 들어감
.catch(err => console.log(err)) // 위에서 실패 시 err에 들어감
.finally(() => console.log('finally 입니다.'))


const PRO2 = function(str, ms) {
	return new Promise( function(resolve) {
		setTimeout(() =>{
			console.log(str);
			resolve();
		}, ms);
	});
}

PRO2('A',1000)
.then( () => PRO2('B', 2000))
.then( () => PRO2('C', 1000));

function PRO3() {
	return new Promise( function(resolve, reject) {
		let flg = true;
		if(flg) {
			return resolve('성공'); //요청 성공 시 resolve() 호출
		} else {
			return reject('실패'); //요청 실패 시 reject() 호출
		}
	});
}
