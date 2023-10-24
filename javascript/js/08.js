// ---------------
// 조건문
// ---------------
	// if(조건) {

	// } else if (조건 2) {

	// } else {

	// }

	// let age = 30;
	// switch(age) {
	// 	case 20:
	// 		console.log("20대");
	// 		break;
	// 	case 30:
	// 		console.log("30대");
	// 		break;
	// 	default:
	// 		console.log("모름");
	// 		break;	
	// }

// ------------------------------------------------------------
// 반복문 ( while, do_while, for, foreach, for....in, for....of)
// ------------------------------------------------------------

	// //foreach
	// let arr = [1, 2, 3, 4];

	// // forEach 배열 객체에 있는 메소드, 배열만 사용가능
	// // 홑따옴표가 아니라 1번 옆 ` 이거임
	// // arr.forEach( function( val, key ){
	// // 	console.log(`${key} : ${val}`);
	// // } );

	// // for...in : 모든 객체를 루프 가능, key에만 접근 가능
	// let obj = {
	// 	key1: 'vall'
	// 	,key2: 'val2'
	// }

	// for( let key in obj ) {
	// 	console.log(key);
	// }

	// for( let key in obj ) {
	// 	console.log(obj[key]);
	// }

	// // for...of : 모든 iterable객체를 루프 가능, valye에만 접근 가능(String, Array, Map, Set, TypeArray ....) iterable 순서가 있는

	// for( let val of arr ) {
	// 	console.log(val);
	// }

	//정렬해주세요.
	
	let sort_arr = [3, 5, 2, 5, 7, 10];
	console.log(sort_arr.length);

	sort_arr.sort((a,b) => a-b);

	sort_arr.sort(function(a,b){return a-b});
	// a값과 b값을 빼서 음수면 유지 양수면 앞으로 이동한다

	console.log(sort_arr);

	for(let x = 0; x <= sort_arr.length - 1; x++) {
        for(let y = 0; y < sort_arr.length - 1 - x; y++) {
            if(sort_arr[y] > sort_arr[y + 1]) { 3 > 5
                let tmp = sort_arr[y];
                sort_arr[y] = sort_arr[y + 1];     
                sort_arr[y + 1] = tmp;    
            }
            // y < sort_arr.length - 1 - x; 
        }
    }
    console.log(sort_arr); 