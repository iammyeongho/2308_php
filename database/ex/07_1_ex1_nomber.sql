-- 숫자 데이터 형식
-- INT : 4byte 정수, 범위 +21억 ~ -21억
-- BIGINT : 8byte 정수, 범위 +900경 ~ -900경
-- FLOAT : 4byte 실수, 소수점 아래 7자리 표현
-- DOUBLE : 8byte 실수, 소수점 아래 15자리 표현
-- DECIMAL : 5~15byte, 소수점 아래 자리를 지정가능

-- 문자 데이터 형식
-- CHAR(n) : 1~255byte, n만큼 고정길이를 가지는 문자형
-- VARCHAR(n) : 1~65535byte, n만큼 가변길이를 가지는 문자형
-- LONGTEXT : 최대 4Gb, text 데이터 값을 저장
-- LONGBLOB : 최대 4Gb, blob 데이터 값을 저장
-- ENUM (값1, 값2, 값, ....) : 정해진 값만 입력 가능하도록 하는 데이터 형식
-- 해당 부분 헷갈릴 시 데이터베이스 테이블값 보면 이해 편함

-- 날짜 및 시간 데이터 형식
-- DATE : 3byte, 'YYYY-MM-DD' 초기값과 최대값 1001-01-01 ~ 9999-12-31 날짜까지 저장
-- DATETIME : 8byte, 'YYYY-MM-DD hh:mi:ss' 초기값과 최대값 1001-01-01 00:00:00 ~ 9999-12-31 23:59:59  날짜와 시간값
-- TIMESTAMP : 4byte, 'YYYY-MM-DD hh:mi:ss' 초기값과 최대값 1001-01-01 00:00:00 ~ 9999-12-31 23:59:59  날짜와 시간값,
-- **주의
--  DATETIME : 날짜와 시간 데이터가 내가 입력한 값으로 고정되는 데이트 타입
--  TIMESTAMP : 서버 시간에 따라 유동적으로 변하는 데이트 타입 