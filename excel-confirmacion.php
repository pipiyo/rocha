<?php require_once('Conexion/Conexion.php');?>
<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=informe-confirmacion.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
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

thead th {
    background-color:#016EBF;
	font-size: 10px !important;
    color:#ECECEC;
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


<?php
mysql_select_db($database_conn, $conn);

$txt_desde = $_GET["txt_desde"];	
$txt_hasta = $_GET["txt_hasta"];

$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_DESCRIPCION = $_GET['buscar_usuario'];

$ES = $_GET['estado'];

if (isset($_GET["rocha_buscar"])){
	$BUSCAR_ROCHA = $_GET['rocha_buscar'];
}

if($_GET["txt_desde"] != "" && $_GET["txt_hasta"] != "" ){
	$txt_desde = $_GET["txt_desde"];	
	$txt_hasta = $_GET["txt_hasta"];
}		

$query_registro = "
	SELECT orden_de_compra.CODIGO_OC, oc_recibo.codigo_producto,oc_recibo.recibido, max(oc_recibo.fecha_recibido) AS fecha, orden_de_compra.ROCHA_PROYECTO, orden_de_compra.FECHA_CONFIRMACION, usuario.NOMBRE_USUARIO,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR,orden_de_compra.COMENTARIO 
	FROM orden_de_compra, usuario , oc_recibo
	WHERE orden_de_compra.codigo_usuario = usuario.codigo_usuario AND orden_de_compra.CODIGO_OC = oc_recibo.codigo_oc";

	if($ES  == "" && $BUSCAR_DESCRIPCION  == "" && $BUSCAR_ROCHA == "" && $BUSCAR_CODIGO == ""){
		$query_registro .=" and not orden_de_compra.ESTADO = 'Nulo' and not orden_de_compra.ESTADO = 'OK' ";
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
		$query_registro .= " and orden_de_compra.ROCHA_PROYECTO ='".($BUSCAR_ROCHA)."'";
	}

$query_registro .= "GROUP BY oc_recibo.codigo_oc ORDER BY oc_recibo.fecha_recibido desc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$trd ="";

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$TOTAL = $row["TOTAL"];
	$NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
	$CODIGO_USUARIO1 = $row["NOMBRE_USUARIO"];
	$ESTADO = $row["ESTADO"];
	$ROCHA_PROYECTO = $row["ROCHA_PROYECTO"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$FECHA_RECIBO = $row["fecha"];
	$CODIGO_PRODUCTO = $row["codigo_producto"];
	$RECIBIDO = $row["recibido"];
	$numero ++;

	$datetime1 = date_create($FECHA_CONFIRMACION);
	$datetime2 = date_create($FECHA_RECIBO);
	$interval = date_diff($datetime1, $datetime2);					

   $trd.="<tbody>
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
					" .$FECHA_RECIBO. "
					</td>
					<td align='center'>
					" .$interval->format('%a días'). "
					</td>
					<td>
					" .$CODIGO_PRODUCTO. "
					</td>
					<td align='right'>
					" .$RECIBIDO. "
					</td>
					<td>
					" . $ESTADO. "
					</td>
				</tr>
			</tbody>";
	}

  	mysql_free_result($result);
  	mysql_close($conn);
  
  	$content= "<table>  
       			<table>  
			       <thead>
						<tr>
							<th>N°</th>
							<th>Rocha</th>
							<th>Proveedor</th>
							<th>Fecha realizacion</th>
							<th>Fecha confirmacion</th>
							<th>Fecha Devolución</th>
							<th>Días</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Estado</th>
						</tr>
					</thead>
		        ".$trd." 			
    		</table>";     
	echo $content;	

?>
</body>
</html>