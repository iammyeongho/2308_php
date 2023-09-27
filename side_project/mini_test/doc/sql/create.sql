CREATE DATABASE newjeans;

USE newjeans;

CREATE TABLE boards(
	id INT PRIMARY KEY AUTO_INCREMENT
	,title varchar(100) NOT NULL
	,writet VARCHAR(100) NOT null
	,content VARCHAR(1000) NOT null
	,image 
	,created_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	,delete_fig CHAR(1) NOT NULL DEFAULT '0'
	,delete_date DATETIME DEFAULT NULL
);