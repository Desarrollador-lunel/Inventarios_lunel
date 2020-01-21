 <script type="text/javascript">
	var pass_antiguo;
    //Funcion boton crear Usuario
	$("#btn_crear_usuario").click(function(){
		$("#modalUsuarioLabel").text("Crear Usuario");
		$("#btn_guardar_Usuario").attr("data-accion","crear");
		$("#form_Usuario")[0].reset();
		$("#nombre_usuario").attr('disabled', 'disabled');
		$("#pass_usuario").attr('disabled', 'disabled');
		$("#nombre_cargo").prop('disabled', true);
	});

	//Funcion abrir formulario de empleado
	$("#btnadicionempleado").click(function(){
		$("#form_Empleado")[0].reset();
		$("#fkID_territorial").prop('disabled', true);
        $("#fkID_proyecto").prop('disabled', true);
	});

	//Funcion guardar empleado
	$("#btn_guardar_Empleado").click(function(){
		respuesta = validar_campos_empleado();
		if (respuesta) {
		crea_empleado();
		}
	});

	//Funcion guardar Usuario
	$("#btn_guardar_Usuario").click(function(){ 
		respuesta = validar_campos();
		if (respuesta) {
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_Usuario();
			}
			if(accion == 'editar'){
				 edita_Usuario();
			}
		} 
	});

	//Funcion para guardar el Usuario
	function crea_Usuario(){
		nombre_usuario = $("#nombre_usuario").val();
	 	pass_usuario = $("#pass_usuario").val();
	 	fkID_persona = $("#fkID_persona").val();
	    $.ajax({
	      url:  "../controlador/ajaxUsuario.php",
	      data: 'nombre_usuario='+ nombre_usuario + '&pass_usuario='+ pass_usuario + '&fkID_persona='+ fkID_persona + '&tipo=inserta',
	    success:function(r){
			alertify.success('Creado correctamente');
		  	setTimeout('cargar_sitio()',1000);
		}
	})
	}

	//Funcion guardar Usuario
	$("[name*='btn_editar_usuario']").click(function(){
		id_Usuario = $(this).attr('data-id-Usuario');
		console.log('Entro a editar Usuario');
		$("#modalUsuarioLabel").text("Editar Usuario");
		$("#fkID_persona").attr('disabled', 'disabled');
		$("#nombre_cargo").prop('disabled', true);
		carga_Usuario(id_Usuario);
		$("#btn_guardar_Usuario").attr("data-accion","editar");
	})

	//Carga el Usuario por el ID
	function carga_Usuario(id_Usuario){

	    console.log("Carga el Usuario "+ id_Usuario);

	    $.ajax({
	        url: "../controlador/ajaxUsuario.php",
	        data: "id_usuario="+id_Usuario+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	        	if (key=="pass_usuario") {
	        		pass_antiguo=value;
	        	}
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });

	        id_Usuario = data.id_Usuario;
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};

	//Funcion para guardar el Usuario
	function edita_Usuario(){
		id_usuario = $("#id_usuario").val();
	 	nombre_usuario = $("#nombre_usuario").val();
	 	pass_usuario = $("#pass_usuario").val();
	 	fkID_persona = $("#fkID_persona").val();
	    $.ajax({
	      url: "../controlador/ajaxUsuario.php",
	      data: 'id_usuario='+id_usuario+'&nombre_usuario='+  nombre_usuario +'&pass_antiguo='+  pass_antiguo + '&pass_usuario='+ pass_usuario + '&fkID_persona='+ fkID_persona + '&tipo=edita',
	     success:function(r){
			alertify.success('Editado correctamente');
		  	setTimeout('cargar_sitio()',1000);
		}
	})
	}

	//Funcion para guardar el empleado
	function crea_empleado(){
	 	nombre_empleado = $("#nombre_empleado").val();
	 	apellido_empleado = $("#apellido_empleado").val();
	 	cedula_empleado = $("#cedula_empleado").val();
	 	telefono_empleado = $("#telefono_empleado").val();
	 	celular_empleado = $("#celular_empleado").val();
	 	email_empleado = $("#email_empleado").val();
	 	fkID_cargo = $("#fkID_cargo").val();
	 	fkID_proyecto = $("#fkID_proyecto").val();
	 	fkID_territorial = $("#fkID_territorial").val();
	    $.ajax({
	      url: "../controlador/ajaxUsuario.php", 
	      data: 'nombre_empleado='+nombre_empleado+'&apellido_empleado='+apellido_empleado+'&cedula_empleado='+cedula_empleado+'&telefono_empleado='+telefono_empleado+'&celular_empleado='+celular_empleado+'&email_empleado='+email_empleado+'&fkID_cargo='+fkID_cargo+'&fkID_proyecto='+fkID_proyecto+'&fkID_territorial='+fkID_territorial+'&tipo=inserta_empleado'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalEmpleado").removeClass("show");
	      $("#modalEmpleado").removeClass("modal-backdrop");
	      carga_empleado();
	      //$("#nombre_tipo_equipo").val("");
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	function carga_empleado(){

	    $.ajax({
	        url: "../controlador/ajaxUsuario.php",
	        data: "tipo=ultimo_empleado",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          	console.log(key+"--"+value);
	          	if(key == "id_persona"){
	          		optionValue = value;
	          	}
	          	if(key == "persona"){
            		optionText = value;
	          	}
	        });
	        carga_Datos(optionValue);
	        $('#fkID_persona').append(new Option(optionText, optionValue));
	        $('#fkID_persona').val(optionValue);
	        alert('Guardado el empleado');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	function cargar_pagina() {
		console.log("entro")
		$('#tabla').load('');
		$('#tabla').load('usuario/Vusuario.php');
	}

	//Carga datos del usuario
	function carga_Datos(id_Usuario){
	    $.ajax({
	        url: "../controlador/ajaxUsuario.php",
	        data: "id_usuario="+id_Usuario+"&tipo=consultadatos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};

	//Carga territoriales del proyecto
	function cargar_territorial(id_territorial){
	    $.ajax({
	        url: "../controlador/ajaxUsuario.php",
	        data: "id_territorial="+id_territorial+"&tipo=consultaterritorial",
	        dataType: 'json' 
	    })
	    .done(function(data) {
	        $.each(data, function (key, value) {
	        	console.log("holaa")
                $("#fkID_territorial").append("<option value=" + value.id_territorial + ">" + value.nombre_territorial + "</option>");
            }); 
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};


	//Funcion eliminar Usuario
	$("[name*='btn_eliminar_usuario']").click(function(){
		id_Usuario = $(this).attr('data-id-usuario');
		confirmar(id_Usuario);
	});

	function confirmar(id) {
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar el registro?',
				function(){ elimina_usuario(id) },
                function(){ alertify.error('Se cancelo')});
	}

	//Funcion para eliminar el Usuario
	function elimina_usuario(id_usuario){
	    $.ajax({
	      url: "../controlador/ajaxUsuario.php",
	      data: 'id_usuario='+id_usuario+ '&tipo=elimina_logico',
	    success:function(r){
			if (r==1) {
				alertify.error("fallo el servidor");
			} else{  
				$('#tabla').load('usuario/Vusuario.php')
				alertify.success("Eliminado con exito");
			}
		}
	})
	}

	//validar el select de personas
	$("#fkID_persona").change(function(){
            console.log("si entra")
            fkID_persona = $("#fkID_persona").val();
            console.log(fkID_persona)
            if (fkID_persona>0) {
            	console.log("no")
            	carga_Datos(fkID_persona);
            } else {
            	console.log("si")
            	$("#nombre_usuario").val('');
	 			$("#pass_usuario").val('');
	 			$("#nombre_cargo").val('');
            }
        });

	//validar el select de cargo
	$("#fkID_cargo").change(function(){
            fkID_cargo = $("#fkID_cargo").val();
            console.log(fkID_cargo);
            if (fkID_cargo < 2 ) {
        		$("#fkID_proyecto").attr('disabled', 'disabled');
            } else {
        		$("#fkID_proyecto").prop('disabled', false);
            }
        });

	//validar el select de proyecto
	$("#fkID_proyecto").change(function(){
            fkID_proyecto = $("#fkID_proyecto").val();
            if (fkID_cargo < 1) {
            	console.log("hola")
            	$("#fkID_territorial").attr('disabled', 'disabled');
            } else {
            	console.log("no hola")
            	$("#fkID_territorial").prop('disabled', false);
            	cargar_territorial(fkID_proyecto);
            }
   
        });

	//Campos incompletos de usuario
	function validar_campos(){
		var respuesta = true;
		if($("#nombre_cargo").val().length == 0){
			respuesta = false;
		}
		if($('#fkID_persona').val().trim() == 0){
			respuesta = false;
		}
		if($("#nombre_usuario").val().length == 0){
			respuesta = false;
		}
		if($("#pass_usuario").val().length == 0){
			respuesta = false;
		}
		if(respuesta == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//Campos incompletos de empleado
	function validar_campos_empleado(){
		var respuesta = true;
		if($("#nombre_empleado").val().length == 0){
			respuesta = false;
		}
		if($('#fkID_cargo').val().trim() == 0){
			respuesta = false;
		}
		if($("#apellido_empleado").val().length == 0){
			respuesta = false;
		}
		if($("#cedula_empleado").val().length == 0){
			respuesta = false;
		}
		if($("#email_empleado").val().length == 0){
			respuesta = false;
		}
		if($('#fkID_proyecto').val().trim() == 0){
			respuesta = false;
		}
		if($('#fkID_territorial').val().trim() == 0){
			respuesta = false;
		}
		if(respuesta == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaUsuarios').DataTable(
        	{
                "pagingType": "full_numbers",
                "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "Todos"]],
                "language": {
                    "lengthMenu":     "Mostrando _MENU_ registros",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "search":         "Buscar:",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "zeroRecords": "No hay registros que coincidan.",
                    "infoEmpty": "No se encuentran registros.",
                    "infoFiltered":   "(Filtrando _MAX_ registros en total)",
                    "paginate": {
                        "first":      "<--",
                        "last":       "-->",
                        "next":       ">",
                        "previous":   "<"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                },
                "order": []
            }
        );
    });

    //Funcion para cargar sitio
    function cargar_sitio(){
  		$("#modalEquipo").removeClass("show");
 		$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  		$('#tabla').load('usuario/Vusuario.php');
    }
</script>
