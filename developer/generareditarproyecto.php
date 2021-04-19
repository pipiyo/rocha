<?php 
$CODIGO_PROYECTO = $_GET["CODIGO_PROYECTO"];
$USUARIO = $_GET["CODIGO_USUARIO"];
?>


<form  id = 'formulario2' method="post" action="" />
<div id="popup1" style="" onMouseMove="fecha11();">
<div class="content-popup1">
<table width="450"  >
<tr>
<td colspan="3"><center> <h1>Nueva actividad</h1> </center></td>
</tr>
<tr>
<td width="150" ><b>Tipo:</b></br><select style="width:120px;" onchange="seleccion1();" id = "txt_nombre_servicio" name="txt_nombre_servicio">
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
<option>FI</option>
</select> </td>
<td width="150"><b>Fecha inicio:</b></br><input type="text" onClick="fecha11();" onKeyDown="fecha11();" onchange="dias1();"  id= "txt_fechai_servicio" name = "txt_fechai_servicio" value="" />  </td>
<td width="150"><b>Fecha entrega:</b></br><input onClick="fecha11();" onchange="dias1();" type="text"  id= "txt_fechae_servicio" name = "txt_fechae_servicio" value="" />  </td>
</tr>

<tr>
<td width="150"><b>Realizador:</b></br><input onKeyDown="fecha11();;" type="text" readonly  id= "txt_realizador" name = "txt_realizador" value="<?php echo $USUARIO ?>" /> </td>
<td width="150"><b>Supervisor:</b></br><input type="text"  id= "txt_supervisor" name = "txt_supervisor" value="" /><input readonly type="text" onkeypress="return justNumbers(event);" onkeyup="es_vacio();" id = "CODIGO_PROYECTO" name = "CODIGO_PROYECTO" style="display:none;" value="<?php echo $CODIGO_PROYECTO ?>">  </td>
<td width="150"><b>Dias:</b></br><input readonly type="text" onchange="dias1();"  id= "txt_cantidad_dias" name = "txt_cantidad_dias" value="" />  </td>
</tr>

<tr>
<td colspan="3"><b>Descripcion:</b></br><textarea rows="3" cols="55" id="txt_descripcion_s" name = "txt_descripcion_s"></textarea> </td>

</tr>
<tr>
<td colspan="3"><b>Observaciones:</b></br><textarea rows="3" cols="55" id="txt_observaciones_s" name = "txt_observaciones_s"></textarea> </td>

</tr>
<tr>
<td width="150"><b>Predecesor:</b></br><input  type="text"  id= "txt_predecesor" name = "txt_predecesor" value="" />  </td>

<td width="150"><b>Reclamos:</b></br><input  type="text"  id= "txt_reclamos" name = "txt_reclamos" value="" /> </td>


<div id="Adquisiciones" style = "Display:none;">

<td width="150"><b>Categoria:</b></br><select onChange="habilitarpro();habilitarpros();" onBlur="habilitarpro();habilitarpros();"  style="width:150px;" id = "txt_Categoria" name="txt_Categoria">
<option></option>
<option>Proceso</option>
<option>Proyecto</option>
<option>Solicitud</option>
</select> </td>

</div>


</tr>
</table>
<div id="General" style = "Display:none;">
<table width="450" >
<tr>
<td width="150" ><b>Direccion:</b></br><input type="text"  id= "txt_direccions" name = "txt_direccions" value="" /> </td>
<td width="150"> <b>TP/TM/FI:</b></br><input type="text"  id= "txt_ttf" name = "txt_ttf" value="" /> </td>
<td>&nbsp;  </td>
</tr>
</table>
</div>
<div id="Despacho" style = "Display:none;">
<table width="450">
<tr>
<td width="150"><b>Guia Despacho:</b></br><input type="text"  id= "txt_guia" name = "txt_guia" value="" /> </td>
<td width="150"><b>Vehiculo:</b></br><select style="width:150px"  id = "txt_transporte" name="txt_transporte">
<option></option>
<option>CBWT-96 (Camion 1)</option>
<option>CRBC-30 (Camion 2)</option>
<option>FXVD-65 (Camion 3)</option>
<option>CFDL-32 (Furgon 1)</option>
<option>FYYC-66 (Furgon 2)</option>
<option>DDVG-61 (Camioneta)</option>
<option>Externo</option>
</select> </td>
<td>&nbsp;  </td>
</tr>
</table>
</div> 
<div id="Instalacion" style = "Display:none;">
<table width="450">
<tr>
<td width="150"><b>Lider 1:</b></br><input type="text"  id= "lider" name = "lider" value="" /> </td>
<td width="150"><b>Puestos</b></br><input type="text"  id= "puestos" name = "puestos" value="" /> </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td width="150"><b>Instalador 1:</b></br><input type="text"  id= "ins1" name = "ins1" value="" /> </td>
<td width="150"><b>Instalador 2:</b></br><input type="text"  id= "ins2" name = "ins2" value="" /> </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td width="150"><b>Instalador 3:</b></br><input type="text"  id= "ins3" name = "ins3" value="" /> </td>
<td width="150"><b>Instalador 4:</b></br><input type="text"  id= "ins4" name = "ins4" value="" /> </td>
<td>&nbsp;  </td>
</tr>
</table>
</div>
<div id="Servicio" style = "Display:none;">
<table width="450">
<tr>
<td width="150"><b>Tipo Servicio</b></br><select onchange="seleccion();" id = "txt_servicio" name="txt_servicio">
<option>Servicio Tecnico </option>
<option>Garantia</option></select> </td>
<td width="150"><b>N° Documento</b></br><input type="text"  id= "txt_documento" name = "txt_documento" value="" /> </td>
<td>&nbsp;  </td>
</tr>
<tr>
<td width="150"><b>Tecnico 1:</b></br><input type="text"  id= "tec1" name = "tec1" value="" /> </td>
<td width="150"><b>Tecnico 2:</b></br><input type="text"  id= "tec2" name = "tec2" value="" /> </td>
<td>&nbsp;  </td>
</tr>
</table>
</div>
<div  id="Produccion" style = "Display:none;">
<table width="450">
<tr>
<td width="150"> <b>Ejecutor</b></br><input type="text"  id= "txt_ejecutor" name = "txt_ejecutor" value="" /> </td>
<td width="150"><b>OC</b></br><input  type="text"  id= "txt_prooc" name = "txt_prooc" value="" /> </td>
<td width="150"><b>Proceso:</b></br><select disabled style="width:150px;" id = "txt_proceso" name="txt_proceso">
<option></option>
<option>Corte</option>
<option>Ruteado</option>
<option>Enchape Recto</option>
<option>Enchape Curvo</option>
<option>Laminado</option>
<option>Perforado</option>
<option>Barniz</option>
<option>Armado</option>
<option>Limpieza</option>
<option>Mueble Especiales</option>
</select> </td>
</tr>
<tr>
<td width="150"><b>Cantidad</b></br><input type="text"  id= "txt_cant" name = "txt_cant" value="" /> </td>
</tr>
</table>
</div>
<div id="Sillas" style = "Display:none;">
<table width="450">
<tr>
<td width="150"> <b>Ejecutor</b></br><input type="text"  id= "txt_ejecutors" name = "txt_ejecutors" value="" /> </td>
<td width="150"><b>OC</b></br><input  type="text"  id= "txt_proocs" name = "txt_proocs" value="" /> </td>
<td width="150"><b>Proceso:</b></br><select disabled style="width:150px;" id = "txt_procesos" name="txt_procesos">
<option></option>
<option>Tapizado</option>
<option>Retapizado</option>
<option>Armado</option>
<option>Limpieza</option>
<option>Inventario</option>
</select> </td>

<tr>
<td width="150"><b>Cantidad</b></br><input type="text"  id= "txt_cants" name = "txt_cants" value="" /> </td>
</tr>

<td>&nbsp;  </td>
</tr>
</table>
</div>

<div id="Bodega" style = "Display:none;">
<table width="450">
<tr>
<td width="150"><b>Bodega: </b></br><select style="width:150px;" id = "txt_bodega" name="txt_bodega">
<option></option>
<option>Insumo</option>
<option>Sillas</option>
<option>Despacho</option>
</select> </td></tr>

</table>
</div>
<input readonly type="submit" id="ingresars" name="ingresars" value="Ingresar">



</div> <!--content-poppup -->
</div> <!--poppu-->
</form>