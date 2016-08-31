<?php require_once('Conexion/Conexion.php'); ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
ini_set('max_execution_time', 500);
mysql_select_db($database_conn, $conn);
	$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
	$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
	$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".($CODIGO_USUARIO)."'";
	$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
	$numero = 0;

 	while($row = mysql_fetch_array($result1))
  	{
		$nombres = $row["nombres"];
		$apellido = $row["apellido_paterno"];
		$numero++;
 	}
	mysql_free_result($result1);
	$CODIGO_OC = "";
	$BUSCAR_CODIGO = "";
	$BUSCAR_DESCRIPCION = "";	
	$BUSCAR_ROCHA = "";	
	$ES = "";
	$txt_desde = "";	
	$txt_hasta = "";
	$contador1 = 0;
	if (isset($_GET["buscar"])) {
		$BUSCAR_CODIGO = $_GET['buscar_codigo'];
		$BUSCAR_DESCRIPCION = $_GET['buscar_usuario'];
		$ES = $_GET['estado1'];

		if (isset($_GET["rocha_buscar"]))
		{
		$BUSCAR_ROCHA = $_GET['rocha_buscar'];
		}

		if($_GET["txt_desde"] != "" && $_GET["txt_hasta"] != "" )
		{
		$txt_desde = $_GET["txt_desde"];	
		$txt_hasta = $_GET["txt_hasta"];
		}
		else
		{
		$txt_desde = "";	
		$txt_hasta = "";	
		}		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title>Listado OC V1.2.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_ListadoOC.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src='js/breadcrumbs.php'></script>
    <script type="text/javascript" src="js/tinybox.js"></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript> 
  $(function(){
  $('#buscar_usuario').autocomplete({
  source : 'ajaxProveedor.php',
  select : function(event, ui){
  }
  });
  });

  $(function() {
  
  	  $(".textff").click(function(e) {
  	  	TINY.box.show({url:'generarFechaConfirmacionOc.php?codigo_oc=' + this.dataset.codigo_oc + '&codigo_usuario=' + this.dataset.codigo_usuario + '&fecha_antigua=' + this.value });
  	  });	

  	//$( ".textf" ).datepicker({dateFormat: 'yy-mm-dd'});	
  
  });
  
 /*
  function enviar(cod,fecha,nombre)
  {
  nombre = nombre.substring(0, 6);
  $.ajax({
  type: "POST",
  url: "scriptActualizarfechaconfirmacion.PHP",
  data: {'cod': cod, 'fecha': fecha, 'nombre': nombre },
  dataType:'html',
  error: function(xhr, status, error) { 
  alert(xhr.responseText);
  },
  success: function(data){ 
  alert(""+data);
  location.reload();
  }
  });
  }
*/
  $(function() 
  {
	$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
	$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	

  });  

function fechaConfirmacionOc() {
 	
	$( ".fechaconfirmacionoc" ).datepicker({dateFormat: 'yy-mm-dd'});	

 };

 </script>
</head>
<body>
<div id='bread'><div id="menu1"></div></div>
<center>
  <form  method="GET"/>  
  <h1>Listado OC</h1>    





  <br />
  <table>
  <tr>
  <td> <input placeholder="Numero"  type="text" class = 'textbox' autocomplete="off" id="buscar_codigo" name="buscar_codigo" /> </td>
  <td> <input placeholder="Proveedor" type="text" class = 'textbox' autocomplete="off" id="buscar_usuario" name="buscar_usuario" /> </td>
  <td>
  <select class = 'textbox'  id = "estado1" name = "estado1">
    <option value="" selected>Estado</option>
    <option> Pendiente </option>
    <option> Modificacion </option>
    <option> En Proceso</option>
    <option> Nulo </option>
    <option> OK </option>
    <option> Todo </option>
  </select>
  </td>
  <td><input placeholder="Rocha" class = 'textbox' type="text" name="rocha_buscar" id = "rocha_buscar" value="" /></td>
</tr>
<tr>
  <td> <input placeholder="Desde"  type="text" class = 'textbox' autocomplete="off" id="txt_desde" name="txt_desde" /> </td>
  <td> <input placeholder="Hasta" type="text" class = 'textbox' autocomplete="off" id="txt_hasta" name="txt_hasta" /> </td>
  <td align="center">
  <a href="ExelListadoDeCompra.php?estado=<?php echo $ES;?>&CODIGO_USUARIO=<?php echo $CODIGO_USUARIO;?>&txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta; ?>&buscar_usuario=<?php echo $BUSCAR_DESCRIPCION; ?>&buscar_codigo=<?php echo $BUSCAR_CODIGO; ?>&rocha_buscar=<?php echo $BUSCAR_ROCHA; ?>" target="_blank">
  <img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel" class="right">
  </a></td>
  <td><input type="submit" name = "buscar" id='buscar' value="Buscar"/> </td>


  </tr>
  </table>	
 </form>  
 <br />
 </center>


<table rules='all' class="datagrid" border="1" width="100%">
<tr>
<th>N°</th>
<th>Rocha</th>
<th>Versión</th>
<th>Proveedor</th>
<th>Fecha realizacion</th>
<th>Fecha entrega</th>
<th>Fecha confirmacion</th>
<th>User</th>
<th>Neto</th>
<th>Factura</th>
<th>!</th>
<th><a style='color:#fff;' href='ListadoDeCompras.php?valija=1' >Fecha Envio por valija</a></th>
<th>Recibir</th>
<th>Estado</th>
</tr>

<?php

//listado de materiales
////////////////////////////////

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);

if (isset($_GET["buscar"])) 
{
mysql_select_db($database_conn, $conn);

$query_registro = "SELECT orden_de_compra.VERSION_HIJO,orden_de_compra.VERSION,orden_de_compra.NETO,orden_de_compra.FACTURAS, orden_de_compra.ROCHA_PROYECTO, orden_de_compra.ENVIADO, orden_de_compra.FECHA_CONFIRMACION, orden_de_compra.FECHA_ENVIO_VALIJA, orden_de_compra.CODIGO_OC, usuario.NOMBRE_USUARIO,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR,orden_de_compra.COMENTARIO FROM orden_de_compra, usuario where orden_de_compra.codigo_usuario = usuario.codigo_usuario ";



if($ES  == "" && $BUSCAR_DESCRIPCION  == "" && $BUSCAR_ROCHA == "" && $BUSCAR_CODIGO == "")
{
$query_registro .=" and not orden_de_compra.ESTADO = 'Nulo' and not orden_de_compra.ESTADO = 'OK' ";
}

if($ES  != "" && $ES  != "Todo")
{
$query_registro .= " and orden_de_compra.ESTADO = '".$ES."'";
}


if($txt_desde != "" && $txt_hasta != "" )
{
$query_registro .= "  and FECHA_CONFIRMACION between '".$txt_desde."' and '".$txt_hasta."'";
}




if($BUSCAR_DESCRIPCION  != "")
{
$query_registro .= " and orden_de_compra.NOMBRE_PROVEEDOR ='".$BUSCAR_DESCRIPCION."'";
}
if($BUSCAR_CODIGO != "" )
{
$query_registro .= " and orden_de_compra.CODIGO_OC = '".$BUSCAR_CODIGO."'";
}

else if($BUSCAR_ROCHA != "")
{
$query_registro .= " and orden_de_compra.ROCHA_PROYECTO ='".($BUSCAR_ROCHA)."'";

}	
$query_registro .= " ORDER BY orden_de_compra.CODIGO_OC desc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

 if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  == "" && $ES  == "" && $BUSCAR_ROCHA == "" && $txt_desde == "" && $txt_hasta == "" )
{                   

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT orden_de_compra.VERSION_HIJO,orden_de_compra.VERSION,orden_de_compra.NETO,orden_de_compra.FACTURAS, orden_de_compra.ROCHA_PROYECTO,orden_de_compra.ENVIADO, orden_de_compra.FECHA_CONFIRMACION,  orden_de_compra.FECHA_ENVIO_VALIJA, orden_de_compra.CODIGO_OC, usuario.NOMBRE_USUARIO,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR,orden_de_compra.COMENTARIO FROM orden_de_compra, usuario where orden_de_compra.codigo_usuario = usuario.codigo_usuario and not  orden_de_compra.ESTADO = 'OK' and not  orden_de_compra.ESTADO = 'Nulo' ORDER BY orden_de_compra.CODIGO_OC desc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

}




 if(isset($_GET['valija']))
{                   

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT orden_de_compra.VERSION_HIJO,orden_de_compra.VERSION,orden_de_compra.NETO,orden_de_compra.FACTURAS, orden_de_compra.ROCHA_PROYECTO,orden_de_compra.ENVIADO, orden_de_compra.FECHA_CONFIRMACION,  orden_de_compra.FECHA_ENVIO_VALIJA, orden_de_compra.CODIGO_OC, usuario.NOMBRE_USUARIO,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR,orden_de_compra.COMENTARIO FROM orden_de_compra, usuario where orden_de_compra.codigo_usuario = usuario.codigo_usuario and orden_de_compra.FECHA_ENVIO_VALIJA  = '0000-00-00' AND NOT orden_de_compra.NOMBRE_PROVEEDOR  IN('Sillas y Sillas S.A.','Muebles&Diseños','Rocha S.A.','Muebles Diseños')    ORDER BY orden_de_compra.CODIGO_OC desc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

}

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESPACHAR = $row["DESPACHAR_DIRECCION"];
	$TOTAL = $row["TOTAL"];
	$NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
	$CODIGO_USUARIO1 = $row["NOMBRE_USUARIO"];
	$ESTADO = $row["ESTADO"];
	$ENVIADO = $row["ENVIADO"];
	$ROCHA_PROYECTO = $row["ROCHA_PROYECTO"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$FECHA_ENVIOV = $row["FECHA_ENVIO_VALIJA"];
    $FACTURAS = $row["FACTURAS"];
	$NETO = $row["NETO"];
	$VERSION = $row["VERSION"];
	$VERSION_HIJO = $row["VERSION_HIJO"];
	$MENSAJE = 2;

	$fill = (empty($row["COMENTARIO"])) ? "white" :  "#FF5600" ;

	if ($contador1 == 20)
	{
	echo "
	<tr>
	<th>N°</th>
	<th>Rocha</th>
	<th>Versión</th>
	<th>Proveedor</th>
	<th>Fecha realizacion</th>
	<th>Fecha entrega</th>
	<th>Fecha confirmacion</th>
	<th>User</th>
	<th>Total</th>
	<th>Factura</th>
	<th>!</th>
	<th><a style='color:#fff;' href='ListadoDeCompras.php?valija=1' >Fecha Envio por valija</a></th>
	<th>Recibir</th>
	<th>Estado</th>
	</tr>
	";
    $contador1 = 0;
	}
	if($ENVIADO == 1)
	{echo "<tbody><tr><td style= 'background:#EACFCF;'><center> <a href=DescripcionOC1.php?CODIGO_OC=" .$CODIGO_OC. ">" . 
	$CODIGO_OC . "</a><input style='display:none;' onchange='enviar(".$CODIGO_OC.",value,name);' id = 'codoc".$numero."' name='codoc".$numero."' type='text' value='".$CODIGO_OC."' class='textf'/></center></td>";
	echo "<td style= 'background:#EACFCF;'><center><a href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($ROCHA_PROYECTO)."><center>" . 
	($ROCHA_PROYECTO) . "</a></center></td>";
	echo "<td style= 'background:#EACFCF;'><center>" . 
	($VERSION) . " ".$VERSION_HIJO. "</center></td>";	
	echo "<td style= 'background:#EACFCF;'><center>" . 
	($NOMBRE_PROVEEDOR) . "</center></td>";	
    echo "<td style= 'background:#EACFCF;'><center>" . 
	($FECHA_REALIZACION) . "</center></td>";
    echo "<td style= 'background:#EACFCF;'><center>" . 
	$FECHA_ENTREGA . "</center></td>";

/*
	if($CODIGO_USUARIO  !=  3 && $CODIGO_USUARIO  !=  2) {
		if($FECHA_CONFIRMACION > $fecha7){
			$color_celda = "style= 'background:#3ADF00; color:#000;'";
    	}
		else if($FECHA_CONFIRMACION < date('Y-m-d')){
			$color_celda = "style= 'background:#DF0101; color:#000;'";
		}
    	else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7){	
    		$color_celda = "style= 'background:#FFFF00; color:#000;'";	
		}

		echo "<td ".$color_celda." align='center'>".$FECHA_CONFIRMACION."</td>";	
	} 
	else */ if($ESTADO == "OK")
    {
	echo "<td style= 'background:#0000FF;'><center><input style= 'background:#0000FF; color: white;' id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/></center></td>";	
    }
    else if($ESTADO == "Nulo")
    {
	echo "<td style= 'background:#38383B;'><center><input style= 'background:#38383B;color:#fff;'  id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/></center></td>";	
    }
	else
	{	
	if($FECHA_CONFIRMACION > $fecha7)
	{
	echo "<td style= 'background:#3ADF00;'><center><input style= 'background:#3ADF00;'  id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/></center></td>";	
    }
	else if($FECHA_CONFIRMACION < date('Y-m-d'))
	{
	echo "<td style= 'background:#DF0101;'><center><input style= 'background:#DF0101;color:#FFF;'  id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/>  </center></td>";			
	}
    else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
    {
	echo "<td style= 'background:#FFFF00;'><center><input style= 'background:#FFFF00;'  id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/></center></td>";			
	}

	}
	echo "<td style= 'background:#EACFCF;'><center>" . 
	$CODIGO_USUARIO1. "</center></td>";
    echo "<td align='right' style= 'background:#EACFCF;'>" . 
	number_format($NETO , 0, ",", ".").   "</td>"; 
	echo "<td align='right' style= 'background:#EACFCF;'>" . $FACTURAS.   "</td>";
	echo "<td align='center' title='".$row["COMENTARIO"]."' style= 'background:#EACFCF;'><svg  height='20' width='20'><circle cx='10' cy='10' r='8' stroke='#CCC' stroke-width='1' fill='".$fill."' /></svg> </td>";

	echo "<td style= 'background:#EACFCF;'><center><input style= 'background:#EACFCF;' onchange='enviar(".$CODIGO_OC.",value,name);' id = 'fechav".$numero."' name='fechav".$numero."' type='text' value='".$FECHA_ENVIOV."' class='textf'/></center></td>";	
	echo "<td align='right' style= 'background:#EACFCF;'><a href=RecibirOC.php?CODIGO_OC=" .$CODIGO_OC. ">Recibir</a></td>"; 	
    echo "<td style= 'background:#EACFCF;'><center>" . 
	$ESTADO. "</center></td></tr></tbody>";
    }
	else
	{
    echo "<tbody><tr><td><center> <a href=DescripcionOC1.php?CODIGO_OC=" .$CODIGO_OC. ">" . 
	$CODIGO_OC . "</a><input style='display:none;' onchange='enviar(".$CODIGO_OC.",value,name);' id = 'codoc".$numero."' name='codoc".$numero."' type='text' value='".$CODIGO_OC."' class='textf'/></center></td>";
	echo "<td><center><a href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($ROCHA_PROYECTO)."><center>" . 
	($ROCHA_PROYECTO) . "</a></center></td>";
	echo "<td ><center>" . 
	($VERSION) . "</center></td>";	
	echo "<td><center>" . 
	($NOMBRE_PROVEEDOR) . "</center></td>";	
    echo "<td><center>" . 
	($FECHA_REALIZACION) . "</center></td>";
    echo "<td><center>" . 
	$FECHA_ENTREGA . "</center></td>";

/*	if($CODIGO_USUARIO  !=  3 && $CODIGO_USUARIO  !=  2) {
		if($FECHA_CONFIRMACION > $fecha7){
			$color_celda = "style= 'background:#3ADF00; color:#000;'";
    	}
		else if($FECHA_CONFIRMACION < date('Y-m-d')){
			$color_celda = "style= 'background:#DF0101; color:#000;'";
		}
    	else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7){	
    		$color_celda = "style= 'background:#FFFF00; color:#000;'";	
		}

		echo "<td ".$color_celda." align='center'>".$FECHA_CONFIRMACION."</td>";	
	} 
    else */ if($ESTADO == "OK")
    {
	echo "<td style= 'background:#0000FF;'><center><input style= 'background:#0000FF; color: white;'  id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/></center></td>";	
    }
    else if($ESTADO == "Nulo")
    {
	echo "<td style= 'background:#38383B;'><center><input style= 'background:#38383B;color:#fff;'  id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/></center></td>";	
    }
    else
	{	
	if($FECHA_CONFIRMACION > $fecha7)
	{
	echo "<td style= 'background:#3ADF00;'><center><input style= 'background:#3ADF00;'  id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/></center></td>";	
	}
    else if($FECHA_CONFIRMACION < date('Y-m-d'))
    {
	echo "<td style= 'background:#DF0101;'><center><input style= 'background:#DF0101;color:#FFF;' id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/>  </center></td>";			
	}
    else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
	{
	echo "<td style= 'background:#FFFF00;'><center><input style= 'background:#FFFF00;'  id = 'fechac".$numero."' name='fechac".$numero."' type='text' value='".$FECHA_CONFIRMACION."' data-codigo_usuario='".$CODIGO_USUARIO."' data-codigo_oc='".$CODIGO_OC."' class='textff'/></center></td>";			
    }
	}
	echo "<td><center>" . 
	$CODIGO_USUARIO1. "</center></td>";
    echo "<td align='right'>" . 
	number_format($NETO , 0, ",", ".").   "</td>"; 
	echo "<td align='right'>" . $FACTURAS.   "</td>";
	echo "<td align='center' title='".$row["COMENTARIO"]."' ><svg  height='20' width='20'><circle  cx='10' cy='10' r='8' stroke='#CCC' stroke-width='1' fill='".$fill."' /></svg> </td>";
	echo "<td><center><input   onchange='enviar(".$CODIGO_OC.",value,name);' id = 'fechav".$numero."' name='fechav".$numero."' type='text' value='".$FECHA_ENVIOV."' class='textf'/></center></td>";	
	echo "<td align='right'><a href=RecibirOC.php?CODIGO_OC=" .$CODIGO_OC. ">Recibir</a></td>"; 	
    echo "<td><center>" . $ESTADO. "</center></td></tr></tbody>"; 
	}
    $numero++;
	$contador1++;
  }
  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
<input style="display:none;" name="esta" id="esta" value="<?php echo $ES;?>" />
<input style="display:none;"type="text" autocomplete="off" id="buscar_codigo1" name="buscar_codigo1" value="<?php echo $BUSCAR_CODIGO?>" />
<input style="display:none;" type="text" autocomplete="off" id="buscar_usuario1" name="buscar_usuario1"  value="<?php echo $BUSCAR_DESCRIPCION?>"  />

</body>
</html>