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
                WHERE CODIGO_PRODUCTO LIKE '%".($nombreUsuario)."%'   and not termino = 'SI' and not TEMPORADA = '2' and not DESHABILITAR = '1' ORDER BY CODIGO_PRODUCTO LIMIT 50";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['CODIGO_PRODUCTO'],
			                 "cod" => $row['DESCRIPCION'],			                
							 "precio" => $row['PRECIO'],
							 "ud" => $row['UNIDAD_DE_MEDIDA'],	
							 "psd" => $row['PRECIO_SIN_DESCUENTO'],   		                
							 "stock" => $row['STOCK_ACTUAL']);
        }                                    

        return $datos;
    }
}
