<?php

require_once 'db_connection.php';

$usersDb = "CREATE TABLE `users` (
    `user_id` INT NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(100) NOT NULL,
    `agrees_to_terms` BOOLEAN NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE = InnoDB;";

$sectorsDb = "CREATE TABLE `sectors` (
    `sector_id` INT NOT NULL AUTO_INCREMENT,
    `sector_name` VARCHAR(100) NOT NULL,
    `parent_sector_id` INT NULL DEFAULT NULL,
    PRIMARY KEY (`sector_id`)
) ENGINE = InnoDB;";

$userSectorsDb = 'CREATE TABLE `user_sectors` (
    `user_id` INT NOT NULL,
    `sector_id` INT NOT NULL,
    PRIMARY KEY (`user_id`, `sector_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`sector_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;';

try {
    $db->exec($usersDb);
    echo "Users success";

    $db->exec($sectorsDb);
    echo "Sectors success";

    $db->exec($userSectorsDb);
    echo "User sectors success";
} catch (PDOException $e) {
    echo "creation failed: " . $e->getMessage();
}

$db = null;
echo "Connection closed";
?>