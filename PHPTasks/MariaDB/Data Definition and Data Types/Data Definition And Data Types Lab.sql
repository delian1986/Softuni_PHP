CREATE DATABASE IF NOT EXISTS `gamebar` DEFAULT CHARACTER SET utf8_general_ci;
USE `gamebar`;

/*CREATE TABLES*/
USE `gamebar`;
CREATE TABLE `employees` (
  `id`         INT AUTO_INCREMENT,
  `first_name` VARCHAR(15) NOT NULL,
  `last_name`  VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `categories`(
  id INT AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`)
);

CREATE TABLE `products`(
  id INT AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL ,
  category_id INT NOT NULL ,
  PRIMARY KEY (`id`)
);

/*Insert Data in Tables */
INSERT INTO `employees` (
    first_name, last_name
    ) VALUES ('Delyan','Marinov'),
             ('Delyan1','Marinov1'),
             ('Delyan2','Marinov2');

/*Alter Table add middle name*/
ALTER TABLE `employees`
  ADD `middle_name` VARCHAR(15);

/*Adding Constraints */
ALTER TABLE `products`
  ADD CONSTRAINT fk_product_category_id FOREIGN KEY
  (category_id) REFERENCES categories (id);

/*Modifying Columns */
ALTER TABLE `employees`
  MODIFY COLUMN `middle_name` VARCHAR(100);

