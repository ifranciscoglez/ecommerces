
<!doctype html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Detalles de la camara</title>

    <!-- Bootstrap core CSS 
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">-->
    
    <?php include 'views/stylesheet.php';?>

   
  </head>
  <body>

    <header>
         <?php        
         include "conexion.php";
        session_start();

        if(isset($_SESSION['usuario-cliente'])){            
          include 'views/cabecera_cliente.php';

        }else{
            include 'views/cabecera.php';
        }
        ?>
    </header>

    <main role="main">


    <!-- DETALLE DEL PRODUCTO -->
    
    <section class="container m-5">
        <h1 class="text-center p-4">DETALLES DE LA CAMARA</h1>
        
         <?php
          include 'conexion.php';
          $id=$_GET['id'];
        
          $sql = "SELECT * FROM camara where idCamaras = $id";
	      $resultado = $mysqli->query($sql);
          while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
              
         ?>

        <div class="row featurette p-2">
          <div class="col-md-6 order-md-2">
            <h2 class="">Producto: <?php echo $row['modeloCamaras']; ?></h2>
            <h2 class=""><span class="text-muted">Precio: $ <?php echo $row['precioCamaras'];?> MXN</span></h2>
            <p class="lead"> <b>Color: </b><?php echo $row['colorCamaras']; ?></p>
            <p class="lead" ALIGN="justify"> <strong>Descripción: </strong><?php echo $row['descripcionCamaras']; ?></p>
            <form action="./carrito_compras.php?id=<?php echo $row['idCamaras']; ?>" method="POST">
                 Cantidad:
            <select name="cantidad" id="cantidad" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
               
               <button class="btn btn-primary" type="submit">Anadir al carro</button>
                
            </form>
           
          </div>
          <div class="col-md-5 order-md-1 ml-2">
            
            <img class="featurette-image img-fluid mx-auto" src="data:image/jpg;base64, <?php echo base64_encode($row['imgCamaras']);?>" alt="Generic placeholder image">
          </div>
        </div>
        
       <?php       
          }
    ?>
    </section>        
     <!-- FIN CATEGORIA LIMITED -->

    <hr class="featurette-divider">

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
