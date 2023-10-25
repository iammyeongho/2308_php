
	// 원본은 보존하면서 오름차순 정렬 해주세요
	const ARR_SORT = [ 6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];

	let arr_sort2 = Array.from(ARR_SORT).sort((a,b) => a-b);

	// arr_sort2.sort((a,b) => a-b);

	// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어주세요
	const ARR2 = [5,7,3,4,5,1,2];

	// let arr1 = ARR2.filter( num => num % 2 !== 0);
	// let arr3 = ARR2.filter( num => num % 2 === 1);

	// let arr2 = ARR2.filter( num => num % 2 === 0);


	// 해당 부분을 함수로 만드시오 함수는 하나로 값은 경우에 따라 두 개로 리턴은 하나로
	function fnc_arr(arr) {
		even = arr.filter(num => num % 2 !== 0);
		odd = arr.filter(num => num % 2 === 0);
		return arr[evev,odd];
	}

	function fnc_arr2(arr, flg) {
		if (flg === 0) {
			return arr.filter( num => num % 2 === 0);
		} else {
			return arr.filter( num => num % 2 === 1);
		}
	}
	// 다음 문자열에서 구분문자를 '.'에서 '' 으로 변경해주세요
	const STR1 ='php504.meer.kat';
 
	// 3가지 방법 
	let str = STR1.replaceAll('.', ' ');

	STR1.split('.');
	STR1.split('.'),join(' ');

	STR1.repeat(/\./g, ' ');