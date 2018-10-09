--JAVA INSTANCE MySQL Basic CRUD - Exercise https://judge.softuni.bg/Contests/Practice/Index/294#0
/*VIEWS*/
/*Create View Employees with Salaries*/
CREATE VIEW `v_employees_salaries` AS
  SELECT `first_name`,`last_name`,`salary`
  FROM `employees`;
SELECT * FROM `v_employees_salaries`;

/*Create View Employees with Job Titles */
CREATE VIEW `v_employees_job_titles` AS
SELECT CONCAT(`first_name`,' ',IFNULL(`middle_name`,''),' ',`last_name`) AS `full_name`,`job_title`
  FROM `employees`;
SELECT * FROM `v_employees_job_titles`;

