<?php 

//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 


$CODIGO_USUARIO_FINAL= $_POST['codiguito'];
$NOMBRE_USUARIO_FINAL= $_POST['nombresito'];

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
$RECLAMO= $_POST['reclamo'];
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
$CODIGO_SUBSERVICIO = $_POST['subservicio'];
$FOLIO = $_POST['folio'];
$ROCHA_PRI = $_POST['rochapri'];
$DESCUENTO2 = $_POST['descuento2'];
$tipooc = $_POST['tipooc'];
$prooc = $_POST['prooc'];
$CODIGO_OCU = 0;    

$departamento= $_POST['departamento'];
$empleado= $_POST['empleado'];                      
mysql_select_db($database_conn, $conn);

	if($tipooc == 'OC')
	{
$sql1 = "SELECT * FROM orden_de_compra ORDER BY CODIGO_OC DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_OCU = $row["CODIGO_OC"];
	$numero++;
  }
mysql_free_result($result2);

$CODIGO_FINAL = $CODIGO_OCU + 1;        
	              
if($CODIGO_USUARIO_FINAL == "")
{
$sql = "INSERT INTO orden_de_compra (CODIGO_SUBSERVICIO,ROCHA_PROYECTO,CODIGO_OC,FECHA_REALIZACION,FECHA_ENTREGA,CONDICION_PAGO,TOTAL,OBSERVACION,DESPACHAR_RUT,CODIGO_USUARIO,ESTADO,DESCUENTO_OC,SUB_TOTAL,TIPO_IVA,IVA,NETO,NOMBRE_PROVEEDOR,DESPACHAR_NOMBRE,DESPACHAR_DIRECCION,DESPACHAR_COMUNA,DESPACHAR_TELEFONO,DESCUENTO_2,EMPRESA,RECLAMO) VALUES ('".($CODIGO_SUBSERVICIO)."','".($ROCHA_PRI)."','".($CODIGO_FINAL)."','".$FECHA."','".$FECHAE."','".($CONDICION)."',".$FINAL_TOTAL.",'".($OBSERVACIONG)."','".$DESPACHAR."','1','".$ESTADO."','".$DESCUENTO_FINAL."',".$SUB_TOTAL.",'".$TIPO_IVA."','".$VALOR_IVA."',".$NETO.",'".($NOMBRE_PROVEEDOR)."','".$DESPACHAR_NOMBRE."','".($DESPACHAR_DIRECCION)."','".$DESPACHAR_COMUNA."','".$DESPACHAR_TELEFONO."','".$DESCUENTO2."','".$DESCUENTO2."','".$prooc."','".$RECLAMO."')";
}
else
{
$sql = "INSERT INTO orden_de_compra (CODIGO_SUBSERVICIO,ROCHA_PROYECTO,CODIGO_OC,FECHA_REALIZACION,FECHA_ENTREGA,CONDICION_PAGO,TOTAL,OBSERVACION,DESPACHAR_RUT,CODIGO_USUARIO,ESTADO,DESCUENTO_OC,SUB_TOTAL,TIPO_IVA,IVA,NETO,NOMBRE_PROVEEDOR,DESPACHAR_NOMBRE,DESPACHAR_DIRECCION,DESPACHAR_COMUNA,DESPACHAR_TELEFONO,DESCUENTO_2,EMPRESA,RECLAMO) VALUES ('".($CODIGO_SUBSERVICIO)."','".($ROCHA_PRI)."','".($CODIGO_FINAL)."','".$FECHA."','".$FECHAE."','".($CONDICION)."',".$FINAL_TOTAL.",'".($OBSERVACIONG)."','".$DESPACHAR."','".$CODIGO_USUARIO_FINAL."','".$ESTADO."','".$DESCUENTO_FINAL."',".$SUB_TOTAL.",'".$TIPO_IVA."','".$VALOR_IVA."',".$NETO.",'".($NOMBRE_PROVEEDOR)."','".$DESPACHAR_NOMBRE."','".($DESPACHAR_DIRECCION)."','".$DESPACHAR_COMUNA."','".$DESPACHAR_TELEFONO."','".$DESCUENTO2."','".$prooc."','".$RECLAMO."')";
}

$result = mysql_query($sql, $conn) or die(mysql_error());
///////////////////////////////////////////////////////////////////////////////////
$sqlA = "SELECT * FROM orden_de_compra ORDER BY CODIGO_OC DESC LIMIT 1";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
  {
	$CODIGO_OCA = $row["CODIGO_OC"];
	$numero++;
  }
mysql_free_result($resultA);

$sqlSub="UPDATE sub_servicio SET SUB_ESTADO = 'Emitido' WHERE CODIGO_SUBSERVICIO = '".$CODIGO_SUBSERVICIO."'"; 
$result = mysql_query($sqlSub, $conn) or die(mysql_error());

$sql2="INSERT INTO oc_proveedor(CODIGO_PROVEEDOR,CODIGO_OC) VALUES ('".($CODIGO_PROVEEDOR)."','".($CODIGO_OCA)."')"; 
$result = mysql_query($sql2, $conn) or die(mysql_error());

$contador = 1;

while ($contador <= 75 )
{
$DESCRIPCION1 = $_POST['des'.$contador];
if($DESCRIPCION1 != "")
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
	
$sql01="INSERT INTO oc_producto(CODIGO_PRODUCTO,DESCUENTO,ROCHA,TOTAL,CODIGO_OC,CANTIDAD,PRECIO_BODEGA,PRECIO_LISTA,OBSERVACION, PRECIO_UNITARIO) VALUES('".($CODIGO_PRODUCTO1)."','".$DESCUENTO1."','".$ROCHA1."','".$TOTAL1."','".$CODIGO_OCA."','".$CANTIDAD1."','".$PRECIO_BODEGA1."','".$PRECIO_LISTA1."','".($OBS1)."','".$UNI1."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
$sql6="UPDATE producto set PRECIO = '".$UNI1."',PRECIO_SIN_DESCUENTO = '".$PRECIO_LISTA1."' where CODIGO_PRODUCTO ='".($CODIGO_PRODUCTO1)."'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());

$sqlservicioconsulta = "SELECT count(CODIGO_PROYECTO) AS CUENTA FROM servicio where CODIGO_PROYECTO = '".$ROCHA1."' and CODIGO_OC = '".($CODIGO_FINAL)."'";
$resultservicioconsulta = mysql_query($sqlservicioconsulta, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultservicioconsulta))
  {
		$CUENTA = $row["CUENTA"];
	
if($CUENTA == 0)
{	

$sqlservicio = "INSERT INTO servicio (CODIGO_OC,DESCRIPCION,NOMBRE_SERVICIO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,ESTADO,CODIGO_USUARIO,CODIGO_PROYECTO) values ('".($CODIGO_FINAL)."','OC','OC','".($FECHA)."','".($FECHAE)."','".($NOMBRE_USUARIO_FINAL)."','".($NOMBRE_USUARIO_FINAL)."','','EN PROCESO','".($CODIGO_USUARIO_FINAL)."','".($ROCHA1)."')";
$resultservicio = mysql_query($sqlservicio, $conn);

}
  }



}
$contador++;
}
	}
	/*$pila = array();
	if($tipooc == 'OC' && $RUT_PROVEEDOR1 == '76.038.442-9' || $RUT_PROVEEDOR1 == '99.543.470-9' || $RUT_PROVEEDOR1 == '78.202.830-8'|| $NOMBRE_PROVEEDOR == '96.703.040-6'|| $RUT_PROVEEDOR1 == '76.028.106-9'||  $RUT_PROVEEDOR1 == '76.022.547-9')
	{
		$FECHA_REALIZACION = date("Y-m-d");
		mysql_select_db($database_conn, $conn);
$contador = 1;
while ($contador <= 75 )
{
$DESCRIPCION1 = $_POST['des'.$contador];
$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$CANTIDAD = $_POST['cant'.$contador];
$OBS = $_POST['obs'.$contador];
$ROCHASSS = $_POST['roch'.$contador];
if($CODIGO_PRODUCTO != "")
{
array_push($pila,$ROCHASSS);
}
$contador++;
}
asort($pila);
foreach (array_unique($pila) as $key => $val) 
{
$sql = "INSERT INTO vale_emision (EMPLEADO,DEPARTAMENTO,FECHA,CODIGO_PROYECTO,CODIGO_USUARIO,ESTADO,FECHA_REALIZACION,FECHA_TERMINO) VALUES ('".$empleado."','".$departamento."','".$FECHA."','".$val."','".$CODIGO_USUARIO_FINAL."','PENDIENTE','".$FECHA_REALIZACION."','".$FECHAE."')";
$result = mysql_query($sql, $conn) or die(mysql_error());
}



$contador = 1;
while ($contador <= 75 )
{
$DESCRIPCION1 = $_POST['des'.$contador];
$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$CANTIDAD = $_POST['cant'.$contador];
$OBS = $_POST['obs'.$contador];
$ROCHASSS = $_POST['roch'.$contador];


if($CODIGO_PRODUCTO != "")
{

$sql1 = "SELECT * FROM vale_emision WHERE CODIGO_PROYECTO = '".$ROCHASSS."' ORDER BY COD_VALE DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$NVALE = $row["COD_VALE"];
  }
mysql_free_result($result2);

$sql01="INSERT INTO producto_vale_emision(CODIGO_VALE,CODIGO_PRODUCTO,CANTIDAD_SOLICITADA,OBSERVACIONES) VALUES('".($NVALE)."','".$CODIGO_PRODUCTO."','".$CANTIDAD."','".($OBS)."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
///////////////////////////////

}
$contador++;
}
	}

*/



	$pila = array();
	if($tipooc == 'VALE')
	{
		$FECHA_REALIZACION = date("Y-m-d");
		mysql_select_db($database_conn, $conn);
$contador = 1;
while ($contador <= 75 )
{
$DESCRIPCION1 = $_POST['des'.$contador];
$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$CANTIDAD = $_POST['cant'.$contador];
$OBS = $_POST['obs'.$contador];
$ROCHASSS = $_POST['roch'.$contador];
if($CODIGO_PRODUCTO != "")
{
array_push($pila,$ROCHASSS);
}
$contador++;
}
asort($pila);
foreach (array_unique($pila) as $key => $val) 
{
$sql = "INSERT INTO vale_emision (CODIGO_SUBSERVICIO,EMPLEADO,DEPARTAMENTO,FECHA,CODIGO_PROYECTO,CODIGO_USUARIO,ESTADO,FECHA_REALIZACION,FECHA_TERMINO) VALUES ('".$CODIGO_SUBSERVICIO."','".$empleado."','".$departamento."','".$FECHA."','".$val."','".$CODIGO_USUARIO_FINAL."','PENDIENTE','".$FECHA_REALIZACION."','".$FECHAE."')";
$result = mysql_query($sql, $conn) or die(mysql_error());
}

$sqlSub="UPDATE sub_servicio SET SUB_ESTADO = 'Emitido' WHERE CODIGO_SUBSERVICIO = '".$CODIGO_SUBSERVICIO."'"; 
$result = mysql_query($sqlSub, $conn) or die(mysql_error());


$contador = 1;
while ($contador <= 75 )
{
$DESCRIPCION1 = $_POST['des'.$contador];
$CODIGO_PRODUCTO= $_POST['cod'.$contador];
$CANTIDAD = $_POST['cant'.$contador];
$OBS = $_POST['obs'.$contador];
$ROCHASSS = $_POST['roch'.$contador];


if($CODIGO_PRODUCTO != "")
{

$sql1 = "SELECT * FROM vale_emision WHERE CODIGO_PROYECTO = '".$ROCHASSS."' ORDER BY COD_VALE DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$NVALE = $row["COD_VALE"];
  }
mysql_free_result($result2);

$sql01="INSERT INTO producto_vale_emision(CODIGO_VALE,CODIGO_PRODUCTO,CANTIDAD_SOLICITADA,OBSERVACIONES) VALUES('".($NVALE)."','".$CODIGO_PRODUCTO."','".$CANTIDAD."','".($OBS)."')";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());
///////////////////////////////

}
$contador++;
}
	}



 echo '<script language = javascript>
alert("La orden de compra esta a la espera de la aprobacion")
self.location = "OrdenDeCompras.php"
</script>';   	








//$pila = asort($pila);
/*asort($pila);
foreach (array_unique($pila) as $key => $val) 
{
    echo $val."\n";
}*/

?>