<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();

Class Profesores
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function mostrar_cedula($cedula_prof)
	{
		$sql="SELECT * FROM profesores WHERE cedula_prof = '$cedula_prof'";
		return ejecutarConsultaContar($sql);
	}

	public function mostrar_cedula2($cedula_prof, $id_prof)
	{
		$sql="SELECT * FROM profesores WHERE cedula_prof = '$cedula_prof' and id_prof = '$id_prof'";
		return ejecutarConsultaContar($sql);
	}

	//Implementamos un método para insertar registros
	public function insertar($nombre_prof,$apellido_prof,$cedula_prof,$telefono_prof,$direccion_prof,$email_prof,$nominacion)
	{
		$sql="INSERT INTO profesores (nombre_prof,apellido_prof,cedula_prof,telefono_prof,direccion_prof,email_prof,nominacion,estado_prof)
		VALUES ('$nombre_prof','$apellido_prof','$cedula_prof','$telefono_prof','$direccion_prof','$email_prof','$nominacion','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_prof,$nombre_prof,$apellido_prof,$cedula_prof,$telefono_prof,$direccion_prof,$email_prof,$nominacion)
	{
		$sql="UPDATE profesores SET nombre_prof = '$nombre_prof', apellido_prof='$apellido_prof',cedula_prof='$cedula_prof',telefono_prof='$telefono_prof',
		direccion_prof='$direccion_prof',email_prof='$email_prof',
		nominacion='$nominacion' WHERE id_prof='$id_prof'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_prof)
	{
		$sql="UPDATE profesores SET estado_prof='0' WHERE id_prof='$id_prof'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_prof)
	{
		$sql="UPDATE profesores SET estado_prof='1' WHERE id_prof='$id_prof'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_prof)
	{

		$sql="SELECT *FROM profesores where id_prof = '$id_prof'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * from profesores";
		return ejecutarConsulta($sql);		
	}

	public function verificar2($cedula_prof){
        $sql= "SELECT * FROM profesores where cedula_prof = '$cedula_prof'";
        return ejecutarConsulta($sql);
    }
}

?>