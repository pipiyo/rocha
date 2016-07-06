<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM vale_emision WHERE COD_VALE LIKE '%".($nombreUsuario)."%' LIMIT 25";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => ($row['COD_VALE']),
                             "cod" => $row['COD_VALE']);
        }                                    

        return $datos;
    }
}
