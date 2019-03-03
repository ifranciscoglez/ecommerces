


<?php

require '../conexion.php';

session_start();

$total = "";
$subtotal = "";
$cantidad = 0;
$status = "Pagado";
$tipoPago = 1;
$fecha_hoy = date("Y-m-d");
$nombreCl = "";
$envio = 100;

if(isset($_SESSION['carrito']))
{

    $datos = $_SESSION['carrito'];
    $usuario = $_SESSION['usuario-cliente'];
    
    for($i=0; $i< count($usuario); $i++){
        
       $nombreCl = $usuario[$i]['usuarioCliente']; 
    }
    
    $usuario = "select idCliente from cliente where nombreCliente = '$nombreCl'";
    $consul = $mysqli->query($usuario);
        
    while ($fila = $consul->fetch_row()) {
        $idCliente = $fila['idCliente'];
    }


    for($i=0; $i< count($datos); $i++){

    $subtotal = $datos[$i]['Cantidad']*$datos[$i]['Precio'];
    $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+ $total;
    $cantidad= $datos[$i]['Cantidad'];
    }
    
    $sql = "INSERT INTO pedido (fechaPedido, subTotalPedido, totalPedido, precioEnvioPedido, estadoPedido,
    TipoPago_idTipoPago, Cliente_idCliente) VALUES ('$fecha_hoy', '$subtotal', '$total', '$envio', '$status', '$tipoPago', $idCliente)";
	$resultad = $mysqli->query($sql);
    
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
                                La compra se ha realizado con exito. 
                              </div>
                              <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a class="btn btn-primary" href="../pdf/ticket.php">Aceptar</a>
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
                                Error al comprar. 
                              </div>
                              <div class="modal-footer">
                              
                              <a class="btn btn-primary" href="http://elizaloezadiaz.tk/cliente/carrito_compras_cliente.php">Aceptar</a>
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
