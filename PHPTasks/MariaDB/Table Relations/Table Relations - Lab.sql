/*Mountains and Peaks*/
CREATE TABLE `mountains`(
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR(50) NOT NULL
);

CREATE TABLE `peaks`(
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR(50) NOT NULL,
  `mountain_id` INT UNSIGNED NOT NULL ,
  CONSTRAINT `fk_mountain_id`
  FOREIGN KEY (`mountain_id`) REFERENCES `mountains`(`id`)
);

/*Trip Organization */
SELECT `driver_id`,
       `vehicle_type`,
       CONCAT(`first_name`,' ',`last_name`) AS `driver_name`
FROM `vehicles` AS `v`
JOIN
         `campers` AS `c` ON `v`.`driver_id` = `c`.`id`;

/*SoftUni Hiking */
SELECT `starting_point` AS 'route_starting_point',
       `end_point` AS 'route_ending_point',
       `leader_id`,
       CONCAT(`first_name`,' ',`last_name`) AS `leader_name`
FROM `routes` AS `r`
JOIN `campers` AS `c` ON `r`.`leader_id` = `c`.`id`;


