-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해주세요.

SELECT emp.emp_no, CONCAT(emp.last_name, ' ', emp.first_name) full_name, ti.title
	FROM employees emp
	INNER JOIN titles ti
		ON emp.emp_no = ti.emp_no;

-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해주세요
SELECT emp.emp_no, emp.gender, sal.salary
	FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW();
		
-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력 해주세요.
SELECT CONCAT(emp.last_name, ' ', emp.first_name) full_name, sal.salary, sal.to_date
	FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		WHERE sal.emp_no = 10010;
		
-- 4. 사원의 사원번호, 풀네임, 소속부서명을 출력해주세요

SELECT emp.emp_no, CONCAT(emp.last_name, ' ', emp.first_name) full_name, dp.dept_name
	FROM employees emp
	INNER JOIN dept_emp dept
		ON emp.emp_no = dept.emp_no
	INNER JOIN departments dp
		ON dept.dept_no = dp.dept_no
		WHERE dept.to_date >= NOW();
		

-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력해주세요

SELECT emp.emp_no, CONCAT(emp.last_name, ' ', emp.first_name) full_name, salary
	FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
	WHERE sal.to_date >= NOW()
	ORDER BY sal.salary desc
	LIMIT 10;
	
-- 6. 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해 주세요
SELECT dp.dept_name, CONCAT(emp.last_name, ' ', emp.first_name) FULL_name, emp.hire_date
	FROM employees emp
	INNER JOIN dept_manager dp_ma
		ON emp.emp_no = dp_ma.emp_no
	INNER JOIN departments dp
		ON dp_ma.dept_no = dp.dept_no
		WHERE dp_ma.to_date >= NOW();

-- 7. 현재 직책이 "staff"인 사원의 현재 전체 평균 월급을 출력해주세요

SELECT AVG(salary)
	FROM titles tit
	INNER JOIN salaries sal
		ON tit.emp_no = sal.emp_no
		WHERE sal.to_date >= NOW()
		AND tit.to_date >= NOW()
		and tit.title = 'staff'
		GROUP BY tit.title;

-- 8, 부서장직을 역임헀던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력해주세요.

SELECT CONCAT(emp.last_name, ' ', emp.first_name), emp.hire_date, emp.emp_no, dp.dept_no
	FROM employees emp
	INNER JOIN dept_manager dp_ma
		ON emp.emp_no = dp_ma.emp_no
	INNER JOIN departments dp
		ON dp_ma.dept_no = dp.dept_no;
		
-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균월급(정수)를 내림차순으로 출력해 주세요
SELECT title, floor(AVG(sal.salary)) sal_avg
	FROM titles tit
	INNER JOIN salaries sal
		ON tit.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
		AND tit.to_date >= NOW()
		GROUP BY tit.title
		HAVING sal_avg >= 60000
		ORDER BY sal_avg desc;

		
-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
SELECT COUNT(title)
	FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no
		WHERE emp.gender = 'f'
		AND tit.to_date >= NOW()
		GROUP BY tit.title;
		
		
-- 11. 퇴사한 여직원 수
SELECT emp.gender, COUNT(*) 
	FROM employees emp, (
			SELECT emp_no, MAX(to_date) max_date
			FROM titles
			GROUP BY emp_no
			HAVING max_date != 99990101
		) tit
		WHERE emp.emp_no = tit.emp_no
		GROUP BY emp.gender;
-- 		HAVING emp.gender = 'f';
		
SELECT emp.gender, COUNT(*)
FROM employees emp
	INNER JOIN (
			select emp_no
			FROM titles t
			GROUP BY t.emp_no HAVING MAX(t.to_date) != 99990101
		) tit
		ON emp.emp_no = tit.emp_no
GROUP BY emp.gender HAVING emp.gender = 'F';
		