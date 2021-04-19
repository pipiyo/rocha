<?php 



require_once('Conexion/Conexion.php'); 
$cliente = $_POST['cliente'];
$rut = $_POST['rut'];
$obra = $_POST['obra'];
$direccion_obra = $_POST['direccion_obra'];
$oc = $_POST['oc'];
$condicion_pago = $_POST['condicion_pago'];
$validez = $_POST['validez'];
$puestos = $_POST['puestos'];
$condicion_pago = $_POST['condicion_pago'];
$departamento_credito = $_POST['departamento_credito'];
$director = $_POST['director'];
$disenador = $_POST['disenador'];
$contacto = $_POST['contacto'];
$fono = $_POST['fono'];
$mail = $_POST['mail'];
$validez = $_POST['validez'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$fecha_entrega = $_POST['fecha_entrega'];
$dias_radicado = $_POST['dias_radicado'];
$fecha_contacto = $_POST['fecha_contacto'];
$fecha_inicior = $_POST['fecha_inicior'];
$fecha_entregar = $_POST['fecha_entregar'];
$dias_rocha = $_POST['dias_rocha'];
$sub_total = $_POST['sub_total'];
$descuento = $_POST['descuento'];
$neto = $_POST['neto'];
$iva = $_POST['iva'];
$iva1 = $_POST['iva1'];
$total = $_POST['total'];
$codigo_radicado = $_POST['codigo_radicado'];
$fecha_contacto = $_POST['fecha_contacto'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$fecha_entrega = $_POST['fecha_entrega'];
$dias_radicado = $_POST['dias_radicado'];
$estado = $_POST['estado'];
$DESCUENTO2= $_POST['descuento2'];
$NETO2= $_POST['neto2'];

 $arreglo = Array(".",","); 
 $sub_total = str_replace($arreglo,"",$sub_total); 

 $arreglo = Array(","); 
 $sub_total = str_replace($arreglo,".",$sub_total); 

 $arreglo = Array("."); 
 $descuento  = str_replace($arreglo,"",$descuento ); 
 $arreglo = Array(","); 
 $descuento  = str_replace($arreglo,".",$descuento ); 

 $arreglo = Array(","); 
 $descuento  = str_replace($arreglo,".",$descuento ); 
///
 $arreglo = Array(".",","); 
 $neto = str_replace($arreglo,"",$neto); 

 $arreglo = Array(","); 
 $neto = str_replace($arreglo,".",$neto); 
  ///
 $arreglo = Array(".",","); 
 $iva = str_replace($arreglo,"",$iva); 

 $arreglo = Array(","); 
 $iva = str_replace($arreglo,".",$iva);
 ///

   $arreglo = Array(".",","); 
 $total = str_replace($arreglo,"",$total); 

 $arreglo = Array(","); 
 $total = str_replace($arreglo,".",$total); 

mysql_select_db($database_conn, $conn);


if($estado == 'VERSIONAR')
{

  if( substr($codigo_radicado, -2, 1) == '-' ) 
  {
$x = substr($codigo_radicado, -1);
$x = ++$x;
$codigo_radicado1 = substr($codigo_radicado, 0, -1).$x;
  }else{
$codigo_radicado1 = $codigo_radicado.'-B';
  };

$sql = "CREATE TEMPORARY TABLE tablatemporal SELECT * FROM radicado WHERE radicado.CODIGO_RADICADO = '".($codigo_radicado)."' ";
$result = mysql_query($sql, $conn) or die(mysql_error());
$sql = "UPDATE tablatemporal SET tablatemporal.CODIGO_RADICADO = '".$codigo_radicado1."' WHERE tablatemporal.CODIGO_RADICADO = '".($codigo_radicado)."' ";
$result = mysql_query($sql, $conn) or die(mysql_error());
$sql = "UPDATE radicado SET radicado.ESTADO = 'NULO' WHERE radicado.CODIGO_RADICADO = '".($codigo_radicado)."' ";
$result = mysql_query($sql, $conn) or die(mysql_error());
$sql = "UPDATE  servicio SET servicio.CODIGO_RADICADO = '".$codigo_radicado1."' WHERE servicio.CODIGO_RADICADO = '".($codigo_radicado)."' ";
$result = mysql_query($sql, $conn) or die(mysql_error());
$sql = "INSERT INTO radicado SELECT * FROM tablatemporal WHERE tablatemporal.CODIGO_RADICADO = '".($codigo_radicado1)."' ";
$result = mysql_query($sql, $conn) or die(mysql_error());
$sqle = "DROP TEMPORARY TABLE IF EXISTS tablatemporal  ";
$resulte = mysql_query($sqle, $conn) or die(mysql_error());
mysql_free_result($resulte);


header("Location: DescripcionRadicado.php?txt_codigo_proyecto2=".$codigo_radicado1."");


}else{

$sql = "  UPDATE radicado SET
DESCUENTO2 = '".($DESCUENTO2)."',MONTO2 = '".($NETO2)."', CLIENTE = '".($cliente)."',RUT_CLIENTE = '".($rut)."', OBRA = '".($obra). "', DIRECCION = '".($direccion_obra)."',OC = '" .($oc). "', 
CONDICION_PAGO = '".($condicion_pago)."', DEPARTAMENTO_CREDITO = '".($departamento_credito)."', EJECUTIVO = '".($director). "', 
DISENADOR = '".($disenador)."' , CONTACTO = '".($contacto)."', FONO = '".($fono). "', MAIL = '".($mail). "',VALIDEZ_COTIZACION = '".$validez."',PUESTOS = '".$puestos."',FECHA_INICIO_ROCHA = '".$fecha_inicior."',
FECHA_ENTREGA_ROCHA = '".$fecha_entregar."',DIAS_ROCHA = '".$dias_rocha."',SUB_TOTAL = '".$sub_total."',DESCUENTO = '".$descuento."',
NETO = '".$neto."',TIPO_IVA = '".$iva1."',IVA = '".$iva."',TOTAL = '".$total."',ESTADO = '".$estado."',
FECHA_INGRESO = '".$fecha_ingreso."',FECHA_ENTREGA = '".$fecha_entrega."',DIAS_RADICADO = '".$dias_radicado."',FECHA_CONTACTO = '".$fecha_contacto."' 
WHERE 
CODIGO_RADICADO = '".($codigo_radicado)."'  ";

$result = mysql_query($sql, $conn) or die(mysql_error());


header("Location: DescripcionRadicado.php?txt_codigo_proyecto2=".$codigo_radicado."");

};








?>