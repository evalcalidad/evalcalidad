<?php
session_start();
require_once "../modelos/Criterios.php";
$compras= new Criterios();

$id_d_c = isset($_POST["id_d_c"])? limpiarCadena($_POST["id_d_c"]):"";
$crit = isset($_POST["crit"])? limpiarCadena($_POST["crit"]):"";
$subcrit = isset($_POST["subcrit"])? limpiarCadena($_POST["subcrit"]):"";
$indicador = isset($_POST["indicador"])? limpiarCadena($_POST["indicador"]):"";
$id_criterio = isset($_POST["id_criterio"])? limpiarCadena($_POST["id_criterio"]):"";

switch ($_GET["op"]){
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

    case 'listar':
        $rspta=$compras->listar();
        $data= Array(); //se declara un array
        while($reg=$rspta->fetch_object()){ //recorre los registros de la tabla
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