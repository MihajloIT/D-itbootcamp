CREATE DATABASE `videoteka` CHARACTER SET utf16 COLLATE utf16_slovenian_ci;

CREATE TABLE `filmovi`
(
    id INT PRIMARY KEY,
    naslov VARCHAR(255) NOT NULL,
    reziser VARCHAR(255) NOT NULL,
    god_izdanja YEAR NOT NULL,
    zanr VARCHAR(255) NOT NULL,
    ocena DECIMAL(4,2)
);



INSERT INTO `filmovi`
(id, naslov, reziser, god_izdanja, zanr, ocena)
VALUE 
(1, "Gospodar Prestena", "Tolkin", 2003, "drama", 9.5),
(2, "Hari Poter", "Peter", 2008, "drama", 8.8),
(3, "Gospodin i gospodja Smith", "Zika", 2012, "komedija", 7.7),
(4, "Titanik", "Toma", 1998, "tragedija", 10),
(5, "Spasavanje vojnika Rajena", "Stive", 1988, "tragedija", 6.5),
(6, "Trula cula", "Jovan", 2003, "komedija", 10),
(7, "Saw", "N N", 2003, "horor", 7.5),
(8, "Limitless", "Zoran", 2010, "psiho", 4.8),
(9, "Interstellar", "Christoplher Nolan", 2014, "komedija", 10),
(10, "Zikina Dinastija", "Tolkin", 2003, "komedija", 3.5),
(11, "Hangover", "Jovan", 2003, "triler", 2.4),
(12, "Varljivo leto", "Toma", 1988, "naucna fantastika", 10),
(13, "Radovan treci", "Jovan", 1983, "komedija", 10),
(14, "Rob Roj", "Sterija", 1999, "akcija", 10),
(15, "Sky", "George", 1989, "tragedija", 4.8);



--Selektovati sve filmove gde je žanr tragedija, komedija ili drama.
SELECT *
FROM `filmovi`
WHERE `zanr` IN ('tragedija','komedija','drama');

--Selektovati sve filmove kojima je ocena između 5 i 10.
SELECT *
FROM `filmovi`
WHERE `ocena` BETWEEN 5 AND 10;

--Selektovati režisere (bez ponavljanja) koji su režirali filmove izdate 2003. godine i poređati ih abecednim redom. 

SELECT DISTINCT `reziser`
FROM `filmovi`
WHERE `god_izdanja` = 2003
ORDER BY `reziser` ASC;

--Selektovati sve filmove tako da im zanr nije komedija.
SELECT *
FROM `filmovi`
WHERE `zanr` != 'komedija';

--Prikazati sve informacije o najbojle rangiranom filmu
SELECT *
FROM `filmovi`
WHERE `ocena` = (SELECT MAX(`ocena`) FROM `filmovi`);

--Prikazati sve informacije o najbolje rangiranoj drami.
SELECT *
FROM `filmovi`
WHERE `zanr` = 'drama' AND `ocena` = (SELECT MAX(`ocena`) FROM `filmovi` WHERE `zanr` = 'drama');

--Selektovati trojicu rezisera ciji filmovi imaju najbolje ocene.
SELECT DISTINCT `reziser`
FROM `filmovi`
WHERE `ocena` = (SELECT MAX(`ocena`) FROM `filmovi`)
LIMIT 3;

--Selektovati sve žanrove filmova, bez ponavljanja.
SELECT DISTINCT `zanr`
FROM `filmovi`;

--Selektovati sve filmove u obliku naslov (režiser).
SELECT CONCAT(`naslov`, ' (',`reziser`,')') AS FILMOVI
FROM `filmovi`;

--Selektovati sve filmove u obliku naslov (režiser) – godina izdanja. Selektovane filmove sortirati rastuće prema godini izdanja.
SELECT CONCAT(`naslov`, ' (',`reziser`,')',' -',`god_izdanja`) AS FILMOVI
FROM `filmovi`;

--Odrediti prosečnu ocenu fimova koji su izdati nakon 2000 godine
SELECT AVG(`ocena`)
FROM `filmovi`
WHERE `god_izdanja` > 2000;
