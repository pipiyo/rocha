<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM servicio   WHERE CODIGO_SERVICIO LIKE '%".($nombreUsuario)."%'";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => ($row['NOMBRE_SERVICIO']),
                             "tptmfi" => $row['TPTMFI']);
        }                                    

        return $datos;
    }
}
