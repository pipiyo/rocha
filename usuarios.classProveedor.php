<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM proveedor
                WHERE RAZON_SOCIAL LIKE '%".($nombreUsuario)."%'  ORDER BY RAZON_SOCIAL LIMIT 10";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => ($row['NOMBRE_FANTASIA']),
                             "rut" => $row['RUT_PROVEEDOR'],
                             "direccion" => ($row['DIRECCION']),
                             "comuna" => ($row['COMUNA']),
                             "forma" => ($row['FORMA_PAGO']));
        }                                    

        return $datos;
    }
}
