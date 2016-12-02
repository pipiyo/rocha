<?php
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn);

 $datos = array();

        $sql = "SELECT DISTINCT NOMBRE_PROYECTO FROM proyecto
                WHERE NOMBRE_PROYECTO LIKE '%".($_GET['term'])."%' and estado = 'EN PROCESO' limit 15";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => ($row['NOMBRE_PROYECTO']));
        }     

echo json_encode($datos);
?>