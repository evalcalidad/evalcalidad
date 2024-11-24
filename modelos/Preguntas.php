<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();

Class Preguntas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($preg,$tipo)
	{
		$sql="INSERT INTO preguntas_ev (preg,tipo,estado_preg) VALUES ('$preg','$tipo','1')";
        return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_preg_ev,$preg,$tipo)
	{
		$sql="UPDATE preguntas_ev SET preg = '$preg', tipo='$tipo' WHERE id_preg_ev='$id_preg_ev'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_preg_ev)
	{
		$sql="UPDATE preguntas_ev SET estado_preg='0' WHERE id_preg_ev = '$id_preg_ev'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_preg_ev)
	{
		$sql="UPDATE preguntas_ev SET estado_preg='1' WHERE id_preg_ev = '$id_preg_ev'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_preg_ev)
	{
		$sql="SELECT * FROM preguntas_ev WHERE id_preg_ev='$id_preg_ev'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM preguntas_ev";
		return ejecutarConsulta($sql);		
	}
}

?>