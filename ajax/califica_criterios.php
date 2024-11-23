<?php
session_start();
require_once "../modelos/Califica_Criterios.php";
$compras= new Califica_Criterios();

$id_indicador= isset($_POST["id_criterio"])? limpiarCadena($_POST["id_criterio"]):"";
$id_pregunta_indicador = isset($_POST["id_preguntas_criterio"])? limpiarCadena($_POST["id_preguntas_criterio"]):"";
$id_carrera = isset($_POST["id_carrera"])? limpiarCadena($_POST["id_carrera"]):"";
$id_valoracion = isset($_POST["id_valoracion"])? limpiarCadena($_POST["id_valoracion"]):"";
$puntual = isset($_POST["puntual"])? limpiarCadena($_POST["puntual"]):"";
$consistente = isset($_POST["consistente"])? limpiarCadena($_POST["consistente"]):"";
$completa = isset($_POST["completa"])? limpiarCadena($_POST["completa"]):"";
$formal = isset($_POST["formal"])? limpiarCadena($_POST["formal"]):"";
$valor_indicador = isset($_POST["valor_ind"])? limpiarCadena($_POST["valor_ind"]):"";
$observacion = isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        //si el id esta vacio --empty
       // if(empty($id_d_c)){
            $rspta= $compras->insertar_calificacion_indicadores($id_indicador,$id_carrera,$id_pregunta_indicador,$id_valoracion,$puntual,$consistente,$completa,$formal ,$valor_indicador ,$observacion);
            echo $rspta ? "Criterio Calificado Correctamente" : "No se pudo registrar la calificación del criterio";
       /* }
        else{
            $rspta= $compras->editar($id_d_c,$crit,$subcrit,$indicador,$id_criterio);
            echo $rspta ? "Criterios actualizados" : "No se pudo actualizar el criterio";
        }   */
        break;

    case 'mostrar':
        $rspta=$compras->mostrar($id_d_c);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta=$compras->listar();
        $data= Array(); //se declara un array
        while($reg=$rspta->fetch_object())
        { //recorre los registros de la tabla
            $data[]=array(
                "0"=>($reg->estado_d_c)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_d_c.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_d_c.')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="mostrar('.$reg->id_d_c.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-success" onclick="activar('.$reg->id_d_c.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->crit,
                "2"=>$reg->subcrit,
                "3"=>$reg->indicador,
                "4"=>$reg->criterio,
                "5"=>($reg->estado_d_c)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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

        case 'selectcrit':
            $rspta = $compras -> selectcrit();
            echo '<option >Seleccione un Criterio</option>';
            while($reg = $rspta->fetch_object())
            {
               
                echo '<option value=' . $reg->id_criterio . '>' . $reg->criterio.'</option>';
            }
        break;

        case 'desactivar':
            $rspta=$compras->desactivar($id_d_c);
            echo $rspta ? "Criterios desactivados" : "Información no se puede desactivar";
            break;

            case 'activar':
                $rspta=$compras->activar($id_d_c);
                echo $rspta ? "Criterios activados" : "Información no se puede activar";
                break;

}

?>