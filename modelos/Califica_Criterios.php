<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();

Class Califica_Criterios
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar_calificacion_indicadores($id_indicador,$id_carrera,$id_pregunta_indicador,$id_valoracion,$puntual,$consistente,$completa,$formal ,$valor_indicador ,$observacion)
	{
		if($id_indicador==1)
		{
            $sql="INSERT INTO evidencias_plan (id_dato,id_preg_ev,id_valor,puntual,consistente,completa,formal,valor_ind,observacion) 
			VALUES ('$id_carrera','$id_pregunta_indicador','$id_valoracion','$puntual','$consistente','$completa','$formal','$valor_indicador','$observacion')";
            return ejecutarConsulta($sql);
		}

		if($id_indicador==2)
		{
            $sql="INSERT INTO evidencias_estudios (id_dato,id_preg_ev,id_valor,puntual,consistente,completa,formal,valor_ind,observacion) 
			VALUES ('$id_carrera','$id_pregunta_indicador','$id_valoracion','$puntual','$consistente','$completa','$formal','$valor_indicador','$observacion')";
            return ejecutarConsulta($sql);
		}

		if($id_indicador==3)
		{
            $sql="INSERT INTO evidencias_gestion (id_dato,id_preg_ev,id_valor,puntual,consistente,completa,formal,valor_ind,observacion) 
			VALUES ('$id_carrera','$id_pregunta_indicador','$id_valoracion','$puntual','$consistente','$completa','$formal','$valor_indicador','$observacion')";
            return ejecutarConsulta($sql);
		}

		
		if($id_indicador==4)
		{
            $sql="INSERT INTO evidencias_programas (id_dato,id_preg_ev,id_valor,puntual,consistente,completa,formal,valor_ind,observacion) 
			VALUES ('$id_carrera','$id_pregunta_indicador','$id_valoracion','$puntual','$consistente','$completa','$formal','$valor_indicador','$observacion')";
            return ejecutarConsulta($sql);
		}

		
		
	}

	//Implementamos un método para insertar registros
	public function califica_criterios($crit,$subcrit,$indicador,$id_criterio)
	{
		$sql="INSERT INTO datoscriterios (crit,subcrit,indicador,id_criterio,estado_d_c) VALUES ('$crit','$subcrit','$indicador','$id_criterio','1')";
        return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($id_d_c,$crit,$subcrit,$indicador,$id_criterio)
	{
		$sql="UPDATE datoscriterios SET crit = '$crit', subcrit='$subcrit', indicador = '$indicador', id_criterio = '$id_criterio'
        WHERE id_d_c='$id_d_c'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($id_d_c)
	{
		$sql="UPDATE datoscriterios SET estado_d_c='0' WHERE id_d_c = '$id_d_c'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_d_c)
	{
		$sql="UPDATE datoscriterios SET estado_d_c='1' WHERE id_d_c = '$id_d_c'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_d_c)
	{
		$sql="SELECT * FROM datoscriterios WHERE id_d_c='$id_d_c'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM datoscriterios d, criterios c where c.id_criterio = d.id_criterio";
		return ejecutarConsulta($sql);		
	}

	public function selectcrit(){
		$sql="SELECT * from criterios where estado_criterio = '1'";
		return ejecutarConsulta($sql);
	}
}

?>