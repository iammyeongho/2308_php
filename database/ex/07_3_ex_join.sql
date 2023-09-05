-- 0. JOIN이란?
-- 	 두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력하는 것입니다.

-- 1. INNER JOIN의 구조
-- 	SELECT 컬럼1, 컬럼2
-- 	FROM 테이블1 INNER JOIN 테이블2
-- 		ON 조인 조건
-- 	[WHERE 검색조건]
-- join된 값들의 공통 값들을 출력함 / 교차점 

SELECT emp.emp_no
	,emp.first_name
	,emp.last_name
	,dp.dept_no
	FROM employees emp
		INNER JOIN dept_emp dp
			ON emp.emp_no = dp.emp_no
			AND dp.to_date >= NOW()
		WHERE dp.dept_no = 'd005';
		
		
-- 2. OUTER JOIN의 구조
-- 	-기준이 되는 테이블의 레코드는 조인의 조건에 만족되지 않아도 출력
-- 	SELECT 컬럼1, 컬럼2
-- 	FROM 테이블1
-- 		[ LEFT | RIGHT ] OUTER JOIN 테이블2
-- 		OR 조인 조건
-- 	WHERE 검색조건;

-- left와 right 값들 중 교차점과 left 값만 챙겨옴
-- 해당 부분의 경우 emplyees와 dept_manager의 교차점인 emp_no에 동일한 값을 가진 값만 반환
SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	left OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
	WHERE emp.emp_no >= 110000;


SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	right OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW();

-- 3. UNION / UNION ALL ;
--  - 두 쿼리의 결과를 합칩니다
--  - UNION은 중복 값을 제거하고 출력하고, UNION ALL은 중복 값도 출력합니다.
-- SELECT ... FROM ...
-- UNION
-- SELECT ... FROM ... 

SELECT * FROM employees WHERE emp_no = 10001 OR emp_no = 10005
UNION
SELECT * FROM employees WHERE emp_no = 10001 OR emp_no = 10005;

-- 4. SELF JOIN : 자기 자신을 조인
-- SELECT 컬럼1, 컬럼2 ...
-- FROM 테이블1
-- 	INNER JOIN 테이블1
-- WHERE 검색조건;

-- 슈퍼바이저인 사원의 모든 정보를 출력해주세요
SELECT emp2.*
FROM employees emp1
	INNER JOIN employees emp2
		ON emp1.sup_no = emp2.emp_no
WHERE emp1.sup_no = 10001;

-- sup_no 컬럼 추가
ALTER TABLE employees ADD COLUMN sup_no INT(11);

UPDATE employees
	SET sup_no = 10001
WHERE emp_no = 500000



