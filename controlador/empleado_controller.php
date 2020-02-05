<?php
include dirname(__file__, 2) . '../modelo/empleado.php';
$empleado = new Empleado();

function getTablaEmpleado($permisos,$permisoconsulta)
{
            $empleado = new Empleado();
            $listaEmpleado = $empleado->getEmpleado($permisoconsulta);
            if ($permisos[0]["consultar"]==1) { 
            if (isset($listaEmpleado)) {
            for ($i = 0; $i < sizeof($listaEmpleado); $i++) {
                echo '<tr>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-empleado="' . $listaEmpleado[$i]["id_persona"] . '">' . $listaEmpleado[$i]["nombres_persona"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-empleado="' . $listaEmpleado[$i]["id_persona"] . '">' . $listaEmpleado[$i]["apellidos_persona"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-empleado="' . $listaEmpleado[$i]["id_persona"] . '">' . $listaEmpleado[$i]["nombre_proyecto"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-empleado="' . $listaEmpleado[$i]["id_persona"] . '">' . $listaEmpleado[$i]["nombre_cargo"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-empleado="' . $listaEmpleado[$i]["id_persona"] . '">' . $listaEmpleado[$i]["nombre_territorial"] . '</td>';
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '<td class="text-center">';
                }
                if ($permisos[0]["editar"]==1) { 
                echo    '<button type="button" class="btn btn-warning" data-target="#modalEmpleado" data-toggle="modal" name="btn_editar" data-id-empleado="' . $listaEmpleado[$i]["id_persona"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                }; 
                if ($permisos[0]["eliminar"]==1) {
                echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-empleado="' . $listaEmpleado[$i]["id_persona"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                }
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No existen empleados</td>';
            echo '</tr>';
        }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
                    
}

function getSelectCargo()
    {
        //Instancia del equipo
        $empleado = new Empleado();
        //Lista del menu Nivel 1
        $listaCargo = $empleado->getCargo();
        //Se recorre array de nivel 1
        if (isset($listaCargo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaCargo); $i++) {
                //Valida si es el valor
                if ($valor == $listaCargo[$i]["id_cargo"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaCargo[$i]["id_cargo"] . '" ' . $seleccionado . '>' . $listaCargo[$i]["nombre_cargo"] . '</option>';
            }
        }
    }  
 