<script type="text/javascript"> 
	//Funcion boton crear Usuario
	$("#btn_crear_asignacionl").click(function(){
		$("#modalAsignarlLabel").text("Crear Asignación por lote");
		$("#btn_guardar_Asignacionl").attr("data-accion","crear"); 
		$("#form_Asignacionl")[0].reset();
		$("#form_Asignacionla")[0].reset();
		$("#fkID_persona_recibela").empty()
        $("#fkID_persona_recibela").append("<option selected value='0'>Seleccione</option>");
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
		data.append('fecha_asignacion', $("#fecha_asignacionla").val());
        data.append('file', $("#archivo_asignacionl").get(0).files[0]);
        data.append('fkID_persona_entrega', $("#fkID_persona_entregala").val());
        data.append('fkID_persona_recibe', $("#fkID_persona_recibela").val());
        data.append('fkID_proyecto', $("#fkID_proyectola").val());
        data.append('observacion', $("#observacionl").val());
        data.append('tipo', "crearasignacionla");
	    $.ajax({
            type: "POST",
            url: "../controlador/ajaxAsignacion.php",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(a) {
                console.log(a['respuesta']);
                console.log(a['seriales']);
                if (a['seriales']!="") {
                alert('Los siguientes seriales no fueron asignados debido a que no se encuentran en sistema o ya se encuentran asignados '+a['seriales']);
                }
                if (a['respuesta']!="eliminado") {
                alert('Se a generado el acta de asignación para ser verificada y firmada');
                location.href = "../server/php/prueba.xlsx";
                }
                window.location = "asignacion/pdf_actas.php?asignacion=al&id_asignacion="+ a['id'];
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

	//validar el select de carga
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

    //validar el select de proyecto para cargar coordinador
	$("#fkID_proyectola").change(function(){
            fkID_proyectola = $("#fkID_proyectola").val();
            console.log(fkID_proyectola );
            if (fkID_proyectola  > 0 ) {
            	$("#fkID_persona_recibela").empty()
            	//$("#fkID_persona_recibela").append("<option selected value='0'>Seleccione</option>");
            	cargar_coordinador(fkID_proyectola);
            } else {
            	$("#fkID_persona_recibela").empty()
            	$("#fkID_persona_recibela").append("<option selected value='0'>Seleccione</option>");
            }
        });

	//Carga territoriales del proyecto
	function cargar_coordinador(fkID_proyectola){
	    $.ajax({
	    	type: "POST",
            url: "../controlador/ajaxAsignacion.php",
	        data: "fkID_proyecto="+fkID_proyectola+"&tipo=consultacoordinador",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	    	if (data!=0) {
	        $.each(data, function (key, value) {
	        	console.log("holaa goku")
                $("#fkID_persona_recibela").append("<option selected value=" + value.id_persona + ">" + value.persona + "</option>");
            }); 
	    } else {
	    	alert("El proyecto no tiene coordinador creado debe crearlo");
	    }
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};


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

	$(document).on('change','input[name="archivo_asignacionl"]',function(){
		var fileName = this.files[0].name;
		var fileSize = this.files[0].size;

		if(fileSize > 3000000){
			alert('El archivo no debe superar los 3MB');
			this.value = '';
			this.files[0].name = '';
		}else{
			// recuperamos la extensión del archivo
			var ext = fileName.split('.').pop();
			// Convertimos en minúscula porque 
			// la extensión del archivo puede estar en mayúscula
			ext = ext.toLowerCase();
			// console.log(ext);
			switch (ext) {
				case 'xls':
				case 'xlsx': break;
				default:
					alert('El archivo no tiene la extensión adecuada debe ser .xls o .xlsx');
					this.value = ''; // reset del valor
					this.files[0].name = '';
			}
		}
	});


</script>