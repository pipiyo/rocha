<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();
                                            
        $sql = "SELECT * FROM comunas WHERE NOMBRE_COMUNA LIKE '%".($nombreUsuario)."%' ";
            

        $resultado = mysql_query($sql);

       while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("rut" => $row['NOMBRE_COMUNA'],
                             "value" => ($row['NOMBRE_COMUNA']),                           
                             "direccion" => $row['NOMBRE_COMUNA'],  
                             "contacto" => $row['NOMBRE_COMUNA'],   
                             "fono" => $row['NOMBRE_COMUNA'],    
                             "fono" => $row['NOMBRE_COMUNA'],                  
                             "comuna" => $row['NOMBRE_COMUNA']);
        }                                    

        return $datos;
        
    }
}
