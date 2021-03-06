
DROP TABLE IF EXISTS user;
CREATE TABLE user
(
	userId INTEGER(4) NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(20),
	lastName VARCHAR(20),
	email VARCHAR(30),
	PRIMARY KEY(userId)
);
DROP TABLE IF EXISTS loginDetail;
CREATE TABLE login
(
	id INTEGER(4) NOT NULL AUTO_INCREMENT,
	password VARCHAR(255),
	username VARCHAR(10),
	PRIMARY KEY(username),
	FOREIGN KEY(id) REFERENCES user(userId)

);
DROP TABLE IF EXISTS posts;
CREATE TABLE posts
(
	postsId INTEGER(4) NOT NULL AUTO_INCREMENT,
	blogger VARCHAR(10) NOT NULL,
	title VARCHAR(20),
	feed VARCHAR(60000),
	postDate VARCHAR(20),
	PRIMARY KEY(postsId),
	FOREIGN KEY(blogger) REFERENCES login(username)


);