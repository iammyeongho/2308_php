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
	
SELECT * FROM departments;
FLUSH PRIVILEGES; -- php에서 실행 후 해당 구문을 실행해줘야 들어감