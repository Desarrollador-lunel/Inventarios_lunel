<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Usuario
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los proyectos registrados
    public function getProyecto($permisoconsulta)
    {
       
        $query  = "select proyecto.*,(select count(*) FROM asignar 
            WHERE asignar.fkID_tipo_movimiento=1 and id_proyecto=asignar.fkID_proyecto) as cantidad FROM `proyecto` WHERE estado=1";
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

    //Crea un nuevo proyecto
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

    //Inserta las territoriales del proyecto
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

    //Edita proyecto
    public function editaProyecto($data)
    {
        if ($data['pass_usuario']===$data['pass_antiguo']) {
            $r="";
        } else {
            $r=",pass_usuario = sha1('" . $data['pass_usuario'] . "')";
        }
        
        $query  = "UPDATE usuario SET nombre_usuario = '" . $data['nombre_usuario'] . "' $r WHERE id_usuario = '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }


    //Elimina logico un proyecto
    public function eliminaLogicoProyecto($data)
    {
        $query  = "UPDATE `proyecto` SET estado = 2 WHERE id_proyecto = '" . $data['id_proyecto'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }



}