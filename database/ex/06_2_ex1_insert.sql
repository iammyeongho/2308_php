-- INSERT의 기본구조
-- INSERT INTO 테이블명 [(속성1, 속성2)] / 대괄호는 생략가능
-- VALUES (속성값1, 속성값2)

-- 500000 신규회원

SELECT *
FROM employees;

INSERT INTO employees (
	emp_no 
	,birth_date 
	,first_name 
	,last_name 
	,gender 
	,hire_date
)
VALUES (
	500000
	,NOW()
	,'myeongho'
	,'jung'
	,'M'
	,NOW()
);

SELECT *
FROM employees
WHERE emp_no = 500000;

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
	,'M'
	,20230904
);

SELECT *
FROM employees
WHERE emp_no = 500001;

INSERT INTO employees (
)
VALUES (
	500002
	,19960106
	,'myeongho'
	,'jung'
	,'M'
	,20230904
);

SELECT *
FROM employees
WHERE emp_no = 500002;

-- 다 같은 결과값 1. now로 현재 날짜 2.생년월일 및 입사일, 3. insert 값 안넣고

SELECT *
FROM salaries;

INSERT INTO salaries (
	emp_no 
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,500000
	,NOW()
	,NOW()
);

SELECT *
FROM salaries
WHERE emp_no = 500000;

SELECT MAX(salary) FROM salaries;

-- 500000번 사원의 소속 부서 데이터를 삽입해주세요

SELECT *
FROM departments;

INSERT INTO departments (
	,dept_no
	,dept_name
)
VALUES (
	,'d010'
	,'ceo'
);

SELECT *
FROM dept_emp;

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,TO_date
)
VALUES (
	500000
	,'d010'
	,20230904
	,99990101
);	

SELECT *
FROM dept_emp
WHERE emp_no = 500000;

SELECT *
FROM titles;

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,TO_date
)
VALUES (
	500000
	,'ceo'
	,20230904
	,99990101
);	

SELECT *
FROM titles
WHERE emp_no = 500000;

SELECT title, COUNT(title) FROM titles GROUP BY title;