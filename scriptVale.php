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
$sql = "INSERT INTO vale_emision (EMPLEADO,DEPARTAMENTO,FECHA,CODIGO_PROYECTO,CODIGO_USUARIO,ESTADO,FECHA_REALIZACION,FECHA_TERMINO) VALUES ('".$EMPLEADO."','".$DEPARTAMENTO."','".$FECHA."','".$CODIGO_PROYECTO."','".$CODIGO_USUARIO."','PENDIENTE','".$FECHA_REALIZACION."','".$FECHA_T."')";
$result = mysql_query($sql, $conn) or die(mysql_error());

$sql1 = "SELECT * FROM vale_emision ORDER BY COD_VALE DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$NVALE = $row["COD_VALE"];
  }
mysql_free_result($result2);

$contador = 1;
while ($contador <= 25 )
{
$DESCRIPCION1 = $_POST['des'.$contador];


$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$CANTIDAD = $_POST['cant'.$contador];
$OBS = $_POST['obs'.$contador];
if($CODIGO_PRODUCTO != "")
{
$sql01="INSERT INTO producto_vale_emision(CODIGO_VALE,CODIGO_PRODUCTO,CANTIDAD_SOLICITADA,OBSERVACIONES) VALUES('".($NVALE)."','".$CODIGO_PRODUCTO."','".$CANTIDAD."','".($OBS)."')";
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