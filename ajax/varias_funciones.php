<?php
session_start();
require_once "../modelos/Varias_funciones.php";
$Criterio= new Varias_funciones();

/*/$id_d_c = isset($_POST["id_d_c"])? limpiarCadena($_POST["id_d_c"]):"";
$crit = isset($_POST["crit"])? limpiarCadena($_POST["crit"]):"";
$subcrit = isset($_POST["subcrit"])? limpiarCadena($_POST["subcrit"]):"";
$indicador = isset($_POST["indicador"])? limpiarCadena($_POST["indicador"]):"";
$id_criterio = isset($_POST["id_criterio"])? limpiarCadena($_POST["id_criterio"]):"";*/

$id_criterio = isset($_POST["VarCriterio"])? limpiarCadena($_POST["VarCriterio"]):"";




            

switch ($_POST["op"]){
    case 'guardaryeditar':
        //si el id esta vacio --empty
        if(empty($id_d_c)){
            $rspta= $compras->insertar($crit,$subcrit,$indicador,$id_criterio);
            echo $rspta ? "Criterios registrados" : "No se pudo registrar el criterio";
        }
        else{
            $rspta= $compras->editar($id_d_c,$crit,$subcrit,$indicador,$id_criterio);
            echo $rspta ? "Criterios actualizados" : "No se pudo actualizar el criterio";
        }   
        break;

    case 'mostrar':
        $rspta=$compras->mostrar($id_d_c);
        echo json_encode($rspta);
        break;

    

        case 'preguntas_criterio':
            $rspta = $Criterio -> selecciona_preguntas_criterio($id_criterio);
           // echo '<option >Seleccione un Criterio</option>';
            while($reg = $rspta->fetch_object())
            {
               
                echo '<option value=' . $reg->id_preg_ev . '>' . $reg->preg.'</option>';
            }

        break;

        case 'responsables':
            $rspta = $Criterio -> Lista_Responsables();
            echo '<option >Seleccione un Responsable</option>';
            while($reg = $rspta->fetch_object())
            {
               
                echo '<option value=' . $reg->id_prof . '>' . $reg->apellido_prof. ' '.$reg->nombre_prof.'</option>';
            }

        break;

        case 'tipo_usuarios':
            $rspta = $Criterio -> Lista_tipo_usuarios();
            //echo '<option >Seleccione un Responsable</option>';
            while($reg = $rspta->fetch_object())
            {
               
                echo '<option value=' . $reg->id_permiso . '>' . $reg->nombre.'</option>';
            }

        break;

        case 'carreras':
            $rspta = $Criterio -> Lista_Carreras();
            echo '<option >Seleccione una Carrera</option>';
            while($reg = $rspta->fetch_object())
            {
               
                echo '<option value=' . $reg->id_dato . '>' . $reg->carrera_ev.'</option>';
            }

        break;


        case 'valoracion':
            $rspta = $Criterio -> Valoracion();
            echo '<option >Seleccione la valoración</option>';
            while($reg = $rspta->fetch_object())
            {
               
                echo '<option value=' . $reg->id_valor . '>' . $reg->descripcion.'</option>';
            }

        break;

        

}

?>