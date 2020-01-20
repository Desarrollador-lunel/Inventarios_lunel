<!-- Modal -->
<div class="modal fade" id="modalEquipo" tabindex="-1" role="dialog" aria-labelledby="modalEquipoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEquipoLabel">Crear equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_equipo" method="POST">
          <input type="hidden" id="id_equipo">
          <div class="form-group row">
            <label for="serial_equipo" class="col-sm-3 col-form-label">Serial:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="serial_equipo" required="true">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Tipo de equipo:</label>
            <div class="col-sm-9">
              <select class="form-control" id="fkID_tipo_equipo">
                <?php $equipo->getSelectTipoEquipo(0);?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Modelo:</label>
            <div class="col-sm-9">
              <select class="form-control" id="fkID_modelo">
                <?php $equipo->getSelectModelo(0);?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Marca:</label>
            <div class="col-sm-9">
              <select class="form-control" id="fkID_marca">
                <?php $equipo->getSelectMarca(0);?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Procesador:</label>
            <div class="col-sm-9">
              <select class="form-control" id="fkID_procesador">
                <?php $equipo->getSelectProcesador(0);?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Observaciones:</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="observaciones_equipo" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_equipo">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_equipo" name="btn_eliminar_equipo">Eliminar</button>
      </div>
    </div>
  </div>
</div>