<?php

require 'conexion.php';
$id = $_POST['id-gafa'];
$codigo = $_POST['code-gafa'];
$nombre = $_POST['nombre-gafa'];
$descripcion = $_POST['descrip-gafa'];
$extraDescrip = $_POST['extrac-desc-gafa'];
$color = $_POST['color-gafa'];
$precio = $_POST['precio-gafa'];
$stock = $_POST['stock-gafa'];
#$img = isset($_POST['imagen']) ? $_POST['imagen'] : null;
$categoria = $_POST['idCategoria-gafa'];




$sql = "UPDATE gafas SET codGafas='$codigo', nombreGafas='$nombre', desCGafas='$descripcion', extrDesGafas='$extraDescrip', colorGafas='$color', precioGafas='$precio', stockGafas='$stock', Categoria_idCategoria='$categoria' where idGafas = '$id'";
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
					<script>	
                        
                        $(".alert").alert()
                    </script>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					
					<a href="">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>