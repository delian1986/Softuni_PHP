/*https://judge.softuni.bg/Contests/735/Built-in-Functions-Lab*/

/*Find Book Titles */
--WildCard way
SELECT `title` FROM `books`
WHERE `title` LIKE 'THE%'
ORDER BY `id` ;

-- SUBSTR way
SELECT `title` FROM `books`
WHERE SUBSTR(`title`,1,3)='The'
ORDER BY `id`;

/*Replace Titles */
SELECT
REPLACE ( `title`,'The','***')
    AS 'title' FROM `books`
WHERE `title` LIKE 'THE%'
ORDER BY `id` ;

/*Sum Cost of All Books */
SELECT ROUND(SUM(`cost`),2) AS 'Total' FROM `books`;

/*Days Lived */
SELECT CONCAT(`first_name`,' ',`last_name`) AS 'Full Name',
DATEDIFF(`died`,`born`) AS 'Days Lived'
FROM `authors`;

/*Harry Potter Books */
SELECT `title` FROM `books`
WHERE `title` LIKE 'Harry Potter%'
ORDER BY `id`;