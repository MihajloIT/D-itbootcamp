<?php
session_start();
require_once "connection.php";
require_once "validation/validation.php";
$id = $_SESSION["id"];
$poruka = "";
if (isset($_GET["p"]) && $_GET["p"] == "ok") {
    $poruka = "You have successfully registered, please log to continue";
}

function elementiKlase($poruka)
{
    if (strlen($poruka) > 0) {
        return "text-success-emphasis bg-success-subtle border border-success-subtle rounded-3 registered";
    }
    return "";
}

$username = "";
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $id = $_SESSION['id']; // id logovanog korisnika
    $row = profileExists($id, $connection);
    // $q = "SELECT * FROM `profiles` WHERE `id_user` = $id "; umesto ovog umetnuli smo ovo iznad
    // $result = $connection -> query($q);
    $m = "";
    //if($result->num_rows == 0) nova if funkcija  ova dole
    if ($row === false) {
        $m = "Create";
    } else {
        $m = "Edit";
        //$row = $result-> fetch_assoc();
        $username = $row["first_name"] . " " . $row["last_name"];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stratton Oakmont</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


    <!-- Boostrap 5.3.0 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

    <?php require_once "header.php"; ?>
    <section>
        <div class="row">
            <div class="intro col-6">
                <h1>Welcome to <span>Stratton Oakmont</span></h1>
            </div>
            <div class="intro col-6">
                <img src="img/logo3.png" class="img-fluid" data-aos="zoom-out" alt="">
            </div>
        </div>
    </section>
    <div class="about">
        <div class="row">
            <div class="col-12">
                <h2>About us</h2>
                <p>Welcome to our Social Network!

                    We're a social networking platform dedicated to connecting people, fostering friendships, and
                    facilitating social interactions. Our platform is designed to help you meet new people, expand your
                    social circle, and engage in meaningful conversations. Whether you're looking for like-minded
                    individuals, professional connections, or simply a place to have fun and socialize, we've got you
                    covered.
                </p>
                <p>
                    Create a profile, share your interests, and discover communities that align with your passions.
                    Connect with others, join groups, and participate in discussions on a wide range of topics. We value
                    your privacy, and you have full control over your profile visibility and privacy settings.
                </p>
                <p>
                    Join us today and unlock a world of social possibilities. Connect, engage, and make lasting
                    connections in our vibrant online community.
                </p>
            </div>
        </div>
    </div>

    <div class="support">
        <div class="row">
            <h2>Steps to Join</h2>
            <div class="div-sup col-6">
                <p>
                <ol>
                    <li>Registration
                        <ul>
                            <li>Visit our website.
                            </li>
                            <li>Click on the "Register" or "Create an Account" button.
                            </li>
                            <li>Fill out the registration form with your personal details such as name, surname, email,
                                etc.
                            </li>
                            <li>Choose a secure password to use for logging in.
                            </li>
                            <li>Click on "Register" or a similar button to complete the registration process.
                            </li>
                        </ul>
                    </li>
                    <li>Log In:
                        <ul>
                            <li>Go to our website.
                            </li>
                            <li>Click on the "Log In" or "Sign In" button.
                            </li>
                            <li>Enter your registered email address and password.
                            </li>
                            <li>Click on the "Log In" or similar button to access your account.
                            </li>
                        </ul>
                    </li>
                    <li>Following other users:
                        <ul>
                            <li>Once you're logged in, search for the user you want to follow.
                            </li>
                            <li>Go to their profile page.
                            </li>
                            <li>Look for a "Follow" or "Add as Friend" button.
                            </li>
                            <li>Click on the button to start following that user.
                            </li>
                            <li>You'll then be able to see their updates, posts, or activities on your feed.
                            </li>
                        </ul>
                    </li>
                </ol>
                </p>
            </div>
            <div class="div-sup col-6">
                <picture id="steps-pic">
                    <img src="img/business2.jpg" alt="">
                </picture>
            </div>
        </div>
    </div>
    <footer>
        <p>
            contact: +381 064 123 3456
            email: socialnetwork@gmail.com
        </p>
    </footer>


</body>

</html>