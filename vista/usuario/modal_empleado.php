<!-- Modal -->
<div class="modal fade" id="modalEmpleado" tabindex="-1" role="dialog" aria-labelledby="modalEmpleadoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEmpleadoLabel">Crear Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-body">
        <form id="form_Empleado">
          <input type="hidden" id="id_usuario">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="nombre_empleado" style="text-transform:uppercase;" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"  required="true">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Apellido:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="apellido_empleado" style="text-transform:uppercase;" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"  required="true">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Cédula:</label>
            <div class="col-sm-7">
              <input class="form-control" type="number" id="cedula_empleado" style="text-transform:uppercase;"  required="true">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Teléfono:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="telefono_empleado" style="text-transform:uppercase;" >
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Celular:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="celular_empleado" style="text-transform:uppercase;"  required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-7">
              <input class="form-control" type="email" id="email_empleado" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Cargo:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_cargo"  required>
                <?php getSelectCargo();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
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
            <label for="inputEmail3" class="col-sm-3 col-form-label">Territorial:</label>
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
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_Empleado">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>