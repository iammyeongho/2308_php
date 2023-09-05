-- 주어진 employees 테이블에는 다음과 같은 열이 있습니다.
-- 
-- employee_id (직원 ID)
-- first_name (이름)
-- last_name (성)
-- department (부서)
-- hire_date (입사일)
-- salary (연봉)
-- 다음 요구 사항에 따라 SQL 질의를 작성하십시오.
-- 
-- 모든 직원의 이름과 연봉을 조회하세요.
-- 
-- "HR" 부서에 속한 직원의 수를 계산하세요.
-- 
-- "Sales" 부서의 직원 중 가장 연봉이 높은 직원의 이름과 연봉을 조회하세요.
-- 
-- "Marketing" 부서에 속한 직원 중 가장 최근에 입사한 직원의 이름과 입사일을 조회하세요.
-- 
-- 연봉이 55000 이상인 직원 중 "IT" 부서에 속한 직원의 수를 계산하세요.
-- 
-- 이러한 질의를 작성하여 employees 테이블에서 필요한 정보를 추출해보세요.

-- 모든 직원의 이름과 연봉을 조회하세요.
SELECT emp.first_name, sal.salary
	FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	;
	
-- "HR" 부서에 속한 직원의 수를 계산하세요.	
SELECT COUNT(*)
	FROM employees emp
	INNER JOIN dept_emp de_emp
	ON emp.emp_no = de_emp.emp_no
	INNER JOIN departments dept
	ON de_emp.dept_no = dept.dept_no
	WHERE dept.dept_no = 'd003';
	
-- "Sales" 부서의 직원 중 가장 연봉이 높은 직원의 이름과 연봉을 조회하세요.
SELECT emp.emp_no, dept.dept_name, sal.salary, emp.first_name
	FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	INNER JOIN dept_emp de_emp
	ON emp.emp_no = de_emp.emp_no
	INNER JOIN departments dept
	ON de_emp.dept_no = dept.dept_no
	WHERE dept.dept_name = 'sales'
	ORDER BY sal.salary desc
	LIMIT 1;

SELECT *
FROM dept_emp
WHERE dept_emp.emp_no = 43624;

-- "Marketing" 부서에 속한 직원 중 가장 최근에 입사한 직원의 이름과 입사일을 조회하세요.
SELECT dept.dept_name, emp.first_name, emp.hire_date
	FROM employees emp
	INNER JOIN dept_emp de_emp
	ON emp.emp_no = de_emp.emp_no
	INNER JOIN departments dept
	ON de_emp.dept_no = dept.dept_no
	WHERE dept.dept_name = 'marketing'
	ORDER BY emp.hire_date DESC
	LIMIT 1;
	
-- 현재 연봉이 55000 이상인 직원 중 "Marketing" 부서에 속한 직원의 수를 계산하세요.
SELECT COUNT(*)
	FROM salaries sal
	INNER JOIN dept_emp de_emp
	ON sal.emp_no = de_emp.emp_no
	INNER JOIN departments dept
	ON de_emp.dept_no = dept.dept_no
	WHERE sal.salary >= 55000
	AND dept.dept_name = 'Marketing'
	AND sal.to_date >= NOW()
	;
	
-- 	현재 모든 직원의 부서별 평균 연봉과 함께 부서명을 조회하세요.
SELECT dept.dept_name, AVG(sal.salary)
	FROM salaries sal
	INNER JOIN dept_emp de_emp
	ON sal.emp_no = de_emp.emp_no
	INNER JOIN departments dept
	ON de_emp.dept_no = dept.dept_no
	WHERE sal.to_date >= NO	
	GROUP BY dept.dept_name
	;

-- "Sales" 부서에 속한 직원 중 1986년에 입사한 직원의 이름과 입사일을 조회하세요.
SELECT dept.dept_name, emp.first_name, emp.hire_date
	FROM employees emp
	INNER JOIN dept_emp de_emp
	ON emp.emp_no = de_emp.emp_no
	INNER JOIN departments dept
	ON de_emp.dept_no = dept.dept_no
	WHERE dept.dept_name = 'sales'
	AND emp.hire_date >= 19850101 AND emp.hire_date < 19860101;


-- "Marketing" 부서와 "Sales" 부서의 직원 중에서 현재 연봉이 60000 이상인 직원의 수를 각각 계산하세요

SELECT sal.emp_no, sal.salary, dept.dept_name
	FROM salaries sal
	INNER JOIN dept_emp de_emp
	ON sal.emp_no = de_emp.emp_no
	INNER JOIN departments dept
	ON de_emp.dept_no = dept.dept_no
	WHERE (dept.dept_name = 'Marketing' OR dept.dept_name = 'Sales')
	and sal.to_date >= NOW() AND sal.salary >= 60000
	ORDER BY emp_no
	;
