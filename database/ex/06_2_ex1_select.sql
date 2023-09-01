-- 주석
-- SELECT [컬럼명] FROM [테이블명];
-- 선택 / 컬럼명 / 위치 / 테이블명
SELECT * 
FROM employees;

SELECT * 
FROM dept_emp;

SELECT first_name, last_name 
FROM employees;

SELECT emp_no, title 
FROM titles;

-- SELECT [컬럼명] FROM [테이블명] WHERE [쿼리 조건];
-- [쿼리 조건] : 컬럼명 [기호(+-= 등)] 조건 값 

SELECT * 
FROM employees 
WHERE emp_no = 10009;

SELECT * 
FROM employees 
WHERE emp_no >= 10009;

SELECT * 
FROM employees 
WHERE first_name = 'mary';

SELECT * 
FROM employees 
WHERE birth_date >= 1960101;

SELECT * 
FROM employees
WHERE birth_date <= 19700101 
AND birth_date >= 19650101;
  
SELECT *
FROM employees
WHERE first_name = 'mary'
AND last_name = 'piazza';

SELECT *
FROM employees
WHERE first_name = 'mary'
  OR last_name = 'piazza';
  
-- 

SELECT *
FROM employees
WHERE emp_no >= 10005
AND emp_no <= 10010;
  
-- between을 통해 한줄로 축약  
SELECT *
FROM employees
WHERE emp_no BETWEEN 10005 and 10010;

SELECT *
FROM employees
WHERE emp_no = 10005
OR emp_no = 10010;
  
-- 위 or과 in 같은 결과값  
SELECT *
FROM employees
WHERE emp_no in(10005, 10010);

-- ge로 시작하는 단어 시작
SELECT *
FROM employees
WHERE first_name LIKE('ge%');

SELECT *
FROM titles
WHERE title LIKE('%staff%');

SELECT *
FROM titles
WHERE title = 'staff';

SELECT *
FROM employees

-- _단어 하나 3개의 단어 후 ge가 나타나는 값만 출력
WHERE first_name LIKE('___ge');

--  ORDER BY로 정렬하여 조회
SELECT * FROM employees;

-- birth_date 기준으로 오름차순(ASC) 정렬
SELECT * FROM employees 
ORDER BY birth_date;

-- 내림차순(DESC)
SELECT * FROM employees 
ORDER BY birth_date DESC;

-- 두 컬럼 정렬시에 (birth가 앞이기 때문에 먼저)
SELECT * FROM employees 
ORDER BY birth_date, first_name;

-- 성을 내림차순으로 정렬하고, 이름, 생일 오름차순으로 정렬
SELECT * 
FROM employees 
ORDER BY last_name DESC, first_name, birth_date;

SELECT *
FROM salaries;

SELECT emp_no
FROM salaries;

-- DISITINCT 중복되는 레코드 없이 조회
SELECT DISTINCT emp_no
FROM salaries;

SELECT emp_no, salary 
FROM salaries 
WHERE emp_no = 10001;

SELECT DISTINCT emp_no, salary
FROM salaries 
WHERE emp_no = 10001;

-- INSERT INTO salaries VALUES (10001, 60117, 19860626, 19870626);
-- COMMIT;

-- 5. 집계 함수 (SUM)
SELECT SUM(salary) FROM salaries;

-- 현재 받고있는 급여만 조회
SELECT *
FROM salaries
WHERE to_date >= 99990101;

-- 현재 받고있는 급여의 총액만 출력
SELECT SUM(salary)
FROM salaries
WHERE to_date >= 99990101;

-- 현재 받고있는 급여의 최대값만 출력
SELECT max(salary)
FROM salaries
WHERE to_date >= 99990101;

-- 현재 받고있는 급여의 최소값만 출력
SELECT min(salary)
FROM salaries
WHERE to_date >= 99990101;

-- 현재 받고있는 급여의 평균값만 출력
SELECT avg(salary)
FROM salaries
WHERE to_date >= 99990101;

-- 사원의 수
SELECT COUNT(emp_no)
FROM employees;

-- 이름이 mary인 사람의 수
SELECT COUNT(emp_no)
FROM employees
WHERE first_name = 'mary';

-- 그룹으로 묶어서 조회 : GROUP BY [HAVING 집계함수조건]

SELECT title, COUNT(title)
FROM titles
GROUP BY title;

-- assistant engineer 수만
-- SELECT COUNT(*)
-- FROM titles
-- WHERE title = 'assistant engineer';

-- 두 값은 같지만 위의 값의 경우 그룹이 title, to_date가 묶이기 때문에 값이 여러개 나옴
-- 아래처럼 where로 지정하고 그룹으로 출력해야 맞음
-- 현재 재직중인 직원들의 직급별 수를 구하기
SELECT title, COUNT(title)
FROM titles
GROUP BY title, to_date HAVING to_date >= 20230901;

SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901 
GROUP BY title;

-- staff이 들어간 값만 출력
SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901 
GROUP BY title HAVING title LIKE('%staff%');


-- 결과값에 count(title)의 이름을 as를 통해 변경 가능
SELECT title, COUNT(title) AS count
FROM titles
WHERE to_date >= 20230901 
GROUP BY title HAVING title LIKE('%staff%');

-- concat() 문자열을 합쳐주는 함수
SELECT CONCAT(first_name, ' ', last_name) AS FULL_name
FROM employees;

-- 사원의 사번, 생일, 풀네임
SELECT 
	emp_no
	, birth_date
	, CONCAT(first_name, ' ', last_name) AS FULL_name
FROM employees
WHERE gender = 'f'
ORDER BY FULL_name; 

-- limit 출력값을 일정 수로 제한
SELECT *
FROM employees ORDER BY emp_no
LIMIT 10 ;

-- limit n : n개만큼 출력 limit n offset n : n개만큼 출력, n번부터
SELECT *
FROM employees ORDER BY emp_no
LIMIT 10 OFFSET 10;

-- 재직중인 사원들 중 급여가 상위 5위까지 출력
SELECT *
FROM salaries
WHERE to_date >= 20230101
ORDER BY salary DESC
LIMIT 5;

-- 서브쿼리 (SubQurey : 쿼리 안에 또 다른 쿼리가 있는 형태
-- d002 부서의 현재 매니저의 정보를 출력

-- SELECT *
-- FROM employees
-- WHERE emp_no = 110114;

-- 위 아래 같음
-- 매니저 정보가 있는 부분 정하고 그 안에 d002 조건을 걸어줌
SELECT *
FROM employees
WHERE emp_no = (
	SELECT emp_no 
	FROM dept_manager 
	WHERE to_date >= 20230901 
		AND dept_no = 'd002'
);

-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력
SELECT emp_no, CONCAT(first_name, ' ', last_name) AS FULL_name
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM salaries
	WHERE to_date >= 20230101
	ORDER BY salary DESC
	LIMIT 1
); 

-- 서브쿼리의 결과가 복수일 때 사용 방법
-- d001 부서에 속한적이 있는 사원의 사번과 풀네임을 출력
SELECT emp_no, CONCAT(first_name, ' ', last_name) AS FULL_name
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001' OR DEPT_NO = 'D002'
); 

-- 현재 직책이 senior engineer인 사원의 사번과 생일
SELECT emp_no, birth_date
FROM employees
WHERE emp_no in (
	SELECT emp_no
	FROM titles
	WHERE title = 'senior engineer' 
		AND to_date >= 20230901
);

-- 다중열 서브쿼리 / now 현재 날짜 / dept_no와 emp_no의 값을 동시에 만족할 때
-- 현재 부서장인 사람의 소속부서 테이블의 모든 정보를 출력 
SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
	SELECT dept_no, emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);

-- SELECT절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재 급여 첫 수급일, 풀네임 출력 
SELECT sal.salary
	, sal.from_date
	, (
		SELECT CONCAT(emp.first_name, ' ', emp.last_name)
		FROM employees AS emp
		WHERE sal.emp_no = emp.emp_no
	) AS full_name
FROM salaries AS sal
WHERE sal.to_date >= NOW();

-- FROM절에 오는 서브쿼리
--
SELECT emp.*
FROM (
	SELECT *
	FROM employees
	WHERE gender = 'm'
) AS emp;





