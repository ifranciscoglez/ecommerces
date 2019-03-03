<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
include '../conexion.php';

//////////////// VALORES INICIALES ///////////////////////

$tabla = "";
$query="SELECT * FROM camara";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['camaras']))
{
	$q=$mysqli->real_escape_string($_POST['camaras']);
	$query="SELECT * FROM camara WHERE 
		idCamaras LIKE '%$q%' OR
		codCamaras LIKE '%$q%' OR
        modeloCamaras LIKE '%$q%' OR
        descripcionCamaras LIKE '%$q%' OR
		extractoDescripCamaras LIKE '%$q%' OR
		colorCamaras LIKE '%$q%' OR
		precioCamaras LIKE '%$q%' OR
        stockCamaras LIKE '%$q%' limit 1";
}

$buscarCamara=$mysqli->query($query);
//$row_cnt = $buscarCamara->num_rows;
if ($buscarCamara->num_rows > 0)
{
	$tabla.= 
		'<table class="table table-bordered">
        <thead class="thead-dark">
              <tr>
                  <th class="text-center">Código</th>
                  <th class="text-center">Modelo</th>
                  <th class="text-center">Descripción</th>
                  <th class="text-center">Extracto Descripción</th>
                  <th class="text-center">Color</th>
                  <th class="text-center">Precio</th>
                  <th class="text-center">Stock</th>
                  <th class="text-center">Accion</th>
              </tr>
          </thead>';

	while($filaCamara= $buscarCamara->fetch_assoc())
	{
		$tabla.=
		'<tr>
            <input type="text" hidden class="form-control" required maxlength="13" name="id-camaras" value="'.$filaCamara['idCamaras'].'">
            <td><input type="text" class="form-control" required maxlength="13" minlength="3" name="cod-camaras" value="'.$filaCamara['codCamaras'].'" ></td>            
            <td><input type="text" class="form-control" required maxlength="10" minlength="5" name="mode-camaras" value="'.$filaCamara['modeloCamaras'].'" ></td>
            <td><input type="text" class="form-control"  placeholder="Descripción de las caracteristicas" required minlength="150" name="descrip-camaras" value="'.$filaCamara['descripcionCamaras'].'"></td>            
            <td><input type="text" class="form-control" required minlength="150" maxlength="150" name="extrac-desc-camaras" value="'.$filaCamara['extractoDescripCamaras'].'"></td>
            <td><input type="text" class="form-control"  placeholder="Color de la gafa" required maxlength="100" name="color-camaras" value="'.$filaCamara['colorCamaras'].'"></td>
            <td><input type="text" class="form-control"  placeholder="Precio" required maxlength="20" pattern="[0-9]{1,20}" name="precio-camaras" value="'.$filaCamara['precioCamaras'].'"></td>
            <td><input type="text" class="form-control"  placeholder="Unidades" required maxlength="20" pattern="[0-9]{1,20}" name="stock-camaras" value="'.$filaCamara['stockCamaras'].'"></td>           
            <td>
            <p class="text-center"><button type="submit" class="btn btn-primary" id="">Editar</button></p>
            <a  class="btn btn-primary" href="eliminar_producto.php?id='.$filaCamara['idCamaras'].'">Eliminar</a>
            </td>
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
