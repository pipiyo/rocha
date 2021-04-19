<?php require_once('Conexion/Conexion.php');?>
<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">
<head>  
<title> </title>

<style>
body 
{
   font-family: tahoma,arial,sans-serif; 
}  

h2 
{
    color:#4E4E4E;
    font-weight:bold;
}

p 
{
    color:#666;
}

legend 
{
    color:#0168B3;
    font-family: Arial;
}

 th {
    background-color:#F3F;
	font-size: 10px !important;
    color:#fff;
}

tbody tr:nth-child(2n) td, tbody tr.even td {
    background-color:#ECECEC;
}

table td {
    border: 1px solid #ECECEC;
    padding: 5px;
	font-size: 10px !important;
    color:#646464;
}

.boton 
{
    background-color:#EE3A43;
    border:0;
    color:#FFF;
    padding:5px 20px;
    cursor:pointer;
}

.boton_limpiar 
{
    background-color:#B8D45A;
    border:0;
    color:#5E7C38;
    padding:3px 10px;
    cursor:pointer;
}

.boton:hover 
{
    background-color:#769056;    
}

.boton_limpiar:hover 
{
    background-color:#C7DD7F;
}

.page {
    width: 950px;
}

.menu {
    border: 0 none;
    font-family: tahoma,arial,sans-serif;
    font-size: 12px;
}

#header #title .TituloPanelCADEM {
    font-family: tahoma,arial,sans-serif;
}

.display-label, .editor-label {
    margin: 0 0 1.5em;
}

#main {   
    float:left;
    
}

textarea.roles_textarea 
{
    width:190px;
    height:50px;
}


.borde
{
	border: 1px solid #ccc;
}
</style>

</head>

<body>

<table>

<tr>
<th><center>Rut</center></th>
<th><center>Nombre</center></th>
<th><center>Dias Laborales</center></th>
<th><center>Dias Trabajado</center></th>
<th><center>Dia Faltados</center></th>
<th><center>Hora Extra</center></th>
<th><center>Hora Decuento</center></th>
<th><center>Colacion</center></th>
<th><center>Colacion Extra</center></th>
<th><center>Locomocion</center></th>
<th><center>Locomocion Extra</center></th>
<th><center>Area</center></th>
</tr>
<?php
mysql_select_db($database_conn, $conn);

$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_NOMBRE = $_GET['buscar_nombre'];
$BUSCAR_AREA = $_GET['buscar_area'];
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];

if($txt_desde != "" && $txt_hasta != "" )
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];

if($txt_desde == "" && $txt_hasta == "")
{
	$txt_hasta = date("Y-m-d",(mktime(0,0,0,$month+1,1,$year)-1));
$txt_desde = date("Y-m-d",(mktime(0,0,0,$month-1,1,$year)+1));
}

}
if($BUSCAR_CODIGO != "" && $BUSCAR_NOMBRE != "" && $BUSCAR_AREA == "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.AREA,empleado.RUT,empleado.NOMBRES,empleado.APELLIDO_PATERNO, empleado.APELLIDO_MATERNO, concat(NOMBRES,' ',APELLIDO_PATERNO,' ',APELLIDO_MATERNO) AS nombres
from empleado WHERE empelado.RUT = '".$BUSCAR_CODIGO."'";
}
if($BUSCAR_CODIGO != "" && $BUSCAR_NOMBRE == ""  && $BUSCAR_AREA == "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.AREA, empleado.RUT, empleado.NOMBRES, empleado.APELLIDO_PATERNO, empleado.APELLIDO_MATERNO, concat(NOMBRES,' ',APELLIDO_PATERNO,' ',APELLIDO_MATERNO) AS nombres
from empleado WHERE empleado.RUT = '".$BUSCAR_CODIGO."'";
}
if($BUSCAR_CODIGO == "" && $BUSCAR_NOMBRE != "" && $BUSCAR_AREA == "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.AREA, empleado.RUT, empleado.NOMBRES, empleado.APELLIDO_PATERNO, empleado.APELLIDO_MATERNO, concat(NOMBRES,' ',APELLIDO_PATERNO,' ',APELLIDO_MATERNO) AS nombres
from empleado HAVING nombres like '%".($BUSCAR_NOMBRE)."%'";
}
if($BUSCAR_CODIGO == "" && $BUSCAR_NOMBRE == "" && $BUSCAR_AREA != "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.AREA, empleado.RUT, empleado.NOMBRES, empleado.APELLIDO_PATERNO, empleado.APELLIDO_MATERNO
from empleado WHERE AREA = '".($BUSCAR_AREA)."'";
}

if($BUSCAR_CODIGO == "" && $BUSCAR_NOMBRE == "" && $BUSCAR_AREA == "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM  empleado";
}


function dameFecha($fecha,$fecha1)
{   
list($hor,$min,$seg) = explode(':',$fecha);

$segundos_horaInicial=strtotime($fecha1);

$segundos_minutoAnadir= $min * 60;
$segundos_minutoAnadir1= ($hor * 3600) + $segundos_minutoAnadir ;
       
	   $nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir1);
	   
return $nuevaHora;        
}

function sumahoras ($hora1,$hora2)
{
$hora1=explode(":",$hora1);
$hora2=explode(":",$hora2);
$horas=(int)$hora1[0]+(int)$hora2[0];
$minutos=(int)$hora1[1]+(int)$hora2[1];
$segundos=(int)$hora1[2]+(int)$hora2[2];
$horas+=(int)($minutos/60);
$minutos=(int)($minutos%60)+(int)($segundos/60);
$segundos=(int)($segundos%60);
return (intval($horas)<10?'0'.intval($horas):intval($horas)).':'.($minutos<10?'0'.$minutos:$minutos).':'.($segundos<10?'0'.$segundos:$segundos);
}



$final = "";

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result))///1
  {	  
  $RUT_EMPLEADO = $row["RUT"];
  $AREA = $row["AREA"];
  $NOMBRES_EMPLEADO = $row["NOMBRES"];
  $APELLIDO_PATERNO = $row["APELLIDO_PATERNO"];
  $APELLIDO_MATERNO = $row["APELLIDO_MATERNO"];
  $final = "";
  $final1 = "";
  $fin = "";
  $fin1 = "";
  $LABORALES = "";
  $TRABAJADOS = "";
  $COLACIONEX = "";
  $LOCOMOCIONX = "";
$query_registro1 = "SELECT horas_extras.HORA_DESCUENTO FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
$cuenta = 0;
 while($row = mysql_fetch_array($result1))///2
  {	
   $DESCUENTO = $row['HORA_DESCUENTO'];
   if($cuenta == 0)
   {
   $DES = '00:00:00';
   }
   else
   {
   $DES = $n ;   
   }
   $n =  sumahoras($DESCUENTO,$DES);
   $final =  sumahoras($DESCUENTO,$DES);
   $cuenta++;
  }////2  
  
 $query_registro12 = "SELECT horas_extras.HORA_EXTRA FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result12 = mysql_query($query_registro12, $conn) or die(mysql_error());
$cuenta1 = 0;
 while($row = mysql_fetch_array($result12))///3
  {	
   $DESCUENTO1 = $row['HORA_EXTRA'];
   if($cuenta1 == 0)
   {
   $DES1 = '00:00:00';
   }
   else
   {
   $DES1 = $n1 ;   
   }
   $n1 =  sumahoras($DESCUENTO1,$DES1);
   $final1 =  sumahoras($DESCUENTO1,$DES1);
   $cuenta1++;
  }////3 
  
$query_registro13 = "SELECT horas_extras.COLACION FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result13 = mysql_query($query_registro13, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result13))///4
  {	
     $fin+=$row['COLACION'];
  }////4   
  $query_registro14 = "SELECT horas_extras.LOCOMOCION FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result14 = mysql_query($query_registro14, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result14))///5
  {	
     $fin1+=$row['LOCOMOCION'];
  }////5 
  
    $query_registro16 = "SELECT horas_extras.DIA_LABORALES FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result16 = mysql_query($query_registro16, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result16))///5
  {	
     $LABORALES+=$row['DIA_LABORALES'];
  }////5 
  
     $query_registro17 = "SELECT horas_extras.DIAS_TRABAJADO FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result17 = mysql_query($query_registro17, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result17))///5
  {	
     $TRABAJADOS+=$row['DIAS_TRABAJADO'];
  }////5
  
       $query_registro18 = "SELECT horas_extras.COLACIONES_EXTRAS FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result18 = mysql_query($query_registro18, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result18))///5
  {	
     $COLACIONEX+=$row['COLACIONES_EXTRAS'];
  }////5
  
       $query_registro19= "SELECT horas_extras.LOCOMOCION_EXTRAS FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result19 = mysql_query($query_registro19, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result19))///5
  {	
     $LOCOMOCIONX+=$row['LOCOMOCION_EXTRAS'];
  }////5
  if($LABORALES != "")
  {
  $RESTA = $LABORALES - $TRABAJADOS;
  }
  else
  {
  $RESTA = "";
  }
     echo "<tbody><tr><td onclick=TINY.box.show({url:'generarhe.php?RUT=" .urlencode($RUT_EMPLEADO																																																																																																																																																																																																																																																																																																																																																																																										). "&buscar_codigo=" . urlencode($BUSCAR_CODIGO). "&buscar_nombre=" . urlencode($BUSCAR_NOMBRE)."&buscar_area=" . urlencode($BUSCAR_AREA)."&txt_desde=".urlencode($txt_desde)."&txt_hasta=" . urlencode($txt_hasta). "'})><center> ".$RUT_EMPLEADO . "</center></td>";
     echo "<td id = 'des'><center>" . 
	    ($NOMBRES_EMPLEADO)." ".($APELLIDO_PATERNO)."</center></td>";
	 echo "<td><center>".$LABORALES."</center></td>";
     echo "<td><center>".$TRABAJADOS."</center></td>";
     echo "<td><center>".$RESTA."</center></td>";
     echo "<td><center>".$final1."</center></td>";
     echo "<td><center>".$final."</center></td>";
     echo "<td><center>".$fin."</center></td>"; 

	 echo "<td><center>". $COLACIONEX ."</center></td>";
     echo "<td><center>".$fin1."</center></td> "; 
	 echo "<td><center>".$LOCOMOCIONX."</center></td> "; 
	 echo "<td><center>".$AREA."</center></td> </tr></tbody>"; 	
    $numero++;
  }////1
  echo "<tr class=\"alt\"><td colspan=\"12\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  
  mysql_free_result($result);

  mysql_close($conn);
?>
</table>
</body>

</html>