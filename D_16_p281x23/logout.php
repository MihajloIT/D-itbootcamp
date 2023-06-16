<?php
session_start();
session_unset(); // ovo je isto kao ovo $_SESSION = array(); dole ali bolje je jer je ugradjena funkcija


session_destroy();

header("Location: index.php");








?>