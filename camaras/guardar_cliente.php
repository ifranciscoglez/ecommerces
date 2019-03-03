<?php

require 'conexion.php';

$iNombre = $_POST['inputNombre'];
$iApPat = $_POST['inputApPaterno'];
$iApMat = $_POST['inputApMat'];
$iAddress = $_POST['inputAddress'];
$iZip = $_POST['inputZip'];
$iNumInt = $_POST['inputNumInt'];
$iNumExt = $_POST['inputNumExt'];
$iCity = $_POST['inputCity'];
$iState = $_POST['inputState'];
$iCountry = $_POST['inputCountry'];
$iColony = $_POST['inputColony'];
$iUser = $_POST['inputUser'];
$iPass = $_POST['inputPassword'];
$iTel = $_POST['inputTel'];
$iEmail = $_POST['inputEmail'];
    
$sql = "INSERT INTO cliente (nombreCliente, apPaternoCliente, apMaternoCliente, direccionCliente, cpCliente, numInteCliente, numExtCliente, estadoCliente, ciudadCliente, paisCliente, coloniaCliente, usuarioCliente, passwordCliente, telefonoCliente, emailCliente) VALUES ('$iNombre', '$iApPat', '$iApMat', '$iAddress', '$iZip', '$iNumInt', '$iNumExt', '$iState', '$iCity', '$iCountry', '$iColony', '$iUser', '$iPass', '$iTel', '$iEmail')";
	$save = $mysqli->query($sql);


?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		     <link href="css/bootstrap.min.css" rel="stylesheet">
         <!-- SCRIPTS JS-->
		<script src="js/jquery-3.2.1.min.js"></script>
		
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
					<?php if($save) { ?>
                        <!-- Modal -->
                        <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Notificacion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                El registro se ha guardado con exito.
                              </div>
                              <div class="modal-footer">
                              
                              <a class="btn btn-primary" href="login_cliente.php">Aceptar</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Notificacion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Error al guardar. Verificar campos sin llenar. 
                              </div>
                              <div class="modal-footer">
                              
                              <a class="btn btn-primary" href="form_cl_registro.php">Aceptar</a>
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
    <script>window.jQuery || document.write('<script src="js/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>  </body>
</html>