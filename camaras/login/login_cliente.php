<?php
require '../conexion.php';
session_start();

if (isset($_SESSION['usuarioCliente'])){
    header('Location: index.php');
}


$usuarioCl = $_POST['usuario-cliente'];
$contrasenaCl = $_POST['contrasena-cliente'];

$sql = "select usuarioCliente, contrasenaCliente from cliente where usuarioCliente= '$usuarioCl' AND 
 					contrasenaCliente= '$contrasenaCl'";
$resultado = $mysqli->query($sql);

 while($rowPoseido = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $arreglo[]=array('usuarioCliente'=>$row['usuarioCliente'],
			'contrasenaCliente'=>$row['contrasenaCliente']);
 }

	if(isset($arreglo)){
		$_SESSION['usuario-cliente']=$arreglo;
		header("Location: ../cliente/index_cliente.php");
	}else{
		header("Location: ../login_admin.php?error=datos no validos");
	}
?>
