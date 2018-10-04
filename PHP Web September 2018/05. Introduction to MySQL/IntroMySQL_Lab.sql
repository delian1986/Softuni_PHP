/*Create database*/
CREATE DATABASE `softuni`;

/*Create Table students*/
CREATE TABLE `students`(
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL ,
  last_name VARCHAR(50) NOT NULL ,
  phone INT NOT NULL ,
  date_of_record DATETIME NOT NULL ,
  date_of_last_change TIMESTAMP NOT NULL ,
  is_active BOOL NOT NULL
);

/*Drop table*/
DROP TABLE `students`;

/*Drop Database*/
DROP DATABASE `softuni`;
