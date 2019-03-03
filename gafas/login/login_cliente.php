<?php
require '../conexion.php';
session_start();

if (isset($_SESSION['usuarioCliente'])){
    header('Location: index.php');
}


$usuarioCl = $_POST['usuario-cliente'];
$contrasenaCl = $_POST['contrasena-cliente'];

$sql = "select usuarioCliente, passwordCliente from cliente where usuarioCliente= '$usuarioCl' AND 
 					passwordCliente= '$contrasenaCl'";
$resultado = $mysqli->query($sql);

 while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $arreglo[]=array('usuarioCliente'=>$row['usuarioCliente'],
			'passwordCliente'=>$row['passwordCliente']);
 }

	if(isset($arreglo)){
		$_SESSION['usuario-cliente']=$arreglo;
		header("Location: ../cliente/index_cliente.php");
	}else{
		header("Location: ../login_admin.php?error=datos no validos");
	}
?>
