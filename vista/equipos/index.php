<?php include "scripts.php";?>
<?php include "../../controlador/equipo_controller.php";?>
<?php $equipo = new equipoController();?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Equipos</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <button class="btn btn-success" data-target="#modalEquipo" data-toggle="modal" id="btn_crear_equipo" type="button">
            Crear equipo
        </button>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="tablaEquipos" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Serial
                    </th>
                    <th>
                        Tipo equipo
                    </th>
                    <th>
                        Modelo
                    </th>
                    <th>
                        Marca
                    </th>
                    <th>
                        Procesador
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $equipo->getTablaEquipos(0);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_equipo.php";?>
