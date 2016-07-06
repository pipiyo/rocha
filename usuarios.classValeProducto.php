<?php
class Usuarios
{
    public function  __construct() {
       require_once('Conexion/Conexion.php');
		mysql_select_db($database_conn, $conn);
    }

    public function buscarUsuario($nombreUsuario,$test){
        $datos = array();

        $sql = "SELECT producto.DESCRIPCION,producto_vale_emision.CANTIDAD_UTILIZADA, producto_vale_emision.CODIGO_PRODUCTO,producto_vale_emision.CANTIDAD_SOLICITADA FROM producto_vale_emision, producto WHERE producto.CODIGO_PRODUCTO = producto_vale_emision.CODIGO_PRODUCTO AND producto_vale_emision.CODIGO_VALE = '".$test."'";
        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => ($row['CODIGO_PRODUCTO']),
                             "cod" => $row['CANTIDAD_SOLICITADA'] - $row['CANTIDAD_UTILIZADA'],
                            "codigo" => $row['DESCRIPCION'],
                             "sol" => $row['CANTIDAD_SOLICITADA'],
                             "uti" => $row['CANTIDAD_UTILIZADA'] );
        }                                    

        return $datos;
    }
}
