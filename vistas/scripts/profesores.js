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
	$("#id_prof").val("");
	$("#nombre_prof").val("");
	$("#apellido_prof").val("");
	$("#cedula_prof").val("");
	$("#telefono_prof").val("");
	$("#direccion_prof").val("");
	$("#email_prof").val("");
	$("#nominacion").val("");
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
					url: '../ajax/profesores.php?op=listar',
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

	let cedula=document.getElementById('cedula_prof').value;


	if(validador_cedula(cedula))
		{
					//alert(e);
			$.ajax({
				url: "../ajax/profesores.php?op=guardaryeditar",
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
		else
		{
			
		bootbox.alert('Cédula ingresada no Válida, verifique por favor y vuelva a ingresar');
		$("#btnGuardar").prop("disabled",false);	  
		}


   
}

function mostrar(id_prof)
{
	$.post("../ajax/profesores.php?op=mostrar",{id_prof : id_prof}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
        console.log(data);
		
		$("#id_prof").val(data.id_prof);
		$("#nombre_prof").val(data.nombre_prof);
		$("#apellido_prof").val(data.apellido_prof);
		$("#cedula_prof").val(data.cedula_prof);
		$("#telefono_prof").val(data.telefono_prof);
		$("#direccion_prof").val(data.direccion_prof);
		$("#nominacion").val(data.nominacion);
		$("#email_prof").val(data.email_prof);
 	});
}

//Función para desactivar registros
function desactivar(id_prof)
{
	bootbox.confirm("¿Está seguro de desactivar el docente?", function(result){
		if(result)
        {
        	$.post("../ajax/profesores.php?op=desactivar", {id_prof : id_prof}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(id_prof)
{
	bootbox.confirm("¿Está seguro de activar el docente?", function(result){
		if(result)
        {
        	$.post("../ajax/profesores.php?op=activar", {id_prof : id_prof}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

function validarCedula(cedula) 
{
    // Verificar que la cédula tenga 10 dígitos
    if (cedula.length !== 10) {
      return false;
    }
  
    // Obtener el dígito verificador
    var digitoVerificador = parseInt(cedula.charAt(9));
  
    // Calcular la suma de los dígitos pares
    var sumaPares = 0;
    for (var i = 0; i < 9; i += 2) {
      sumaPares += parseInt(cedula.charAt(i));
    }
  
    // Calcular la suma de los dígitos impares
    var sumaImpares = 0;
    for (var i = 1; i < 8; i += 2) {
      var digito = parseInt(cedula.charAt(i)) * 2;
      if (digito > 9) {
        digito -= 9;
      }
      sumaImpares += digito;
    }
  
    // Calcular el dígito verificador esperado
    var digitoVerificadorEsperado = (10 - (sumaPares + sumaImpares) % 10) % 10;
  
    // Comparar el dígito verificador calculado con el dígito verificador ingresado
    return digitoVerificador === digitoVerificadorEsperado;
  }
  
init();