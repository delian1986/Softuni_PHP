CREATE database IF NOT EXISTS my_money_exam;
  USE my_money_exam;
  CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE ,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL ,
    born_on timestamp
  );


CREATE TABLE reasons(
  id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE operations(
  id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  type CHAR NOT NULL ,
  reason_id INT UNSIGNED NOT NULL ,
  sum FLOAT(10,2) NOT NULL DEFAULT '0.00',
  notes VARCHAR(255) NULL ,
  on_date DATETIME DEFAULT NOW(),
  for_date DATETIME NULL ,
  user_id INT UNSIGNED,
  CONSTRAINT fk_operations_reasons FOREIGN KEY (reason_id) REFERENCES reasons(id),
  CONSTRAINT fk_operations_users FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO reasons(name)
VALUES ('Salary'),
       ('Coffee'),
       ('Party'),
       ('Loan');