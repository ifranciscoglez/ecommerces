<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
include '../conexion.php';

//////////////// VALORES INICIALES ///////////////////////

$tabla = "";
$query="SELECT * FROM gafas order by codGafas limit 1";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['gafas']))
{
	$q=$mysqli->real_escape_string($_POST['gafas']);
	$query="SELECT * FROM gafas WHERE 
		idGafas LIKE '%".$q."%' OR
		codGafas LIKE '%".$q."%' OR
        nombreGafas LIKE '%".$q."%' OR
        desCGafas LIKE '%".$q."%' OR
		extrDesGafas LIKE '%".$q."%' OR
		colorGafas LIKE '%".$q."%' OR
		precioGafas LIKE '%".$q."%' OR
        stockGafas LIKE '%".$q."%' limit 1";
}

$buscarGafas=$mysqli->query($query);
//$row_cnt = $buscarGafas->num_rows;
if ($buscarGafas->num_rows > 0)
{
	$tabla.= 
		'<table class="table table-bordered">
        <thead class="thead-dark">
              <tr>
                  <th class="text-center">Código</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Descripción</th>
                  <th class="text-center">Extracto Descripción</th>
                  <th class="text-center">Color</th>
                  <th class="text-center">Precio</th>
                  <th class="text-center">Stock</th>
                  <th class="text-center">Categoria</th>
              </tr>
          </thead>';

	while($filaGafas= $buscarGafas->fetch_assoc())
	{
		$tabla.=
		'<tr>
            <input type="text" hidden class="form-control" required maxlength="13" name="id-gafa" value="'.$filaGafas['idGafas'].'">
            <td><input type="text" class="form-control" required maxlength="13" minlength="3" name="code-gafa" value="'.$filaGafas['codGafas'].'" ></td>            
            <td><input type="text" class="form-control" required maxlength="10" minlength="5" name="nombre-gafa" value="'.$filaGafas['nombreGafas'].'" ></td>
            <td><input type="text" class="form-control"  placeholder="Descripción de las caracteristicas" required minlength="150" name="descrip-gafa" value="'.$filaGafas['desCGafas'].'"></td>            
            <td><input type="text" class="form-control" required minlength="150" maxlength="150" name="extrac-desc-gafa" value="'.$filaGafas['extrDesGafas'].'"></td>
            <td><input type="text" class="form-control"  placeholder="Color de la gafa" required maxlength="100" name="color-gafa" value="'.$filaGafas['colorGafas'].'"></td>
            <td><input type="text" class="form-control"  placeholder="Precio" required maxlength="20" pattern="[0-9]{1,20}" name="precio-gafa" value="'.$filaGafas['precioGafas'].'"></td>
            <td><input type="text" class="form-control"  placeholder="Unidades" required maxlength="20" pattern="[0-9]{1,20}" name="stock-gafa" value="'.$filaGafas['stockGafas'].'"></td>
            <td><input type="text" class="form-control" required maxlength="13" name="idCategoria-gafa" value="'.$filaGafas['Categoria_idCategoria'].'"></td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
