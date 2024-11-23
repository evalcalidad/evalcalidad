<?php
session_start();
require_once "../modelos/Gestionaseg.php";
$compras= new Gestionaseg();

$id_ev_g = isset($_POST["id_ev_g"])? limpiarCadena($_POST["id_ev_g"]):"";
$id_dato = isset($_POST["id_dato"])? limpiarCadena($_POST["id_dato"]):"";
$id_preg_ev = isset($_POST["id_preg_ev"])? limpiarCadena($_POST["id_preg_ev"]):"";
$id_valor = isset($_POST["id_valor"])? limpiarCadena($_POST["id_valor"]):"";
$observacion = isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):"";
$puntual = isset($_POST["puntual"])? limpiarCadena($_POST["puntual"]):"";
$consistente = isset($_POST["consistente"])? limpiarCadena($_POST["consistente"]):"";
$completa = isset($_POST["completa"])? limpiarCadena($_POST["completa"]):"";
$formal = isset($_POST["formal"])? limpiarCadena($_POST["formal"]):"";
$valor_ind = isset($_POST["valor_ind"])? limpiarCadena($_POST["valor_ind"]):"";

switch ($_GET["op"]){
    case 'guardaryeditar':
        //si el id esta vacio --empty
        if(empty($id_ev_g)){   
        }
        else{
            $rspta= $compras->editar($id_ev_g,$id_dato,$id_preg_ev,$id_valor,$observacion,$puntual,$consistente,$completa,$formal,$valor_ind);
            echo $rspta ? "Información actualizada" : "No se pudo actualizar la información";
        }   
        break;

    case 'mostrar':
        $rspta=$compras->mostrar($id_ev_g);
        echo json_encode($rspta);
        break;

    case 'listar':
        $id_dato=$_REQUEST["id_dato"];
        $rspta=$compras->listar($id_dato);
        $data= Array(); //se declara un array
        while($reg=$rspta->fetch_object()){ //recorre los registros de la tabla
            $data[]=array(
                "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_ev_g.')"><i class="fa fa-pencil-square-o"></i></button>',
                "1"=>$reg->contador,
                "2"=>$reg->valor,
                "3"=>$reg->descripcion,
                "4"=>$reg->valoracion,
                "5"=>$reg->observacion,
                "6"=>$reg->puntual,
                "7"=>$reg->consistente,
                "8"=>$reg->completa,
                "9"=>$reg->formal,
                "10"=>$reg->valor_ind,
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

        case 'verpreg':

            $rspta=$compras->verpreg($id_preg_ev);
                //Codificar el resultado utilizando json
                echo json_encode($rspta);
                break;

        case 'datos':
            $id_dato=$_REQUEST["id_dato"];
                    $rspta=$compras->datos($id_dato);
                        //Codificar el resultado utilizando json
                        echo json_encode($rspta);
                        break;

        case 'selectvalor':
            $rspta=$compras->selectvalor();
            while($reg = $rspta->fetch_object())
            {
                echo '<option  value=' . $reg->id_valor . '>'. $reg->valor.'</option>';
            }
            break;

         case 'selectvalor2':
            $rspta=$compras->selectvalor();
            while($reg = $rspta->fetch_object())
            {
                echo '<option  value=' . $reg->valor . '>'. $reg->valor.'</option>';
            }
            break;

     case 'mostrarvaloracion':
            $rspta=$compras->mostrarvaloracion($id_valor);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
            break;

        case 'calcularind':
            $rspta=$compras->calcularind($id_ev_g);
            echo ($rspta);
            break;

            case 'selecttema':
                $rspta = $compras -> selecttema();
                echo '<option >Seleccione un Responsable</option>';
                while($reg = $rspta->fetch_object())
                {
                    echo '<option  value=' . $reg->id_dato . '>'. $reg->nombre_prof ." ". $reg->apellido_prof ." - ". $reg->tema_vinc ." (". $reg->periodos_ev .")".'</option>';
                }
            break;
}   

?>