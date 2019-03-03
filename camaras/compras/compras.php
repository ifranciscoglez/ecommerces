<?php

include '../conexion.php';

session_start();

$arreglo = $_SESSION['carrito'];
$numeroventa = 0;
$sql = "select * from pedido order by numeroVenta DESC limit 1";

$resultado=$mysqli->query($sql);

 while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
     
     $numeroventa = $row['numeroventa'];
            
}

    if($numeroventa==0){
        $numeroventa=1;
    }else{

        $numeroventa++;
    }

    for($i =0; $i<count($arreglo); $i++){
        
        $sql = "INSERT INTO pedido (numeroVenta, precioPedido, fechaPedido,  totalPedido, subTotalPedido) VALUES ('$numeroventa', '$arreglo[$i]['Nombre']', '$arreglo[$i]['Precio']', '$arreglo[$i]['Cantidad']', '$arreglo[$i]['Descripcion']', '$precio', '$stock', '$img', '$categoria')";
	$resultado = $mysqli->query($sql);

    }



?>