<?php 
	include "../conexion.php";

    $id = $_POST['id-camaras'];
    $codigo = $_POST['cod-camaras'];
    $modelo = $_POST['mode-camaras'];
    $descripcion = $_POST['descrip-camaras'];
    $extraDescrip = $_POST['extrac-desc-camaras'];
    $color = $_POST['color-camaras'];
    $precio = $_POST['precio-camaras'];
    $stock = $_POST['stock-camaras'];
    #$img = isset($_POST['imagen']) ? $_POST['imagen'] : null;

    if(!empty($id) && !empty($codigo) && !empty($modelo) && !empty($descripcion) && !empty($extraDescrip) && !empty($color) && !empty($precio) && !empty($stock)){
        
    $sql = "UPDATE camara SET codCamaras='$codigo', modeloCamaras='$modelo', descripcionCamaras='$descripcion', extractoDescripCamaras='$extraDescrip', colorCamaras='$color', precioCamaras='$precio', stockCamaras='$stock' where idCamaras = '$id'";
	$update = $mysqli->query($sql);

   
    }

?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		     <link href="../css/bootstrap.min.css" rel="stylesheet">
         <!-- SCRIPTS JS-->
		<script src="../js/jquery-3.2.1.min.js"></script>
		
		   <script>
      $(document).ready(function()
      {
         $("#eliminarModal").modal("show");
      });
    </script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($update) { ?>
                        <!-- Modal -->
                        <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminacion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                El registro se ha actualizado con exito.
                              </div>
                              <div class="modal-footer">
                              
                              <a class="btn btn-primary" href="camara_crud.php">Aceptar</a>
                              </div>
                            </div>
                          </div>
                        </div>
						<?php } else { ?>
				        <!-- Modal -->
                        <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminacion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Error al actualizar. Verifica campos sin llenar.
                              </div>
                              <div class="modal-footer">
                              
                              <a class="btn btn-primary" href="camara_crud.php">Aceptar</a>
                              </div>
                            </div>
                          </div>
                        </div>
					<?php } ?>
										
				</div>
			</div>
		</div>
	</body>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="../js/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/holder.min.js"></script>  </body>
</html>
    
    