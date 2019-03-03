<?php
include 'plantilla.php';
#require 'conexion.php';//ARCHIVO DE CONEXION

#AQUI VA LA CONSULTA A LA BD
/*
$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
$resultado = $mysqli->query($query);*/



$pdf = new PDF();//Alineacion de la hoja(L, P), medida de la hoja (mm. cm, in), Tamaño (A4, Legal, array(100,50) )
$pdf->AliasNbPages();//Muestra el numero de paginas
$pdf->AddPage();//Añade una nueva pagina

 $pdf->Image('img/guerrero.png', 13, 05, 45);
 $pdf->Image('img/educacion.png', 132, 06, 75);
{
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Ln(14);
        $pdf->Cell(54);
        $pdf->Cell(50, 05, 'ESTADISTICA BASICA POR CENTRO DE TRABAJO', 0, 0, 'L');
        $pdf->Ln(05);//Salto de Linea
    
    } 

$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 7);//Fuente
$pdf->Cell(142);
$pdf->Cell(50, 8, 'Fecha de Impresion:', 0, 0, 'L', 1); //CAMBIA FECHA
$pdf->Ln(5);
$pdf->Cell(195, 4, '_____________________________________________________________________________________________________________________________________________', 0, 1, 'L', 1);
$pdf->Cell(37, 5, 'C.C.T. : 12PPR0395H', 0, 0, 'L', 1);
$pdf->Cell(92, 5, 'Nombre : INSTITUTO HISPANOAMERICANO MEXICANO', 0, 0, 'L', 1);
$pdf->Cell(50, 5, 'Turno : 100', 0, 1, 'L', 1);
$pdf->Cell(129, 5, 'Domicilio : C. VICENTE GUERRERO N¦49 NUM.', 0, 0, 'L', 1);
$pdf->Cell(50, 5, 'Zona : 048', 0, 1, 'L', 1);
$pdf->Cell(129, 5, 'Localidad : ACAPULCO DE JUAREZ', 0, 0, 'L', 1);
$pdf->Cell(50, 5, 'Ciclo Escolar : 2017-2018', 0, 1, 'L', 1); //CAMBIA FECHA
$pdf->Cell(129, 5, 'Municipio : ACAPULCO DE JUAREZ', 0, 0, 'L', 1);
$pdf->Cell(50, 5, 'Id. Docto :', 0, 1, 'L', 1); //AGREGAR DATO
$pdf->Text(10, 57, '_____________________________________________________________________________________________________________________________________________', 1, 1, 'L', 1);
$pdf->Ln(5);     //FILA 1
$pdf->cell(49,5, 'GRADO', 1, 0, 'C', 1);
$pdf->cell(49,5, 'GRUPO', 1, 0, 'C', 1);
$pdf->cell(34,5, 'HOMBRES', 1, 0, 'C', 1);
$pdf->cell(34,5, 'MUJERES', 1, 0, 'C', 1);
$pdf->cell(29,5, 'TOTAL', 1, 1, 'C', 1);

$pdf->Ln(2);     //FILA 2
$pdf->cell(49,5, '1', 1, 0, 'C', 1);
$pdf->cell(49,5, 'A', 1, 0, 'C', 1);
$pdf->cell(34,5, '7', 1, 0, 'C', 1);
$pdf->cell(34,5, '7', 1, 0, 'C', 1);
$pdf->cell(29,5, '14', 1, 1, 'C', 1);

$pdf->cell(49,5, 'SUBTOTAL', 1, 0, 'C', 1);
$pdf->cell(49,5, '', 1, 0, 'C', 1);
$pdf->cell(34,5, '7', 1, 0, 'C', 1);
$pdf->cell(34,5, '7', 1, 0, 'C', 1);
$pdf->cell(29,5, '14', 1, 1, 'C', 1);

$pdf->Ln(2);       //FILA 3
$pdf->cell(49,5, '2', 1, 0, 'C', 1);
$pdf->cell(49,5, 'A', 1, 0, 'C', 1);
$pdf->cell(34,5, '12', 1, 0, 'C', 1);
$pdf->cell(34,5, '8', 1, 0, 'C', 1);
$pdf->cell(29,5, '20', 1, 1, 'C', 1);

$pdf->cell(49,5, 'SUBTOTAL', 1, 0, 'C', 1);
$pdf->cell(49,5, '', 1, 0, 'C', 1);
$pdf->cell(34,5, '12', 1, 0, 'C', 1);
$pdf->cell(34,5, '8', 1, 0, 'C', 1);
$pdf->cell(29,5, '20', 1, 1, 'C', 1);
                 
$pdf->Ln(2);        //FILA 4
$pdf->cell(49,5, '3', 1, 0, 'C', 1);
$pdf->cell(49,5, 'A', 1, 0, 'C', 1);
$pdf->cell(34,5, '6', 1, 0, 'C', 1);
$pdf->cell(34,5, '7', 1, 0, 'C', 1);
$pdf->cell(29,5, '13', 1, 1, 'C', 1);

$pdf->cell(49,5, 'SUBTOTAL', 1, 0, 'C', 1);
$pdf->cell(49,5, '', 1, 0, 'C', 1);
$pdf->cell(34,5, '6', 1, 0, 'C', 1);
$pdf->cell(34,5, '7', 1, 0, 'C', 1);
$pdf->cell(29,5, '13', 1, 1, 'C', 1);

$pdf->Ln(2);      //FILA 5
$pdf->cell(49,5, '4', 1, 0, 'C', 1);
$pdf->cell(49,5, 'A', 1, 0, 'C', 1);
$pdf->cell(34,5, '6', 1, 0, 'C', 1);
$pdf->cell(34,5, '12', 1, 0, 'C', 1);
$pdf->cell(29,5, '12', 1, 1, 'C', 1);

$pdf->cell(49,5, 'SUBTOTAL', 1, 0, 'C', 1);
$pdf->cell(49,5, '', 1, 0, 'C', 1);
$pdf->cell(34,5, '6', 1, 0, 'C', 1);
$pdf->cell(34,5, '12', 1, 0, 'C', 1);
$pdf->cell(29,5, '12', 1, 1, 'C', 1);

$pdf->Ln(2);      //FILA 6
$pdf->cell(49,5, '5', 1, 0, 'C', 1);
$pdf->cell(49,5, 'A', 1, 0, 'C', 1);
$pdf->cell(34,5, '11', 1, 0, 'C', 1);
$pdf->cell(34,5, '10', 1, 0, 'C', 1);
$pdf->cell(29,5, '21', 1, 1, 'C', 1);

$pdf->cell(49,5, 'SUBTOTAL', 1, 0, 'C', 1);
$pdf->cell(49,5, '', 1, 0, 'C', 1);
$pdf->cell(34,5, '11', 1, 0, 'C', 1);
$pdf->cell(34,5, '10', 1, 0, 'C', 1);
$pdf->cell(29,5, '21', 1, 1, 'C', 1);

$pdf->Ln(2);      //FILA 7
$pdf->cell(49,5, '6', 1, 0, 'C', 1);
$pdf->cell(49,5, 'A', 1, 0, 'C', 1);
$pdf->cell(34,5, '8', 1, 0, 'C', 1);
$pdf->cell(34,5, '9', 1, 0, 'C', 1);
$pdf->cell(29,5, '17', 1, 1, 'C', 1);

$pdf->cell(49,5, 'SUBTOTAL', 1, 0, 'C', 1);
$pdf->cell(49,5, '', 1, 0, 'C', 1);
$pdf->cell(34,5, '8', 1, 0, 'C', 1);
$pdf->cell(34,5, '9', 1, 0, 'C', 1);
$pdf->cell(29,5, '17', 1, 1, 'C', 1);

$pdf->Ln(3);      //FILA 8
$pdf->cell(49,5, 'TOTAL GENERAL', 1, 0, 'C', 1);
$pdf->cell(49,5, '', 1, 0, 'C', 1);
$pdf->cell(34,5, '50', 1, 0, 'C', 1);
$pdf->cell(34,5, '47', 1, 0, 'C', 1);
$pdf->cell(29,5, '97', 1, 1, 'C', 1);
$pdf->Ln(10);
$pdf->cell(40);
$pdf->cell(100,5, 'SUPERVISOR (A)', 0, 0, 'L', 1);
$pdf->cell(30,5, 'DIRECTOR (A)', 0, 1, 'L', 1);
$pdf->cell(22);
$pdf->cell(100,5, '_____________________________________', 0, 0, 'L', 1);
$pdf->cell(60,5, '_____________________________________', 0, 1, 'L', 1);
$pdf->cell(135);
$pdf->cell(40,5, 'ULISES GARCIA RODRIGUEZ', 0, 0, 'L', 1);


 


$pdf->Output();// D = DESCARGA, (F, 'nombre') = Guardar en disco.
?>