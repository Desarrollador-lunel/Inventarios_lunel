<?php
include dirname(__file__, 2) . '/modelo/equipo.php';

$equipo = new Equipo();
$tipo   = $_GET['tipo'];

if ($tipo == 'inserta') {
    if ($equipo->insertaEquipo($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $equipo->consultaEquipo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    if ($equipo->editaEquipo($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'elimina_logico') {
    if ($equipo->eliminaLogicoEquipo($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}
