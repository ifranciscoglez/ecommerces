<?php
include 'plantilla.php';
require '../conexion.php';//ARCHIVO DE CONEXION



#AQUI VA LA CONSULTA A LA BD*
 $query = "select * from cliente order by idCliente ASC";
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
        $pdf->Cell(50, 05, 'CLIENTES', 0, 0, 'L');
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
$pdf->cell(5,5, 'ID', 1, 0, 'C', 1);
$pdf->cell(16,5, 'NOMBRE', 1, 0, 'C', 1);
$pdf->cell(16,5, 'APE PA', 1, 0, 'C', 1);
$pdf->cell(16,5, 'APE MA', 1, 0, 'C', 1);
$pdf->cell(16,5, 'TELEFONO', 1, 0, 'C', 1);
$pdf->cell(28,5, 'EMAIL', 1, 0, 'C', 1);
$pdf->cell(14,5, 'PAIS', 1, 0, 'C', 1);
$pdf->cell(16,5, 'ESTADO', 1, 0, 'C', 1);
$pdf->cell(16,5, 'CUIDAD', 1, 0, 'C', 1);
$pdf->cell(20,5, 'COLONIA', 1, 0, 'C', 1);
$pdf->cell(26,5, 'CALLE', 1, 0, 'C', 1);
$pdf->cell(6,5, 'NUM', 1, 1, 'C', 1);




          while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { 
                
        $pdf->SetFillColor(255, 255, 255);    //FILA 2
$pdf->cell(5,15, '', 1, 0, 'L', 1);              
$pdf->cell(16,15,  utf8_decode($row['nombreCliente']), 1, 0, 'L', 1);
$pdf->cell(16,15,  utf8_decode($row['apPaternoCliente']), 1, 0, 'L', 1);
$pdf->cell(16,15,  utf8_decode($row['apMaternoCliente']), 1, 0, 'L', 1);
$pdf->cell(16,15,  utf8_decode($row['telefonoCliente']), 1, 0, 'L', 1);
$pdf->cell(28,15,  utf8_decode($row['emailCliente']), 1, 0, 'L', 1);
$pdf->cell(14,15,  utf8_decode($row['paisCliente']), 1, 0, 'L', 1);
$pdf->cell(16,15,  utf8_decode($row['estadoCliente']), 1, 0, 'L', 1);
$pdf->cell(16,15,  utf8_decode($row['ciudadCliente']), 1, 0, 'L', 1);
$pdf->cell(20,15,  utf8_decode($row['coloniaCliente']), 1, 0, 'L', 1);
$pdf->cell(26,15,  utf8_decode($row['direccionCliente']), 1, 0, 'L', 1);
$pdf->cell(6,15,  utf8_decode($row['numExtCliente']), 1, 1, 'L', 1);
//$pdf->cell(6,15,  utf8_decode($row['numInteCliente']), 1, 1, 'L', 1);
                
  }     

        
            
            

//FILA 3
//$pdf->cell(6,15, '', 1, 0, 'L', 1);
//$pdf->cell(16,15, '', 1, 0, 'L', 1);
//$pdf->cell(46,15, '', 1, 0, 'L', 1);
//$pdf->cell(52,15, '', 1, 0, 'L', 1);
//$pdf->cell(24,15, '', 1, 0, 'L', 1);
//$pdf->cell(15,15, '', 1, 0, 'L', 1);
//$pdf->cell(18,15, '', 1, 0, 'L', 1);
//$pdf->cell(18,15, '', 1, 1, 'L', 1);
                 
 //FILA 4


//FILA 5



 


$pdf->Output();// D = DESCARGA, (F, 'nombre') = Guardar en disco.
?>