<?php

require_once "connection.php";



$upiti[] =
    [
        'id' => 1,
        'upit' => "CREATE TABLE IF NOT EXISTS `reziser`
        (
            id INT UNSIGNED PRIMARY KEY,
            ime VARCHAR(50),
            prezime VARCHAR(50),
            pol CHAR(1)
        )ENGINE = INNODB;",
        'opis' => "Dodavanje tabele reziser"

    ];
$upiti[] =
    [
        'id' => 2,
        'upit' => "CREATE TABLE IF NOT EXISTS `filmovi`
        (
            id INT UNSIGNED PRIMARY KEY,
            naslov VARCHAR(100),
            godina SMALLINT UNSIGNED,
            ocena DECIMAL(6,2),
            reziser_id INT UNSIGNED,
            FOREIGN KEY (`reziser_id`)
            REFERENCES `reziser`(`id`)
            ON DELETE NO ACTION ON UPDATE CASCADE
        )ENGINE =INNODB;",
        'opis' => "Dodavanje tabele filmovi"
    ];

$upiti[] =
    [
        'id' => 3,
        'upit' => "CREATE TABLE IF NOT EXISTS `zanrovi`
    (
        id INT UNSIGNED PRIMARY KEY,
        naziv VARCHAR(50)
    )ENGINE =INNODB;",
        'opis' => "Dodavanje tabele zanrovi"
    ];

$upiti[] =
    [
        'id' => 4,
        'upit' => "CREATE TABLE  IF NOT EXISTS `film_zanr`
    (
        film_id INT UNSIGNED,
        zanr_id INT UNSIGNED,
        PRIMARY KEY (film_id, zanr_id),
        FOREIGN KEY (`film_id`)
        REFERENCES `filmovi`(`id`)
        ON DELETE NO ACTION ON UPDATE CASCADE,
        FOREIGN KEY (`zanr_id`)
        REFERENCES `zanrovi`(`id`)
        ON DELETE NO ACTION ON UPDATE CASCADE
    )ENGINE = INNODB;",
        'opis' => "Dodavanje tabele film_zanr"
    ];

$upiti[] =
    [
        'id' => 5,
        'upit' => "CREATE TABLE IF NOT EXISTS `insert_provera`
        (
         id INT NOT NULL,
         opis VARCHAR(50)
        );",
        'opis' => "Dodavanje tabele insert_provera"
    ];

$upiti[] =
    [
        'id' => 6,
        'upit' => "CREATE TABLE  IF NOT EXISTS `db_update`
     (
         id INT(10) UNSIGNED PRIMARY KEY,
        opis VARCHAR (255) NOT NULL
     );",
     'opis' => "Dodavanje tabele db_update"
    ];

$db_update = $connection->query("CREATE TABLE  IF NOT EXISTS `db_update`
                                (
                                    id INT(10) UNSIGNED PRIMARY KEY,
                                opis VARCHAR (255) NOT NULL
                                );");
$izvrseni = $connection->query("SELECT `id` FROM `db_update`;");

$arr = $izvrseni->fetch_all(MYSQLI_ASSOC);
$ids = [];
foreach ($arr as $value) {
    $ids[] = $value['id'];
}

if (count($upiti) == count($ids)) {
    echo "Svi upiti su izvrseni";
} else {
    foreach ($upiti as $u) {
        if (!in_array($u['id'], $ids)) {
            $r = $connection->query($u['upit']);
            if ($r) {
                $r2 = $connection->query("INSERT INTO `db_update` VALUES ("   . $u['id'] .  "  , ' " . $u['opis'] . "');");

                if (!$r2) {
                    echo "Doslo je do greske :" . $connection->error;
                    break;
                }
            } else {
                echo "<p style='color:red;'>Doslo je do greske prilikom izvrsavanja naredbe.</p>";
            }
        }
    }
}
