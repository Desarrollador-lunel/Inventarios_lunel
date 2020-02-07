<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Asignacion
{
    private $conn;
    private $link;

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
        $query  = "select *,COUNT(*) as canti,nombre_proyecto FROM `asignar`
                    INNER JOIN proyecto on id_proyecto = fkID_proyecto
                    WHERE asignar.estado= 1 and fkID_tipo_movimiento=1". $url;
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

    //Consulta el ultimo ID de empleado
    public function ultimoEmpleado()
    {
        $query  = "select id_persona,CONCAT(documento_persona,' - ',  nombres_persona,' ', apellidos_persona) As persona FROM `persona` ORDER BY `id_persona` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo empleado
    public function insertaEmpleado($data)
    {   
        $query  = "insert into `persona`(`nombres_persona`, `apellidos_persona`, `documento_persona`, `telefono_persona`, `celular_persona`, `email_persona`, `fkID_proyecto`, `fkID_territorial`, `fkID_cetap`, `fkID_cargo`, `fkID_area`, `fkID_tipo_persona`) VALUES ('" . strtoupper($data['nombres_persona']) . "','" . strtoupper($data['apellidos_persona']) ."', '" . strtoupper($data['documento_persona']) ."','" . strtoupper($data['telefono_persona']) ."','" . $data['celular_persona'] ."','" . strtoupper($data['email_persona']) ."','" . $data['fkID_proyecto'] ."','" . $data['fkID_territorial'] ."', 1 ,'" . $data['fkID_cargo'] ."',1,1)";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Crea un nuevo empleado
    public function insertaProyecto($data)
    {   
        $query  = "insert into `proyecto`(`nombre_proyecto`) VALUES ('" . strtoupper($data['nombre_proyecto'])."')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Crea una nueva territorial 
    public function insertaTerritorial($data)
    {   
        $query  = "insert into `territorial_proyecto`(`fkID_territorial`, `direccion_territorial`, `fkID_proyecto`) VALUES ('" . $data['fkID_territorial']."','" . strtoupper($data['direccion_territorial']) ."','" . $data['fkID_proyecto'] ."')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Traer un usuario registrados
    public function consultaidProyecto($data)
    {
        $query  = "select MAX(id_proyecto) AS id FROM proyecto where estado=1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todas los empleados
    public function getPersona()
    {
        $query  = "select id_persona, CONCAT(documento_persona,' - ',  nombres_persona,' ', apellidos_persona) As persona FROM `persona` WHERE estado=1 and fkID_cargo=1 OR fkID_cargo=2";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los proyectos
    public function getProyecto($data)
    {
        $query  = "select * FROM `proyecto` WHERE estado=1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las territoriales
    public function getTerritorial($data)
    {
        $query  = "select id_territorial,nombre_territorial FROM `territorial_proyecto` 
                    INNER join territorial on id_territorial=fkID_territorial
                    INNER JOIN proyecto on id_proyecto=fkID_proyecto
                    WHERE territorial_proyecto.estado=1 and id_proyecto= '" . $data['id_territorial'] . "'";
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