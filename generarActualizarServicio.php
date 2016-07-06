<?php require_once('Conexion/Conexion.php');  

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$CODIGO_PROYECTO= $_GET['codigoProyecto'];
$CODIGO_SERVICIO= $_GET['CodigoServicio'];
$EDITAR= $_GET['editar'];
$link= $_GET['link'];





$sql111 = "SELECT * from servicio where CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";





$result111 = mysql_query($sql111, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result111))
  {
	  $FECHA_E1 = $row["FECHA_ENTREGA"];
	  $FECHA_I1 = $row["FECHA_INICIO"];
	  $DIAS1 = $row["DIAS"];
  }
     mysql_free_result($result111);




?>
<div onMouseMove="fecha13();dias5();">
  <form action = 'scriptActualizarServicioFecha.php' method='POST' id='formulario1'> 
   <table>
   <input  id='fechaini' onClick="valia()" name='fechaini' type="hidden" value='<?php echo  $FECHA_I1; ?>' />
   <input  id='diasini' name='diasini' type="hidden" value='<?php echo   $DIAS1 ; ?>' />











  <tr>
  <tr><h3><center>Fecha Confirmacion</center></h3></tr>
  <td width="50" style="margin:20px;">Area </td>
  
  <td width="150" style="margin:20px;"> <select onChange="valia();" style="width:150px" id = "area" name = "area">
  <option>Seleccione</option>
  <option>ADQUISICIONES</option>
  <option>CLIENTE</option>
  <option>COMERCIAL</option>
  <option>DAM</option>
  <option>DESPACHO</option>
  <option>IMPORTACION</option>
  <option>INSTALACION</option>
  <option>PRODUCCION</option>
  <option>PLANIFICACION</option>
  <option>PREVENCION DE RIESGO</option>
  <option>PROVEEDOR</option>
  <option>SILLAS</option>
  </select><input style="display:none;" type="text" id = "razon" name = "razon" value= ""> </td>
  </tr>
  <tr>
  <td width="28" style="margin:20px;">Confirmacion</td>
  <td width="146" style="margin:20px;"> <input id = 'culq' onChange="dias5();"  name='culq' type='text' value='<?php echo  $FECHA_E1; ?>'/></td>
  </tr>
  <tr>
  <td width="28" style="margin:20px;">observaciones</td>
  <td width="146" style="margin:20px;"><center><textarea onBlur="valia();" onClick="valia();" id="obs" name="obs" cols="15" rows="4"></textarea></center></td>
  </tr>
<input style="display:none" id='rocha' name='rocha'  type="text" value='<?php echo $CODIGO_PROYECTO; ?>' />
<input style="display:none" id='CODSER' name='CODSER' type="text" value='<?php echo  $CODIGO_SERVICIO; ?>' />
<input style="display:none" id='link' name='link' type="text" value='<?php echo  $link; ?>' />
<input style="display:none" id='editar' name='editar' type="text" value='<?php echo  $EDITAR; ?>' />
  <tr>
  <td width="150"  align="left"></td>
  <td width="123" align="right"><center><input disabled="disabled" style="margin:10px; margin-bottom:30px;" type="submit"  name = "buscar4" id='buscar4' value="Aceptar"/></center> </td>
   </tr>
  </tr>
  </table>	
  </div>
 </form> 