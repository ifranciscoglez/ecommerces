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

 $pdf->Image('img/seplogo.png', 10, 07, 48);
 $pdf->Image('img/mexico.png', 182, 10, 22);
{
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(50);
        $pdf->Cell(120, 05, 'SISTEMA EDUCATIVO NACIONAL', 0, 0, 'L');
        $pdf->Ln(05);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50);
        $pdf->Cell(105, 05, 'REPORTE DE EVALUACION', 0, 0, 'C');
        $pdf->Ln(05);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(50);
        $pdf->Cell(50, 05, '1er GRADO DE EDUCACION PREESCOLAR', 0, 0, 'L');
        $pdf->Cell(55, 05, 'CICLO ESCOLAR: 2017-2018', 0, 0, 'R');
        $pdf->Ln(10);//Salto de Linea
    }
$pdf->SetFillColor(77, 79, 79);
$pdf->SetFont('Arial', '', 8);//Fuente
$pdf->Cell(190, 8, 'DATOS DEL(DE LA) ALUMNO(A)', 1, 0, 'L', 1);
$pdf->Ln(6);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(47.5, 8, 'PRIMER APELLIDO: GONZALES', 0, 0, 'L', 1);
$pdf->Cell(47.5, 8, 'SEGUNDO APELLIDO: NAVARRETE', 0, 0, 'L', 1);
$pdf->Cell(47.5, 8, 'NOMBRE(S): FRANCISCO JAVIER', 0, 0, 'L', 1);
$pdf->Cell(47.5, 8, 'CURP: FRA4520024', 0, 0, 'L', 1);
$pdf->Ln(6);
$pdf->SetFillColor(77, 79, 79);
$pdf->SetFont('Arial', '', 8);//Fuente
$pdf->Cell(190, 6, 'DATOS DE LA ESCUELA', 1, 0, 'L', 1);
$pdf->Ln(6);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(100, 8, 'NOMBRE DE LA ESCUELA', 0, 0, 'L', 1);
$pdf->Cell(24, 8, 'GRUPO', 0, 0, 'L', 1);
$pdf->Cell(33, 8, 'TURNO', 0, 0, 'L', 1);
$pdf->Cell(33, 8, 'CCT', 0, 0, 'L', 1);
$pdf->Ln(6);
$pdf->SetFillColor(77, 79, 79);
$pdf->SetFont('Arial', '', 7);//Fuente
$pdf->Cell(190, 5, 'AVANCES DEL(DE LA) ALUMNO(A)', 1, 0, 'L', 1);
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(190, 5, 'El(la) maestro(a) registrara sus observaciones sobre los avances del(de la) alumno(a).', 1, 0, 'L', 1);
$pdf->Ln(5);
$pdf->SetFillColor(166, 172, 175);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(190, 5, 'LENGUAJE Y COMUNICACION', 1, 0, 'L', 1);
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(19, 9, 'NOVIEMBRE', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'MARZO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'JULIO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->SetFillColor(166, 172, 175);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(190, 5, 'PENSAMIENTO MATEMATICO', 1, 0, 'L', 1);
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(19, 9, 'NOVIEMBRE', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'MARZO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'JULIO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->SetFillColor(166, 172, 175);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(190, 5, 'EXPLORACION Y CONOCIMIENTO DEL MUNDO', 1, 0, 'L', 1);
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(19, 9, 'NOVIEMBRE', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'MARZO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'JULIO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->SetFillColor(166, 172, 175);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(190, 5, 'DESARROLLO FÍSICO Y SALUD', 1, 0, 'L', 1);
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(19, 9, 'NOVIEMBRE', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'MARZO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'JULIO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->SetFillColor(166, 172, 175);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(190, 5, 'DESARROLLO PERSONAL Y SOCIAL', 1, 0, 'L', 1);
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(19, 9, 'NOVIEMBRE', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'MARZO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'JULIO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->SetFillColor(166, 172, 175);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(190, 5, 'EXPRESION Y APRECIACION ARTISTICAS', 1, 0, 'L', 1);
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(19, 9, 'NOVIEMBRE', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'MARZO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(9);
$pdf->Cell(19, 9, 'JULIO', 1, 0, 'L', 1);
$pdf->Cell(171, 9, '', 1, 0, 'L', 1);
$pdf->Ln(12);
$pdf->SetFillColor(77, 79, 79);              //PRIMER CUADRO CON FILAS
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(18, 15, 'INASISTENCIAS', 1, 0, 'L', 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 4);//Fuente
$pdf->Cell(11, 13, '', 1, 0, 'C', 1);  //CUADROS VACIOS; AGREGAR DATOS
$pdf->Cell(11, 13, '', 1, 0, 'C', 1);
$pdf->Cell(11, 13, '', 1, 0, 'C', 1);
$pdf->SetFillColor(229, 231, 233);
$pdf->Cell(11, 15, 'TOTAL', 1, 1, 'C', 1);   //CUADRO: SE AGREGA DATOS

$pdf->Ln(7);               //RECTANGULOS DE LAS FECHAS NO SE AGREGA NADA
$pdf->SetXY(28,272); // (272) sube de linea
$pdf->SetFillColor(77, 79, 79);
$pdf->SetFont('Arial', '', 4);//Fuente
$pdf->Cell(11, 2, 'NOVIEMBRE', 1, 0, 'C', 1); //aqui no se agrega ningun dato
$pdf->Cell(11, 2, 'MARZO', 1, 0, 'C', 1);
$pdf->Cell(11, 2, 'JULIO', 1, 0, 'C', 1);

$pdf->Ln(7);                  //  TERCER CUADRO CON DOS DILAS
$pdf->SetXY(75,260);
$pdf->SetFillColor(77, 79, 79);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(60, 4, 'CRITERIO DE PROMOCION', 1, 1, 'L',1); //NO SE AGREGADA NINGUN DATO
$pdf->Cell(65);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 7);//Fuente
$pdf->Cell(60, 11, 'CONCLUYO EL PRIMER GRADO:', 1, 0, 'L', 1); //AGREGAR DATO

$pdf->SetXY(140,260); //POSICION DEL RECTANGULO
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 9);//Fuente
$pdf->Cell(30, 9, 'FOLIO', 0, 0, 'L', 1);   //AGREGAR DATO 
$pdf->SetFont('Arial', '', 4.5);//Fuente
$pdf->Text(143, 274, 'ESTE REPORTE ES VÁLIDO EN LOS ESTADOS UNIDOS MEXICANOS');   //SOLO TEXTO
$pdf->Text(143, 276, 'NO REQUIERE TRÁMITES ADICIONALES DE LEGALIZACIÓN Y NO ES');
$pdf->Text(145, 278, 'VÁLIDO SI PRESENTA BORRADURAS O ENMENDADURAS');

$pdf->AddPage();//Añade una nueva pagina
$pdf->SetFillColor(77, 79, 79);
$pdf->SetFont('Arial', '', 8);//Fuente
$pdf->Cell(190, 5, 'RECOMENDACIONES', 1, 0, 'C', 1);
$pdf->Ln(5);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(190, 165, '', 1, 0, 'L', 1); //INICAL EL CUADRO
$pdf->SetFont('Arial', '', 7);//Fuente
$pdf->Text(25, 20, 'Si es necesario, el(la) maestro(a) registrará las recomendaciones que considere necesarias para favorecer el avance del(de la) alumno(a).');
$pdf->Ln(170);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100, 65, '', 1, 'C', 0);  // EL SEGUNDO CUADRO DONDE AGREGO EL CUADRO DE LA FIRMA
$pdf->Ln(1);
$pdf->MultiCell(100, 6, '
______________________________________________________________________ 
    NOMBRE Y FIRMA DEL(DE LA) MAESTRO(A) 
______________________________________________________________________ 
    NOMBRE Y FIRMA DEL(DE LA) DIRECTOR(A)
______________________________________________________________________ 
    LUGAR DE EXPEDICION', 0, 'C', 0);


$pdf->SetXY(17,242); //POSICION DEL CUADRO DE FECHAS
$pdf->Cell(12, 4, '', 1, 0, 'C', 1);  //AGREGAR DATOS
$pdf->Cell(12, 4, '', 1, 0, 'C', 1);
$pdf->Cell(12, 4, '', 1, 1, 'C', 1);   //AGREGAR DATOS
$pdf->SetX(17);
$pdf->SetFont('Arial', '', 5);//Fuente
$pdf->Cell(12, 3, 'AÑO', 0, 0, 'C', 1); //NO AGREGAR DATOS
$pdf->Cell(12, 3, 'MES', 0, 0, 'C', 1);
$pdf->Cell(12, 3, 'DIA', 0, 0, 'C', 1);
$pdf->SetFont('Arial', '', 5);//Fuente
$pdf->Text(78, 246, 'SELLO SISTEMA');
$pdf->Text(75, 248, 'EDUCATIVO NACIONAL');


$pdf->Cell(110);
$pdf->SetFillColor(77, 79, 79);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->SetXY(118,185);
$pdf->Cell(80, 5, 'PARA PREESCOLAR INDIGENA', 1, 1, 'L', 1); //
$pdf->Cell(110);
$pdf->SetXY(118,190);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(80, 4, 'LENGUA INDIGENA
NOMBRE_______________________________________________________

', 1, 1, 'L', 1); 

$pdf->Ln(5);
$pdf->SetFillColor(77, 79, 79);    //CUARTO RECTANGULO DE DATOS
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->Cell(110);
$pdf->SetXY(118,205);
$pdf->Cell(80, 05, 'FIRMA DE LA MADRE, PADRE DE FAMILIA O TUTOR(A)', 1, 0, 'L', 1); //   primera fila
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(110);
$pdf->SetXY(118,210);
$pdf->Cell(80, 13, 'MOMENTO DE EVALUACION I', 1, 0, 'L', 1); //segunda fila se agrega datos
$pdf->Cell(110);
$pdf->SetXY(118,223);
$pdf->Cell(80, 13, 'MOMENTO DE EVALUACION II', 1, 0, 'L', 1); //TERCERA FILA SE AGREGA DATPS
$pdf->Cell(110);
$pdf->SetXY(118,236);
$pdf->Cell(80, 13, 'MOMENTO DE EVALUACION III', 1, 0, 'L', 1); //CUARTA FILA SE AGREGA DATOS

$pdf->SetFillColor(77, 79, 79);    //QUINTO RECTAGULO DE DATOS
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->SetY(256);
$pdf->Cell(60, 5, 'EDUCACION BASICA', 1, 1, 'C', 1);
$pdf->SetFillColor(144, 148, 151);
$pdf->Cell(60, 4, 'PREESCOLAR', 1, 0, 'C', 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Ln(4);
$pdf->SetFillColor(77, 79, 79);
$pdf->SetFont('Arial', '', 6);//Fuente
$pdf->SetFillColor(77, 79, 79);
$pdf->Cell(20, 4, '1', 1, 0, 'C', 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(20, 4, '2', 1, 0, 'C', 1);
$pdf->Cell(20, 4, '3', 1, 1, 'C', 1);
$pdf->Cell(60, 4, '1er PERIODO ESCOLAR', 1, 0, 'C', 1);

$pdf->SetFont('Arial', '', 5.5);//Fuente
$pdf->Text(58, 289, 'SE SANCIONARÁ A QUIEN CON DOLO O FINES LUCRATIVOS REPRODUZCA TOTAL O PARCIALMENTE ESTE FORMATO');


$pdf->Output();// D = DESCARGA, (F, 'nombre') = Guardar en disco.
?>
