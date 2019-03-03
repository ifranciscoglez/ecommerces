
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
  <body >

    <header>
<?php include 'views/cabecera.php';?>
    </header>

    <main role="main">

       
       
        <div class="container m-5 p-5">
       
        <h2 class="form-signin-heading m-3 text-center">Registro de cliente</h2>

        <form action="guardar_cliente.php" method="POST">   
        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputNombre">Nombre(s)</label>
              <input type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Nombre(s) Juan" maxlength="45" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputApPaterno">Apellido Paterno</label>
              <input type="text" class="form-control" name="inputApPaterno" placeholder="Perez" maxlength="45" required>
            </div>            
             
            <div class="form-group col-md-4">
              <label for="inputApMaterno">Apellido Materno</label>
              <input type="text" class="form-control" name="inputApMat" placeholder="Perez" maxlength="45" required>
            </div>
          </div>        
           
         <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputTel">Teléfono</label>
              <input type="tel" class="form-control" name="inputTel" placeholder="7445556677" required maxlength="10">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" name="inputEmail" placeholder="ejemplo@gmail.com" required maxlength="45">
            </div>            
             
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail">Usuario</label>
              <input type="text" class="form-control" name="inputUser" placeholder="JuanPerez" required maxlength="15">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control" name="inputPassword" placeholder="Password" required maxlength="15">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Dirección</label>
            <input type="text" class="form-control" name="inputAddress" placeholder="Centro, Acapulco, Gro. " required maxlength="300">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputCountry">Pais</label>
              <input type="text" class="form-control" name="inputCountry" placeholder="México" required maxlength="45">
            </div>
            <div class="form-group col-md-8">
              <label for="inputCity">Ciudad</label>
              <input type="text" class="form-control" name="inputCity" placeholder="Acapulco" required maxlength="45">
            </div>
            </div>
                     <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputState">Estado</label>
              <input type="text" class="form-control" name="inputState" placeholder="Gro" required maxlength="45">
            </div>
            <div class="form-group col-md-6">
              <label for="inputColony">Colonia</label>
              <input type="text" class="form-control" name="inputColony" placeholder="Centro" required maxlength="45">
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Codigo Postal</label>
              <input type="text" class="form-control" name="inputZip" placeholder="99999" required pattern="[0-9]+" maxlength="5" minlength="5">
            </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-8">
            <label for="inputStreet">Calle</label>
            <input type="text" class="form-control" name="inputStreet" placeholder="Ruiz Cortinez" required maxlength="300">
          </div>          
           <div class="form-group col-md-2">
            <label for="inputNumInt">Número Interior</label>
            <input type="text" class="form-control" name="inputNumInt" placeholder="10" required pattern="[0-9]+" maxlength="2">
          </div>          
          <div class="form-group col-md-2">
            <label for="inputNumExt">Número Exterior</label>
            <input type="text" class="form-control" name="inputNumExt" placeholder="11" required pattern="[0-9]+" maxlength="2">
          </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Registrarme</button>
                      
            <p class="text-center">Ya tienes una cuenta?</p> 
            <p class="text-center"><a href="login_cliente.php">Inicia Sesión</a></p>
          
          </div>

        </form>

        </div>
    </main>
    
  </body>
  
           <?php
    #Llamamos el codigo
    include 'views/footer.php';        
    ?>
  </html>
