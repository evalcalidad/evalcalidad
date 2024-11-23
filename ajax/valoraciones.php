<?php
session_start();
require_once "../modelos/Valoraciones.php";
$compras= new Valoraciones();

$id_valor = isset($_POST["id_valor"])? limpiarCadena($_POST["id_valor"]):"";
$valor = isset($_POST["valor"])? limpiarCadena($_POST["valor"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$valoracion = isset($_POST["valoracion"])? limpiarCadena($_POST["valoracion"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        //si el id esta vacio --empty
        if(empty($id_valor)){
            $rspta= $compras->insertar($valor,$descripcion,$valoracion);
            echo $rspta ? "Valoración registrada" : "No se pudo registrar la valoración";
        }
        else{
            $rspta= $compras->editar($id_valor,$valor,$descripcion,$valoracion);
            echo $rspta ? "Valoración actualizada" : "No se pudo actualizar la valoración";
        }   
        break;

    case 'mostrar':
        $rspta=$compras->mostrar($id_valor);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta=$compras->listar();
        $data= Array(); //se declara un array
        while($reg=$rspta->fetch_object()){ //recorre los registros de la tabla
            $data[]=array(
                "0"=>($reg->estado_valor)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_valor.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_valor.')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="mostrar('.$reg->id_valor.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-success" onclick="activar('.$reg->id_valor.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->valor,
                "2"=>$reg->descripcion,
                "3"=>$reg->valoracion,
                "4"=>($reg->estado_valor)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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
            $rspta=$compras->desactivar($id_valor);
            echo $rspta ? "Valoración desactivada" : "Valoración no se puede desactivar";
            break;

            case 'activar':
                $rspta=$compras->activar($id_valor);
                echo $rspta ? "Valoración activada" : "Valoración no se puede activar";
                break;

}

?>