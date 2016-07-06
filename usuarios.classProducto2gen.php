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
                WHERE DESCRIPCION LIKE '%".($nombreUsuario)."%' and not termino  = 'SI' and (FAMILIA = 'GENERICO' OR TEMPORADA = '0') ORDER BY DESCRIPCION LIMIT 25";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC))
	{
			
            $datos[] = array("cod" =>  $row['CODIGO_PRODUCTO'],
			                 "value" => $row['DESCRIPCION'],			                
							 "precio" => $row['PRECIO'],	
							 "ud" => $row['UNIDAD_DE_MEDIDA'],	
							 "psd" => $row['PRECIO_SIN_DESCUENTO'],                
							 "stock" => $row['STOCK_ACTUAL']);
							 
							 
			 
				 
        }                                    

        return $datos;
    }
}
