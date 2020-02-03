<?php
include dirname(__file__, 2) . '../modelo/proyecto.php';
$proyecto = new Proyecto();


function getTablaProyecto($permisos,$permisoconsulta)
{
    $usuario = new Proyecto();
            $listaProyecto = $usuario->getProyecto($permisoconsulta);
            if ($permisos[0]["consultar"]==1) {
            if (isset($listaProyecto)) {
            for ($i = 0; $i < sizeof($listaProyecto); $i++) {
                echo '<tr>';
                echo '<td class="text-center" style="cursor: pointer">' . $listaProyecto[$i]["nombre_proyecto"] . '</td>';
                echo '<td class="text-center" style="cursor: pointer">' . $listaProyecto[$i]["cantidad"] . '</td>';
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '<td class="text-center">';
                }
                if ($permisos[0]["editar"]==1) { 
                echo    '<button type="button" class="btn btn-warning" data-target="#modalProyecto" data-toggle="modal" name="btn_editar" data-id-proyecto="' . $listaProyecto[$i]["id_proyecto"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                }; 
                if ($permisos[0]["eliminar"]==1) {
                echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-proyecto="' . $listaProyecto[$i]["id_proyecto"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                }
                if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    echo '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No existen usuarios</td>';
            echo '</tr>';
        }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
                    
}

function getSelectTerritorial()
    {
        //Instancia del equipo
        $usuario = new Proyecto();
        //Lista del menu Nivel 1
        $listaTerritorial = $usuario->getTerritoriales();
        //Se recorre array de nivel 1
        if (isset($listaTerritorial)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTerritorial); $i++) {
                //Valida si es el valor
                if ($valor == $listaTerritorial[$i]["id_territorial"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTerritorial[$i]["id_territorial"] . '" ' . $seleccionado . '>' . $listaTerritorial[$i]["nombre_territorial"] . '</option>';
            }
        }
    } 
 
