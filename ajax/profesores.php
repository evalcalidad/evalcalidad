<?php
ob_start();
if (strlen(session_id()) < 1){
    session_start();//Validamos si existe o no la sesión
}
require_once "../modelos/Profesores.php";
$empleados= new Profesores();

$id_prof = isset($_POST["id_prof"])? limpiarCadena($_POST["id_prof"]):"";
$nombre_prof = isset($_POST["nombre_prof"])? limpiarCadena($_POST["nombre_prof"]):"";
$apellido_prof = isset($_POST["apellido_prof"])? limpiarCadena($_POST["apellido_prof"]):"";
$cedula_prof = isset($_POST["cedula_prof"])? limpiarCadena($_POST["cedula_prof"]):"";
$telefono_prof = isset($_POST["telefono_prof"])? limpiarCadena($_POST["telefono_prof"]):"";
$direccion_prof = isset($_POST["direccion_prof"])? limpiarCadena($_POST["direccion_prof"]):"";
$email_prof = isset($_POST["email_prof"])? limpiarCadena($_POST["email_prof"]):"";
$nominacion = isset($_POST["nominacion"])? limpiarCadena($_POST["nominacion"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        //si el id esta vacio --empty
        if(empty($id_prof)){
            $rsptaced = $empleados->mostrar_cedula($cedula_prof);
            $cantidadced = count($rsptaced);
                        if($cantidadced == 0){
                            $rspta= $empleados->insertar($nombre_prof,$apellido_prof,$cedula_prof,$telefono_prof,$direccion_prof,$email_prof,$nominacion);
                            echo $rspta ? "Docente registrado" : "No se pudo registrar el docente";
                        }else{
                            echo "Docente ya existe";
                        }
        }
        else{
            $rsptaced2 = $empleados->mostrar_cedula2($cedula_prof,$id_prof);
            $cantidadced2 = count($rsptaced2);
            $rsptaced3 = $empleados->mostrar_cedula($cedula_prof);
            $cantidadced3 = count($rsptaced3);

            if($cantidadced3 == 0){
                $rspta= $empleados->editar($id_prof,$nombre_prof,$apellido_prof,$cedula_prof,$telefono_prof,$direccion_prof,$email_prof,$nominacion);
                 echo $rspta ? "Docente actualizado" : "No se pudo actualizar el docente";
            }else if($cantidadced2 == 1){
                $rspta= $empleados->editar($id_prof,$nombre_prof,$apellido_prof,$cedula_prof,$telefono_prof,$direccion_prof,$email_prof,$nominacion);
                echo $rspta ? "Docente actualizado" : "No se pudo actualizar el docente";
            }else{
                echo "Docente ya existe";
            }
        }   
        break;

    case 'mostrar':
		$rspta=$empleados->mostrar($id_prof);
		//Codificar el resultado utilizando json
		echo json_encode($rspta);
        break;

    case 'listar':

     $rspta=$empleados->listar();
        $data= Array(); //se declara un array
        while($reg=$rspta->fetch_object()){ //recorre los registros de la tabla
            $data[]=array(
                "0"=>($reg->estado_prof)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_prof.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_prof.')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="mostrar('.$reg->id_prof.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-primary" onclick="activar('.$reg->id_prof.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->nombre_prof,
                "2"=>$reg->nombre_prof,
                "3"=>$reg->cedula_prof,
                "4"=>$reg->telefono_prof,
                "5"=>$reg->direccion_prof,
                "6"=>$reg->email_prof,
                "7"=>($reg->estado_prof)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
            );
        }

        $results = array(
            "sEcho"=>1, 
            "iTotalRecords"=>count($data), //enviar total de registros al datatable
            "iTotalDisplayRecords"=>count($data), //envio total de registros a visualizar
            "aaData"=>$data
        );
        echo json_encode($results);

        break;

       

case 'desactivar':
            $rspta=$empleados->desactivar($id_prof);
            echo $rspta ? "Docente desactivado" : "Docente no se puede desactivar";
        break;


    case 'activar':
            $rspta=$empleados->activar($id_prof);
            echo $rspta ? "Docente activado" : "Docente no se puede activar";
        break;

    case 'verificar2':

        $rspta=$empleados->verificar2($cedula_prof);
        $fetch=$rspta->fetch_object();
        echo json_encode($fetch);

        break;
}
ob_end_flush();
?>