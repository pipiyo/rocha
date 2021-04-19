<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];	
$DEPARTAMENTO= $_POST['departamento'];
$EMPLEADO = $_POST['empleado'];
$FECHA= $_POST['fecha'];
$FECHA_T= $_POST['fecha_t'];
$CODIGO_PROYECTO = $_POST['rocha'];
$FECHA_REALIZACION = date("Y-m-d");


mysql_select_db($database_conn, $conn);
$sql = "INSERT INTO vale_emision (CODIGO_SUBSERVICIO,EMPLEADO,DEPARTAMENTO,FECHA,CODIGO_PROYECTO,CODIGO_USUARIO,ESTADO,FECHA_REALIZACION,FECHA_TERMINO) VALUES ('".$CODIGO_SUBSERVICIO."','".$EMPLEADO."','".$DEPARTAMENTO."','".$FECHA."','".$CODIGO_PROYECTO."','".$CODIGO_USUARIO."','PENDIENTE','".$FECHA_REALIZACION."','".$FECHA_T."')";
$result = mysql_query($sql, $conn) or die(mysql_error());



$sql1 = "SELECT * FROM vale_emision ORDER BY COD_VALE DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$NVALE = $row["COD_VALE"];
  }
mysql_free_result($result2);

/* Sub Servicio */

for($i=0;$i<20;$i++){

	if($i == 0){
		$e = "";
	}else{
		$e = $i;
	}

	if(isset($_POST['rocha'.$e])){

		$sql1 = "SELECT MAX(CODIGO_SERVICIO) AS servicio FROM servicio WHERE NOMBRE_SERVICIO = 'Adquisiciones' AND CODIGO_PROYECTO = '".$_POST['rocha'.$e]."'";
		$result2 = mysql_query($sql1, $conn) or die(mysql_error());
		while($row = mysql_fetch_array($result2)){
			$servicio = $row["servicio"];
	 	}
		mysql_free_result($result2);

		if(empty($servicio)){
			$sql = "INSERT INTO servicio (DESCRIPCION,NOMBRE_SERVICIO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,ESTADO,CODIGO_USUARIO,CODIGO_PROYECTO,FECHA_REALIZACION) values ('Generado Vale','Adquisiciones','".$FECHA."','".$FECHA_T."','".$NOMBRE_USUARIO."','".$EMPLEADO."','En Proceso','".$CODIGO_USUARIO."','".$_POST['rocha'.$e]."','".$FECHA."')";
			$result = mysql_query($sql, $conn) or die(mysql_error());
		}

		$sql1 = "SELECT MAX(CODIGO_SERVICIO) AS servicio FROM servicio WHERE NOMBRE_SERVICIO = 'Adquisiciones' AND CODIGO_PROYECTO = '".$_POST['rocha'.$e]."'";
		$result2 = mysql_query($sql1, $conn) or die(mysql_error());
		while($row = mysql_fetch_array($result2)){
			$servicio = $row["servicio"];
	 	}
		mysql_free_result($result2);


		$sql = "INSERT INTO sub_servicio (SUB_CODIGO_SERVICIO,SUB_DESCRIPCION,SUB_NOMBRE_SERVICIO,SUB_FECHA_INICIO,SUB_FECHA_ENTREGA,SUB_REALIZADOR,SUB_SUPERVISOR,SUB_ESTADO,SUB_CODIGO_USUARIO,SUB_CODIGO_PROYECTO,SUB_FECHA_REALIZACION,SUB_TIPO_SERVICIO) values ('".$servicio."','Solicitud de vale ".$NVALE ."','Adquisiciones','".$FECHA."','".$FECHA_T."','".$NOMBRE_USUARIO."','".$EMPLEADO."','En Proceso','".$CODIGO_USUARIO."','".$_POST['rocha'.$e]."','".$FECHA."','vale')";
			$result = mysql_query($sql, $conn) or die(mysql_error());
	}
}

/* Sub servicio*/

$contador = 1;
while ($contador <= 25 )
{
$DESCRIPCION1 = $_POST['des'.$contador];


$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$CANTIDAD = $_POST['cant'.$contador];
$PRECIO = $_POST['prec'.$contador];
$OBS = $_POST['obs'.$contador];

$TOTAL = $PRECIO * $CANTIDAD;

if($CODIGO_PRODUCTO != "")
{
$sql01="INSERT INTO producto_vale_emision(CODIGO_VALE,CODIGO_PRODUCTO,CANTIDAD_SOLICITADA,OBSERVACIONES,PRECIO) VALUES('".($NVALE)."','".$CODIGO_PRODUCTO."','".$CANTIDAD."','".$OBS."','".$TOTAL."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
///////////////////////////////

}
$contador++;
}

echo '<script language = javascript>
alert("Vale enviado")
self.location = "valeemision.php"
</script>';

?>