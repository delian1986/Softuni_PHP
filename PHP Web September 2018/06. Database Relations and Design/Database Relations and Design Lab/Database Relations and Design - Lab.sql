-- Database Relations and Design - Lab, PHP WEB September 2018

--restaurant_db
--Aggregate Functions
/*Departments Info */
SELECT `department_id`,
       COUNT(`department_id`) AS 'Number of employees'
FROM `employees`
GROUP BY `department_id`
ORDER BY `department_id`;

/*Average Salary */
SELECT `department_id`,
       ROUND(AVG(`salary`),2) AS 'Average Salary'
FROM `employees`
GROUP BY `department_id`
ORDER BY `department_id`;

--Subqueries and JOINs
--soft_uni db

/*Addresses with Towns*/
SELECT `first_name`,
       `last_name`,
       `t`.`name`,
       `address_text`
FROM
     `employees` AS `e`
JOIN `addresses` AS a ON `a`.address_id=`e`.`address_id`
JOIN `towns` AS t ON `t`.town_id=`a`.town_id
ORDER BY `first_name`,
`last_name`
LIMIT 5;

/*Sales Employee */
SELECT `employee_id`,
       `first_name`,
       `last_name`,
       d.name
FROM
     soft_uni.`employees` AS `e`
INNER JOIN departments AS `d` ON e.department_id = d.department_id
WHERE d.name='Sales'
ORDER BY employee_id DESC

/*Employees Hired After */
SELECT `first_name`,
       `last_name`,
       e.`hire_date`,
       `d`.`name` AS 'dept_name'
FROM `employees` AS `e`
JOIN `departments` AS `d` ON e.department_id = d.department_id
WHERE `d`.name IN('Sales','Finance')
AND DATE(e.hire_date)>'1999-01-01'
ORDER BY `e`.`hire_date`;

--geography_db
/*Countries without any Mountains */
SELECT COUNT(*) AS 'country_count'
FROM
     (SELECT
     `mc`.`country_code` AS `mc_country_code`
     FROM `mountains_countries` AS `mc`
     GROUP BY `mc`.country_code) AS `d`
RIGHT JOIN
         `countries` AS `c` ON `c`.`country_code`=`d`.mc_country_code
WHERE
    `d`.mc_country_code IS NULL ;

/*Min Average Salary */
SELECT AVG(`salary`)AS 'avg'
FROM `employees`
GROUP BY `department_id`
ORDER BY `avg`
LIMIT 1;

