// 1. DOM ( Document Object Model )이란 ? - 교제 p679 그림 참조
// 	- 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
// 	- DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적을 조작 가능
// 	- css와 자바스크립트의 문법이 완벽하게 일치하지않기 때문에 css는 font-size가 뜨고 자바스크립트는 fontSize

// 2. 요소 선택
// 	2-1. 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
TITLE.style.color = 'blue'; //여기서 적어도 됨 | 인라인으로 들어감
// TITLE.style.color = 'blue'; 를 콘솔 창에 쓰면 html 색상이 바뀜


//	2-2. 태그명으로 요소를 선택
// 	해당 요소는 EMENTS로 네임을 들고오기 때문에 여러개일 경우 배열로 나옴
// 	해당 요소들을 컬렉션 객체로 가져온다.
const H2 = document.getElementsByTagName('h2');
H2[0].style.color = 'red';

// 	2-3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');

// 	2-4. CSS 선택자를 사용해 요소를 찾는 메소드
// querySelector() : 복수일 경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');

// querySelectorAll() : 복수의 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');

// 3. 요소 조직
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거 | 문자열에 p 넣으면 p도 출력
TITLE.textContent = '탕수육';

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
TITLE.innerHTML = '<p>탕수육</p>';

// 상단 두 가지의 경우처럼 바로 삽입 가능하고 안되는 것도 있음 예 a태그 
// ** 몇몇 속성들은 DOM 객체에서 바로 설정 가능 **
//  ex) INTXT.PLACEHOLDER = '값'
// const ABCD = document.getElementById('intxt') / ABCD.setAttribute('placeholder', '값을 넣어주세요'); 를 하면 플레이스홀더 들어감
const INTXT = document.getElementById('intxt');
INTXT.setAttribute('placeholder', '값을 넣어주세요');
// INTXT.placeholder = '값을 넣어주세요';
// INTXT.classList = '클래스명' 을 넣으면 해당 상수에 클래스 값이 들어감

// removeAttribute(''); : 요소의 속성을 제거
INTXT.removeAttribute('placeholder');

// 4. 요소 스타일링
// style : 인라인으로 스타일 추가
TITLE.style.color = 'red';

// classList : 클래스로 스타일 추가
TITLE.classList.add('class1','class2','class3');
TITLE.classList.remove('class2');

// 5. 새로운 요소 생성
// 요소 만들기
// const LI = document.createElement('li');
// LI.innerHTML = "글글글글";

// 삽입할 부모 요소
// const UL = document.querySelector('#ul');

// 부모요소의 가장 마지막 위치에 삽입
// UL.appendChild(LI);
// UL.prepend(LI);

// 요소를 특정 위치에 삽입하는 방법 ( Selector() 안에 클래스 명 넣어서 해도됨)
// const SPACE = document.querySelector('ul>li:nth-child(3)');
// const SPACE = document.querySelector('li:nth-child(3)');

// UL.insertBefore(LI, SPACE);

// 1. 사과게임 위에 장기를 넣어주세요.
// const LI = document.createElement('li');
// LI.innerHTML = "장기";
// const UL = document.querySelector('#ul');
// const LONG = document.querySelector('li:nth-child(5)');
// UL.insertBefore(LI, LONG);

const UL = document.querySelector('#ul')
const LIJANGGI = document.createElement('li');
LIJANGGI.innerHTML = '장기';
const LIAPPLE = document.getElementById('apple');
UL.insertBefore(LIJANGGI, LIAPPLE);

// 2. 어메이징 브릭에 베이지색 배경색을 넣어주세요
// const LI_COLOR = document.getElementsByTagName('li');
// LI_COLOR[9].style.backgroundColor = 'beige';

const LI_COLOR = document.querySelector('li:last-child');
LI_COLOR.style.backgroundColor = 'beige';

// 3. 리스트에서 짝수는 빨간색 글씨, 홀수는 파랑색 글씨
const LI_EVEN = document.querySelectorAll('li:nth-child(even)');
for(let val of LI_EVEN) {
	val.style.color = 'red';
	// console.log(val);
}

const LI_ODD = document.querySelectorAll('li:nth-child(odd)');
for(let val of LI_ODD) {
	val.style.color = 'blue';
}

// 위와 같음
// const LI_ALL = document.querySelectorAll('LI');
// for(let i = 0; i < LI_ALL.length; i++) {
// 	if( i % 2 === 0 ) {
// 		LI_ALL[i].style.color = 'blue';
// 	} else {
// 		LI_ALL[i].style.color = 'red';
// 	}
// }

// 6. 참조
// DOM 속성
// https://developer.mozilla.org/en/docs/web/API/Element

// Document
// 
