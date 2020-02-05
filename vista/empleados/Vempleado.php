<?php include "../../controlador/empleado_controller.php";
    session_start();
    $idUsuario = $_SESSION['id_usuario'];
    $permisos = $empleado->getPermisos($idUsuario,13);
    $permisoconsulta = $empleado->getPermisosconsulta($idUsuario);
    include "script_empleado.php";
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Empleados</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"]==1) {
         ?>
        <button class="btn btn-success" data-target="#modalEmpleado" data-toggle="modal" id="btn_crear_empleado" type="button">
            Crear empleado
        </button>
        <?php } ?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="tablaEmpleado" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th >
                        NOMBRES
                    </th>
                    <th>
                        APELLIDOS
                    </th>
                    <th >
                        PROYECTO
                    </th>
                    <th>
                        CIUDAD
                    </th>
                    <th>
                        CARGO
                    </th>
                    <?php if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    ?>
                    <th>
                        Opciones
                    </th>  
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php getTablaEmpleado($permisos,$permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_empleado.php";?>
<?php ?>