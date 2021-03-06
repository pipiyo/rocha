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

	$CODIGO_OC = "";
	$BUSCAR_CODIGO = "";
	$BUSCAR_DESCRIPCION = "";	
	$BUSCAR_ROCHA = "";	
	$ES = "";

	/** Actual month last day **/
	function _data_last_month_day() { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year)); 
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
  	}
 
	/** Actual month first day **/
	function _data_first_month_day() {
	    $month = date('m');
	    $year = date('Y');
	    return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
	}
	$txt_desde = _data_first_month_day();	
	$txt_hasta = _data_last_month_day();

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
	}
?>

<!DOCTYPE html PUBLIC>
<html>
	<head>
		<title>Devoluciones V1</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="Imagenes/rocha.png">
		<link rel="stylesheet" type="text/css" href="Style/style_ListadoOC.css" />
		<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
		<link rel="styleSheet" href="style/bread.css" type="text/css" >
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
		<script type="text/javascript" src="js/informes-oc.js"></script>
		<script src='js/breadcrumbs.php'></script>
	</head>

	<body>
	<div id='bread'><div id="menu1"></div></div>

	<form  method="GET"/>
		<div class="box-form">  
			<h1>Listado OC devolución <?php echo $txt_desde. " / ". $txt_hasta ; ?></h1>    
		  	<table class="table-form">
			  	<tr>
			  		<td> 
			  			<label>OC</label>
			  			<input placeholder="Numero oc"  type="text"  autocomplete="off" id="buscar_codigo" name="buscar_codigo" /> 
			  		</td>
			  		<td>
			  			<label>Nombre proveedor</label> 
			  			<input placeholder="Proveedor" type="text"  autocomplete="off" id="buscar_usuario" name="buscar_usuario" /> 
			  		</td>
			  		<td>
			  		  <label>Estado OC</label> 
					  <select id = "estado1" name = "estado1">
					    <option value="" selected>Estado</option>
					    <option> Pendiente </option>
					    <option> Modificacion </option>
					    <option> En Proceso</option>
					    <option> Nulo </option>
					    <option> OK </option>
					    <option> Todo </option>
					  </select>
			  		</td>
			  		<td>
			  			<label>Código Rocha</label> 
			  			<input placeholder="Rocha" class = 'textbox' type="text" name="rocha_buscar" id = "rocha_buscar" value="" />
			  		</td>
				</tr>
				<tr>
			  		<td> 
			  			<label>Fecha Desde</label> 
			  			<input placeholder="Desde"  type="text" class = 'textbox' autocomplete="off" id="txt_desde" name="txt_desde" /> 
			  		</td>
			  		<td> 
			  			<label>Fecha Hasta</label> 
			  			<input placeholder="Hasta" type="text" class = 'textbox' autocomplete="off" id="txt_hasta" name="txt_hasta" /> 
			  		</td>
			  		<td align="center">
			  			<a href="excel-devolucion.php?estado=<?php echo $ES;?>&CODIGO_USUARIO=<?php echo $CODIGO_USUARIO;?>&txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta; ?>&buscar_usuario=<?php echo $BUSCAR_DESCRIPCION; ?>&buscar_codigo=<?php echo $BUSCAR_CODIGO; ?>&rocha_buscar=<?php echo $BUSCAR_ROCHA; ?>" target="_blank">
			  			<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel" class="right"></a>
			  		</td>
			  		<td><input type="submit" name = "buscar" id='buscar' value="Buscar"/> </td>
			  	</tr>
		  	</table>
	  	</div>	
 	</form>  



<table class="recibo">
	<tr>
		<th>N°</th>
		<th>Rocha</th>
		<th>Proveedor</th>
		<th>Fecha realizacion</th>
		<th>Fecha confirmacion</th>
		<th>Fecha Devolución</th>
		<th>Motivo</th>
		<th>Producto</th>
		<th>Cantidad</th>
		<th>Estado</th>
	</tr>

<?php


$query_registro = "
	SELECT orden_de_compra.CODIGO_OC, oc_devolucion.CODIGO_PRODUCTO,oc_devolucion.CANTIDAD, oc_devolucion.FECHA, oc_devolucion.MOTIVO , orden_de_compra.ROCHA_PROYECTO, orden_de_compra.FECHA_CONFIRMACION, orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR,orden_de_compra.COMENTARIO 
	FROM orden_de_compra, oc_devolucion
	WHERE orden_de_compra.CODIGO_OC = oc_devolucion.codigo_oc ";

	if($ES  == "" && $BUSCAR_DESCRIPCION  == "" && $BUSCAR_ROCHA == "" && $BUSCAR_CODIGO == ""){
		$query_registro .=" and not orden_de_compra.ESTADO = 'Nulo'";
	}

	if($ES  != "" && $ES  != "Todo"){
		$query_registro .= " and orden_de_compra.ESTADO = '".$ES."'";
	}

	if($txt_desde != "" && $txt_hasta != "" ){
		$query_registro .= "  and FECHA_CONFIRMACION between '".$txt_desde."' and '".$txt_hasta."'";
	}

	if($BUSCAR_DESCRIPCION  != ""){
		$query_registro .= " and orden_de_compra.NOMBRE_PROVEEDOR ='".$BUSCAR_DESCRIPCION."'";
	}

	if($BUSCAR_CODIGO != "" ){
		$query_registro .= " and orden_de_compra.CODIGO_OC = '".$BUSCAR_CODIGO."'";
	}
	else if($BUSCAR_ROCHA != ""){
		$query_registro .= " and orden_de_compra.ROCHA_PROYECTO ='".$BUSCAR_ROCHA."'";
	}

$query_registro .= " ORDER BY orden_de_compra.CODIGO_OC desc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;




 while($row = mysql_fetch_array($result))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$TOTAL = $row["TOTAL"];
	$NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
	$ESTADO = $row["ESTADO"];
	$ROCHA_PROYECTO = $row["ROCHA_PROYECTO"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$MOTIVO = $row["MOTIVO"];
	$FECHA_DEVOLUCION = $row["FECHA"];
	$CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
	$CANTIDAD = $row["CANTIDAD"];
	$numero ++;

	//$fill = (empty($row["COMENTARIO"])) ? "white" :  "#FF5600" ;
	
	echo "	<tbody>
				<tr>
					<td>
						<a href=DescripcionOC1.php?CODIGO_OC=" .$CODIGO_OC. ">" .$CODIGO_OC . "</a>
					</td>
					<td>
					" .$ROCHA_PROYECTO. "
					</td>
					<td>
					" . $NOMBRE_PROVEEDOR . "
					</td>
					<td align='center'>
					" . $FECHA_REALIZACION . "
					</td>
					<td align='center'>
					" . $FECHA_CONFIRMACION . "
					</td>
					<td align='center'>
					" .$FECHA_DEVOLUCION . "
					</td>
					<td>
					" .$MOTIVO. "
					</td>
					<td>
					" .$CODIGO_PRODUCTO. "
					</td>
					<td align='right'>
					" .$CANTIDAD. "
					</td>
					<td>
					" . $ESTADO. "
					</td>
				</tr>
			</tbody>";
	}
   

  echo "<tr class=\"alt\"><td colspan=\"10\"><font face=\"verdana\"><b>Numero: " . $numero . 
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