<?php require_once('Conexion/Conexion.php'); ?>
<?php 

$CODIGO_ACTUALIZACIONES = $_GET['txt_codigo'];	
$OBSERVACIONES = $_GET['txt_observacion'];	 
$FECHA = $_GET['txt_fecha'];	
$AREA = $_GET['txt_area'];	
	$CODIGO_PROYECTO = $_GET['txt_codigo_proyecto'];	


mysql_select_db($database_conn, $conn);             
$sql = "UPDATE actualizaciones SET OBSERVACIONES= '".$OBSERVACIONES."',AREA= '".$AREA."' WHERE CODIGO_ACTUALIZACIONES = '".$CODIGO_ACTUALIZACIONES."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

header("Location: ProyectoObservacion.php?CODIGO_PROYECTO=".$CODIGO_PROYECTO."");

?>