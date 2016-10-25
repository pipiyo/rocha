<?php
include("../Conexion/Conexionpoo.php");

$PASSBD = "";


			$con = new mysqli("localhost",
							  "root",
							  "",
							  "mueblesydise");
			$con->set_charset("utf8");

				$colores = $con->query("SELECT PASS FROM USUARIO WHERE NOMBRE_USUARIO='".$_POST['user']."'");

				while($fila_c = $colores->fetch_assoc()){
			
					$PASSBD = $fila_c["PASS"];

				}
				$colores->free();


$check = 0;

if (crypt($_POST['pass'], $PASSBD) == $PASSBD || $PASSBD == $_POST['pass'])
{
	$check = 1;
}

echo $check;

?>