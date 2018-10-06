/*Create database 'minions'*/
CREATE DATABASE `minions`;
ALTER DATABASE `minions` CHARACTER SET utf8 COLLATE utf8_general_ci;

/*Create two tables*/
CREATE TABLE `minions`(
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) ,
  `age` INT(3) UNSIGNED NOT NULL
);

CREATE TABLE `towns`(
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL
);

/*Add new constraint that makes town_id foreign key and references to id column of towns table */
ALTER TABLE minions ADD column town_id int;
ALTER TABLE minions
  ADD CONSTRAINT fk_minions_towns FOREIGN KEY(town_id)
REFERENCES towns(id);

/*Insert Records in Both Tables */
insert into towns (id, name)
values (1, "Sofia"),
       (2, "Plovdiv"),
       (3, "Varna");

insert into minions (id, name, age, town_id)
values (1, 'Kevin', 22, 1),
       (2, 'Bob', 15, 3),
       (3, 'Steward', NULL, 2);

/*Truncate Table Minions */
TRUNCATE TABLE `minions`;

/*Drop All Tables */
DROP TABLE `minions`,`towns` ;

/*Create Table People */
CREATE TABLE `people` (
  `id`        INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name`      VARCHAR(200) NOT NULL,
  `picture`   LONGBLOB     NULL,
  `height`    FLOAT        NULL,
  `weight`    FLOAT        NULL,
  `gender`    CHAR(1)      NOT NULL,
  `birthdate` DATE         NOT NULL,
  `biography` TEXT         NULL
);

INSERT INTO `people` (name, picture, height, weight, gender, birthdate, biography)
VALUES ('anme',NULL ,12.33,23.33,'m','1999-11-11','ssdadasdsa'),
       ('anme',NULL ,12.33,23.33,'m','1999-11-11','ssdadasdsa'),
       ('anme',NULL ,12.33,23.33,'m','1999-11-11','ssdadasdsa'),
       ('anme',NULL ,12.33,23.33,'m','1999-11-11','ssdadasdsa'),
       ('anme',NULL ,12.33,23.33,'m','1999-11-11','ssdadasdsa')
       ;

/*Create Table Users */
CREATE TABLE IF NOT EXISTS `users`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `username` VARCHAR(30) UNIQUE NOT NULL ,
  `password` VARCHAR(26) NOT NULL ,
  `profile_picture` MEDIUMBLOB NULL ,
  `last_login_time` TIMESTAMP DEFAULT NOW(),
  `is_deleted` BOOL DEFAULT FALSE
);

INSERT INTO `users`(username, password, profile_picture, last_login_time, is_deleted)
VALUES ('user1','pass',NULL,NOW() ,TRUE ),
       ('user2','pass',NULL,NOW() ,TRUE ),
       ('user3','pass',NULL,NOW() ,TRUE ),
       ('user4','pass',NULL,NOW() ,TRUE ),
       ('user5','pass',NULL,NOW() ,TRUE );

/*Change Primary Key */
ALTER TABLE `users` DROP PRIMARY KEY ,
ADD PRIMARY KEY (`id`,`username`);

/*Set Default Value of a Field */
ALTER TABLE `users`
  MODIFY  COLUMN `last_login_time` TIMESTAMP NOT NULL DEFAULT NOW();

/*Set Unique Field */
ALTER TABLE `users`
	DROP PRIMARY KEY,
	ADD CONSTRAINT PRIMARY KEY (`id`),
	ADD CONSTRAINT UNIQUE (`username`);

/*Movies Database */
CREATE TABLE `directors`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `director_name` VARCHAR(255) NOT NULL ,
  `notes` TEXT DEFAULT NULL
);

CREATE TABLE `genres`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `genre_name` VARCHAR(255) NOT NULL ,
  `notes` TEXT DEFAULT NULL
);

CREATE TABLE `categories`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `category_name` VARCHAR(255) NOT NULL ,
  `notes` TEXT DEFAULT NULL
);

CREATE TABLE `movies`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL ,
  `director_id` INT UNSIGNED NOT NULL ,
  `copyright_year` YEAR NOT NULL ,
  `length` TIME NOT NULL ,
  `genre_id` INT UNSIGNED NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  `rating` INT DEFAULT 0,
  `notes` TEXT DEFAULT NULL
);

INSERT INTO `directors`(director_name)
    VALUES ('pesho'),
           ('pesho'),
           ('pesho'),
           ('pesho'),
           ('pesho');

INSERT INTO `genres`(genre_name)
VALUES ('horror'),
       ('horror'),
       ('horror'),
       ('horror'),
       ('horror');

INSERT INTO `categories` (category_name)
VALUES ('gosho'),
       ('gosho'),
       ('gosho'),
       ('gosho'),
       ('gosho');

INSERT INTO `movies`(title, director_id, copyright_year, length, genre_id, category_id, rating)
VALUES ('gosho',1,2018,'00:54:32',2,1,2),
       ('gosho',1,2018,'00:54:32',2,1,2),
       ('gosho',1,2018,'00:54:32',2,1,2),
       ('gosho',1,2018,'00:54:32',2,1,2),
       ('gosho',1,2018,'00:54:32',2,1,2);

/*Car Rental Database*/
CREATE TABLE `categories` (
  `id` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
  `category` VARCHAR(30) NOT NULL,
  `daily_rate` DOUBLE NOT NULL,
  `weekly_rate` DOUBLE NOT NULL,
  `monthly_rate` DOUBLE NOT NULL,
  `weekend_rate` DOUBLE NOT NULL
);

INSERT INTO `categories`
    (`category`, `daily_rate`, `weekly_rate`, `monthly_rate`, `weekend_rate`)
VALUES
       ('Category 1', 1.1, 2.1, 3.1, 4.1),
       ('Category 2', 1.2, 2.2, 3.2, 4.2),
       ('Category 3', 1.3, 2.3, 3.3, 4.3);

CREATE TABLE `cars` (
  `id` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
  `plate_number` VARCHAR(20) NOT NULL UNIQUE,
  `make` VARCHAR(20) NOT NULL,
  `model` VARCHAR(20) NOT NULL,
  `car_year` YEAR NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  `doors` TINYINT UNSIGNED NOT NULL,
  `picture` BLOB,
  `car_condition` VARCHAR(20),
  `available` BOOLEAN NOT NULL DEFAULT TRUE
);

INSERT INTO `cars`
    (`plate_number`, `make`, `model`, `car_year`, `category_id`, `doors`, `car_condition`)
VALUES
       ('Plate Num 1', 'Maker 1', 'Model 1', '1970', 1, 2, ''),
       ('Plate Num 2', 'Maker 2', 'Model 2', '1980', 2, 4, 'Scrap'),
       ('Plate Num 3', 'Maker 3', 'Model 3', '1990', 3, 5, 'Good');

CREATE TABLE `employees` (
  `id` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
  `first_name` VARCHAR(30) NOT NULL,
  `last_name` VARCHAR(30) NOT NULL,
  `title` VARCHAR(30) NOT NULL,
  `notes` VARCHAR(128)
);

INSERT INTO `employees`
    (`first_name`, `last_name`, `title`, `notes`)
VALUES
       ('Gosho', 'Goshev', 'sda', ''),
       ('Pesho', 'Peshev', 'ddd', ''),
       ('Ivan', 'Ivanov', 'fdf', '');

CREATE TABLE `customers` (
  `id` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
  `driver_licence_number` VARCHAR(30) NOT NULL,
  `full_name` VARCHAR(60) NOT NULL,
  `address` VARCHAR(50) NOT NULL,
  `city` VARCHAR(20) NOT NULL,
  `zip_code` INT(4) NOT NULL,
  `notes` VARCHAR(128)
);

INSERT INTO `customers`
    (`driver_licence_number`, `full_name`, `address`, `city`, `zip_code`, `notes`)
VALUES
       ('1234ABCD', 'Gosho Goshev', 'A casstle', 'Sofia', 1000, ''),
       ('2234ABCD', 'Pesho Peshev', 'A boat', 'Varna', 2000, ''),
       ('3234ABCD', 'Bai Ivan', 'Under the bridge', 'Sofia', 1000, '');

CREATE TABLE `rental_orders` (
  `id` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
  `employee_id` INT UNSIGNED NOT NULL,
  `customer_id` INT UNSIGNED NOT NULL,
  `car_id` INT UNSIGNED NOT NULL,
  `car_condition` VARCHAR(20),
  `tank_level` DOUBLE,
  `kilometrage_start` DOUBLE,
  `kilometrage_end` DOUBLE,
  `total_kilometrage` DOUBLE,
  `start_date` DATE,
  `end_date` DATE,
  `total_days` INT UNSIGNED,
  `rate_applied` DOUBLE,
  `tax_rate` DOUBLE,
  `order_status` VARCHAR(30),
  `notes` VARCHAR(128)
);

INSERT INTO `rental_orders`
    (`employee_id`, `customer_id`, `car_id`, `car_condition`, `start_date`)
VALUES
       (1, 3, 2, 'Good', NOW()),
       (2, 1, 3, 'Bad', NOW()),
       (3, 2, 1, 'OK', NOW());

/*Hotel Database */
CREATE TABLE `employees` (
	`id` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`first_name` VARCHAR(30) NOT NULL,
	`last_name` VARCHAR(30) NOT NULL,
	`title` VARCHAR(30) NOT NULL,
	`notes` VARCHAR(128)
);

INSERT INTO `employees`
		(`first_name`, `last_name`, `title`, `notes`)
	VALUES
		('Gosho', 'Goshev', 'Boss', ''),
		('Pesho', 'Peshev', 'Supervisor', ''),
		('Bai', 'Ivan', 'Worker', 'Can do any work');

CREATE TABLE `customers` (
	`account_number` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`first_name` VARCHAR(30) NOT NULL,
	`last_name` VARCHAR(30) NOT NULL,
	`phone_number` VARCHAR(20) NOT NULL,
	`emergency_name` VARCHAR(50),
	`emergency_number` VARCHAR(20),
	`notes` VARCHAR(128)
);

INSERT INTO `customers`
		(`first_name`, `last_name`, `phone_number`)
	VALUES
		('Gosho', 'Goshev', '123'),
		('Pesho', 'Peshev', '44-2432'),
		('Bai', 'Ivan', '007');

CREATE TABLE `room_status` (
	`room_status` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`notes` VARCHAR(128)
);

INSERT INTO `room_status`
		(`notes`)
	VALUES
		('Free'),
		('For clean'),
		('Occupied');

CREATE TABLE `room_types` (
	`room_type` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`notes` VARCHAR(128)
);

INSERT INTO `room_types`
		(`notes`)
	VALUES
		('Small'),
		('Medium'),
		('Appartment');


CREATE TABLE `bed_types` (
	`bed_type` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`notes` VARCHAR(128)
);

INSERT INTO `bed_types`
		(`notes`)
	VALUES
		('Single'),
		('Double'),
		('Water-filled');

CREATE TABLE `rooms` (
	`room_number` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`room_type` INT UNSIGNED NOT NULL,
	`bed_type` INT UNSIGNED NOT NULL,
	`rate` DOUBLE DEFAULT 0,
	`room_status` INT UNSIGNED NOT NULL,
	`notes` VARCHAR(128)
);

INSERT INTO `rooms`
		(`room_type`, `bed_type`, `room_status`)
	VALUES
		(1, 1, 1),
		(2, 2, 2),
		(3, 3, 3);

CREATE TABLE `payments` (
	`id` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`employee_id` INT UNSIGNED NOT NULL,
	`payment_date` DATE NOT NULL,
	`account_number` INT UNSIGNED NOT NULL,
	`first_date_occupied` DATE,
	`last_date_occupied` DATE,
	`total_days` INT UNSIGNED,
	`amount_charged` DOUBLE,
	`tax_rate` DOUBLE,
	`tax_amount` DOUBLE,
	`payment_total` DOUBLE,
	`notes` VARCHAR(128)
);

INSERT INTO `payments`
		(`employee_id`, `payment_date`, `account_number`)
	VALUES
		(1, DATE(NOW()), 1),
		(2, DATE(NOW()), 2),
		(3, DATE(NOW()), 3);


CREATE TABLE `occupancies` (
	`id` INT UNSIGNED PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`employee_id` INT UNSIGNED NOT NULL,
	`date_occupied` DATE NOT NULL,
	`account_number` INT UNSIGNED NOT NULL,
	`room_number` INT UNSIGNED NOT NULL,
	`rate_applied` DOUBLE,
	`phone_charge` DOUBLE,
	`notes` VARCHAR(128)
);

INSERT INTO `occupancies`
		(`employee_id`, `date_occupied`, `account_number`, `room_number`)
	VALUES
		(1, DATE(NOW()), 1, 1),
		(2, DATE(NOW()), 2, 2),
		(3, DATE(NOW()), 3, 3);

/*Create SoftUni Database */
CREATE TABLE `towns`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL
);

CREATE TABLE `addresses`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `address_text` TEXT DEFAULT NULL ,
  `town_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `FK_Town_Id` FOREIGN KEY (`town_id`) REFERENCES `towns`(`id`)
);

CREATE TABLE `departments`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL
);

CREATE TABLE `employees`(
  `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `first_name` VARCHAR(20) NOT NULL ,
  `middle_name` VARCHAR(20) NOT NULL ,
  `last_name` VARCHAR(20) NOT NULL ,
  `job_title` VARCHAR(20) NOT NULL ,
  `department_id` INT UNSIGNED NOT NULL ,
  `hire_date` DATE NOT NULL,
  `salary` FLOAT NOT NULL,
  `address_id` INT UNSIGNED NOT NULL,
  CONSTRAINT `FK_Department_Id` FOREIGN KEY (`department_id`) REFERENCES `departments`(`id`),
  CONSTRAINT `FK_Address_Id` FOREIGN KEY (`address_id`) REFERENCES `addresses`(`id`)
);



