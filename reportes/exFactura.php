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
if ($_SESSION['administrador']==1 || $_SESSION['cliente']==1 || $_SESSION['empleado']==1)
{
//Incluímos el archivo Factura.php
require('Factura.php');

//Obtenemos los datos de la cabecera de la venta actual
require_once "../modelos/Pagopredios.php";
$pago= new Pagopredios();
$rsptav = $pago->pago($_GET["id"]);
//Recorremos todos los valores obtenidos
$regv = $rsptav->fetch_object();

//Establecemos la configuración de la factura
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->Image("../files/PLANTILLA.png",-3,1, 214, 45);
$pdf->Image("../files/pajan.png",9,120, 192, 45);
//Enviamos los datos de la empresa al método addSociete de la clase Factura


//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->addClientAdresse(utf8_decode($regv->nombre_cliente. " " .$regv->apellido_cliente),"".utf8_decode("Fecha de pago: ").utf8_decode($regv->fecha_pago));

//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( utf8_decode("COD. CATASTRAL")=>32,
            "SECTOR"=>24,
             utf8_decode("AÑO")=>18,
             "PAGO PREDIO"=>28,
             "MORA"=>18,
             "RECARGO"=>23,
            "DCTO"=>23,
            "TOTAL"=>24);
$pdf->addCols( $cols);
$cols=array( utf8_decode("COD. CATASTRAL")=>"L",
            "SECTOR"=>"L",
             utf8_decode("AÑO")=>"L",
             "PAGO PREDIO"=>"C",
             "MORA."=>"R",
             "RECARGO"=>"C",
             "DCTO"=>"C",
             "TOTAL"=>"C");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);
//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 89;

//Obtenemos todos los detalles de la venta actual
$rsptav = $pago->pago($_GET["id"]);
while ($regv = $rsptav->fetch_object()) {
  $line = array(utf8_decode("COD. CATASTRAL")=> "$regv->cod_catastral",
                "SECTOR"=>"$regv->sector",
                utf8_decode("AÑO")=> utf8_decode("$regv->anio"),
                "PAGO PREDIO"=> "$regv->pago_predio",
                "MORA"=> "$regv->interes_mora",
                "RECARGO"=> "$regv->recargo",
                "DCTO"=> "$regv->pronto_pago",
                "TOTAL"=> "$regv->total"
              );
            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;
}

//Convertimos el total en letras
$rsptav = $pago->pago($_GET["id"]);
$regv = $rsptav->fetch_object();
require_once "Letras.php";
$V=new EnLetras(); 
$con_letra=strtoupper($V->ValorEnLetras($regv->total, utf8_decode("DÓLARES")));
$pdf->addCadreTVAs("---".$con_letra);

//Mostramos el impuesto
$pdf->addTVAs($regv->total);
$pdf->addCadreEurosFrancs("TOTAL A PAGAR"." $regv->total %");
/* $pdf->Output('Reporte de Venta','I'); */

$pdf->Output('Reporte de Venta','I');

}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>