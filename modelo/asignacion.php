<?php 
include dirname(__file__, 2) . "/config/conexion.php"; 
/**
 *
 */
class Asignacion
{
    private $conn;
    private $link;
    public $consecutivo;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los usuario registrados
    public function getAsignacionl($permisoconsulta)
    {
        if ($permisoconsulta[0]["fkID_cargo"]==1) {
            $url="";
        } else {
            $url=" AND asignar.fkID_proyecto= '" . $permisoconsulta[0]['fkID_proyecto'] . "'";
        }
        $query  = "select asignar.*,(select COUNT(*) from asignacion_equipo WHERE asignacion_equipo.estado=1 and asignacion_equipo.fkID_asignación=id_asignar) as canti,nombre_proyecto FROM `asignar`
            INNER JOIN proyecto on id_proyecto = fkID_proyecto
            WHERE asignar.estado= 1 and proyecto.estado=1 and fkID_tipo_movimiento=1". $url;
                            $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los usuario registrados
    public function getAsignaciont($permisoconsulta)
    {
        if ($permisoconsulta[0]["fkID_cargo"]==1) {
            $url="";
        } else {
            $url=" AND asignar.fkID_proyecto= '" . $permisoconsulta[0]['fkID_proyecto'] . "'";
        }
        $query  = "select asignar.*,nombre_proyecto,nombre_territorial,direccion_territorial,serial_equipo,concat(nombres_persona,' ',apellidos_persona) as nombres FROM `asignar`
                INNER join equipo on id_equipo = asignar.fkID_equipo
                INNER JOIN proyecto on id_proyecto = fkID_proyecto
                INNER JOIN persona on id_persona = fkID_persona_recibe
                INNER join territorial on id_territorial = persona.fkID_territorial
                INNER JOIN territorial_proyecto on territorial_proyecto.fkID_territorial = id_territorial
                WHERE asignar.estado= 1 and fkID_tipo_movimiento=2". $url;
                            $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los usuario registrados
    public function getAsignacionf($permisoconsulta)
    {
        if ($permisoconsulta[0]["fkID_cargo"]==1) {
            $url="";
        } else {
            $url=" AND asignar.fkID_proyecto= '" . $permisoconsulta[0]['fkID_proyecto'] . "'";
        }
        $query  = "select DISTINCT asignar.*,nombre_proyecto,nombre_territorial,direccion_territorial,serial_equipo,concat(nombres_persona,' ',apellidos_persona) as nombre_entrega,(SELECT concat(nombres_persona,' ',apellidos_persona) from persona where id_persona= fkID_persona_recibe and asignar.estado= 1 and direccion_territorial = direccion_territorial ) as nombres_recibe,nombre_cargo,nombre_area FROM `asignar`
                INNER join equipo on id_equipo = asignar.fkID_equipo
                INNER JOIN proyecto on id_proyecto = fkID_proyecto
                INNER JOIN persona on id_persona = fkID_persona_entrega
                INNER join area on id_area = persona.fkID_area
                INNER join cargo on id_cargo = persona.fkID_cargo
                INNER join territorial on id_territorial = persona.fkID_territorial
                INNER JOIN territorial_proyecto on territorial_proyecto.fkID_proyecto = id_proyecto
                WHERE asignar.estado= 1 and fkID_tipo_movimiento=1". $url;
                            $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisosal($id_usuario,$id_modulo)
    {
        $query  = "select permisos.* FROM `permisos`
                    INNER JOIN persona on persona.fkID_cargo = permisos.fkID_cargo
                    INNER JOIN usuario on usuario.fkID_persona = persona.id_persona
                    WHERE usuario.id_usuario='" . $id_usuario . "' and fkID_modulo ='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisosat($id_usuario,$id_modulo)
    {
        $query  = "select permisos.* FROM `permisos`
                    INNER JOIN persona on persona.fkID_cargo = permisos.fkID_cargo
                    INNER JOIN usuario on usuario.fkID_persona = persona.id_persona
                    WHERE usuario.id_usuario='" . $id_usuario . "' and fkID_modulo ='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisosaf($id_usuario,$id_modulo)
    {
        $query  = "select permisos.* FROM `permisos`
                    INNER JOIN persona on persona.fkID_cargo = permisos.fkID_cargo
                    INNER JOIN usuario on usuario.fkID_persona = persona.id_persona
                    WHERE usuario.id_usuario='" . $id_usuario . "' and fkID_modulo ='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisosconsulta($id_usuario)
    {
        $query  = "select fkID_cargo,fkID_proyecto FROM `persona`
                    INNER JOIN usuario on usuario.fkID_persona = persona.id_persona
                    WHERE usuario.id_usuario='" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los datos para el acta
    public function getConsultapersonas_acta($id_asignacion)
    {
        $query  = "select id_asignar,consecutivo_asignar,nombre_proyecto,observacion,YEAR(fecha_asignacion) as anio,MONTH(fecha_asignacion) as MES,DAY(fecha_asignacion) as dia,concat(nombres_persona,' ',apellidos_persona) as nombre_entrega,(SELECT concat(nombres_persona,' ',apellidos_persona) from persona where id_persona= fkID_persona_recibe and asignar.estado= 1 ) as nombres_recibe,(SELECT nombre_cargo from persona
            INNER JOIN cargo on id_cargo = persona.fkID_cargo where id_persona= fkID_persona_recibe and asignar.estado= 1 ) as cargo_recibe,(SELECT documento_persona from persona where id_persona= fkID_persona_recibe and asignar.estado= 1 ) as documento_recibe,nombre_cargo as cargo_entrega,documento_persona as documento_entrega FROM `asignar`
            INNER JOIN proyecto on id_proyecto = fkID_proyecto
            INNER JOIN persona on id_persona = fkID_persona_entrega
            INNER JOIN cargo on id_cargo = persona.fkID_cargo
            WHERE id_asignar='" . $id_asignacion . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los equipos para el acta
    public function getConsultaequipos_acta($id_asignacion)
    {
        $query  = "select asignacion_equipo.*,id_equipo,serial_equipo,nombre_tipo_equipo,nombre_modelo,nombre_marca FROM `asignacion_equipo` 
            INNER JOIN equipo on id_equipo = fkid_equipo
            INNER JOIN tipo_equipo on id_tipo_equipo = fkid_tipo_equipo
            INNER JOIN modelo on id_modelo = fkid_modelo
            INNER JOIN marca on id_marca = fkid_marca
            WHERE asignacion_equipo.estado=1 and fkID_asignación='" . $id_asignacion . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida que el serial exista
    public function validacionserial($serial)
    {
        $query  = "select id_equipo, COUNT(*) as canti FROM `equipo` WHERE estado =1 and serial_equipo ='" . $serial . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida que el serial no este asignado
    public function validacionserialasignado($serial)
    {
        $query  = "select COUNT(*) as cantidad FROM `equipo`
                    INNER JOIN asignacion_equipo on fkID_equipo=id_equipo
                    WHERE asignacion_equipo.estado =1 and fkID_equipo='" . $serial . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida si la asignacion tiene equipos asignados 
    public function validacionasignacion($fkID_asignacion)
    {
        $query  = "select COUNT(*) as contador FROM `asignacion_equipo` WHERE estado=1 and fkID_asignación='" . $fkID_asignacion . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Eliminar asignación
    public function eliminarasignacion($fkID_asignacion)
    {
        $query  = "delete FROM `asignar` WHERE id_asignar='" . $fkID_asignacion . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validacionultimaasignacion()
    {
        $query  = "select MAX(id_asignar) AS id FROM asignar where estado=1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo empleado
    public function insertaEquipoasignacion($fkID_equipo,$fkID_asignacion)
    {   
        $query  = "insert into `asignacion_equipo`(`fkID_asignación`, `fkID_equipo`) VALUES ('" . $fkID_asignacion."', '" . $fkID_equipo. "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Inserta en historico
    public function insertaHistorico($fkID_equipo,$fkID_persona_entrega,$fkID_persona_recibe,$fkID_asignacion,$fecha_asignacion)
    {
        $movimiento = $this->getConsultar_consecutivo($fkID_asignacion);
        $consecutivo = $movimiento[0]["consecutivo_asignar"] ;
        
        $query  = "INSERT INTO historico_equipo (fkID_equipo,fkID_persona_entrega,fkID_persona_recibe,fecha_historico_equipo,fkID_tipo_movimiento,conse_historico_equipo,obs_historico_equipo) VALUES ('" . $fkID_equipo . "','" . $fkID_persona_entrega . "','" . $fkID_persona_recibe . "','" . $fecha_asignacion . "','1','" . $consecutivo . "','ASIGNACIÓN POR LOTE DEL EQUIPO')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Crea una nueva territorial 
    public function insertaasignacionl($fecha_asignacion,$fkID_tipo_movimiento,$fkID_persona_entrega,$fkID_persona_recibe,$fkID_proyecto,$observacion)
    {   
        $movimiento = $this->getConsecutivo(1);
        //Armar el consecutivo
        $contador    = $movimiento[0]["conse_tipo_movimiento"] + 1;
        $consecutivo = $movimiento[0]["inicial_tipo_movimiento"] . '-' . $contador;
        //Suma 1 al tipo de movimiento
        $this->sumaConsecutivo($contador, 1);
        $query  = "insert into `asignar`(`consecutivo_asignar`, `fecha_asignacion`, `fkID_tipo_movimiento`, `fkID_persona_entrega`, `fkID_persona_recibe`, `fkID_proyecto`, `observacion`) VALUES ('" . $consecutivo."','" . strtoupper($fecha_asignacion) ."','" . $fkID_tipo_movimiento ."','" . $fkID_persona_entrega ."','" . $fkID_persona_recibe ."','" . $fkID_proyecto ."','" . $observacion ."')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Arma el consecutivo
    public function getConsecutivo($fkID_tipo_movimiento)
    {
        $query  = "SELECT * FROM `tipo_movimiento` WHERE id_tipo_movimiento =  '" . $fkID_tipo_movimiento . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Suma 1 al consecutivo
    public function sumaConsecutivo($valor, $id_tipo_movimiento)
    {
        $query  = "UPDATE tipo_movimiento SET conse_tipo_movimiento = '" . $valor . "' WHERE id_tipo_movimiento = '" . $id_tipo_movimiento . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar consecutivo
    public function getConsultar_consecutivo($fkID_asignacion)
    {
        $query  = "select id_asignar,consecutivo_asignar FROM `asignar` WHERE id_asignar ='" . $fkID_asignacion . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todas los empleados
    public function getPersona($fkID_proyecto)
    {
        $query  = "select id_persona, CONCAT(documento_persona,' - ',  nombres_persona,' ', apellidos_persona) As persona FROM `persona` WHERE estado=1 and fkID_cargo=2 and fkID_proyecto='". $fkID_proyecto . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los proyectos
    public function getProyecto()
    {
        $query  = "select * FROM `proyecto` WHERE estado=1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las territoriales
    public function getTipoequipo()
    {
        $query  = "select * FROM `tipo_equipo` WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las territoriales
    public function getSerial()
    {
        $query  = "select id_equipo,serial_equipo FROM `equipo` WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    public function getTerritoriales()
    {
        $query  = "select id_territorial,nombre_territorial FROM territorial
                    WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los cargos
    public function getCargo()
    {
        $query  = "select * FROM `cargo` WHERE estado=1 AND id_cargo=1 or id_cargo=2 or id_cargo=3";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Empleado
    public function editaEmpleado($data)
    {
        
        $query  = "UPDATE `persona` SET `nombres_persona` = '" . strtoupper($data['nombres_persona']) . "', `apellidos_persona`= '" . strtoupper($data['apellidos_persona']) . "',`documento_persona`= '" . $data['documento_persona'] . "',`telefono_persona`= '" . strtoupper($data['telefono_persona']) . "',`celular_persona`= '" . $data['celular_persona'] . "',`email_persona`= '" . $data['email_persona'] . "',`fkID_proyecto`= '" . $data['fkID_proyecto'] . "',`fkID_cargo`= '" . $data['fkID_cargo'] ."',`fkID_territorial`= '" . $data['fkID_territorial'] . "' WHERE id_persona = '" . $data['id_persona'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un empleado
    public function eliminaLogicoEmpleado($data)
    {
        $query  = "UPDATE persona SET estado = 2 WHERE id_persona = '" . $data['id_empleado'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Traer empleado registrado
    public function consultaEmpleado($data)
    {
        $query  = "select * FROM `persona`
                    WHERE id_persona = '" . $data['id_empleado'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida la territorial
    public function validaTerritorial($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `territorial` WHERE nombre_territorial =  '" . $data['nombre_territorial'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea una nueva territorial
    public function creaTerritorial($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_territorial']);
        $query  = "INSERT INTO territorial (nombre_territorial) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de territorial
    public function ultimaTerritorial()
    {
        $query  = "SELECT id_territorial,nombre_territorial FROM `territorial` ORDER BY `territorial`.`id_territorial` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae el empleado por ID
    public function getEmpleadoID($id_empleado)
    {
        $query = "select persona.*,nombre_proyecto,nombre_territorial,direccion_territorial FROM `persona`
                    INNER JOIN proyecto on id_proyecto = fkID_proyecto
                    INNER JOIN territorial on id_territorial = fkID_territorial
                    INNER JOIN territorial_proyecto on territorial_proyecto.fkID_proyecto = id_proyecto
                    WHERE id_persona='" . $id_empleado . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

}