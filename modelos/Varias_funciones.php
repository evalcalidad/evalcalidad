<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();

Class Varias_funciones
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	

	public function selecciona_preguntas_criterio($id){
		$sql="SELECT id_preg_ev,preg from preguntas_ev where tipo = '$id'";
		return ejecutarConsulta($sql);
	}

	public function Lista_Responsables()
	{
		$sql="SELECT * FROM profesores";
		return ejecutarConsulta($sql);
    }

	public function Lista_tipo_usuarios()
	{
		$sql="SELECT * FROM permisos";
		return ejecutarConsulta($sql);
    }

	public function Lista_Carreras()
	{
		$sql="SELECT * FROM datosinforma";
		return ejecutarConsulta($sql);
    }

	public function Valoracion()
	{
		$sql="SELECT * FROM valoracion";
		return ejecutarConsulta($sql);
    }
}

?>