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
// if ($_SESSION['administrador']==1 )
//{ 
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
                    <center><h1 class="box-title">VALORACIONES </h1></center>
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
                            <th>Valor</th>
                            <th>Descripción</th>
                            <th>Valoración</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Valor</th>
                            <th>Descripción</th>
                            <th>Valoración</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Valor:</label>
                          <input type="hidden" name="id_valor" id="id_valor">
                          <input type="number" step=".01" class="form-control" name="valor" id="valor" placeholder="Valor" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Descripción(*):</label> 
                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Valoración(*):</label> 
                        <input type="text" class="form-control" name="valoracion" id="valoracion" placeholder="Valoración" required>
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

<script type="text/javascript" src="scripts/valoracion.js"></script>
<?php 
}
ob_end_flush();
?>