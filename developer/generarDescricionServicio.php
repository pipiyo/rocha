<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$CODIGO_PROYECTO= $_GET['CODIGO_PROYECTO'];
if(isset($_GET['editarp']))
{
$editarp= $_GET['editarp'];
}
else
{
	$editarp = "";
}
mysql_select_db($database_conn, $conn);
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

$CODIGO_SERVICIO = $_GET['CODIGO_SERVICIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM servicio WHERE CODIGO_SERVICIO ='".$CODIGO_SERVICIO."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$NOMBRE_SERVICIO1 = $row["NOMBRE_SERVICIO"];
	$FECHA_I1 = $row["FECHA_INICIO"];
	$FECHA_E1 = $row["FECHA_ENTREGA"];
	$REALIZADOR1 = $row["REALIZADOR"];
	$SUPERVISOR1 = $row["SUPERVISOR"];
	$OBSERVACION1 = $row["OBSERVACIONES"];
	$DESCRIPCION1 = $row["DESCRIPCION"];
	$CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
	$ESTADO1 = $row["ESTADO"];
	$PREDECESOR1 = $row["PREDECESOR"];
	$DIAS1 = $row["DIAS"];
	$DIRECCION= $row["DIRECCION"];
	$TPTMFI= $row["TPTMFI"];
    $GUIA= $row["GUIA_DESPACHO"];
	$INS1= $row["INSTALADOR_1"];
	$INS2= $row["INSTALADOR_2"];
	$INS3= $row["INSTALADOR_3"];
	$INS4= $row["INSTALADOR_4"];
	$LIDER= $row["LIDER"];
	$PUESTOS = $row["PUESTOS"];
	$PROCESO = $row["PROCESO"];
	$EJECUTOR = $row["EJECUTOR"];
	$SERVICIO = $row['TIPO_SERVICIO'];
    $DOCUMENTO = $row['DOCUMENTO_SERVICIO_TECNICO'];
    $TECNICO1= $row['TECNICO_1'];
    $TECNICO2 =$row['TECNICO_2'];
	$TRANSPORTE =$row['TRANSPORTE'];
    $RECLAMOS  = $row["RECLAMOS"];
	$OC  = $row["OC"];
  }
  mysql_free_result($result);

?>


<script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/x.x.x/jquery.min.js"></script>
  <script src="jquery.bpopup-x.x.x.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>


<h1 style="  font: normal .90em 'Arial Black', Gadget, sans-serif;
  color: #1D1D1D; font-size:20px; "><center>Modificar Actividad</center></h1>
<form  id = 'formulario11' method="GET" action="scriptActualizarServicio.php"/>
<div onMouseMove="fecha();fechass();">
  
<table border="" >
<tr>
<td width="130" style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; margin:20px;">Nombre</td>
<td width="" ><input style=" width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text" name = "txt_nombre_servicio" value="<?php echo $NOMBRE_SERVICIO1 ?>"> <input style="display:none;" type="text" name = "txt_codigo" value="<?php echo $CODIGO_SERVICIO1 ?>"> <input style="display:none;" type="text" name = "txt_codigo_proyecto" value="<?php echo $CODIGO_PROYECTO ?>"> <input style="display:none;" type="text" name = "editarp" value="<?php echo ($editarp) ?>"><br></td>
</tr>
<tr>
<td width="">Predecesor:</td>
<td width="" ><input style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text" id = 'txt_predecesor' name = "txt_predecesor"  value="<?php echo ($PREDECESOR1); ?>"> <br></td>
</tr>
<tr>
<td width="">Descripción:</td>
<td width="" ><textarea style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" rows="5" cols="17" name="txt_descripcion"><?php echo ($DESCRIPCION1); ?></textarea> <br></td>
</tr>
<tr>
<?php if($editarp == 'editarp') {?>
<td width="">Fecha inicio:</td>
<td width="" ><input  style="  width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text" id = 'txt_fechai' onchange=" diasaass();" name = "txt_fechai"  value="<?php echo ($FECHA_I1); ?>" /></td>
</tr>
<tr>
<td width="">Fecha entrega</td>
<td width="" ><input  style="  width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text" id = 'txt_fechae'  onchange="diasaass();" name = "txt_fechae"  value="<?php echo ($FECHA_E1); ?>"></td>
  <?php } else { ?>
  <td width="">Fecha inicio:</td>
<td width="" ><input  style="  width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text" id = 'txt_fechai' onchange="dias1();" name = "txt_fechai"  value="<?php echo ($FECHA_I1); ?>" /></td>
</tr>
<tr>
<td width="">Fecha entrega</td>
<td width="" ><input  style="  width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text" id = 'txt_fechae'  onchange="dias1();" name = "txt_fechae"  value="<?php echo ($FECHA_E1); ?>"></td>
  <?php } ?>
</tr>
<tr>
<td width="">Dias</td> 
<td width="" ><input   onchange="dias1();" style=" width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text" id = 'txt_dias'  name = "txt_dias"  value="<?php echo ($DIAS1); ?>"></td>
</tr>
<tr>
<td width="">Realizador:</td>
<td width="" ><input style="   width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;"  type="text" name = "txt_realizador" value="<?php  echo $REALIZADOR1; ?>"> <br></td>
</tr>
<tr>
<td width="">Supervisor:</td>
<td width="" ><input style=" width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;"  type="text" name = "txt_supervisor" value="<?php  echo $SUPERVISOR1; ?>"> <br></td>
</tr>
<tr>
<td width="">Estado:</td>
<td width="" ><select style=" width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;"  style="width:153px;" id = "txt_estado" name = "txt_estado">
<option> <?php echo $ESTADO1; ?> </option>
<option> EN PROCESO </option>
<option> OK </option>
<option> NULO </option>
</select><br></td>
</tr>
<tr>
<td width="">Observacion:</td>
<td width="" ><textarea style=" width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" rows="5" cols="17" name="txt_observacion"><?php echo ($OBSERVACION1); ?></textarea> <br></td>
</tr>
<tr>
<td width="">Reclamos:</td>
<td width="" ><input style=" width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;"  type="text"  id= "txt_reclamos" name = "txt_reclamos" value="<?php echo $RECLAMOS; ?>" /> <br></td>
</tr>
<tr>
<?php if($NOMBRE_SERVICIO1 == "Despacho" || $NOMBRE_SERVICIO1 == "Instalacion") { ?>
<td width="">Direccion:</td>
<td width="" ><input style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;"  type="text" id = 'txt_direccion' name = "txt_direccion"  value="<?php echo ($DIRECCION); ?>"><br></td>
</tr>
<tr>
<td width="">TP/TM/FI:</td>
<td width="" ><input style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;"  type="text" id = 'txt_tptmfi' name = "txt_tptmfi"  value="<?php echo ($TPTMFI); ?>"><br></td>
</tr>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Despacho") { ?>
<tr>
<td width="">Guia Despacho:</td>
<td width="" ><input style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;"  type="text" id = 'txt_guia' name = "txt_guia"  value="<?php echo ($GUIA); ?>"><br></td>
</tr>
<td width="">Transporte:</td>
<td><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;"  id = "txt_transporte" name="txt_transporte">
<option><?php echo ($TRANSPORTE); ?></option>
<option>CBWT-96 (Camion 1)</option>
<option>CRBC-30 (Camion 2)</option>
<option>FXVD-65 (Camion 3)</option>
<option>CFDL-32 (Furgon 1)</option>
<option>FYYC-66 (Furgon 2)</option>
<option>DDVG-61 (Camioneta)</option>
<option>Externo</option>
</select> </td>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Instalacion") { ?>
<tr>
<tr>
<td width="">lider:</td>
<td ><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id = "lider" name = "lider">
<option><?php echo $LIDER ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
 <option></option>
</select></td>
</tr>
<tr>
<td width="">Puestos:</td>
<td ><input  style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text"  id= "puestos" name = "puestos" value="<?php echo ($PUESTOS); ?>" /> </td>
</tr>
<tr>
<td width="">Instalador 1:</td>
<td ><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id = "ins1" name = "ins1">
<option><?php echo ($INS1); ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
<option></option>
</select> </td>
</tr>
<tr>
<td width="">Instalador 2:</td>
<td ><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id = "ins2" name = "ins2">
<option><?php echo ($INS2); ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
 <option></option>
</select> </td>
</tr>
<tr>
<td width="">Instalador 3:</td>
<td ><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id = "ins3" name = "ins3">
<option><?php echo ($INS3); ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
 <option></option>
</select></td>
</tr>
<tr>
<td width="">Instalador 4:</td>
<td ><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id = "ins4" name = "ins4">
<option><?php echo ($INS4); ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
 <option></option>
</select></td>
</tr>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Produccion") { ?>
<tr>																																						
<td width="">Proceso:</td>
<td ><select style="width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" onchange="seleccion();" id = "txt_proceso" name="txt_proceso">
<option><?php echo ($PROCESO); ?></option>
<option>Corte</option>
<option>Ruteado</option>
<option>Enchape Recto</option>
<option>Enchape Curvo</option>
<option>Laminado</option>
<option>Perforado</option>
<option>Barniz</option>
<option>Armado</option>
<option>Limpieza</option>
</select></td>
</tr>
<tr>
<td width="">Ejecutor:</td>
<td ><input style="  width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text"  id= "txt_ejecutor" name = "txt_ejecutor" value="<?php echo ($EJECUTOR); ?>" /> </td>
</tr>
<tr>
<td width="">OC:</td>
<td ><input style=" width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text"  id= "txt_prooc" name = "txt_prooc" value="<?php echo ($OC); ?>" /> </td>
</tr>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Sillas") { ?>
<tr>
<td width="">Proceso:</td>
<td ><select style=" width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" id = "txt_procesos" name="txt_procesos">
<option><?php echo ($PROCESO); ?></option>
<option>Tapizado</option>
<option>Retapizado</option>
<option>Armado</option>
<option>Limpieza</option>
</select></td>
</tr>
<tr>
<td width="">Ejecutor:</td>
<td ><input style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text"  id= "txt_ejecutors" name = "txt_ejecutors" value="<?php echo ($EJECUTOR); ?>" /> </td>
</tr>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Servicio Tecnico") { ?>
<tr>
<td width="">Tipo Servicio:</td>
<td ><select style=" width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px;" onchange="seleccion();" id = "txt_servicio" name="txt_servicio">
<option><?php echo ($SERVICIO); ?></option>
<option>Servicio Tecnico </option>
<option>Garantia</option></select></td>
</tr>
<tr>
<td width="">N° Documento:</td>
<td ><input style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text"  id= "txt_documento" name = "txt_documento" value="<?php echo ($DOCUMENTO); ?>" /> </td>
</tr>
<tr>
<td width="">Tecnico 1:</td>
<td ><input style="  width:142px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text"  id= "tec1" name = "tec1" value="<?php echo ($TECNICO1); ?>" /> </td>
</tr>
<tr>
<td width="">Tecnico 2:</td>
<td ><input style=" width:142px;  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" type="text"  id= "tec2" name = "tec2" value="<?php echo ($TECNICO2); ?>" /> </td>
</tr>
<?php } ?>
<tr>

<td width="" colspan="2"><input style=" width:100%; margin-bottom:20px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; cursor:pointer; color:#000;background-color: #CFCFCF; height:25px;border-radius: 10px; border:#fff 1px solid;"  type="button" id = 'modificar' name = 'modificar' onClick = "enviar()"  value="Modificar"/ <br></td>
</tr>
</table>
<?php


if (isset($_GET["ruta"])) 
{  
$ruta = $_GET["ruta"];   
$CODIGO_RUTA = $_GET["CODIGO_RUTA"]; 
?>
<input style="display:none;" name='rutaa' id='rutaa' value='<?php echo $ruta; ?>' type ='text'>
<input style="display:none;" name='CODIGO_RUTA' id='CODIGO_RUTA' value='<?php echo $CODIGO_RUTA; ?>' type ='text'>
<?php }?>
</div>
</form>