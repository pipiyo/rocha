<?php


require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn); 

$sql = " UPDATE producto2 SET ".$_POST['campo']." = '".$_POST['dato']."' WHERE CODIGO_PRODUCTO = '".$_POST['id']."'  ";

mysql_query($sql, $conn) or die(mysql_error());

?>