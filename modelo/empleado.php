<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Empleado
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los usuario registrados
    public function getEmpleado($permisoconsulta)
    {
        if ($permisoconsulta[0]["fkID_cargo"]==1) {
            $url="";
        } else {
            $url=" AND persona.fkID_proyecto= '" . $permisoconsulta[0]['fkID_proyecto'] . "'";
        }
        $query  = "select persona.id_persona,persona.nombres_persona,persona.apellidos_persona,proyecto.nombre_proyecto,cargo.nombre_cargo,territorial.nombre_territorial, persona.fkID_proyecto FROM `persona`
        INNER JOIN cargo on cargo.id_cargo = persona.fkID_cargo
        INNER JOIN territorial on territorial.id_territorial = persona.fkID_territorial
        INNER JOIN proyecto on proyecto.id_proyecto = persona.fkID_proyecto
        WHERE persona.estado = 1  and (cargo.id_cargo = 2 OR cargo.id_cargo = 3)". $url;
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisos($id_usuario,$id_modulo)
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
        
        $query  = "update `persona` SET nombres_persona = '" . $data['nombres_persona'] . "', `apellidos_persona`= '" . $data['apellidos_persona'] . "'`documento_persona`= '" . $data['documento_persona'] . "'`telefono_persona`= '" . $data['telefono_persona'] . "'`celular_persona`= '" . $data['celular_persona'] . "'`email_persona`= '" . $data['email_persona'] . "'`fkID_proyecto`= '" . $data['fkID_proyecto'] . "'`fkID_cargo`= '" . $data['fkID_cargo'] ."'`fkID_territorial`= '" . $data['fkID_territorial'] . "' WHERE id_persona = '" . $data['id_persona'] . "'";
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

}