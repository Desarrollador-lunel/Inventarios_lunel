<script type="text/javascript">
	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaEquipos').DataTable(
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

    //Funcion boton crear equipo
	$("#btn_crear_equipo").click(function(){
		$("#modalEquipoLabel").text("Crear equipo");
		$("#btn_guardar_equipo").attr("data-accion","crear");
		$("#form_equipo")[0].reset();
	});

	//Funcion guardar equipo
	$("#btn_guardar_equipo").click(function(){
		accion = $(this).attr('data-accion');
		if(accion == 'crear'){
			crea_equipo();
		}
		if(accion == 'editar'){
			edita_equipo();
		}
	});

	//Funcion para guardar el equipo
	function crea_equipo(){
		var cadena = "";
	 	serial = $("#serial_equipo").val();
	 	fkID_tipo_equipo = $("#fkID_tipo_equipo").val();
	 	fkID_modelo = $("#fkID_modelo").val();
	 	fkID_marca = $("#fkID_marca").val();
	 	fkID_procesador = $("#fkID_procesador").val();
	 	observaciones_equipo = $("#observaciones_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'serial_equipo='+serial+'&fkID_tipo_equipo='+fkID_tipo_equipo+'&fkID_modelo='+fkID_modelo+'&fkID_marca='+fkID_marca+'&fkID_procesador='+fkID_procesador+'&observaciones_equipo='+observaciones_equipo+'&tipo=inserta'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      alert('Guardado correctamente');
	      location.reload();

	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion guardar equipo
	$("[name*='btn_editar']").click(function(){
		id_equipo = $(this).attr('data-id-equipo');
		console.log('Entro a editar equipo');
		$("#modalEquipoLabel").text("Editar equipo");
		carga_equipo(id_equipo);
		$("#btn_guardar_equipo").attr("data-accion","editar");
	});

	//Carga el equipo por el ID
	function carga_equipo(id_equipo){

	    console.log("Carga el equipo "+ id_equipo);

	    $.ajax({
	        url: "../controlador/ajaxEquipo.php",
	        data: "id_equipo="+id_equipo+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });

	        id_equipo = data.id_equipo;
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para guardar el equipo
	function edita_equipo(){
		id_equipo = $("#id_equipo").val();
	 	serial = $("#serial_equipo").val();
	 	fkID_tipo_equipo = $("#fkID_tipo_equipo").val();
	 	fkID_modelo = $("#fkID_modelo").val();
	 	fkID_marca = $("#fkID_marca").val();
	 	fkID_procesador = $("#fkID_procesador").val();
	 	observaciones_equipo = $("#observaciones_equipo").val();

	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'id_equipo='+id_equipo+'&serial_equipo='+serial+'&fkID_tipo_equipo='+fkID_tipo_equipo+'&fkID_modelo='+fkID_modelo+'&fkID_marca='+fkID_marca+'&fkID_procesador='+fkID_procesador+'&observaciones_equipo='+observaciones_equipo+'&tipo=edita'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      alert('Actualizado correctamente');
	      location.reload();

	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}

	//Funcion eliminar equipo
	$("[name*='btn_eliminar']").click(function(){
		id_equipo = $(this).attr('data-id-equipo');
		$("#btn_eliminar_equipo").attr("data-id-equipo",id_equipo);
	});

	//Funcion eliminar equipo
	$("[name*='btn_eliminar_equipo']").click(function(){
		id_equipo = $(this).attr('data-id-equipo');
		elimina_equipo(id_equipo);
	});

	//Funcion para eliminar el equipo
	function elimina_equipo(id_equipo){
	    $.ajax({
	      url: "../controlador/ajaxEquipo.php",
	      data: 'id_equipo='+id_equipo+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      console.log(data);
	      alert('Eliminado correctamente');
	      location.reload();

	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}
</script>
