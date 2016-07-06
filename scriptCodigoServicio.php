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
$contador = 1;

$NVALE = $_POST['n_vale'];
$DIFTOTAL = $_POST['diftot'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];	


$numero = 0;
$sql1 = "SELECT * from producto_vale_emision  where CODIGO_VALE = '".$NVALE ."'";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_OCU = $row["CODIGO_VALE"];
	$numero++;
  }
mysql_free_result($result2);

$sqldeleteser="delete from producto_vale_emision  where CODIGO_VALE = '".$NVALE ."'"; 
$resultdeleteser = mysql_query($sqldeleteser, $conn) or die(mysql_error());

$contador = 1;
while ($contador <= $numero )
{
$DESCRIPCION1 = $_POST['des'.$contador];
$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$CANTIDAD = $_POST['cans'.$contador];
$OBS = $_POST['obs'.$contador];
$CANE= $_POST['cane'.$contador];
$ENTR= $_POST['entr'.$contador];
$DIF= $_POST['dif'.$contador];
$SUMACA = $CANE + $ENTR;
if($CODIGO_PRODUCTO != "")
{
$sql01="INSERT INTO producto_vale_emision(CODIGO_VALE,CODIGO_PRODUCTO,CANTIDAD_SOLICITADA,OBSERVACIONES,CANTIDAD_ENTREGADA,DIFERENCIA) VALUES('".$NVALE."','".$CODIGO_PRODUCTO."','".$CANTIDAD."','".($OBS)."','".$SUMACA."','".($DIF)."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());

$sql1 = "SELECT * from producto  where CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO ."'";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$STOCK = $row["STOCK_ACTUAL"];
  }
  
  $FINAL = $STOCK - $CANE;
 $sql01="UPDATE PRODUCTO SET STOCK_ACTUAL = '".$FINAL."' WHERE CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO ."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());


mysql_select_db($database_conn, $conn);
$FECHA = date('Y/m/d');
$sql1 = "INSERT INTO actualizaciones (ROCHA,EGRESO,FECHA,USUARIO,NOMBRE_USUARIO) values ('".($COD)."','".($CANE)."','".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."')";
$result1 = mysql_query($sql1, $conn) or die(mysql_error());

$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_PRODUCTO) values ('".($CODIGO_A)."','".$CODIGO_PRODUCTO."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
$contador++;
}

echo '<script language = javascript>
alert("Vale enviado")
self.location = "ListadoValeEmision.php"
</script>';

?>