<?php

require_once "connection.php";


$upit_insert = [];

$upit_insert[] = 
[
    'id' =>1,
    'upit' => 
    "
    INSERT INTO `reziser` 
    VALUE 
    (1,'Jovan','Jovanovic',1),
    (2,'Svetlana','Gojkovic',0),
    (3,'Voja','Ilic',1),
    (4,'Natasa','Natasic',0);

    ",
    'opis' => 'Unos rezisera'
];

$upit_insert[] = 
[
    'id' =>2,
    'upit' => 
    "
    INSERT INTO `zanrovi` 
    VALUE 
    (1,'drama'),
    (2,'ljubavni'),
    (3,'horor'),
    (4,'vestern');

    ",
    'opis' => 'Unos zanrova'
];

$upit_insert[] = 
[
    'id' =>3,
    'upit' => 
    "
    INSERT INTO `filmovi` 
    VALUE 
    (1,'Varljivo leto',1968,10,1),
    (2,'Mrak film',2003,5.5,2),
    (3,'Farma',2011,3,4),
    (4,'Otpisani',1976,8.9,3),
    (5,'Sutjeska',1950,6.7,2),
    (6,'Dobar los zao',1962,9.1,4),
    (7,'Tamo daleko',1968,7.7,1);

    ",
    'opis' => 'Unos filmova'
];

$upit_insert[] = 
[
    'id' =>4,
    'upit' => 
    "
    INSERT INTO `film_zanr` 
    VALUE 
    (1,1),
    (2,3),
    (3,2),
    (4,1),
    (5,1),
    (6,4),
    (7,4);

    ",
    'opis' => 'Unos film_zanr'
];

$izvrseni = $connection -> query("SELECT `id` FROM `insert_provera`;");
$arr = $izvrseni -> fetch_all(MYSQLI_ASSOC);
$ids= [];

foreach($arr as $value)
{
    $ids[] = $value['id'];
}

if(count($upit_insert) != count($ids))
{
    foreach($upit_insert as $value)
    {
        if(!in_array($value['id'],$ids))
        {
            $r = $connection->query($value['upit']);
            if($r)
            {
                $r2 = $connection->query("INSERT INTO `insert_provera`
                VALUE (". $value['id']. ",'" .$value['opis']  ."')");
                if(!$r2)
                {
                    echo "Doslo je do greske ". $connection->error;
                    break;
                }
            }
        }
    }
}



























?>