<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();

Class Valoraciones
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($valor,$descripcion,$valoracion)
	{
		$sql="INSERT INTO valoracion (valor,descripcion,valoracion,estado_valor) VALUES ('$valor','$descripcion','$valoracion','1')";
        return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_valor,$valor,$descripcion,$valoracion)
	{
		$sql="UPDATE valoracion SET valor = '$valor', descripcion='$descripcion', valoracion = '$valoracion' WHERE id_valor='$id_valor'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_valor)
	{
		$sql="UPDATE valoracion SET estado_valor='0' WHERE id_valor = '$id_valor'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_valor)
	{
		$sql="UPDATE valoracion SET estado_valor='1' WHERE id_valor = '$id_valor'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_valor)
	{
		$sql="SELECT * FROM valoracion WHERE id_valor='$id_valor'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM valoracion";
		return ejecutarConsulta($sql);		
	}
}

?>