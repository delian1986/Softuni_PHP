/*Data Aggregation - Lab JAVA DB Instance*/
/*https://judge.softuni.bg/Contests/Practice/Index/744#0*/

/*Departments Info*/
SELECT `department_id`,COUNT(`id`) AS 'Number of employees' FROM `employees`
GROUP BY `department_id`
ORDER BY `department_id`,
         `Number of employees`;

/*Average Salary */
SELECT `department_id`, ROUND(AVG(`salary`),2) AS 'Average Salary' FROM `employees`
GROUP BY `department_id`;

/*Minimum Salary */
SELECT `department_id`,
       MIN(`salary`)AS 'Min Salary' FROM `employees`
WHERE `salary`>800
GROUP BY `department_id`
LIMIT 1;

/*Appetizers Count */
SELECT COUNT(`category_id`) FROM `products`
WHERE `category_id`=2 AND `price`>8;

/*Menu Prices */
SELECT `category_id`,
       ROUND(AVG(`price`),2) AS 'Average Price',
       ROUND(MIN(`price`),2) AS 'Cheapest Price',
       ROUND(MAX(`price`),2) AS 'MAx Price'
       FROM `products`
GROUP BY `category_id`
ORDER BY `category_id`;



