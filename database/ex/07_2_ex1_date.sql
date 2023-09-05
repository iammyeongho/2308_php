-- 1. 데이터 타입 변환 함수

-- CAST( 값 as 데이터형식 ), CONVERT( 값, 데이터형식 )
SELECT cast(1234 AS CHAR(4));

SELECT CONVERT(1234, CHAR(4));

-- 2. 제어 흐름 함수

-- IF(수식, 참일 때, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT IF(0 = 1, '참', '거짓');

SELECT emp_no, IF(gender = 'M', '남자', '여자') AS GENDER
FROM employees;

-- IFNULL(수식1, 수식2) : 수식1이 NULL이면 수식2를 반환하고, NULL이 아니면 수식1를 반환

SELECT IFNULL('11', '수식1');

SELECT emp_no, title,
	IFNULL(to_date, DATE(NOW())) AS TO_date
	FROM titles
	ORDER BY emp_no DESC;
	
-- NULLIF(수식1, 수식2) : 수식1과 2가 같으면 NULL을 반환하고, 다르면 수식1을 반환

SELECT NULLIF(1, 2);

SELECT emp_no
	,title
	,to_date
	,NULLif(to_date, 99990101) AS to_date2
	FROM titles
	ORDER BY emp_no DESC;
	
	
-- CASE ~ WHEN ~ ELSE ~ END : 다중 분기를 위해 사용합니다.
-- 예) 
-- 	CASE 체크하려는 수식
-- 		WHEN 분기수식1 THEN 결과1
-- 		WHEN 분기수식2 THEN 결과2
-- 		WHEN 분기수식3 THEN 결과3
-- 		ELSE 결과 4
-- 	END

SELECT e.emp_no
	,e.gender
	,case e.gender
		when'm' then '남자'
		else '여자'
		END ko_gender
FROM employees e;


SELECT *
FROM titles
WHERE emp_no = 500000;

-- 직책 테이블의 모든 정보를 출력해 주세요.
-- to_date가 null // 9999-01-01인 경우는 '현재직책'
-- 그 외는 '이전직책'
-- 다중 조건문은 안됨

SELECT *
FROM titles;

-- null 적용 안됨
SELECT *
	,case to_date
		when NULL THEN  '현재직책'
		when 99990101 then '현재직책'
		ELSE '이전직책'
		END ko_to_date
FROM titles
ORDER BY emp_no DESC;

-- when 안에 조건을 주는 경우
SELECT *
	,case
		when tit.to_date IS NULL then '현재직책'
		when tit.to_date = 99990101 then '현재직책'
		ELSE '이전직책'
		END ko_to_date
FROM titles tit
ORDER BY emp_no DESC;

-- ifnull로 들어가면 to_date 값이 문자열로 바뀜
-- 수식 1 (to_date가 null이면) 수식 2 99990101을 반환하여 아래 when문으로 이동하여 현재직책으로 지정
-- 만약 수식1이 null이 아니면 to_date값이 반환되기 when 조건이 맞지않기 때문에 else로 이동
SELECT *
	,case date(ifnull(to_date, 99990101))
		when 99990101 then '현재직책'
		ELSE '이전직책'
		END ko_to_date
FROM titles tit
ORDER BY emp_no DESC;

-- null은 데이터 값이 아니기 때문에 is
-- null이 아닌 다른 값들은 is not
SELECT *
FROM titles
WHERE to_date IS not NULL;


-- 3. 문자열 함수

-- CONCAT(문자열1, 문자열2, ...) : 문자열을 이어줌
SELECT CONCAT('안녕', '하세요') '안녕하세요';

-- CONCAT(구분자, 문자열1, 문자열2, ....) : 문자열 사이에 구분자를 넣어줌
SELECT CONCAT_WS('/', '딸기', '바나나', '토마토', '수박');

-- FORMAI(숫자, 소숫점 자릿수) : 숫자에 ','를 넣어주고, 소수점 자릿수만큼 값 출력
SELECT FORMAT(123456, 0);

-- LEFT(문자열, 길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환합니다
SELECT LEFT('123456', 3);

-- RIGHT(문자열, 길이) : 문자열을 오른쪽부터 길이만큼 잘라 반환합니다
SELECT RIGHT('123456', 3);

-- UPPER(문자열) : 소문자를 대문자로 변경합니다.
SELECT UPPER('abcdef');

-- LOWER(문자열) : 대문자를 소문자로 변경합니다.
SELECT LOWER('ABCDEF');

-- LPAD(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣어줌
SELECT LPAD('1', 10, '나가');

-- RPAD(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣어줌
SELECT RPAD('1', 10, '가다');

-- TRIM(문자열) : 좌우 공백을 제거합니다.
SELECT ' 1234    ', TRIM('     1234' );

-- LTRIM. RTRIM : 좌 또는 우 공백 제거
SELECT LTRIM('     1234' );
SELECT RTRIM('  1234    ');

-- TRIM(방향 문자열1 FROM 문자열2) : 방향을 지정해 문자열2에서 문자열1을 제거합니다.
-- ** 방향을 LEADING(좌), BOTH(좌우), TRAILING(우) **
SELECT TRIM(LEADING 'ABC' FROM 'ABCDEFG');

-- SUBSTRING(문자열, 시작위치, 길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환합니다.
SELECT SUBSTRING('ABCDEF', 3, 2);

-- SUBSTRING_INDEX(문자열, 구분자, 횟수) : 왼쪽부터 구분자가 횟수 번째가 나오면 그 이후 부분은 자름
SELECT SUBSTRING_INDEX('AB.CD.EF.GH', '.', 2);


-- 4. 수학 함수

-- CEILING(숫자) : 올림합니다.
SELECT CEILING(1.34);

-- FLOOR(숫자) : 버림합니다/
SELECT FLOOR(1.54);

-- ROUND(숫자) : 반올림합니다.
SELECT ROUND(1.5), ROUND(1.4);

-- TRUNCATE(숫자, 정수) : 소수점 기준으로 정수위치 까지 구하고 나머지는 버립니다.
-- TRUNCATE employees employess 내용 다 날라감
SELECT TRUNCATE(1.11, 0);


-- 5. 날짜 및 시간 함수
-- NOW() : 현재 날짜 / 시간을 구합니다. (YYYY-MM-DD HH:MM:DD)
SELECT NOW(), DATE(NOW()), DATE(99990101);

-- ADDDATE(날짜1, INTERVAL 날짜2) : 날짜1에서 날짜2를 더한 날짜를 구합니다.
SELECT ADDDATE(99990101, INTERVAL 1 DAY);
SELECT ADDDATE(99990101, INTERVAL 1 MONTH);
SELECT ADDDATE(99990101, INTERVAL 1 YEAR);

-- SUBDATE(날짜1, INTERVAL 날짜2) : 날짜1에서 날짜2를 뺀 날짜를 구합니다.
SELECT SUBDATE(99990101, INTERVAL -1 DAY);

-- ADDTIME(날짜/시간, 시간) : 날짜/시간에서 시간을 더한 날짜/시간을 구합니다.
SELECT ADDTIME(20230101000000, '-01:00:00');

-- SUBTIME(날짜/시간, 시간) : 날짜/시간에서 시간을 더한 날짜/시간을 구합니다.
SELECT SUBTIME(20230101000000, '-01:00:00');


-- 6. 순위 함수

-- RANK() OVER(ORDER BY 속성명 DESC/ASC) : 순위를 매깁니다.
-- 위의 경우는 전체 값에서 결과를 처리하기 때문에 느림 그래서 아래처럼 서브쿼리 이용
SELECT emp_no, salary, 
	RANK() OVER(ORDER BY salary desc) RANK
	FROM salaries
LIMIT 10;

SELECT emp_no
	,salary 
	,RANK() OVER(ORDER BY salary DESC) RANK
	FROM
	(
	SELECT emp_no, salary
	FROM salaries ORDER BY salary DESC
	LIMIT 10
	) 
t;

-- ROW_NUMBER() OVER(DRDER BY 속성명 DESC/ASC) : 레코드에 순위를 매깁니다.
-- 위의 경우는 전체 값에서 결과를 처리하기 때문에 느림 그래서 아래처럼 서브쿼리 이용
SELECT emp_no, salary, 
	ROW_NUMBER() OVER(ORDER BY salary desc) num
	FROM salaries
LIMIT 10;

SELECT emp_no
	,salary 
	,ROW_NUMBER() OVER(ORDER BY salary DESC) num
	FROM
	(
	SELECT emp_no, salary
	FROM salaries ORDER BY salary DESC
	LIMIT 10
	) 
t;