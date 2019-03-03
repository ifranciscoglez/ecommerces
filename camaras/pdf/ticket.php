<?php
include 'plantilla.php';

require '../conexion.php';//ARCHIVO DE CONEXION



#AQUI VA LA CONSULTA A LA BD*
 $query = "SELECT * FROM `pedido` ORDER by idPedido DESC LIMIT 1";

 $resultado = $mysqli->query($query);

$pdf = new PDF();//Alineacion de la hoja(L, P), medida de la hoja (mm. cm, in), Tamaño (A4, Legal, array(100,50) )
$pdf->AliasNbPages();//Muestra el numero de paginas
$pdf->AddPage();//Añade una nueva pagina

 $pdf->Image('img/logocamara.png', 13, 05, 75);
 //$pdf->Image('img/educacion.png', 132, 06, 75);
    {
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Ln(14);
        $pdf->Cell(54);
        $pdf->Cell(50, 05, 'ESTADISTICA BASICA POR CENTRO DE TRABAJO.... NO SE QUE PONER AQUI', 0, 0, 'L');
        $pdf->Ln(05);//Salto de Linea
    
    } 


$fechaactual = date("Y-m-d");
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 7);//Fuente
$pdf->Cell(142);
$pdf->Cell(50, 8, 'Fecha de Impresion: '.$fechaactual, 0, 0, 'L', 1); //CAMBIA FECHA
$pdf->Ln(5);
$pdf->Cell(195, 4, '_____________________________________________________________________________________________________________________________________________', 0, 1, 'L', 1);
$pdf->Cell(37, 5, 'Avenida Cuauhtemoc #166 Fracc. Magallanes Acapulco de Juarez', 0, 1, 'L', 1);
//$pdf->Cell(92, 5, 'Nombre : INSTITUTO HISPANOAMERICANO MEXICANO', 0, 0, 'L', 1);
$pdf->Cell(37, 5, 'Estado de Guerrero,  C.P 39599,  Tel: 7441916018', 0, 1, 'L', 1);
$pdf->Cell(129, 5, 'Visita Camaras instax (elizaloeza.tk) para contactar', 0, 1, 'L', 1);
//$pdf->Cell(50, 5, 'Zona : 048', 0, 1, 'L', 1);
$pdf->Cell(129, 5, 'nuesto servicio al cliente por correro electronico', 0, 1, 'L', 1);
$pdf->Cell(50, 5, '', 0, 1, 'L', 1); 







while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 

$pdf->Cell(129, 5, 'Nombre: '.utf8_decode($row['nombreCliente']).utf8_decode($row['apPaternoCliente']).utf8_decode($row['apMaternoCliente']), 0, 0, 'L', 1); //agregar dato
$pdf->Cell(150, 5, 'Numero de el pedido: '.utf8_decode($row['idPedido']), 0, 0, 'L', 1); //agregar dato
$pdf->Cell(100, 5, 'Fecha de el pedido: '.utf8_decode($row['fechaPedido']), 0, 0, 1); //agregar datos
$pdf->Cell(200, 5, 'Metodo de envio: DHL', 0, 1, 'L', 1); 
$pdf->Cell(180, 5, 'Numero de la factura: 100'.utf8_decode($row['idPedido']), 0, 1, 1); //agregar datos
    
    
$pdf->Text(10, 80, '_____________________________________________________________________________________________________________________________________________', 1, 1, 'L', 1);
                
  }


$pdf->SetFillColor(166, 172, 175);
$pdf->Ln(10);     //FILA 1
$pdf->cell(6,5, 'No.', 1, 0, 'C', 1);
$pdf->cell(46,5, 'Producto', 1, 0, 'C', 1);
$pdf->cell(52,5, 'Descripcion', 1, 0, 'C', 1);
$pdf->cell(15,5, 'Cantidad', 1, 0, 'C', 1);
$pdf->cell(18,5, 'Precio Unit.', 1, 0, 'C', 1);
$pdf->cell(18,5, 'TOTAL', 1, 1, 'C', 1);

session_start();
$datos = $_SESSION['carrito'];

for($i=0; $i< count($datos); $i++){

    $pdf->SetFillColor(255, 255, 255);    //FILA 2
$pdf->cell(6,15, $datos[$i]['Id'], 1, 0, 'L', 1);
$pdf->cell(46,15, $datos[$i]['Nombre'], 1, 0, 'L', 1);
$pdf->cell(52,15, $datos[$i]['Descripcion'], 1, 0, 'L', 1);
$pdf->cell(15,15, $datos[$i]['Cantidad'], 1, 0, 'L', 1);
$pdf->cell(18,15, $datos[$i]['Precio'], 1, 0, 'L', 1);
$pdf->cell(18,15, $datos[$i]['Precio']*$datos[$i]['Cantidad'], 1, 1, 'L', 1);
    
}

unset($_SESSION['carrito']);


$pdf->Ln(10);      //FILA 6
$pdf->cell(195,15, 'FELICITACIONES POR SU COMPRA!!!', 1, 1, 'C', 1);

//FILA 7
$pdf->SetFillColor(166, 172, 175);
$pdf->cell(49,5, 'SUBTOTAL DE MERCANCIA', 1, 0, 'C', 1);
$pdf->cell(34,5, 'STATUS', 1, 0, 'C', 1);
$pdf->cell(34,5, 'IMPUESTOS DE ENVIO', 1, 0, 'C', 1);
$pdf->cell(29,5, 'TOTAL', 1, 1, 'C', 1);

 $query2 = "SELECT * FROM `pedido` ORDER by idPedido DESC LIMIT 1";
 $resultado2 = $mysqli->query($query2);


while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) { 
                
$totalyenvio = $row['totalPedido'] + $row['precioEnvioPedido'];
$pdf->SetFillColor(255, 255, 255);    //FILA 2
$pdf->cell(25,15,  utf8_decode($row['totalPedido']), 1, 0, 'L', 1);
$pdf->cell(30,15,  utf8_decode($row['estadoPedido']), 1, 0, 'L', 1);
$pdf->cell(16,15,  utf8_decode($row['precioEnvioPedido']), 1, 0, 'L', 1);
$pdf->cell(25,15,  $totalyenvio, 1, 0, 'L', 1);
                
  }
           





$pdf->Output();// D = DESCARGA, (F, 'nombre') = Guardar en disco.
?>