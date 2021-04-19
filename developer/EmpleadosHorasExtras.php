<?php require_once('Conexion/Conexion.php');?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);

$RUT_EMPLEADO = "";

if (isset($_GET["buscar"]))
{
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_NOMBRE = $_GET['buscar_nombre'];
$BUSCAR_AREA = $_GET['buscar_area'];
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
else
{
$BUSCAR_CODIGO = "";
$BUSCAR_NOMBRE = "";
$BUSCAR_AREA = "";	
$txt_desde = "";
$txt_hasta = "";
}


//
//$fecha = new DateTime();
//$fecha->modify('first day of this month');
//$txt_desde = $fecha->format('Y-m-d');

//$fecha = new DateTime();
//$fecha->modify('last day of this month');
//$txt_hasta= $fecha->format('Y-m-d');

$month = date('m');
$year = date("Y");
$txt_hasta = date("Y-m-d",(mktime(0,0,0,$month+1,1,$year)-1));
$txt_desde = date("Y-m-d",(mktime(0,0,0,$month-1,1,$year)+1));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Horas Extras</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_Empleadohe.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
   <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
    <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
  
  <script language = javascript> 
  
 function fecha()
  {
	   $( "#fechai").datepicker ({dateFormat: 'yy-mm-dd'});
  }  
  
  function reingreso() 
{
//location.href= "abastecimiento.html";
window.open("IngresoEmpleado.php");
//window.open("Empleados.php");
} 
  
  $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
			
			  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });     
 </script>
 
</head>

<body>
	
			<div>
            <center><h1> Horas Extras Empleados </h1></center>
            </div>
            <br />
	  <div  id="header">
      </div><!--close header-->	  			   
  	  
  <form  method="GET"/>      
  <center><table>
  <tr>
  <td> Rut: </td>
  <td> <input type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /></td> 
  <td width="80px"></td>
   <td> Nombre: </td>
  <td> <input type="text" autocomplete="off" id="buscar_nombre" name="buscar_nombre" /></td>
    <td width="80px"></td>
    <td> Area: </td>
  <td><select style=" width:99%;" onchange="" id = "buscar_area" name="buscar_area">
<option></option> 
<option>PRODUCCION</option>
<option>ADQUISICIONES</option>
<option>BODEGA</option>
<option>DESPACHO</option>
<option>INSTALACIONES</option>
<option>COMERCIAL</option>
<option>FINANZAS</option>
<option>RRHH</option>
<option>SISTEMA</option>
<option>DESARROLLO</option>
<option>SILLAS</option>
<option>GERENCIA</option>
<option>DAM</option>
<option>OPERACIONES</option>
</select></td>
 <td width="100"><center>Desde</center></td>
<td width="100"><input name="txt_desde" id="txt_desde" type="text" /></td>
<td width="100"><center>Hasta</center></td>
<td width="100"><input name="txt_hasta" id="txt_hasta" type="text" /></td>
 <td> <input type="submit" name = "buscar" id='buscar' value="Buscar"/></td>
<td width="70" align="right"><a href="ExcelHorasExtras.php?buscar_codigo=<?php echo urldecode($BUSCAR_CODIGO);?>&buscar_nombre=<?php echo urldecode($BUSCAR_NOMBRE);?>&buscar_area=<?php echo urlencode($BUSCAR_AREA);?>&txt_desde=<?php echo urlencode($txt_desde);?>&txt_hasta=<?php echo urlencode($txt_hasta);?>" target="_blank"><img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a></td>
   </tr>
  </table></center>	
 </form>
 
<br />

<div class="datagrid1">
<table id="title" border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt">

<tr>
<th><center>Rut</center></th>
<th><center>Nombre</center></th>
<th><center>Dias Laborales</center></th>
<th><center>Dias Trabajado</center></th>
<th><center>Dia Faltados C</center></th>
<th><center>Dia Faltados S</center></th>
<th><center>Licencia</center></th>
<th><center>Vacaciones</center></th>
<th><center>Hora Extra</center></th>
<th><center>Hora Decuento</center></th>
<th><center>Colacion L - V</center></th>
<th><center>Colacion Extra S - D</center></th>
<th><center>Locomocion L - V</center></th>
<th><center>Locomocion Extra S - D</center></th>
<th><center>Area</center></th>
</tr>

<?php
$BUSCAR_CODIGO = "";
$FALTADOS = "";
$BUSCAR_DESCRIPCION = "";
$BUSCAR_NOMBRE = "";
$BUSCAR_AREA = "";
$txt_desde = "";
$txt_hasta = "";

//
//$fecha = new DateTime();
//$fecha->modify('first day of this month');
//$txt_desde = $fecha->format('Y-m-d');

//$fecha = new DateTime();
//$fecha->modify('last day of this month');
//$txt_hasta= $fecha->format('Y-m-d');

$month = date('m');
$year = date("Y");
$txt_hasta = date("Y-m-d",(mktime(0,0,0,$month+1,1,$year)-1));
$txt_desde = date("Y-m-d",(mktime(0,0,0,$month-1,1,$year)+1));
//listado de materiales
if (isset($_GET["buscar"]))
{
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_NOMBRE = $_GET['buscar_nombre'];
$BUSCAR_AREA = $_GET['buscar_area'];


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
  $FALTADOS = "";
  $FALTADOSS = "";
  $LICENCIA= "";
  $VACACIONES= "";
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
  
     $query_registro17 = "SELECT horas_extras.FALTADO_C FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result17 = mysql_query($query_registro17, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result17))///5
  {	
     $FALTADOS+=$row['FALTADO_C'];
  }////5
  
       $query_registro17 = "SELECT horas_extras.FALTADO_S FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result17 = mysql_query($query_registro17, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result17))///5
  {	
     $FALTADOSS+=$row['FALTADO_S'];
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
  
        $query_registro19= "SELECT horas_extras.LICENCIA FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result19 = mysql_query($query_registro19, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result19))///5
  {	
     $LICENCIA+=$row['LICENCIA'];
  }////5
  
$query_registro19= "SELECT horas_extras.VACACIONES FROM empleado,horas_extras WHERE horas_extras.RUT = empleado.RUT AND EMPLEADO.RUT = '".$RUT_EMPLEADO."' and FECHA between '".$txt_desde."' and '".$txt_hasta."'";
$result19 = mysql_query($query_registro19, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result19))///5
  {	
     $VACACIONES+=$row['VACACIONES'];
  }////5
  if($LABORALES != "")
  {
  $RESTA = $LABORALES - $FALTADOS - $FALTADOSS;
  }
  else
  {
  $RESTA = "";
  }
     echo "<tbody><tr><td onclick=TINY.box.show({url:'generarhe.php?RUT=" .urlencode($RUT_EMPLEADO																																																																																																																																																																																																																																																																																																																																																																																										). "&buscar_codigo=" . urlencode($BUSCAR_CODIGO). "&buscar_nombre=" . urlencode($BUSCAR_NOMBRE)."&buscar_area=" . urlencode($BUSCAR_AREA)."&txt_desde=".urlencode($txt_desde)."&txt_hasta=" . urlencode($txt_hasta). "'})><center> ".$RUT_EMPLEADO . "</center></td>";
     echo "<td id = 'des'><center>" . 
	    ($NOMBRES_EMPLEADO)." ".($APELLIDO_PATERNO)."</center></td>";
	 echo "<td><center>".$LABORALES."</center></td>";
     echo "<td><center>".$RESTA."</center></td>";
     echo "<td><center>".$FALTADOS."</center></td>";
	 echo "<td><center>".$FALTADOSS."</center></td>";
	 	 echo "<td><center>".$LICENCIA."</center></td> "; 
	 echo "<td><center>".$VACACIONES."</center></td> "; 
     echo "<td><center>".$final1."</center></td>";
     echo "<td><center>".$final."</center></td>";
     echo "<td><center>".$fin."</center></td>"; 
	 echo "<td><center>". $COLACIONEX ."</center></td>";
     echo "<td><center>".$fin1."</center></td> "; 
	 echo "<td><center>".$LOCOMOCIONX."</center></td> "; 
	 echo "<td><center>".$AREA."</center></td> </tr></tbody>"; 	
    $numero++;
  }////1
  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  
  mysql_free_result($result);
  

?>
 </table>
 </div>
</body>
</html>
