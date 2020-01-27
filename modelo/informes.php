<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Informes
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los proyectos
    public function getProyectos()
    {
        $query = "SELECT id_proyecto,nombre_proyecto FROM proyecto
                WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las territoriales
    public function getTerritoriales()
    {
        $query = "SELECT id_territorial,nombre_territorial FROM territorial
                WHERE estado=1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los estados del equipo
    public function getEstado()
    {
        $query = "SELECT id_estado_equipo,nombre_estado_equipo FROM estado_equipo
                WHERE estado=1
                ORDER BY nombre_estado_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los tipos de equipos
    public function getTipoEquipo()
    {
        $query = "SELECT * FROM tipo_equipo
                ORDER BY nombre_tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los modelos
    public function getModelo()
    {
        $query = "SELECT * FROM modelo
                ORDER BY nombre_modelo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las marcas
    public function getMarca()
    {
        $query = "SELECT * FROM marca
                ORDER BY nombre_marca";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los procesadores
    public function getProcesador()
    {
        $query = "SELECT * FROM procesador
                ORDER BY nombre_procesador";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae el inventario total
    public function getInventarioTotal($where)
    {
        $query = "SELECT *, CONCAT(nombres_persona,' ',apellidos_persona) AS persona FROM inventario
                INNER JOIN equipo ON equipo.id_equipo = inventario.fkID_equipo
                INNER JOIN tipo_equipo ON tipo_equipo.id_tipo_equipo = equipo.fkID_tipo_equipo
                INNER JOIN modelo ON modelo.id_modelo = equipo.fkID_modelo
                INNER JOIN marca ON marca.id_marca = equipo.fkID_marca
                INNER JOIN procesador ON procesador.id_procesador = equipo.fkID_procesador
                INNER JOIN persona ON persona.id_persona = inventario.fkID_persona_a_cargo
                INNER JOIN area ON area.id_area = persona.fkID_area
                INNER JOIN territorial ON territorial.id_territorial = persona.fkID_territorial
                INNER JOIN estado_equipo ON estado_equipo.id_estado_equipo = equipo.fkID_estado
                INNER JOIN proyecto ON proyecto.id_proyecto = persona.fkID_proyecto
                WHERE inventario.estado = 1" . $where;
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

}
