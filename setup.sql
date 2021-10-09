CREATE DATABASE secure;

USE secure;

CREATE TABLE mytable (myfield VARCHAR(20));

INSERT INTO mytable VALUES ('Hello'), ('secure');

CREATE TABLE supersecret (myfield VARCHAR(20));

INSERT INTO supersecret VALUES ('pwned');