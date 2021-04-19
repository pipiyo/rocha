<?php

require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);

$fecha = date('Y-m-d');

$sql_oc = "UPDATE `orden_de_compra` SET `FECHA_CONFIRMACION` = '" . $_POST['detalle']['fecha'] . "' WHERE `CODIGO_OC` = '" . $_POST['detalle']['codigo_oc'] . "' ";
$result_oc = mysql_query($sql_oc, $conn) or die(mysql_error());


$sql = "INSERT INTO `detalle_fecha_confirmacion_oc`(`CODIGO_OC`,`CODIGO_USUARIO`,`FECHA_ANTIGUA`,`FECHA_CAMBIO`,`FECHA_NUEVA`,`ID_GRUPO`,`OBSERVACION`,`COMENTARIO`) VALUES ('" . $_POST['detalle']['codigo_oc'] . "', '" . $_POST['detalle']['codigo_usuario'] . "', '" . $_POST['detalle']['fecha_antigua'] . "', '" . $fecha . "', '" . $_POST['detalle']['fecha'] . "', '" . $_POST['detalle']['area'] . "', '" . $_POST['detalle']['observacion'] . "', '" . $_POST['detalle']['comentario'] . "') ";
$result = mysql_query($sql, $conn) or die(mysql_error());

	echo "<script language = javascript>
	alert('Fecha de Confirmacion Editada con exito. =)');
	self.location = 'ListadoDeCompras.php';
	</script>";

?>