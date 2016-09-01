<?php

require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);

$fecha = date('Y-m-d');

$sql = "INSERT INTO `detalle_fecha_confirmacion_oc`(`CODIGO_OC`,`CODIGO_USUARIO`,`FECHA_ANTIGUA`,`FECHA_CAMBIO`,`FECHA_NUEVA`,`ID_GRUPO`,`OBSERVACION`,`COMENTARIO`) VALUES ('" . $_POST['detalle']['codigo_oc'] . "', '" . $_POST['detalle']['codigo_usuario'] . "', '" . $_POST['detalle']['fecha_antigua'] . "', '" . $fecha . "', '" . $_POST['detalle']['fecha'] . "', '" . $_POST['detalle']['area'] . "', '" . $_POST['detalle']['observacion'] . "', '" . $_POST['detalle']['comentario'] . "') ";
$result = mysql_query($sql, $conn) or die(mysql_error());


	echo "<script language = javascript>
	alert('area -> " . $_POST['detalle']['area'] . " fecha nueva -> " . $_POST['detalle']['fecha'] . " comentario -> " . $_POST['detalle']['comentario'] . " observacion -> " . $_POST['detalle']['observacion'] . " oc -> " . $_POST['detalle']['codigo_oc'] . " usr -> " . $_POST['detalle']['codigo_usuario'] . " fecha_antigua -> " . $_POST['detalle']['fecha_antigua'] . " fecha_actual -> " . $fecha . "');
	self.location = 'ListadoDeCompras.php';
	</script>";

?>