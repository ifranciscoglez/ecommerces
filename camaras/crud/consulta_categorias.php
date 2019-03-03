<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
include '../conexion.php';

//////////////// VALORES INICIALES ///////////////////////

$tabla = "";
$query="SELECT * FROM categoria order by idCategoria limit 1";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['categoria']))
{
	$q=$mysqli->real_escape_string($_POST['categoria']);
	$query="SELECT * FROM categoria WHERE 
		idCategoria LIKE '%".$q."%' OR
        nombreCategoria LIKE '%".$q."%' OR
        descripCategoria LIKE '%".$q."%' limit 1";
}

$buscarCategoria=$mysqli->query($query);
//$row_cnt = $buscarGafas->num_rows;
if ($buscarCategoria->num_rows > 0)
{
	$tabla.= 
		'<table class="table table-bordered">
        <thead class="thead-dark">
              <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">NOMBRE CATEGORIA</th>
                  <th class="text-center">DESCRIPCION CATEGORIA</th>
              </tr>
          </thead>';

	while($filaGafas= $buscarCategoria->fetch_assoc())
	{
		$tabla.=
		'<tr>     
            <td><input type="text" class="form-control" required maxlength="10" minlength="5" name="id-categoria" value="'.$filaGafas['idCategoria'].'" ></td>          
            <td><input type="text" class="form-control" required maxlength="45" minlength="5" name="nombre-categoria" value="'.$filaGafas['nombreCategoria'].'" ></td>
            <td><input type="text" class="form-control"  placeholder="Descripción de las caracteristicas" required minlength="150" name="descrip-categoria" value="'.$filaGafas['descripCategoria'].'"></td>            
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
