<?php

require 'conexion.php';

$codigo = $_POST['codigo-camaras'];
$modelo = $_POST['modelo-camaras'];
$descripcion = $_POST['descrip-camara'];
$extraDescrip = $_POST['ext-descrip-camara'];
$color = $_POST['color-camara'];
$precio = $_POST['precio-camara'];
$stock = $_POST['stock-camara'];
$img = addslashes(file_get_contents($_FILES['img-camara']['tmp_name']));
#$img = isset($_POST['imagen']) ? $_POST['imagen'] : null;




$sql = "INSERT INTO camara (codCamaras, modeloCamaras, descripcionCamaras, precioCamaras, stockCamaras, imgCamaras, extractoDescripCamaras, colorCamaras) VALUES ('$codigo', '$modelo', '$descripcion', '$precio', '$stock', '$img', '$extraDescrip', '$color')";
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
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="crud/camara_crud.php">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>