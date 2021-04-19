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
    background-color:#000;
	font-size: 10px !important;
    color:#FFF;
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
<?php
mysql_select_db($database_conn, $conn);

$dia = date('Y-m-d');

$PROVEEDOR = $_GET["proveedor"];


$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];

$total_mes1 = 0;
$total_mes2 = 0;
$total_mes = 0;

$CANTIDAD_OC1 = 0;
$CANTIDAD_OC2 = 0;
$CANTIDAD_OC3 = 0;


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



///////////////////
////////////////////
//////////////





 echo " <tr><td>&nbsp; </td></tr><tr><td align='left'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
echo '<tr>';
echo '<th>Numero</th>';
echo '<!--<th>Fecha Emision</th>-->';
echo '<th>Proveedor</th>';
echo '<th>Monto</th>';
echo '<th>Cantidad OC</th>';

echo '<th>Cantidad OC Mensuales</th>';
echo '<th>Cantidad OC Trimestral</th>';
echo '<th>Cantidad OC Semestral</th>';

echo '<th>Compras Mensuales</th>';
echo '<th>Compras Trimestral</th>';
echo '<th>Compras Semestral</th>';

echo '</tr>';










if($_GET["proveedor"] != "")
{
	
	
	

	

mysql_select_db($database_conn, $conn);

$query_registro = "SELECT orden_de_compra.FECHA_REALIZACION,proveedor.RAZON_SOCIAL, sum(orden_de_compra.NETO) as total FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."' and proveedor.NOMBRE_FANTASIA = '".$PROVEEDOR."' and orden_de_compra.ESTADO = 'OK' GROUP BY orden_de_compra.NOMBRE_PROVEEDOR ORDER BY sum(orden_de_compra.NETO) DESC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());

$numero = 1;
 while($row = mysql_fetch_array($result))
  { 
        
  $RAZON_SOCIAL= $row["RAZON_SOCIAL"]; 
  $TOTAL= $row["total"]; 
    
$query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."' and proveedor.NOMBRE_FANTASIA = '".$PROVEEDOR."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC = $row["can"];
  }
   mysql_free_result($result1);
   
   
   
   
   
      
///////////CAN OC POR MES   
       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC1 = $row["can"];
  }
  
   if($CANTIDAD_OC1 !=0)
  {
  $CANTIDAD_OC1 = $CANTIDAD_OC1 / 1 ;
  }
  else
  {
	    $CANTIDAD_OC1 = 0;
  } 
  mysql_free_result($result1);
///////////////
   
   
   
   
   
   ///////////CAN OC POR TRIMESTRE   
       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC2 = $row["can"];
  }
  
     if($CANTIDAD_OC2 !=0)
  {
  $CANTIDAD_OC2 = $CANTIDAD_OC2 / 3 ;
  }
  else
  {
	    $CANTIDAD_OC2 = 0;
  } 
  mysql_free_result($result1);
///////////////
   
   
   
   
   
   ///////////CAN OC POR SEMESTRE
       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC3 = $row["can"];
  }
  
     if($CANTIDAD_OC3 !=0)
  {
  $CANTIDAD_OC3 = $CANTIDAD_OC3 / 6 ;
  }
  else
  {
	    $CANTIDAD_OC3 = 0;
  } 
  mysql_free_result($result1);
///////////////
   
   
   
   
   
   
   
   


/////POR MES   
     $query_registro3 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha7."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK' and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."' and proveedor.NOMBRE_FANTASIA = '".$PROVEEDOR."' ORDER BY sum(orden_de_compra.NETO) DESC";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result3))
  { 
  $total_mes = $row["ttotal"];
     }
	 
	    if($total_mes !=0)
  {
  $total_mes= $total_mes / 1 ;
  }
  else
  {
	    $total_mes = 0;
  } 	 
/////	 
	 
	 
/////POR TRIMESTRE   
     $query_registro4 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha8."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK'and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."' and proveedor.NOMBRE_FANTASIA = '".$PROVEEDOR."' ORDER BY sum(orden_de_compra.NETO) DESC";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result4))
  { 
  $total_mes1 = $row["ttotal"];
     }
	 
	    if($total_mes1 !=0)
  {
  $total_mes1 = $total_mes1 / 3 ;
  }
  else
  {
	    $total_mes1 = 0;
  } 
/////	 
	 
	 
	 
	 
/////POR SEMESTRE
     $query_registro5 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha9."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK'and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."' and proveedor.NOMBRE_FANTASIA = '".$PROVEEDOR."' ORDER BY sum(orden_de_compra.NETO) DESC";
$result5 = mysql_query($query_registro5, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result5))
  { 
  $total_mes2 = $row["ttotal"];
     }
	 
	    if($total_mes2 !=0)
  {
  $total_mes2 = $total_mes2 / 6 ;
  }
  else
  {
	    $total_mes2 = 0;
  } 
/////	 
	 


 // $FECHA_REALIZACION= $row["FECHA_REALIZACION"]; 
   echo '<tr><td>'.$numero.'</td>';
  // echo '<td>'.($FECHA_REALIZACION).'</td>';
   echo '<td>'.($RAZON_SOCIAL).'</td>';
   echo '<td align="right">'.number_format($TOTAL,0, ",", ".").'</td>';
   echo '<td align="center">'.number_format($CANTIDAD_OC,0, ",", ".").'</td>';
     
	  echo '<td align="right">'.($CANTIDAD_OC1).'</td>';
	     echo '<td align="right">'.number_format($CANTIDAD_OC2,2,',','.').'</td>';
		    echo '<td align="right">'.number_format($CANTIDAD_OC3,2,',','.').'</td>';
			
			      echo '<td align="right">'.number_format($total_mes,0, ",", ".").'</td>';
	     echo '<td align="right">'.number_format($total_mes1,0, ",", ".").'</td>';
		    echo '<td align="right">'.number_format($total_mes2,0, ",", ".").'</td>';
			


   echo '</tr>'; 
   $numero++;
  }







////////////////////////////
}else {
//////////////////////////////








$query_registro = "SELECT orden_de_compra.FECHA_REALIZACION,proveedor.RAZON_SOCIAL, sum(orden_de_compra.NETO) as total FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$txt_desde."' and '".$txt_hasta."'  and orden_de_compra.ESTADO = 'OK' GROUP BY orden_de_compra.NOMBRE_PROVEEDOR ORDER BY sum(orden_de_compra.NETO) DESC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());

$numero = 1;

 while($row = mysql_fetch_array($result))
  { 
        
  $RAZON_SOCIAL= $row["RAZON_SOCIAL"]; 
  $TOTAL= $row["total"]; 
  

  
    $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC = $row["can"];
  }
  mysql_free_result($result1);
   
   
   
   
///////////CAN OC POR MES   
       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC1 = $row["can"];
  }
  
   if($CANTIDAD_OC1 !=0)
  {
  $CANTIDAD_OC1 = $CANTIDAD_OC1 / 1 ;
  }
  else
  {
	    $CANTIDAD_OC1 = 0;
  } 
  mysql_free_result($result1);
///////////////
   
   
   
   
   
   ///////////CAN OC POR TRIMESTRE   
       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC2 = $row["can"];
  }
  
     if($CANTIDAD_OC2 !=0)
  {
  $CANTIDAD_OC2 = $CANTIDAD_OC2 / 3 ;
  }
  else
  {
	    $CANTIDAD_OC2 = 0;
  } 
  mysql_free_result($result1);
///////////////
   
   
   
   
   
   ///////////CAN OC POR SEMESTRE
       $query_registro1 = "SELECT proveedor.RAZON_SOCIAL, COUNT(proveedor.CODIGO_PROVEEDOR) as can FROM oc_proveedor, orden_de_compra, proveedor WHERE orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC and oc_proveedor.CODIGO_PROVEEDOR = proveedor.CODIGO_PROVEEDOR and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());


while($row = mysql_fetch_array($result1))
  { 
		$CANTIDAD_OC3 = $row["can"];
  }
  
     if($CANTIDAD_OC3 !=0)
  {
  $CANTIDAD_OC3 = $CANTIDAD_OC3 / 6 ;
  }
  else
  {
	    $CANTIDAD_OC3 = 0;
  } 
  mysql_free_result($result1);
///////////////
   
   
   
   
   
   
   
   
/////POR MES   
     $query_registro3 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha7."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK'and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."' ORDER BY sum(orden_de_compra.NETO) DESC";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result3))
  { 
  $total_mes = $row["ttotal"];
     }
	 
	  if($total_mes !=0)
  {
  $total_mes= $total_mes / 1 ;
  }
  else
  {
	    $total_mes = 0;
  } 
/////	 
	 
	 
/////POR TRIMESTRE   
     $query_registro4 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha8."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK'and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."' ORDER BY sum(orden_de_compra.NETO) DESC";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result4))
  { 
  $total_mes1 = $row["ttotal"];
     }
	 
	  if($total_mes1 !=0)
  {
  $total_mes1 = $total_mes1 / 3 ;
  }
  else
  {
	    $total_mes1 = 0;
  } 
/////	 
	 
	 
	 
	 
/////POR SEMESTRE
     $query_registro5 = "SELECT sum(orden_de_compra.NETO) as ttotal FROM orden_de_compra, proveedor where proveedor.RAZON_SOCIAL = orden_de_compra.NOMBRE_PROVEEDOR and orden_de_compra.FECHA_REALIZACION between '".$fecha9."' and '".date('Y-m-d')."'  and orden_de_compra.ESTADO = 'OK' and proveedor.RAZON_SOCIAL = '".$RAZON_SOCIAL."'  ORDER BY sum(orden_de_compra.NETO) DESC";
$result5 = mysql_query($query_registro5, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result5))
  { 
  $total_mes2 = $row["ttotal"];
     }
	
	  if($total_mes2 !=0)
  {
  $total_mes2 = $total_mes2 / 6 ;
  }
  else
  {
	    $total_mes2 = 0;
  } 
/////	 
	 
	 
	 
	 
  

 // $FECHA_REALIZACION= $row["FECHA_REALIZACION"]; 
   echo '<tr><td align="center">'.$numero.'</td>';
  // echo '<td>'.($FECHA_REALIZACION).'</td>';
   echo '<td>'.($RAZON_SOCIAL).'</td>';
   echo '<td align="right">'.number_format($TOTAL,0, ",", ".").'</td>';
   echo '<td align="center">'.number_format($CANTIDAD_OC,0, ",", ".").'</td>';
   
   
   	  echo '<td align="right">'.($CANTIDAD_OC1).'</td>';
	     echo '<td align="right">'.number_format($CANTIDAD_OC2,2,',','.').'</td>';
		    echo '<td align="right">'.number_format($CANTIDAD_OC3,2,',','.').'</td>';
   
    
	  echo '<td align="right">'.number_format($total_mes,0, ",", ".").'</td>';
	     echo '<td align="right">'.number_format($total_mes1,0, ",", ".").'</td>';
		    echo '<td align="right">'.number_format($total_mes2,0, ",", ".").'</td>';
				

				
				    echo '</tr>';
   
   $numero++;
  }

}


   
  
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>

</html>