<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$succsessMassage = "";
$errorMassage = "";

require_once "connection.php";
require_once "validation/validation.php";

$id = $_SESSION["id"];
$firstName = $lastName = $dob = $gender = $resume = "";
$firstNameError = $lastNameError = $dobError = $genderError = "";

//$exists; // ovako smo uveli promenljivu koja nema elemente
$profileRow = profileExists($id, $connection);
if ($profileRow !== false) {
    $firstName = $profileRow["first_name"];
    $lastName = $profileRow["last_name"];
    $gender = $profileRow["gender"];
    $dob = $profileRow["dob"];
    $resume = $profileRow["bio"];
}

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $connection->real_escape_string($_POST["first_name"]);
    $lastName = $connection->real_escape_string($_POST["last_name"]);
    $gender = $connection->real_escape_string($_POST["gender"]);
    $dob = $connection->real_escape_string($_POST["dob"]);
    $resume = $connection->real_escape_string($_POST["resume"]);

    // Validacija polja
    $firstNameError = nameValidation($firstName);
    $genderError = genderValidation($gender);
    $dobError = dobValidation($dob);


    // Ako je sve u redu, ubacujemo novi red u tabelu `profiles`
    if ($firstNameError === "" && $lastNameError === "" && $genderError === "" && $dobError === "") {
        $q = "";
        $exists;
        // if(profileExists($id,$connection) === false) ovo je vezano za $exists varijable ali promenili smo pomocu profilerow 
        if ($profileRow === false) {
            // $exists = false;
            $q = "INSERT INTO `profiles` (`first_name`,`last_name`,`gender`,`dob`,`id_user`,`bio`)
            VALUES 
            (
                '" . $firstName . "' , '" . $lastName . "', '" . $gender . "', '" . $dob . "', " . $id . ", '$resume'
            );";
        } else {
            // $exists = true;
            $q = "UPDATE `profiles`
            SET `first_name` = '$firstName',
            `last_name` = '$lastName',
            `gender` = '$gender',
            `dob` = '$dob',
            `bio` = '$resume'
            WHERE `id_user` = $id;         
            ";
        }

        if ($connection->query($q)) {
            // Uspesno kreiran profil
            if ($profileRow !== false) {
                $succsessMassage = "You have edited your profile";
            }
        } else {
            // Desila se greska u upitu
            $errorMassage = "You have created your profile: ";

        }
    } else {
        echo "You didn't insert profile because you didnt follow construction.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<?php  require_once "header.php";  ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="profile-body">
    <div class="success">
        <?php echo $succsessMassage; ?>
    </div>
    <div class="error">
        <?php echo $errorMassage; ?>
    </div>
    <div class=" row">
        <div class="profile-div col-6">
            <div class="profile">
                <form action="#" method="post">
                    <fieldset>
                        <legend> Create your profile : </legend>
                        <label for="username">Username : </label>
                        <input type="text" name="first_name" value="<?php echo $firstName; ?>">
                        <span class="error">*
                            <?php echo $firstNameError; ?>
                        </span><br>
                        <label for="lastname">Last name : </label>
                        <input type="text" name="last_name" value="<?php echo $lastName; ?>">
                        <span class="error">*
                            <?php echo $lastNameError ?>
                        </span><br>
                    </fieldset>
                    <fieldset>
                        <legend> Insert a gender : </legend>
                        <label for="radio">Man </label>
                        <input type="radio" name="gender" id="gender" value="m" <?php if ($gender == "m") {
                            echo "checked";
                        } ?>><br>
                        <label for="radio">Woman </label>
                        <input type="radio" name="gender" id="gender" value="z" <?php if ($gender == "z") {
                            echo "checked";
                        } ?>><br>
                        <label for="radio">Other </label>
                        <input type="radio" name="gender" id="gender" value="o" <?php if ($gender == "o" || $gender == "") {
                            echo "checked";
                        } ?>><br>
                        <span class="error">
                            <?php echo $genderError ?>
                        </span><br>
                    </fieldset>
                    <fieldset>
                        <legend> Insert date of birth : </legend>
                        <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>">
                        <span class="error">*
                            <?php echo $dobError; ?>
                        </span>
                        <br>

                    </fieldset>
                    <fieldset>
                        <legend> Insert resume : </legend>
                        <textarea name="resume" id="resume" maxlength="500" rows="5" ><?php echo $resume; ?></textarea>
                        <span class="error">*
                            <?php echo $dobError; ?>
                        </span>
                        <br>

                    </fieldset>
                    <p>
                        <?php
                        $poruka;
                        if ($profileRow === false) {
                            $poruka = "Create profile";
                        } else {
                            $pourka = "Edit profile";
                        }
                        ?>
                    </p>
                    <!-- <input type="submit" value = "submit"> -->
                    <input id="button" type="submit"
                        value="<?php echo ($profileRow === false) ? "Create profile" : "Edit profile" ?>">
                </form>
            </div>
        </div>
        <div class="profile-div col-6">
            <picture id="profile-pic">
                <a href="index.php"><img src="img/logo.png" class="img-fluid" data-aos="zoom-out" alt=""></a>
            </picture>
        </div>
    </div>

</body>

</html>