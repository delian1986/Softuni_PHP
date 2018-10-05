/*PHP WEB September 2018 Introduction to MySQL - Exercise*/
/*https://judge.softuni.bg/Contests/Compete/Index/1274#0*/

CREATE DATABASE `exercise`;
USE `exercise`;

/*Create two tables*/
CREATE TABLE `minions`(
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL ,
  `age` TINYINT DEFAULT NULL ,
  `town_id` INT NOT NULL
);

CREATE TABLE `towns`(
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL
);

/*Fill tables*/
INSERT INTO `towns`(name)
VALUES('Sofia'),
      ('Plovdiv'),
      ('Varna');

INSERT INTO `minions` (name, age, town_id)
VALUES ('Kevin',22,1),
       ('Bob',15,3),
       ('Steward',NULL ,2);

/*Truncate table `minions`*/
TRUNCATE TABLE `minions`;

/*Drop tables*/
DROP TABLE `minions`,`towns`;

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

/*Create Table Users*/
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

/*Change Primary Key*/
ALTER TABLE `users` DROP PRIMARY KEY ,
ADD PRIMARY KEY (`id`,`username`);

/*DATABASE soft_uni*/
/*Find All Information About Departments*/
SELECT * FROM `departments`
ORDER BY `department_id`;

/*Find all Department Names */
SELECT `name` FROM `departments`
ORDER BY `department_id`;

/*Find Salary of Each Employee*/
SELECT `first_name`,`last_name`,`salary` FROM `employees`
ORDER BY `employee_id`;

/*Find Full Name of Each Employee*/
SELECT `first_name`,`middle_name`,`last_name` FROM `employees`
ORDER BY `employee_id`;

/*Find Email Address of Each Employee */
SELECT CONCAT(`first_name`,'.',`last_name`,'@softuni.bg')
AS 'full_ email_address'
FROM `employees`;

/*Find All Different Employee’s Salaries */
SELECT DISTINCT `salary` FROM `employees`
ORDER BY `salary`;

/*Find all Information About Employees */
SELECT * FROM `employees` WHERE `job_title`='Sales Representative'
ORDER BY `employee_id`;

/*Find Names of All Employees by Salary in Range */
SELECT `first_name`,`last_name`,`job_title` FROM employees
WHERE `salary`>=20000 AND `salary`<=30000
ORDER BY `employee_id`;

/*Find Names of All Employees */
SELECT CONCAT(`first_name`,' ',`middle_name`,' ',`last_name`) AS `Full Name`
FROM `employees` WHERE `salary`=25000
OR `salary`=14000
OR `salary`=12500
OR `salary`=23600;

/*Find All Employees Without Manager */
SELECT `first_name`,`last_name` FROM `employees`
WHERE `manager_id` IS NULL ;

/*Find All Employees with Salary More Than */
SELECT `first_name`,`last_name`,`salary` FROM `employees`
WHERE `salary`>50000
ORDER BY `salary` DESC ;

/*Find 5 Best Paid Employees */
SELECT `first_name`,`last_name` FROM `employees`
ORDER BY `salary` DESC LIMIT 5;

/*Find All Employees Except Marketing */
SELECT `first_name`,`last_name` FROM `employees`
WHERE `department_id`!=4;

/*Sort Employees Table */
SELECT * FROM `employees`
ORDER BY `salary` DESC ,
         `first_name`,
         `last_name` DESC ,
         `middle_name`;

/*Distinct Job Titles */
SELECT DISTINCT `job_title` FROM `employees`
ORDER BY `job_title`;

/*Find First 10 Started Projects	*/
SELECT `project_id`,`name`,`description`,`start_date`,`end_date` FROM projects
ORDER BY `start_date`,
         `name`,
         `project_id`
LIMIT 10;

/*Last 7 Hired Employees	*/
SELECT `first_name`,`last_name`,`hire_date` FROM employees
ORDER BY `hire_date` DESC
LIMIT 7;

/*Increase Salaries*/
UPDATE `employees` SET `salary`=salary+salary*0.12
WHERE `department_id`=1
OR `department_id`=2
OR `department_id`=4
OR `department_id`=11;
SELECT `salary` FROM `employees`;

/*Geography Database*/
/*All Mountain Peaks */
SELECT `peak_name` FROM `peaks` ORDER BY `peak_name`;

/*Biggest Countries by Population */
SELECT `country_name`,`population` FROM `countries`
WHERE `continent_code`= 'EU'
ORDER BY `population` DESC ,
         `country_name`
LIMIT 30;

/*Countries and Currency (Euro / Not Euro)*/
SELECT `country_name`,`country_code`,
IF(`currency_code`='EUR','Euro','Not Euro') AS `currency`
FROM `countries`
ORDER BY `country_name`;

