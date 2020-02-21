  <!-- Modal --> 
<div class="modal fade" id="modalAsignacionl" tabindex="-1" role="dialog" aria-labelledby="modalAsignacionlLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAsignacionlLabel">Crear Asignación por lote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-header">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Cargar datos:</label>
            <div class="col-sm-8">
              <select class="form-control" id="fkID_cargar"  required>
                <option selected value="0">Seleccione..</option>
                <option value="1">Cargar automáticamente</option>
                <option value="2">Cargar manualmente</option>
              </select>
            </div>
          </div>
          </div>
          <div class="modal-body">
          <div id="automatico">
          	<form id="form_Asignacionla">
          		<input type="hidden" id="id_Asignacionlm">
          		<input type="hidden" id="fkID_persona_entregala" value="<?php echo $idUsuario ?>">
          		<div class="form-group row">
		            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Proyecto:</label>
		            <div class="col-sm-8">
		              <select class="form-control" id="fkID_proyectola"  required>
		                <option selected value="0">Seleccione</option>
		              </select>
		            </div>
		          </div>
		          <div class="form-group row">
		            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Coordinador:</label>
		            <div class="col-sm-8">
		              <select class="form-control" id="fkID_persona_recibela"  required>
		                <option selected value="0">Seleccione..</option>
		              </select>
		            </div>
		          </div>
		          <div class="form-group row">
		            <label for="dateAsignacionl" class="col-sm-4 col-form-label text-right">Fecha asignación:</label>
		            <div class="col-sm-8">
		              <input class="form-control" type="date" id="fecha_asignacionla" required="true">
		            </div> 
		          </div>
		          <div class="form-group row">
		            <label for="dateAsignacionl" class="col-sm-4 col-form-label text-right">Observación:</label>
		            <div class="col-sm-8">
		              <textarea class="form-control"  id="observacionl"></textarea>
		            </div> 
		          </div>
          		 <div class="form-group row">
		            <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Descargar archivo:</label>
		            <div class="col-sm-8">
		              <a href="../server/php/prueba.xlsx" class="button btn btn-primary">Desacargar archivo</a>
		            </div>
		          </div>
		          <div class="form-group row">
		            <label for="dateAsignacionl" class="col-sm-4 col-form-label text-right">Adjuntar archivo:</label>
		            <div class="col-sm-8">
		              <input class="form-control" type="file" id="archivo_asignacionl" required="true">
		            </div> 
		          </div>
		          <div class="form-group row">
		            <div class="col-sm-12 text-center">
		              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_cargarla">Cargar archivo</button>
		            </div>
		          </div>
		          <div class="form-group row">
		            <label for="dateAsignacionl" class="col-sm-4 col-form-label text-right">Adjuntar acta:</label>
		            <div class="col-sm-8">
		              <input class="form-control" type="file" id="archivo_actal" required="true">
		            </div> 
		          </div>
		          <div class="form-group row">
		            <div class="col-sm-12 text-center">
		              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_Asignacionla">Guardar</button>
		            </div>
		          </div>
          	</form>
          </div>
          <div id="manual">
          <form id="form_Asignacionl">
          <input type="hidden" id="id_Asignacionl"> 
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Proyecto:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_proyecto"  required>
                <option selected value="0">Seleccione</option>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              <button type="button" class="btn btn-primary" data-target="#modalProyecto" data-toggle="modal" id="btnadicionproyecto"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Coordinador:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_territorial"  required>
                <option selected value="0">Seleccione..</option>
              </select>
            </div>
            <div class="col-sm-2 text-danger"> 
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="dateAsignacionl" class="col-sm-3 col-form-label">Fecha:</label>
            <div class="col-sm-7">
              <input class="form-control" type="date" id="fecha_asignacionl" style="text-transform:uppercase;"   required="true">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>  
          </div>
          <div class="form-group row float-center">
            <?php getTiposEquipos();?>  
        </div>
        <div class="form-group row">
            <label for="dateAsignacionl" class="col-sm-3 col-form-label">Buscar serial:</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="fecha_asignacionl" style="text-transform:uppercase;">
            </div> 
          </div>
        <div class="form-group row">
            <div class="col-sm-12 card-header text-center">
              Seriales de equipos
            </div>
        </div>
        <div class="form-group row" style="background:#FAF7F6; width:490px; max-height:200px;  overflow-x: scroll;" id="Seriales_equipos">
              <?php getTiposEquipos2();?> 
        </div>
        <div class="form-group row float-center" >
            <div class="col-sm-12 text-center">
              <button data-accion="agregar" type="button" class="btn btn-primary" id="btn_agregar_serialesl">Agregar</button>
            </div>
         </div>
        <div class="form-group row float-center">
            <div class="card col-sm-12">
            <div class="card-header text-center">
              Seriales agregados 
            </div>
            <div class="card-body" style="background:#D9EEED;" id="territorial_agregada">
              
            </div>
            </div>
        </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_Asignacionl">Guardar</button>
            </div>
          </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>