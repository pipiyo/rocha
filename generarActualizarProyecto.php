<?php require_once('Conexion/Conexion.php');  ?>
<?php
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
$buscarcli= $_GET['buscarcli'];
$buscareje= $_GET['buscareje'];
$buscarcod= $_GET['buscarcod'];
$confirmacion= $_GET['confirmacion'];
$entrega= $_GET['entrega'];
$estado= $_GET['estado'];
$dis= $_GET['dis'];
$rep= $_GET['rep'];
$ingreso= $_GET['ingreso'];
$GRP = '';
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);
?>
<div onMouseMove="fecha()">
  <form action = 'scriptActualizarProyecto.php' method='POST' id='formulario1'> 
   <table>
  
  <tr>
  <tr><h3><center>Fecha Confirmacion</center></h3></tr>
  <td width="50" style="margin:20px;">Area </td>
  
  <td width="150" style="margin:20px;"> <select onChange="valia();" style="width:150px" id = "area" name = "area">
  <option>Seleccione</option>
  <option>CLIENTE</option>
  <option>COMERCIAL</option>
  <option>DAM</option>
  <option>PROVEEDOR</option>
  <option>IMPORTACION</option>
  <option>ADQUISICIONES</option>
  <option>DESPACHO</option>
  <option>INSTALACION</option>
  <option>PRODUCCION</option>
  <option>SILLAS</option>
  <option>PLANIFICACION</option>
  </select><input style="display:none;" type="text" id = "razon" name = "razon" value= ""> </td>
  </tr>
  <tr>
  <td width="28" style="margin:20px;">Confirmacion</td>
  <td width="146" style="margin:20px;"> <input id = 'cul'  name='cul' type='text' value='<?php echo $confirmacion?>'/></td>
  </tr>
  
  
  
  
  
  
    <tr>
  <td width="28" style="margin:20px;">NO actualizar</td>
  <td width="146" style="margin:20px;"> <input id = 'act'  name='act' type='checkbox' value=''/></td>
  </tr>
  
  
  
  
  
  
  
  <tr>
  <td width="28" style="margin:20px;">observaciones</td>
  <td width="146" style="margin:20px;"><center><textarea onBlur="valia();" onClick="valia();" id="obs" name="obs" cols="15" rows="4"></textarea></center></td>
  </tr>
<input style="display:none" id='rocha' name='rocha'  type="text" value='<?php echo $CODIGO_PROYECTO; ?>' />
<input style="display:none" id='buscarcli' name='buscarcli' type="text" value='<?php echo $buscarcli; ?>' />
<input style="display:none" id='buscareje' name='buscareje' type="text" value='<?php echo $buscareje; ?>' />
<input style="display:none" id='buscarcod' name='buscarcod' type="text" value='<?php echo $buscarcod; ?>' />
<input  style="display:none" id = 'cil'  name='cil' type="text" value='<?php echo $ingreso; ?>' />
<input style="display:none" id = 'col'  name='col' type="text" value='<?php echo $entrega; ?>' />
<input style="display:none"id = 'dos'  name='dos' type="text" value='<?php echo $estado; ?>' />
<input style="display:none" id = 'dis'  name='dis' type="text" value='<?php echo $dis; ?>' />
<input style="display:none" id = 'rep'  name='rep' type="text" value='<?php echo $rep; ?>' />
  <tr>
  <td width="150"  align="left"></td>
  <td width="123" align="right"><center><input disabled="disabled" style="margin:10px; margin-bottom:30px;" type="submit"  name = "buscar4" id='buscar4' value="Aceptar"/></center> </td>
   </tr>
  </tr>
  </table>	
  </div>
 </form> 