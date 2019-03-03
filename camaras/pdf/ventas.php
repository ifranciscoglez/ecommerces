<?php
include 'plantilla.php';
require '../conexion.php';//ARCHIVO DE CONEXION



#AQUI VA LA CONSULTA A LA BD*
 $query = "select * from pedido order by fechaPedido ASC";
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
        $pdf->Cell(50, 05, 'VENTAS', 0, 0, 'L');
        $pdf->Ln(05);//Salto de Linea
    
    }
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 7);//Fuente
$pdf->Cell(142);
$pdf->Cell(50, 8, 'Fecha de Impresion:', 0, 0, 'L', 1); //CAMBIA FECHA
$pdf->Ln(5);
$pdf->Cell(195, 4, '_____________________________________________________________________________________________________________________________________________', 0, 1, 'L', 1);


$pdf->SetFillColor(166, 172, 175);
$pdf->Ln(10);     //FILA 1
$pdf->cell(10,5, 'ID', 1, 0, 'C', 1);
$pdf->cell(25,5, 'FECHA DE PEDIDO', 1, 0, 'C', 1);
$pdf->cell(25,5, 'SUBTOTAL', 1, 0, 'C', 1);
$pdf->cell(25,5, 'TOTAL', 1, 0, 'C', 1);
$pdf->cell(30,5, 'ESTADO', 1, 0, 'C', 1);
$pdf->cell(30,5, 'TIPO DE PAGO', 1, 0, 'C', 1);
$pdf->cell(50,5, 'CLIENTE', 1, 1, 'C', 1);




          while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
                
        $pdf->SetFillColor(255, 255, 255);    //FILA 2
$pdf->cell(10,15,  utf8_decode($row['idPedido']), 1, 0, 'L', 1);
$pdf->cell(25,15,  utf8_decode($row['fechaPedido']), 1, 0, 'L', 1);
$pdf->cell(25,15,  utf8_decode($row['subTotalPedido']), 1, 0, 'L', 1);
$pdf->cell(25,15,  utf8_decode($row['totalPedido']), 1, 0, 'L', 1);
//$pdf->cell(16,15,  utf8_decode($row['precioEnvioPedido']), 1, 0, 'L', 1);
$pdf->cell(30,15,  utf8_decode($row['estadoPedido']), 1, 0, 'L', 1);
$pdf->cell(30,15,  utf8_decode($row['TipoPago_idTipoPago']), 1, 0, 'L', 1);
$pdf->cell(50,15,  utf8_decode($row['Cliente_idCliente']), 1, 0, 'L', 1);
                
  }
            
        
            
            
            




 


$pdf->Output();// D = DESCARGA, (F, 'nombre') = Guardar en disco.
?>