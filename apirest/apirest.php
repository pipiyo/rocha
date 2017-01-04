<?php
include("../Conexion/Conexionpoo.php");

$user = array();
$PASSBD = "";


			$con = new mysqli("localhost",
							  "root",
							  "Rocha13",
							  "mueblesydise");
			$con->set_charset("utf8");

				$colores = $con->query(" SELECT empleado.RUT, empleado.NOMBRES, empleado.APELLIDO_PATERNO, empleado.APELLIDO_MATERNO, empleado.DIRECCION, empleado.TELEFONO, empleado.CELULAR, empleado.EMAIL, empleado.DEPARTAMENTO, empleado.COMUNA, empleado.NACIONALIDAD, empleado.CARGO, empleado.AREA, usuario.PASS, usuario.NOMBRE_USUARIO, usuario.TIPO_USUARIO 
					FROM usuario, empleado 
					WHERE usuario.NOMBRE_USUARIO = '".$_POST['user']."' AND empleado.RUT = usuario.RUT ");

				while($fila_c = $colores->fetch_assoc()){
			
					$PASSBD = $fila_c['PASS'];
					$user['name'] = $fila_c['NOMBRE_USUARIO'];
					$user['type'] = $fila_c['TIPO_USUARIO'];
					$user['password'] = $fila_c['PASS'];
					$user['employee']['name'] = $fila_c['NOMBRES'];
					$user['employee']['last_name'] = $fila_c['APELLIDO_PATERNO'];
					$user['employee']['second_name'] = $fila_c['APELLIDO_MATERNO'];
					$user['employee']['email'] = $fila_c['EMAIL'];
					$user['employee']['rut'] = $fila_c['RUT'];
					$user['employee']['phone'] = $fila_c['TELEFONO'];
					$user['employee']['mobile'] = $fila_c['CELULAR'];
					$user['employee']['department'] = $fila_c['DEPARTAMENTO'];
					$user['employee']['district'] = $fila_c['COMUNA'];
					$user['employee']['nationality'] = $fila_c['NACIONALIDAD'];
					$user['employee']['position'] = $fila_c['CARGO'];
					$user['employee']['address'] = $fila_c['DIRECCION'];

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