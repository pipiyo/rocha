<?php
require_once('Conexion/Conexion.php');
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_OC1 = $_GET['CODIGO_OC'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);


$query_registro = "SELECT  orden_de_compra.DIFERENCIA_TOTAL,orden_de_compra.ROCHA_PROYECTO, orden_de_compra.DESPACHAR_NOMBRE,orden_de_compra.DESPACHAR_TELEFONO, orden_de_compra.CODIGO_OC,orden_de_compra.CODIGO_USUARIO,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.DESPACHAR_COMUNA,orden_de_compra.DESPACHAR_RUT,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR, orden_de_compra.CONDICION_PAGO, orden_de_compra.DESCUENTO_OC,orden_de_compra.SUB_TOTAL, orden_de_compra.TIPO_IVA, orden_de_compra.IVA, orden_de_compra.NETO, orden_de_compra.OBSERVACION FROM orden_de_compra, usuario where orden_de_compra.CODIGO_OC ='".($CODIGO_OC1)."'";

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESPACHAR = $row["DESPACHAR_DIRECCION"];
	$DESPACHAR_RUT = $row["DESPACHAR_RUT"];
	$DESPACHAR_COMUNA = $row["DESPACHAR_COMUNA"];
	$DESPACHAR_TELEFONO = $row["DESPACHAR_TELEFONO"];
	$DESPACHAR_NOMBRE = $row["DESPACHAR_NOMBRE"];
	$TOTAL = $row["TOTAL"];
	$NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
	$CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
	$ESTADO = $row["ESTADO"];
	$CONDICION_PAGO = $row["CONDICION_PAGO"];
	$DESCUENTO_OC = $row["DESCUENTO_OC"];
	$SUB_TOTAL = $row["SUB_TOTAL"];
	$TIPO_IVA = $row["TIPO_IVA"];
	$NETO = $row["NETO"];
	$IVA = $row["IVA"];
	$OBSERVACION = $row["OBSERVACION"];
	$ROCHA_PROYECTO = $row["ROCHA_PROYECTO"];
	$DIFERENCIA_TOTAL = $row["DIFERENCIA_TOTAL"];
	$MENSAJE = 2;
}
mysql_free_result($result);

  
$query_registro2 = "select proveedor.COMUNA, proveedor.DIRECCION, proveedor.RUT_PROVEEDOR, proveedor.NOMBRE_FANTASIA from orden_de_compra, oc_proveedor, proveedor where proveedor.CODIGO_PROVEEDOR = oc_proveedor.CODIGO_PROVEEDOR AND oc_proveedor.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'";
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2)){
	$NOMBRE_FANTASIA = $row["NOMBRE_FANTASIA"];
	$RUT_PROVEEDOR = $row["RUT_PROVEEDOR"];
	$DIRECCION = $row["DIRECCION"];
	$COMUNA = $row["COMUNA"];
}
mysql_free_result($result2);


$proveedor_valor = "RUT: ".$RUT_PROVEEDOR . "\n".$DIRECCION."\n".$COMUNA;   
$query_registro4 = "select usuario.NOMBRE_USUARIO from usuario where usuario.CODIGO_USUARIO = '".($CODIGO_USUARIO1)."'";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result4)){
	$USUARIO= $row["NOMBRE_USUARIO"];
}
mysql_free_result($result4);
  
$sql1 = "SELECT * FROM orden_de_compra where CODIGO_OC= '".$CODIGO_OC1."'";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2)){
	$CODIGO_OC = $row["CODIGO_OC"];
	$numero++;
}
mysql_free_result($result2);

$grupo = array();
$query = "SELECT grupo.INICIALES_GRUPO FROM grupo_usuario, usuario, grupo where grupo.ID_GRUPO = grupo_usuario.CODIGO_GRUPO and grupo_usuario.CODIGO_USUARIO = usuario.CODIGO_USUARIO and usuario.CODIGO_USUARIO = '".$CODIGO_USUARIO."'";
$result2 = mysql_query($query, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
  {
    $grupo[] = $row["INICIALES_GRUPO"];
  }
mysql_free_result($result2);

?>


<!DOCTYPE html>
<html>
<head>
	<title> Recibir OC V1.0.1</title>
	<link rel="shortcut icon" href="Imagenes/rocha.png">
  	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

  	<link rel="stylesheet" type="text/css" href="Style/style_RecibirOC.css" />
   	<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />

  	<script type="text/javascript" src="js/jquery.min.js"></script>
 	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  	<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  	<script src="js/jquery.ui.datepicker.js"></script>
 	
    <script src='js/breadcrumbs.php'></script>
    <script type="text/javascript" src="js/recibir-oc.js"></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>

<body>
	<div id='bread'><div id="menu1"></div></div>

	<form action = "scriptOCEntrega.php" method="post" id='formulario'>
	
	<div style="background:#fff; width:1000px; margin: auto;"><h1 style="color:#006;text-align: center;">Recepción OC - <?php echo $ESTADO ?></h1>
		<br />
		<table style="margin: auto;">
			<tr>
				<td> Proovedor:</td>
				<td> 
					<input onKeyUp="es_vacio2();" value="<?php echo ($NOMBRE_FANTASIA);?>" type="text" id = "proveedor" name="proveedor"/><input value="<?php echo $RUT_PROVEEDOR; ?>" type="text" id = "rut_prove" name="rut_prove"/> 
				</td>
				<td width="10">&nbsp;  </td>
				<td width="10">&nbsp;  </td>
				<td> Numero </td>
				<td> <input type="text" id = "folio" name="folio" value = "<?php echo $CODIGO_OC; ?>"/> </td>
			</tr>
		</table>
	</div>

	<br />
	<table rules="all" frame="box" id = "tabla_producto" cellspacing=0 cellpadding=0 style="font-size: 9pt; width:100%;">
		<thead>
			<tr>
				<th width="50" >Codigo</th>
				<th width="50">Rocha</th>
				<th>Descripcion</th>
				<th width="200">Observaciome enes</th>
				<th width="80">Cantidad</th>
				<th width="90">Cant Recibida</th>
				<th width="90">Cant Entrega</th>
				<th width="80">Diferencia</th>
				<th width="140">Guia Despacho</th>
			</tr>
		</thead>
	
	<?php
	$query_registro3 = "select producto.CATEGORIA,oc_producto.GUIA_DESPACHO,oc_producto.ID, oc_producto.CANTIDAD_RECIBIDA,  oc_producto.DIFERENCIA, oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".$CODIGO_OC."'";
		$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
		$contador= 1;
		$fin1 = 0;
		$fin2 = 0;
	while($row = mysql_fetch_array($result3)){
		$ID = $row["ID"];
		$COD_PRODUCTO = $row["CODIGO_PRODUCTO"]; 
		$DESCRIPCION = $row["DESCRIPCION"]; 
		$STOCK = $row["STOCK_ACTUAL"]; 
		$ROCHA = $row["ROCHA"]; 
		$OBSERVACION1 = $row["OBSERVACION"]; 
		$TOTAL_PRODUCTO = $row["TOTAL"];
		$DESCUENTO_PRODUCTO = $row["DESCUENTO"];
		$CANTIDAD = $row["CANTIDAD"];
		$PRECIO_BODEGA = $row["PRECIO_BODEGA"];
		$PRECIO_LISTA = $row["PRECIO_LISTA"];
		$PRECIO_UNITARIO = $row["PRECIO_UNITARIO"];
		$CANTIDAD_RECIBIDA = $row["CANTIDAD_RECIBIDA"];
		$DIFERENCIA = $row["DIFERENCIA"];
		$GUIA_DESPACHO = $row["GUIA_DESPACHO"];
		$CATEGORIA = $row["CATEGORIA"];

     echo "<tr><td> <a href=Producto.php?&buscar_codigo=" .urlencode($COD_PRODUCTO). "&buscar_usuario=&familias=&buscar=Buscar&valor=0> <input class='codigop' style='border:#fff 1px solid;'  name =cod".$contador." id =cod".$contador." type = 'text' value = '" . 
		$COD_PRODUCTO . "' /> </a> </td>";
	   
	if($ROCHA != ''){
	   
	echo "<td id = 'cel2'> <a href=editarProyecto.php?CODIGO_PROYECTO=" .urlencode($ROCHA). "> <input class='codigop' style='border:#fff 1px solid;' class='form8' name =roch".$contador." id =roch".$contador." type = 'text' value = '" . 
	    ($ROCHA) . "' /> </a> </td>";	
	} else {		
	
	echo "<td id = 'cel2'>  <input class='codigop' style='border:#fff 1px solid;' class='form8' name =roch".$contador." id =roch".$contador." type = 'text' value = '" . 
	    ($ROCHA) . "' />  </td>";		
	}	   			
    
    echo "<td id = 'cel3'><input  style='border:#fff 1px solid;' class='form2' id =des".$contador." type = 'text' value = '" . 
	    $DESCRIPCION .$CATEGORIA. $ID."' /><input  style='border:#fff 1px solid;DISPLAY:none;' class='form2' name =id".$contador." id =id".$contador." type = 'text' value = '" . 
	    $ID. "' /></td>";
    echo "<td id = 'cel4'><input style='border:#fff 1px solid;'  style='border:#fff 1px solid;'  class='form9' name =obs".$contador." id =obs".$contador." type = 'text' value = '". 
	    ($OBSERVACION1)."' /></td>";
	echo "<td id = 'cel6'><input style='border:#fff 1px solid;' class='form3' id =cans".$contador." name =cans".$contador." type = 'text' value = '" . 
	    $CANTIDAD . "' /></td>";
    echo "<td id = 'cel7'><input style='border:#CCC 1px solid;' onfocus='suma();' onkeydown='suma();' onchange='suma();' class='form4' name =cane".$contador." id =cane".$contador." type = 'text' value = '' /></td>"; 
	 
	echo "<td id = ''><input style='border:#fff 1px solid;' class='form2' name =entr".$contador." id =entr".$contador." type = 'text' value = '".$CANTIDAD_RECIBIDA."' /></td>";  

	echo "<td id = 'cel9'> <input style='border:#fff 1px solid;' class='form11' id =dif".$contador." name =dif".$contador." type = 'text' value = '".$DIFERENCIA."' /></td>";
	echo "<td id = 'cel9'> <input style='border:#CCC 1px solid;' onfocus='suma();' onkeydown='suma();' onchange='suma();' class='form4' id =guia".$contador." name =guia".$contador." type = 'text' value = '".$GUIA_DESPACHO."' /></td></tr>";

	$fin1+=$row['CANTIDAD_RECIBIDA'];
	$fin2+=$row['CANTIDAD'];
    $contador++; 
	
	
  }
  mysql_free_result($result3);
$fin3 = $fin1 - $fin2;
?>
	</table>

		<table id = "tabla3" border="0" style="margin:auto;">
			<tr>
				<td width="80" height="30"><?php if($fin3 < 0){?>
					<input value = "Realizar" disabled="disabled"  type="submit" id = "aceptar" name="aceptar"/><?php }  ?> 
				</td>

				<td width="80" height="30"> Diferencia Total <input  type = 'text' id="diftot" name ="diftot" value = "<?php echo $DIFERENCIA_TOTAL ?>"  /></td>
			</tr>
		</table>

		<input style="display:none" type = "text" id="codiguito" name="codiguito" value="<?php echo $CODIGO_USUARIO; ?>" />

	</form>

    <table class="recibo">
    	<tr>
    		<th>Código</th>
    		<th>total</th>
    		<th>Recibido</th>
    		<th>Fecha Recibo</th>
    		<th>User</th>
	   <?php
	   	$query_registro3 = "select * from oc_recibo where codigo_oc = '".$CODIGO_OC."'";
		$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());

		while($row = mysql_fetch_array($result3)){
			echo "<tr>";
			echo "<td>".$row[5]."</td>". "<td>".$row[2]."</td>". "<td>".$row[3]."</td>". "<td>".substr($row[4],0,11)."</td>". "<td>".$row[5]."</td>";
			echo "</tr>";
		}
		mysql_free_result($result3);
	  	mysql_close($conn);
	   ?>
   </table>

   <?php  if (in_array("INF", $grupo)|| in_array("BOD", $grupo) || in_array("ADQ", $grupo)) {?>
    <form id = 'formulariocerrar'  name = 'formulariocerrar' method="POST" action="script-forzar-cerrado-oc.php"/>
      <input type="hidden" id="id_oc" name="id_oc" value="<?php echo $CODIGO_OC; ?> ">
      <table style="float:right;">
        <tr>
        	<td>Solo usar si se requiere forzar el cerrado</td>
         	<td> <input onClick="enviar_oc_cerrado();" type="button" value="Cerrar OC"> </td>
        </tr>
      </table>
    </form> 
     <?php } ?>
	<body>
</html>