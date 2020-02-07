<?php
include dirname(__file__, 2) . '/modelo/empleado.php';

$empleado = new Empleado();
$tipo=isset($_GET['tipo'])?$_GET['tipo']:""; 


if ($tipo == 'inserta') {
    if ($empleado->insertaEmpleado($_GET)) {  
        echo $r='1';
    } else {
        echo $r='0';
    }
};


if ($tipo == 'inserta_proyecto') {
    if ($empleado->insertaProyecto($_GET)) {  
        $resultado = $empleado->consultaidProyecto($_GET);
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
    if ($empleado->insertaTerritorial($_GET)) {  
        echo $r='1';
    } else {
        echo $r='0';
    }
};

if ($tipo == 'consulta') {
    $resultado = $empleado->consultaEmpleado($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'consultaterritorial') {
    $resultado = $empleado->getTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'consultaproyectos') {
    $resultado = $empleado->getProyecto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'edita') {
    if ($empleado->editaEmpleado($_GET)) {
        echo $r="1";
    } else {
        echo $r="0";
    }
};

if ($tipo == 'elimina_logico') {
    if ($empleado->eliminaLogicoEmpleado($_GET)) {
        return '1';
    } else {
        return '0';
    }
};

if ($tipo == 'valida_territorial') {
    $resultado = $empleado->validaTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_territorial') {
    if ($empleado->creaTerritorial($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_territorial') {
    $resultado = $empleado->ultimaTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}  

