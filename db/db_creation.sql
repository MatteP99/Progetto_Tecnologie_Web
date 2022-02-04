-- File db creation via sql code

-- Creation db
CREATE SCHEMA IF NOT EXISTS db_web_project DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_web_project;

-- Table Type
CREATE TABLE IF NOT EXISTS db_web_project.types (
id_type INT(11) UNSIGNED  NOT NULL AUTO_INCREMENT,
name TEXT NOT NULL,

PRIMARY KEY (id_type)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table food
CREATE TABLE IF NOT EXISTS db_web_project.food (
id_food INT(11) UNSIGNED  NOT NULL AUTO_INCREMENT,
name TEXT NOT NULL,
description TEXT NOT NULL,
price FLOAT NOT NULL,
img TEXT NOT NULL,
type_food INT(11) UNSIGNED NOT NULL,
quantity INT(11) NOT NULL,

PRIMARY KEY (id_food),
FOREIGN KEY (type_food) REFERENCES types (id_type)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table university
CREATE TABLE IF NOT EXISTS db_web_project.university (
id_uni INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
name TEXT NOT NULL,
address TEXT NOT NULL,

 PRIMARY KEY (id_uni)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table user
CREATE TABLE IF NOT EXISTS db_web_project.users (
id_user INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
name TEXT NOT NULL,
username TEXT NOT NULL,
password TEXT NOT NULL,
email TEXT NOT NULL,
phone_num TEXT NOT NULL,
address TEXT NOT NULL,
email_uni TEXT,
user_status ENUM('Cliente-Studente','Cliente', 'Admin') NOT NULL,

PRIMARY KEY (id_user)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table order
CREATE TABLE IF NOT EXISTS db_web_project.orders (
id_order INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
id_user INT(11) UNSIGNED NOT NULL,
id_food INT(11) UNSIGNED NOT NULL,
food_quantity INT(11) UNSIGNED NOT NULL,
order_state enum('In stato di conferma','Confermato','Inviato') DEFAULT 'In stato di conferma',

PRIMARY KEY (id_order),
FOREIGN KEY (id_user) REFERENCES users (id_user),
FOREIGN KEY (id_food) REFERENCES food (id_food)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table notify
CREATE TABLE IF NOT EXISTS db_web_project.notify (
id_notify INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
id_user INT(11) UNSIGNED NOT NULL,
id_order INT(11) UNSIGNED DEFAULT NULL,
title TEXT NOT NULL,
description TEXT NOT NULL,
data DATETIME NOT NULL DEFAULT current_timestamp(),
status ENUM('Letto','Non letto','not read on screen') NOT NULL DEFAULT 'not read on screen',

PRIMARY KEY (id_notify),
FOREIGN KEY (id_user) REFERENCES users (id_user),
FOREIGN KEY (id_order) REFERENCES orders (id_order)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;