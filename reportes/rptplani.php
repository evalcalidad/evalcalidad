<?php
//Activamos el almacenamiento en el buffer
ob_start();
if (strlen(session_id()) < 1) 
  session_start();

if (!isset($_SESSION["nombre_usuario"]))
{
  echo 'Debe ingresar al sistema correctamente para visualizar el reporte';
}
else
{
if ($_SESSION['administrador']==1)
{

//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');
 
//Instanciamos la clase para generar el documento pdf
$pdf=new PDF_MC_Table();
 
//Agregamos la primera página al documento pdf
$pdf->AddPage();
 
//Seteamos el inicio del margen superior en 25 pixeles 
$y_axis_initial = 25;
 
//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
$pdf->Image("../files/plantilla.png",3,2, 200, 45);
$pdf->cell(80);
$pdf->Ln(40);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6,utf8_decode('DATOS INFORMATIVOS'),2,0,'C');
$pdf->Ln(10);

$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,6,utf8_decode('Carrera evaluada'),1,0,'C',1); 
$pdf->Cell(100,6,utf8_decode('Fecha de evaluación'),1,0,'C',1);

$pdf->Ln(6);

require_once "../modelos/Planificacion.php";
$hc = new Planificacion();
$rspta = $hc->datosinformativos($_GET["id"]);
$pdf->SetWidths(array(90,100));

while($reg= $rspta->fetch_object())
{  
    $carrera_ev = $reg->carrera_ev;
    $fecha_ev = $reg->fecha_ev;
 	
 	$pdf->SetFont('Arial','',10);
  $pdf->Row(array(utf8_decode($carrera_ev),utf8_decode($fecha_ev)));
}

$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,6,utf8_decode('Periodos evaluados'),1,0,'C',1); 
$pdf->Cell(100,6,utf8_decode('Tipo de indicador'),1,0,'C',1);

$pdf->Ln(6);

require_once "../modelos/Planificacion.php";
$hc = new Planificacion();
$rspta = $hc->datosinformativos($_GET["id"]);
$pdf->SetWidths(array(90,100));

while($reg= $rspta->fetch_object())
{  
    $periodos_ev = $reg->periodos_ev;
    $tipo_ind = $reg->tipo_ind;
 	
 	$pdf->SetFont('Arial','',10);
  $pdf->Row(array(utf8_decode($periodos_ev),utf8_decode($tipo_ind)));
}
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,6,utf8_decode('Responsable del criterio (CACC)'),1,0,'C',1); 
$pdf->Cell(100,6,utf8_decode('Tema de vinculación'),1,0,'C',1);
$pdf->Ln(6);

require_once "../modelos/Planificacion.php";
$hc = new Planificacion();
$rspta = $hc->datosinformativos($_GET["id"]);
$pdf->SetWidths(array(90,100));

while($reg= $rspta->fetch_object())
{  
  $nombre_prof = $reg->nombre_prof;
  $apellido_prof = $reg->apellido_prof;
    $tema_vinc = $reg->tema_vinc;
 	
 	$pdf->SetFont('Arial','',10);
  $pdf->Row(array(utf8_decode($nombre_prof. " ".$apellido_prof), utf8_decode($tema_vinc)));
}

$pdf->Ln(6);
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,6,utf8_decode('Criterio: Pertinencia'),1,0,'J',1);
$pdf->Ln(6); 
$pdf->SetFont('Arial','',10);
$pdf->Multicell(190,6,utf8_decode("La pertinencia es uno de los principios que rigen el Sistema de Educación Superior, establecido en la Ley Orgánica de Educación Superior (LOES, 2010) el criterio se refiere a las capacidades que tiene una carrera para responder y articularse a las demandas del entorno como criterio considera estándares sobre la relación dialéctica de la educación superior, en su oferta de grado, con su contexto. Respecto al principio de Pertinencia es fundamental que la oferta de grado considere la planificación nacional y la política pública en educación superior, así también la normativa relacionada. En particular, para la revisión de pertinencia de carreras, estos estándares consideran las características académicas de programa que respondan a los requerimientos del entorno, particularmente que contribuyan a la planificación nacional para el desarrollo y la reducción de brechas en sectores prioritarios y emergentes."),1,'J',1); # FJ es el Force Justify
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Ln(12); 
$pdf->Cell(190,6,utf8_decode('Subcriterio: Planificación'),1,0,'J',1);
$pdf->Ln(6); 
$pdf->SetFont('Arial','',10);
$pdf->Multicell(190,6,utf8_decode("Este subcriterio agrupa estándares relacionados con el contexto interno y externo de una carrera. La pertinencia permite responder a las necesidades del contexto en función de varios elementos, tales como la estructura y organización de la carrera, a visión de corto, mediano y largo plazo, los objetivos estratégicos de la carrera, entre otros."),1,'J',1); # FJ es el Force Justify
$pdf->SetFont('Arial','B',10);
$pdf->Ln(12); 
$pdf->Cell(190,6,utf8_decode('Indicador: Misión y visión'),1,0,'J',1);
$pdf->Ln(6); 
$pdf->SetFont('Arial','',10);
$pdf->Multicell(190,6,utf8_decode("La misión y visión de la carrera son consistentes con la misión y visión institucional, están claramente definidos en cuanto a sus propósitos y objetivos, y guían efectivamente la planificación y ejecución de las actividades académicas.
a) La misión de la Carrera es una representación formal de sus objetivos, características, prioridades, áreas en las que se enfoca, que son notables o de particular interés para la misma.
b) Los resultados esperados describen el impacto que la Carrera se propone alcanzar en la comunidad académica y en la sociedad.
c) Las estrategias responden a cómo la Carrera alcanzará su misión y los resultados que espera obtener."),1,'J',1); # FJ es el Force Justify
$pdf->Ln(50);
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,6,utf8_decode('Evidencias'),1,0,'C',1); 
$pdf->Cell(50,6,utf8_decode('Cumplimiento'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Valoración'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Observación'),1,0,'C',1);


$pdf->Ln(6);

require_once "../modelos/Planificacion.php";
$hc = new Planificacion();
$rspta = $hc->listarreporte($_GET["id"]);
$pdf->SetWidths(array(90,25,25,25,25));

while($reg= $rspta->fetch_object())
{  
    $preg = $reg->preg;
    $valor = $reg->valor;
    $cumplimiento = $reg->descripcion;
    $valoracion = $reg->valoracion;
    $observacion = $reg->observacion;
    $puntual = $reg->puntual;
    $consistente = $reg->consistente;
    $completa = $reg->completa;
    $formal = $reg->formal;
    $valor_ind = $reg->valor_ind;
 	
 	$pdf->SetFont('Arial','',10);
  $pdf->Row(array(utf8_decode($preg), utf8_decode($valor), utf8_decode($cumplimiento), utf8_decode($valoracion), utf8_decode($observacion)));
}

require_once "../modelos/Planificacion.php";
$hc = new Planificacion();
$rspta = $hc->datos2($_GET["id"]);
$pdf->SetWidths(array(190));
$regv = $rspta->fetch_object();
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,6,utf8_decode('Valor de indicador: '.$regv->valor_ind_1),1,0,'C',1); 

$pdf->Ln(6);
$pdf->Ln(6);
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,6,utf8_decode('Calidad de la información'),1,0,'C',1); 
$pdf->Ln(6);
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,6,utf8_decode('Evidencias'),1,0,'C',1); 
$pdf->Cell(22,6,utf8_decode('Puntual'),1,0,'C',1);
$pdf->Cell(22,6,utf8_decode('Consistente'),1,0,'C',1);
$pdf->Cell(22,6,utf8_decode('Completa'),1,0,'C',1);
$pdf->Cell(22,6,utf8_decode('Formal'),1,0,'C',1);
$pdf->Cell(22,6,utf8_decode('Valor Ind.'),1,0,'C',1);


$pdf->Ln(6);

require_once "../modelos/Planificacion.php";
$hc = new Planificacion();
$rspta = $hc->listarreporte($_GET["id"]);
$pdf->SetWidths(array(80,22,22,22,22,22));

while($reg= $rspta->fetch_object())
{  
    $preg = $reg->preg;
    $puntual = $reg->puntual;
    $consistente = $reg->consistente;
    $completa = $reg->completa;
    $formal = $reg->formal;
    $valor_ind = $reg->valor_ind;
 	
 	$pdf->SetFont('Arial','',10);
  $pdf->Row(array(utf8_decode($preg), utf8_decode($puntual), utf8_decode($consistente), utf8_decode($completa), utf8_decode($formal),utf8_decode($valor_ind)));
}
require_once "../modelos/Planificacion.php";
$hc = new Planificacion();
$rspta = $hc->datos2($_GET["id"]);
$pdf->SetWidths(array(190));
$regv = $rspta->fetch_object();
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,6,utf8_decode('Valor de indicador: '.$regv->valor_ind_2),1,0,'C',1); 

$pdf->Ln(6);
$pdf->Ln(10);

$hc = new Planificacion();
$rspta = $hc->datosinformativos($_GET["id"]);
$reg= $rspta->fetch_object();

$nombre_prof = $reg->nombre_prof;
$apellido_prof = $reg->apellido_prof;
$pdf->Ln(10);
$pdf->Cell(200,6,utf8_decode($nombre_prof." ".$apellido_prof),2,0,'C');
$pdf->Ln(6);
$pdf->Cell(200,6,utf8_decode('Responsable del criterio de pertinencia - Comisión académica'),2,0,'C');
//Mostramos el documento pdf
$pdf->Output();

?>
<?php
}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>