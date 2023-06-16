<?php
require_once "connection.php";

$sql = " CREATE TABLE IF NOT EXISTS `users`
        (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(255) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`id`)
        )ENGINE = innodb;";


$sql .= " CREATE TABLE IF NOT EXISTS `profiles`
        (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
            `first_name` VARCHAR(255) NOT NULL,
            `last_name` VARCHAR(255) NOT NULL,
            `gender` CHAR(1),
            `dob` DATE,
            `id_user` INT UNSIGNED NOT NULL UNIQUE ,
            PRIMARY KEY(`id`),
            FOREIGN KEY(`id_user`)
            REFERENCES `users`(`id`)
            ON DELETE CASCADE ON UPDATE NO ACTION

        )ENGINE = innodb;";


if($connection -> multi_query($sql))
{
    echo "<p>Tables created successfully</p>";
}else
{
    header("Location: error.php?m=". $connection->error); 
    // ovde ide samo error ,a ne connect_error je ovo nije za konekciju nego sasvim druga greska
}










?>