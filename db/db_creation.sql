-- File db creation via sql code

-- Creation db
CREATE SCHEMA IF NOT EXISTS db_web_project DEFAULT CHARACTER SET utf8 ;
USE db_web_project ;
-- Table food
CREATE TABLE db_web_project.food (
id_food INT(11) UNSIGNED  NOT NULL AUTO_INCREMENT,
name VARCHAR(20) NOT NULL,
price DOUBLE NOT NULL,
description VARCHAR(300) NOT NULL,
img_food VARCHAR(50) NOT NULL,
type_food VARCHAR(20) NOT NULL,

PRIMARY KEY (id_food)
);
-- Table university
CREATE TABLE db_web_project.university (
id_uni INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
address VARCHAR(50) NOT NULL,

 PRIMARY KEY (id_uni)
);
-- Table user
CREATE TABLE db_web_project.user_ (
id_user INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(30) NOT NULL,
surname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
phone_num VARCHAR(10) NOT NULL,
address VARCHAR(40) NOT NULL,
email_uni VARCHAR(50),
student_status INT(1) NOT NULL,

PRIMARY KEY (id_user)
);
-- Table order
CREATE TABLE db_web_project.order_ (
id_order INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
id_user INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
id_food INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
food_quantity INT(5) NOT NULL,

PRIMARY KEY (id_order),
FOREIGN KEY (id_user) REFERENCES user_ (id_user),
FOREIGN KEY (id_food) REFERENCES food (id_food)
);