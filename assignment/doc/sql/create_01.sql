CREATE DATABASE assignment;

USE assignment;

CREATE TABLE user_table(
	user_id INT PRIMARY KEY AUTO_INCREMENT
	,user_name VARCHAR(20) NOT NULL
);

CREATE TABLE list_table(
	list_id INT PRIMARY KEY AUTO_INCREMENT
	,title VARCHAR(100) NOT null
	,content VARCHAR(100)
	,views int NOT NULL DEFAULT 0
	,create_date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP
	,modify_date DATE 
	,delete_date DATE
	,user_id INT NOT NULL
);

INSERT user_table (user_name)
VALUES ("신짱구"), ("안철수"), ("유나이티드 맹구"), ("한유라");

INSERT list_table (
	title
	,content
	,user_id )
	
VALUES ("제목확인", "내용확인", 1)
		,("제목확인2", "내용확인2", 1)
		,("제목확인3", "내용확인3", 2)
		,("제목확인4", "내용확인4", 3)
		,("제목확인5", "내용확인5", 3)
		,("제목확인6", "내용확인6", 2)
		,("제목확인7", "내용확인7", 4);



SELECT *
FROM list_table
WHERE delete_date IS null
ORDER BY list_id DESC
LIMIT 5 OFFSET 0;

SELECT list_t.list_id, list_t.title, list_t.content, list_t.views, DATE_FORMAT(list_t.CREATE_date, '%Y-%m-%d') date_val, list_t.delete_date, user_t.user_name
FROM list_table list_t
JOIN user_table user_t
ON list_t.user_id = user_t.user_id
WHERE title
LIKE "%제목%"
AND DELETE_date IS NULL
ORDER BY LIST_id DESC
LIMIT 5 OFFSET 0;

INSERT INTO list_table (user_id ,title ,content )
VALUES (1,"제목","내용");
			
FLUSH PRIVILEGES;

SELECT 		list_t.list_id 		,list_t.title 		,list_t.content 		,list_t.views 		,date_format(list_t.create_date, '%Y-%m-%d') date_val 		,list_t.delete_date 		,user_t.user_name  FROM 		list_table list_t  JOIN  		user_table user_t  ON  		list_t.user_id = user_t.user_id  WHERE  		title  LIKE "%제목%"  AND list_t.delete_date IS NULL 
 ORDER BY list_t.list_id DESC  LIMIT 5 OFFSET 0
 
 
 SELECT 		list_t.list_id 		,list_t.title 		,list_t.content 		,list_t.views 		,date_format(list_t.create_date, '%Y-%m-%d') date_val 		,list_t.delete_date 		,user_t.user_name  FROM 		list_table list_t  JOIN  		user_table user_t  ON  		list_t.user_id = user_t.user_id  
 WHERE list_t.delete_date IS NULL   AND  		title   LIKE "%제목%" ORDER BY list_t.list_id DESC  LIMIT 5 OFFSET 0