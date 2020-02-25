<?php 
include dirname(__file__, 2) . '../modelo/asignacion.php';
$asignacion = new Asignacion();

function getTablaAsignacionl($permisos,$permisoconsulta)
{
            $asignacion = new Asignacion();
            $listaAsignacionl = $asignacion->getAsignacionl($permisoconsulta);
            if ($permisos[0]["consultar"]==1) { 
            if (isset($listaAsignacionl)) {
            for ($i = 0; $i < sizeof($listaAsignacionl); $i++) {
                echo '<tr>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignarl="' . $listaAsignacionl[$i]["id_asignar"] . '">' . $listaAsignacionl[$i]["fecha_asignacion"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignarl="' . $listaAsignacionl[$i]["id_asignar"] . '">' . $listaAsignacionl[$i]["nombre_proyecto"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignarl="' . $listaAsignacionl[$i]["id_asignar"] . '">' . $listaAsignacionl[$i]["canti"] . '</td>';
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '<td class="text-center">';
                }
                if ($permisos[0]["editar"]==1) { 
                echo    '<button type="button" class="btn btn-warning" data-target="#modalAsignarl" data-toggle="modal" name="btn_editar_asignarl" data-id-asignarl="' . $listaAsignacionl[$i]["id_asignar"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                }; 
                if ($permisos[0]["eliminar"]==1) {
                echo '<button type="button" class="btn btn-danger" name="btn_eliminar_asignarl" data-id-asignarl="' . $listaAsignacionl[$i]["id_asignar"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                }
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td class="text-center" colspan="9">No existen Asignaciones por lotes</td>';
            echo '</tr>';
        }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
                    
}

function getTablaAsignaciont($permisos,$permisoconsulta)
{
            $asignacion = new Asignacion();
            $listaAsignaciont = $asignacion->getAsignaciont($permisoconsulta);
            if ($permisos[0]["consultar"]==1) { 
            if (isset($listaAsignacionl)) {
            for ($i = 0; $i < sizeof($listaAsignaciont); $i++) {
                echo '<tr>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignaciont[$i]["id_asignar"] . '">' . $listaAsignaciont[$i]["fecha_asignacion"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignaciont[$i]["id_asignar"] . '">' . $listaAsignaciont[$i]["nombre_proyecto"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignaciont[$i]["id_asignar"] . '">' . $listaAsignaciont[$i]["nombre_territorial"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignaciont[$i]["id_asignar"] . '">' . $listaAsignaciont[$i]["direccion_territorial"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignaciont[$i]["id_asignar"] . '">' . $listaAsignaciont[$i]["serial_equipo"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignaciont[$i]["id_asignar"] . '">' . $listaAsignaciont[$i]["nombres"] . '</td>';
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '<td class="text-center">';
                }
                if ($permisos[0]["editar"]==1) { 
                echo    '<button type="button" class="btn btn-warning" data-target="#modalAsignart" data-toggle="modal" name="btn_editar_asignart" data-id-asignart="' . $listaAsignaciont[$i]["id_asignar"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                }; 
                if ($permisos[0]["eliminar"]==1) {
                echo '<button type="button" class="btn btn-danger" name="btn_eliminar_asignart" data-id-asignart="' . $listaAsignaciont[$i]["id_asignar"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                }
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td class="text-center" colspan="9">No existen Asignaciones a técnicos</td>';
            echo '</tr>';
        }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
                    
}

function getTablaAsignacionf($permisos,$permisoconsulta)
{
            $asignacion = new Asignacion();
            $listaAsignacionf = $asignacion->getAsignacionf($permisoconsulta);
            if ($permisos[0]["consultar"]==1) { 
            if (isset($listaAsignacionl)) {
            for ($i = 0; $i < sizeof($listaAsignacionf); $i++) {
                echo '<tr>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '">' . $listaAsignacionf[$i]["fecha_asignacion"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '">' . $listaAsignacionf[$i]["nombre_proyecto"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '">' . $listaAsignacionf[$i]["nombre_territorial"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '">' . $listaAsignacionf[$i]["serial_equipo"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '">' . $listaAsignacionf[$i]["nombre_entrega"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '">' . $listaAsignacionf[$i]["nombre_recibe"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '">' . $listaAsignacionf[$i]["nombre_area"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle text-center" name="btn_detalle" title="Click Ver Detalles" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '">' . $listaAsignacionf[$i]["nombre_cargo"] . '</td>';
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '<td class="text-center">';
                }
                if ($permisos[0]["editar"]==1) { 
                echo    '<button type="button" class="btn btn-warning" data-target="#modalAsignart" data-toggle="modal" name="btn_editar_asignart" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                }; 
                if ($permisos[0]["eliminar"]==1) {
                echo '<button type="button" class="btn btn-danger" name="btn_eliminar_asignart" data-id-asignart="' . $listaAsignacionf[$i]["id_asignar"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                }
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td class="text-center" colspan="9">No existen Asignaciones a funcionarios</td>';
            echo '</tr>';
        }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }                  
}

function getTiposEquipos()
    {
        //Instancia del equipo
        $asignarl = new Asignacion();
        //Lista del menu Nivel 1
        $listaTipoEquipo = $asignarl->getTipoequipo();
        //Se recorre array de nivel 1
        if (isset($listaTipoEquipo)) {
            for ($i = 0; $i < sizeof($listaTipoEquipo); $i++) {
                
                echo '<div class="col-sm-1">';
                echo '<input class="form-control" type="checkbox" id="checkboxasigl" name="checkboxasigl" value="' . $listaTipoEquipo[$i]["id_tipo_equipo"] . '">';
                echo '</div>';
                echo '<div class="col-sm-3">';
                echo' <label class="col-form-label">' . $listaTipoEquipo[$i]["nombre_tipo_equipo"] . '</label>';  
                echo '</div>';
            }
        }
    } 

function getTiposEquipos2()
    {
        //Instancia del equipo
        $asignarl = new Asignacion();
        //Lista del menu Nivel 1
        $listaTipoEquipo = $asignarl->getSerial();
        //Se recorre array de nivel 1
        if (isset($listaTipoEquipo)) {
            for ($i = 0; $i < sizeof($listaTipoEquipo); $i++) {
                
                echo '<div class="col-sm-2">';
                echo '<input class="form-control" type="checkbox" id="checkboxasigl" name="checkboxasigl" value="' . $listaTipoEquipo[$i]["id_equipo"] . '">';
                echo '</div>';
                echo '<div class="col-sm-4">';
                echo' <label class="col-form-label">' . $listaTipoEquipo[$i]["serial_equipo"] . '</label>';  
                echo '</div>';
            }
        }
    } 

function getSelectProyecto()
    {
        //Instancia del equipo
        $asignacion = new Asignacion();
        //Lista del menu Nivel 1
        $listaProyecto = $asignacion->getProyecto();
        //Se recorre array de nivel 1
        if (isset($listaProyecto)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaProyecto); $i++) {
                //Valida si es el valor
                echo '<option value="' . $listaProyecto[$i]["id_proyecto"] . '">' . utf8_encode($listaProyecto[$i]["nombre_proyecto"]) . '</option>';
            }
        }
    }

function getSelectPersona()
    {
        //Instancia del equipo
        $asignacion = new Asignacion();
        //Lista del menu Nivel 1
        $listaPersona = $asignacion->getPersona();
        //Se recorre array de nivel 1
        if (isset($listaPersona)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaPersona); $i++) {
                echo '<option value="' . $listaPersona[$i]["id_persona"] . '">' . utf8_encode($listaPersona[$i]["persona"]) . '</option>';
            }
        }
    }  


  
