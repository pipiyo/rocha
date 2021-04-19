<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM producto
                WHERE CODIGO_PRODUCTO LIKE '%".($nombreUsuario)."%' and FAMILIA = 'generico' and TEMPORADA = '2' and not DESHABILITAR = '1' ORDER BY DESCRIPCION LIMIT 25";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC))
	   {
			
            $datos[] = array("cod" =>  $row['DESCRIPCION'],
			                 "value" => $row['CODIGO_PRODUCTO'],			                
							 "precio" => $row['PRECIO'],	
							 "ud" => $row['COSTO'],	
							 "psd" => $row['PRECIO_LISTA_PRECIO'],                
							 "stock" => $row['CATEGORIA']);
        }                                    

        return $datos;
    }
}
