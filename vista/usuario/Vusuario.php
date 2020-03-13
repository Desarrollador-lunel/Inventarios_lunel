 <?php include "../../controlador/usuario_controller.php";
    session_start();
    $idUsuario = $_SESSION['id_usuario'];
    $permisos = $usuario->getPermisos($idUsuario,1);
    $permisoconsulta = $usuario->getPermisosconsulta($idUsuario);
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Usuarios </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-9 form-inline">
        <label for="inputEmail3" class="control-label">Proyecto: </label>&nbsp;&nbsp;&nbsp;
        <select class="form-control" id="fkID_cargar"  required>
                <option selected value="0">Todos</option>
                <option value="1">Cargar automáticamente</option>
                <option value="2">Cargar manualmente</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="inputEmail3" class="control-label">Cargo: </label>&nbsp;&nbsp;&nbsp;
        <select class="form-control" id="fkID_cargar"  required>
                <option selected value="0">Todos</option>
                <option value="1">Cargar automáticamente</option>
                <option value="2">Cargar manualmente</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-success" id="btn_filtro_usuario"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
    </div>
    <div class="col-md-3 text-right">
        <?php if ($permisos[0]["crear"]==1) {
         ?>
        <button class="btn btn-success" data-target="#modalUsuario" data-toggle="modal" id="btn_crear_usuario" type="button">
            Crear usuario
        </button>
        <?php } ?>
    </div>
</div><br>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="tablaUsuarios" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th >
                        Nombres
                    </th>
                    <th>
                        Rol
                    </th>
                    <th>
                        Usuario
                    </th>
                    <?php if ($permisos[0]["editar"]==1) {
                     ?>
                    <th>
                        Editar
                    </th>
                    <?php } ?>
                    <?php if ($permisos[0]["eliminar"]==1) {
                     ?>
                    <th>
                        Eliminar
                    </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php getTablaUsuario($permisos,$permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_usuario.php";?>
<?php include "modal_empleado.php";?>
<?php include "modal_proyecto.php";?>
<?php include "modal_territorial.php";?>
<?php include "scripts_usuario.php";?>