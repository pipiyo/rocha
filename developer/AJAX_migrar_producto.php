<?php

require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn); 

$PROEN = array();




if (empty($_POST['pro'])) {
	

echo "Selecione un producto";



}else{

$PRO = $_POST['pro'];


$sql = "SELECT * FROM producto2 WHERE producto2.CODIGO_PRODUCTO IN('".implode("','",$PRO)."')  ";
$result = mysql_query($sql, $conn) or die(mysql_error());
 while($row = mysql_fetch_assoc($result))
  {
	$PROEN[] = $row['CODIGO_PRODUCTO'];
  }
 mysql_free_result($result);

$PRO = array_diff($PRO, $PROEN);


if (empty($PRO)) {
	
echo "OK";


}else{



$sql = "CREATE TEMPORARY TABLE tablatemporalA SELECT * FROM producto WHERE producto.CODIGO_PRODUCTO IN('".implode("','",$PRO)."') ";
$result = mysql_query($sql, $conn) or die(mysql_error());
$sql = "INSERT INTO producto2 (producto2.CODIGO_PRODUCTO ,producto2.DESCRIPCION ,producto2.STOCK_ACTUAL ,producto2.STOCK_MINIMO ,producto2.FECHA_INGRESO ,producto2.PRECIO ,producto2.UNIDAD_DE_MEDIDA ,producto2.FORMATO ,producto2.GESTION ,producto2.DIMENSION ,producto2.RELACION ,producto2.CATEGORIA ,producto2.STOCK_MAXIMO ,producto2.PRECIO_SIN_DESCUENTO ,producto2.RUTA ,producto2.DESHABILITAR ,producto2.LARGO ,producto2.ANCHO ,producto2.ALTO ,producto2.RUTA1 ,producto2.RUTA2 ,producto2.M3)  SELECT tablatemporalA.CODIGO_PRODUCTO ,tablatemporalA.DESCRIPCION ,tablatemporalA.STOCK_ACTUAL ,tablatemporalA.STOCK_MINIMO ,tablatemporalA.FECHA_INGRESO ,tablatemporalA.PRECIO ,tablatemporalA.UNIDAD_DE_MEDIDA ,tablatemporalA.FORMATO ,tablatemporalA.GESTION ,tablatemporalA.DIMENSION ,tablatemporalA.RELACION ,tablatemporalA.CATEGORIA ,tablatemporalA.STOCK_MAXIMO ,tablatemporalA.PRECIO_SIN_DESCUENTO ,tablatemporalA.RUTA ,tablatemporalA.DESHABILITAR ,tablatemporalA.LARGO ,tablatemporalA.ANCHO ,tablatemporalA.ALTO ,tablatemporalA.RUTA1 ,tablatemporalA.RUTA2 ,tablatemporalA.M3 FROM tablatemporalA WHERE tablatemporalA.CODIGO_PRODUCTO IN('".implode("','",$PRO)."') ";
$result = mysql_query($sql, $conn) or die(mysql_error());
$sqle = "DROP TEMPORARY TABLE IF EXISTS tablatemporalA  ";
$resulte = mysql_query($sqle, $conn) or die(mysql_error());
echo "OK";


}




}



?>