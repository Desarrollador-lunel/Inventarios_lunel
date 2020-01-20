<?php include "scripts_usuario.php";?>
<?php include "../../controlador/usuario_controller.php";?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <button class="btn btn-success" data-target="#modalUsuario" data-toggle="modal" id="btn_crear_usuario" type="button">
            Crear usuario
        </button>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="tablaUsuarios" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Nombres
                    </th>
                    <th>
                        Rol
                    </th>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Editar
                    </th>
                    <th>
                        Eliminar
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php getTablaUsuario();?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_usuario.php";?>
<?php include "modal_empleado.php";?>
<?php include "modal_proyecto.php";?>