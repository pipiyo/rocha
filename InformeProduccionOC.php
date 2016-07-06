<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
ini_set('max_execution_time', 900);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$ESTADO = "TODOS";



function dameFecha3($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}
function dameFecha4($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

if(date("w") == 1)
{
$txt_desde = dameFecha3(date("d-m-Y"),0);
$txt_hasta = dameFecha4(date("d-m-Y"),7);
}
else if(date("w") == 2)
{
$txt_desde = dameFecha3(date("d-m-Y"),1);
$txt_hasta = dameFecha4(date("d-m-Y"),6);
}
else if(date("w") == 3)
{
$txt_desde = dameFecha3(date("d-m-Y"),2);
$txt_hasta = dameFecha4(date("d-m-Y"),5);
}
else if(date("w") == 4)
{
$txt_desde = dameFecha3(date("d-m-Y"),3);
$txt_hasta = dameFecha4(date("d-m-Y"),4);
}
else if(date("w") == 5)
{
$txt_desde = dameFecha3(date("d-m-Y"),4);
$txt_hasta = dameFecha4(date("d-m-Y"),3);
}
else if(date("w") == 6)
{
$txt_desde = dameFecha3(date("d-m-Y"),5);
$txt_hasta = dameFecha4(date("d-m-Y"),2);
}
else if(date("w") == 0)
{
$txt_desde = dameFecha3(date("d-m-Y"),6);
$txt_hasta = dameFecha4(date("d-m-Y"),1);
}
$TXT_OC = "";
$TXT_CLIENTE = "";
$TXT_ROCHA = "";
if (isset($_POST["boton"])) 
{    
$ESTADO = $_POST["estado"];
if($_POST["txt_desde"] != "" and $_POST["txt_hasta"] != "" )  
{
$txt_desde = $_POST["txt_desde"];
$txt_hasta = $_POST["txt_hasta"];
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Informe Produccion  V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link href='http://fonts.googleapis.com/css?family=Paprika' rel='stylesheet' type='text/css' />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="jquery.bpopup-x.x.x.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  
  <script language = javascript>
    $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });  
  </script>

</head>

<body id='BodyInformeUnidadesProduccion'>
<div id='bread'><div id="menu1"></div></div>
<center>

<form method="post" action="">
<h1 id='prod_oc'>Informe producción &nbsp; &nbsp;  &nbsp;  <?php echo $txt_desde ."&nbsp; &nbsp;  -&nbsp;   &nbsp; ".$txt_hasta ?></h1>
<table>
<tr>
<td> Desde </td>
<td><input class='textbox' type="text" id="txt_desde" value="" name="txt_desde" /> </td>
<td> Hasta </td>
<td><input class='textbox' type="text" id="txt_hasta" value="" name="txt_hasta" /> </td>
<td> Estado </td>
<td><select class='textbox' id="estado"  name="estado" />
    <option>TODOS</option>
    <option>EN PROCESO</option>
    <option>NULO</option>
    <option>OK</option>
</select> </td>
<td><input type="submit" id="boton" value="Aceptar" name="boton" /> </td>
</tr>

</table>
</form>


<?php 
ini_set('max_execution_time', 500);
mysql_select_db($database_conn, $conn);

?>

<table bordercolor="#ccc" id ="tabla_unidades_produccion" width="100%" rules="all" frame="box">

  <tr>
  <th height='30px'>Rocha</th>
  <th>Cliente</th>
  <th>Fecha Confirmacion</th>
  <th>OC</th>
  <th>Codigo Producto</th>
  <th>Descripción</th>
  <th>Cantidad</th>
  <th>U/M</th>
  <th>Precio Unitario</th>
  <th>Total</th>
  <th>Obervacion</th>
  <th>Corte</th>
  <th>Enchape Recto</th>
  <th>Enchape Curvo</th>
  <th>Perforador Multiple</th>
  <th>Centro De Mecanizado</th>
  <th>Laminado</th>
  <th>Ruteado</th>
  <th>Barniz</th>
  <th>Armado</th>
  <th>Mueble Especiales</th>
  <th>Limpieza</th>
  </tr>	

<?php 
$fil = 0;
if($ESTADO == 'TODOS')
{
$sql777 = "SELECT DISTINCT proyecto.NOMBRE_CLIENTE,proyecto.CODIGO_PROYECTO,servicio.FECHA_ENTREGA from servicio,oc_producto, proyecto, orden_de_compra where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO AND proyecto.CODIGO_PROYECTO = oc_producto.ROCHA  and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC and orden_de_compra.NOMBRE_PROVEEDOR = 'Muebles&Diseños' and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.CATEGORIA = 'PROYECTO'and servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'  order by servicio.FECHA_ENTREGA ";	
}
else
{
$sql777 = "SELECT DISTINCT proyecto.NOMBRE_CLIENTE,proyecto.CODIGO_PROYECTO,servicio.FECHA_ENTREGA from servicio,oc_producto, proyecto, orden_de_compra where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO AND proyecto.CODIGO_PROYECTO = oc_producto.ROCHA  and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC and orden_de_compra.NOMBRE_PROVEEDOR = 'Muebles&Diseños' and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.CATEGORIA = 'PROYECTO'and servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' and servicio.ESTADO = '".$ESTADO."'  order by servicio.FECHA_ENTREGA ";   
}
$result777= mysql_query($sql777, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result777))
  {	
if($fil == 1)
{
  echo "<tr>
  <th height='30px'>Rocha</th>
 <th>Cliente</th>
  <th>Fecha Confirmacion</th>
  <th>OC</th>
  <th>Codigo Producto</th>
  <th>Descripción</th>
  <th>Cantidad</th>
  <th>U/M</th>
  <th>Precio Unitario</th>
  <th>Total</th>
  <th>Obervacion</th>
  <th>Corte</th>
  <th>Enchape Recto</th>
  <th>Enchape Curvo</th>
  <th>Perforador Multiple</th>
  <th>Centro De Mecanizado</th>
  <th>Laminado</th>
  <th>Ruteado</th>
  <th>Barniz</th>
  <th>Armado</th>
  <th>Mueble Especiales</th>
  <th>Limpieza</th>
  </tr> 
";
$fil = 0;
}
$fil++;
$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
$FECHA_C = $row["FECHA_ENTREGA"];
$filas=0;


  $CORTE = "";
  $CORTES = "";
$sql72 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'CORTE' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result72= mysql_query($sql72, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result72))
  { 
    $CORTE = $row["CANTIDAD"];
    $CORTES = $row["ESTADO"];
  }
  mysql_free_result($result72);

 $ENCHAPE_R = "";
 $ENCHAPE_RS = "";
 $sql73 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Enchape Recto' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result73= mysql_query($sql73, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result73))
  { 
    $ENCHAPE_R = $row["CANTIDAD"];
     $ENCHAPE_RS = $row["ESTADO"];
  }
  mysql_free_result($result73); 

$ENCHAPE_C= "";
$ENCHAPE_CS= "";
 $sql74 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Enchape Curvo' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result74= mysql_query($sql74, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result74))
  { 
    $ENCHAPE_C = $row["CANTIDAD"];
    $ENCHAPE_CS = $row["ESTADO"];
  }
  mysql_free_result($result74); 

$PM = "";
$PMS = "";
$sql75 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Perforador Multiple' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result75= mysql_query($sql75, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result75))
  { 
    $PM = $row["CANTIDAD"];
    $PMS = $row["ESTADO"];
  }
  mysql_free_result($result75); 

$CM = "";
$CMS = "";
  $sql76 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Centro De Mecanizado' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result76= mysql_query($sql76, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result76))
  { 
    $CM = $row["CANTIDAD"];
    $CMS = $row["ESTADO"];
  }
  mysql_free_result($result76); 


$LAMINADO ="";
$LAMINADOS ="";
  $sql77 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Laminado' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result77= mysql_query($sql77, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result77))
  { 
    $LAMINADO = $row["CANTIDAD"];
    $LAMINADOS = $row["ESTADO"];
  }
  mysql_free_result($result77); 

 $RT = "";
  $RTS = "";
 $sql78 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Ruteado' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result78= mysql_query($sql78, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result78))
  { 
    $RT = $row["CANTIDAD"];
    $RTS = $row["ESTADO"];
  }
  mysql_free_result($result78); 

$BAR = "";
$BARS = "";
 $sql79 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Barniz' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result79= mysql_query($sql79, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result79))
  { 
    $BAR = $row["CANTIDAD"];
    $BARS = $row["ESTADO"];
  }
  mysql_free_result($result79); 

 $ARMADO = "";
  $ARMADOS = "";
 $sql80 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Armado' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result80= mysql_query($sql80, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result80))
  { 
    $ARMADO = $row["CANTIDAD"];
    $ARMADOS = $row["ESTADO"];
  }
  mysql_free_result($result80); 

 $ME = "";
  $MES = "";
 $sql81 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Mueble Especiales' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result81= mysql_query($sql81, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result81))
  { 
    $ME = $row["CANTIDAD"];
    $MES = $row["ESTADO"];
  }
  mysql_free_result($result81); 

   $LI = "";
      $LIS = "";
 $sql82 = "SELECT DISTINCT servicio.CANTIDAD,servicio.ESTADO from servicio, proyecto where servicio.CODIGO_PROYECTO = proyecto.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'PRODUCCION' and servicio.PROCESO = 'Limpieza' AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";   
$result82= mysql_query($sql82, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result82))
  { 
    $LI = $row["CANTIDAD"];
     $LIS = $row["ESTADO"];
  }
  mysql_free_result($result82); 


$sql778 = "SELECT DISTINCT orden_de_compra.CODIGO_OC from oc_producto, proyecto, orden_de_compra where proyecto.CODIGO_PROYECTO = oc_producto.ROCHA  and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC and oc_producto.ROCHA = '".$CODIGO_PROYECTO."' and orden_de_compra.NOMBRE_PROVEEDOR = 'Muebles&Diseños' and NOT orden_de_compra.ESTADO  = 'Nulo' "; 
$result778= mysql_query($sql778, $conn) or die(mysql_error());
$CODIGO_OC="";
$filas2=0;
 while($row = mysql_fetch_array($result778))
  {

$filas++;
$CODIGO_OC = $row["CODIGO_OC"];


$tabla1="";
$filas1=0;
$sql779 = "SELECT DISTINCT oc_producto.ID,oc_producto.CODIGO_PRODUCTO,oc_producto.CANTIDAD,oc_producto.PRECIO_UNITARIO,oc_producto.TOTAL,oc_producto.OBSERVACION,oc_producto.CORTE,oc_producto.FORMAS,oc_producto.LAMINADO,oc_producto.ENCHAPE,oc_producto.ENCHAPE_CURVO,oc_producto.PERFORADO,oc_producto.ARMADO,oc_producto.LIMPIEZA,oc_producto.RECLAMO from oc_producto, proyecto, orden_de_compra where proyecto.CODIGO_PROYECTO = oc_producto.ROCHA  and oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC and oc_producto.CODIGO_OC = '".$CODIGO_OC."' and oc_producto.ROCHA = '".$CODIGO_PROYECTO."' "; 
$result779= mysql_query($sql779, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result779))
  {
     $CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
      $CANTIDAD = $row["CANTIDAD"];
       $TOTAL = $row["TOTAL"];
       $PRECIO_UNITARIO = $row["PRECIO_UNITARIO"];
        $OBSERVACION = $row["OBSERVACION"];
               $RECLAMO = $row["RECLAMO"];
               $ID = $row["ID"];
$sql771 = "SELECT * from producto where CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' "; 
$result771= mysql_query($sql771, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result771))
  {
    $DESCRIPCION = $row["DESCRIPCION"];
     $UM = $row["UNIDAD_DE_MEDIDA"];
  }

    $filas1++;
     $filas2++;
   
    if($filas == 1)
  {
    $tabla1.="<td>" . 
      $CODIGO_PRODUCTO . "</td><td>".$DESCRIPCION."</td><td align='right'>".$CANTIDAD."</td><td align='center'>".$UM."</td><td height='25px'align='right'>".$PRECIO_UNITARIO."</td><td align='right'>".$TOTAL."</td><td>".$OBSERVACION."</td><td title=".$CORTE.">".$CORTES."</td><td title=".$ENCHAPE_R.">".$ENCHAPE_RS ."</td><td title=".$ENCHAPE_C.">".$ENCHAPE_CS."</td><td title=".$PM.">".$PMS."</td><td title=".$CM.">".$CMS."</td><td title=".$LAMINADO.">".$LAMINADOS."</td><td title=".$RT.">".$RTS."</td><td title=".$BAR.">".$BARS."</td><td title=".$ARMADO.">".$ARMADOS."</td><td title=".$ME.">".$MES."</td><td title=".$LI.">".$LIS."</td></tr>"; 
  }
  else
  {
    $tabla1.="<td>" . 
      $CODIGO_PRODUCTO . "</td><td>".$DESCRIPCION."</td><td align='right'>".$CANTIDAD."</td><td align='center'>".$UM."</td><td height='25px' align='right'>".$PRECIO_UNITARIO."</td><td align='right'>".$TOTAL."</td><td>".$OBSERVACION."</td><td title=".$CORTE.">".$CORTES."</td><td title=".$ENCHAPE_R.">".$ENCHAPE_RS ."</td><td title=".$ENCHAPE_C.">".$ENCHAPE_CS."</td><td title=".$PM.">".$PMS."</td><td title=".$CM.">".$CMS."</td><td title=".$LAMINADO.">".$LAMINADOS."</td><td title=".$RT.">".$RTS."</td><td title=".$BAR.">".$BARS."</td><td title=".$ARMADO.">".$ARMADOS."</td><td title=".$ME.">".$MES."</td><td title=".$LIS.">".$LIS."</td></tr>"; 
  }
    
  }
   mysql_free_result($result779);


if($filas == 1)
{
$tabla="<td align='center' rowspan='".$filas1."'><a class='contpa' target='_blank' href=DescripcionOC1.php?CODIGO_OC=" .$CODIGO_OC. ">" . 
   $CODIGO_OC . "</a></td>".$tabla1."";
}
else
{
$tabla.="<tr><td align='center' rowspan='".$filas1."'><a class='contpa' target='_blank' href=DescripcionOC1.php?CODIGO_OC=" .$CODIGO_OC. ">" . 
   $CODIGO_OC . "</a></td>".$tabla1."</tr> ";
}

  }
 
  mysql_free_result($result778);

  echo "<tr><td align='center' rowspan='".$filas2."' ><a class='contpa' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . 
      $CODIGO_PROYECTO . "</a></td>";
       echo "<td align='center' rowspan='".$filas2."' >".$NOMBRE_CLIENTE."</td>";
  echo "<td align='center' rowspan='".$filas2."' >".substr($FECHA_C,0,11)."</td>";
  echo $tabla;
  
 
  }
	
	mysql_free_result($result777);
  mysql_close($conn);

	
	
	




?>
</body>

</html>
