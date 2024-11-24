<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre_usuario"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['administrador']==1)
{
  require_once "../modelos/Dashboard.php";
  $consulta = new Dashboard();
  $rsptac = $consulta->totalclientes();
  $regc=$rsptac->fetch_object();
  $totalc=$regc->total; 

  $rsptap = $consulta->totalpagoshoy();
  $regcp=$rsptap->fetch_object();
  $totalcp=$regcp->total;

  $rsptap2 = $consulta->totalpagos();
  $regcp2=$rsptap2->fetch_object();
  $totalcp2=$regcp2->total;

  //Datos para mostrar el gráfico de barras de las compras
/*   $ventas10 = $consulta->ventassultimos_10dias();
  $fechasc='';
  $totalesc='';
  while ($regfechac= $ventas10->fetch_object()) {
    $fechasc=$fechasc.'"'.$regfechac->fecha .'",';
    $totalesc=$totalesc.$regfechac->total .','; 
  } */

  //Quitamos la última coma
/*   $fechasc=substr($fechasc, 0, -1);
  $totalesc=substr($totalesc, 0, -1);  */

   //Datos para mostrar el gráfico de barras de las ventas
  $ventas12 = $consulta->pagosultimos_12meses();
  $fechasv='';
  $fechasv2='';
  $totalesv='';
  while ($regfechav= $ventas12->fetch_object()) {
    $fechasv=$fechasv.'"'.$regfechav->fecha .'",';
    $totalesv=$totalesv.$regfechav->total .','; 
  }

  //Quitamos la última coma
  $fechasv=substr($fechasv, 0, -1);
  $totalesv=substr($totalesv, 0, -1);


?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                    <center><h1 class="box-title">DASHBOARD </h1></center>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->

                    <div class="panel-body">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                              <div class="small-box bg-teal">
                              <div class="inner">
                                <h4 style="font-size:17px;">
                                  <strong><?php echo $totalc; ?></strong>
                                </h4>
                                <p>Total de clientes</p>
                              </div>
                              <div class="icon">
                                <i class="ion-person"></i>
                              </div>
                              <a href="clientes.php" class="small-box-footer">Clientes <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                          <div class="small-box bg-olive">
                              <div class="inner">
                                <h4 style="font-size:17px;">
                                  <strong>$<?php echo $totalcp; ?></strong>
                                </h4>
                                <p>Total de pago de predios (HOY)</p>
                              </div>
                              <div class="icon">
                                <i class="ion-cash"></i>
                              </div>
                              <a href="pagospredios.php" class="small-box-footer">Pago de predios Hoy<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                          <div class="small-box bg-green">
                              <div class="inner">
                                <h4 style="font-size:17px;">
                                  <strong>$<?php echo $totalcp2; ?></strong>
                                </h4>
                                <p>Total de pago de predios</p>
                              </div>
                              <div class="icon">
                                <i class="ion-cash"></i>
                              </div>
                              <a href="pagospredios.php" class="small-box-footer">Pago de predios <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="box box-black">
                              <div class="box-header with-border">
                                Pago de predios de los últimos 12 meses
                              </div>
                              <div class="box-body">
                                <canvas id="ventas12" width="400" height="150"></canvas>
                              </div>
                          </div>
                        </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script> 
<script type="text/javascript">
var ctx = document.getElementById("ventas12").getContext('2d');
var ventas = new Chart(ctx, {
    type: 'bar',
    fontcolor: "blue",
    data: {
        labels: [<?php echo $fechasv?>],
        datasets: [{
            label: 'Pagos de predios en los últimos 12 Meses',
            data: [<?php echo  $totalesv; ?>],
            fill: false,
            backgroundColor: [
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
            ],
            borderColor: [
              'rgba(0, 128, 0, 0.5)',
              'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
                'rgba(0, 128, 0, 0.5)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    steps: 10,
                    stepValue: 6,
                    max: 5000 //max value for the chart is 60
                }
            }],
        }
    }
});
</script>


</script>

<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>

<script type="text/javascript" src="scripts/prueba.js"></script>
<?php 
}
ob_end_flush();
?>


