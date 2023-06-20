<?php

// Ne dozvoljavamo pristup ovoj stranici logovanim korisnicima
session_start();
if(isset($_SESSION["id"]))
{
    header("Location: index.php");
}

require_once "connection.php";
require_once "validation/validation.php";


$usernameError = "";
$passwordError = "";
$retypeError = "";
$username = "";
$password = "";
$retype = "";
// var_dump($_SERVER);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $retype = $_POST['retype'];

    // var_dump($username); Ovo je za testiranje da li post radi
    // var_dump($password);
    // var_dump($retyre);

    //1) Validacija za $username
    $usernameError = usernameValidation($username, $connection);
    //2) Validacija za $password
    $passwordError = passwordValidation($password);
    //3) Validacija za $retyre
    $retypeError = passwordValidation($retype);
    if($password !== $retype)
    {
        $retypeError = "You must enter two same passwords.";
    }
   
        
    //4) Ako su sva polja validna dodati korisnika
    if($usernameError === "" && $passwordError === "" && $retypeError === "")
    {
        
        // print_r($connection);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        print_r($hash);
        $q = "INSERT INTO `users`  
        VALUES
        (  null,          
        '". $username ."',
         '".$hash."');
        ";
        $execute = $connection -> query($q);
       
        if($execute)
        {
            // Kreirali smo novog korisnika, vodi ga na stranicu za logovanje
            //ubacio ?p=ok da ne bi prenosio celu poruku
            header("Location: index.php?p=ok");
        }
        else
        {
            header("Location: error.php?".http_build_query(['m'=> "Greska kod kreiranje usera"]));
        }
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
</head>

<body class="register-body">
<a href="index.php">
            <h1>Stratton Oakmont</h1>
        </a>
<div class="row">
<div class="col-6">
            <picture class="register-pic">
                <img src="img/business3.jpg" alt="">
            </picture>
        </div>
    <div class="register col-6">
        <div class="register-form">
    <h1>Register here</h1>
    <form action="#" method="POST">
    <p>
        <label for="username">Username : </label>
        <input type="text" class="text" name="username" id="username" value="<?php echo $username; ?>">
        <span class="error">* <?php echo $usernameError; ?></span>
    </p>
    <p>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
        <span class="error">* <?php echo $passwordError; ?></span>
    </p>
    <p>
        <label for="retpy_password">Retype password : </label>
        <input type="password" name="retype" id="retype" value="">
        <span class="error">* <?php echo $retypeError; ?></span>
        
    </p>
    <input id="button" type="submit" value="Register me!">
    </form>
    </div>
    </div>
    
    </div>







<!-- Java svript    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>