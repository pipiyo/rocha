<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);

$antiguo = $_GET["txt_antiguo"];
$nuevo = $_GET['txt_nuevo'];


$sql = "update producto set DESCRIPCION = replace(DESCRIPCION, '".($antiguo)."', '".($nuevo)."'),UNIDAD_DE_MEDIDA = replace(UNIDAD_DE_MEDIDA, '".($antiguo)."', '".($nuevo)."'),FORMATO = replace(FORMATO, '".($antiguo)."', '".($nuevo)."'),GESTION= replace(GESTION, '".($antiguo)."', '".($nuevo)."');";
$result = mysql_query($sql, $conn) or die(mysql_error());

header("Location: Producto.php");

?>