<script type="text/javascript">
	var pass_antiguo;

var agregarte = [];
//agregarte.push(['Study',2]);
var len = agregarte.length;
//console.log(agregarte[5][1]); // 9
console.log(len)

//Funcion para el detalle de equipo
	$("[name*='btn_detalle']").click(function(){
		id_empleado = $(this).attr('data-id-empleado');
		console.log(id_empleado);
        $('#tabla').load('empleados/detalle_empleado.php?id_empleado='+id_empleado);
    });
    //Funcion boton crear Usuario
	$("#btn_crear_empleado").click(function(){
		$("#modalEmpleadoLabel").text("Crear Empleado");
		$("#btn_guardar_Empleado").attr("data-accion","crear"); 
		$("#form_Empleado")[0].reset();
		$("#fkID_territorial").prop('disabled', true);
        $("#fkID_proyecto").prop('disabled', true);
    });

	//Funcion abrir formulario de empleado
	$("#btnadicionproyecto").click(function(){
		$("#form_Proyecto")[0].reset();
		$("#territorial_agregada").empty();
        $("#fkID_proyecto").prop('disabled', true);
	});

	//Funcion guardar empleado
	$("#btn_guardar_Empleado").click(function(){
		respuesta = validar_campos_empleado();
		if (respuesta) {
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_empleado();
			}
			if(accion == 'editar'){
				 edita_empleado();
			}
		}
	});

	//Funcion guardar empleado
	$("#btn_guardar_Proyecto").click(function(){
		respuesta = validar_campos_proyecto();
		if (respuesta) {
		crea_proyecto();
		}
	});

	//Funcion para agregar territoriales a div
	$("#btn_agregar_Territorial").click(function(){
		respuesta=validar_campos_territorial();
		if (respuesta) {
			direccion = $("#direccion_territorial").val();
	 		fkID_territorial = $("#fkID_territorial2").val();
	 		nombre_territorial = $('select[name="fkID_territorial2"] option:selected').text();
	 		console.log(direccion+" "+fkID_territorial+" "+nombre_territorial);
	 		agregar_campo(direccion,fkID_territorial,nombre_territorial)
		} 
	});

	function agregar_campo(direccion,id,nombre) {
		camponombre = '<div class="form-group row" id="territorial'+id+'">'+
			'<div class="col-sm-10" >'+
              '<label class="form-control " type="text" id="territorial' + id + '"  name="territorial' + id + '">'+nombre+'     '+direccion+'</label>'+
              '</div>'+
              '<div class="col-sm-2 text-center">'+
              '<button data-id-territorial="'+id+'" type="button" class="btn btn-danger"'+
               'id="btn_eliminar_Territorial'+id+'">X</button>'+
            '</div></div>';
		$("#territorial_agregada").append(camponombre);
		$("#direccion_territorial").val('');
	 	$("#fkID_territorial2").val('');
	 	$("#direccion_territorial").removeClass('is-invalid');
      	$("#direccion_territorial").removeClass('is-valid');
      	$("#fkID_territorial2").removeClass('is-invalid');
      	$("#fkID_territorial2").removeClass('is-valid');
      	console.log("si")
      	//Funcion eliminar territorial seleccionada
	$("#btn_eliminar_Territorial"+id).click(function(){ 
		console.log("chavo")
		id_territorial = $(this).attr('data-id-territorial');
		campo = "territorial"+id_territorial
		$("#"+campo).remove();
		var len = agregarte.length;
			for (var i = 0; i < len; i++) {
		    if (agregarte[i][0]==id) { 
		    agregarte.splice(i,1);
		    }
		}
	});
	//crea el arrays de la territorial para agregar
	agregarte.push([id,direccion]);
	}

	//Funcion guardar Usuario
	$("[name*='btn_editar']").click(function(){
		id_empleado = $(this).attr('data-id-empleado');
		console.log('Entro a editar empleado');
		$("#modalEmpleadoLabel").text("Editar Empleado");
		carga_Datos(id_empleado);
		$("#btn_guardar_Empleado").attr("data-accion","editar");
		$("#btn_guardando").hide();
	})

	//Carga el Usuario por el ID
	function carga_Proyecto(id_empleado){

	    console.log("Carga el empleado "+ id_empleado);

	    $.ajax({
	        url: "../controlador/ajaxEmpleado.php",
	        data: "id_empleado="+id_empleado+"&tipo=consulta",
	        dataType: 'json',
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });
	        id_empleado = data.id_persona;
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};

	//Funcion para guardar el Usuario
	function edita_empleado(){
		id_persona = $("#id_persona").val();
		console.log("el id es "+id_persona)
	 	nombres_persona = $("#nombres_persona").val();
	 	apellidos_persona = $("#apellidos_persona").val();
	 	documento_persona = $("#documento_persona").val();
	 	telefono_persona = $("#telefono_persona").val();
	 	celular_persona = $("#celular_persona").val();
	 	email_persona = $("#email_persona").val();
	 	fkID_cargo = $("#fkID_cargo").val();
	 	fkID_proyecto = $("#fkID_proyecto").val();
	 	fkID_territorial = $("#fkID_territorial").val();
	    $.ajax({
	      url: "../controlador/ajaxEmpleado.php",
	      data: 'id_persona='+id_persona+'&nombres_persona='+  nombres_persona +'&apellidos_persona='+  apellidos_persona + '&documento_persona='+ documento_persona + '&telefono_persona='+ telefono_persona + '&celular_persona='+ celular_persona + '&email_persona='+ email_persona + '&fkID_cargo='+ fkID_cargo + '&fkID_proyecto='+ fkID_proyecto + '&fkID_territorial='+ fkID_territorial + '&tipo=edita',
	     success:function(r){
	     	if (r==1) {
			alertify.success('Editado correctamente');
		  	setTimeout('cargar_sitio()',1000);
		  } else {
		  	console.log(r)
		  }
		}
	})
	}

	//Funcion para guardar el empleado
	function crea_empleado(){
	 	nombres_persona = $("#nombres_persona").val();
	 	apellidos_persona = $("#apellidos_persona").val();
	 	documento_persona = $("#documento_persona").val();
	 	telefono_persona = $("#telefono_persona").val();
	 	celular_persona = $("#celular_persona").val();
	 	email_persona = $("#email_persona").val();
	 	fkID_cargo = $("#fkID_cargo").val();
	 	fkID_proyecto = $("#fkID_proyecto").val();
	 	fkID_territorial = $("#fkID_territorial").val();
	    $.ajax({
	      url: "../controlador/ajaxEmpleado.php", 
	      data: 'nombres_persona='+  nombres_persona +'&apellidos_persona='+  apellidos_persona + '&documento_persona='+ documento_persona + '&telefono_persona='+ telefono_persona + '&celular_persona='+ celular_persona + '&email_persona='+ email_persona + '&fkID_cargo='+ fkID_cargo + '&fkID_proyecto='+ fkID_proyecto + '&fkID_territorial='+ fkID_territorial + '&tipo=inserta',
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalEmpleado").removeClass("show");
	      $("#modalEmpleado").removeClass("modal-backdrop");
	      alertify.success('Registrado correctamente');
		  setTimeout('cargar_sitio()',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para crear proyecto
	function crea_proyecto(){
	 	nombre_Proyecto = $("#nombre_Proyecto").val();
	    $.ajax({
	      url: "../controlador/ajaxUsuario.php", 
	      data: 'nombre_proyecto='+nombre_Proyecto+'&tipo=inserta_proyecto',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      console.log(data[0]["id"]);
	      agrega_territoriales(data[0]["id"]);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para agrgar territoriales proyecto
	function agrega_territoriales(fkID_proyecto){
	 	var len = agregarte.length;
			for (var i = 0; i < len; i++) {
		    console.log(agregarte[i][0]);
		    console.log(agregarte[i][1]);
		    console.log(fkID_proyecto);
	    $.ajax({
	      url: "../controlador/ajaxUsuario.php", 
	      data: 'fkID_territorial='+agregarte[i][0]+'&direccion_territorial='+agregarte[i][1]+'&fkID_proyecto='+fkID_proyecto+'&tipo=agregar_territorial',
	      success:function(r){
			console.log(r);
		}
	    })
	    }
	    $("#modalProyecto").removeClass("show");
	    $("#modalProyecto").removeClass("modal-backdrop");
	    alert('Guardado el proyecto');
	}

	function cargar_pagina() {
		console.log("entro")
		$('#tabla').load('');
		$('#tabla').load('empleados/Vempleado.php');
	}

	//Carga datos del empleado
	function carga_Datos(id_empleado){
	    $.ajax({
	        url: "../controlador/ajaxEmpleado.php",
	        data: "id_empleado="+id_empleado+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {
	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
	          if (key=="fkID_proyecto") {
	          	fkID_proyecto=value
	          }
	          if (key=="fkID_territorial") {
	          	fkID_territorial=value
	          }
	          if (key=="fkID_cargo") {
	          	fkID_cargo=value
	          }
	          $("#"+key).val(value);
	        });
	        if (fkID_cargo < 2 ) {
            	$("#fkID_proyecto").empty()
        		$("#fkID_proyecto").attr('disabled', false);
        		$("#fkID_proyecto").append("<option value='0'>Seleccione..</option>");
        		$("#fkID_proyecto").append("<option value='1'>PROYECTO LUNEL-IE</option>");
        		$("#fkID_proyecto").val(fkID_proyecto);
            } else {
            	$("#fkID_proyecto").empty()
            	$("#fkID_proyecto").append("<option value='0'>Seleccione</option>");
            	cargar_proyectos(fkID_proyecto);
        		$("#fkID_proyecto").prop('disabled', false);
            }
            if (fkID_proyecto < 1) {
            	console.log("hola")
            	$("#fkID_territorial").attr('disabled', 'disabled');
            } else {
            	console.log("no hola")
            	$("#fkID_territorial").prop('disabled', false);
            	v=0
            }
            $("#fkID_cargo").val(fkID_cargo);
            if (v==0) {cargar_territorial(fkID_proyecto,fkID_territorial);}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};

	function cargar_selec(fkID_proyecto,fkID_territorial,fkID_cargo) {
		console.log("valor de l proyecto"+fkID_proyecto)
            
            console.log("valor de la territorial"+fkID_territorial)
            
            
	}

	//Carga territoriales del proyecto
	function cargar_territorial(id_territorial,opc){
	    $.ajax({
	        url: "../controlador/ajaxEmpleado.php",
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
	        if (opc!=0) {
	    	$("#fkID_territorial").val(opc);
	    	console.log("ya esta cargado esto"+opc)
	    }
	    })
	};

	//Carga territoriales del proyecto
	function cargar_proyectos(opc){
	    $.ajax({
	        url: "../controlador/ajaxEmpleado.php",
	        data: "tipo=consultaproyectos",
	        dataType: 'json' 
	    })
	    .done(function(data) {
	        $.each(data, function (key, value) {
	        	console.log("holaa goku")
                $("#fkID_proyecto").append("<option value=" + value.id_proyecto + ">" + value.nombre_proyecto + "</option>");
            }); 
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	        if (opc!=0) {
	    	$("#fkID_proyecto").val(opc);
	    	console.log("ya")
	    }
	    })
	};


	//Funcion eliminar Usuario
	$("[name*='btn_eliminar']").click(function(){
		id_empleado = $(this).attr('data-id-empleado');
		confirmar(id_empleado);
	});

	function confirmar(id) {
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar el registro?',
				function(){ elimina_empleado(id) },
                function(){ alertify.error('Se cancelo')});
	}

	//Funcion para eliminar el empleado
	function elimina_empleado(id_empleado){
	    $.ajax({
	      url: "../controlador/ajaxEmpleado.php",
	      data: 'id_empleado='+id_empleado+ '&tipo=elimina_logico',
	    success:function(r){
			if (r==1) {
				alertify.error("fallo el servidor");
			} else{  
				$('#tabla').load('empleados/Vempleado.php')
				alertify.success("Eliminado con exito");
			}
		}
	})
	}

	//validar el select de cargo
	$("#fkID_cargo").change(function(){
            fkID_cargo = $("#fkID_cargo").val();
            console.log(fkID_cargo);
            if (fkID_cargo < 2 ) {
            	op = $("#fkID_proyecto").length;
            	$("#fkID_proyecto").empty()
        		$("#fkID_proyecto").attr('disabled', false);
        		$("#fkID_proyecto").append("<option value='0'>Seleccione..</option>");
        		$("#fkID_proyecto").append("<option value='1'>PROYECTO LUNEL-IE</option>");
            } else {
            	$("#fkID_proyecto").empty()
            	$("#fkID_proyecto").append("<option value='0'>Seleccione</option>");
            	cargar_proyectos(0);
        		$("#fkID_proyecto").prop('disabled', false);
            }
        });


	//validar el select de proyecto
	$("#fkID_proyecto").change(function(){
            fkID_proyecto = $("#fkID_proyecto").val();
            if (fkID_proyecto < 1) {
            	console.log("hola")
            	$("#fkID_territorial").attr('disabled', 'disabled');
            } else {
            	console.log("no hola")
            	$("#fkID_territorial").prop('disabled', false);
            	cargar_territorial(fkID_proyecto);
            }
   
        });

	//Campos incompletos de usuario
	function validar_campos_territorial(){
		var bandera = true;
      if($("#direccion_territorial").val() == 0){
        bandera = false;
        marcar_campos("#direccion_territorial", 'incorrecto');
      } else {
        marcar_campos("#direccion_territorial", 'correcto');
      }
      if($("#fkID_territorial2").val() == 0){
        bandera = false;
        marcar_campos("#fkID_territorial2", 'incorrecto');
      } else {
        marcar_campos("#fkID_territorial2", 'correcto');
      }
		if(bandera == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//Campos incompletos de proyecto
	function validar_campos_proyecto(){
		var bandera = true;
      if($("#nombre_Proyecto").val() == 0){
        bandera = false;
        marcar_campos("#nombre_Proyecto", 'incorrecto');
      } else {
        marcar_campos("#nombre_Proyecto", 'correcto');
      }
      if($("#territorial_agregada").html()==""){
        bandera = false;
        marcar_campos("#fkID_territorial2", 'incorrecto');
      } else {
        marcar_campos("#fkID_territorial2", 'correcto');
      }
		if(bandera == false){
			alert('Complete el formulario ó agregue una territorial');
			return false;
		} else {
			return true;
		}
	}

	//Campos incompletos de empleado
	function validar_campos_empleado(){
		var bandera = true;
      if($("#nombres_persona").val().length == 0){
        bandera = false;
        marcar_campos("#nombres_persona", 'incorrecto');
      } else {
        marcar_campos("#nombres_persona", 'correcto');
      }
      if($("#fkID_cargo").val() == 0){
        bandera = false;
        marcar_campos("#fkID_cargo", 'incorrecto');
      } else {
        marcar_campos("#fkID_cargo", 'correcto');
      }
      if($("#apellidos_persona").val().length == 0){
        bandera = false;
        marcar_campos("#apellidos_persona", 'incorrecto');
      } else {
        marcar_campos("#apellidos_persona", 'correcto');
      }
      if($("#documento_persona").val().length == 0){
        bandera = false;
        marcar_campos("#documento_persona", 'incorrecto');
      } else {
        marcar_campos("#documento_persona", 'correcto');
      }
      if($("#email_persona").val().length == 0){
        bandera = false;
        marcar_campos("#email_persona", 'incorrecto');
      } else {
        marcar_campos("#email_persona", 'correcto');
      }
      if($("#fkID_proyecto").val() == 0){
        bandera = false;
        marcar_campos("#fkID_proyecto", 'incorrecto');
      } else {
        marcar_campos("#fkID_proyecto", 'correcto');
      }
      if($("#fkID_territorial").val() == 0){
        bandera = false;
        marcar_campos("#fkID_territorial", 'incorrecto');
      } else {
        marcar_campos("#fkID_territorial", 'correcto');
      }
		if(bandera == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//Funcion para marcar los campos
  function marcar_campos(campo, tipo){
    if(tipo == 'correcto'){
      $(campo).removeClass('is-invalid');
      $(campo).addClass('is-valid');
    }
    if(tipo == 'incorrecto'){
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
    }
  }

  //Funcion guardar territorial
	$("#btn_guardar_territorial").click(function(){
		validar_territorial();
		return false;
	});

	//Funcion para validar modelo
	function validar_territorial(){ 
	 	nombre_territorial = $("#nombre_territorial").val();

	    $.ajax({
	      url: "../controlador/ajaxEmpleado.php",
	      data: 'nombre_territorial='+nombre_territorial+'&tipo=valida_territorial',
	      dataType: 'json'
	    })
	    .done(function(data) {
	      //---------------------
	      if(data[0]["cantidad"] >0){
	      	alert('La territorial ya esta registrada');
	      	$("#nombre_territorial").val("");
	      	$("#nombre_territorial").focus();
	      } else {
	      	crea_territorial();
	      }
	    })
	    .fail(function(data) {
	      console.log(data);
	    });
	}

	//Funcion para guardar el marca
	function crea_territorial(){
	 	nombre_territorial = $("#nombre_territorial").val();

	    $.ajax({
	      url: "../controlador/ajaxEmpleado.php",
	      data: 'nombre_territorial='+nombre_territorial+'&tipo=inserta_territorial'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      $("#modalTerritorial").removeClass("show");
	      $("#modalTerritorial").removeClass("modal-backdrop");
	      carga_territorial();
	      $("#nombre_territorial").val("");
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log("ok");
	    });
	}

	//Funcion para cargar el registro guardado
	function carga_territorial(){

	    $.ajax({
	        url: "../controlador/ajaxEmpleado.php",
	        data: "tipo=ultima_territorial",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          	console.log(key+"--"+value);
	          	if(key == "id_territorial"){
	          		optionValue = value;
	          	}
	          	if(key == "nombre_territorial")
            		optionText = value;
	        });
	        $('#fkID_territorial2').append(new Option(optionText, optionValue));
	        $('#fkID_territorial2').val(optionValue);
	        alert('Guardada la territorial');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};



	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaEmpleado').DataTable(
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
  		$("#modalEmpleado").removeClass("show");
 		$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  		$('#tabla').load('empleados/Vempleado.php');
    }

    function validarEmail( email ) {
	    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if ( !expr.test(email) ){
	    	alert("Error: La dirección de correo " + email + " es incorrecta.");
	    	$("#email").val("");
	    }else{
	    	return true;
	    }	    
	}

	 //Funcion para retroceder Miga de pan
    $("#miga_empleado").click(function(){
        $('#tabla').load('empleados/Vempleado.php');
    });


</script>