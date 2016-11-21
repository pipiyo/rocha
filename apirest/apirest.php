<?php
include("../Conexion/Conexionpoo.php");

$user = array();
$PASSBD = "";


			$con = new mysqli("localhost",
							  "root",
							  "",
							  "mueblesydise");
			$con->set_charset("utf8");

				$colores = $con->query("SELECT PASS, NOMBRE_USUARIO, TIPO_USUARIO FROM USUARIO WHERE NOMBRE_USUARIO='".$_POST['user']."'");

				while($fila_c = $colores->fetch_assoc()){
			
					$PASSBD = $fila_c["PASS"];
					$user['name'] = $fila_c['NOMBRE_USUARIO'];
					$user['type'] = $fila_c['TIPO_USUARIO'];

				}
				$colores->free();


if (crypt($_POST['pass'], $PASSBD) == $PASSBD || $PASSBD == $_POST['pass'])
{
	$user['on'] = true;
}else{
	$user['on'] = false;
}

echo json_encode($user);

?>