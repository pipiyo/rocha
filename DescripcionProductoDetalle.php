<?php require_once('Conexion/Conexion.php');

session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

ini_set('max_execution_time', 500);
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

$CODIGO_PRODUCTO = $_GET['CODIGO_PRODUCTO'];
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM producto WHERE CODIGO_PRODUCTO ='".$CODIGO_PRODUCTO."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result))
  {
	 $CODIGO_PRODUCTO1 = $row["CODIGO_PRODUCTO"];
	 $DESCRIPCION1 = $row["DESCRIPCION"];
	 $STOCK_ACTUAL1 = $row["STOCK_ACTUAL"];
	 $PRECIO1 = $row["PRECIO"];
	 $UNIDAD_DE_MEDIDA1 = $row["UNIDAD_DE_MEDIDA"];
	 $FORMATO1 = $row["FORMATO"];
	 $gestion1 = $row["GESTION"];
	 $RELACION = $row["RELACION"];
	 $CATEGORIA = $row["CATEGORIA"];
	 $STOCK_MINIMO = $row["STOCK_MINIMO"];
    $ruta = $row["RUTA"];
  }
mysql_free_result($result);
  
$query_registro25 = "select STOCK_ACTUAL,STOCK_MAXIMO,STOCK_MINIMO from producto WHERE CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."'";
$result25 = mysql_query($query_registro25, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result25))
  {
	 $STOCK_ACTUAL = $row["STOCK_ACTUAL"];
	 $STOCK_MAXIMO = $row["STOCK_MAXIMO"];
	 $STOCK_MINIMO = $row["STOCK_MINIMO"];
   $query_registro = "SELECT sum(oc_producto.CANTIDAD) as trans FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and orden_de_compra.ESTADO = 'EN PROCESO'";
   $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
   $numero = 0;
  while($row = mysql_fetch_array($result1))
  {
	 $trans = $row["trans"];
  }

  $query_registro3 = "select sum(producto_vale_emision.CANTIDAD_SOLICITADA) as valor from vale_emision, producto_vale_emision, producto where vale_emision.
  COD_VALE = producto_vale_emision.CODIGO_VALE and producto_vale_emision.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."'  and vale_emision.ESTADO = 'PENDIENTE'";
  $result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
  $numero = 0;
  while($row = mysql_fetch_array($result3))
  {
	 $vale = $row["valor"];
  }
	
	$contable= $trans + $STOCK_ACTUAL;
	$disponible= $contable - $vale;
  }
  mysql_free_result($result25);
  

$total_mes1 = 0;
$total_mes3 = 0;
$total_mes = 0;
$total_mes4 = 0;

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


$sql1112 = "SELECT sum(actualizaciones.EGRESO) as sum_e FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and actualizaciones.FECHA between '".$fecha7."' and '".date("Y-m-d")."' ";
$result1112 = mysql_query($sql1112, $conn) or die(mysql_error());
$numero = 0;	
 while($row = mysql_fetch_array($result1112))
  {
	  $sum_e = $row["sum_e"];
  }
  $total_mes = $sum_e ;
  if( $total_mes != 0)
  {
	 $total_mes =   $total_mes ;
  }

  //


$sql1114 = "SELECT sum(actualizaciones.EGRESO) as sum_e2 FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and actualizaciones.FECHA between '".$fecha8."' and '".date("Y-m-d")."' ";
$result1114 = mysql_query($sql1114, $conn) or die(mysql_error());
$numero = 0;	
 while($row = mysql_fetch_array($result1114))
  {
	  $sum_e2 = $row["sum_e2"];
  }
  $total_mes1 = $sum_e2 ;
  if( $total_mes1 != 0)
  {
	 $total_mes1 =   $total_mes1 / 3;
  }
   
  ///
 
$sql1114 = "SELECT sum(actualizaciones.EGRESO) as sum_e2 FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and actualizaciones.FECHA between '".$fecha9."' and '".date("Y-m-d")."' ";
$result1114 = mysql_query($sql1114, $conn) or die(mysql_error());
$numero = 0;	
 while($row = mysql_fetch_array($result1114))
  {
	  $sum_e3 = $row["sum_e2"];
  }
  $total_mes3 = $sum_e3 ;
  if( $total_mes3 != 0)
  {
	 $total_mes3 =   $total_mes3 / 6;
  }
  
$sql1114 = "SELECT sum(actualizaciones.EGRESO) as sum_e2 FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and actualizaciones.FECHA between '".$fecha9."' and '".date("Y-m-d")."' ";
$result1114 = mysql_query($sql1114, $conn) or die(mysql_error());
$numero = 0;	
 while($row = mysql_fetch_array($result1114))
  {
	  $sum_e4 = $row["sum_e2"];
  }
  $total_mes4 = $sum_e4 ;
  if( $total_mes4 != 0)
  {
	 $total_mes4 =   $total_mes4 / 12;
  }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Modificar Producto V1.2.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/bodega.css" />
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <script src='js/Bloqueo.php'></script>
  <script src='js/breadcrumbs.php'></script>
  <script language = javascript>
/*1*/  
function reback()
{
  window.close("DescripcionProductoDetalle.php");
} 
/*2*/ 
function justNumbers(e)
{
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true;
  return /\d/.test(String.fromCharCode(keynum));
}
/*3*/
function enviar()
{
  var as= confirm("Realmente deseas Modificar");
  if(as)
  {
    document.getElementById("formulario11").submit();
  }
  else
  {
    return false;
  }
}
</script>

</head>
<body>
<div id='bread'><div id="menu1"></div></div>
<div class="descripcion_producto_detalle">
<h1>Kardex Producto</h1>
<table class="table-form">
  <tr>
    <td class="lineastd" id='kardex_td' rowspan="5" align="center" valign="top"><p id ='stock_kardek'><strong>Stock</strong></p> <p id ='stock_kardek_num'><?php echo $STOCK_ACTUAL; ?></p></td>
    <td></td>
    <td colspan="6">Descripcion: <?php echo $DESCRIPCION1; ?> </td>
    <td></td>
    <?php if($ruta == ""){ ?>
    <td align='center' class="lineastd" rowspan="5" colspan="2"></td>
    <?php } else { ?>
    <td align='center' class="lineastd" rowspan="5" colspan="2"><img  src = '<?php echo $ruta ?>'  /></td>
     <?php }  ?>
    </tr>
  <tr>
    <td> </td>
    <td colspan="6">Codigo: <?php echo $CODIGO_PRODUCTO1; ?></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"></td>
    <td></td>
    <td colspan="2"></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <th class="colortd">Stock Contable</th>
    <th class="lineastd"><?php echo $contable; ?></th>
    <td></td>
    <th class="colortd">Stock Minimo</th>
    <th class="lineastd"><?php echo $STOCK_MINIMO; ?></th>
    <td colspan="2"></td>
   
    </tr>
  <tr>
    <td></td>
    <th class="colortd">Stock Disponible</th>
    <th class="lineastd"><?php echo $disponible; ?></th>
    <td></td>
    <th class="colortd">Stock Maximo</th>
    <th class="lineastd"><?php echo $STOCK_MAXIMO; ?></th>
    <td colspan="2"></td>
    </tr>
  <tr>
    <td>Cosumes</td>
    <td></td>
    <td colspan="2"></td>
    <td></td>
    <td colspan="2"></td>
    <td colspan="2"></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th class="colortd">Mensual</th>
    <td></td>
    <th class="colortd" colspan="2">Trimestral</th>
    <td></td>
    <th class="colortd" colspan="2" id='color_kardek'>Semestral</th>
    <td colspan="2">&nbsp;</td>
    <th class="colortd" colspan="2" id='color_kardek'>Anual</th>
    </tr>
      <tr>
    <td align="center" class="lineastd"><?php echo  number_format($total_mes,2, ",", ".") ?></td>
    <td></td>
    <td align="center" class="lineastd"a colspan="2" ></td>
    <td></td>
    <td align="center" class="lineastd" colspan="2"><?php echo  number_format($total_mes3,2, ",", ".") ?></td>
    <td colspan="2"></td>
    <td align="center" class="lineastd" colspan="2"><?php echo  number_format($total_mes4,2, ",", ".") ?></td>
  </tr>
  <tr>
    <th >Historial de compras</th>
   
  </tr>
   <tr>
    <th class="colortd">Rocha</th>
    <th class="colortd">OC</th>
    <th class="colortd" colspan="5">Proveedor</th>
    <th class="colortd" colspan="2">Fecha</th>
    <th class="colortd">Cantidad</th>
    <th class="colortd">Valor</th>
  </tr>
  
  <?php
$query_registro2 = "select orden_de_compra.ROCHA_PROYECTO, orden_de_compra.NOMBRE_PROVEEDOR, orden_de_compra.CODIGO_OC, orden_de_compra.FECHA_REALIZACION, oc_producto.PRECIO_UNITARIO, oc_producto.CANTIDAD from producto, orden_de_compra, oc_producto WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC AND oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO AND producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' ORDER BY orden_de_compra.FECHA_REALIZACION DESC LIMIT 10";
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result2))
  {
	$CODIGO_OC_D = $row["CODIGO_OC"];
	$FECHA_R_D = $row["FECHA_REALIZACION"];
	$TOTAL_D = $row["PRECIO_UNITARIO"];
	$NOMBREP_D = $row["NOMBRE_PROVEEDOR"];
	$ROCHAPRO = $row["ROCHA_PROYECTO"];
	$CANTIDAD = $row["CANTIDAD"];
	$PRECIO_UNITARIO = $row["PRECIO_UNITARIO"];
	$numero++;
	
  echo "<tr><td align='center' class='lineastd'>".$ROCHAPRO."</td>";
		
	echo "<td align='center' class='lineastd'><a href=DescripcionOC1.php?CODIGO_OC=" .$CODIGO_OC_D. ">".$CODIGO_OC_D."</a></td>";
	
	echo "<td align='center' class='lineastd' colspan='5' >".$NOMBREP_D."</td>";
	
	echo "<td align='center' class='lineastd' colspan='2'>".$FECHA_R_D."</td>";

  echo "<td align='center' class='lineastd'>".number_format($CANTIDAD,0, ",", "."). "</td>";

  echo "<td align='center' class='lineastd'>".number_format($PRECIO_UNITARIO,0, ",", "."). "</td></tr>";
  }
  mysql_free_result($result2);

?>
  <tr>
    <td></td>
    <td></td>
    <td colspan="2"></td>
    <td></td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th class="uno colortd">Rocha</th>
    <th class="uno colortd">OC</th>
    <th class="uno colortd" colspan="2">Proveedor</th>
    <th class="uno colortd" >User</th>
    <th class="uno colortd" colspan="2">Fecha</th>
    <th class="dos colortd">Vale</th>
    <th class="dos colortd">Ingreso</th>
    <th class="dos colortd">Egreso</th>
    <th class="dos colortd">Stock Antiguo</th>
  </tr>
  
  <?php

mysql_select_db($database_conn, $conn);
$sql111 = "SELECT actualizaciones_general.CODIGO_GENERAL, actualizaciones.VALOR_ANTIGUO, actualizaciones.INGRESO, actualizaciones.NOMBRE_USUARIO, actualizaciones.EGRESO, actualizaciones.VALE, actualizaciones.FECHA,actualizaciones.USUARIO,actualizaciones.ROCHA,actualizaciones.OC FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC  ";
$result111 = mysql_query($sql111, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result111))
  {
	$VALE= $row["VALE"]; 
	$OC= $row["OC"]; 
	$INGRESO_O= $row["INGRESO"];
	$EGRESO_O = $row["EGRESO"];
	$FECHA_O = $row["FECHA"];
	$NOMBRE_O = $row["NOMBRE_USUARIO"];
	$NOMBRE_PRO = "";
	$USUARIO_O = $row["USUARIO"];
	$CODIGO_GENERAL_O = $row["CODIGO_GENERAL"];
	$ROCHA = $row["ROCHA"];
	$numero++;
	echo "<tr><td align='center' class='lineastd'><a href=editarProyecto.php?CODIGO_PROYECTO=" .$ROCHA. ">". 
	    $ROCHA."</a></td>";
		echo "<td align='center' class='lineastd'>" .$OC. "</td>";
		echo "<td align='center' colspan='2' class='lineastd' >" . 
	    $NOMBRE_PRO. "</td>";
		echo "<td align='center' class='lineastd'>" . 
	    $NOMBRE_O. "</td>";
	echo "<td align='center' colspan='2' class='lineastd'' >" . 
	    $FECHA_O . "</td>";
		echo "<td align='center' class='lineastd'>" . 
	    $VALE. "</td>";
	echo "<td align='center' class='lineastd' >" . 
	    $INGRESO_O . "</td<>";
    echo "<td align='center' class='lineastd'>" . 
	    $EGRESO_O. "</td>";
       echo "<td align='center' class='lineastd'>" . 
      $row['VALOR_ANTIGUO']. "</td></tr>";

  }
  mysql_free_result($result111);
  mysql_close($conn);
?>
</table>

</div>
</body>
</html>