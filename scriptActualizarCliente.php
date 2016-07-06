<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$RUT1 = $_GET["txt_rut1"];

$query_registro = "SELECT * FROM cliente WHERE RUT_CLIENTE ='".$RUT1."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$numero++;
  }
mysql_free_result($result1);
  
if($numero != 0)
{
	
$RUT = $_GET['txt_rut'];
$RUT1 = $_GET['txt_rut1'];
$NOMBRE = $_GET['txt_nombre'];
$DIRECCION = $_GET['txt_direccion'];
$COMUNA = $_GET['txt_comuna'];
$TELEFONO1 = $_GET['txt_telefono1'];
$TELEFONO2 = $_GET['txt_telefono2'];
$WEB = $_GET['txt_web'];
$CONTACTO1 = $_GET['txt_contacto1'];
$CONTACTO2 = $_GET['txt_contacto2'];
$CELULAR1 = $_GET['txt_celular1'];
$CELULAR2 = $_GET['txt_celular2'];
$FORMA = $_GET['txt_forma'];
$EJECUTIVO = $_GET['director'];
$GIRO = $_GET['txt_giro'];
$RAZON = $_GET['txt_razon'];

mysql_select_db($database_conn, $conn);
$sql = "UPDATE cliente SET RUT_CLIENTE = '".($RUT)."', NOMBRE_CLIENTE = '".($NOMBRE)."',DIRECCION = '".($DIRECCION)."', COMUNA = '".($COMUNA). "', TELEFONO1 = '".($TELEFONO1)."',TELEFONO2 = '" .($TELEFONO2). "', WEB = '".($WEB)."', CONTACTO1 = '".($CONTACTO1)."', CONTACTO2 = '".($CONTACTO2). "', CELULAR_CONTACTO1 = '".($CELULAR1)."' , CELULAR_CONTACTO2 = '".($CELULAR2)."', FORMA_PAGO = '".($FORMA). "', EJECUTIVO = '".($EJECUTIVO). "', RAZON_SOCIAL = '".$RAZON. "', GIRO = '".$GIRO. "'  WHERE RUT_CLIENTE = '".($RUT1)."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

$sql12 = "UPDATE proyecto SET NOMBRE_CLIENTE = '".($NOMBRE)."',DIRECCION_FACTURACION = '".($DIRECCION)."',RUT_CLIENTE = '".($RUT)."' WHERE RUT_CLIENTE = '".($RUT1)."'";
$result12 = mysql_query($sql12, $conn) or die(mysql_error());







echo '<script language = javascript>
alert("ok")
self.location = "Cliente.php"
</script>';

}
else
{
echo '<script language = javascript>
alert("El codigo que ingreso no existe")
self.location = "Cliente.php"
</script>';
}



?>