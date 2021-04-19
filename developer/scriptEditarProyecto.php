<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$CODIGO = $_GET['txt_codigo_proyecto'];	
$query_registro = "SELECT * FROM proyecto WHERE CODIGO_PROYECTO ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$numero++;
  }
mysql_free_result($result1);
  
if($numero != 0)
{
$NOMBRE_CLIENTE = $_GET['txt_nombre_cliente'];
$RUT_CLIENTE = $_GET['txt_rut_cliente'];
$OBRA = $_GET['txt_obra'];
$MONTO = $_GET['txt_monto'];
$EJECUTIVO = $_GET['txt_director'];
$FECHA_INGRESO = $_GET['txt_ingreso'];
$FECHA_ENTREGA = $_GET['txt_entrega'];
$CONTACTO = $_GET['txt_contacto_cliente'];
$TELEFONO = $_GET['txt_telefono_cliente'];
$DIAS = $_GET['txt_dias'];
$ORDEN = $_GET['txt_orden'];
$CONDICION_PAGO = $_GET['txt_condicion_pago'];
$TRANSPORTE = $_GET['txt_transporte'];
$DIRECCION_DESPACHO = $_GET['txt_direccion_despacho'];
$DIRECCION_FACTURACION = $_GET['txt_direccion_facturacion'];
$VALIDEZ = $_GET['txt_validez'];
$DEPARTAMENTO_CREDITO = $_GET['txt_departamento_credito'];
$ESTADO = $_GET['txt_estado'];
$PUESTOS = $_GET['txt_puestos'];

$numero =  $_GET['txt_monto']; 
$caracteres = Array(".",","); 
$resultado = str_replace($caracteres,"",$numero); 

mysql_select_db($database_conn, $conn);
$sql = "UPDATE proyecto SET CONDICION_PAGO = '".($CONDICION_PAGO)."', PUESTOS = '".($PUESTOS)."', DIRECCION_DESPACHO = '".($DIRECCION_DESPACHO)."', ESTADO = '".($ESTADO)."', NOMBRE_CLIENTE = '".($NOMBRE_CLIENTE)."',OBRA = '" .($OBRA). "', MONTO = '".($resultado)."', EJECUTIVO = '".($EJECUTIVO)."' , RUT_CLIENTE = '".($RUT_CLIENTE)."', FECHA_INGRESO = '".($FECHA_INGRESO)."', DIAS = '".($DIAS)."' WHERE CODIGO_PROYECTO = '".($CODIGO)."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

header("Location: proyectos.php?estado=EN&rangonegativo=3&rangopositivo=40");
}
else
{
echo '<script language = javascript>
alert("El codigo que ingreso no existe")
self.location = "proyectos.php?estado=EN&rangonegativo=3&rangopositivo=40"
</script>';
}



?>