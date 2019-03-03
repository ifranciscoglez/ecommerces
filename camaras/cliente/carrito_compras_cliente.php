<?php

session_start();

include '../conexion.php';

if(isset($_SESSION['carrito']))
{
    if(isset($_GET['id']))
    {
    $arreglo =$_SESSION['carrito'];
    $encontro = false;
    $numero = 0;
    
    for($i=0; $i< count($arreglo); $i++){
        if($arreglo[$i]['Id']==$_GET['id']){
            $encontro = true;
            $numero = $i;
            
        }
    }
    if($encontro == true){
        $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+ $_POST['cantidad'];
        $_SESSION['carrito']=$arreglo;
    }else{
        $nombre ="";
        $precio = 0;
        $descripcion = "";
        $id=$_GET['id'];
        
        $sql = "select * from gafas where idGafas = $id";
        
        $resultado = $mysqli->query($sql);
  
        while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
            
            $nombre = $row['nombreGafas'];
            $precio = $row['precioGafas'];
            $descripcion = $row['extrDesGafas'];
            
        }
        
        $datosNuevos=array('Id'=>$_GET['id'], 'Nombre'=>$nombre, 'Descripcion'=>$descripcion, 'Precio'=>$precio, 'Cantidad'=> $_POST['cantidad']);
        
        
        array_push($arreglo, $datosNuevos);
        $_SESSION['carrito']=$arreglo;
        
    }
}
}else{
    
    if(isset($_GET['id'])){
        $nombre ="";
        $precio = 0;
        $descripcion = "";
        $id=$_GET['id'];
        
        $sql = "select * from gafas where idGafas = $id";
        
        $resultado = $mysqli->query($sql);
  
        while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
            
            $nombre = $row['nombreGafas'];
            $precio = $row['precioGafas'];
            $descripcion = $row['extrDesGafas'];
            
        }
        
        $arreglo[]=array('Id'=>$_GET['id'], 'Nombre'=>$nombre, 'Descripcion'=>$descripcion, 'Precio'=>$precio, 'Cantidad'=>$_POST['cantidad']);
        
        $_SESSION['carrito']=$arreglo;

    }

    
}

?>
<!doctype html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carrito de compras</title>

    <!-- Bootstrap core CSS 
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">-->
    
     <link href="../css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../css/font-awesome.css">
    	
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
    
       <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    
   <link rel="stylesheet" href="../css/font-awesome.css">
  <link rel="stylesheet" href="../js/jquery-3.2.1.min.js">
   
  </head>
  <body>

    <header>
         <?php include '../views/cabecera_cliente.php';?>
    </header>

    <main role="main">

    <!-- DETALLE DEL PRODUCTO -->
    
    <div class="container m-5">
        <h1 class="text-center p-4">CARRITO DE COMPRAS</h1>
        
        <div class="row">

       
        <?php
         $total = 0;
        if(isset($_SESSION['carrito']))
        {?>
            
             <table class="table">
              <thead class="thead-dark">
                <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Subtotal</th>
                </tr>
              </thead>
              <tbody>
            <?php
            $datos = $_SESSION['carrito'];
            for($i = 0; $i < count($datos); $i++){
                
            ?>
                    <tr>
                      <td class="text-center"><?php echo $datos[$i]['Nombre'];?></td>
                      <td class="text-center"><?php echo $datos[$i]['Descripcion'];?></td>
                      <td class="text-center"><?php echo $datos[$i]['Precio'];?></td>
                      <td class="text-center"><?php echo $datos[$i]['Cantidad'];?></td>
                      <td class="text-center"><?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></td>
                    </tr>
            <?php
                
                $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+ $total;
            }
            
            ?>
            
            </tbody>
            </table>
            
            </div>
            <?php
            
            
        }else{
        ?>
           <div class="container">
                   <h1 class="text-center text-danger font-weight-bold p-4">El carrito de compras está vació.</h1>
        <?php  
        }
        
        ?>

        <p class="text-right text-info font-weight-bold text-xl p-4"> Total: $ <?php echo $total;?> MXN </p>
                    

       
           
           <?php
            if($total!=0){?>
               
              
                <a href="paypal/comprar.php?total=<?php echo $total; ?>" class="btn btn-primary">Comprar ahora</a>
                
             <?php
            }
        
        ?>
        
        
        <p class="text-center"><a class="btn btn-secondary" href="../index.php">Regresar al cátalogo</a></p>
        </div>
    </div>        
     <!-- FIN CATEGORIA LIMITED -->

    <hr class="featurette-divider">
    
        <!-- GAFAS RELACIONADAS -->
        

     
    </main>
        
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
  
   <!-- FOOTER -->
      <?php include '../views/footer.php';?>

</html>
