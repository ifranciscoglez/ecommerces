<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>Iniciar sesión Administración</title>

<?php include 'views/stylesheet.php';?>
  </head>

  <body>
        <header>
<?php include 'views/cabecera.php';?>
    </header>

    <div class="container m-5">

      <form class="form-signin" method="post" action="./login/login.php">
       
       <?php
          
          if(isset($_GET['error'])){
              
              echo '<center> Datos no válidos</center>';
          }
          
          
        ?>
        <h2 class="form-signin-heading">Por favor inicia sesión administrador</h2>
        <input type="text" name="usuario" class="form-control m-2" placeholder="Escribe el usuario" required autofocus>
        <input type="password" name="contrasena" class="form-control m-2" placeholder="Escribe la contraseña" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>
