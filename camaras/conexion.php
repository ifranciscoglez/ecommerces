<?php

$mysqli = new mysqli('localhost', 'uroot', 'proot', 'bdcams');


mysqli_set_charset($mysqli, 'utf8');


if($mysqli->connect_error){
    die('Error en la conexion'. $mysqli->connect_error);
}

//printf("Servidor Informacion %s\n", $mysqli->server_info);


?>