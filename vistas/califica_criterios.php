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
 
 
 if ($_SESSION['tipo_usuario']==1 ) 
{ 
 
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
                     <center>
                      <h1 class="box-title">CALIFICACIÓN DE CRITERIOS  </h1></center>
                            <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button> 
                        
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                   
                    
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                      
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo de Criterio(*):</label> 
                            <select id="id_criterio" name="id_criterio" class="form-control selectpicker" data-live-search="true" required></select>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Criterio(*):</label>
                           
                            <select id="id_preguntas_criterio" name="id_preguntas_criterio" class="form-control selectpicker" data-live-search="true" required></select>
                        </div>
                      
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Carrera(*):</label>
                           
                            <select id="id_carrera" name="id_carrera" class="form-control selectpicker" data-live-search="true" required></select>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Valoración(*):</label>
                           
                            <select id="id_valoracion" name="id_valoracion" class="form-control selectpicker" data-live-search="true" required></select>
                        </div>

                       

                        <div class="box-header with-border">
                          <center>
                            <h1 class="box-title">CALIDAD DE LA INFORMACIÓN </h1></center>
                                 
                              
                              <div class="box-tools pull-right">
                               
                              </div>
                         </div>

                         <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Puntual</label>
                                  <input type="number" placeholder="0.00"  class="form-control" required name="puntual" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                                  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                                                  
                         </div>
                         <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Consistente</label>
                                  <input type="number" placeholder="0.00"  class="form-control" required name="consistente" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                                  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                                                  
                         </div>
                         <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Completa</label>
                                  <input type="number" placeholder="0.00"  class="form-control" required name="completa" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                                  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                                                  
                         </div>
                         <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Formal</label>
                                  <input type="number" placeholder="0.00"  class="form-control" required name="formal" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                                  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                                                  
                         </div>
                         <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Valor Ind.</label>
                                  <input type="number" placeholder="0.00"  class="form-control" required name="valor_ind" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
                                  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                                                  
                         </div>

                         <div class="form-group col-lg-12 col-md-2 col-sm-12 col-xs-12">
                            <label>Observación</label>
                  
                            <textarea id="observacion" name="observacion" class="form-control" id="" cols="30" rows="3"></textarea>
                            
                        </div>

                          <center>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar Criterio</button>

                          <!--   <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>-->
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
}
else
{
require 'noacceso.php';
} 
require 'footer.php';
?>

<script type="text/javascript" src="scripts/califica_criterios.js"></script>
<?php 
}
ob_end_flush();
?>