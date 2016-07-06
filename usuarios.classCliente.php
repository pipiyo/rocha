<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM cliente
                WHERE NOMBRE_CLIENTE LIKE '%".($nombreUsuario)."%' and ACTIVO != 'NO' ORDER BY NOMBRE_CLIENTE LIMIT 10";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("rut" => $row['RUT_CLIENTE'],
			                 "value" => ($row['NOMBRE_CLIENTE']),			                
							 "direccion" => $row['DIRECCION'],	
							 "contacto" => $row['CONTACTO1'],	
							 "fono" => $row['TELEFONO1'],	 
							 "fono" => $row['TELEFONO1'],	               
							 "comuna" => $row['COMUNA']);
        }                                    

        return $datos;
        
    }
}
