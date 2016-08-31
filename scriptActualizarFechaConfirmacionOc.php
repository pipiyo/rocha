<?php

	echo "<script language = javascript>
	alert('area -> " . $_POST['detalle']['area'] . " fecha nueva -> " . $_POST['detalle']['fecha'] . " comentario -> " . $_POST['detalle']['comentario'] . " observacion -> " . $_POST['detalle']['observacion'] . " oc -> " . $_POST['detalle']['codigo_oc'] . " usr -> " . $_POST['detalle']['codigo_usuario'] . " fecha_antigua -> " . $_POST['detalle']['fecha_antigua'] . "');
	self.location = 'home.php';
	</script>";

?>