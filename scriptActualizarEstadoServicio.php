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



$KM_INICIOV = 0;

$ruta1= $_POST['ruta'];
$ESTADO1= $_POST['estado']; 	
$CONDUCTOR1= $_POST['conductor']; 
$KM_INICIO1= $_POST['kmi']; 
$KM_FIN1 = $_POST['kmf']; 
$KM_RECORRIDOS1= $_POST['kmr']; 
$PEONETAS1= $_POST['peo']; 
$PEONETAS22= $_POST['peo2']; 
$PEONETAS33= $_POST['peo3']; 
$PEONETAS44= $_POST['peo4']; 
$MONTO1= $_POST['mon'];
$LITRO1= $_POST['lit'];
$VALOR_LITRO1= $_POST['val']; 
$FECHA= $_POST['fecha']; 
$FECHA_T= $_POST['fecha_t'];
$VEHICULO= $_POST['vehiculo'];
$COMBUSTIBLE= $_POST['combustible'];


	mysql_select_db($database_conn, $conn);                                                                                                                                  
$sqla = "UPDATE RUTA SET COMBUSTIBLE = '".$COMBUSTIBLE."', PATENTE = '".$VEHICULO."',  FECHA= '".$FECHA."', FECHA_TERMINO= '".$FECHA_T."',CONDUCTOR ='".$CONDUCTOR1."', KM_INICIO = '".$KM_INICIO1."', KM_FIN = '".$KM_FIN1."' , KM_RECORRIDOS = '".$KM_RECORRIDOS1."', PEONETAS = '".$PEONETAS1."', MONTO = '".$MONTO1."',LITRO = '".$LITRO1."',VALOR_LITRO = '".$VALOR_LITRO1."',PEONETA2 = '".$PEONETAS22."',PEONETA3 = '".$PEONETAS33."',PEONETA4 = '".$PEONETAS44."' WHERE CODIGO_RUTA = '".$ruta1."'";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());
	

///////


$contador = 1;
$contador1 = 1;
$CUENTA= $_POST['cuenta'];
$CODIGO_RUTA= $_POST['codru'];

while ($contador <= $CUENTA )
{
$ESTADO= $_POST['est'.$contador];
$CODIGO_SER= $_POST['cod'.$contador];	
$obs= $_POST['cane'.$contador];	


$sql6="UPDATE servicio set ESTADO= '".$ESTADO."', OBSERVACIONES = '".$obs."' where CODIGO_SERVICIO ='".$CODIGO_SER."'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());
$contador++;
if($ESTADO == 'OK')
{
	$contador1++;
}
}



if($ESTADO1 != 'OK')
{
	if($contador == $contador1)
	{
		if($VEHICULO != "" && $CONDUCTOR1 != "" && $PEONETAS1 != "" && $KM_FIN1 > 0 )
		{	
			$sqla = "UPDATE RUTA SET ESTADO = 'OK' WHERE CODIGO_RUTA = '".$CODIGO_RUTA."'";
        	$resulta = mysql_query($sqla, $conn) or die(mysql_error());
    	}
	}
	else
	{
		if($VEHICULO == "")
		{
		
			$sqla = "UPDATE RUTA SET ESTADO = 'EN PROCESO' WHERE CODIGO_RUTA = '".$CODIGO_RUTA."'";
    		$resulta = mysql_query($sqla, $conn) or die(mysql_error());
 		}
 		else
 		{
 			$sqla = "UPDATE RUTA SET ESTADO = 'EN RUTA' WHERE CODIGO_RUTA = '".$CODIGO_RUTA."'";
    		$resulta = mysql_query($sqla, $conn) or die(mysql_error());
 		}

	}
}


if($ESTADO1 == 'OK')
{
	$sqla = "UPDATE RUTA SET ESTADO = '".$ESTADO1."' WHERE  CODIGO_RUTA = '".$ruta1."'";
	$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}
if($ESTADO1 == 'NULO')
{
	$sqla = "UPDATE RUTA SET ESTADO = '".$ESTADO1."' WHERE  CODIGO_RUTA = '".$ruta1."'";
	$resulta = mysql_query($sqla, $conn) or die(mysql_error());
}

$query_registro = 
"select * from VEHICULO WHERE PATENTE = '".$VEHICULO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
 {
	 $KM_INICIOV = $row['KM_INICIO'];
 }
 
 if($KM_FIN1 > $KM_INICIOV)
 {
	 $sqla = "UPDATE vehiculo SET KM_INICIO = '".$KM_FIN1."' WHERE PATENTE = '".$VEHICULO."'";
        $resulta = mysql_query($sqla, $conn) or die(mysql_error());
 }

echo '<script language = javascript>
alert("Ruta Actualizada N° '.$ruta1.'")
self.location =  "Ruta_entrega.php?CODIGO_RUTA='.$CODIGO_RUTA.'";
</script>';
?>