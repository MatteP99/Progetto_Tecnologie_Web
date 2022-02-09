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

-- Table orders
CREATE TABLE IF NOT EXISTS db_web_project.orders (
id_order INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
id_user INT(11) UNSIGNED NOT NULL,
food_total_price FLOAT UNSIGNED NOT NULL,
data DATETIME NOT NULL DEFAULT current_timestamp(),
order_state enum('In stato di conferma','Confermato','Inviato') DEFAULT 'In stato di conferma',

PRIMARY KEY (id_order),
FOREIGN KEY (id_user) REFERENCES users (id_user)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table list of food
CREATE TABLE IF NOT EXISTS db_web_project.list_food (
id_item INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
id_order INT(11) UNSIGNED NOT NULL,
id_food INT(11) UNSIGNED NOT NULL,
food_quantity INT(11) UNSIGNED NOT NULL,

PRIMARY KEY (id_item),
FOREIGN KEY (id_order) REFERENCES orders (id_order)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;