<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';

}

$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$CODIGO_PROYECTO = $_POST["ESTADIO"];
$CODIGO_PROYECTO1 = $_POST["ESTADIO1"];



/////////
////////
////////
$sql555 = "select COUNT(CODIGO_PROYECTO) AS CUENTA FROM proyecto WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO1."'";

$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
{
	$CODIGO_PROYECTO2 = $row ["CUENTA"];	
}
   if($CODIGO_PROYECTO2 > 0)
  {
		echo '<script language = javascript>
	alert("El rocha nuevo ya existe.")
	self.location = "editarProyecto.php?CODIGO_PROYECTO='.$CODIGO_PROYECTO.'"
	</script>';
	}


////////////
////////////
//////////



////////////
/////////
////////////PROJECTO NUEVO
$sql555 = "select * FROM proyecto where CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";

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

	$sql = "INSERT INTO proyecto (NOMBRE_CLIENTE,RUT_CLIENTE,CODIGO_PROYECTO,FECHA_INGRESO,ESTADO,CODIGO_USUARIO,FECHA_REALIZACION,OBRA,MONTO,DIRECCION_FACTURACION,CONDICION_PAGO,EJECUTIVO,DISENADOR,ORDEN_CC,DEPARTAMENTO_CREDITO,CONTACTO,FONO,MAIL,VALIDEZ_COTIZACION,PUESTOS,FECHA_ENTREGA,FECHA_CONFIRMACION,DIAS,REPROGRAMACION,FECHA_ACTA,TIEMPO_ESPECIAL,CONVENIR,SUB_TOTAL,DESCUENTO,DESCUENTO2,MONTO2,TIPO_IVA,IVA,TOTAL) values ('".($NOMBRE_CLIENTE)."','".($RUT_CLIENTE)."','".($CODIGO_PROYECTO1)."','".$FECHA_INGRESO."','EN PROCESO','".$CODIGO_USUARIO."','".$FECHA_REALIZACION."','".($OBRA)."','".$MONTO."','".$DIRECCION_FACTURACION."','".$CONDICION_PAGO."','".($EJECUTIVO)."','".($DISENADOR)."','".($ORDEN_CC)."','".($DEPARTAMENTO_CREDITO)."','".($CONTACTO)."','".($FONO)."','".($MAIL)."','".($VALIDEZ_COTIZACION )."','".$PUESTOS."','".$FECHA_ENTREGA."','".$FECHA_CONFIRMACION."','".$DIAS."','".$REPROGRAMACION."','".$FECHA_ACTA."','".$TIEMPO_ESPECIAL."','".$CONVENIR."','".$SUB_TOTAL."','".$DESCUENTO."','".$DESCUENTO2."','".$MONTO2."','".$TIPO_IVA."','".$IVA."','".$TOTAL."')";

$result = mysql_query($sql, $conn) or die(mysql_error());
mysql_select_db($database_conn, $conn);
//////////////////
/////////////////
//////////////

 $sql = "UPDATE  servicio SET ESTADO = 'NULO' WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());	

$sql555 = "select * FROM servicio where CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' AND  not NOMBRE_SERVICIO='OC' ORDER BY FECHA_INICIO asc";

$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
  {
		
	$NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$ESTADO = $row["ESTADO"];
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
	$CODIGO_RADICADO = $row["CODIGO_RADICADO"];	
	$TRANSPORTE = $row["TRANSPORTE"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$RECLAMOS  = $row["RECLAMOS"];
	$OC = $row["OC"];
	
	

	

	
		
$sql = "INSERT INTO servicio(NOMBRE_SERVICIO,CODIGO_USUARIO,CODIGO_PROYECTO,ESTADO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,DESCRIPCION,DIRECCION,TPTMFI,GUIA_DESPACHO,CODIGO_OC,INSTALADOR_1,INSTALADOR_2,INSTALADOR_3,INSTALADOR_4,LIDER,DIAS,PREDECESOR,PUESTOS,PROCESO,EJECUTOR,DOCUMENTO_SERVICIO_TECNICO,TIPO_SERVICIO,TECNICO_1,TECNICO_2,TRANSPORTE,FECHA_REALIZACION,RECLAMOS,OC)values('".$NOMBRE_SERVICIO."','".$CODIGO_USUARIO."','".$CODIGO_PROYECTO1."','EN PROCESO','".$FECHA_I."','".$FECHA_E."','".$REALIZADOR."','".$SUPERVISOR."','".$OBSERVACION."','".$DESCRIPCION."','".$DIRECCION."','".$TPTMFI."','".$GUIA_DESPACHO."','".$CODIGO_OC."','".$INSTALADOR_1."','".$INSTALADOR_2."','".$INSTALADOR_3."','".$INSTALADOR_4."','".$LIDER."','".$DIAS."','".$PREDECESOR."','".$PUESTOS."','".$PROCESO."','".$EJECUTOR."','".$DOCUMENTO_SERVICIO_TECNICO."','".$TIPO_SERVICIO."','".$TECNICO_1."','".$TECNICO_2."','".$TRANSPORTE."','".$FECHA_REALIZACION."','".$RECLAMOS."','".$OC."')";
$result = mysql_query($sql, $conn) or die(mysql_error());
 
 $sql = "UPDATE  proyecto SET ESTADO = 'NULA' WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());	
  
  }
  
header("Location: editarProyecto.php?CODIGO_PROYECTO=".$CODIGO_PROYECTO1."");
?>