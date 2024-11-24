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
	
	$.post("../ajax/datosinf.php?op=selectprofesores", function(r){ //parametro r son las opciones que devuelve el id
        $("#id_prof").html(r);
        $('#id_prof').selectpicker('refresh');
    });
}

//Función limpiar
function limpiar()
{
    $("#id_dato").val("");
	$("#carrera_ev").val("");
    $("#fecha_ev").val("");
    $("#periodos_ev").val("");
    $("#tipo_ind").val("");
    $("#tema_vinc").val("");
    $("#id_prof").val("");
	$('#id_prof').selectpicker('refresh');
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
					url: '../ajax/datosinf.php?op=listar',
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

	$.ajax({
		url: "../ajax/datosinf.php?op=guardaryeditar",
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

function mostrar(id_dato)
{
	$.post("../ajax/datosinf.php?op=mostrar",{id_dato : id_dato}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

        $("#id_dato").val(data.id_dato);
		$("#carrera_ev").val(data.carrera_ev);
        $("#fecha_ev").val(data.fecha_ev);
        $("#periodos_ev").val(data.periodos_ev);
        $("#tipo_ind").val(data.tipo_ind);
        $("#tema_vinc").val(data.tema_vinc);
        $("#id_prof").val(data.id_prof);
		$('#id_prof').selectpicker('refresh');
 	});
 	
}

//Función para desactivar registros
function desactivar(id_dato)
{
	bootbox.confirm("¿Está seguro de desactivar los datos informativos?", function(result){
		if(result)
        {
        	$.post("../ajax/datosinf.php?op=desactivar", {id_dato : id_dato}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_dato)
{
	bootbox.confirm("¿Está seguro de activar los datos informativos?", function(result){
		if(result)
        {
        	$.post("../ajax/datosinf.php?op=activar", {id_dato : id_dato}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

init();