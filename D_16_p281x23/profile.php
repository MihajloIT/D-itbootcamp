<?php
session_start();
require_once "connection.php";
require_once "validation/validation.php";
if(!isset($_SESSION["id"]))
{
    header("Location: index.php");
}

$id = $_SESSION["id"];
$firstName = $lastName = $dob = $gender = "";
$firstNameError = $lastNameError = $dobError = $genderError = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $firstName = $connection ->real_escape_string( $_POST["first_name"]);
    $lastName = $connection ->real_escape_string( $_POST["last_name"]);
    $gender = $connection ->real_escape_string( $_POST["gender"]);
    $dob = $connection ->real_escape_string( $_POST["dob"]);

    // Validacija polja
    $firstNameError = nameValidation($firstName);
    $genderError = genderValidation($gender);
    $dobError = dobValidation($dob);
    // Ako je sve u redu, ubacujemo novi red u tabelu `profiles`
    
var_dump($firstName,$dobError);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1> Please fill the profile details</h1>

<form action="#" method= "post">
    <label for="username">Username : </label><br>
    <input type="text" name = "first_name">
    <span class="error">*<?php echo $firstName; ?></span><br>
    <label for="lastname">Last name : </label><br>
    <input type="text" name = "last_name">
    <span class="error">*<?php echo $lastNameError ?></span><br>
    <label for="gener">Gander : </label><br>
    <span>m </span>
    <input type="radio" name="gender" id="gender" value="m"<?php if($gender == "m"){echo "checked";} ?>>
    <span>z </span>
    <input type="radio" name="gender" id="gender" value="z" <?php if($gender == "z"){echo "checked";} ?>>
    <span>o </span>
    <input type="radio" name="gender" id="gender" value="o" <?php if($gender == "o" || $gender == ""){echo "checked";} ?>>
    <span class="error"><?php echo $genderError ?></span><br>
    <label for="dob">Date of birth</label><br>
    <input type="date" name= "dob" id = "dob">
    <span class = "error">* <?php echo $dobError; ?></span>
    <br>
    <input type="submit" value = "submit">

</form>





</body>
</html>