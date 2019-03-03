<?php

require 'conexion.php';

$codigo = $_POST['codigo-gafa'];
$nombre = $_POST['nombre-gafa'];
$descripcion = $_POST['descrip-gafa'];
$extraDescrip = $_POST['ext-descrip-gafa'];
$color = $_POST['color-gafa'];
$precio = $_POST['precio-gafa'];
$stock = $_POST['stock-gafa'];
$img = addslashes(file_get_contents($_FILES['img-gafa']['tmp_name']));
#$img = isset($_POST['imagen']) ? $_POST['imagen'] : null;
$categoria = $_POST['categoria-gafa'];




$sql = "INSERT INTO gafas (codGafas, nombreGafas, desCGafas, extrDesGafas, colorGafas, precioGafas, stockGafas, imgGafas, Categoria_idCategoria) VALUES ('$codigo', '$nombre', '$descripcion', '$extraDescrip', '$color', '$precio', '$stock', '$img', '$categoria')";
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
					
					<a href="crud/gafas_crud.php">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>