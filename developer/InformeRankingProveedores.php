<?php require_once('Conexion/Conexion.php'); ?>
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

$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO = "";
$PROVEEDOR = "";
$CODIGO_PRODUCTO = "";

$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
if (isset($_GET["buscar"])) 
{    

if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}

if($_GET["proveedor"] != "")
{
	$PROVEEDOR = $_GET["proveedor"];
}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Informe Ranking V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
 
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link rel="stylesheet" href="style/estilopopup.css" />
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript>
  
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  }); 
      
	  
	  
	    
  
  $(function(){
                $('#proveedor').autocomplete({
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


	  
  </script>

</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="get">
<center>

<h1>Informe Ranking OC Provedores</h1>


<table  id = "tabla_ranking_proveedor_form" >
<tr>
  
  </tr>
<tr>
<td height=""><center>Desde</center></td>
<td><input class="textbox" name="txt_desde" id="txt_desde" type="text" /></td>
<td><center>Hasta</center></td>
<td><input class="textbox" name="txt_hasta" id="txt_hasta" type="text" /></td>
<td width=""><center>Proveedor</center></td>
<td width=""><input class="textbox" name="proveedor" id="proveedor" type="text" /></td>
<td> <input class="boton_ranking_producto" type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
</tr>

</table>



</center>
</form>
<br />
<center>  
<table width='100%' id ='tabla_ranking_producto' rules="all" frame="box" style="">
<tr>
<th>Numero</th>
<!--<th>Fecha Emision</th>-->
<th>Proveedor</th>
<th>Monto</th>
<th>Cantidad OC</th>

<th>Cantidad OC Mensuales</th>
<th>Cantidad OC Trimestral</th>
<th>Cantidad OC Semestral</th>

<th>Compras Mensuales</th>
<th>Compras Trimestral</th>
<th>Compras Semestral</th>

</tr>
<?php

/////////////////
/////////////
//////////////
$TOTAL_SUM = 0;
$CANTIDAD_OC_SUM = 0;

$total_mes1 = 0;
$total_mes1_SUM = 0;
$total_mes2 = 0;
$total_mes2_SUM = 0;
$total_mes = 0;
 $total_mes_SUM = 0;
$CANTIDAD_OC1 = 0;
$CANTIDAD_OC1_SUM = 0;
$CANTIDAD_OC2 = 0;
$CANTIDAD_OC2_SUM = 0;
$CANTIDAD_OC3 = 0;
$CANTIDAD_OC3_SUM = 0;

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),30);

function dameFecha3($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}

$fecha8 = dameFecha3(date('d/m/Y'),90);

function dameFecha4($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}

$fecha9 = dameFecha4(date('d/m/Y'),180);



mysql_select_db($database_conn, $conn);

if($_GET["proveedor"] != "")
{
$query_registro = "SELECT orden_de_compra.FECHA_REALIZACION,proveedor.CODIGO_PROVEEDOR,proveedor.RAZON_SOCIAL, sum(orden_de_compra.NETO) as total  FROM orden_de_compra, proveedor, oc_proveedor where proveedor.CODIGO_PROVEEDOR = oc_proveedor.CODIGO_PROVEEDOR AND oc_proveedor.CODIGO_OC = orden_de_compra.CODIGO_OC  and orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and proveedor.NOMBRE_FANTASIA = '".$PROVEEDOR."' and not orden_de_compra.ESTADO = 'NULO' GROUP BY proveedor.NOMBRE_FANTASIA ORDER BY sum(orden_de_compra.NETO) DESC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
}
else
{ 

$query_registro = "SELECT orden_de_compra.FECHA_REALIZACION,proveedor.CODIGO_PROVEEDOR,proveedor.RAZON_SOCIAL, sum(orden_de_compra.NETO) as total FROM orden_de_compra, proveedor,oc_proveedor where proveedor.CODIGO_PROVEEDOR = oc_proveedor.CODIGO_PROVEEDOR AND oc_proveedor.CODIGO_OC = orden_de_compra.CODIGO_OC  and orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."'  and not orden_de_compra.ESTADO = 'NULO' GROUP BY proveedor.NOMBRE_FANTASIA ORDER BY sum(orden_de_compra.NETO) DESC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
}
$numero = 1;

 while($row = mysql_fetch_array($result))
  { 
        
  $RAZON_SOCIAL= $row["RAZON_SOCIAL"]; 
  $CODIGO_PROVEEDOR= $row["CODIGO_PROVEEDOR"]; 
  $TOTAL= $row["total"]; 
  $TOTAL_SUM+=$row['total'];

  
    $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.CODIGO_PROVEEDOR = '".($CODIGO_PROVEEDOR)."' and orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and not orden_de_compra.ESTADO = 'NULO' GROUP BY proveedor.RAZON_SOCIAL  ";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC = $row["can"];
		$CANTIDAD_OC_SUM+=$row['can'];
  }
  mysql_free_result($result1);
   
   
   
   
///////////CAN OC POR MES   
       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.CODIGO_PROVEEDOR = '".($CODIGO_PROVEEDOR)."'  and orden_de_compra.FECHA_REALIZACION between '".$fecha7."' and '".date('Y-m-d')."' and not orden_de_compra.ESTADO = 'NULO'  GROUP BY proveedor.RAZON_SOCIAL";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC1 = $row["can"];
		$CANTIDAD_OC1_SUM+=$row['can'];
  }
  

  mysql_free_result($result1);
///////////////
   
   
   
   
   
   ///////////CAN OC POR TRIMESTRE   
       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.CODIGO_PROVEEDOR = '".($CODIGO_PROVEEDOR)."'  and orden_de_compra.FECHA_REALIZACION between '".$fecha8."' and '".date('Y-m-d')."' and not orden_de_compra.ESTADO = 'NULO'  GROUP BY proveedor.RAZON_SOCIAL";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC2 = $row["can"];
	   $CANTIDAD_OC2_SUM+=$CANTIDAD_OC2;
  }
  
   
  mysql_free_result($result1);
///////////////
   
   
   
   
   
   ///////////CAN OC POR SEMESTRE

       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.CODIGO_PROVEEDOR = '".($CODIGO_PROVEEDOR)."'  and orden_de_compra.FECHA_REALIZACION between '".$fecha9."' and '".date('Y-m-d')."' and not orden_de_compra.ESTADO = 'NULO' GROUP BY proveedor.RAZON_SOCIAL";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC3 = $row["can"];
     $CANTIDAD_OC3_SUM+=$CANTIDAD_OC3;
  }
  
 
  mysql_free_result($result1);
///////////////
/////POR MES   

     $query_registro3 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha7."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK' and proveedor.CODIGO_PROVEEDOR  = '".($CODIGO_PROVEEDOR)."' and not orden_de_compra.ESTADO = 'NULO'  ORDER BY sum(orden_de_compra.NETO) DESC";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result3))
  { 
  $total_mes = $row["ttotal"];
     }
	 
	  if($total_mes !=0)
  {
  $total_mes= $total_mes / 1 ;
   $total_mes_SUM+=$total_mes;
  }
  else
  {
	    $total_mes = 0;
  } 
/////	 
	 
	 
/////POR TRIMESTRE   
     $query_registro4 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha8."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK'and proveedor.CODIGO_PROVEEDOR  = '".($CODIGO_PROVEEDOR)."' and not orden_de_compra.ESTADO = 'NULO' ORDER BY sum(orden_de_compra.NETO) DESC";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result4))
  { 
  $total_mes1 = $row["ttotal"];
     }
	 
	  if($total_mes1 !=0)
  {
  $total_mes1 = $total_mes1 / 3 ;
    $total_mes1_SUM+=$total_mes1;
  }
  else
  {
	    $total_mes1 = 0;
  } 
/////	 
/////POR SEMESTRE

     $query_registro5 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha9."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK' and proveedor.CODIGO_PROVEEDOR  = '".($CODIGO_PROVEEDOR)."' and not orden_de_compra.ESTADO = 'NULO'  ORDER BY sum(orden_de_compra.NETO) DESC";
$result5 = mysql_query($query_registro5, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result5))
  { 
  $total_mes2 = $row["ttotal"];
     }
	
	  if($total_mes2 !=0)
  {
  $total_mes2 = $total_mes2 / 6 ;
    $total_mes2_SUM+=$total_mes2;
  }
  else
  {
	    $total_mes2 = 0;
  } 
/////	 
	 
	 
	 
	 
  

 
   echo '<tr><td align="center">'.$numero.'</td>';
   echo '<td>'.($RAZON_SOCIAL).'</td>';
   echo '<td align="right">'.number_format($TOTAL,0, ",", ".").'</td>';
   echo '<td align="center">'.number_format($CANTIDAD_OC,0, ",", ".").'</td>';
   echo '<td align="right">'.number_format($CANTIDAD_OC1,0, ",", ".").'</td>';
	 echo '<td align="right">'.number_format($CANTIDAD_OC2,0,',','.').'</td>';
	 echo '<td align="right">'.number_format($CANTIDAD_OC3,0,',','.').'</td>';
   echo '<td align="right">'.number_format($total_mes,0, ",", ".").'</td>';
	 echo '<td align="right">'.number_format($total_mes1,0, ",", ".").'</td>';
	 echo '<td align="right">'.number_format($total_mes2,0, ",", ".").'</td>';
   echo '</tr>';
   
   $numero++;
  }



  mysql_free_result($result);
  mysql_close($conn);
  
    echo '</tr>'; 
    echo '<tr><td colspan="2">Total</td>';
    echo '<td align="right">'.number_format( $TOTAL_SUM,0, ",", ".").'</td>';
    echo '<td align="center">'.number_format($CANTIDAD_OC_SUM,0, ",", ".").'</td>';
    echo '<td align="right">'.number_format($CANTIDAD_OC1,0, ",", ".").'</td>';
	  echo '<td align="right">'.number_format($CANTIDAD_OC2_SUM,0,',','.').'</td>';
		echo '<td align="right">'.number_format($CANTIDAD_OC3_SUM,0,',','.').'</td>';
	  echo '<td align="right">'.number_format($total_mes_SUM,0, ",", ".").'</td>';
	  echo '<td align="right">'.number_format($total_mes1_SUM,0, ",", ".").'</td>';
		echo '<td align="right">'.number_format($total_mes2_SUM,0, ",", ".").'</td>';
    echo '</tr>'; 
   
?>
</table>
</center> 
</body>
</html>
