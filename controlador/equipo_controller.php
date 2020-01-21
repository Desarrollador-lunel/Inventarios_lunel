<?php
include dirname(__file__, 2) . '/modelo/equipo.php';

class equipoController extends equipo
{

    public function __construct()
    {
        # code...
    }

    //Trae los tipos de equipo
    public function getSelectTipoEquipo($valor)
    {
        //Instancia del equipo
        $equipo = new equipo();
        //Lista del menu Nivel 1
        $listaTipoEquipo = $equipo->getTipoEquipo();
        //Se recorre array de nivel 1
        if (isset($listaTipoEquipo)) {
            echo '<option selected value="">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipoEquipo); $i++) {
                //Valida si es el valor
                if ($valor == $listaTipoEquipo[$i]["id_tipo_equipo"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTipoEquipo[$i]["id_tipo_equipo"] . '" ' . $seleccionado . '>' . utf8_encode($listaTipoEquipo[$i]["nombre_tipo_equipo"]) . '</option>';
            }
        }
    }

    //Trae los modelos
    public function getSelectModelo($valor)
    {
        //Instancia del equipo
        $equipo = new equipo();
        //Lista del menu Nivel 1
        $listaModelo = $equipo->getModelo();
        //Se recorre array de nivel 1
        if (isset($listaModelo)) {
            echo '<option selected value="">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaModelo); $i++) {
                //Valida si es el valor
                if ($valor == $listaModelo[$i]["id_modelo"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaModelo[$i]["id_modelo"] . '" ' . $seleccionado . '>' . utf8_encode($listaModelo[$i]["nombre_modelo"]) . '</option>';
            }
        }
    }

    //Trae las marcas
    public function getSelectMarca($valor)
    {
        //Instancia del equipo
        $equipo = new equipo();
        //Lista del menu Nivel 1
        $listaMarca = $equipo->getMarca();
        //Se recorre array de nivel 1
        if (isset($listaMarca)) {
            echo '<option selected value="">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaMarca); $i++) {
                //Valida si es el valor
                if ($valor == $listaMarca[$i]["id_marca"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaMarca[$i]["id_marca"] . '" ' . $seleccionado . '>' . utf8_encode($listaMarca[$i]["nombre_marca"]) . '</option>';
            }
        }
    }

    //Trae los procesadores
    public function getSelectProcesador($valor)
    {
        //Instancia del equipo
        $equipo = new equipo();
        //Lista del menu Nivel 1
        $listaProcesador = $equipo->getProcesador();
        //Se recorre array de nivel 1
        if (isset($listaProcesador)) {
            echo '<option selected value="">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaProcesador); $i++) {
                //Valida si es el valor
                if ($valor == $listaProcesador[$i]["id_procesador"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaProcesador[$i]["id_procesador"] . '" ' . $seleccionado . '>' . utf8_encode($listaProcesador[$i]["nombre_procesador"]) . '</option>';
            }
        }
    }

    //Tabla de equipos
    public function getTablaEquipos($permisos)
    {
        //Instancia del equipo
        $equipo = new equipo();
        //Lista del menu Nivel 1
        $listaEquipos = $equipo->getEquipos();
        //Se recorre array de nivel 1
        if (isset($listaEquipos)) {
            for ($i = 0; $i < sizeof($listaEquipos); $i++) {
                echo '<tr>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaEquipos[$i]["id_equipo"] . '">' . $listaEquipos[$i]["serial_equipo"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaEquipos[$i]["id_equipo"] . '">' . $listaEquipos[$i]["nombre_tipo_equipo"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaEquipos[$i]["id_equipo"] . '">' . $listaEquipos[$i]["nombre_modelo"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaEquipos[$i]["id_equipo"] . '">' . $listaEquipos[$i]["nombre_marca"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaEquipos[$i]["id_equipo"] . '">' . $listaEquipos[$i]["nombre_procesador"] . '</td>';
                echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaEquipos[$i]["id_equipo"] . '">' . $listaEquipos[$i]["nombre_estado_equipo"] . '</td>';
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '<td>';
                }
                if ($permisos[0]["editar"]==1) { 
                echo    '<button type="button" class="btn btn-warning" data-target="#modalEquipo" data-toggle="modal" name="btn_editar" data-id-equipo="' . $listaEquipos[$i]["id_equipo"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                }; 
                if ($permisos[0]["eliminar"]==1) {
                echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-equipo="' . $listaEquipos[$i]["id_equipo"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                }
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No existen equipos</td>';
            echo '</tr>';
        }
    }

    //Datos equipo
    public function getDatosEquipoID($id_equipo)
    {
        //Instancia del equipo
        $equipo = new equipo();
        //Lista del menu Nivel 1
        $listaEquipos = $equipo->getEquipoID($id_equipo);
        //Se recorre array de nivel 1
        if (isset($listaEquipos)) {
            return $listaEquipos;
        }
    }

    //Tabla historico
    public function getTablaHistorico($id_equipo)
    {
        //Instancia del equipo
        $equipo = new equipo();
        //Lista del menu Nivel 1
        $listaEquipos = $equipo->getHistoricoEquipo($id_equipo);
        //Se recorre array de nivel 1
        if (isset($listaEquipos)) {
            for ($i = 0; $i < sizeof($listaEquipos); $i++) {
                echo '<tr>';
                echo '<td>' . $listaEquipos[$i]["fecha_historico_equipo"] . '</td>';
                echo '<td>' . $listaEquipos[$i]["entrega"] . '</td>';
                echo '<td>' . $listaEquipos[$i]["recibe"] . '</td>';
                echo '<td>' . $listaEquipos[$i]["nombre_tipo_movimiento"] . '</td>';
                echo '<td>' . $listaEquipos[$i]["conse_historico_equipo"] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No existen equipos</td>';
            echo '</tr>';
        }
    }
}
