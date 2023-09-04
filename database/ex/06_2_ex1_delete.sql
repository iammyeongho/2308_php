-- DELETE의 기본구조
-- DELETE FROM 테이블명
-- WHERE 조건
-- ** 추가설명 : 조건을 적지않을 경우 모든 레코드가 삭제됨
-- 실수를 방지하기 위해 WHERE절 부터

INSERT into departments
	dept_no
	,dept_name
)
VALUES (
	'd010'
	,'ceo'
);

DELETE FROM departments
WHERE dept_no = 'd010';

SELECT * FROM departments;
