<?php

require 'conexion.php';

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$img = isset($_POST['imagen']) ? $_POST['imagen'] : null;
$categoria = $_POST['categoria'];




$sql = "INSERT INTO gafas (codGafas, nombreGafas, descGafas, precioGafas, stockGafas, imgGafas, Categoria_idCategoria) VALUES ('$codigo', '$nombre', '$descripcion', '$precio', '$stock', '$img', '$categoria')";
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
					
					<a href="productos.php">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>