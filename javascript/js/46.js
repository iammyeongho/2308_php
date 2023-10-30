// 1. async & await 란?
// 비동기 처리를 좀 더 가독성 좋고 편하게 쓰기위해 promise를 사용했는데,
//  promise 또한 체이닝이 계속될 경우 코드가 난잡해 질 수 있어 async & await가 도입됨
// 	async & await는 prominse를 기반으로 동작

// const PRO2 = function(str, ms) {
// 	return new Promise( function(resolve) {
// 		setTimeout(() =>{
// 			console.log(str);
// 			resolve();
// 		}, ms);
// 	});
// }

// PRO2('A',1000)
// .then( () => PRO2('B', 2000))
// .then( () => PRO2('C', 1000));

// async function test() {
// 	await PRO2('A', 3000);
// 	await PRO2('B', 2000);
// 	await PRO2('C', 1000);
// }


// 병렬처리 하는 방법 : Promise.all() 이용 
const PRO3 = function(str, ms) {
	return new Promise( function(resolve) {
		setTimeout(() =>{
			resolve(str);
		}, ms);
	});
}
async function test2() {
	return Promise.all([PRO3('A',3000), PRO3('B',1000)])
		.then( () => ('처리완료'));
}

test2()
.then( data => {
	console.log(data);
	const NOW2 = new Date();
	console.log(NOW2 - NOW);
});

const NOW = new Date();