CREATE DATABASE `store`;

CREATE TABLE `categories`
(
    `id` INT PRIMARY KEY,
    `category_name` VARCHAR (170) NOT NULL,
    `description` VARCHAR (200)
)ENGINE = INNODB;

CREATE TABLE `products`
(
    `id` INT PRIMARY KEY,
    `product_name` VARCHAR (200) NOT NULL,
    `price` DECIMAL (10,2) DEFAULT 0
)ENGINE = INNODB;

CREATE TABLE `product_categories`
(
    `id` INT PRIMARY KEY,
    `id_product` INT ,
    `id_category` INT 
);

ALTER TABLE `product_categories`
ADD CONSTRAINT `product_has_fk`
FOREIGN KEY (`id_product`)
REFERENCES `products`(`id`)
ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `categories_has_fk`
FOREIGN KEY (`id_category`)
REFERENCES `categories`(`id`)
ON DELETE NO ACTION ON UPDATE NO ACTION;


INSERT INTO `categories`
VALUE
(1,'Visoko gradnja','Dizalice teska oprema'),
(2,'Niska gradnja','Mehanizacija'),
(3,'House oprema','Kucni alati i alati za popravke'),
(4,'Garden','Sva oprema za odrzavanje baste');

INSERT INTO `products`
VALUE
(1,'Visoke dizalice',2000000),
(2,'Valjak',300000),
(3,'Cetka za krecenje',5),
(4,'Akrilna farba',10),
(5,'Kosilica za travu',140),
(6,'Bager',250000),
(7,'Shipovi',50000),
(8,'Cekic',12),
(9,'Kolica za bastu',70);

INSERT INTO `product_categories`
VALUE 
(1,1,1),
(2,2,2),
(3,3,3),
(4,4,3),
(5,5,4),
(6,6,2),
(7,7,1),
(8,8,3),
(9,9,4);

-- NAKNADNO PROSIRIO BAZU
INSERT INTO `products`
VALUE
(10,'Cesalj za zivu ogradu',2),
(11,'Fontana',550),
(12,'Ograda za dvoriste',5000);

INSERT INTO `product_categories`
VALUE 
(10,10,4),
(11,11,4),
(12,12,4);

SELECT 
`categories`.`category_name`,
`products`.`product_name`
FROM `product_categories`
LEFT JOIN `categories` ON `product_categories`.`id_category` = `categories`.`id`
LEFT JOIN `products` ON `product_categories`.`id_product` = `products`.`id`
ORDER BY `categories`.`category_name` ASC;


SELECT 
`categories`.`category_name`,
`products`.`product_name` , `products`.`price`
FROM `product_categories`
LEFT JOIN `categories` ON `product_categories`.`id_category` = `categories`.`id`
LEFT JOIN `products` ON `product_categories`.`id_product` = `products`.`id`
WHERE `products`.`price` > (SELECT AVG(`products`.`price`) FROM `products`);


SELECT 
`categories`.`category_name`,
`products`.`product_name` , `products`.`price`
FROM `product_categories`
LEFT JOIN `categories` ON `product_categories`.`id_category` = `categories`.`id`
LEFT JOIN `products` ON `product_categories`.`id_product` = `products`.`id`
WHERE `categories`.`category_name` = 'Garden'
ORDER BY `products`.`price` DESC
LIMIT 1;

