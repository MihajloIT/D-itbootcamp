<?php
session_start();
require_once "connection.php";

if (empty($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
$id = $_SESSION['id'];

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members of Social Network</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="follower-body">

<?php  require_once "header.php";  ?>
   
    <div class="row">
        <div class="follow-div col-6">
            <?php
            $q = "SELECT `u`.`id`, `u`.`username`,
            CONCAT(`p`.`first_name`, ' ' ,`p`.`last_name`) AS 'full_name'
            FROM `users` AS `u`
            LEFT JOIN `profiles` AS `p`
            ON `u`.`id` = `p`.`id_user` 
            WHERE `u`.`id` != $id
            ORDER BY `full_name` ASC ";
            $result = $connection->query($q);
            if ($result->num_rows == 0) { ?>
                <div class="error">
                    No other users in database :(
                </div>
            <?php
            } else {
                echo "<table>";
                echo "<tr><th>Name</th><th>Action</th></tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>";
                    if ($row["full_name"] !== null) {
                        echo $row["full_name"] . "<br>";
                    } else {
                        echo $row["username"] . "<br>";
                    }
                    echo "</td><td>";
                    $friendId = $row['id'];
                    echo "<a href='follow.php?friend_id=".$friendId."'>Follow</a>";
                    echo "</td></tr>";
                }
            }
            echo "</table>";
            echo "<br>";
            ?>
        </div>
        <div class="follow-div col-6">
            <picture id="login-pic">
                <a href="index.php"><img src="img/chart.jpg" alt=""></a>
            </picture>
        </div>
    </div>

</body>

</html>