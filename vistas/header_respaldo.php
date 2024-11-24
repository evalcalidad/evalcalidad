<?php
if(strlen(session_id()) < 1)
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UNESUM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../reportes/logo-randypc.png">
    <link rel="stylesheet" type="text/css" href="../css black/menu.css">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">


    

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">UNESUM </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>UNESUM </b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
                 <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen_usuario']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nombre_usuario'] . " " . $_SESSION['apellido_usuario'];; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen_usuario']; ?>" class="img-circle" alt="User Image">
                    <p>
                    UNESUM
                      <small>Usuario: <?php echo $_SESSION['nombre_usuario'] . " " . $_SESSION['apellido_usuario'];; ?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
       <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            <?php 
            if ($_SESSION['administrador']==1)
            {
              echo '<li id="empleados1" class="treeview">
              <a href="#">
              <img src="../files/btn/Busuario1.png" class="escritorio">
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="empleados"><a href="usuario.php"><i class="fa fa-circle-o"></i> Registro de usuarios</a></li>
                <li id="permisos2"><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
              </ul>
            </li>';

            echo '<li id="empleados1" class="treeview">
            <a href="#">
            <img src="../files/btn/btnpersonal.png" class="escritorio">
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li id="prof"><a href="profesores.php"><i class="fa fa-circle-o"></i> Profesores </a></li>
              <li id="prof"><a ><i class="fa fa-circle-o"></i> Estudiantes </a></li>
            </ul>
          </li>';

          echo '<li id="empleados1" class="treeview">
          <a >
          <img src="../files/btn/btnrecur.png" class="escritorio">
          <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li id="prof"><a href="datosinf.php"><i class="fa fa-circle-o"></i> Datos informativos</a></li>
          <li id="prof"><a href="preguntas.php"><i class="fa fa-circle-o"></i> Preguntas</a></li>
          <li id="prof"><a href="valoraciones.php"><i class="fa fa-circle-o"></i> Valoraciones</a></li>
          <li id="prof"><a href="criterios.php"><i class="fa fa-circle-o"></i> Criterios</a></li>
          <li id="prof"><a href="documentacion.php"><i class="fa fa-circle-o"></i> Documentación</a></li>
          <li id="prof"><a href="califica_criterios.php"><i class="fa fa-circle-o"></i> Calificar criteros</a></li>
            </ul>
          </li>';


            echo '<li id="pa" class="treeview">
              <a href="#">
              <img src="../files/btn/BVINCU.png" class="escritorio">
              <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  
                          <li id="prof"><a href="#"><i class="fa fa-circle-o"></i> Planificación</a>
                                  <ul class="treeview-menu">
                                      <li id="prof"><a href="planificacion.php"><i class="fa fa-circle-o"></i> Misión y visión</a></li>
                                      <li id="prof"><a href="estudiosprosp.php"><i class="fa fa-circle-o"></i> Estudios prospectivos <br> &ensp;y planificación</a></li>
                                      <li id="prof"><a href="gestionaseg.php"><i class="fa fa-circle-o"></i> Gestión del aseguramiento <br> interno de la calidad</a></li>
                                  </ul>
                            </li>
                              <li id="prof"><a href="#"><i class="fa fa-circle-o"></i> Vinculación con la sociedad</a>
                                <ul class="treeview-menu">
                                  <li id="prof"><a href="programas.php"><i class="fa fa-circle-o"></i> Programas de vinculación</a>
                                  </li>
                                </ul>
                              </li>
              </ul>
            </li>';

           
           
           
            echo '<li id="empleados1" class="treeview">
              <a >
              <img src="../files/btn/btnorganiza.png" class="escritorio">
              <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>';

            echo '<li id="empleados1" class="treeview">
              <a >
              <img src="../files/btn/btncurri.png" class="escritorio">
              <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>';

            }
            ?>                   
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


      