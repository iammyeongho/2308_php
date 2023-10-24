// ---------------
// 배열
// ---------------
	let arr = [1, 2, 3, 4, 5];

// push() 메소드 : 배열에 값을 추가
	arr.push(6);

// splice() : 배열의 요소를 삭제 또는 교체\
	// arr.splice(2, 2); //배열의 arr[2]에서부터 n개를 삭제
	// arr.splice(4,1)
	arr.splice(2,0,10); // [2]뒤에 10을 추가
	arr.splice(2,1,10); // [2]뒤에 1개를 10을 변경
	arr.splice(2,0,10,11,13,14); // 3번째 아규먼트부터는 가변파라미터로써 모든 값을 추가

// indexOf() : 배열에서 특정 요소를 찾는데 사용 
	arr.indexOf(4);

// lastIndexOf() : 배열에서 특정 요소 중 가장 마지막에 위치한 요소를 찾는데 사용 
	arr = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];