<?php
include "../../controlador/proyecto_controller.php";
//Consulto los datos del equipo
//$datosEquipo = $equipo->getDatosEquipoID($_GET["id_equipo"]);
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            	<li class="breadcrumb-item" aria-current="page" id="miga_proyecto"><ins class="text-primary" style="cursor: pointer">Proyectos</ins></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle de proyecto</li>
            </ol>
        </nav>
    </div>
</div>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		<div class="row">
			<div class="col-md-12 text-center">
				<h4><strong>Detalle del Proyecto</strong></h4>
			</div>
		</div>
		<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="tablaProyecto" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th >
                        PROYECTO
                    </th>
                    <th>
                        Cantidad de Equipos
                    </th>
                    <th>
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php //getTablaProyecto($permisos,$permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Proyecto:</strong></label>
			</div>
	</div>
	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  		La hoja de vida del equipo esta contemplada para la siguiente fase del desarrollo del aplicativo :D.
	</div>
  	<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  		Las reparaciones del equipo esta contemplada para la siguiente fase del desarrollo del aplicativo :D.
  	</div>
</div>
<?php //include "modal_historico.php";
	  include "scripts_proyecto.php";
?>