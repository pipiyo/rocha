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


$DEPARTAMENTO= $_POST['departamento'];
$FECHA= $_POST['fecha'];
$CODIGO_PROYECTO = $_POST['rocha'];
$EMPLEADO = $_POST['empleado'];
$NVALE = $_POST['n_vale'];
$FECHA_T = $_POST['fecha_t'];
mysql_select_db($database_conn, $conn);






$sql =
"update vale_emision set FECHA_TERMINO = '".$FECHA_T."', EMPLEADO ='".$EMPLEADO."', DEPARTAMENTO = '".$DEPARTAMENTO."', FECHA = '".$FECHA."', CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'  WHERE COD_VALE = '".$NVALE."'";
$result = mysql_query($sql, $conn) or die(mysql_error());





$contador = 1;
while ($contador <= 25 )
{
$DESCRIPCION1 = $_POST['des'.$contador];
$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$CANTIDAD = $_POST['cans'.$contador];
$OBS = $_POST['obs'.$contador];
$CANTIDAD_ENTREGADA="";
$SOLICITADA="";
if (isset($_POST['idi'.$contador])) 
{
$ID = $_POST['idi'.$contador];
}
else
{
$ID = "";	
}

$query_registro = "SELECT * FROM producto_vale_emision where ID = '".$ID."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$CANTIDAD_ENTREGADA = $row["CANTIDAD_ENTREGADA"];
	$DIFERENCIA = $row["DIFERENCIA"];

  }





if($CODIGO_PRODUCTO != "")
{
if($ID == "")
{	
$sql01="INSERT INTO producto_vale_emision(CODIGO_VALE,CODIGO_PRODUCTO,CANTIDAD_SOLICITADA,OBSERVACIONES) VALUES('".$NVALE."','".$CODIGO_PRODUCTO."','".$CANTIDAD."','".($OBS)."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
}
else if ($CANTIDAD >= $CANTIDAD_ENTREGADA)
{
$DIFERENCIA1 = $CANTIDAD - $CANTIDAD_ENTREGADA;	

$sql01="UPDATE producto_vale_emision set OBSERVACIONES = '".$OBS."', CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."', CANTIDAD_SOLICITADA = '".$CANTIDAD."', DIFERENCIA = '".$DIFERENCIA1."' WHERE ID = '".$ID."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());	



}
}


$query_registro1 = "SELECT SUM(DIFERENCIA) AS DIF FROM 																																																																						producto_vale_emision WHERE CODIGO_VALE = '".$NVALE."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$DIFERENCIA_TOTAL = $row["DIF"];
  }


$sql =
"update vale_emision set DIFERENCIA_TOTAL = '".$DIFERENCIA_TOTAL."'  WHERE COD_VALE = '".$NVALE."'";
$result = mysql_query($sql, $conn) or die(mysql_error());










$contador++;
}

echo '<script language = javascript>
alert("Vale enviado")
self.location = "ListadoValeEmision.php"
</script>';

?>