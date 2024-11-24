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
	
	$.post("../ajax/criterios.php?op=selectcrit", function(r){ //parametro r son las opciones que devuelve el id
        $("#id_criterio").html(r);
        $('#id_criterio').selectpicker('refresh');
    });
}

//Función limpiar
function limpiar()
{
    $("#id_d_c").val("");
	$("#crit").val("");
    $("#subcrit").val("");
    $("#indicador").val("");
    $("#id_criterio").val("");
	$('#id_criterio').selectpicker('refresh');
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
					url: '../ajax/criterios.php?op=listar',
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
		url: "../ajax/criterios.php?op=guardaryeditar",
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

function mostrar(id_d_c)
{
	$.post("../ajax/criterios.php?op=mostrar",{id_d_c : id_d_c}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

        $("#id_d_c").val(data.id_d_c);
		$("#crit").val(data.crit);
        $("#subcrit").val(data.subcrit);
        $("#indicador").val(data.indicador);
        $("#id_criterio").val(data.id_criterio);
		$('#id_criterio').selectpicker('refresh');
 	});
 	
}

//Función para desactivar registros
function desactivar(id_d_c)
{
	bootbox.confirm("¿Está seguro de desactivar los criterios?", function(result){
		if(result)
        {
        	$.post("../ajax/criterios.php?op=desactivar", {id_d_c : id_d_c}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_d_c)
{
	bootbox.confirm("¿Está seguro de activar los criterios?", function(result){
		if(result)
        {
        	$.post("../ajax/criterios.php?op=activar", {id_d_c : id_d_c}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

init();