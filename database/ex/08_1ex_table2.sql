-- 1.  테이블 생성
-- CREATE TABLE 테이블명(
-- 	컬럼 타입(크기) NOT NULL --널값이 들어갈 수 없음
-- 	,컬럼 타입 DEFAULT(값) --초기값 지정
-- 	,CONSTRAIN PK명 PRIMARY KEY(컬럼) --PK설정
-- 	,CONSTRAIN FK명 FOREIGN KEY(컬럼)
-- 		REFERENCE 참조테이블(참조컬럼) [ON DELETE 동작 / ON UPDATE 동작]  -- FK설정
-- 	,CONSTRAIN UNIQUE명 UNIQUE (컬럼) -- UNIQUE설정
-- 	,CONSTRAIN CHECK명 CHECK (조건) -- CHECK설정
-- );



CREATE TABLE members (
	mem_no INT PRIMARY KEY AUTO_INCREMENT
	,id VARCHAR(30) UNIQUE NOT NULL
	,mem_name VARCHAR(30) NOT NULL
	,addr VARCHAR(100) NOT NULL
);


CREATE TABLE points (
	mem_no INT PRIMARY KEY
	,pt INT NOT NULL DEFAULT 0
	,CONSTRAINT fk_points_eme_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE
);

CREATE TABLE produt_list (
	produt_no INT PRIMARY key
	,produt_name VARCHAR(100) NOT NULL
	,produt_price INT NOT NULL	
);

CREATE TABLE order_list (
	order_no INT PRIMARY KEY
	,mem_no INT NOT NULL
	,produt_no INT NOT NULL
	,produt_cnt INT NOT NULL
	,total_pay INT NOT null
	,CONSTRAINT fk_order_list_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE NO ACTION
	,CONSTRAINT fk_order_list_produt_list FOREIGN KEY(produt_no)
		REFERENCES produt_list(produt_no) ON DELETE NO ACTION
);

-- fk키를 따로 지정할 시에
-- ALTER TABLE order_list ADD
-- 	,CONSTRAINT fk_order_list_mem_no FOREIGN KEY(mem_no)
-- 		REFERENCES members(mem_no) ON DELETE NO ACTION
-- 	,CONSTRAINT fk_order_list_produt_list FOREIGN KEY(produt_no)
-- 		REFERENCES produt_list(produt_no) ON DELETE NO ACTION


INSERT INTO members(id, mem_name, addr)
VALUES ('admin', 'homeelss', 'korea deagu');

INSERT INTO points(mem_no)
VALUES(1);


-- 2. 테이블 변경
-- 	- 컬럼 추가
-- 		ALTER TABLE 테이블명 ADD COLUMN 컬럼 데이터타입;
-- 	- 컬럼의 데이터타입 변경
-- 		ALTER TABLE 테이블명 MODIFY COLUMN 컬럼 데이터타입;
-- 	- 컬럼 삭제
-- 		ALTER TABLE 테이블명 DROP COLUMN 컬럼;

ALTER TABLE members ADD COLUMN age INT NOT NULL;

ALTER TABLE members MODIFY COLUMN mem_name VARCHAR(50) NOT null;

ALTER TABLE members DROP COLUMN age;

-- 3. 테이블 삭제
-- 	DROP TABLE 테이블1 [, 테이블2, 테이블3 ...];

-- DROP TABLE points;

-- 4. 테이블의 데이터 삭제
-- 	TRUNCATE TABLE 테이블;


