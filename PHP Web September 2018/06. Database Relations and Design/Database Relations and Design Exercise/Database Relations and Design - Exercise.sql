/*Database Relations and Design - Exercise*/
--https://judge.softuni.bg/Contests/Compete/Index/1284#0

--gringotts db
/*Records’ Count*/
SELECT COUNT(*) FROM `wizzard_deposits`;

/*Longest Magic Wand */
SELECT MAX(`magic_wand_size`) FROM `wizzard_deposits`;

/*Longest Magic Wand per Deposit Groups */
SELECT `deposit_group`,
       MAX(`magic_wand_size`) AS 'longest_magic_wand'
FROM `wizzard_deposits`
GROUP BY `deposit_group`
ORDER BY `longest_magic_wand`,
`deposit_group`;

/*Smallest Deposit Group per Magic Wand Size*/
SELECT `deposit_group`
FROM `wizzard_deposits`
GROUP BY `deposit_group`
ORDER BY AVG(`magic_wand_size`)
LIMIT 1;

/*Deposits Sum */
SELECT `deposit_group`,
       SUM(`deposit_amount`) AS 'total_sum'
FROM `wizzard_deposits`
GROUP BY `deposit_group`
ORDER BY `total_sum`;


--restaurant_db
/*Appetizers Count */
SELECT COUNT(*) FROM `products`
WHERE `category_id`=2
AND `price`>8;

/*Menu Prices */
SELECT `category_id`,
       ROUND(AVG(`price`),2) AS 'Average Price',
       ROUND(MIN(`price`),2) AS 'Cheapest Product',
       ROUND(MAX(`price`),2) AS 'Most Expensive Product'
FROM `products`
GROUP BY `category_id`
ORDER BY `category_id`;

/*Employee Address */
SELECT `employee_id`,
       `job_title`,
       `e`.`address_id`,
       `a`.`address_text`
FROM `employees` AS `e`
JOIN `addresses` AS `a` ON `e`.`address_id`=`a`.`address_id`
ORDER BY a.`address_id`
LIMIT 5;

/*Employee Departments */
SELECT `employee_id`,
       `first_name`,
       `salary`,
       d.name
FROM employees AS e
JOIN departments d on e.department_id = d.department_id
WHERE e.salary>15000
ORDER BY d.`department_id` DESC
LIMIT 5;

/*Employees Without Project */
SELECT e.`employee_id`,e.`first_name`
FROM `employees` AS `e`LEFT JOIN `employees_projects` AS `e_p` ON e_p.employee_id=e.employee_id
WHERE e_p.project_id IS NULL
ORDER BY e.employee_id DESC
LIMIT 3;

/*	Employee 24*/
SELECT e.`employee_id`,
       e.`first_name`,
       IF(YEAR (p.start_date)>='2005',NULL,p.name ) AS 'project_name'
FROM employees AS e
JOIN employees_projects AS e_p ON e.employee_id=e_p.employee_id
JOIN projects AS p ON e_p.project_id = p.project_id
WHERE e.employee_id=24
ORDER BY p.name;

/*Employee Manager*/
SELECT e.`employee_id`,
       e.`first_name`,
       e.`manager_id`,
       m.`first_name`
FROM employees AS e
JOIN employees m on e.manager_id = m.employee_id
WHERE e.manager_id IN (3,7)
ORDER BY e.first_name;

/*Employee Summary*/
SELECT
e.employee_id,
       CONCAT_WS(' ',e.first_name,e.last_name) AS 'employee_name',
       CONCAT_WS(' ', m.first_name,m.last_name) AS 'manager_name',
       d.name AS 'departement_name'
FROM `employees` AS `e`
JOIN `employees` AS `m` ON e.manager_id = m.employee_id
JOIN `departments` AS `d` ON e.department_id = d.department_id
ORDER BY e.employee_id
LIMIT 5;