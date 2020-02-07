<?php
include dirname(__file__, 2) . '/modelo/usuario.php';

$usuario = new Usuario();
$tipo=isset($_GET['tipo'])?$_GET['tipo']:""; 


if ($tipo == 'inserta') {
    if ($usuario->insertaUsuario($_GET)) {  
        echo $r='1';
    } else {
        echo $r='0';
    }
};

if ($tipo == 'inserta_empleado') {
    if ($usuario->insertaEmpleado($_GET)) {  
        echo $r='1';
    } else {
        echo $r='0';
    }
};

if ($tipo == 'inserta_proyecto') {
    if ($usuario->insertaProyecto($_GET)) {  
        $resultado = $usuario->consultaidProyecto($_GET);
            if ($resultado) {
                echo json_encode($resultado); //imprime el json
            } else {
                return 'No se consulto';
            }
    } else {
        echo $r='0';
    }
};

if ($tipo == 'agregar_territorial') {
    if ($usuario->insertaTerritorial($_GET)) {  
        echo $r='1';
    } else {
        echo $r='0';
    }
};

if ($tipo == 'consulta') {
    $resultado = $usuario->consultaUsuario($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'consultadatos') {
    $resultado = $usuario->consultaDatosUsuario($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'ultimo_empleado') {
    $resultado = $usuario->ultimoEmpleado($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'consultaterritorial') {
    $resultado = $usuario->getTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'consultaproyectos') {
    $resultado = $usuario->getProyecto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'edita') {
    if ($usuario->editaUsuario($_GET)) {
        echo $r='1';
    } else {
        echo $r='0';
    }
};

if ($tipo == 'elimina_logico') {
    if ($usuario->eliminaLogicoUsuario($_GET)) {
        return '1';
    } else {
        return '0';
    }
};

if ($tipo == 'buscar_usuario') {
    $resultado = $usuario->getBuscar_usuario($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};


if ($tipo == 'cerrar_sesion') {
    session_start();
    session_destroy();
    echo "si";
};

if ($tipo == 'valida_territorial') {
    $resultado = $usuario->validaTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_territorial') {
    if ($usuario->creaTerritorial($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_territorial') {
    $resultado = $usuario->ultimaTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
