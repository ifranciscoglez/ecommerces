<?php

require '../conexion.php';

$nombreCate = $_POST['nombre-categoria'];
$descripcionCate = $_POST['descrip-categoria'];
$imgCate = addslashes(file_get_contents($_FILES['img-categoria']['tmp_name']));



$sql = "INSERT INTO categoria (nombreCategoria, descripCategoria, imgCategoria) VALUES ('$nombreCate', '$descripcionCate', '$imgCate')";
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
					
					<a href="categorias_crud.php">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>