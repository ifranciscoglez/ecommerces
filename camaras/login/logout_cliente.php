<?php
session_start();
unset($_SESSION['usuario-cliente']);
header("Location: ../index.php");
?>