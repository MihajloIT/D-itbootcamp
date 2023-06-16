<?php
// Cim treba da koristimo sesiju, mora ova funkcija da se pozove
session_start(); // Ova f-ija treba na pocetku da se pozove

if(isset($_SESSION["id"]))
{
    header("Location: index.php");
}


require_once "connection.php";

$usernameError = "*";
$passwordError = "*";
$username = "";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Korisnik je poslao username i password i pokusava logovanje
    $username= $connection->real_escape_string($_POST["username"]);
    $password = $connection-> real_escape_string($_POST["password"]);

    if(empty($username))
    {
        $usernameError = "Username cannot be blank!";
    }
    if(empty($password))
    {
        $passwordError = "Password cannot be blank!";
    }
    if($usernameError == "*" && $passwordError == "*")
    {
        // onda moze da se loguje korisnik ako se sve podudara

        
    $q = "SELECT * FROM `users` WHERE `username` = '$username' ";
    $result = $connection -> query($q);
    $result1 = $result->num_rows;
    if($result1 == 0)
    {
        $usernameError = "This username doesn't exist !";
    }else
    {
        // Postoji takav korisnik, proveriti lozinku
        $row = $result -> fetch_assoc();
        $dbPassword = $row["password"];
        if(!password_verify($password, $dbPassword))
        {
            // Poklopili su se usern name ali pass nije dobar
            $passwordError = "Wrong password, try again!";
        }
        else
        {
            // Dobri su i username i password, izvrisi logovanje
            $_SESSION["id"] = $row['id'];
            $_SESSION["username"] = $row["username"];
            header("Location: index.php"); // ovde redirektujemo korisnika
            exit();
        }
    }



    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <h1>Please login</h1>
    <form action="#" method="post">
        <p>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" value="<?php echo $username;  ?>">
        <span class="error "><?php echo $usernameError;  ?></span>
        </p>
        <p>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
            <span class="error"><?php echo $passwordError;  ?></span>
        </p>
        <p>
            <input type="submit" name="submit" value="login">
        </p>

    </form>

</body>

</html>