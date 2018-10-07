--Built-in Functions - Exercise
--https://judge.softuni.bg/Contests/Practice/Index/295#0

--soft_uni database
/*Find Names of All Employees by First Name */
SELECT `first_name`,`last_name` FROM `employees`
WHERE `first_name` LIKE 'Sa%'
ORDER BY `employee_id`;

/*Find Names of All Employees by Last Name*/
SELECT `first_name`,`last_name` FROM `employees`
WHERE `last_name` LIKE '%ei%'
ORDER BY `employee_id`;

/*Find First Names of All Employess */
SELECT `first_name` FROM `employees`
WHERE `department_id` IN (3,10)
  AND YEAR(`hire_date`)>=1995
  AND YEAR(`hire_date`)<=2005
ORDER BY `employee_id`;

/*Find All Employees Except Engineers*/
SELECT `first_name`,`last_name` FROM `employees`
WHERE `job_title` NOT LIKE '%engineer%'
ORDER BY `employee_id`;

/*Find Towns with Name Length */
SELECT `name` FROM `towns`
WHERE CHAR_LENGTH(`name`) IN(5,6)
ORDER BY `name`;

/*Find Towns Starting With */
SELECT `town_id`,`name` FROM `towns`
WHERE `name` REGEXP '^[MmKkBbEe]'
ORDER BY `name`;

/*Find Towns Not Starting With */
SELECT `town_id`,`name` FROM `towns`
WHERE `name` REGEXP '^[^RrBbDd]'
ORDER BY `name`;

/*Create View Employees Hired After */
CREATE VIEW `v_employees_hired_after_2000` AS
SELECT `first_name`,`last_name` FROM `employees`
  WHERE YEAR(`hire_date`)>2000;

SELECT * FROM `v_employees_hired_after_2000`;

/*Length of Last Name */
SELECT `first_name`,`last_name` FROM `employees`
WHERE CHAR_LENGTH(`last_name`)=5
ORDER BY `employee_id`;

--geography_db
/*Countries Holding 'A' */
SELECT `country_name`,`iso_code` FROM `countries`
WHERE `country_name` LIKE '%A%A%A%'
ORDER BY `iso_code`;

/*Mix of Peak and River Names */
SELECT `peak_name`,`river_name`,
       LOWER(CONCAT(`peak_name`,SUBSTR(`river_name`,2))) AS 'mix'
FROM `peaks`,`rivers`
WHERE LOWER(RIGHT(`peak_name`,1)) = LOWER(LEFT(`river_name`,1))
ORDER BY `mix`;

--diablo_db
/*Games From 2011 and 2012 Year */
SELECT `name`,DATE_FORMAT(`start`,'%Y-%m-%d') AS 'start'
FROM `games`
WHERE YEAR(`start`) >=2011 AND YEAR(`start`)<=2012
ORDER BY `start`
LIMIT 50;

/*User Email Providers */
SELECT `user_name`,SUBSTRING_INDEX(`email`,'@',-1) AS 'email provider'
FROM `users`
ORDER BY `email provider`,
`user_name`;

/*Get Users with IP Address Like Pattern */
SELECT `user_name`,`ip_address` FROM `users`
WHERE `ip_address` LIKE '___.1%.%.___'
ORDER BY `user_name`;

/*Show All Games with Duration */
SELECT `name` AS 'game',
       CASE
         WHEN HOUR(`start`) BETWEEN 0 AND 11 THEN 'Morning'
         WHEN HOUR(`start`) BETWEEN 12 AND 17 THEN 'Afternoon'
         ELSE 'Evening'
           END AS 'Part of the Day',
       CASE
         WHEN `duration` <= 3 THEN 'Extra Short'
         WHEN `duration` > 3 AND `duration` <= 6 THEN 'Short'
         WHEN `duration` > 6 AND `duration` <= 10 THEN 'Long'
         ELSE 'Extra Long'
           END AS 'Duration'
FROM `games`
ORDER BY `name`;

/*Orders Table */
--orders_db
SELECT `product_name`,`order_date`,
       DATE_ADD(`order_date`,INTERVAL 3 DAY ) AS `pay_due`,
       DATE_ADD(`order_date`,INTERVAL 1 MONTH ) AS `deliver_due`
FROM `orders`;