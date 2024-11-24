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
//if ($_SESSION['administrador']==1 )
//+{ 
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                    <center><h1 class="box-title">DATOS INFORMATIVOS </h1></center>
                            <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> 
                        
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Carrera</th>
                            <th>Fecha de evaluación</th>
                            <th>Periodos evaluados</th>
                            <th>Tipo de indicador</th>
                            <th>Tema de vinculación</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Carrera</th>
                            <th>Fecha de evaluación</th>
                            <th>Periodos evaluados</th>
                            <th>Tipo de indicador</th>
                            <th>Tema de vinculación</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Docente:</label>
                          <input type="hidden" name="id_dato" id="id_dato">
                          <select id="id_prof" name="id_prof" onchange="subc()" class="form-control selectpicker" data-live-search="true" required></select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Carrera evaluada(*):</label> 
                            <input type="text" class="form-control" name="carrera_ev" id="carrera_ev" maxlength="200" placeholder="Carrera evaluada" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Fecha evaluada(*):</label> 
                            <input type="date" class="form-control" name="fecha_ev" id="fecha_ev" maxlength="200" placeholder="" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Periodos evaluados(*):</label> 
                            <input type="text" class="form-control" name="periodos_ev" id="periodos_ev" maxlength="200" placeholder="Periodos evaluados" required>
                          </div>
                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Tipo de indicador(*):</label> 
                            <input type="text" class="form-control" name="tipo_ind" id="tipo_ind" maxlength="200" placeholder="Tipo de indicador" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Tema de vinculación(*):</label> 
                            <input type="text" class="form-control" name="tema_vinc" id="tema_vinc" maxlength="200" placeholder="Tema de vinculación" required>
                          </div>

                          <center>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                          </center>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
/*}
else
{
require 'noacceso.php';
} */
require 'footer.php';
?>

<script type="text/javascript" src="scripts/datosinf.js"></script>
<?php 
}
ob_end_flush();
?>