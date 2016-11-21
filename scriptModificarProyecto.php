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

mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
$CODIGO_RADICADO  = $_POST['codigo_radicado'];


$contador = "select * from proyecto where CODIGO_PROYECTO = '".$CODIGO_RADICADO."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());
$cuenta = 0;

 while($row = mysql_fetch_array($result1))
  {
	$CLIENTEP= $row["NOMBRE_CLIENTE"];
	$RUT_CLIENTEP = $row["RUT_CLIENTE"];
	$OBRAP = $row["OBRA"];
	$DIRECCION_OBRAP = $row["DIRECCION_FACTURACION"];
	$OCP = $row["ORDEN_CC"];
	$CONDICION_PAGOP = $row["CONDICION_PAGO"];
	$DEPARTAMENTO_CREDITOP = $row["DEPARTAMENTO_CREDITO"];
	$DIRECTORP = $row["EJECUTIVO"];
	$DISENADORP = $row["DISENADOR"];
	$CONTACTOP = $row["CONTACTO"];
	$FONOP = $row["FONO"];
	$MAILP = $row["MAIL"];
	$VALIDEZP = $row["VALIDEZ_COTIZACION"];
	$PUESTOSP = $row["PUESTOS"];
	$SUB_TOTALP = $row["SUB_TOTAL"];
	$DESCUENTOP = $row["DESCUENTO"];
	$DESCUENTO2P = $row["DESCUENTO2"];
	$FECHA_INGRESOP = $row["FECHA_INGRESO"];
	$FECHA_ENTREGAP = $row["FECHA_ENTREGA"];
	$FECHA_CONFIRMACIONP = $row["FECHA_CONFIRMACION"];
	$DIASP = $row["DIAS"];
	$ESTADOP = $row["ESTADO"];
	$NETOP = $row["MONTO"];
	$NETO2P = $row["MONTO2"];
	$IVAP = $row["IVA"];
	$TOTALP = $row["TOTAL"];
	$TIPO_IVAP = $row["TIPO_IVA"];
	$FECHA_ACTAP = $row["FECHA_ACTA"];
	$REPROGRAMACIONP= $row["REPROGRAMACION"];
	$TIEMPO_ESPECIALP= $row["TIEMPO_ESPECIAL"];
	$CONVENIRP= $row["CONVENIR"];
	  }
  mysql_free_result($result1);




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$CLIENTE  = $_POST['cliente'];
$DIRECTOR = $_POST['director'];
$FECHA_INGRESO = $_POST['fecha_ingreso'];
$RUT = $_POST['rut'];
$DISENADOR = $_POST['disenador'];
$OBRA= $_POST['obra'];
$CONTACTO= $_POST['contacto'];
$FECHA_ENTREGA= $_POST['fecha_entrega'];
$DIRECCION_OBRA= $_POST['direccion_obra'];
$FONO= $_POST['fono'];
$OC= $_POST['oc'];
$MAIL= $_POST['mail'];
$DIAS_RADICADO= $_POST['dias_radicado'];
$CONDICION_PAGO= $_POST['condicion_pago'];
$VALIDEZ= $_POST['validez'];
$DEPARTAMENTO_CREDITO= $_POST['departamento_credito'];
$PUESTOS= $_POST['puestos'];
$FECHA_ACTA= $_POST['fecha_acta'];
$SUB_TOTAL= $_POST['sub_total'];
$DESCUENTO= $_POST['descuento'];
$NETO= $_POST['neto'];
$DESCUENTO2= $_POST['descuento2'];
$NETO2= $_POST['neto2'];
$TIPO_IVA= $_POST['iva1'];
$IVA= $_POST['iva'];
$TOTAL= $_POST['total'];
$ESTADO= $_POST['estado'];
$ESPECIAL= $_POST['txt_especial'];
$CONVENIR= $_POST['txt_convenir'];

$ENCARGADO= $_POST["encargado"];
$NOMBRE_PROYECTO= $_POST["nombre_proyecto"];

 
 
 $arreglo = Array(".",","); 
 $SUB_TOTALA = str_replace($arreglo,"",$SUB_TOTAL); 

 $arreglo = Array(","); 
 $SUB_TOTALAP = str_replace($arreglo,".",$SUB_TOTALP); 
///
 $arreglo = Array("."); 
 $DESCUENTOA = str_replace($arreglo,"",$DESCUENTO); 
 $arreglo = Array(","); 
 $DESCUENTOA = str_replace($arreglo,".",$DESCUENTO); 

 $arreglo = Array(","); 
 $DESCUENTOAP = str_replace($arreglo,".",$DESCUENTOP); 
///
 $arreglo = Array(".",","); 
 $NETOA = str_replace($arreglo,"",$NETO); 

 $arreglo = Array(","); 
 $NETOAP = str_replace($arreglo,".",$NETOP); 
  
/////////////////////////////
///
 $arreglo = Array("."); 
 $DESCUENTO2A = str_replace($arreglo,"",$DESCUENTO2); 
 $arreglo = Array(","); 
 $DESCUENTO2A = str_replace($arreglo,".",$DESCUENTO2); 

 $arreglo = Array(","); 
 $DESCUENTO2AP = str_replace($arreglo,".",$DESCUENTO2P); 
///
///
 $arreglo = Array(".",","); 
 $NETO2A = str_replace($arreglo,"",$NETO2); 

 $arreglo = Array(","); 
 $NETO2AP = str_replace($arreglo,".",$NETO2P); 
 ///
 $arreglo = Array(".",","); 
 $IVAA = str_replace($arreglo,"",$IVA); 

 $arreglo = Array(","); 
 $IVAAP = str_replace($arreglo,".",$IVAP); 

 ///
 $arreglo = Array(".",","); 
 $TOTALA = str_replace($arreglo,"",$TOTAL); 

 $arreglo = Array(","); 
 $TOTALAP = str_replace($arreglo,".",$TOTALP); 




mysql_select_db($database_conn, $conn);

$FECHA = date('Y/m/d');

if($ESTADO!= $ESTADOP && $ESTADOP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$ESTADOP."','".$ESTADO."','Estado')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}




if($CLIENTE != $CLIENTEP && $CLIENTEP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$CLIENTEP."','".$CLIENTE."','Cliente')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}

///
if($RUT != $RUT_CLIENTEP && $RUT_CLIENTEP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$RUT_CLIENTEP."','".$RUT."','Rut')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
///
if($OBRA != $OBRAP && $OBRAP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$OBRAP."','".$OBRA."','Obra')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
///
if($DIRECCION_OBRA != $DIRECCION_OBRAP && $DIRECCION_OBRAP != "" )
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$DIRECCION_OBRAP."','".$DIRECCION_OBRA."','Direccion')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
///
if($OC != $OCP && $OCP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$OCP."','".$OC."','OC')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
///
if($CONDICION_PAGO != $CONDICION_PAGOP && $CONDICION_PAGOP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$CONDICION_PAGOP."','".$CONDICION_PAGO."','Condicion Pago')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($DEPARTAMENTO_CREDITO != $DEPARTAMENTO_CREDITOP && $DEPARTAMENTO_CREDITOP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$DEPARTAMENTO_CREDITOP."','".$DEPARTAMENTO_CREDITO ."','Linea')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($DIRECTOR != $DIRECTORP && $DIRECTORP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$DIRECTORP."','".$DIRECTOR ."','Director')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($DISENADOR != $DISENADORP && $DISENADORP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$DISENADORP."','".$DISENADOR  ."','Diseñador')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($CONTACTO != $CONTACTOP && $CONTACTOP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$CONTACTOP."','".$CONTACTO."','Contacto')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($FONO != $FONOP && $FONOP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$FONOP."','".$FONO."','Fono')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($MAIL != $MAILP && $MAILP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$MAILP."','".$MAIL."','Mail')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($VALIDEZ!= $VALIDEZP && $VALIDEZP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$VALIDEZP."','".$VALIDEZ."','Validez')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($PUESTOS!= $PUESTOSP && $PUESTOSP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$PUESTOSP."','".$PUESTOS."','Puestos')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}

//
if($FECHA_INGRESO!= $FECHA_INGRESOP && $FECHA_INGRESOP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$FECHA_INGRESOP."','".$FECHA_INGRESO."','Fecha Ingreso')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($FECHA_ENTREGA != $FECHA_ENTREGAP && $FECHA_ENTREGAP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$FECHA_ENTREGAP."','".$FECHA_ENTREGA."','Fecha Entrega Solicitada')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($FECHA_ACTA != $FECHA_ACTAP && $FECHA_ACTAP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$FECHA_ACTAP."','".$FECHA_ACTA."','Fecha Acta')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

}
//
if($ESPECIAL != $TIEMPO_ESPECIALP && $TIEMPO_ESPECIALP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$TIEMPO_ESPECIALP."','".$ESPECIAL."','Tiempo Especial')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
//
if($CONVENIR != $CONVENIRP  && $CONVENIRP != "")
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".$CONVENIRP."','".$CONVENIR."','Convenir')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
//
if(number_format((double)$SUB_TOTALA,0, ",", ".") < number_format((double)$SUB_TOTALAP,0, ",", ".") || number_format((double)$SUB_TOTALA,0, ",", ".") > number_format((double)$SUB_TOTALAP,0, ",", "."))
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".number_format((double)$SUB_TOTALAP,0, ",", ".")."','".number_format((double)$SUB_TOTALA,0, ",", ".")."','Sub Total')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
//
if(number_format((double)$DESCUENTOA,0, ",", ".") != number_format((double)$DESCUENTOAP,0, ",", "."))
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".number_format((double)$DESCUENTOAP,2, ",", ".")."','".number_format((double)$DESCUENTOA,2, ",", ".")."','Descuento')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
//
if(number_format((double)$NETOA,0, ",", ".") < number_format((double)$NETOAP,0, ",", ".") || number_format((double)$NETOA,0, ",", ".") > number_format((double)$NETOAP,0, ",", "."))
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".number_format((double)$NETOP,0, ",", ".")."','".number_format((double)$NETO,0, ",", ".")."','Neto')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
//
if(number_format((double)$DESCUENTO2A,0, ",", ".") != number_format((double)$DESCUENTO2AP,0, ",", "."))
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".number_format((double)$DESCUENTO2AP,2, ",", ".")."','".number_format((double)$DESCUENTO2A,2, ",", ".")."','Descuento 2')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
//
if(number_format((double)$NETO2A,0, ",", ".") < number_format((double)$NETO2AP,0, ",", ".") || number_format((double)$NETO2A,0, ",", ".") > number_format((double)$NETO2AP,0, ",", "."))
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".number_format((double)$NETO2AP,0, ",", ".")."','".number_format((double)$NETO2A,0, ",", ".")."','Neto 2')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}

//
if(number_format((double)$IVAA,0, ",", ".") < number_format((double)$IVAAP,0, ",", ".") || number_format((double)$IVAA,0, ",", ".") > number_format((double)$IVAAP,0, ",", "."))
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".number_format((double)$IVAAP,0, ",", ".")."','".number_format((double)$IVAA,0, ",", ".")."','IVA')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
//
if(number_format((double)$TOTALA,0, ",", ".") < number_format((double)$TOTALAP,0, ",", ".") || number_format((double)$TOTALA,0, ",", ".") > number_format((double)$TOTALAP,0, ",", "."))
{
$sql = "INSERT INTO actualizaciones (FECHA,USUARIO,NOMBRE_USUARIO,UBICACION,VALOR_ANTIGUO,VALOR_NUEVO,CAMPO) values ('".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','PROYECTO','".number_format((double)$TOTALAP,0, ",", ".")."','".number_format((double)$TOTALA,0, ",", ".")."','Total')";
$result = mysql_query($sql, $conn) or die(mysql_error());


$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_RADICADO)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
/////////////////////////////
 
$caracteres = Array(".",","); 
  $SUB_TOTAL1 = str_replace($caracteres,"",$SUB_TOTAL); 

  $caracteres1 = Array("."); 
  $DESCUENTO1 = str_replace($caracteres1,"",$DESCUENTO); 

  $caracteres2 = Array(","); 
  $DESCUENTO1 = str_replace($caracteres2,".",$DESCUENTO1); 
  
  
  
   $caracteres3 =  Array("."); 
  $DESCUENTO3 = str_replace($caracteres3,"",$DESCUENTO2); 

  $caracteres4 =  Array(",");  
  $DESCUENTO3 = str_replace($caracteres4,".",$DESCUENTO3); 

  $caracteres5 =  Array(".",",");  
  $NETOA = str_replace($caracteres5,"",$NETO); 


    $caracteres6 =  Array(".",",");  
  $NETOB = str_replace($caracteres6,"",$NETO2); 
  
  
  
   $caracteres7 = Array("."); 
  $TOTAL = str_replace($caracteres7,"",$TOTAL); 

  $caracteres8 = Array(","); 
  $TOTAL = str_replace($caracteres8,".",$TOTAL); 
  
  
     $caracteres9 = Array("."); 
  $IVA = str_replace($caracteres9,"",$IVA); 

  $caracteres10 = Array(","); 
  $IVA = str_replace($caracteres10,".",$IVA); 

mysql_select_db($database_conn, $conn);	
$query_registro = "SELECT * FROM cliente WHERE RUT_CLIENTE ='".$RUT."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result1))
{
$CODIGO_CLIENTE = $row["CODIGO_CLIENTE"];
} 




$sql6="UPDATE proyecto SET NOMBRE_CLIENTE='".$CLIENTE."',RUT_CLIENTE='".$RUT."',CODIGO_CLIENTE ='".$CODIGO_CLIENTE."',OBRA='".$OBRA."',DIRECCION_FACTURACION='".$DIRECCION_OBRA."', ORDEN_CC='".$OC."',CONDICION_PAGO='".$CONDICION_PAGO."',DEPARTAMENTO_CREDITO='".$DEPARTAMENTO_CREDITO."', EJECUTIVO='".($DIRECTOR)."',DISENADOR='".($DISENADOR)."', CONTACTO='".$CONTACTO."',FONO='".$FONO."', MAIL='".$MAIL."',VALIDEZ_COTIZACION='".$VALIDEZ."', PUESTOS='".$PUESTOS."',SUB_TOTAL='".$SUB_TOTAL1."',DESCUENTO='".$DESCUENTO1."',FECHA_INGRESO='".$FECHA_INGRESO."', DIAS='".$DIAS_RADICADO."',FECHA_ENTREGA='".$FECHA_ENTREGA."',ESTADO='".$ESTADO."',TOTAL='".$TOTAL."',IVA='".$IVA."',TIPO_IVA ='".$TIPO_IVA."',FECHA_ACTA='".$FECHA_ACTA."',DESCUENTO2='".$DESCUENTO3."', MONTO2='".$NETOB."', MONTO='".$NETOA."',TIEMPO_ESPECIAL='".$ESPECIAL."',CONVENIR='".$CONVENIR."' ,ENCARGADO='".$ENCARGADO."' ,NOMBRE_PROYECTO='".$NOMBRE_PROYECTO."' WHERE CODIGO_PROYECTO = '".$CODIGO_RADICADO."'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());

///// VERSIONAR PROYECTO

if($ESTADO == 'VERSIONAR')
{

$sql555 = "select * FROM proyecto where CODIGO_PROYECTO = '".$CODIGO_RADICADO."'";

$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
  {	  
	$FECHA_INGRESO = $row ["FECHA_INGRESO"];
	$FECHA_REALIZACION = $row ["FECHA_REALIZACION"];
	$RUT_CLIENTE = $row ["RUT_CLIENTE"];
    $NOMBRE_CLIENTE = $row ["NOMBRE_CLIENTE"];
	$OBRA = $row ["OBRA"];
	$MONTO = $row ["MONTO"];
	$DIRECCION_FACTURACION = $row ["DIRECCION_FACTURACION"];
	$CONDICION_PAGO= $row ["CONDICION_PAGO"];
	$EJECUTIVO= $row ["EJECUTIVO"];
	$DISENADOR= $row ["DISENADOR"];	
	$ORDEN_CC= $row ["ORDEN_CC"];
	$DEPARTAMENTO_CREDITO= $row ["DEPARTAMENTO_CREDITO"];	
	$CONTACTO= $row ["CONTACTO"];
	$FONO= $row ["FONO"];
	$MAIL= $row ["MAIL"];
	$VALIDEZ_COTIZACION = $row ["VALIDEZ_COTIZACION"];
    $PUESTOS = $row ["PUESTOS"];
	$FECHA_INGRESO= $row ["FECHA_INGRESO"];
	$FECHA_ENTREGA= $row ["FECHA_ENTREGA"];
	$FECHA_CONFIRMACION= $row ["FECHA_CONFIRMACION"];
	$DIAS= $row ["DIAS"];
    $REPROGRAMACION= $row ["REPROGRAMACION"];
    $FECHA_ACTA= $row ["FECHA_ACTA"];
	$TIEMPO_ESPECIAL= $row ["TIEMPO_ESPECIAL"];	
	$CONVENIR= $row ["CONVENIR"];	
	$SUB_TOTAL= $row ["SUB_TOTAL"];	
	$DESCUENTO= $row ["DESCUENTO"];	
	$MONTO= $row ["MONTO"];	
    $DESCUENTO2= $row ["DESCUENTO2"];
	$MONTO2= $row ["MONTO2"];	
	$TIPO_IVA= $row ["TIPO_IVA"];	
	$IVA= $row ["IVA"];	
	$TOTAL= $row ["TOTAL"];	
	$ESTADO= $row ["ESTADO"];	


	
  }
  
  if(substr($CODIGO_RADICADO, -1) == '0'  || substr($CODIGO_RADICADO, -1) == '1' || substr($CODIGO_RADICADO, -1) == '2' || substr($CODIGO_RADICADO, -1) == '3' || substr($CODIGO_RADICADO, -1) == '4' || substr($CODIGO_RADICADO, -1) == '5' ||substr($CODIGO_RADICADO, -1) == '6' || substr($CODIGO_RADICADO, -1) == '7' || substr($CODIGO_RADICADO, -1) == '8' || substr($CODIGO_RADICADO, -1) == '9' || substr($CODIGO_RADICADO, -1) == 'M') 
  {
	  $CODIGO_RADICADO1 = $CODIGO_RADICADO.'-B';
  }
  
  else if(substr($CODIGO_RADICADO, -1) == 'B' || substr($CODIGO_RADICADO, -1) == 'b')
  {
	  $cambios = Array("-B"); 
      $CODIGO_RADICADO1 = str_replace($cambios,"-C",$CODIGO_RADICADO); 
  }
  
    else if(substr($CODIGO_RADICADO, -1) == 'C' || substr($CODIGO_RADICADO, -1) == 'c')
  {
	  $cambios = Array("-C"); 
      $CODIGO_RADICADO1 = str_replace($cambios,"-D",$CODIGO_RADICADO); 
  }
  
      else if(substr($CODIGO_RADICADO, -1) == 'D' || substr($CODIGO_RADICADO, -1) == 'd')
  {
	 $cambios = Array("-D"); 
     $CODIGO_RADICADO1 = str_replace($cambios,"-E",$CODIGO_RADICADO); 
  }
  
      else if(substr($CODIGO_RADICADO, -1) == 'E' || substr($CODIGO_RADICADO, -1) == 'e')
  {
	  $cambios = Array("-E"); 
      $CODIGO_RADICADO1 = str_replace($cambios,"-F",$CODIGO_RADICADO); 
  }
  
        else if(substr($CODIGO_RADICADO, -1) == 'F' || substr($CODIGO_RADICADO, -1) == 'f')
  {
	   $cambios = Array("-F"); 
      $CODIGO_RADICADO1 = str_replace($cambios,"-G",$CODIGO_RADICADO); 
  }
         else if(substr($CODIGO_RADICADO, -1) == 'G' || substr($CODIGO_RADICADO, -1) == 'g')
  {
	   $cambios = Array("-F"); 
      $CODIGO_RADICADO1 = str_replace($cambios,"-H",$CODIGO_RADICADO); 
  }
       else if(substr($CODIGO_RADICADO, -1) == 'H' || substr($CODIGO_RADICADO, -1) == 'h')
  {
	   $cambios = Array("-F"); 
      $CODIGO_RADICADO1 = str_replace($cambios,"-i",$CODIGO_RADICADO); 
  }
  
 
	$sql = "INSERT INTO proyecto (FECHA_ENTREGA,FECHA_CONFIRMACION,NOMBRE_CLIENTE,RUT_CLIENTE,CODIGO_PROYECTO,FECHA_INGRESO,ESTADO,CODIGO_USUARIO,FECHA_REALIZACION,OBRA,MONTO,DIRECCION_FACTURACION,CONDICION_PAGO,EJECUTIVO,DISENADOR,ORDEN_CC,DEPARTAMENTO_CREDITO,CONTACTO,FONO,MAIL,VALIDEZ_COTIZACION,PUESTOS,REPROGRAMACION,FECHA_ACTA,TIEMPO_ESPECIAL,CONVENIR,SUB_TOTAL,DESCUENTO,DESCUENTO2,MONTO2,TIPO_IVA,IVA,TOTAL) values ('".($FECHA_ENTREGA)."','".($FECHA_CONFIRMACION)."','".($NOMBRE_CLIENTE)."','".($RUT_CLIENTE)."','".($CODIGO_RADICADO1)."','".date("Y-m-d")."','EN PROCESO','".$CODIGO_USUARIO."','".date("Y-m-d")."','".($OBRA)."','".$MONTO."','".$DIRECCION_FACTURACION."','".$CONDICION_PAGO."','".($EJECUTIVO)."','".($DISENADOR)."','".($ORDEN_CC)."','".($DEPARTAMENTO_CREDITO)."','".($CONTACTO)."','".($FONO)."','".($MAIL)."','".($VALIDEZ_COTIZACION )."','".$PUESTOS."','".$REPROGRAMACION."','".$FECHA_ACTA."','".$TIEMPO_ESPECIAL."','".$CONVENIR."','".$SUB_TOTAL."','".$DESCUENTO."','".$DESCUENTO2."','".$MONTO2."','".$TIPO_IVA."','".$IVA."','".$TOTAL."')";

$result = mysql_query($sql, $conn) or die(mysql_error());
mysql_select_db($database_conn, $conn);
//////////////////
/////////////////
//////////////


$sql555 = "select * FROM servicio where CODIGO_PROYECTO = '".$CODIGO_RADICADO."' AND  not NOMBRE_SERVICIO='OC' ORDER BY FECHA_INICIO asc";

$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
{
	$PROCESO = "";

	$NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$ESTADO = $row["ESTADO"];
	$CATEGORIA = $row["CATEGORIA"];
	$FECHA_I = $row["FECHA_INICIO"];
	$FECHA_E = $row["FECHA_ENTREGA"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$OBSERVACION = $row["OBSERVACIONES"];	
	$DESCRIPCION = $row["DESCRIPCION"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$DIRECCION = $row["DIRECCION"];
	$TPTMFI = $row["TPTMFI"];
	$GUIA_DESPACHO = $row["GUIA_DESPACHO"];
	$CODIGO_OC = $row["CODIGO_OC"];
	$INSTALADOR_1 = $row["INSTALADOR_1"];		
	$INSTALADOR_2 = $row["INSTALADOR_2"];
	$INSTALADOR_3 = $row["INSTALADOR_3"];
	$INSTALADOR_4 = $row["INSTALADOR_4"];
	$LIDER = $row["LIDER"];	
	$DIAS = $row["DIAS"];
	$PREDECESOR  = $row["PREDECESOR"];
	$PUESTOS = $row["PUESTOS"];
	$PROCESO = $row["PROCESO"];
	$EJECUTOR = $row["EJECUTOR"];
	$DOCUMENTO_SERVICIO_TECNICO = $row["DOCUMENTO_SERVICIO_TECNICO"];
	$TIPO_SERVICIO = $row["TIPO_SERVICIO"];
	$TECNICO_1 = $row["TECNICO_1"];
	$TECNICO_2 = $row["TECNICO_2"];
	$TRANSPORTE = $row["TRANSPORTE"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$RECLAMOS  = $row["RECLAMOS"];
	$OC = $row["OC"];
	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	$CODIGO_COMUNA = $row["CODIGO_COMUNA"];

	$FACTURA_S = $row["FACTURA"];
	$MONTO_FACTURA_S = $row["MONTO_FACTURA"];

	

$contador = 0;
$diasf = 0;
$segundos=strtotime($FECHA_E) - strtotime($FECHA_I);
$dias=intval($segundos/60/60/24);

while($contador < $dias)
{
	$nd = strtotime ( '+'.$contador.' day' , strtotime(substr($FECHA_I,0,11) ) ) ;
    $nd = date ( 'N' , $nd );
	if($nd == 6 || $nd == 7)
	{
		$diasf++;
	}
	$contador++;
}
$dias = $dias - $diasf;
if($dias < 0)
{
	$dias = 1;
}
	if($ESTADO == 'EN PROCESO')
	{
$sql = "INSERT INTO servicio(CATEGORIA,FECHA_PRIMERA_ENTREGA,NOMBRE_SERVICIO,CODIGO_USUARIO,CODIGO_PROYECTO,ESTADO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,DESCRIPCION,DIRECCION,TPTMFI,GUIA_DESPACHO,INSTALADOR_1,INSTALADOR_2,INSTALADOR_3,INSTALADOR_4,LIDER,PREDECESOR,PUESTOS,PROCESO,EJECUTOR,DOCUMENTO_SERVICIO_TECNICO,TIPO_SERVICIO,TECNICO_1,TECNICO_2,TRANSPORTE,FECHA_REALIZACION,RECLAMOS,OC,DIAS,CODIGO_COMUNA,FACTURA, MONTO_FACTURA )values('".$CATEGORIA."','".$FECHA_PRIMERA_ENTREGA."','".$NOMBRE_SERVICIO."','".$CODIGO_USUARIO."','".($CODIGO_RADICADO1)."','EN PROCESO','".date("Y-m-d")."','".$FECHA_E."','".$REALIZADOR."','".$SUPERVISOR."','".$OBSERVACION."','".$DESCRIPCION."','".$DIRECCION."','".$TPTMFI."','".$GUIA_DESPACHO."','".$INSTALADOR_1."','".$INSTALADOR_2."','".$INSTALADOR_3."','".$INSTALADOR_4."','".$LIDER."','".$PREDECESOR."','".$PUESTOS."','".$PROCESO."','".$EJECUTOR."','".$DOCUMENTO_SERVICIO_TECNICO."','".$TIPO_SERVICIO."','".$TECNICO_1."','".$TECNICO_2."','".$TRANSPORTE."','".$FECHA_REALIZACION."','".$RECLAMOS."','".$OC."','".$dias."','".$CODIGO_COMUNA."','".$FACTURA_S."','".$MONTO_FACTURA_S."')";
	}
	else
	{
$sql = "INSERT INTO servicio(CATEGORIA,FECHA_PRIMERA_ENTREGA,NOMBRE_SERVICIO,CODIGO_USUARIO,CODIGO_PROYECTO,ESTADO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,DESCRIPCION,DIRECCION,TPTMFI,GUIA_DESPACHO,INSTALADOR_1,INSTALADOR_2,INSTALADOR_3,INSTALADOR_4,LIDER,DIAS,PREDECESOR,PUESTOS,PROCESO,EJECUTOR,DOCUMENTO_SERVICIO_TECNICO,TIPO_SERVICIO,TECNICO_1,TECNICO_2,TRANSPORTE,FECHA_REALIZACION,RECLAMOS,OC,CODIGO_COMUNA,FACTURA, MONTO_FACTURA )values('".$CATEGORIA."','".$FECHA_PRIMERA_ENTREGA."','".$NOMBRE_SERVICIO."','".$CODIGO_USUARIO."','".($CODIGO_RADICADO1)."','".$ESTADO."','".$FECHA_I."','".$FECHA_E."','".$REALIZADOR."','".$SUPERVISOR."','".$OBSERVACION."','".$DESCRIPCION."','".$DIRECCION."','".$TPTMFI."','".$GUIA_DESPACHO."','".$INSTALADOR_1."','".$INSTALADOR_2."','".$INSTALADOR_3."','".$INSTALADOR_4."','".$LIDER."','".$DIAS."','".$PREDECESOR."','".$PUESTOS."','".$PROCESO."','".$EJECUTOR."','".$DOCUMENTO_SERVICIO_TECNICO."','".$TIPO_SERVICIO."','".$TECNICO_1."','".$TECNICO_2."','".$TRANSPORTE."','".$FECHA_REALIZACION."','".$RECLAMOS."','".$OC."','".$CODIGO_COMUNA."','".$FACTURA_S."','".$MONTO_FACTURA_S."')";		
	}
$result = mysql_query($sql, $conn) or die(mysql_error());


if($NOMBRE_SERVICIO == 'Factura')
{
$query_registro = "SELECT * FROM servicio  ORDER BY CODIGO_SERVICIO  DESC LIMIT 1";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result1))
{
	$CODIGO_SERVICIO_FIN = $row["CODIGO_SERVICIO"];
} 
mysql_free_result($result1);

$sql02 = "UPDATE factura SET  CODIGO_PROYECTO = '".$CODIGO_RADICADO1."', CODIGO_SERVICIO = '".$CODIGO_SERVICIO_FIN."' WHERE CODIGO_PROYECTO ='".$CODIGO_RADICADO."' and CODIGO_SERVICIO ='".$CODIGO_SERVICIO."' ";
$result02 = mysql_query($sql02, $conn) or die(mysql_error());
 }
}



$sql = "UPDATE  proyecto SET ESTADO = 'NULA' WHERE CODIGO_PROYECTO = '".$CODIGO_RADICADO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());	

$sql = "UPDATE  servicio SET ESTADO = 'NULO' WHERE CODIGO_PROYECTO = '".$CODIGO_RADICADO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());	

$sql01 = "UPDATE  vale_emision SET CODIGO_PROYECTO = '".($CODIGO_RADICADO1)."' WHERE CODIGO_PROYECTO = '".$CODIGO_RADICADO."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());	

$sql02 = "UPDATE  oc_producto SET ROCHA = '".($CODIGO_RADICADO1)."' WHERE ROCHA = '".$CODIGO_RADICADO."'";
$result02 = mysql_query($sql02, $conn) or die(mysql_error());	

$sql02 = "UPDATE actualizaciones_general SET CODIGO_GENERAL = '".($CODIGO_RADICADO1)."' WHERE CODIGO_GENERAL = '".$CODIGO_RADICADO."'";
$result02 = mysql_query($sql02, $conn) or die(mysql_error());

$sql02 = "UPDATE actualizaciones SET ROCHA = '".($CODIGO_RADICADO1)."' WHERE ROCHA = '".$CODIGO_RADICADO."'";
$result02 = mysql_query($sql02, $conn) or die(mysql_error());



}




if( isset($CODIGO_RADICADO1))
{
header("Location: editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO_RADICADO1)."");
}
else
{
header("Location: editarProyecto.php?CODIGO_PROYECTO=".urlencode($CODIGO_RADICADO)."");
}
?>