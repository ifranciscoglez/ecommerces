<?php

session_start();

include 'conexion.php';

if(isset($_SESSION['usuario-cliente'])){            

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
        
        $sql = "select * from camara where idCamaras = $id";
        
        $resultado = $mysqli->query($sql);
  
        while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
            
            $nombre = $row['modeloCamaras'];
            $precio = $row['precioCamaras'];
            $descripcion = $row['extractoDescripCamaras'];
            
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
        
        $sql = "select * from camara where idCamaras = $id";
        
        $resultado = $mysqli->query($sql);
  
        while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
            
            $nombre = $row['modeloCamaras'];
            $precio = $row['precioCamaras'];
            $descripcion = $row['extractoDescripCamaras'];
            
        }
        
        $arreglo[]=array('Id'=>$_GET['id'], 'Nombre'=>$nombre, 'Descripcion'=>$descripcion, 'Precio'=>$precio, 'Cantidad'=>$_POST['cantidad']);
        
        $_SESSION['carrito']=$arreglo;

    }

    
}
}else{
    header('Location: login_cliente.php');
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
    
    <?php include 'views/stylesheet.php';?>

  <link rel="stylesheet" href="js/jquery-3.2.1.min.js">
   
  </head>
  <body>

    <header>
        <?php        
          
          include 'views/cabecera_cliente.php';
        ?>
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
                    <tr class="producto">
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
        
        
        <p class="text-center"><a class="btn btn-secondary" href="index.php">Regresar al cátalogo</a></p>
        </div>
    </div>        
     <!-- FIN CATEGORIA LIMITED -->

    <hr class="featurette-divider">
    
        <!-- GAFAS RELACIONADAS -->
        

     
    </main>
    
          <?php include 'views/querys.php';?>

  </body>
  
   <!-- FOOTER -->
      <?php include 'views/footer.php';?>

</html>
