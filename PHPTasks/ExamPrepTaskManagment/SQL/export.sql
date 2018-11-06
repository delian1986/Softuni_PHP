CREATE DATABASE `exam_prep`;
use exam_prep;

create table users(
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL UNIQUE ,
  password VARCHAR(255) NOT NULL,
  first_name VARCHAR(255) NOT NULL ,
  last_name VARCHAR(255) NOT NULL
);


CREATE table categories(
  id INT AUTO_INCREMENT PRIMARY KEY ,
  type VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO categories(type)
VALUES
       ('Anniversary'),
       ('Birthday'),
       ('Business');

CREATE TABLE tasks(
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL ,
  description TEXT not null,
  location VARCHAR(100) not null ,
  author_id INT not null ,
  category_id INT not null ,
  started_on DATE null ,
  due_date DATE null,
  FOREIGN KEY (author_id) REFERENCES users(id),
  FOREIGN KEY (category_id) REFERENCES categories(id)
);