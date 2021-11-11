CREATE DATABASE secure;

USE secure;

CREATE TABLE csrfprotected (username VARCHAR(20),email VARCHAR(20),phonenum VARCHAR(20));
INSERT INTO csrfprotected VALUES ('Jhon','csrf@protected.com','00000');
INSERT INTO csrfprotected VALUES ('Doe','csrf@protected.com','11111');

CREATE TABLE notcsrfprotected (username VARCHAR(20),email VARCHAR(20),phonenum VARCHAR(20));
INSERT INTO notcsrfprotected VALUES ('Jhon','csrf@unprotected.com','00000');
INSERT INTO notcsrfprotected VALUES ('Doe','csrf@unprotected.com','11111');
