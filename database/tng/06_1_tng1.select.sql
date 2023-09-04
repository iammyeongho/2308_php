-- 1 직책 테이블의 모든 정보 조회
SELECT *
FROM titles;

-- 2 급여가  60,000 이하인 사원의 사번 조회
SELECT emp_no
FROM salaries
WHERE to_date >= 20230904
 AND salary <= 60000;
 
-- 3 급여가 60,000~70,000인 사원 사번 조회
SELECT emp_no
FROM salaries
WHERE to_date >= 20230904
 AND salary >= 60000
 AND salary <= 70000;

-- 4 사원 번호가 10001, 10005인 사원 모든 정보 조회
SELECT *
FROM employees
WHERE emp_no IN (10001, 10005);

-- 5 직급명에 'engineer' 포함된 사원 사번과 직급 조회
SELECT emp_no, title
FROM titles
WHERE title LIKE ('%engineer%');

-- 6 사원 이름을 오름차순 정렬
SELECT *
FROM employees
ORDER BY first_name;

-- 7 사원별 급여 평균
SELECT emp_no, AVG(salary)
FROM salaries
WHERE TO_date >= 20230904
GROUP BY emp_no;

-- 8 사원별 급여 평균 30,000 ~ 50,000인 사번과 평균급여
SELECT emp_no, avg(salary) AS sal
FROM salaries
GROUP BY emp_no
HAVING sal >= 30000 and sal <= 50000;

-- 9 사원별 급여 평균이 70,000 이상인 사원의 사번과 이름 성 성별 조회
-- SELECT emp_no, first_name, last_name, gender
-- FROM employees
-- WHERE emp_no in (
-- 	SELECT emp_no
-- 	FROM salaries
-- 	WHERE to_date >= 20230904
-- 	AND salary >= 70000
-- );
-- 
SELECT emp.emp_no, emp.first_name, emp.last_name, emp.gender
FROM employees AS emp, (
	SELECT emp_no, AVG(salary) AS sal_avg
	FROM salaries
	GROUP BY emp_no
	HAVING sal_avg >= '70000') AS sal
WHERE sal.emp_no = emp.emp_no;

SELECT emp_no, first_name, last_name, gender
FROM employees
WHERE emp_no IN(
	SELECT emp_no
	FROM salaries
	GROUP BY emp_no
	HAVING AVG(salary) >= '70000'
	);
	
-- 10 현재 직책이 'senior engineer'인 사원의 사번과 성을 조회 
SELECT emp_no, LAST_name
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM titles
	WHERE title = 'senior engineer' 
		AND to_date >= 20230901
);