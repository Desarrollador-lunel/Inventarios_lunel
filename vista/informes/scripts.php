<script type="text/javascript">
    //Redireccion a index de informes
    $("#btn_generar").click(function(){
    	filtro_proyecto = $("#fkID_proyecto").val();
        $('#tabla').load('informes/modal_inventario_total.php?filtro_proyecto='+filtro_proyecto);
        $("#titulo").html('Informes');
        $("modalInventarioScrollable").show();
    });
</script>
