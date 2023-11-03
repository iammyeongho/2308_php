CREATE DATABASE mini_multi_board;

USE mini_multi_board;

CREATE TABLE USER(
	id INT PRIMARY KEY AUTO_INCREMENT
	,u_id VARCHAR(20) NOT NULL
	,u_pw VARCHAR(256) NOT NULL
	,u_name VARCHAR(50) NOT NULL
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME
);	

CREATE TABLE board(
	id INT PRIMARY KEY AUTO_INCREMENT	
	,u_pk INT NOT NULL
	,b_type CHAR(1) NOT null
	,b_title VARCHAR(30) NOT null
	,b_content VARCHAR(1000) NOT null
	,b_img VARCHAR(50)
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME
)

CREATE TABLE boardname(
	id INT PRIMARY KEY AUTO_INCREMENT
	,b_type CHAR(1) NOT null
	,b_name VARCHAR(15) NOT NULL
)

-- user INSERT
INSERT INTO user(u_id, u_pw, u_name)
VALUES('admin','MTIzNDU2Nzg=','관리자')
,('user1','MTIzNDU2Nzg=','유저1');

-- board table insert
INSERT INTO board(u_pk, b_type, b_title, b_content)
VALUES('1','0','관리자 제목 테스트1','관리자 내용 테스트1')
,('1','0','관리자 제목 테스트2','관리자 내용 테스트2')
,('2','1','유저1 제목 테스트1','유저1 내용 테스트1')
,('2','1','유저1 제목 테스트2','유저1 내용 테스트2');

-- boordname table insert
insert INTO boardname(b_type, b_name)
VALUES('0','자유게시판')
,('1','질문게시판');

