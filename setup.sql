CREATE DATABASE secure;

USE secure;

CREATE TABLE mytable (username VARCHAR(20),email VARCHAR(20),phonenum VARCHAR(20));

INSERT INTO mytable VALUES ('Jhon','Jhon@email,con','00000');
INSERT INTO mytable VALUES ('Doe','Doe@email,con','11111');

CREATE TABLE supersecret (myfield VARCHAR(20));

INSERT INTO supersecret VALUES ('pwned');