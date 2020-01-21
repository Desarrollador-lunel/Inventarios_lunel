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

    //Trae todos los usuario registrados
    public function getUsuario()
    {
        $query  = "select *,CONCAT(nombres_persona, ' ', apellidos_persona) as nombres, nombre_cargo FROM usuario
                    INNER JOIN persona on persona.id_persona = usuario.fkID_persona
                    INNER JOIN cargo on cargo.id_cargo = persona.fkID_cargo
                    WHERE usuario.estado = 1 AND persona.estado = 1";
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

    //Trae la información del usuario logeado 
    public function getUsuariolog($id_usuario)
    {
        $query  = "select usuario.*,CONCAT(nombres_persona, ' ', apellidos_persona) as nombres,fkID_cargo,nombre_cargo FROM `usuario`
            INNER JOIN persona on persona.id_persona = usuario.fkID_persona
            INNER JOIN cargo on cargo.id_cargo = persona.fkID_cargo
            WHERE id_usuario = '" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae la información de ver modulo 
    public function getVermodulo($id_cargo,$id_modulo)
    {
        $query  = "select ver FROM `permisos` WHERE fkId_cargo='" . $id_cargo . "' and fkID_modulo='" . $id_modulo . "'" ;
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer un usuario registrados
    public function consultaUsuario($data)
    {
        $query  = "select *,CONCAT(nombres_persona, ' ', apellidos_persona) as nombres, nombre_cargo FROM usuario
                    INNER JOIN persona on persona.id_persona = usuario.fkID_persona
                    INNER JOIN cargo on cargo.id_cargo = persona.fkID_cargo
                    WHERE id_usuario = '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer datos del usuario 
    public function consultaDatosUsuario($data)
    {
        $query  = "select nombre_cargo, documento_persona as nombre_usuario, documento_persona as pass_usuario   FROM persona
                    INNER JOIN cargo on cargo.id_cargo = persona.fkID_cargo
                    WHERE id_persona = '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consulta el ultimo ID de tipo equipo
    public function ultimoEmpleado()
    {
        $query  = "select id_persona,CONCAT(documento_persona,' - ',  nombres_persona,' ', apellidos_persona) As persona FROM `persona` ORDER BY `id_persona` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo usuario
    public function insertaUsuario($data)
    {   
        $query  = "insert into `usuario`(`nombre_usuario`, `pass_usuario`, `fkID_persona`) VALUES ('" . $data['nombre_usuario'] . "',sha1( '" . $data['pass_usuario'] . "'), '" . $data['fkID_persona'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Crea un nuevo empleado
    public function insertaEmpleado($data)
    {   
        $query  = "insert into `persona`(`nombres_persona`, `apellidos_persona`, `documento_persona`, `telefono_persona`, `celular_persona`, `email_persona`, `fkID_proyecto`, `fkID_territorial`, `fkID_cetap`, `fkID_cargo`, `fkID_area`, `fkID_tipo_persona`) VALUES ('" . strtoupper($data['nombre_empleado']) . "','" . strtoupper($data['apellido_empleado']) ."', '" . strtoupper($data['cedula_empleado']) ."','" . strtoupper($data['telefono_empleado']) ."','" . $data['celular_empleado'] ."','" . strtoupper($data['email_empleado']) ."','" . $data['fkID_proyecto'] ."','" . $data['fkID_territorial'] ."', 1 ,'" . $data['fkID_cargo'] ."',1,1)";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
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

    //Edita Usuario
    public function editaUsuario($data)
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

    //Elimina logico un usuario
    public function eliminaLogicoUsuario($data)
    {
        $query  = "UPDATE usuario SET estado = 2 WHERE id_usuario = '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Obtiene el usuario por id
    public function getUserById($usuarioNombre = null)
    {
        if (!empty($usuarioNombre)) {
            $query  = "SELECT * FROM usuario WHERE nombre_usuario = '" . $usuarioNombre . "'";
            $result = mysqli_query($this->link, $query);
            $data   = array();
            while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        } else {
            return false;
        }
    }

    //Verifica contraseña
    public function getPass($usuarioNombre = null, $password = null)
    {
        if (!empty($usuarioNombre)) {
            if (!empty($password)) {
                $query  = "SELECT * FROM usuario WHERE nombre_usuario ='" . $usuarioNombre . "' AND pass_usuario=sha1('" . $password . "')";
                $result = mysqli_query($this->link, $query);
                $data   = array();
                while ($data[] = mysqli_fetch_assoc($result));
                array_pop($data);
                return $data;
            }
        } else {
            return false;
        }
    }

    //Obtiene el usuario por id
    public function getID($id = null)
    {
        if (!empty($id)) {
            $query  = "SELECT * FROM tb_client WHERE subscriber=" . $id;
            $result = mysqli_query($this->link, $query);
            $data   = array();
            while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        } else {
            return false;
        }
    }

    //Obtiene el usuario por id
    public function setEditUser($data)
    {
        if (!empty($data['id'])) {
            $query  = "UPDATE Usuario SET name='" . $data['name'] . "',last_name='" . $data['last_name'] . "', email='" . $data['email'] . "' WHERE id=" . $data['id'];
            $result = mysqli_query($this->link, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //Borra el usuario por id
    public function deleteUser($id = null)
    {
        if (!empty($id)) {
            $query  = "DELETE FROM Usuario WHERE id=" . $id;
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //Filtro de busqueda
    public function getUsuarioBySearch($data = null)
    {
        if (!empty($data)) {
            $query  = "SELECT * FROM Usuario WHERE name LIKE'%" . $data . "%' OR last_name LIKE'%" . $data . "%' OR email LIKE'%" . $data . "%'";
            $result = mysqli_query($this->link, $query);
            $data   = array();
            while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        } else {
            return false;
        }
    }

    //Envia mail
    public function enviarMail($email, $subject, $message)
    {
        if (mail($email, $subject, $message)) {
            return true;
        } else {
            return false;
        }
    }

    //Crea un nuevo cliente
    /*public function getLog($usuarioNombre)
{
$query  = "INSERT INTO tb_client (business_name,subscriber,department,municipality) VALUES ('" . $data['business_name'] . "','" . $data['subscriber'] . "','" . $data['department'] . "','" . $data['municipality'] . "')";
$result = mysqli_query($this->link, $query);
if (mysqli_affected_rows($this->link) > 0) {
return true;
} else {
return false;
}
}*/
}
