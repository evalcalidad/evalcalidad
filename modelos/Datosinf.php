<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();

Class Datosinf
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($carrera_ev,$fecha_ev,$periodos_ev,$tipo_ind,$tema_vinc,$id_prof)
	{
		$sql="INSERT INTO datosinforma (carrera_ev,fecha_ev,periodos_ev,tipo_ind,tema_vinc,id_prof,estado) VALUES ('$carrera_ev','$fecha_ev','$periodos_ev','$tipo_ind','$tema_vinc','$id_prof','1')";
        $idprofnew = ejecutarConsulta_retornarID($sql);

		$sqlv="INSERT INTO valores_ind (id_dato) VALUES ('$idprofnew')";
        ejecutarConsulta($sqlv);

		$sqle="INSERT INTO valores_ind2 (id_dato) VALUES ('$idprofnew')";
        ejecutarConsulta($sqle);

		$sqlg="INSERT INTO valores_ind3 (id_dato) VALUES ('$idprofnew')";
        ejecutarConsulta($sqlg);

		$sqlpro="INSERT INTO valores_ind4 (id_dato) VALUES ('$idprofnew')";
        ejecutarConsulta($sqlpro);

        $sw=true;

		$sqlevip = "SELECT * from preguntas_ev where tipo = '1' and estado_preg = '1'";
		$pregevp = ejecutarConsulta($sqlevip);

        while($reg= $pregevp->fetch_object()){

			$id_preg_ev = $reg->id_preg_ev;

            $sql2="INSERT INTO evidencias_plan (id_dato,id_preg_ev,id_valor) VALUES ('$idprofnew','$id_preg_ev','1')";
            ejecutarConsulta($sql2);
        }

		$sqleve = "SELECT * from preguntas_ev where tipo = '2' and estado_preg = '1'";
		$pregeve = ejecutarConsulta($sqleve);

		while($reg2= $pregeve->fetch_object()){

			$id_preg_ev = $reg2->id_preg_ev;

            $sql3="INSERT INTO evidencias_estudios (id_dato,id_preg_ev,id_valor) VALUES ('$idprofnew','$id_preg_ev','1')";
            ejecutarConsulta($sql3);
        }

		$sqlevg = "SELECT * from preguntas_ev where tipo = '3' and estado_preg = '1'";
		$pregevg = ejecutarConsulta($sqlevg);

		while($reg3= $pregevg->fetch_object()){

			$id_preg_ev = $reg3->id_preg_ev;

            $sql4="INSERT INTO evidencias_gestion (id_dato,id_preg_ev,id_valor) VALUES ('$idprofnew','$id_preg_ev','1')";
            ejecutarConsulta($sql4);
        }

		$sqlevpro = "SELECT * from preguntas_ev where tipo = '4' and estado_preg = '1'";
		$pregevpro = ejecutarConsulta($sqlevpro);

		while($reg4= $pregevpro->fetch_object()){

			$id_preg_ev = $reg4->id_preg_ev;

            $sql5="INSERT INTO evidencias_programas (id_dato,id_preg_ev,id_valor) VALUES ('$idprofnew','$id_preg_ev','1')";
            ejecutarConsulta($sql5) or $sw = false;
        }

        return $sw;
	}

	//Implementamos un método para editar registros
	public function editar($id_dato,$carrera_ev,$fecha_ev,$periodos_ev,$tipo_ind,$tema_vinc,$id_prof)
	{
		$sql="UPDATE datosinforma SET id_prof = '$id_prof', carrera_ev='$carrera_ev', fecha_ev = '$fecha_ev', periodos_ev = '$periodos_ev',
        tipo_ind = '$tipo_ind', tema_vinc = '$tema_vinc' WHERE id_dato='$id_dato'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_dato)
	{
		$sql="UPDATE datosinforma SET estado='0' WHERE id_dato = '$id_dato'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_dato)
	{
		$sql="UPDATE datosinforma SET estado='1' WHERE id_dato = '$id_dato'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_dato)
	{
		$sql="SELECT * FROM datosinforma WHERE id_dato='$id_dato'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM datosinforma";
		return ejecutarConsulta($sql);		
	}

	public function selectprofesores(){
		$sql="SELECT * from profesores where estado_prof = '1'";
		return ejecutarConsulta($sql);
	}
}

?>