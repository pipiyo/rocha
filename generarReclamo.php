
<?php 
require_once('Conexion/Conexion.php');

$RECLAMOS = 0;
$sql3 = "SELECT * FROM reclamos ORDER BY CODIGO_RECLAMO DESC LIMIT 1";
$result3 = mysql_query($sql3, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result3))
  {
	$RECLAMOS = $row["CODIGO_RECLAMO"];
	
  }
 ?>

<form  id = 'formulario2' method="post" action="" />
<div id="contenedor" onMouseMove="fecha();completar();">
<div id="popup" style="" onMouseMove="fecha();completar();">



<table class="generar-reclamo">
<tr>
<td></td>
<td></td>
<td><input placeholder="Rocha" class="input-reclamo" onBlur="vacio();" type="text" value="" id="rochar" name ="rochar" /></center></td>
<td></td>
<td> </td>
</tr>
</table>

<table class="generar-reclamo">
<tr>
<td colspan="5" ><h3>Reclamo</h3></td>
</tr>
<tr>
<td><input type="text" class="input-reclamo" value="<?php echo $RECLAMOS + 1; ?>" id="cod_rcla" name ="cod_rcla" /></td>
<td>
  <select id="area" name ="area" />
    <option value="">Area</option>
    <option>AREA TECNICA</option>
    <option>COMERCIAL</option>
    <option>DAM</option>
    <option>PRODUCCION</option>
    <option>DESPACHO</option>
    <option>INSTALACION</option>
    <option>CLIENTE</option>
    <option>PROVEEDOR</option>
  </select>
</td>
<td>
  <select  id="razon" name ="razon" />
    <option value="">Razon</option>
    <option>Faltante Material</option>
    <option>Acabado Diferente</option>
    <option>Dimension Diferente</option>
    <option>Defecto De Frabica</option>
    <option>Diseño De Producto</option>
    <option>Daños Otros</option>
  </select>
</td>
<td>
  <select  id="area1" name ="area1" />
    <option value="">Area</option>
    <option>AREA TECNICA</option>
    <option>COMERCIAL</option>
    <option>DAM</option>
    <option>PRODUCCION</option>
    <option>DESPACHO</option>
    <option>INSTALACION</option>
    <option>CLIENTE</option>
    <option>PROVEEDOR</option>
  </select>
</td>
<td>
  <select id="area2" name ="area2" />
    <option value="">Area</option>
    <option>AREA TECNICA</option>
    <option>COMERCIAL</option>
    <option>DAM</option>
    <option>PRODUCCION</option>
    <option>DESPACHO</option>
    <option>INSTALACION</option>
    <option>CLIENTE</option>
    <option>PROVEEDOR</option>
  </select>
</td>
</tr>
<tr>
<td><input onClick="validar();" type="checkbox" id="actis" name="actis" > </td>
<td  colspan="4"><p> solo actividad</p></td>
</tr>
</table>



<table class="generar-reclamo">
<tr>
<td colspan="5"><h3>Nueva actividad</h3></td>
</tr>

<tr>
<td><select onchange="seleccion1();" id = "txt_nombre_servicio" name="txt_nombre_servicio">
<option>Adquisiciones</option>
<option>Produccion</option>
<option>Despacho</option>
<option>Instalacion</option>
<option>Desarrollo</option>
<option>Mantencion</option>
<option>Sillas</option>
<option>Bodega</option>
<option>Sistema</option>
<option>Servicio Tecnico</option>
</select> </td>
<td><input class="input-reclamo" placeholder="Fecha Inicio" type="text" onClick="fecha();" onKeyDown="fecha();" onchange="dias1();"  id= "txt_fechai_servicio" name = "txt_fechai_servicio" value="" />  </td>
<td><input class="input-reclamo" placeholder="Fecha Entrega" onClick="fecha();" onchange="dias1();" type="text"  id= "txt_fechae_servicio" name = "txt_fechae_servicio" value="" />  </td>
<td><select  id = "txt_categoria" name="txt_categoria">
<option>Proyecto</option>
<option>Proceso</option>
<option>Solicitud</option>
</select></td>
<td><input disabled class="input-reclamo" placeholder="Reclamos"  type="text"  id= "txt_reclamos" name = "txt_reclamos" value="" /> </td>
</tr>

<tr>
<td><input class="input-reclamo" placeholder="Realizador" onKeyDown="fecha();" type="text" readonly  id= "txt_realizador" name = "txt_realizador" value="" /> </td>
<td><input class="input-reclamo" placeholder="Supervisor" type="text"  id= "txt_supervisor" name = "txt_supervisor" value="" /> </td>
<td><input readonly class="input-reclamo" placeholder="Dias" type="text" onchange="dias1();"  id= "txt_cantidad_dias" name = "txt_cantidad_dias" value="" />  </td>
<td><input class="input-reclamo" placeholder="Prodecesor" type="text" id= "txt_predecesor" name = "txt_predecesor" value="" />  </td>
</tr>

<tr>
<td colspan="2"><textarea placeholder="Descripción" class="input-reclamo" rows="1" cols="33" id="txt_descripcion_s" name = "txt_descripcion_s"></textarea> </td>
<td colspan="2"><textarea placeholder="Observación" class="input-reclamo" rows="1" cols="33" id="txt_observaciones_s" name = "txt_observaciones_s"></textarea> </td>
</tr>

</table>


<div id="General" style = "Display:none;">
<table class="generar-reclamo">
<tr>
<td><input placeholder="Dirección" type="text" class="input-reclamo" id= "txt_direccions" name = "txt_direccions" value="" /> </td>
<td><input  placeholder="TP/TM/FI"  type="text" class="input-reclamo"  id= "txt_ttf" name = "txt_ttf" value="" /> </td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
</table>
</div>
<div id="Despacho" style = "Display:none;">
<table class="generar-reclamo">
<tr>
<td colspan="5"><input  placeholder="Guia Despacho" class="input-reclamo" type="text"  id= "txt_guia" name = "txt_guia" value="" /> </td>
</tr>
</table>
</div> 
<div id="Instalacion" style = "Display:none;">
<table class="generar-reclamo">
<tr>
<td><input class="input-reclamo" placeholder="Lider 1" type="text"  id= "lider" name = "lider" value="" /> </td>
<td><input class="input-reclamo" placeholder="Puestos" type="text"  id= "puestos" name = "puestos" value="" /> </td>
<td><input class="input-reclamo" placeholder="Instalador 1" type="text"  id= "ins1" name = "ins1" value="" /> </td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td><input class="input-reclamo" placeholder="Instalador 2" type="text"  id= "ins2" name = "ins2" value="" /> </td>
<td><input class="input-reclamo" placeholder="Instalador 3" type="text"  id= "ins3" name = "ins3" value="" /> </td>
<td><input class="input-reclamo" placeholder="Instalador 4" type="text"  id= "ins4" name = "ins4" value="" /> </td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
</table>
</div>
<div id="Servicio" style = "Display:none;">
<table class="generar-reclamo">
<tr>
<td><select onchange="seleccion();" id = "txt_servicio" name="txt_servicio">
<option value="">Tipo Servicio </option>
<option>Servicio Tecnico </option>
<option>Garantia</option></select></td>
<td><input  class="input-reclamo" placeholder="N° Documento" type="text"  id= "txt_documento" name = "txt_documento" value="" /> </td>
<td></td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td><input class="input-reclamo" placeholder="Tecnico 1" type="text"  id= "tec1" name = "tec1" value="" /> </td>
<td><input class="input-reclamo" placeholder="Tecnico 2" type="text"  id= "tec2" name = "tec2" value="" /> </td>
<td></td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
</table>
</div>
<div id="Produccion" style = "Display:none;">
<table class="generar-reclamo">
<tr>
<td><select  id = "txt_proceso" name="txt_proceso">
<option>Corte</option>
<option>Ruteado</option>
<option>Enchape Recto</option>
<option>Enchape Curvo</option>
<option>Laminado</option>
<option>Perforado</option>
<option>Barniz</option>
<option>Armado</option>
<option>Limpieza</option>
</select> </td>
<td><input class="input-reclamo"  placeholder="Ejecutor" type="text"  id= "txt_ejecutor" name = "txt_ejecutor" value="" /> </td>
<td></td>
<td>&nbsp;  </td>
<td>&nbsp;  </td>
</tr>
</table>
</div>
<div id="Sillas" style = "Display:none;">
<table class="generar-reclamo">
<tr>
<td><select onchange="seleccion();" id = "txt_procesos" name="txt_procesos">
<option>Tapizado</option>
<option>Retapizado</option>
<option>Armado</option>
<option>Limpieza</option>
</select> </td>
<td><input type="text" class="input-reclamo" placeholder="Ejecutor" id= "txt_ejecutors" name = "txt_ejecutors" value="" /> </td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
</div>

<table class="generar-reclamo">
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td><input disabled type="submit" value="Ingresar" id="ingresars" name ="ingresars" /></td>
</tr>
</table>

</div> <!--poppu-->
</div> <!--poppu-->

</form>