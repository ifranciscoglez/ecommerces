<?php
session_start();

include "../conexion.php";
if(isset($_SESSION['usuario'])){
    
}else{
    
    header("Location: ../index.php");
}


?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administración</title>
    
    
     <link href="../css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <header>
    <?php include '../views/cabecera_admin.php';?>
    </header>

    <main role="main">
    
<div class="container m-5">
        <h1 class="text-center p-4">VENTAS</h1>
        
        <div class="row">
             <table class="table">
              <thead class="thead-dark">
                <tr>
                <th class="text-center">ID</th>
                <th class="text-center">FECHA PEDIDO</th>
                <th class="text-center">SUBTOTAL</th>
                <th class="text-center">TOTAL</th>
                <th class="text-center">ESTADO</th>
                <th class="text-center">TIPO PAGO</th>
                <th class="text-center">CLIENTE</th>
                </tr>
              </thead>
              <tbody>
            <?php
             $sql = "select * from pedido order by fechaPedido";
            $resultado = $mysqli->query($sql);
          while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
                
            ?>
                    <tr class="producto">
                      <td class="text-center"><?php echo $row['idPedido'];?></td>
                      <td class="text-center"><?php echo $row['fechaPedido'];?></td>
                      <td class="text-center"><?php echo $row['subTotalPedido'];?></td>
                      <td class="text-center"><?php echo $row['totalPedido'];?></td>
                      <td class="text-center"><?php echo $row['estadoPedido'];?></td>
                      <td class="text-center"><?php echo $row['TipoPago_idTipoPago'];?></td>
                      <td class="text-center"><?php echo $row['Cliente_idCliente'];?></td>
                    </tr>
            <?php
                
            }
            
            ?>
            
            </tbody>
            </table>
            
            </div>
    
    

    </main>


        <?php include '../views/querys.php';?>

  </body>
  
  <?php include '../views/footer.php';?>
</html>
