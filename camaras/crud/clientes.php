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
  <style>
body {
background: #F3E5F5;
}
</style>
  <body>

    <header>
    <?php include '../views/cabecera_admin.php';?>
    </header>

    <main role="main">
    
<div class="container m-5">
        <h1 class="text-center p-4">LISTA DE CLIENTES</h1>
        
        <div class="row">
             <table class="table">
              <thead class="thead-dark">
                <tr>
                <th class="text-center">ID</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">APELLIDO PATERNO</th>
                <th class="text-center">APELLIDO MATERNO</th>
                <th class="text-center">TELEFONO</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">PAIS</th>
                <th class="text-center">ESTADO</th>
                <th class="text-center">CIUDAD</th>
                <th class="text-center">COLONIA</th>
                <th class="text-center">CALLE</th>
                <th class="text-center">NUM</th>
                </tr>
              </thead>

              <tbody>
            <?php
             $sql = "select * from cliente order by idCliente ASC";
            $resultado = $mysqli->query($sql);
          while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
                
            ?>
                    <tr class="producto">
                      <td class="text-center"><?php echo $row['idCliente'];?></td>
                      <td class="text-center"><?php echo $row['nombreCliente'];?></td>
                      <td class="text-center"><?php echo $row['apPaternoCliente'];?></td>
                      <td class="text-center"><?php echo $row['apMaternoCliente'];?></td>
                      <td class="text-center"><?php echo $row['telefonoCliente'];?></td>
                      <td class="text-center"><?php echo $row['emailCliente'];?></td>
                      <td class="text-center"><?php echo $row['paisCliente'];?></td>
                      <td class="text-center"><?php echo $row['estadoCliente'];?></td>
                      <td class="text-center"><?php echo $row['ciudadCliente'];?></td>
                      <td class="text-center"><?php echo $row['coloniaCliente'];?></td>
                      <td class="text-center"><?php echo $row['direccionCliente'];?></td>
                      <td class="text-center"><?php echo $row['numExtCliente'];?></td>
                    </tr>
            <?php
                
            }
            
            ?>
            
            </tbody>
            </table>
            
            </div>
    
                      <a href="../pdf/ticketcopia.php" class="btn btn-primary">Imprimir</a>
        </div>
    </main>


        <?php include '../views/querys.php';?>

  </body>
  
  <?php include '../views/footer.php';?>
</html>
