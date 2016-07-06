<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM empleado
                WHERE NOMBRES LIKE '%".($nombreUsuario)."%' OR APELLIDO_PATERNO LIKE '%".($nombreUsuario)."%'  ORDER BY NOMBRES LIMIT 10";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("apellido_paterno" => $row['APELLIDO_PATERNO'],
			                 "value" => ($row['NOMBRES']. ' ' .
                                        $row['APELLIDO_PATERNO']. ' ' .
                                        $row['APELLIDO_MATERNO']),			                
							 "apellido_materno" => $row['APELLIDO_MATERNO'],			                
							 "rut" => $row['RUT']);
        }                                    

        return $datos;
    }
}
