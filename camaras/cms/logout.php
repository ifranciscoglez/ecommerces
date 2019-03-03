<?php session_start();

session_destroy();//destruir la sesión

$_SESSION = array(); //reseteamos la varible

header('Location: login.php');


?>