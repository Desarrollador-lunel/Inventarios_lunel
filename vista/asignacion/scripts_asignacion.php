<script type="text/javascript"> 
	//Funcion boton crear Usuario
	$("#btn_crear_asignacionl").click(function(){
		$("#modalAsignarlLabel").text("Crear Asignación por lote");
		$("#btn_guardar_Asignacionl").attr("data-accion","crear"); 
		$("#form_Asignacionl")[0].reset();
		$("#form_Asignacionla")[0].reset();
		$('#automatico').hide(); //oculto mediante id
        $('#manual').hide(); //oculto mediante id
        $("#fkID_cargar").val(0);
    });

    //Funcion guardar asignación por lotes automatico
	$("#btn_guardar_cargarla").click(function(){
		respuesta = validar_campos_cargarla();
		if (respuesta) {
		crea_asignacionla();
		}
	});

	//Funcion para crear proyecto
	function crea_asignacionla(){
		var data = new FormData();
		data.append('fecha_asignacion', $("#fecha_asignacionl").val());
        data.append('file', $("#archivo_asignacionl").get(0).files[0]);
        data.append('fkID_persona_entrega', $("#fkID_persona_entregal").val());
        data.append('fkID_persona_recibe', $("#fkID_persona_recibel").val());
        data.append('fkID_proyecto', $("#fkID_proyectol").val());
        data.append('observacion', $("#observacionl").val());
        data.append('tipo', "crearasignacionla");
	    $.ajax({
            type: "POST",
            url: "../../controlador/ajaxAsignacion.php",
            data: data,
            contentType: false,
            processData: false,
            success: function(a) {  
                console.log(a);
                //location.reload();
            }
        })
	}



	//validar campos de asignación por lotes automatica
	function validar_campos_cargarla(){
		var respues = true;
	    if(document.getElementById("archivo_asignacionl").files.length){
	        marcar_campos("#archivo_asignacionl", 'correcto');
	    } else {
	        respues = false;
	        marcar_campos("#archivo_asignacionl", 'incorrecto');
	    }
	    if($("#fkID_proyectola").val() == 0){
	        respues = false;
	        marcar_campos("#fkID_proyectola", 'incorrecto');
	    } else {
	        marcar_campos("#fkID_proyectola", 'correcto');
	    }
	    if($("#fkID_persona_recibela").val() == 0){
	        respues = false;
	        marcar_campos("#fkID_persona_recibela", 'incorrecto');
	    } else {
	        marcar_campos("#fkID_persona_recibela", 'correcto');
	    }
	    if($("#fecha_asignacionla").val().length == 0){
        	bandera = false;
        	marcar_campos("#fecha_asignacionla", 'incorrecto');
	    } else {
	        marcar_campos("#fecha_asignacionla", 'correcto');
	    }
		if(respues == false){
			alert('Complete el formulario');
			return false;
		} else {
			return true;
		}
	}

	//validar el select de cargo
	$("#fkID_cargar").change(function(){
        fkID_cargar = $("#fkID_cargar").val();
        console.log(fkID_cargar);
        if (fkID_cargar == 0 ) {
            $('#automatico').hide(); //oculto mediante id
            $('#manual').hide(); //oculto mediante id
        } 
        if (fkID_cargar == 1 ) {
            $('#automatico').show(); //muestro mediante id
            $('#manual').hide(); //oculto mediante id
        } 
        if (fkID_cargar == 2 ) {
            $('#manual').show(); //muestro mediante id
            $('#automatico').hide(); //oculto mediante id
        } 
    });

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


</script>