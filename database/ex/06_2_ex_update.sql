-- UPDATE 기본구조
-- UPDATE 테이블명
-- SET ( 컬럼1 = 값1, 컬럼2 = 값2 )
-- WHERE 조건
-- ** 추가설명 : 조건을 적지않을 경우 모든 레코드가 수정됨
-- 실수 방지를 위해 WHERE절을 먼저 작성 후 SET절을 작성할것
-- COMMIT; off로 했기 때문에 계속 넣어줘야함
-- 실수로 WHERE절을 안줄 시에 모든 EMP_NO 넘버의 타이틀이 CEO로 바뀜/ set문 보다 where를 먼저 쓰는게 좋음

UPDATE titles
	SET title = 'ceo'
WHERE emp_no = 500000;

SELECT * FROM titles WHERE emp_no = 500000;
