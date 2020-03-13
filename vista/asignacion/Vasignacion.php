<?php include "../../controlador/asignacion_controller.php";
    session_start();
    $idUsuario = $_SESSION['id_usuario'];
    $permisosal = $asignacion->getPermisosal($idUsuario,5);
    $permisosat = $asignacion->getPermisosat($idUsuario,6);
    $permisosaf = $asignacion->getPermisosaf($idUsuario,7);
    $permisoconsulta = $asignacion->getPermisosconsulta($idUsuario);
    include "scripts_asignacion.php";
?>
<nav>  
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
  	<?php if ($permisosal[0]["ver"]==1) {
     ?>
    <a <?php if ($permisosat[0]["fkID_cargo"]==1) { echo'class="nav-item nav-link active"';}else {echo'class="nav-item nav-link"';} ?> id="nav-home-tab" data-toggle="tab" href="#nav-asignacionl" role="tab" aria-controls="nav-home" aria-selected="true">Asignación por lotes</a>
    <?php } ?>
    <?php if ($permisosat[0]["ver"]==1) {
     ?>
    <a  <?php if ($permisosat[0]["fkID_cargo"]==2) { echo'class="nav-item nav-link active"';}else {echo'class="nav-item nav-link"';} ?>  id="nav-profile-tab" data-toggle="tab" href="#nav-asignaciont" role="tab" aria-controls="nav-profile" aria-selected="false">Asignación a técnicos</a>
    <?php } ?>
    <?php if ($permisosaf[0]["ver"]==1) {
     ?>
    <a <?php if ($permisosat[0]["fkID_cargo"]==3) { echo'class="nav-item nav-link active"';}else {echo'class="nav-item nav-link"';} ?> id="nav-contact-tab" data-toggle="tab" href="#nav-asignacionf" role="tab" aria-controls="nav-contact" aria-selected="false">Asignación a funcionarios</a>
    <?php } ?>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
	<div <?php if ($permisosat[0]["fkID_cargo"]==1) { echo'class="tab-pane fade show active"';}else {echo'class="tab-pane fade show"';} ?> id="nav-asignacionl" role="tabpanel" aria-labelledby="nav-home-tab">
		<div class="row">
		    <div class="col-md-12">
		    	<br>
		        <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		                <li class="breadcrumb-item active" aria-current="page">Asignación por lotes</li>
			        </ol>
			    </nav>
			</div>
	    </div>
		<div class="row">
			    <div class="col-md-12 text-right">
			        <?php if ($permisosal[0]["crear"]==1) {
			         ?>
			        <button class="btn btn-success" data-target="#modalAsignacionl" data-toggle="modal" id="btn_crear_asignacionl" type="button">
			            Crear asignación por lote
			        </button>
			        <?php } ?>
			    </div>
		</div>
		<div class="row">
		    <div class="col-md-12">
		    	<br>
		        <table class="table table-hover table-condensed table-bordered display" id="tablaasignacionl" style="width:100%">
		            <thead>
		                <tr class="text-center">
		                    <th >
		                        FECHA
		                    </th>
		                    <th>
		                        PROYECTO 
		                    </th>
		                    <th>
		                        CANTIDAD DE EQUIPOS
		                    </th>
		                    <?php if ($permisosal[0]["editar"]==1 || $permisosal[0]["eliminar"]==1) {
		                    ?>
		                    <th>
		                        Opciones
		                    </th>  
		                    <?php } ?>
		                </tr>
		            </thead>
		            <tbody>
		                <?php getTablaAsignacionl($permisosal,$permisoconsulta);?>
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
	<div <?php if ($permisosat[0]["fkID_cargo"]==2) { echo'class="tab-pane fade show active"';}else {echo'class="tab-pane fade show"';} ?> id="nav-asignaciont" role="tabpanel" aria-labelledby="nav-profile-tab">
  		<div class="row">
			<div class="col-md-12">
		    	<br>
		        <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		                <li class="breadcrumb-item active" aria-current="page">Asignación a técnicos</li>
		            </ol>
		        </nav>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12 text-right">
		        <?php if ($permisosat[0]["crear"]==1) {
		         ?>
		        <button class="btn btn-success" data-target="#modalAsignaciont" data-toggle="modal" id="btn_crear_asignaciont" type="button">
		            Crear asignación a técnico
		        </button>
		        <?php } ?>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12">
		    	<br>
		        <table class="table table-hover table-condensed table-bordered display" id="tablaAsignaciont" style="width:100%">
		            <thead>
		                <tr class="text-center">
		                    <th >
		                        FECHA
		                    </th>
		                    <th>
		                        PROYECTO
		                    </th>
		                    <th>
		                        TERRITORIAL
		                    </th>
		                    <th>
		                        DIRECCIÓN
		                    </th>
		                    <th >
		                        SERIAL EQUIPO
		                    </th>
		                    <th>
		                        TECNICO ENCARGADO
		                    </th>
		                    <?php if ($permisosat[0]["editar"]==1 || $permisosat[0]["eliminar"]==1) {
		                    ?>
		                    <th>
		                        Opciones
		                    </th>  
		                    <?php } ?>
		                </tr>
		            </thead>
		            <tbody>
		                <?php getTablaAsignaciont($permisosat,$permisoconsulta);?>
		            </tbody>
		        </table>
		    </div>
	    </div>
	</div>
  	<div <?php if ($permisosat[0]["fkID_cargo"]==3) { echo'class="tab-pane fade show active"';}else {echo'class="tab-pane fade show"';} ?> id="nav-asignacionf" role="tabpanel" aria-labelledby="nav-contact-tab">
		<div class="row">
		    <div class="col-md-12">
		    	<br>
		        <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		                <li class="breadcrumb-item active" aria-current="page">Asignación a funcionarios</li>
		            </ol>
		        </nav>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12 text-right">
		        <?php if ($permisosaf[0]["crear"]==1) {
		         ?>
		        <button class="btn btn-success" data-target="#modalAsignacionf" data-toggle="modal" id="btn_crear_asignacionf" type="button">
		            Crear asignación a funcionario
		        </button>
		        <?php } ?>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12">
		    	<br>
		        <table class="table table-hover table-condensed table-bordered display" id="tablaAsignacionf" style="width:100%">
		            <thead>
		                <tr class="text-center">
		                    <th >
		                        FECHA
		                    </th>
		                    <th>
		                        PROYECTO
		                    </th>
		                    <th>
		                        TERRITORIAL
		                    </th>
		                    <th>
		                        SERIAL DE EQUIPO
		                    </th>
		                    <th >
		                        PERSONA QUE ENTREGA
		                    </th>
		                    <th>
		                        PERSONA QUE RECIBE
		                    </th>
		                    <th>
		                        AREA
		                    </th>
		                    <th>
		                        CARGO
		                    </th>
		                    <?php if ($permisosaf[0]["editar"]==1 || $permisosaf[0]["eliminar"]==1) {
		                    ?>
		                    <th>
		                        Opciones
		                    </th>  
		                    <?php } ?>
		                </tr>
		            </thead>
		            <tbody>
		                <?php getTablaAsignacionf($permisosaf,$permisoconsulta);?>
		            </tbody>
		        </table>
		    </div> 
	    </div>
	</div>
</div>
<?php include "modal_asignacion.php";?>
