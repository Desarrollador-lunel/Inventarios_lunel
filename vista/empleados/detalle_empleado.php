<?php
include "script_empleado.php";
include "../../controlador/empleado_controller.php";
//Consulto los datos del equipo
$datosEmpleado = $empleado->getEmpleadoID($_GET["id_empleado"]);
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            	<li class="breadcrumb-item" aria-current="page" id="miga_empleado"><ins class="text-primary" style="cursor: pointer">Empleado</ins></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle del empleado</li>
            </ol>
        </nav>
    </div>
</div>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		<div class="row">
			<div class="col-md-12 text-center">
				<h4><strong>Detalle de empleado</strong></h4>
			</div>
		</div>
		<div class="col-md-12 text-center">
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Nombres:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["nombres_persona"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Apellidos:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["apellidos_persona"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Documento:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["documento_persona"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Telefono:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["telefono_persona"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Celular:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["celular_persona"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Estado:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["email_persona"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Proyecto:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["nombre_proyecto"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Territorial:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["nombre_territorial"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Dirección:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEmpleado[0]["direccion_territorial"]; ?></label>
			</div>
		</div>
	</div>
</div>