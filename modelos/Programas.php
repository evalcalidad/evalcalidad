<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
if(strlen(session_id()) < 1)
	session_start();
Class Programas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para editar registros
	public function editar($id_ev_pro,$id_dato,$id_preg_ev,$id_valor,$observacion,$puntual,$consistente,$completa,$formal,$valor_ind)
	{
		$sql="UPDATE evidencias_programas SET id_valor='$id_valor',
        observacion = '$observacion', puntual = '$puntual', consistente = '$consistente', completa = '$completa', formal = '$formal', valor_ind = '$valor_ind' 
        WHERE id_ev_pro='$id_ev_pro'";
		ejecutarConsulta($sql);

        $cli = "SELECT e.id_dato from evidencias_programas e where e.id_ev_pro = '$id_ev_pro'";
        $iddato = ejecutarConsultaIDdato($cli);

        $prom = "select round(AVG(v.valor),2) as 'promedio' from evidencias_programas e, valoracion v 
		where e.id_valor = v.id_valor and e.id_dato = '$iddato'";
        $promedio = ejecutarConsultaprom($prom);

		$prom2 = "select round(AVG(valor_ind),2) as 'promedio2' from evidencias_programas where id_dato = '$iddato'";
        $promedio2 = ejecutarConsultaprom2($prom2);

        $sql2 ="UPDATE valores_ind4 SET valor_ind_1 = '$promedio' where id_dato = '$iddato'";
        ejecutarConsulta($sql2);

		$sql3 ="UPDATE valores_ind4 SET valor_ind_2 = '$promedio2' where id_dato = '$iddato'";
        return ejecutarConsulta($sql3);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_ev_pro)
	{
		$sql="SELECT * FROM evidencias_programas WHERE id_ev_pro='$id_ev_pro'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar($id_dato)
	{
		$sql="SELECT row_number() OVER (ORDER BY e.id_preg_ev) as contador, e.*, v.* FROM evidencias_programas e, valoracion v 
		where e.id_valor = v.id_valor and e.id_dato = '$id_dato'";
		return ejecutarConsulta($sql);		
	}

    public function verpreg($id_preg_ev){

        $sql="SELECT * FROM preguntas_ev where id_preg_ev = '$id_preg_ev'";
        return ejecutarConsultaSimpleFila($sql);	
    }

	public function datos($id_dato){
        $sql="SELECT * FROM valores_ind4 where id_dato = '$id_dato'";
        return ejecutarConsultaSimpleFila($sql);	
    }

    public function calcularind($id_ev_pro){
        $cli = "SELECT e.id_dato from evidencias_programas e where e.id_ev_pro = '$id_ev_pro'";
        $iddato = ejecutarConsultaIDdato($cli);

        $prom = "select round(AVG(v.valor),2) as 'promedio' from evidencias_programas e, valoracion v 
		where e.id_valor = v.id_valor and e.id_dato = '$id_dato'";
        $promedio = ejecutarConsultaprom($prom);

        $sql ="UPDATE valores_ind4 SET valor_ind_1 = '$promedio' where id_dato = '$iddato'";
    }

	public function selecttema(){
		$sql="SELECT * FROM datosinforma d, profesores p where d.id_prof = p.id_prof";
		return ejecutarConsulta($sql);
    }

	public function datosinformativos($id_dato){
        $sql="SELECT * FROM datosinforma d, profesores p where d.id_prof = p.id_prof and d.id_dato = '$id_dato'";
        return ejecutarConsulta($sql);
    }

	public function listarreporte($id_dato)
	{
		$sql="SELECT * FROM evidencias_programas e, preguntas_ev p, valoracion v
		where e.id_valor = v.id_valor and e.id_dato = '$id_dato' and e.id_preg_ev = p.id_preg_ev";
		return ejecutarConsulta($sql);		
	}

	public function datos2($id_dato){

        $sql="SELECT * FROM valores_ind4 where id_dato = '$id_dato'";
        return ejecutarConsulta($sql);	
    }

	public function selectvalor(){
		$sql="SELECT * from valoracion where estado_valor = '1'";
		return ejecutarConsulta($sql);
	}

	public function mostrarvaloracion($id_valor)
	{
		$sql="SELECT * FROM valoracion where id_valor = '$id_valor'";
		return ejecutarConsultaSimpleFila($sql);

	}
}

?>