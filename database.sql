CREATE DATABASE IF NOT EXISTS `php_oop_contacts`;

CREATE TABLE IF NOT EXISTS `php_oop_contacts`.`contacts`( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `first_name` VARCHAR(255) NOT NULL , 
    `last_name` VARCHAR(255) NOT NULL , 
    `number` INT NOT NULL , 
    `date_created` INT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB; 

INSERT INTO `php_oop_contacts`.`contacts` (`id`, `first_name`, `last_name`, `number`, `date_created`) VALUES 
(NULL, 'Contact Firstname', 'Contact Lastname', '111', 1587032110),
(NULL, 'Firstname', 'Lastname', '222', 1587032110),
(NULL, 'Contact Firstname', 'Contact Lastname', '333', 1587032110);
