// random() : 1이상 1미만의 랜덤한 수를 반환
	// 올림
	Math.ceil((Math.random() * 10));

	// 루프돌려서 오류가 있는지 확인
	console.log('루프 on')
	for(let i = 0; i < 1000000; i++) {
		let ran = Math.ceil((Math.random() * 10));
		if( ran < 1 || ran > 10) {
			console.log('오류');
		}
	}
	console.log('루프 off')

	// 버림
	Math.floor(3.5);

	// min(), max() : 파라미터 중 가장 작은 값, 가장 큰 값을 리턴
	let arr = [1, 2, 3];
	Math.min(1,2,3);
	Math.max(1,2,3);
	Math.min(...arr);
	Math.max(...arr);