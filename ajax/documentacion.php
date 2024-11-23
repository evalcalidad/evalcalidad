<?php
session_start();
require_once "../modelos/Documentacion.php";
$compras= new Documentacion();

$id_doc = isset($_POST["id_doc"])? limpiarCadena($_POST["id_doc"]):"";
$id_criterio = isset($_POST["id_criterio"])? limpiarCadena($_POST["id_criterio"]):"";
$documento = isset($_POST["documento"])? limpiarCadena($_POST["documento"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        if(!file_exists($_FILES['documento']['tmp_name']) || !is_uploaded_file($_FILES['documento']['tmp_name']))
        {
            $documento=$_POST["imagenactual"];
        }else{
            $ext = explode(".", $_FILES["documento"]["name"]);
            if($_FILES['documento']['type'] == "application/pdf")
            {
                $documento = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["documento"]["tmp_name"],"../files/documentos/" . $documento);
            }
        }
        //si el id esta vacio --empty
        if(empty($id_doc)){
            $rspta= $compras->insertar($id_criterio,$documento);
            echo $rspta ? "Documento registrado" : "No se pudo registrar el documento";
        }
        else{
            $rspta= $compras->editar($id_doc,$id_criterio,$documento);
            echo $rspta ? "Documento actualizado" : "No se pudo actualizar el documento";
        }   
        break;

    case 'mostrar':
        $rspta=$compras->mostrar($id_doc);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta=$compras->listar();
        $data= Array(); //se declara un array
        while($reg=$rspta->fetch_object()){ //recorre los registros de la tabla
            $data[]=array(
                "0"=>($reg->estado_doc)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_doc.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_doc.')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="mostrar('.$reg->id_doc.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-success" onclick="activar('.$reg->id_doc.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->criterio,
                "2"=>$reg->documento,
                "3"=>($reg->estado_doc)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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
            $rspta=$compras->desactivar($id_doc);
            echo $rspta ? "Documento desactivado" : "Información no se puede desactivar";
            break;

            case 'activar':
                $rspta=$compras->activar($id_doc);
                echo $rspta ? "Documento activado" : "Información no se puede activar";
                break;

}

?>