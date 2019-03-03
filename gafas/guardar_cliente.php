<?php

require 'conexion.php';

$iNombre = $_POST['inputNombre'];
$iApPat = $_POST['inputApPaterno'];
$iApMat = $_POST['inputApMat'];
$iTel = $_POST['inputTel'];
$iEmail = $_POST['inputEmail'];
$iUser = $_POST['inputUser'];
$iPass = $_POST['inputPassword'];
$iAddress = $_POST['inputAddress'];
$iStreet = $_POST['inputStreet'];
$iNumInt = $_POST['inputNumInt'];
$iNumExt = $_POST['inputNumExt'];
$iCity = $_POST['inputCity'];
$iState = $_POST['inputState'];
$iZip = $_POST['inputZip'];
$iCountry = $_POST['inputCountry'];
$iColony = $_POST['inputColony'];

    
$sql = "INSERT INTO cliente (nombreCliente, apPaternoCliente, apMaternoCliente, TelefonoCliente, emailCliente, direccionCliente, calleCliente, cpCliente, numInteCliente, numExtCliente, estadoCliente, ciudadCliente, paisCliente,
coloniaCliente, usuarioCliente, passwordCliente) VALUES ('$iNombre', '$iApPat', '$iApMat', '$iTel', '$iEmail', '$iAddress', '$iStreet', '$iZip', '$iNumInt', '$iNumExt', '$iState', '$iCity', '$iCountry', '$iColony', '$iUser', '$iPass')";
	$resultado = $mysqli->query($sql);



?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO CON ÉXITO :) </h3>
						<?php echo var_dump($resultado);?>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR :( </h3>
					<?php } ?>
					
					<a href="login_cliente.php">Iniciar Sesión</a>
					
				</div>
			</div>
		</div>
	</body>
</html>