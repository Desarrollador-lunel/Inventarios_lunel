<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Equipo
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los equipos
    public function getEquipos()
    {
        $query = "SELECT * FROM equipo
                INNER JOIN tipo_equipo ON tipo_equipo.id_tipo_equipo = equipo.fkID_tipo_equipo
                INNER JOIN modelo ON modelo.id_modelo = equipo.fkID_modelo
                INNER JOIN marca ON marca.id_marca = equipo.fkID_marca
                INNER JOIN procesador ON procesador.id_procesador = equipo.fkID_procesador
                INNER JOIN estado_equipo ON estado_equipo.id_estado_equipo = equipo.fkID_estado
                WHERE equipo.estado = 1";
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

    //Crea un nuevo equipo
    public function insertaEquipo($data)
    {
        $query  = "INSERT INTO equipo (serial_equipo,fkID_tipo_equipo,fkID_modelo,fkID_marca,fkID_procesador, observaciones_equipo,fkID_estado) VALUES ('" . $data['serial_equipo'] . "', '" . $data['fkID_tipo_equipo'] . "', '" . $data['fkID_modelo'] . "', '" . $data['fkID_marca'] . "', '" . $data['fkID_procesador'] . "', '" . $data['observaciones_equipo'] . "','1')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar equipo
    public function consultaEquipo($data)
    {
        $query = "SELECT * FROM equipo
                WHERE id_equipo = '" . $data['id_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un equipo
    public function editaEquipo($data)
    {
        $query  = "UPDATE equipo SET serial_equipo = '" . $data['serial_equipo'] . "',fkID_tipo_equipo = '" . $data['fkID_tipo_equipo'] . "',fkID_modelo = '" . $data['fkID_modelo'] . "',fkID_marca = '" . $data['fkID_marca'] . "' ,fkID_procesador = '" . $data['fkID_procesador'] . "', observaciones_equipo = '" . $data['observaciones_equipo'] . "' WHERE id_equipo = '" . $data['id_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un equipo
    public function eliminaLogicoEquipo($data)
    {
        $query  = "UPDATE equipo SET estado = '2' WHERE id_equipo = '" . $data['id_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Inserta en inventario
    public function insertaInventario($data)
    {
        $query  = "INSERT INTO equipo (serial_equipo,fkID_tipo_equipo,fkID_modelo,fkID_marca,fkID_procesador, observaciones_equipo,fkID_estado) VALUES ('" . $data['serial_equipo'] . "', '" . $data['fkID_tipo_equipo'] . "', '" . $data['fkID_modelo'] . "', '" . $data['fkID_marca'] . "', '" . $data['fkID_procesador'] . "', '" . $data['observaciones_equipo'] . "','1')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
