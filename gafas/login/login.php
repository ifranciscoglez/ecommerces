<?php
require '../conexion.php';
session_start();

if (isset($_SESSION['nombreUsuario'])){
    header('Location: index.php');
}


$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "select * from usuarios where nombreUsuario= '$usuario' AND 
 					passUsuario= '$contrasena'";
$resultado = $mysqli->query($sql);

 while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $arreglo[]=array('nombreUsuario'=>$row['nombreUsuario'],
			'passUsuario'=>$row['passUsuario']);
 }

	if(isset($arreglo)){
		$_SESSION['usuario']=$arreglo;
		header("Location: ../crud/index_admin.php");
	}else{
		header("Location: ../login_admin.php?error=datos no validos");
	}
?>
