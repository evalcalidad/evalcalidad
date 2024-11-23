<?php
session_start();
require_once "../modelos/Preguntas.php";
$compras= new Preguntas();

$id_preg_ev = isset($_POST["id_preg_ev"])? limpiarCadena($_POST["id_preg_ev"]):"";
$preg = isset($_POST["preg"])? limpiarCadena($_POST["preg"]):"";
$tipo = isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        //si el id esta vacio --empty
        if(empty($id_preg_ev)){
            $rspta= $compras->insertar($preg,$tipo);
            echo $rspta ? "Pregunta registrada" : "No se pudo registrar la pregunta";
        }
        else{
            $rspta= $compras->editar($id_preg_ev,$preg,$tipo);
            echo $rspta ? "Pregunta actualizada" : "No se pudo actualizar la pregunta";
        }   
        break;

    case 'mostrar':
        $rspta=$compras->mostrar($id_preg_ev);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta=$compras->listar();
        $data= Array(); //se declara un array
        while($reg=$rspta->fetch_object()){ //recorre los registros de la tabla
            $data[]=array(
                "0"=>($reg->estado_preg)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_preg_ev.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_preg_ev.')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="mostrar('.$reg->id_preg_ev.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-success" onclick="activar('.$reg->id_preg_ev.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->preg,
                "2"=>($reg->estado_preg)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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
            $rspta=$compras->desactivar($id_preg_ev);
            echo $rspta ? "Pregunta desactivada" : "Información no se puede desactivar";
            break;

            case 'activar':
                $rspta=$compras->activar($id_preg_ev);
                echo $rspta ? "Pregunta activada" : "Información no se puede activar";
                break;

}

?>