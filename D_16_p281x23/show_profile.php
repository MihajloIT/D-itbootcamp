<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

require_once "connection.php";
require_once "validation/validation.php";

// $id = $_SESSION["id"];
$firstName = "";
$lastName = "";
$dob = "";
$gender = "";
$about = "";
$imePrezime = "profile doesn't exist. Please create your profile !";

$mssEmpty = "";
$username = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //$id = $_SESSION['id']; // id logovanog korisnika
    $row = profileExists($id, $connection);
    $q = "SELECT 
    CONCAT(`profiles`.`first_name`,`profiles`.`last_name`) AS 'Ime i prezime',
    `profiles`.`first_name`,`profiles`.`last_name`,`profiles`.`gender`,`profiles`.`dob`,`profiles`.`bio`,
    `users`.`username`
    FROM `profiles` 
    LEFT JOIN `users` ON `users`.`id` = `profiles`.`id_user`
    WHERE `id_user` = $id ";
    $result = $connection -> query($q);
    if($result->num_rows >0)
    {
        while($row = $result->fetch_assoc())
        {
            $imePrezime = $row['Ime i prezime'];
            $username = $row['username'];
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $about = $row['bio'];
        }
    }else
    {
        $mssEmpty = "<p id='par'>Korisnik nema kreiran profila ! </p>";
    }

  
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="show">
<?php require_once "header.php"; ?>

<div>
    <h1>Hello <?php if($imePrezime != ""){ echo '<a href="profile.php?id='.$id.'">'.$imePrezime.'</a>';}else{ echo '<a href="profile.php?id='.$id.'">'.$username.'</a>';} ?></h1>

    <table>
        <tr>
            <td>First Name</td>
            <td style='color:<?php if($gender=='m'){echo "blue";}elseif($gender =='o'){echo "grey";}else{ echo "pink";} ?>'><?php echo $firstName; ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td style='color:<?php if($gender=='m'){echo "blue";}elseif($gender =='o'){echo "grey";}else{ echo "pink";} ?>'><?php echo $lastName; ?></td>
        </tr>
        <tr>
            <td>Username</td>
            <td style='color:<?php if($gender=='m'){echo "blue";}elseif($gender =='o'){echo "grey";}else{ echo "pink";} ?>'><?php  echo $username; ?></td>
        </tr>
        <tr>
            <td>Date of birth</td>
            <td style='color:<?php if($gender=='m'){echo "blue";}elseif($gender =='o'){echo "grey";}else{ echo "pink";} ?>'><?php  echo $dob; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td style='color:<?php if($gender=='m'){echo "blue";}elseif($gender =='o'){echo "grey";}else{ echo "pink";} ?>'><?php echo $gender; ?></td>
        </tr>
        <tr>
            <td>About me</td>
            <td style='color:<?php if($gender=='m'){echo "blue";}elseif($gender =='o'){echo "grey";}else{ echo "pink";} ?>'><?php  echo $about; ?></td>
        </tr>
    </table>
    <p><a href="followers.php">Grab followers</a></p>

</div>
</body>
</html>