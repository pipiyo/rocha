
<?php 
require_once('Conexion/Conexion.php');

$COD_RECLAMO = $_GET["CODIGO_RECLAMO"];

$RECLAMOS = 0;
$sql3 = "SELECT * FROM reclamos WHERE CODIGO_RECLAMO = '".$COD_RECLAMO."'";
$result3 = mysql_query($sql3, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result3))
  {
	$RECLAMOS = $row["CODIGO_RECLAMO"];
	$AREA_RECL =  $row["AREA"];
	$AREA_RECL1 =  $row["AREA1"];
	$AREA_RECL2 =  $row["AREA2"];
	$RAZON_RECL =  $row["RAZON"];
  }
 ?>

<form  id = 'formulario2' method="post" action="scriptModificarReclamo.php" />
<div id="popup1" style="" onMouseMove="fecha();completar();">
<div class="content-popup1">
<center>
<table>
<tr>
<td width="80px" style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; margin:20px;">Codigo</td>
<td><input style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text" value="<?php echo $RECLAMOS; ?>" id="cod_rcla" name ="cod_rcla" /></td>
</tr>
<tr>
<td style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; margin:20px;"> Area </td>
<td><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id="area" name ="area" />
<option><?php echo $AREA_RECL ; ?></option>
<option>COMERCIAL</option>
  <option>DAM</option>
  <option>ADQUISICIONES</option>
  <option>PRODUCCION</option>
  <option>DESPACHO</option>
  <option>TRANSPORTE</option>
  <option>INSTALACION</option>
  <option>CLIENTE</option>
   <option>SILLAS</option>
  <option>PROVEEDOR</option>
</select> </td>
</tr>
<tr>
<td style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; margin:20px;"> Area 1 </td>
<td>
<select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id="area1" name ="area1" />
<option><?php echo $AREA_RECL1 ; ?></option>
<option>COMERCIAL</option>
  <option>DAM</option>
  <option>ADQUISICIONES</option>
  <option>PRODUCCION</option>
  <option>DESPACHO</option>
  <option>TRANSPORTE</option>
  <option>INSTALACION</option>
  <option>CLIENTE</option>
   <option>SILLAS</option>
  <option>PROVEEDOR</option>
</select> </td>
</tr>
<tr>
<td style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; margin:20px;"> Area 2 </td>
<td><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id="area2" name ="area2" />
<option><?php echo $AREA_RECL2 ; ?></option>
<option>COMERCIAL</option>
  <option>DAM</option>
  <option>ADQUISICIONES</option>
  <option>PRODUCCION</option>
  <option>DESPACHO</option>
  <option>TRANSPORTE</option>
  <option>INSTALACION</option>
  <option>CLIENTE</option>
   <option>SILLAS</option>
  <option>PROVEEDOR</option>
</select>  </td>
</tr>
<tr>
<td style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; margin:20px;"> Razon </td>
<td> <select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id="razon" name ="razon" />
  <option><?php echo $RAZON_RECL ; ?></option>
  <option>Faltante Material</option>
  <option>Acabado Diferente</option>
  <option>Dimension Diferente</option>
  <option>Defecto De Frabica</option>
  <option>Diseño De Producto</option>
  <option>Error Medidas Obra</option>
  <option>Otro</option>
</select></td>
</tr>
<tr>

<td colspan="2"><input style=" width:100%; margin-bottom:20px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; cursor:pointer; color:#000;background-color: #CFCFCF; height:25px;border-radius: 10px; border:#fff 1px solid;" type="submit" value="Ingresar" id="ingresars" name ="ingresars" /> </td>
</tr>
</table>


</center>
</div> <!--content-poppup -->
</div> <!--poppu-->
