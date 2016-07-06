<?php 
require_once('Conexion/Conexion.php');
$rad = $_GET['radicado'];

mysql_select_db($database_conn, $conn);

$contador = "select * from radicado where CODIGO_RADICADO = '".$rad."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
  $CLIENTE = $row["CLIENTE"];
  $RUT_CLIENTE = $row["RUT_CLIENTE"];
  $OBRA = $row["OBRA"];
  $DIRECCION_OBRA = $row["DIRECCION"];
  $OC = $row["OC"];
  $CONDICION_PAGO = $row["CONDICION_PAGO"];
  $DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
  $DIRECTOR = $row["EJECUTIVO"];
  $DISENADOR = $row["DISENADOR"];
  $CONTACTO = $row["CONTACTO"];
  $FONO = $row["FONO"];
  $MAIL = $row["MAIL"];
  $VALIDEZ = $row["VALIDEZ_COTIZACION"];
  $PUESTOS = $row["PUESTOS"];
  $SUB_TOTAL = $row["SUB_TOTAL"];
  $DESCUENTO = $row["DESCUENTO"];
  $FECHA_INGRESO = $row["FECHA_INGRESO"];
  $FECHA_ENTREGA = $row["FECHA_ENTREGA"];
  $FECHA_CONTACTO = $row["FECHA_CONTACTO"];
  $DIAS_RADICADO = $row["DIAS_RADICADO"];
  $FECHA_INICIOR = $row["FECHA_INICIO_ROCHA"];
  $FECHA_ENTREGAR = $row["FECHA_ENTREGA_ROCHA"];
  $DIAS_ROCHA = $row["DIAS_ROCHA"];
  $ESTADO = $row["ESTADO"];
  $NETO = $row["NETO"];
  $IVA = $row["IVA"];
  $TOTAL = $row["TOTAL"];
  $TIPO_IVA = $row["TIPO_IVA"];
  $DISABLED = "";
  $COLOR = "";
  $DESCUENTO2 = $row["DESCUENTO2"];
  $MONTO2 = $row["MONTO2"];
}
mysql_free_result($result1);

include('convertToPDF.php');

$logo = "<table class='logo'><tr><td><img src='Imagenes/LogoMD.jpg'></td></tr></table>";

$header = "	<table class='form-cotizacion'>
		<tr>
			<td class='color'>Radicado</td>
			<td> $rad </td>
			<td class='color'>Fecha</td>
			<td>".date("Y-m-d")."</td>
		</tr>
		<tr>
			<td class='color'>Cliente</td>
			<td>$CLIENTE</td>
			<td class='color'>Rut</td>
			<td> $RUT_CLIENTE</td>
		</tr>
		<tr>
			<td class='color'>Dirección despacho</td>
			<td> $DIRECCION_OBRA</td>
			<td class='color'>Direccion facturación</td>
			<td>$DIRECCION_OBRA</td>
		</tr>
		<tr>
			<td class='color'>Telefono</td>
			<td> $FONO</td>
			<td class='color'>Fecha instalación</td>
			<td>$FECHA_ENTREGA</td>
		</tr>
		<tr>
			<td class='color'>Orden CC</td>
			<td> $OC </td>
			<td class='color'>Directores de proyectos</td>
			<td>$DIRECTOR</td>
		</tr>
		<tr>
			<td class='color'>Condiciones de pago</td>
			<td>$CONDICION_PAGO </td>
			<td class='color'>Transporte</td>
			<td>Bicicleta</td>
		</tr>
		<tr>
			<td class='color'>Validez de la cotizacion</td>
			<td>$VALIDEZ</td>
			<td class='color'>Tiempo entrga</td>
			<td>$DIAS_RADICADO</td>
		</tr>
		<tr>
			<td class='color'>Departamento credito</td>
			<td>$DEPARTAMENTO_CREDITO </td>
			<td class='color'>Contacto</td>
			<td>$CONTACTO</td>
		</tr>
	</table>";




$contador = "select * from cotizacion where CODIGO_RADICADO = '".$rad."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
	 $CODIGO_COTIZACION = $row["CODIGO_COTIZACION"];
}
mysql_free_result($result1);


$contenido = "<table class='contenido'><tr class='encabezado'> <td align='center'>Codigo</td> <td align='center'>Descripción</td> <td align='center'>Acabado</td> <td align='center'>Cant</td> <td align='center'>V unitario</td> <td align='center'>V total</td> </tr>";

$contador = "select UBICACION from cotizacion_producto where CODIGO_COTIZACION = '".$CODIGO_COTIZACION."' group by ubicacion";
$result1 = mysql_query($contador,$conn) or die(mysql_error());
while($row = mysql_fetch_array($result1))
{
$contenido .= "<tr><td class='productito' align='center' colspan='6'>".$row["UBICACION"]."</td></tr>";
$contador1 = "select * from cotizacion_producto where CODIGO_COTIZACION = '".$CODIGO_COTIZACION."' AND UBICACION = '".$row["UBICACION"]."'";
$result11 = mysql_query($contador1,$conn) or die(mysql_error());
$suma = 0;
	while($row = mysql_fetch_array($result11))
	{
		$contenido .= "<tr><td class='uno'>".$row["CODIGO_PRODUCTO"]."</td><td class='dos'>".$row["DESCRIPCION"]."</td><td class='tres'></td><td align='center' class='cuatro'>".$row["CANTIDAD"]."</td><td class='cinco' align='right'>".number_format($row["VALOR_UNITARIO"],0,",",".")."</td><td class='seis' align='right'>".number_format($row["VALOR_TOTAL"],0,",",".")."</td> </tr>";
		$suma += $row["VALOR_TOTAL"];
	}
$contenido .= "<tr><td align='right' colspan='5'><b>Total</b></td><td align='right'><b>".number_format($suma,0,",",".")."</b></td></tr><tr><td id='neto'> &nbsp;</td></tr>";
}
mysql_free_result($result1);


$contador = "select * from cotizacion where CODIGO_RADICADO = '".$rad."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());
while($row = mysql_fetch_array($result1))
{
  $NETO = $row["NETO"];
  $DESCUENTO = $row["DESCUENTO"];
  $SUB_TOTAL = $row["SUB_TOTAL"];
  $DESCUENTO2 = $row["DESCUENTO2"];
  $SUB_TOTAL2 = $row["SUB_TOTAL2"];
  $IVA = $row["IVA"];
  $TOTAL = $row["TOTAL"];

  $contenido .= "<tr> <td class='separador' id='neto' colspan='5' align='right'><b>Neto</b></td> <td class='separador' id='neto' align='right'><b>".number_format($NETO,0,",",".")."</b></td></tr>";
  $contenido .= "<tr> <td id='neto' colspan='5' align='right'><b>Descuento</b></td> <td id='neto' align='right'><b>".number_format($DESCUENTO,0,",",".")."%</b></td></tr>";
  $contenido .= "<tr> <td id='neto' colspan='5' align='right'><b>Sub total</b></td> <td id='neto' align='right'><b>".number_format($SUB_TOTAL,0,",",".")."</b></td></tr>";
  $contenido .= "<tr> <td id='neto' colspan='5' align='right'><b>Descuento 2</b></td> <td id='neto' align='right'><b>".number_format($DESCUENTO2,0,",",".")."%</b></td></tr>";
  $contenido .= "<tr> <td id='neto' colspan='5' align='right'><b>Sub total 2</b></td> <td id='neto' align='right'><b>".number_format($SUB_TOTAL2,0,",",".")."</b></td></tr>";
  $contenido .= "<tr> <td id='neto' colspan='5' align='right'><b>Iva</b></td> <td id='neto' align='right'><b>".number_format($IVA,0,",",".")."</b></td></tr>";
  $contenido .= "<tr> <td id='neto' colspan='5' align='right'><b>Total</b></td> <td id='neto' align='right'><b>".number_format($TOTAL,0,",",".")."</b></td></tr>";
}
mysql_free_result($result1);

$contenido .= "</table>";

$firma = "<table class='firma'><tr><td align='center'>Firma Cliente</td> <td align='center'>Firma Director de Proyecto</td> <td align='center'>Firma Gerente Comercial</td></tr></table>";

 doPDF('ejemplo',$logo.$header.$contenido.$firma,true,'Style/pdf-radicado.css');
?>