var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	$("#imagenmuestra").hide();
	
	$.post("../ajax/programas.php?op=selecttema", function(r){ //parametro r son las opciones que devuelve el id
     $("#id_dato").html(r);
     $('#id_dato').selectpicker('refresh');
    });

	$.post("../ajax/estudiosprosp.php?op=selectvalor", function(r){ //parametro r son las opciones que devuelve el id
		$("#id_valor").html(r);
		$('#id_valor').selectpicker('refresh');
	   });

	$.post("../ajax/estudiosprosp.php?op=selectvalor2", function(r){ //parametro r son las opciones que devuelve el id
		$("#puntual").html(r);
		$('#puntual').selectpicker('refresh');
	   });

	   $.post("../ajax/estudiosprosp.php?op=selectvalor2", function(r){ //parametro r son las opciones que devuelve el id
		$("#consistente").html(r);
		$('#consistente').selectpicker('refresh');
	   });

	   $.post("../ajax/estudiosprosp.php?op=selectvalor2", function(r){ //parametro r son las opciones que devuelve el id
		$("#completa").html(r);
		$('#completa').selectpicker('refresh');
	   });

	   $.post("../ajax/estudiosprosp.php?op=selectvalor2", function(r){ //parametro r son las opciones que devuelve el id
		$("#formal").html(r);
		$('#formal').selectpicker('refresh');
	   });

	   vercriterios();

}

function vercriterios(){
	id = 1;

	$.post("../ajax/planificacion.php?op=mostrarcriterios",{id : id}, function(data){ //parametro r son las opciones que devuelve el id
		data = JSON.parse(data);

		crit = data.crit;
		subcrit = data.subcrit;
		indicador = data.indicador;

		console.log(crit);

		document.getElementById("crit").innerHTML = crit;
		document.getElementById("subcrit").innerHTML = subcrit;
		document.getElementById("indicador").innerHTML = indicador;
	});
}

function reporte(){
    var id_dato = $("#id_dato").val();
    
    $url = '../reportes/rptprogramas.php?id=' + id_dato;
    target = "_blank";
    window.open($url, '_blank');

}

//Función limpiar
function limpiar()
{
    $("#id_ev_pro").val("");
	$("#id_dato").val("");
	$('#id_dato').selectpicker('refresh');
    $("#id_preg_ev").val("");
    $("#id_valor").val("");
	$('#id_valor').selectpicker('refresh');
    $("#observacion").val("");
    $("#puntual").val("");
	$('#puntual').selectpicker('refresh');
    $("#consistente").val("");
	$('#consistente').selectpicker('refresh');
    $("#completa").val("");
	$('#completa').selectpicker('refresh');
    $("#formal").val("");
	$('#formal').selectpicker('refresh');
    $("#valor_ind").val("");
}

function vervaloracion(){
	id_valor = $("#id_valor").val();

	$.post("../ajax/estudiosprosp.php?op=mostrarvaloracion",{id_valor : id_valor}, function(data){ //parametro r son las opciones que devuelve el id
		data = JSON.parse(data);

		descripcion = data.descripcion;
		valoracion = data.valoracion;

		document.getElementById("descripcion").innerHTML = descripcion;
		document.getElementById("valoracion").innerHTML = valoracion;

	});
}

function datos(){
	var id_dato = $("#id_dato").val();
	
	listar();
	console.log(id_dato);

	$.post("../ajax/programas.php?op=datos",{id_dato : id_dato}, function(r){ //parametro r son las opciones que devuelve el id
		r = JSON.parse(r);

		valor_ind_1 = r.valor_ind_1;
		valor_ind_2 = r.valor_ind_2;

		$("#valor_ind_1").val((valor_ind_1));
		$("#valor_ind_2").val((valor_ind_2));
	});
}

function calcularvalores(){
    var puntual = $("#puntual").val();
    var consistente = $("#consistente").val();
    var completa = $("#completa").val();
    var formal = $("#formal").val();

    var promedio = ((parseFloat(puntual)+parseFloat(consistente)+parseFloat(completa)+parseFloat(formal))/parseFloat(4)).toFixed(2);

    $("#valor_ind").val((promedio));
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		$("#btnreporte").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
		$("#btnreporte").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	var id_dato = $("#id_dato").val();
	console.log(id_dato);
    
	tabla=$('#tbllistado').dataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
	    buttons: [		          
		            /* 'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf' */
		        ],
		"ajax":
				{
					url: '../ajax/programas.php?op=listar',
					data:{id_dato: id_dato},
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	//datos();

	$.ajax({
		url: "../ajax/programas.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(id_ev_pro)
{
	$.post("../ajax/programas.php?op=mostrar",{id_ev_pro : id_ev_pro}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

        //cumpli();

        $("#id_ev_pro").val(data.id_ev_pro);
		$("#id_dato").val(data.id_dato);
		$('#id_dato').selectpicker('refresh');
        $("#id_preg_ev").val(data.id_preg_ev);
        $("#id_valor").val(data.id_valor);
        $('#id_valor').selectpicker('refresh');
        $("#observacion").val(data.observacion);
        $("#puntual").val(data.puntual);
		$('#puntual').selectpicker('refresh');
        $("#consistente").val(data.consistente);
		$('#consistente').selectpicker('refresh');
        $("#completa").val(data.completa);
		$('#completa').selectpicker('refresh');
        $("#formal").val(data.formal);
		$('#formal').selectpicker('refresh');
        $("#valor_ind").val(data.valor_ind);

		id_valor = data.id_valor;

		$.post("../ajax/estudiosprosp.php?op=mostrarvaloracion",{id_valor : id_valor}, function(data){ //parametro r son las opciones que devuelve el id
			data = JSON.parse(data);
	
			descripcion = data.descripcion;
			valoracion = data.valoracion;
	
			document.getElementById("descripcion").innerHTML = descripcion;
			document.getElementById("valoracion").innerHTML = valoracion;
	
		});

        var id_preg_ev = $("#id_preg_ev").val();

        $.post("../ajax/programas.php?op=verpreg",{id_preg_ev : id_preg_ev}, function(r){ //parametro r son las opciones que devuelve el id
            r = JSON.parse(r);
    
            preg = r.preg;
    
            console.log(r.preg);
    
            document.getElementById("preg").innerHTML = preg; 
        });
 	});
 	
}

init();