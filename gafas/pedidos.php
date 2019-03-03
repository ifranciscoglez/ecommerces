<?php

include 'conexion.php';
session_start();
$total = "";
$subtotal = "";
$nombre = "";
$cantidad =0;

/*if(isset($_SESSION['carrito']))
{

    $datos = $_SESSION['carrito'];
    for($i=0; $i< count($datos); $i++){

    $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+ $total;
    $subtotal= $datos[$i]['Cantidad']*$datos[$i]['Precio'];
    $nombre = $datos[$i]['Nombre'];
    $cantidad = $datos[$i]['Cantidad']
            
    }
}
*/

$total = "";
$subtotal = "";
$cantidad = 0;
$status = "pendiente";
$tipoPago = 5;
$fecha_hoy = date("Y-m-d");
$nombreCl = "";
$idCliente = "";

if(isset($_SESSION['carrito']))
{

    $datos = $_SESSION['carrito'];
    $usuario = $_SESSION['usuario-cliente'];
    
    for($i=0; $i< count($usuario); $i++){
        
       $nombreCl = $usuario[$i]['usuarioCliente']; 
    }
    for($i=0; $i< count($datos); $i++){

    $subtotal = $datos[$i]['Cantidad']*$datos[$i]['Precio'];
    $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+ $total;
    $cantidad= $datos[$i]['Cantidad'];
}
    

    $usuario = "select idCliente from cliente where nombreCliente = '$nombreCl'";
    $consul = $mysqli->query($usuario);
    
    var_dump($consul);
    while($row=$consul->fetch_array(MYSQLI_ASSOC))
    {
            $idCliente = $row['idCliente'];
        echo $idCliente;
    }
             
            
    $sql = "INSERT INTO pedido (fechaPedido, subTotalPedido, totalPedido, estadoPedido,
    TipoPago_idTipoPago, Cliente_idCliente) VALUES ('$fecha_hoy', '$subtotal', '$total', '$status', '$tipoPago', 13)";
	$resultado = $mysqli->query($sql);
        var_dump($resultado);

    
}

?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Gafas</title>
    
    <?php include 'views/stylesheet.php';?>


  </head>
  <body>

    <header>
    
    
<?php 
       
        include "conexion.php";
        if(isset($_SESSION['usuario-cliente'])){
             include 'views/cabecera_cliente.php';
        }else{

           include 'views/cabecera.php';
        }
?>
        
    </header>

    <main role="main">
    
    <div class="container m-5">
        <div id="form-compra">
                            <?php
                                if (isset($_SESSION['usuario-cliente'])){?>
                                    
                                        <h2 class="text-center">¿Confirmar pedido?</h2>
                                        <p class="text-center">Para confirmar tu pedido presiona el botón de Paypal para pagar con Paypal</p>
                                        
                                        
                                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="upload" value="1">
                                            <input type="hidden" name="business" value="fjglezn-facilitator@outlook.com">
                                            <input type="hidden" name="currency_code" value="MXN">

                                               <?php
                                    
                                                $total = "";

                                                if(isset($_SESSION['carrito']))
                                                {

                                                $datos = $_SESSION['carrito'];
                                                for($i=0; $i< count($datos); $i++){?>
                                                
                                               <input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nombre'];?>">
                                               <input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
                                               <input type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">
            
                                                <?php
                                                }
                                                }
                                            ?>

                                            <input type="hidden" name="invoice" id="invoice" value="ID-DE-LA-TRANSACCION" >
                                            <input type="hidden" name="notify_url" id="notify_url" value="http://www.fjglezn.tk/paypalnotificacion.php"/>
                                            <input type="image" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif"
                                                   name="submit"
                                                   alt="Make payments with PayPal - its fast, free and secure!">
                                            <input type="hidden" name="return" value="http://www.fjglezn.tk/pagado.php">
                                        </form>

                                        <?php
                                }else{

                                    header('Location: login_cliente.php');
                                    
                                }
                            ?>
                            <div class="ResForm" style="width: 100%; text-align: center; margin: 0;"></div>
                    </div>
        
        
        
    </div>



<?php
#Llamamos el codigo
include 'views/footer.php';        
?>
    </main>
<?php
#Llamamos el codigo
include 'views/querys.php';        
        
?>
  </body>
</html>
