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

mysql_select_db($database_conn, $conn);
$NOMBRE_PROVEEDOR = $_POST['proveedor'];	
$RUT_PROVEEDOR1 = $_POST['rut_prove'];	
$query_registro = "SELECT * FROM proveedor WHERE RUT_PROVEEDOR ='".($RUT_PROVEEDOR1 )."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$CODIGO_PROVEEDOR = $row["CODIGO_PROVEEDOR"];
	$numero++;
  }
mysql_free_result($result1);

$FECHA= $_POST['fecha'];
$FECHAE= $_POST['fechaE'];
$CONDICION = $_POST['condicion'];
$FINAL_TOTAL = $_POST['tota'];
$OBSERVACIONG = $_POST['obsgeneral'];
$DESPACHAR = $_POST['despachar1'];
$DESPACHAR_NOMBRE = $_POST['despachar_nombre'];
$DESPACHAR_DIRECCION = $_POST['despachar_direccion'];
$DESPACHAR_COMUNA = $_POST['despachar_comuna'];
$DESPACHAR_TELEFONO = $_POST['despachar_telefono'];
$ESTADO = 'Pendiente';
$TIPO_IVA = $_POST['ivaf'];
$VALOR_IVA = $_POST['valoriva'];
$DESCUENTO_FINAL = $_POST['descuento1'];
$SUB_TOTAL = $_POST['sub1'];
$NETO = $_POST['neto'];
$FOLIO = $_POST['folio'];
$ROCHA_PRI = $_POST['rochapri'];
$DESCUENTO2 = $_POST['descuento2'];
$prooc = $_POST['prooc'];
$CODIGO_OCU = 0;                          
mysql_select_db($database_conn, $conn);

$sql1 = "SELECT * FROM orden_de_compra ORDER BY CODIGO_OC DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_OCU = $row["CODIGO_OC"];
	$numero++;
  }
mysql_free_result($result2);
      
	if($CODIGO_USUARIO == "")
{	 
$sql = "update orden_de_compra set EMPRESA = '".$prooc."',ROCHA_PROYECTO = '".$ROCHA_PRI."', FECHA_REALIZACION = '".$FECHA."', FECHA_ENTREGA = '".$FECHAE."' , CONDICION_PAGO = '".($CONDICION)."', TOTAL = '".($FINAL_TOTAL)."', OBSERVACION = '".$OBSERVACIONG."' , DESPACHAR_RUT = '".$DESPACHAR."',CODIGO_USUARIO = '1',ESTADO = '".$ESTADO."',DESCUENTO_OC = '".$DESCUENTO_FINAL."',SUB_TOTAL = '".$SUB_TOTAL."',TIPO_IVA = '".$TIPO_IVA."',IVA = '".$VALOR_IVA."',NETO= '".$NETO."',NOMBRE_PROVEEDOR= '".($NOMBRE_PROVEEDOR)."',DESPACHAR_NOMBRE= '".$DESPACHAR_NOMBRE."',DESPACHAR_DIRECCION= '".($DESPACHAR_DIRECCION)."',DESPACHAR_COMUNA= '".($DESPACHAR_COMUNA)."',DESPACHAR_TELEFONO= '".($DESPACHAR_TELEFONO)."',DESCUENTO_2= '".($DESCUENTO2)."' where CODIGO_OC = '".$FOLIO."'";   
}
else
{
$sql = "update orden_de_compra set EMPRESA = '".$prooc."',ROCHA_PROYECTO = '".$ROCHA_PRI."', FECHA_REALIZACION = '".$FECHA."', FECHA_ENTREGA = '".$FECHAE."' , CONDICION_PAGO = '".($CONDICION)."', TOTAL = '".($FINAL_TOTAL)."', OBSERVACION = '".$OBSERVACIONG."' , DESPACHAR_RUT = '".$DESPACHAR."',ESTADO = '".$ESTADO."',DESCUENTO_OC = '".$DESCUENTO_FINAL."',SUB_TOTAL = '".$SUB_TOTAL."',TIPO_IVA = '".$TIPO_IVA."',IVA = '".$VALOR_IVA."',NETO= '".$NETO."',NOMBRE_PROVEEDOR= '".$NOMBRE_PROVEEDOR."',DESPACHAR_NOMBRE= '".($DESPACHAR_NOMBRE)."',DESPACHAR_DIRECCION= '".($DESPACHAR_DIRECCION)."',DESPACHAR_COMUNA= '".($DESPACHAR_COMUNA)."',DESPACHAR_TELEFONO= '".($DESPACHAR_TELEFONO)."',DESCUENTO_2= '".($DESCUENTO2)."' where CODIGO_OC = '".$FOLIO."'";
}
$result = mysql_query($sql, $conn) or die(mysql_error());
///////////////////////////////////////////////////////////////////////////////////

$sql2="update oc_proveedor set CODIGO_PROVEEDOR = '".($CODIGO_PROVEEDOR)."' where CODIGO_OC = '".$FOLIO."'"; 
$result = mysql_query($sql2, $conn) or die(mysql_error());


$sqldeleteser="delete from servicio  where CODIGO_OC = '".$FOLIO."'"; 
$resultdeleteser = mysql_query($sqldeleteser, $conn) or die(mysql_error());
$contador = 1;
$IDFIN=0;
$IDFIN1=0;
$IDFIN2=0;
while ($contador <= 75 )
///1
{
	
	
$DESCRIPCION1 = $_POST['des'.$contador];
$IDI1 = $_POST['idi'.$contador];

if ($IDI1 != "" && $DESCRIPCION1 == "")
{
$sql01="DELETE FROM oc_producto where id ='".$IDI1."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
}

if($DESCRIPCION1 != "")
///2
{
$CODIGO_PRODUCTO1= $_POST['cod'.$contador];
$ROCHA1= $_POST['roch'.$contador];
$TOTAL1 = $_POST['tot'.$contador];
$CANTIDAD1 = $_POST['cant'.$contador];
$PRECIO_BODEGA1 = $_POST['prec'.$contador];
$PRECIO_LISTA1 = $_POST['precl'.$contador];
$DESCUENTO1 = $_POST['desc'.$contador];
$OBS1 = $_POST['obs'.$contador];
$UNI1 = $_POST['iva'.$contador];
$REC1 = $_POST['rec'.$contador];
$DIF1 = $_POST['dif'.$contador];
	

$difprodu = $CANTIDAD1 - $REC1;




if($IDI1 == "")
///3
{	
$sql01="INSERT INTO oc_producto(CODIGO_PRODUCTO,DESCUENTO,ROCHA,TOTAL,CODIGO_OC,CANTIDAD,PRECIO_BODEGA,PRECIO_LISTA,OBSERVACION, PRECIO_UNITARIO,DIFERENCIA) VALUES('".($CODIGO_PRODUCTO1)."','".$DESCUENTO1."','".$ROCHA1."','".$TOTAL1."','".$FOLIO."','".$CANTIDAD1."','".$PRECIO_BODEGA1."','".$PRECIO_LISTA1."','".$OBS1."','".$UNI1."','".$CANTIDAD1."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
}
else  if($IDI1 != "")
{
$sql01="update oc_producto set CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO1."',DESCUENTO = '".$DESCUENTO1."',ROCHA='".$ROCHA1."',TOTAL='".$TOTAL1."',CODIGO_OC='".$FOLIO."',CANTIDAD='".$CANTIDAD1."',PRECIO_BODEGA = '".$PRECIO_BODEGA1."',PRECIO_LISTA = '".$PRECIO_LISTA1."',OBSERVACION = '".$OBS1."', PRECIO_UNITARIO = '".$UNI1."',DIFERENCIA = '".$difprodu."' where id ='".$IDI1."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
}
///3
if ($IDI1 == "")
{
$IDFIN1+=$difprodu;	

}
else
{
$IDFIN1+=$difprodu ;	
}


$sql6="UPDATE orden_de_compra  set  diferencia_total= '".$IDFIN1."' where CODIGO_OC ='".$FOLIO."'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());


$sql6="UPDATE producto set PRECIO = '".$UNI1."' where CODIGO_PRODUCTO ='".($CODIGO_PRODUCTO1)."'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());

$sqlservicioconsulta = "SELECT count(CODIGO_PROYECTO) AS CUENTA FROM servicio where CODIGO_PROYECTO = '".$ROCHA1."' and CODIGO_OC = '".($FOLIO)."'";
$resultservicioconsulta = mysql_query($sqlservicioconsulta, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultservicioconsulta))
 ///4
  {
		$CUENTA = $row["CUENTA"];
	
if($CUENTA == 0)
///5
{	

$sqlservicio = "INSERT INTO servicio (CODIGO_OC,DESCRIPCION,NOMBRE_SERVICIO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,ESTADO,CODIGO_USUARIO,CODIGO_PROYECTO) values ('".($FOLIO)."','OC','OC','".($FECHA)."','".($FECHAE)."','".($NOMBRE_USUARIO)."','".($NOMBRE_USUARIO)."','','EN PROCESO','".($CODIGO_USUARIO)."','".($ROCHA1)."')";
$resultservicio = mysql_query($sqlservicio, $conn);
}
///5


}
///4



}
///2

$contador++;
}
///1










date_default_timezone_set("Chile/Continental");

$sqlregistro = "INSERT INTO oc_registro (NOMBRE_USUARIO,CODIGO_USUARIO,FECHA) values ('".($NOMBRE_USUARIO)."','".($CODIGO_USUARIO)."','".date("Y-m-d H:i:s")."')";
$resultregistro = mysql_query($sqlregistro, $conn) or die(mysql_error());

$sql1 = "SELECT * FROM oc_registro ORDER BY CODIGO DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_R = $row["CODIGO"];
	$numero++;
  }
mysql_free_result($result2);
      
$sqlcodregistro = "INSERT INTO nap_oc_registro (CODIGO,CODIGO_OC) values ('".($CODIGO_R)."','".($FOLIO)."')";
$resulcodtregistro = mysql_query($sqlcodregistro, $conn) or die(mysql_error());


echo '<script language = javascript>
alert("La orden de compra esta a la espera de la aprobacion")
self.location = "ListadoDeCompras.php"
</script>';


?>