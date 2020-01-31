
        <!-- Core plugin JavaScript-->

        <!-- Custom scripts for all pages-->
        <script src="componentes/js/sb-admin-2.min.js">
        </script>
        <!-- Page level plugins -->
        <script src="componentes/vendor/chart.js/Chart.min.js">
        </script>
        <!-- Page level custom scripts -->
        <script src="componentes/js/demo/chart-area-demo.js">
        </script>

        
 </body>
 </html>
 <script type="text/javascript">
    //esta cargando el archivo tabla.php en el div tabla
    $(document).ready(function(){
        //$('#tabla').load('usuario/Vusuario.php')
        $("[name*='btn_cerrar_sesion']").click(function(){
        console.log("hola")
        $.ajax({
            url: "../controlador/ajaxUsuario.php",
            data: "tipo=cerrar_sesion",
        })
        .done(function(data) {
            window.location="login/index.php";
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        })
    })
    });

    $("#menu_usuarios").click(function(){
        $('#tabla').load('usuario/Vusuario.php');
    });

    $("#menu_equipos").click(function(){
        $('#tabla').load('equipos/index.php');
    });

    $("#menu_proyecto").click(function(){
        $('#tabla').load('proyectos/Vproyecto.php');
    });

    $("#menu_funcionario").click(function(){
        $('#tabla').load('funcionarios/index.php');
    });

    $("#menu_informes").click(function(){
        $('#tabla').load('informes/inventario_total.php');
    });  




</script>
