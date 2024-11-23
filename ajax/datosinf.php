<?php
session_start();
require_once "../modelos/Datosinf.php";
$compras= new Datosinf();

$id_dato = isset($_POST["id_dato"])? limpiarCadena($_POST["id_dato"]):"";
$carrera_ev = isset($_POST["carrera_ev"])? limpiarCadena($_POST["carrera_ev"]):"";
$fecha_ev = isset($_POST["fecha_ev"])? limpiarCadena($_POST["fecha_ev"]):"";
$periodos_ev = isset($_POST["periodos_ev"])? limpiarCadena($_POST["periodos_ev"]):"";
$tipo_ind = isset($_POST["tipo_ind"])? limpiarCadena($_POST["tipo_ind"]):"";
$tema_vinc = isset($_POST["tema_vinc"])? limpiarCadena($_POST["tema_vinc"]):"";
$id_prof = isset($_POST["id_prof"])? limpiarCadena($_POST["id_prof"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        //si el id esta vacio --empty
        if(empty($id_dato)){
            $rspta= $compras->insertar($carrera_ev,$fecha_ev,$periodos_ev,$tipo_ind,$tema_vinc,$id_prof);
            echo $rspta ? "Datos informativos registrados" : "No se pudo registrar la información";
        }
        else{
            $rspta= $compras->editar($id_dato,$carrera_ev,$fecha_ev,$periodos_ev,$tipo_ind,$tema_vinc,$id_prof);
            echo $rspta ? "Datos informativos actualizados" : "No se pudo actualizar la información";
        }   
        break;

    case 'mostrar':
        $rspta=$compras->mostrar($id_dato);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta=$compras->listar();
        $data= Array(); //se declara un array
        while($reg=$rspta->fetch_object()){ //recorre los registros de la tabla
            $data[]=array(
                "0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_dato.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_dato.')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="mostrar('.$reg->id_dato.')"><i class="fa fa-pencil-square-o"></i></button>'.
                ' <button class="btn btn-success" onclick="activar('.$reg->id_dato.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->carrera_ev,
                "2"=>$reg->fecha_ev,
                "3"=>$reg->periodos_ev,
                "4"=>$reg->tipo_ind,
                "5"=>$reg->tema_vinc,
                "6"=>($reg->estado)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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

        case 'selectprofesores':
            $rspta = $compras -> selectprofesores();
            while($reg = $rspta->fetch_object())
            {
                echo '<option value=' . $reg->id_prof . '>' . $reg->nombre_prof." ".$reg->apellido_prof.'</option>';
            }
        break;

        case 'desactivar':
            $rspta=$compras->desactivar($id_dato);
            echo $rspta ? "Datos informativos desactivados" : "Información no se puede desactivar";
            break;

            case 'activar':
                $rspta=$compras->activar($id_dato);
                echo $rspta ? "Datos informativos activados" : "Información no se puede activar";
                break;

}

?>