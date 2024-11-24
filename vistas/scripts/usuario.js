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
	//Mostramos los permisos
}


//Función limpiar
function limpiar()
{
	$("#cedula_usuario").val("");
	$("#id_permiso").val("");
	$("#nombre_usuario").val("");
	$("#apellido_usuario").val("");
	$("#telefono_usuario").val("");
	$("#direccion_usuario").val("");
	$("#email_usuario").val("");
	$("#login_us").val("");
	$("#clave_us").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#id_usuario").val("");
	$("#imagenmuestra").hide();
}

//Función mostrar formulario
function mostrarform(flag)
{
	$("#id_usuario").val("");
	//limpiar();
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
	//location.reload();
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
					url: '../ajax/usuario.php?op=listar',
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

	let cedula=document.getElementById('cedula_usuario').value;

	
	//if(validarCedula(cedula))
	//alert(validador_cedula(cedula));

	if(validador_cedula(cedula))
	{
		console.log('CEDULA CORRECTA');
        $.ajax({
			url: "../ajax/usuario.php?op=guardaryeditar",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
	
			success: function(datos)
			{                    
				  bootbox.alert(datos);	          
				  mostrarform(true);
				  tabla.ajax.reload();
			}
	
		});
		limpiar();       
	}
	else
	{

	
		bootbox.alert('Cédula ingresada no Válida, verifique por favor y vuelva a ingresar');
		$("#btnGuardar").prop("disabled",false);	  

		
	}
	
}

function mostrar(id_usuario)
{
	$.post("../ajax/usuario.php?op=mostrar",{id_usuario : id_usuario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		
		$("#id_usuario").val(data.id_usuario);
		$("#id_permiso").val(data.id_permiso);
		$("#cedula_usuario").val(data.cedula_usuario);
		$("#nombre_usuario").val(data.nombre_usuario);
		$("#apellido_usuario").val(data.apellido_usuario);
		$("#telefono_usuario").val(data.telefono_usuario);
		$("#direccion_usuario").val(data.direccion_usuario);
		$("#email_usuario").val(data.email_usuario);
		$("#login_us").val(data.login_us);
		$("#clave_us").val(data.clave_us);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen_usuario);
		$("#imagenactual").val(data.imagen_usuario);

 	});
}

//Función para desactivar registros
function desactivar(id_usuario)
{
	bootbox.confirm("¿Está seguro de desactivar el usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuario.php?op=desactivar", {id_usuario : id_usuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_usuario)
{
	bootbox.confirm("¿Está seguro de activar el usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuario.php?op=activar", {id_usuario : id_usuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

function mostrar_tipo_usuarios()
{
	    let IdCriterio = '';
	    let preguntas_criterio_C='tipo_usuarios';

        var params = {
			VarCriterio:IdCriterio, //aqui defines el valor del parametro
			op: preguntas_criterio_C
		};

        
            $.ajax({
                type:'POST',
                url:'../ajax/varias_funciones.php',
				data:params,
                //data:'VarCriterio='+IdCriterio+'op='+preguntas_criterio,

                success:function(html){
                    $('#tipo_usuario').html(html);
					$('#tipo_usuario').selectpicker('refresh');
				
                   
                }
            }); 
       
}


init();
mostrar_tipo_usuarios();