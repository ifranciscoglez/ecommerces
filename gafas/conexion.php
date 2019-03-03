<?php

$mysqli = new mysqli('mysql.hostinger.mx', 'u309896386_root', 'admin123', 'u309896386_gafas');


mysqli_set_charset($mysqli, 'utf8');


if($mysqli->connect_error){
    die('Error en la conexion'. $mysqli->connect_error);
}

//printf("Servidor Informacion %s\n", $mysqli->server_info);


?>