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


