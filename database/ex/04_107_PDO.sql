-- SELECT sal.salary, sal.emp_no, emp.birth_date
-- FROM employees as emp
-- JOIN salaries as sal
-- ON emp.emp_no = sal.emp_no
-- and sal.to_date >= NOW()
-- WHERE sal.emp_no = 10001
-- or sal.emp_no = 10002;
-- 
-- INSERT INTO departments (
-- 	dept_no
-- 	,dept_name 
-- 	)
-- 	VALUES(
-- 	'd010'
-- 	,'php504'
-- 	);
-- 	
-- SELECT * FROM departments;
-- FLUSH PRIVILEGES; -- php에서 실행 후 해당 구문을 실행해줘야 들어감
-- 
-- SELECT emp_no
-- FROM salaries
-- WHERE to_date >= NOW()
-- AND salary >= 80000;

INSERT INTO employees
VALUES (
	700000
	,20000101
	,'first'
	,'last'
	,'m'
	,20230919
	,NULL
	);
	
DELETE
	
COMMIT;
		
1.titles 테이블에 데이터가 없는 사원을 검색
2.[1]번에 해당하는 사원의 직책 정보를 INSERT
	2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
3.DB에 저장될 것

SELECT *
	FROM employees emp
	LEFT OUTER JOIN titles tit
	ON emp.emp_no = tit.emp_no
	WHERE tit.emp_no IS NULL;
		
SELECT * 
    FROM employees emp
WHERE NOT EXISTS (SELECT * FROM titles tit WHERE emp_no AND emp.emp_no = tit.emp_no);
		
FLUSH PRIVILEGES;	
		
		
	
		
		
		