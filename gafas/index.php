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
   

    <title>Gafas</title>

    <?php include 'views/stylesheet.php';?>


  </head>
  <body>

    <header>
<?php include 'views/cabecera.php';?>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
         <?php 
          #Contamos la cantidad de categorias agregadas
         $sql = "SELECT * from categoria;";
         $totalCategoria = $mysqli->query($sql);
        $nCategoria = 0;
         //print($row_array['TOTALFOUND']); 
         while($row = $totalCategoria->fetch_array(MYSQLI_ASSOC)) { 

           if($nCategoria ==0)
           {?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $nCategoria; ?>" class="active"></li>
            <?php
           }
             else{
                 ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $nCategoria; ?>"></li>
            <?php
             }
               
               ?>

            
            <?php
             $nCategoria++;
         }
            ?>
        
        </ol>
        <div class="carousel-inner">
         
         <?php 
            $sql = "select * from categoria order by idCategoria DESC limit 8";
            $categoria = $mysqli->query($sql);
            $active=false;
          while($row = $categoria->fetch_array(MYSQLI_ASSOC)) { 
           
              if($active ==false)
           {?>
  
           <div class="carousel-item active">
            <img class="first-slide" src="data:image/jpg;base64, <?php echo base64_encode($row['imgCategoria']);?>" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1><?php echo $row['nombreCategoria']; ?></h1>
                <p><?php echo $row['descripCategoria']; ?></p>
                <p><a class="btn btn-lg btn-primary" href="#<?php echo $row['nombreCategoria']; ?>" role="button">Ver más</a></p>
              </div>
            </div>
          </div>
         <?php
           }
             else{?>
             
            <div class="carousel-item">
            <img class="first-slide" src="data:image/jpg;base64, <?php echo base64_encode($row['imgCategoria']);?>" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1><?php echo $row['nombreCategoria']; ?></h1>
                <p><?php echo $row['descripCategoria']; ?></p>
                <p><a class="btn btn-lg btn-primary" href="#<?php echo $row['nombreCategoria']; ?>" role="button">Ver más</a></p>
              </div>
            </div>
          </div>
              
       <?php 
             }
              
              $active = true;
          }
    ?>  
          
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>



      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
    <h1 class="text-center p-2">NOVEDADES</h1>

    <!-- CATEGORIA -->  

    <?php
          
         #Abrimos la conexion
         include 'conexion.php';
        
         #Contamos la cantidad de categorias agregadas
         $sql = "SELECT count(idCategoria) as TOTALFOUND from categoria;";
         $totalCategoria = $mysqli->query($sql);
         $row_array=$totalCategoria->fetch_array(MYSQLI_ASSOC);
         //print($row_array['TOTALFOUND']); 
        
        
         $sql1 = "SELECT * from categoria";
         $nombreCategoria = $mysqli->query($sql1);
         
        while($row_n=$nombreCategoria->fetch_array(MYSQLI_ASSOC))
        {
            $id = $row_n['idCategoria'];
        ?>
            
        <hr class="featurette-divider">

         <section id="<?php echo $row_n['nombreCategoria'];?>">
         <div class="">
         <h1 class="text-center text-primary pb-4"> <?php echo $row_n['nombreCategoria'];?></h1>
         <div class="card-deck text-center">
            
          <?php
          $sql = "SELECT * FROM gafas where Categoria_idCategoria =$id order by idGafas DESC";
	      $resultado = $mysqli->query($sql);
          while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
  
           <div class="col-lg-4 col-md-12 mb-4">
              <div class="card">
               <img class="card-img-top img-fluid" src="data:image/jpg;base64, <?php echo base64_encode($row['imgGafas']);?>" alt="Card image cap Responsive">
                <div class="card-body">
                  <h4 class="card-title"> <?php echo $row['nombreGafas']; ?></h4>
                  <p class="card-text"><?php echo $row['extrDesGafas']; ?></p>
                </div>
                <div class="card-footer">
                <div class="card-block">
                <small class="text-muted" style="float:left;">$<?php echo $row['precioGafas']; ?></small>
                <a href="./detalle.php?id=<?php echo $row['idGafas']; ?>" class="card-link" style="float:right;">Ver detalles</a>
                </div>

                </div>
              </div>
          </div>
        
              
       <?php       
          }
    ?>  
        </div>
       <!-- <p><a class="btn btn-primary btn-lg" href="./detalles.php?id=<?php# echo $row['idGafas']; ?>" role="button" style="float:right;">Ver más</a></p>   -->
    </div>   
    </section>    
     <!-- FIN CATEGORIA -->

    
        <!-- CATEGORIA 2017 COLLETION -->
          <?php 
          }
    ?>  


    </div><!-- /.container -->

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
