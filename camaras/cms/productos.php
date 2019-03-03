<?php
	require 'conexion.php';
	
	$where = "";
	
/*	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}*/
	$sql = "SELECT * FROM gafas $where";
	$resultado = $mysqli->query($sql);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro productos</title>
    	<link rel="stylesheet" href="css/fontello.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/productos.css">
</head>
<body>
  
  	<header>
		<div class="contenedor">

			<h1 class="">Gafas</h1>
			<input type="checkbox" id="menu-bar">
			<label class="icon-menu" for="menu-bar"></label>
			<nav class="menu">
				<a href="index.php">Inicio</a>
				<a href="productos.php">Productos</a>
				<a href="">Registro</a>
				<a href="">Login</a>
			</nav>
		</div>
	</header>
  
   <div align="center" class="reg-prod">
   <h3>Registro de gafas</h3>
    <form action="guardar.php" method="POST">
        
        
        Codigo Gafas: <input type="text" name="codigo" id="codigo" placeholder="Código de gafa" required><br>
        Nombre Gafas: <input type="text" name="nombre" id="nombre" placeholder="Nombre de las gafa" required><br>
        Descripcion: <input type="text" name="descripcion" id="descripcion" placeholder="Descripción sobre la gafa" required><br>
        Precio: <input type="text" name="precio" id="precio" placeholder="Precio de la gafa" required><br>
        Stock: <input type="text" name="stock" id="stock" placeholder="Stock de la gafas" required><br>
        Imagen: <input type="file" name="imagen" id="imagen">  <br>
        Categoria: <select name="categoria" id="categoria" placeholder="Categoria de las gafas" required>
            <option value="1">Hombre</option>
            <option value="2">Mujer</option>
        </select> <br><br>
        
        <button type="submit">Guardar</button>
        
    </form>
    </div>
    
    <div align="center">
        <table border="2">
                <tr>
                    <td>ID</td>
                    <td>CODIGO</td>
                    <td>NOMBRE</td>
                    <td>DESCRIPCIÓN</td>
                    <td>PRECIO</td>
                    <td>STOCK</td>
                    <td>IMAGEN</td>
                    <td>CATEGORIA</td>
                </tr>
            
            <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['idGafas']; ?></td>
                    <td><?php echo $row['codGafas']; ?></td>
                    <td><?php echo $row['nombreGafas']; ?></td>
                    <td><?php echo $row['descGafas']; ?></td>
                    <td><?php echo $row['precioGafas']; ?></td>
                    <td><?php echo $row['stockGafas']; ?></td>
                    <td><?php echo $row['imgGafas']; ?></td>
                    <td><?php echo $row['Categoria_idCategoria']; ?></td>
                </tr>
            <?php } ?>
        
        </table>
    </div>
</body>
</html>