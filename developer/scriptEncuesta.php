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


///// Declaracion de variables Toma de Información

$CODIGO = $_POST['txt_codigo'];




//1
if (isset($_POST['uno']))  
{
	$uno = $_POST['uno'];
	if($uno == 'unoa')
	{
	$sum1 = 3;
	}
	else if($uno == 'unob')
	{
	$sum1 = 2;	
	}
	else if($dos == 'unoc')
	{
	$sum1 = 1;	
	}
}
else
{
	$sum1 = 0;
}

if (isset($_POST['dos']))  
{
	$uno = $_POST['dos'];
	if($uno == 'dosa')
	{
	$sum2 = 3;
	}
	else if($uno == 'dosb')
	{
	$sum2 = 2;	
	}
	else if($dos == 'dosc')
	{
	$sum2 = 1;	
	}
}
else
{
	$sum2 = 0;
}

if (isset($_POST['tres']))  
{
	$uno = $_POST['tres'];
	if($uno == 'tresa')
	{
	$sum3 = 3;
	}
	else if($uno == 'tresb')
	{
	$sum3 = 2;	
	}
	else if($dos == 'tresc')
	{
	$sum3 = 1;	
	}
}
else
{
	$sum3 = 0;
}

if (isset($_POST['cuatro']))  
{
	$uno = $_POST['cuatro'];
	if($uno == 'cuatroa')
	{
	$sum4 = 3;
	}
	else if($uno == 'cuatrob')
	{
	$sum4 = 2;	
	}
	else if($dos == 'cuatroc')
	{
	$sum4 = 1;	
	}
}
else
{
	$sum4 = 0;
}

if (isset($_POST['cinco']))  
{
	$uno = $_POST['cinco'];
	if($uno == 'cincoa')
	{
	$sum5 = 3;
	}
	else if($uno == 'cincob')
	{
	$sum5 = 2;	
	}
	else if($dos == 'cincoc')
	{
	$sum5 = 1;	
	}
}
else
{
	$sum5 = 0;
}

if (isset($_POST['seis']))  
{
	$uno = $_POST['seis'];
	if($uno == 'seisa')
	{
	$sum6 = 3;
	}
	else if($uno == 'seisb')
	{
	$sum6 = 2;	
	}
	else if($dos == 'seisc')
	{
	$sum6 = 1;	
	}
}
else
{
	$sum6 = 0;
}
if (isset($_POST['siete']))  
{
	$uno = $_POST['siete'];
	if($uno == 'sietea')
	{
	$sum7 = 3;
	}
	else if($uno == 'sieteb')
	{
	$sum7 = 2;	
	}
	else if($uno == 'sietec')
	{
	$sum7 = 1;	
	}
}
else
{
	$sum7 = 0;
}

if (isset($_POST['ocho']))  
{
	$uno = $_POST['ocho'];
	if($uno == 'ochoa')
	{
	$sum8 = 3;
	}
	else if($uno == 'ochob')
	{
	$sum8 = 2;	
	}
	else if($dos == 'ochoc')
	{
	$sum8 = 1;	
	}
}
else
{
	$sum8 = 0;
}

if (isset($_POST['nueve']))  
{
	$uno = $_POST['nueve'];
	if($uno == 'nuevea')
	{
	$sum9 = 3;
	}
	else if($uno == 'nueveb')
	{
	$sum9 = 2;	
	}
	else if($dos == 'nuevec')
	{
	$sum9 = 1;	
	}
}
else
{
	$sum9 = 0;
}
if (isset($_POST['diez']))  
{
	$uno = $_POST['diez'];
	if($uno == 'dieza')
	{
	$sum10 = 3;
	}
	else if($uno == 'diezb')
	{
	$sum10 = 2;	
	}
	else if($dos == 'diezc')
	{
	$sum10 = 1;	
	}
}
else
{
	$sum10 = 0;
}

if (isset($_POST['once']))  
{
	$uno = $_POST['once'];
	if($uno == 'oncea')
	{
	$sum11 = 3;
	}
	else if($uno == 'onceb')
	{
	$sum11 = 2;	
	}
	else if($dos == 'oncec')
	{
	$sum11 = 1;	
	}
}
else
{
	$sum11 = 0;
}

if (isset($_POST['doce']))  
{
	$uno = $_POST['doce'];
	if($uno == 'docea')
	{
	$sum12 = 3;
	}
	else if($uno == 'doceb')
	{
	$sum12 = 2;	
	}
	else if($dos == 'docec')
	{
	$sum12 = 1;	
	}
}
else
{
	$sum12 = 0;
}

if (isset($_POST['trece']))  
{
	$uno = $_POST['trece'];
	if($uno == 'trecea')
	{
	$sum13 = 3;
	}
	else if($uno == 'treceb')
	{
	$sum13 = 2;	
	}
	else if($dos == 'trecec')
	{
	$sum13 = 1;	
	}
}
else
{
	$sum13 = 0;
}
if (isset($_POST['catorce']))  
{
	$uno = $_POST['catorce'];
	if($uno == 'catorcea')
	{
	$sum14 = 3;
	}
	else if($uno == 'catorceb')
	{
	$sum14 = 2;	
	}
	else if($dos == 'catorcec')
	{
	$sum14 = 1;	
	}
}
else
{
	$sum14 = 0;
}

if (isset($_POST['quince']))  
{
	$uno = $_POST['quince'];
	if($uno == 'quincea')
	{
	$sum15 = 3;
	}
	else if($uno == 'quinceb')
	{
	$sum15 = 2;	
	}
	else if($dos == 'quincec')
	{
	$sum15 = 1;	
	}
}
else
{
	$sum15 = 0;
}

if (isset($_POST['dieciseis']))  
{
	$uno = $_POST['dieciseis'];
	if($uno == 'dieciseisa')
	{
	$sum16 = 3;
	}
	else if($uno == 'dieciseisb')
	{
	$sum16 = 2;	
	}
	else if($dos == 'dieciseisc')
	{
	$sum16 = 1;	
	}
}
else
{
	$sum16 = 0;
}
if (isset($_POST['diecisiete']))  
{
	$uno = $_POST['diecisiete'];
	if($uno == 'diecisietea')
	{
	$sum17 = 3;
	}
	else if($uno == 'diecisieteb')
	{
	$sum17 = 2;	
	}
	else if($dos == 'diecisietec')
	{
	$sum17 = 1;	
	}
}
else
{
	$sum17 = 0;
}
if (isset($_POST['dieciocho']))  
{
	$uno = $_POST['dieciocho'];
	if($uno == 'dieciochoa')
	{
	$sum18 = 3;
	}
	else if($uno == 'dieciochob')
	{
	$sum18 = 2;	
	}
	else if($dos == 'dieciochoc')
	{
	$sum18 = 1;	
	}
}
else
{
	$sum18 = 0;
}

$PUNTOS = $sum1 + $sum2 + $sum3 + $sum4 + $sum5 + $sum6 + $sum7 + $sum8;
$PUNTOS1 = $sum9 + $sum10 + $sum11 + $sum12 + $sum13 + $sum14 + $sum15;
$PUNTOS2 = $sum16 + $sum17 + $sum18;

$PUNTOS = ($PUNTOS / 8)  *  0.5;
$PUNTOS1 = ($PUNTOS1 / 7)  *  0.4;
$PUNTOS2 = ($PUNTOS2 / 3)  *  1;

$PUNTOS3 = $PUNTOS + $PUNTOS1 + $PUNTOS2;

$sql01="UPDATE TI SET PUNTOS = '".$PUNTOS3."',ESTADO= 'EN PROCESO' WHERE CODIGO_TI = '".$CODIGO."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());


echo '<script language = javascript>
alert("OK")
self.location = "TiDescripcion.php?CODIGO_TI='.$CODIGO.'"
</script>';

?>