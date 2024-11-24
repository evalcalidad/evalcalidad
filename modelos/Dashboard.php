<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();

Class Dashboard
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function totalclientes()
	{
		$sql="SELECT count(id_cliente) as total FROM clientes where estado_cliente = '1'";
		return ejecutarConsulta($sql);
	}

	public function totalpagoshoy()
	{
		$sql="SELECT IFNULL(ROUND(SUM(total), 2),0) as total FROM pago_predios WHERE fecha_pago=curdate() and estado = 'PAGADO'";
		return ejecutarConsulta($sql);
	}

	public function totalpagos()
	{
		$sql="SELECT IFNULL(ROUND(SUM(total), 2),0) as total FROM pago_predios WHERE estado = 'PAGADO'";
		return ejecutarConsulta($sql);
	}

	public function pagosultimos_12meses()
	{
		$sql="SELECT DATE_FORMAT(fecha_pago, '%m/%Y') as fecha, ROUND(SUM(total), 2) as total FROM pago_predios where estado = 'PAGADO' GROUP by MONTH(fecha_pago) ORDER BY fecha_pago ASC limit 0,10";
		return ejecutarConsulta($sql);
	}
    
}

?>