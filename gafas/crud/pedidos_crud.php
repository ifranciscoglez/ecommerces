<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Buscador en Tiempo Real con AJAX</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!-- ESTILOS -->
		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- SCRIPTS JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="peticion_gafas.js"></script>
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Buscador en Tiempo Real con AJAX</h2>
			</div>
		</header>

		<section>
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
		</section>

		<section id="tabla_resultado">
		<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
        </section>

	</body>
</html>


