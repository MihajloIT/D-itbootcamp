<?php
require_once "connection.php";







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 15px;
        }

        td {
            border: solid 2px black;
            width: 90px;
            height: 40px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <tr>
                <td>Naslov</td>
                <td>Godina</td>
                <td>Ocena</td>
                <td>Ime rezisera</td>
                <td>Prezime rezisera</td>
                <td>Zanr</td>
            </tr>

            <?php
            $query = $connection->query("SELECT * 
            FROM `film_zanr`
            LEFT JOIN `filmovi` ON `film_zanr`.`film_id` = `filmovi`.`id`
            LEFT JOIN `zanrovi` ON `film_zanr`.`zanr_id` = `zanrovi`.`id`
            LEFT JOIN `reziser` ON `reziser`.`id` = `filmovi`.`reziser_id`
            ORDER BY `filmovi`.`naslov` ASC        
            ;");
            $row = $query->fetch_all(MYSQLI_ASSOC);


            foreach ($row as $value) {

            ?>
                <tr>
                    <td><?php echo $value['naslov'] ?></td>
                    <td><?php echo $value['godina'] ?></td>
                    <td><?php echo $value['ocena'] ?></td>
                    <td><?php echo $value['ime'] ?></td>
                    <td><?php echo $value['prezime'] ?></td>
                    <td><?php echo $value['naziv'] ?></td>
                </tr>
            <?php }?>
        </table>        
    </div>




    <?php
    $query = $connection->query("SELECT * 
            FROM `filmovi`
            LEFT JOIN `reziser` ON `reziser`.`id` = `filmovi`.`reziser_id`
            ORDER BY `godina`, `reziser`.`ime` ASC        
            ;");
    $row = $query->fetch_all(MYSQLI_ASSOC);

    $godina = 0;
    foreach ($row as $value) {

        if ($value['godina'] != $godina) {
            $godina = $value['godina'];
             ?>
            <table>
                <tr>
                    <td style="text-align:center;" colspan='3'><?php echo $value['godina'] ?></td>
                </tr>
                <tr>
                    <td>Naslov</td>
                    <td>Ocena</td>
                    <td>Reziser</td>
                </tr>
                <tr>
                    <td><?php echo $value['naslov'] ?></td>
                    <td><?php echo $value['ocena'] ?></td>
                    <td><?php echo $value['ime'] ?></td>
                </tr>



            <?php } else {    ?>
                <tr>
                    <td><?php echo $value['naslov'] ?></td>
                    <td><?php echo $value['ocena'] ?></td>
                    <td><?php echo $value['ime'] ?></td>

                </tr>

          
        <?php } ?>
    <?php } ?>

    </table>

</body>

</html>