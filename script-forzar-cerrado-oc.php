<?php 
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn);

// $query_registro3 = "select oc_producto.ID, oc_producto.DIFERENCIA, oc_producto.CANTIDAD from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".$_POST['id_oc']."'";
// $result3 = mysql_query($query_registro3, $conn) or die(mysql_error());

// while($row = mysql_fetch_array($result3)){

// 	$diferencia = ($row["DIFERENCIA"] == "" || $row["DIFERENCIA"] == 0) ? $row["CANTIDAD"] : $row["DIFERENCIA"];
// 	$final = $row["CANTIDAD"] - $diferencia ;
// 	echo $row["CANTIDAD"] . " - " . $diferencia  . " = " . $final;
// 	$sql = "UPDATE oc_producto SET CANTIDAD = '".$final."' , DIFERENCIA = '0' WHERE ID = '".$row['ID']."'";
// 	$result = mysql_query($sql, $conn) or die(mysql_error());  
// }
// mysql_free_result($result3);

$sql = "UPDATE orden_de_compra SET DIFERENCIA_TOTAL= '0', ESTADO = 'OK' WHERE CODIGO_OC = '".$_POST['id_oc']."'";
$result = mysql_query($sql, $conn) or die(mysql_error()); 

mysql_close($conn);

echo '<script language = javascript>
alert("Oc Cerrada");
self.location = "ListadoDeCompras.php";
</script>';
?>