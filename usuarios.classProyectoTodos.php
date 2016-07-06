<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM proyecto where CODIGO_PROYECTO LIKE '%".($nombreUsuario)."%'  ORDER BY CODIGO_PROYECTO LIMIT 25";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("nombre" => $row['NOMBRE_CLIENTE'],
			                 "value" => $row['CODIGO_PROYECTO'],			                
							 "obra" => $row['OBRA'],			                
							 "monto" => $row['MONTO']);
        }                                    
        return $datos;
    }
}
