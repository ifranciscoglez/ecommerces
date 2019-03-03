

<?php
session_start();
$total = "";
$subtotal = "";
$cantidad = 0;
$status = "pendiente";
$tipoPago = 5;
$fecha_hoy = date("Y-m-d");
$nombreCl = "";


if(empty($_SESSION['carrito']) && empty ($_SESSION['usuario-cliente']))
{

    $datos = $_SESSION['carrito'];
    $usuario = $_SESSION['usuario-cliente'];
    
    for($i=0; $i< count($usuario); $i++){
        
       $nombreCl = $usuario[$i]['usuarioCliente']; 
    }
    for($i=0; $i< count($datos); $i++){

    $subtotal = $datos[$i]['Cantidad']*$datos[$i]['Precio'];
    $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+ $total;
    $cantidad= $datos[$i]['Cantidad'];
}
    

    $usuario = "select idCliente from cliente where nombreCliente = $nombreCl";
    $consul = $mysqli->query($usuario);
    
    while($row=$consult->fetch_array(MYSQLI_ASSOC))
        {
            $idCliente = $row['idCliente'];
        }
           
           
            
    $sql = "INSERT INTO pedido (fechaPedido, subTotalPedido, totalPedido, estadoPedido,
    TipoPago_idTipoPago, Cliente_idCliente) VALUES ('$fecha_hoy', '$subtotal', '$total', '$status', '$tipoPago', '$idCliente')";
	$resultado = $mysqli->query($sql);
    
    
?>