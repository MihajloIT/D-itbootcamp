<?php
session_start();
require_once "connection.php";
require_once "validation/validation.php";

if (empty($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
$id = $_SESSION['id'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_pass'];
    $retyle_new = $_POST['re_pass'];

    // var_dump($username); Ovo je za testiranje da li post radi
    // var_dump($password);
    // var_dump($retyre);

    //1) Validacija za $username
    $oldPasswordError = usernameValidation($old_password, $connection);
    //2) Validacija za $password
    $newPasswordError = passwordValidation($new_password);
    //3) Validacija za $retyre
    $newRetypeError = passwordValidation($retyle_new);
    if($new_password !== $retyle_new )
    {
        $newRetypeError = "You must enter two same passwords.";
    }
    $stored_password = "SELECT `password`
                        FROM `users`
                        WHERE `id` = $id";
    $stored_query = $connection->query($stored_password);
    $stored_row = $stored_query->fetch_assoc();
    
    // $validation = password_verify($old_password,$stored_row);
    // if(!$validation)
    // {
    //     echo "Greskaa";
    // }
    
   
        
    //4) Ako su sva polja validna dodati korisnika
    if($oldPasswordError === "" && $newPasswordError === "" && $newRetypeError === "")
    {
        
        // print_r($connection);
        $hash = password_hash($new_password, PASSWORD_DEFAULT);
        
        $q = " UPDATE `users`
               SET `password` = '$hash'
               WHERE `id` = $id;
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
    <title>Document</title>
</head>
<body>
    
<form action="#" method="post">
    <h3>Reset password</h3>
    <label for="">Old password : </label>
    <input type="text" name="old_password"><br>
    <label for="">New password : </label>
    <input type="text" name="new_pass"><br>
    <label for="">Retype password : </label>
    <input type="text" name="re_pass"><br>
    <input type="submit" value="Submit">
</form>




</body>
</html>