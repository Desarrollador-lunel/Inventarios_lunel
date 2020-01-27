<?php
include dirname(__file__, 2) . '../modelo/usuario.php';
$usuario = new Usuario();
ini_set("session.cookie_lifetime","36000 * 24");

//Request: creacion de nuevo usuario
if (isset($_POST['create'])) {
    if ($usuario->getID($_POST['subscriber'])) {
        header('location: ../views/usuario/new.php?page=new&existe=true');
    } else {
        if ($usuario->newClient($_POST)) {
            if ($usuario->newUser($_POST)) {
                header('location: ../views/usuario/new.php?page=new&success=true');
            }
        } else {
            header('location: ../views/usuario/new.php?page=new&error=true');
        }
    }

}

//Request: editar usuario
if (isset($_POST['edit'])) {
    if ($usuario->setEditUser($_POST)) {
        header('location: ../index.php?page=edit&id=' . $_POST['id'] . '&success=true');
    } else {
        header('location: ../index.php?page=edit&id=' . $_POST['id'] . '&error=true');
    }
}

//Request: editar usuario
if (isset($_GET['delete'])) {
    if ($usuario->deleteUser($_GET['id'])) {
        // header('location: ../index.php?page=usuario&success=true');
        echo json_encode(["success" => true]);
    } else {
        // header('location: ../index.php?page=usuario&&error=true');
        echo json_encode(["error" => true]);
    }
}

//Request: Ingresar
if (isset($_POST['Ingresar'])) {
    if ($usuario->getUserById($_POST['username'])) {
        if ($usuario->getPass($_POST['username'], $_POST['passwd'])) {
            $datosUsuario = $usuario->getUserById($_POST['username']);
            session_start(); //Registra la sesion
            $_SESSION['id_usuario'] = $datosUsuario[0]["id_usuario"];
            //setcookie('id', $datosUsuario[0]["id_usuario"], time() + 365 * 24 * 60 * 60);
            header('location: ../vista/index.php');
        } else {
            header('location: ../vista/login/index.php?pass=false');
        }
    } else {
        header('location: ../vista/login/index.php?existe=false');
    }
}

function getTablaUsuario($permisos)
{
    $usuario = new Usuario();
            $listaUsuario = $usuario->getUsuario();
            if ($permisos[0]["consultar"]==1) {
            if (isset($listaUsuario)) {
            for ($i = 0; $i < sizeof($listaUsuario); $i++) {
                echo '<tr>';
                echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["nombres"] . '</td>';
                echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["nombre_cargo"] . '</td>';
                echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["nombre_usuario"] . '</td>';
                if ($permisos[0]["editar"]==1){
                echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-target="#modalUsuario" data-toggle="modal" name="btn_editar_usuario" data-id-Usuario="' . $listaUsuario[$i]["id_usuario"] . '"><i class="fas fa-pen-square"></i></button></td>';
                }  
                if ($permisos[0]["eliminar"]==1){ 
                 echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar_usuario" data-id-usuario="' .$listaUsuario[$i]["id_usuario"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
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

function getSelectPersona()
    {
        //Instancia del equipo
        $usuario = new Usuario();
        //Lista del menu Nivel 1
        $listaPersona = $usuario->getPersona();
        //Se recorre array de nivel 1
        if (isset($listaPersona)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaPersona); $i++) {
                //Valida si es el valor
                if ($valor == $listaPersona[$i]["id_persona"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaPersona[$i]["id_persona"] . '" ' . $seleccionado . '>' . utf8_encode($listaPersona[$i]["persona"]) . '</option>';
            }
        }
    }

function getSelectProyecto()
    {
        //Instancia del equipo
        $usuario = new Usuario();
        //Lista del menu Nivel 1
        $listaProyecto = $usuario->getProyecto();
        //Se recorre array de nivel 1
        if (isset($listaProyecto)) {
            echo '<option selected value="0">Seleccione</option>';
            for ($i = 0; $i < sizeof($listaProyecto); $i++) {
                //Valida si es el valor
                if ($valor == $listaProyecto[$i]["id_proyecto"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaProyecto[$i]["id_proyecto"] . '" ' . $seleccionado . '>' . utf8_encode($listaProyecto[$i]["nombre_proyecto"]) . '</option>';
            }
        }
    }

function getSelectTerritorial()
    {
        //Instancia del equipo
        $usuario = new Usuario();
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

function getSelectCargo()
    {
        //Instancia del equipo
        $usuario = new Usuario();
        //Lista del menu Nivel 1
        $listaCargo = $usuario->getCargo();
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

