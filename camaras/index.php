<?php
session_start();

include "conexion.php";
if(isset($_SESSION['usuario-cliente'])){
    
        header("Location: cliente/index_cliente.php");

    
}else{
    
}


?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Camaras instax</title>

    <?php include 'views/stylesheet.php';?>


  </head>
  <style>
body {
background: #F3E5F5;
}
</style>
  <body>
  

<?php include 'views/cabecera.php';?>
    

<div class="container">
    
       <header class="jumbotron my-4">
        <h1 class="display-3">Bienvenidos!</h1>
        <p class="lead">Bienvenidos a Camaras instanx, donde encontraras las mas hermosas y mejores camaras instantaneas.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header>
    <h1 class="text-center p-2">PRODUCTOS </h1>
    
     <div class="row text-center">
    <?php 
                 #Abrimos la conexion
         include 'conexion.php';
        
          $sql = "SELECT * FROM camara";
	      $resultado = $mysqli->query($sql);
          while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
          
          
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <img class="card-img-top img-fluid" src="data:image/jpg;base64, <?php echo base64_encode($row['imgCamaras']);?>" alt="">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $row['modeloCamaras']; ?></h4>
                  <p class="card-text"><?php echo $row['extractoDescripCamaras']; ?></p>
                </div>
                <div class="card-footer">
                  <a href="./detalle.php?id=<?php echo $row['idCamaras']; ?>" class="btn btn-primary">Ver mas</a>
                </div>
              </div>
            </div>
      
       <?php       
          }
    ?>  
    </div>
</div>   


<?php
#Llamamos el codigo
include 'views/footer.php';        
?>
<?php
#Llamamos el codigo
include 'views/querys.php';        
        
?>
  </body>
</html>
