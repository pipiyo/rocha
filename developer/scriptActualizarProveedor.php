<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$RUT = $_GET["txt_rut"];	
$query_registro = "SELECT * FROM proveedor WHERE RUT_PROVEEDOR ='".$RUT."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$RUT = $row["RUT_PROVEEDOR"];
	$numero++;
  }
mysql_free_result($result1);
  
if($numero != 0)
{
	
$CODIGO = $_GET["txt_codigoProveedores"];
$RUT = $_GET['txt_rut'];
$NOMBRE = $_GET['txt_nombre'];
$RAZON = $_GET['txt_razon'];
$GIRO = $_GET['txt_giro'];
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
$CATEGORIA = $_GET['txt_categoria'];
$FAMILIA = $_GET['txt_familia'];
$ENTREGA = $_GET['txt_entrega'];

mysql_select_db($database_conn, $conn);
$sql = "UPDATE proveedor SET NOMBRE_FANTASIA = '".($NOMBRE)."',RAZON_SOCIAL = '" .($RAZON). "', GIRO = '".($GIRO)."', DIRECCION = '".($DIRECCION)."', COMUNA = '".($COMUNA). "', TELEFONO1 = '".($TELEFONO1)."',TELEFONO2 = '" .($TELEFONO2). "', WEB = '".($WEB)."', CONTACTO1 = '".($CONTACTO1)."', CONTACTO2 = '".($CONTACTO2). "', CELULAR_CONTACTO1 = '".($CELULAR1)."' , CELULAR_CONTACTO2 = '".($CELULAR2)."', FORMA_PAGO = '".($FORMA). "', CATEGORIA = '".($CATEGORIA)."', FAMILIA = '".($FAMILIA). "', ENTREGA = '".($ENTREGA)."' WHERE RUT_PROVEEDOR = '".($RUT)."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

header("Location: Proveedores.php");
}
else
{
echo '<script language = javascript>
alert("El codigo que ingreso no existe")
self.location = "Proveedores.php"
</script>';
}



?>