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
 //if ($_SESSION['administrador']==1)
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
                    <center><h1 class="box-title">PROGRAMAS - PROYECTOS DE VINCULACIÓN </h1></center>
                            <!-- <a href="../reportes/rptprofesores.php" target="_blank"><button class="btn btn-info" id="btnreporte"><i class="fa fa-clipboard"></i> Reporte</button></a></h1> -->
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                    <label><b><font size="2">Criterio: Pertinencia</font></b></label><br>
                    <label align="justify"><i><font size="2" name="crit" id="crit">
                    </font></i></label>
                    <label><b><font size="2">Subcriterio: Vinculación con la sociedad</font></b></label><br>
                    <label align="justify"><i><font size="2" name="subcrit" id="subcrit">
                    </font></i></label>
                    <label><b><font size="2">Indicador: Programas - Proyectos de vinculación con la sociedad</font></b></label><br>
                    <label  align="justify"><i><font size="2" name="indicador" id="indicador">
                      </font></i></label><br>
                      <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Docente responsable del criterio</label>
                        <select id="id_dato" name="id_dato"  onchange="datos()" class="form-control selectpicker" data-live-search="true" required>

                        <option value="">Seleccione Uno …</option>
                        </select>
                          </div>
                      <div class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <label>Valor de indicador: Programas - Proyectos de vinculación</label>
                          <input type="number" step=".01" class="form-control" name="valor_ind_1" id="valor_ind_1"  placeholder="" readonly>
                          </div>
                          <div class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <label>Valor de indicador: Calidad de la información</label>
                          <input type="number" step=".01" class="form-control" name="valor_ind_2" id="valor_ind_2"  placeholder="" readonly>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <br>
                          <a target="_blank"><button onclick="reporte()" class="btn btn-info" id="btnreporte2" ><i class="fa fa-clipboard"></i> Reporte</button></a>
                          </div>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Pregunta</th>
                            <th>Num</th>
                            <th>Cumplimiento</th>
                            <th>Valoración</th>
                            <th>Observación</th>
                            <th>Puntual</th>
                            <th>Consistente</th>
                            <th>Completa</th>
                            <th>Formal</th>
                            <th>Valor Ind</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Pregunta</th>
                            <th>Num</th>
                            <th>Cumplimiento</th>
                            <th>Valoración</th>
                            <th>Observación</th>
                            <th>Puntual</th>
                            <th>Consistente</th>
                            <th>Completa</th>
                            <th>Formal</th>
                            <th>Valor Ind</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <label></label>
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <label></label>
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <label></label>
                            </div>
                            <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <label></label>
                            </div>
                            <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <center><label>Calidad de la información</label></center>
                            </div>
                           
                            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                               <center> <label>Evidencias</label></center>
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <center><label>Cumplimiento</label></center>
                            </div>
                            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                               <center> <label>Valoración</label></center>
                            </div>
                            <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <center><label>Observación</label></center>
                            </div>
                            <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <center><label>Puntual</label></center>
                            </div>
                            <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <center><label>Consistente</label></center>
                            </div>
                            <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <center><label>Completa</label></center>
                            </div>
                            <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <center><label>Formal</label></center>
                            </div>
                            <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <center><label>Valor Ind.</label></center>
                            </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                          <label id="preg" name="preg" align="justify"></label> 
                            <input type="hidden" name="id_ev_pro" id="id_ev_pro">
                          <input type="hidden" name="id_preg_ev" id="id_preg_ev"><!-- 
                            <input type="text" class="form-control" name="cedula_usuario" id="cedula_usuario" maxlength="100" placeholder="Cédula" required> -->
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <!-- <label>Diseño curricular de la carrera(*):</label>  -->
                          <select onchange="vervaloracion()" id="id_valor" name="id_valor" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <label align="justify" name="descripcion" id="descripcion">
                            </label>
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <label align="justify" name="valoracion" id="valoracion">
                            </label>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <input type="text" class="form-control" name="observacion" id="observacion" maxlength="100" placeholder="" required>
                            </label>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <select onchange="calcularvalores()" id="puntual" name="puntual" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <select onchange="calcularvalores()" id="consistente" name="consistente" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <select onchange="calcularvalores()" id="completa" name="completa" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <select onchange="calcularvalores()" id="formal" name="formal" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <input type="number" step=".01" class="form-control" name="valor_ind" id="valor_ind"  placeholder="" readonly>
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

<script type="text/javascript" src="scripts/programas.js"></script>
<?php 
}
ob_end_flush();
?>