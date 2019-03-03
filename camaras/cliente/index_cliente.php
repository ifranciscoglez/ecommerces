<?php
session_start();

include "../conexion.php";
if(isset($_SESSION['usuario-cliente'])){
    
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
   

    <title>Gafas</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../css/font-awesome.css">
    	
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
    
       <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    
   <link rel="stylesheet" href="../css/font-awesome.css">

  </head>
  <body>

    <header>
<?php include '../views/cabecera_cliente.php';?>
    </header>

   
   
   <div class="container">
    
       <header class="jumbotron my-4">
        <h1 class="display-3">Bienvenidos!</h1>
        <p class="lead">Bienvenidos a Camaras instanx, donde encontraras las mas hermosas y mejores camaras instantaneas.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header>
    <h1 class="text-center p-2">PRODUCTOS </h1>
    
     <div class="row text-center">
    <?php 
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
include '../views/footer.php';        
?>
    
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-3.2.1.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/holder.min.js"></script>

  </body>
</html>
