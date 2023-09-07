-- 1. 사원 정보테이블에 각자의 정보를 적절하게 넣어주세요
SELECT *
FROM employees
ORDER BY emp_no desc;

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,19960106
	,'myeongho'
	,'jung'
	,'m'
	,20230907
);

-- insert 안에 서브쿼리 사용 시에 as를 넣어줘야한다.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	(SELECT MAX(emp.emp_no) + 1 FROM employees emp)
	,19960106
	,'myeongho'
	,'jung'
	,'m'
	,20230907
);


-- 2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요
SELECT *
FROM salaries
ORDER BY salary DESC;

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	,160000
	,20230907
	,99990101
)

SELECT *
FROM titles
WHERE emp_no = 500001;

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500001
	,'Staff'
	,20230907
	,99990101
)

SELECT *
FROM dept_emp
WHERE emp_no = 500001;

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d001'
	,20230907
	,99990101
)

-- 3. 짝궁의 [1,2]것도 넣어주세요

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,19971229
	,'성찬'
	,'오'
	,'m'
	,20230907
)

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,160000
	,20230907
	,99990101
)

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'Staff'
	,20230907
	,99990101
)

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d001'
	,20230907
	,99990101
)
-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요. (이전 데이터를 유지해야함 따라서 업데이트로 to_date 값을 변경하고 insert로 새로 넣어줘야함)
UPDATE dept_emp
	SET dept_no = 'd001'
WHERE emp_no = 500001;

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d009'
	,NOW()
	,99990101
)

-- 5. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no = 500002;
DELETE FROM salaries
WHERE emp_no = 500002;
DELETE FROM titles
WHERE emp_no = 500002;
DELETE FROM dept_emp
WHERE emp_no = 500002;

-- 6. 'd009'부서의 관리자를 나로 변경해 주세요.
UPDATE dept_manager
	SET TO_date = 20230906
WHERE to_date >= NOW()
and dept_no = 'd009'
;

SELECT *
FROM dept_manager;

INSERT INTO dept_manager (
	dept_no
	,emp_no
	,from_date
	,to_date
)
VALUES (
	'd009'
	,500001
	,20230907
	,99990101
)

-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경
UPDATE titles
	SET title = 'Staff'
	,to_date = NOW()
WHERE emp_no = 500001


INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	 500001
	,'Senior Engineer'
	,20230908
	,99990101
)

SELECT *
FROM titles
WHERE emp_no = 500001

-- 8. 최고 연봉 사원과 최저 연봉 사번의 사번과 이름을 출력해주세요		
SELECT emp.emp_no, emp.first_name, salary
	FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	WHERE salary = (SELECT MAX(salary) FROM salaries)
	or salary = (SELECT min(salary) FROM salaries);
	
SELECT emp.emp_no, emp.first_name, salary
	FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	AND(
	WHERE salary = (SELECT MAX(salary) FROM salaries)
	or salary = (SELECT min(salary) FROM salaries)
);
	
CREATE INDEX idx_sal_sal ON salaries(salary);

DROP INDEX idx_sal_sal ON salaries;

SELECT emp.emp_no, emp.first_name, salary
	FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	WHERE salary = (SELECT salary FROM salaries ORDER BY salary desc LIMIT 1)
	or salary = (SELECT salary FROM salaries ORDER BY salary ASC LIMIT 1);
	
-- 9. 전체 사원의 평균 연봉을 출력해 주세요
SELECT AVG(salary)
	FROM salaries;
	
-- 10. 사번이 499.975인 사원의 지금까지 평균 연봉을 출력해 주세요
SELECT AVG(salary)
	FROM salaries
	WHERE emp_no = 499975;
	