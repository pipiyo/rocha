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

$EDITAR = "";

if(isset($_GET['editar']))
{
$EDITAR  = $_GET['editar'];
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
  $PROGRESO= $row["PROGRESO"];
	$ESTADO1 = $row["ESTADO"];
	$PREDECESOR1 = $row["PREDECESOR"];
	$DIAS1 = $row["DIAS"];
	$DIRECCION= $row["DIRECCION"];
  $M3= $row["M3"];
	$TPTMFI= $row["TPTMFI"];
  $GUIA= $row["GUIA_DESPACHO"];
	$INS1= $row["INSTALADOR_1"];
  $COMUNA= $row["CODIGO_COMUNA"];
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
	$RECLAMOS  = $row["RECLAMOS"];
	$VEHICULO = $row["TRANSPORTE"];
	$OC = $row["OC"];
  $FI = $row["FI"];
	$FECHA_PE1 = $row["FECHA_PRIMERA_ENTREGA"];
	$CATEGORIA = $row["CATEGORIA"];
	$CANTIDAD = $row["CANTIDAD"];
	$BODEGA = $row["BODEGA"];
  $VALE = $row["VALE"];

  $FACTURA = $row["FACTURA"];
  $MONTO_FACTURA = $row["MONTO_FACTURA"];

  $RECEPCION= $row["RECEPCION"];
  $ARCHIVO = $row["ARCHIVO"];

  }
  mysql_free_result($result);
$NCOMUNA = "";
$query_registro = "SELECT * FROM comunas WHERE CODIGO_COMUNA ='".$COMUNA."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
    $NCOMUNA= $row["NOMBRE_COMUNA"];
  }
 mysql_free_result($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Modificar Servicio V1.4.1</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <link rel="stylesheet" href="style/estilopopup.css" />

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script type="text/javascript" src="js/tinybox.js"></script>
  <script type="text/javascript" src="js/descripcion-servicio.js"></script>  
  <script type="text/javascript" src="js/ingreso-servicio.js"></script>  
  <script src='js/breadcrumbs.php'></script>
</head>

<body id='body_descripcionServicio' onload="guia();">
<div id='bread'><div id="menu1"></div></div>
<div id='container_descripcionServicio'>
<center>
<div id = 'header_descripcionServicio'>

<h1 id='title_descripcionServicio'>Modificar Actividad</h1>

</div>
</center>
<?php if($FECHA_PE1 == "" || $FECHA_PE1 == "0000-00-00 00:00:00")
{ ?>
<div id = 'contenido_descripcionServicio' onmousemove="calend();">
<?php } else { ?>
<div id = 'contenido_descripcionServicio'>
<?php } ?>

<form  id = 'formulario11' method="GET" action="scriptActualizarServicio2.php"/>
<center>
<table id ='formulario_descripcionServicio'>
<tr>
<td width="100">Nombre</td>
<td width="300" align="center"><input class="textbox"  type="text" name = "txt_nombre_servicio" value="<?php echo $NOMBRE_SERVICIO1 ?>"> <input type="hidden" id="txt_codigo" name = "txt_codigo" value="<?php echo $CODIGO_SERVICIO1 ?>"> <input  class= 'grupo_invisi' type="text" name = "txt_codigo_proyecto" value="<?php echo $CODIGO_PROYECTO ?>"><br></td>
</tr>
<?php if($NOMBRE_SERVICIO1 != "Factura" && $NOMBRE_SERVICIO1 != "Nota de Credito") { ?>
<tr>
<td >Predecesor:</td>
<td align="center"><input class="textbox" type="text" id = 'txt_predecesor' name = "txt_predecesor"  value="<?php echo ($PREDECESOR1); ?>"> <br></td>
</tr>
<tr>
<td >Descripción:</td>
<td align="center"><textarea rows="5" cols="17" class="textbox" name="txt_descripcion"><?php echo ($DESCRIPCION1); ?></textarea> <br></td>
</tr>
<?php } ?>
<tr>
<?php if($NOMBRE_SERVICIO1 != "Factura" && $NOMBRE_SERVICIO1 != "Nota de Credito") { $fe = "Fecha inicio"; } else { $fe = "Fecha de emisión"; } ?> 
<td ><?php echo $fe; ?></td>
<td align="center"><input onchange="diasx();" class="textbox" type="text" id = 'txt_fechai' name = "txt_fechai"  value="<?php echo ($FECHA_I1); ?>"> <br></td>
</tr>
<tr>
<?php if($NOMBRE_SERVICIO1 != "Factura" && $NOMBRE_SERVICIO1 != "Nota de Credito") { $fp = "Fecha entrega"; } else { $fp = "Fecha de pago"; } ?> 
<td><?php echo $fp; ?></td>
<td  align="center">
<?php if($FECHA_PE1 == "" || $FECHA_PE1 == "0000-00-00 00:00:00")
{ ?>
<input  onchange="diasx();" class="textbox" type="text" id = 'txt_fechape' name = "txt_fechape"  value="<?php echo ($FECHA_PE1); ?>">
<?php } else { ?>
<input  onchange="diasx();" readonly="readonly" class="textbox" type="text" id = 'txt_fechape' name = "txt_fechape"  value="<?php echo ($FECHA_PE1); ?>">
<?php } ?>
</td>
</tr>
<?php if($NOMBRE_SERVICIO1 != "Factura" && $NOMBRE_SERVICIO1 != "Nota de Credito") { ?>
<tr>
<td>Fecha Confirmacion</td>
<td  align="center"><?php echo 
"<input onclick = TINY.box.show({url:'generarActualizarServicio.php?codigoProyecto=" .urlencode($CODIGO_PROYECTO). "&CodigoServicio=".$CODIGO_SERVICIO."&link=proyecto&editar=".$EDITAR."'}) class='textbox' type='text' id = 'txt_fechae' name = 'txt_fechae'  value='".$FECHA_E1."'> " ?>
</td>

<tr>
<td>Hora Confirmacion</td>
<td align="center"><input onchange="diasx();" class="textbox" type="text" id = 'txt_hora' name = "txt_hora"  value="<?php echo substr($FECHA_E1,11,8); ?>"></td>
</tr>

</tr>
<tr>
<td>Dias</td>
<td align="center"><input onchange="diasx();" class="textbox" type="text" id = 'txt_dias' name = "txt_dias"  value="<?php echo ($DIAS1); ?>"></td>
</tr>
<?php } ?>
<tr>
<td>Realizador:</td>
<td align="center"><input class="textbox"  type="text" name = "txt_realizador" value="<?php  echo $REALIZADOR1; ?>"> <br></td>
</tr>
<?php if($NOMBRE_SERVICIO1 != "Factura" && $NOMBRE_SERVICIO1 != "Nota de Credito") { ?>
<tr>
<td >Supervisor:</td>
<td align="center"><input class="textbox"  type="text" name = "txt_supervisor" value="<?php  echo $SUPERVISOR1; ?>"> <br></td>
</tr>

<tr>
<td >Categoria:</td>
<td align="center"><select  class="textbox" onchange="valiasa()" id = "txt_categoria" name = "txt_categoria" >
<option> <?php echo $CATEGORIA; ?> </option>
<option>Proceso</option>
<option>Proyecto</option>
<option>Solicitud</option>
</select><br></td>
</tr>
<?php }?>

<?php if($NOMBRE_SERVICIO1 == "Despacho") { ?>
<tr>
<td>Estado:</td>
<td align="center"><select  class="textbox" id = "txt_estado" name = "txt_estado">
<option> <?php echo $ESTADO1; ?> </option>
<option> EN PROCESO </option>
<option> EN RUTA </option>
<option> OK </option>
<option> NULO </option>
</select><br></td>
</tr>

<?php } else { ?>
<tr>
<td>Estado:</td>
<td align="center"><select  class="textbox" id = "txt_estado" name = "txt_estado">
<option> <?php echo $ESTADO1; ?> </option>
<option> EN PROCESO </option>
<option> OK </option>
<option> NULO </option>
</select><br></td>
</tr>

<?php } ?>


<tr>
  <?php if($NOMBRE_SERVICIO1 != "Factura" && $NOMBRE_SERVICIO1 != "Nota de Credito") { $ob = "Observacion:"; } else { $ob = "Porcentaje:"; } ?> 
<td ><?php echo $ob; ?></td>
<td  align="center"><textarea class="textbox" rows="5" cols="17" name="txt_observacion"><?php echo ($OBSERVACION1); ?></textarea> <br></td>
</tr>
<?php if($NOMBRE_SERVICIO1 != "Factura" && $NOMBRE_SERVICIO1 != "Nota de Credito") { ?>
<tr>
<td >Reclamos:</td>
<td align="center"><input class="textbox"  type="text"  id= "txt_reclamos" name = "txt_reclamos" value="<?php echo $RECLAMOS; ?>" />  <br></td>
</tr>
<tr>
<td >Fi:</td>
<td align="center"><input class="textbox" onKeyPress="return justNumbers(event);" type="text"  id= "txt_fi" name = "txt_fi" value="<?php echo $FI; ?>" />  <br></td>
</tr>

<?php } ?>
<tr>
<?php if($NOMBRE_SERVICIO1 == "Despacho" || $NOMBRE_SERVICIO1 == "Instalacion") { ?>
<td >Direccion:</td>
<td align="center"><input class="textbox" type="text" id = 'txt_direccion' name = "txt_direccion"  value="<?php echo ($DIRECCION); ?>"><br></td>
</tr>
<tr>
<td >TP/TM/OS:</td>
<td align="center"><input class="textbox" type="text" id = 'txt_tptmfi' name = "txt_tptmfi"  value="<?php echo ($TPTMFI); ?>"><br></td>
</tr>
<tr>
<td >Comuna</td>
<td align="center"><input class="textbox" type="text" id ='txt_comuna' name ="txt_comuna"  value="<?php echo $NCOMUNA;?>"><br></td>
</tr>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Despacho") { ?>
<tr>
<?php
$chek = "checked";
if($GUIA == "")
{
$chek= "";
  if(substr($CODIGO_PROYECTO,0,1) == 'M')
  {
    $GUIA = 0;
    $sql1 = "SELECT * FROM guia_despacho_md ORDER BY CODIGO_GUIA DESC LIMIT 1";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $GUIA = $row["CODIGO_GUIA"];
    }
    $GUIA = $GUIA + 1;
    mysql_free_result($result2);
  }
  else if(substr($CODIGO_PROYECTO,0,1) == 'S')
  {
    $GUIA = 0;
    $sql1 = "SELECT * FROM guia_despacho_si ORDER BY CODIGO_GUIA DESC LIMIT 1";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $GUIA = $row["CODIGO_GUIA"];
    }
    $GUIA = $GUIA + 1;
    mysql_free_result($result2);
  }
  else 
  {
    $GUIA = 0;
    $sql1 = "SELECT * FROM guia_despacho_mu ORDER BY CODIGO_GUIA DESC LIMIT 1";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $GUIA = $row["CODIGO_GUIA"];
    }
    $GUIA = $GUIA + 1;
    mysql_free_result($result2);
  }
}

?>

<td>Guia Despacho:</td>
<td  align="center"><input class="textbox"  type="text" id = 'txt_guia' name = "txt_guia"  value="<?php echo $GUIA; ?>"><br><input onclick="guia();" type="checkbox" id="valguia" name="valguia" value="si" <?php echo $chek ?>></td>
</tr>
<tr>
<td> Vehiculo: </td>
<td  align="center"><select class="textbox" id = "txt_transporte" name="txt_transporte">
<option><?php echo $VEHICULO ?></option>
<option>CBWT-96 (Camion 1)</option>
<option>CRBC-30 (Camion 2)</option>
<option>FXVD-65 (Camion 3)</option>
<option>CFDL-32 (Furgon 1)</option>
<option>FYYC-66 (Furgon 2)</option>
<option>GPBX-40 (Camioneta 2)</option>
<option>Externo</option>
<option></option>
</select> </td>
</tr>
<tr>
  <td>M3</td>
  <td align="center"><input class="textbox" step="any" type="number" value="<?php echo $M3; ?>" id="m3" name="m3"> <p class="mensaje-m3"></p> </td>
</tr> 
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Instalacion") { ?>
<tr>
<td>lider:</td>
<td align="center"><select class="textbox" id = "lider" name = "lider">
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
<td >Puestos:</td>
<td align="center"><input class="textbox"  type="text"  id= "puestos" name = "puestos" value="<?php echo ($PUESTOS); ?>" /> </td>
</tr>
<tr>
<td >Instalador 1:</td>
<td align="center"><select class="textbox" id = "ins1" name = "ins1">
<option><?php echo ($INS1); ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS' order by empleado.nombres";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
  <option>Externo</option>
  <option></option>
</select></td>
</tr>
<tr>
<td >Instalador 2:</td>
<td align="center"><select class="textbox" id = "ins2" name = "ins2">
<option><?php echo ($INS2); ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS' order by empleado.nombres";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
  <option>Externo</option>
  <option></option>
</select></td>
</tr>
<tr>
<td >Instalador 3:</td>
<td align="center"><select class="textbox" id = "ins3" name = "ins3">
<option><?php echo ($INS3); ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS' order by empleado.nombres";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
  <option>Externo</option>
  <option></option>
</select></td>
</tr>
<tr>
<td >Instalador 4:</td>
<td align="center"><select class="textbox" id = "ins4" name = "ins4">
<option><?php echo ($INS4); ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'INS' order by empleado.nombres";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
  <option>Externo</option>
  <option></option>
</select></td>
</tr>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Produccion") { ?>
<tr>
<td >Proceso:</td>
<?php if($CATEGORIA == "Proceso") { ?>
<td align="center"><select class="textbox" onchange="seleccion();" id = "txt_proceso" name="txt_proceso">
<option><?php echo ($PROCESO); ?></option>
<option>Armado</option>
<option>Barniz</option>
<option>Centro De Mecanizado</option>
<option>Corte</option>
<option>Enchape Curvo</option>
<option>Enchape Recto</option>
<option>Laminado</option>
<option>Limpieza</option>
<option>Mueble Especiales</option>
<option>Perforador Multiple</option>
<option>Ruteado</option>
<option></option>
</select></td>
<?php } else { ?>
<td align="center"><select class="textbox" onchange="seleccion();" id = "txt_proceso" name="txt_proceso" disabled="disabled">
<option><?php echo ($PROCESO); ?></option>
<option>Armado</option>
<option>Barniz</option>
<option>Centro De Mecanizado</option>
<option>Corte</option>
<option>Enchape Curvo</option>
<option>Enchape Recto</option>
<option>Laminado</option>
<option>Limpieza</option>
<option>Mueble Especiales</option>
<option>Perforador Multiple</option>
<option>Ruteado</option>
<option></option>
</select></td>
<?php }  ?>
</tr>
<tr>
<td >Ejecutor:</td>
<td align="center"><input class="textbox" type="text"  id= "txt_ejecutor" name = "txt_ejecutor" value="<?php echo ($EJECUTOR); ?>" /> </td>
</tr>
<tr>
<td >Vale:</td>
<td align="center"><input readonly class="textbox" type="text" name= "txt_vale"  id= "txt_vale" value="<?php echo ($VALE); ?>" /> </td>
</tr>
<?php }  ?>
<?php if($NOMBRE_SERVICIO1 == "Sillas" || $NOMBRE_SERVICIO1 == "Produccion") { ?>
<tr>

<td>OC:</td>
<td align="center"><input class="textbox" type="text"  id= "txt_prooc" name = "txt_prooc" value="<?php echo ($OC); ?>" /> </td>
</tr>
<tr>
<td>Cantidad:</td>
<td align="center"><input class="textbox" type="text"  id= "txt_cant" name = "txt_cant" value="<?php echo ($CANTIDAD); ?>" /> </td>
</tr>
<td>Progreso:</td>
<td align="center"><input id="slider1"  type="range" min="1" max="100" step="1" value="<?php echo $PROGRESO; ?>" onchange="printValue('slider1','rangeValue1')" /><input name="rangeValue1"  onchange="printValue1('slider1','rangeValue1')" class="textboxpequeno" value="<?php echo $PROGRESO; ?>" id="rangeValue1" type="number" min="0" max="100"/> </td>
</tr>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Instalacion") { ?>
<tr>
<td >Proceso:</td>
<td align="center"><select class="textbox txti" id = "txt_procesos" name="txt_procesoi">
<option><?php echo ($PROCESO); ?></option>
<option>Revisión de proyecto</option>
<option>Rectificacón de medidas</option>
<option>Recepción de mercaderia</option>
<option>Instalación</option>
<option>Refaccion</option>
<option>Acta de Recepción</option>
<option>Servicio Técnico</option>
</select></td>
</tr>
<?php } ?>
<?php if($NOMBRE_SERVICIO1 == "Sillas") { ?>
<tr>
<td >Proceso:</td>
<td align="center"><select class="textbox"  id = "txt_procesos" name="txt_procesos">
<option><?php echo ($PROCESO); ?></option>
<option>ARMADO SILLA</option>
<option>TAPIZADO</option>
<option>RETAPIZADO</option>
<option>TAPIZADO BALDOSA</option>
<option>TAPIZADO PANTALLA</option>
<option>LIMPIEZA SILLAS</option>
</select></td>
</tr>
<tr>
<td >Ejecutor:</td>
<td align="center"><input class="textbox" type="text"  id= "txt_ejecutors" name = "txt_ejecutors" value="<?php echo ($EJECUTOR); ?>" /> </td>
</tr>
<?php } ?>


<?php if($NOMBRE_SERVICIO1 == "Factura" || $NOMBRE_SERVICIO1 == "Nota de Credito") { ?>
<tr>
  <?php if($NOMBRE_SERVICIO1 == "Factura") { $fn = "Factura:"; } else { $fn = "Nota Credito:"; } ?>   
<td ><?php echo $fn ?></td>
<td align="center"><input type="number" value="<?php echo ($FACTURA); ?>" name="factura" id="factura" class="textbox"><p class="mensaje-factura"></p></td>
</tr>
<tr>
<td >Monto</td>
<td align="center"><input  class="textbox" type="text"  id= "monto_factura" name = "monto_factura" value="<?php echo number_format($MONTO_FACTURA,0,",","."); ?>" /> </td>
</tr>
<tr>
<td >Recepción:</td>
<?php

if($RECEPCION == 0)
{
  $chek= "";
}
else
{
  $chek= "checked";
}
?>
<td align="center"><input <?php echo $chek?> type="checkbox"  id= "txt_re" name = "txt_re" value="1" /></td>
</tr>
<?php

if($ARCHIVO == 0)
{
  $chek= "";
}
else
{
  $chek= "checked";
}
?>
<tr>
<td >Archivo:</td>
<td align="center"><input <?php echo $chek?> type="checkbox"  id= "txt_ar" name = "txt_ar" value="1" /></td>
</tr>

<?php } ?>

<?php if($NOMBRE_SERVICIO1 == "Servicio Tecnico") { ?>
<tr>
<td >Tipo Servicio:</td>
<td align="center"><select class="textbox" onchange="seleccion();" id = "txt_servicio" name="txt_servicio">
<option><?php echo ($SERVICIO); ?></option>
<option>Servicio Tecnico </option>
<option>Garantia</option></select></td>
</tr>
<tr>
<td >N° Documento:</td>
<td align="center"><input  class="textbox" type="text"  id= "txt_documento" name = "txt_documento" value="<?php echo ($DOCUMENTO); ?>" /> </td>
</tr>
<tr>
<td >Tecnico 1:</td>
<td align="center"><select class="textbox" id = "tec1" name = "tec1">
<option><?php echo ($TECNICO1); ?> </option>
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
 </select>
</td>
</tr>
<tr>
<td >Tecnico 2:</td>
<td align="center"><select class="textbox" id = "tec2" name = "tec2">
<option><?php echo ($TECNICO2); ?> </option>
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
<?php if($NOMBRE_SERVICIO1 == "Bodega") { ?>
<tr>
<td >Bodega:</td>

<td align="center"><select class="textbox" id = "txt_bodega" name="txt_bodega">
<option><?php echo ($BODEGA); ?></option>
<option>Insumo</option>
<option>Sillas</option>
<option>Despacho</option>
</select> </td></tr>
<?php } ?>
<tr>
<td>&nbsp;</td>
<td align="center"><input class= 'input_buttobdescripcionServicio'  type="submit" id='ingreso-servicio' name = 'modificar'   value="Modificar"/> <br></td>
</tr>
</table>
</center>
</div>
<br />


<?php

$contador = 1;
$sql111 = "SELECT *  from servicio_vale where CODIGO_SERVICIO = '".$CODIGO_SERVICIO."' ";
$result111 = mysql_query($sql111, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result111))
  {
  $ID = $row["ID"];
  $CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
  $CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
  $CANTIDAD = $row["CANTIDAD"];
  $DESCRIPCION = $row["DESCRIPCION"];
  $CANTIDAD_ENTREGADA= $row["CANTIDAD_ENTREGADA"];

$sqlA = "SELECT * FROM producto_vale_emision WHERE CODIGO_PRODUCTO = '". $CODIGO_PRODUCTO ."' and CODIGO_VALE = '".$VALE."'";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resultA))
  {
  $CANTIDAD_E = $row["CANTIDAD_SOLICITADA"];
  $CANTIDAD_U = $row["CANTIDAD_UTILIZADA"];
  }
mysql_free_result($resultA);

 echo '<div id="con'.$contador.'" >

  <table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
  <tr>
  <td width="140" class="color_ti">Producto</td>
  <td width="340"><input style="display:none" type="text" name="id_pv'.$contador.'" value ="'.$ID.'"> <input readonly class="formulario_ingreso_servicio" type="text"   id= "txt_producto'.$contador.'" name = "txt_producto'.$contador.'" onclick="completar1(this.id);total();negativo();" onblur="total();negativo()" value="'.$DESCRIPCION.'" /> </td>
  <td rowspan="2" width="140" class="color_ti">Cantidad<br>Entregado<br>Solitado</td>
  <td rowspan="2" width="340"><input  class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_producto'.$contador.'" name = "txt_cantid_producto'.$contador.'" onblur="total();negativo();" value="'. $CANTIDAD_ENTREGADA.'" /> 
  <input readonly  class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_productoe'.$contador.'" value="'.$CANTIDAD_U.'" />
  <input readonly class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_productos'.$contador.'" value="'.$CANTIDAD_E.'" /></td>
  </tr>
  <tr>
  <td width="140" class="color_ti">Codigo</td>
  <td width="340"><input readonly class="formulario_ingreso_servicio" type="text"  id= "txt_codigo'.$contador.'" name = "txt_codigo'.$contador.'" onclick="completar(this.id);total();negativo()" onblur="total();negativo()"  value="'.$CODIGO_PRODUCTO.'" /> </td>
  </tr>
  </table>
  </div>';
 $contador++;
  }
   mysql_free_result($result111);
   while($contador < 50)
{
  echo '<div id="con'.$contador.'" style="display:none;">

  <table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
  <tr>
  <td width="140" class="color_ti">Producto</td>
  <td width="340"><input style="display:none" type="text" name="id_pv'.$contador.'" value =""><input class="formulario_ingreso_servicio" type="text"   id= "txt_producto'.$contador.'" name = "txt_producto'.$contador.'" onclick="completar1(this.id);total();negativo();" onblur="total();negativo()" value="" /> </td>
  <td rowspan="2" width="140" class="color_ti">Cantidad<br>Entregado<br>Solitado</td>
  <td rowspan="2" width="340"><input  class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_producto'.$contador.'" name = "txt_cantid_producto'.$contador.'" onblur="total();negativo();" value="0" /> 
  <input readonly  class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_productoe'.$contador.'" value="0" />
   <input readonly class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_productos'.$contador.'" value="0" /></td>
  </tr>
  <tr>
    <td width="140" class="color_ti">Codigo</td>
  <td width="340"><input class="formulario_ingreso_servicio" type="text"  id= "txt_codigo'.$contador.'" name = "txt_codigo'.$contador.'" onclick="completar(this.id);total();negativo()" onblur="total();negativo()"  value="" /> </td>
  </tr>
  </table>
  </div>';
    $contador++;
}

?>
 <input id='mas' type="button" onclick="myFunction()" value="+">
</br >

<div id = 'footer_descripcionServicio'> 
<center>
<table rules="all" id="tabla_registroactividades_descripcionServicio">
<tr>
<th>Fecha</th>
<th>Campo</th>
<th>User</th>
<th>Antiguo</th>
<th>Nuevo</th>
</tr>

<?php
$sql111 = "SELECT actualizaciones.NOMBRE_USUARIO,actualizaciones.CAMPO, actualizaciones.FECHA,actualizaciones.USUARIO, actualizaciones.VALOR_ANTIGUO, actualizaciones.VALOR_NUEVO FROM actualizaciones_general, 
actualizaciones,servicio where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_SERVICIO = servicio.CODIGO_SERVICIO and servicio.CODIGO_SERVICIO = '".($CODIGO_SERVICIO)."' and  UBICACION = 'SERVICIO' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
$result111 = mysql_query($sql111, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result111))
  {
	$FECHA_PRO = $row["FECHA"];
	$USUARIO_PRO = $row["USUARIO"];
	$NOMBRE_APRO = $row["NOMBRE_USUARIO"];
	$VALOR_ANTIGUO = $row["VALOR_ANTIGUO"];
	$VALOR_NUEVO = $row["VALOR_NUEVO"];
	$CAMPO = $row["CAMPO"];

	echo "<tr><td><center>".$FECHA_PRO."</center></td>";
	echo "<td><center>".$CAMPO."</center></td>";		
	echo "<td><center>".$NOMBRE_APRO."</center></td>";		
	echo "<td><center>".$VALOR_ANTIGUO."</center></td>";	
	echo "<td><center>".$VALOR_NUEVO."</center></td></tr>";	
   
  }
  
   mysql_free_result($result111);

  

?>
</table>
</center>
<?php
 $ruta="vacio";
/*Consulta para obtenero codigo servicio*/
$sql = "SELECT ruta.CODIGO_RUTA FROM servicio, ruta, servicio_ruta WHERE ruta.CODIGO_RUTA = servicio_ruta.CODIGO_RUTA AND servicio_ruta.CODIGO_SERVICIO = servicio.CODIGO_SERVICIO AND servicio.CODIGO_SERVICIO = ".$CODIGO_SERVICIO." ";
$result = mysql_query($sql, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
 {
  $ruta= $row["CODIGO_RUTA"];
 }

 mysql_free_result($result);
?>

<input  type="hidden" name = "ruta-cod" id="ruta-cod"  value="<?php  echo $ruta; ?>">
<input  type="hidden" name = "editar_rutaDescripcion" value="<?php  echo $EDITAR; ?>">

</div>


</form>
</div>

</body>
</html>
