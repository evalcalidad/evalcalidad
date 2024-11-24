<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();

Class Documentacion
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($id_criterio,$documento)
	{
		$sql="INSERT INTO documentacion (id_criterio,documento,estado_doc) VALUES ('$id_criterio','$documento','1')";
        return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_doc,$id_criterio,$documento)
	{
		$sql="UPDATE documentacion SET id_criterio = '$id_criterio', documento='$documento'
        WHERE id_doc='$id_doc'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_doc)
	{
		$sql="UPDATE documentacion SET estado_doc='0' WHERE id_doc = '$id_doc'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_doc)
	{
		$sql="UPDATE documentacion SET estado_doc='1' WHERE id_doc = '$id_doc'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_doc)
	{
		$sql="SELECT * FROM documentacion WHERE id_doc='$id_doc'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM documentacion d, criterios c where c.id_criterio = d.id_criterio";
		return ejecutarConsulta($sql);		
	}

	public function selectcrit(){
		$sql="SELECT * from criterios where estado_criterio = '1'";
		return ejecutarConsulta($sql);
	}
}

?>