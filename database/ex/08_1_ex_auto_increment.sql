-- 1.  AUTO_INCREMENT 란?
-- 	자동 증가 값을 가지는 컬럼으로 값을 직접 대입할 수 없습니다.
-- 	중간에 값을 삭제한다고 해서, 삭제된 값을 재사용 하지 않으며
-- 	레코드가 적재될 때마다 1씩 증가하게 되빈다.
-- 	PK에만 적용할 수 있습니다.

-- 2. AUTO_INCREMENT 생성
CREATE TABLE 테이블명 (
	mem_no INT(11) PRIMARY KEY AUTO_INCREMENT
	,mem_name VARCHAR(50)
);

-- 3. AUTO_INCREMENT 수정
-- 	이미 생성한 테이블의 컬럼에추가할 때
ALTER TABLE 테이블명 MODIFY mem_no INT(11) AUTO_INCREMENT;

INSERT INTO 테이블명 (mem_name) VALUES ('tt');

-- AUTO_INCREMENT의 값을 특정 값으로 설정 (현재 pk의 최대값 이하로는 설징이 안됨
ALTER TABLE 테이블명 AUTO_INCREMENT=9;

-- AUTO_INCREMENT의 값을 초기화할 때





