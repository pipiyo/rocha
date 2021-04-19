<?php
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn);

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}


$CODIGO_RUTA = $_GET['CODIGO_RUTA'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];


	$query_registro = "SELECT * FROM ruta where CODIGO_RUTA = '".$CODIGO_RUTA."'";
	$result = mysql_query($query_registro, $conn) or die(mysql_error());
	$numero = 0;

 	while($row = mysql_fetch_array($result))
  	{
		$CODIGO_RUTA= $row["CODIGO_RUTA"];
		$ESTADOA = $row["ESTADO"];
		$FECHA = $row["FECHA"];
		$CONDUCTOR = $row["CONDUCTOR"];
    	$KM_INICIO = $row["KM_INICIO"];
		$KM_FIN = $row["KM_FIN"];
		$KM_RECORRIDOS = $row["KM_RECORRIDOS"];
		$FECHA_TERMINO = $row["FECHA_TERMINO"];
		$PEONETAS = $row["PEONETAS"];
		$PEONETA2 = $row["PEONETA2"];
		$PEONETA3 = $row["PEONETA3"];
		$PEONETA4 = $row["PEONETA4"];
		$MONTO = $row["MONTO"];
		$LITRO = $row["LITRO"];
		$VALOR_LITRO = $row["VALOR_LITRO"];
		$PATENTE = $row["PATENTE"];
		$COMBUSTIBLE = $row["COMBUSTIBLE"];
  	}
 	mysql_free_result($result);
  

$total_m3 = 0;
$sqla =  "SELECT distinct sum(servicio.M3) as total FROM servicio, ruta, servicio_ruta WHERE servicio.CODIGO_SERVICIO = servicio_ruta.CODIGO_SERVICIO and servicio_ruta.CODIGO_RUTA = ruta.CODIGO_RUTA   AND ruta.CODIGO_RUTA = ".$CODIGO_RUTA."";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {
  $total_m3 = $row["total"];
  }
mysql_free_result($resulta);

  /*Ruta Entrega*/
  $trd ='';
  $query_registro3 = "select * FROM servicio_ruta where CODIGO_RUTA = '".$CODIGO_RUTA."'";
  $result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result3))
   {
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"]; 
	$query_registroPRO = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.CODIGO_COMUNA, servicio.RECLAMOS,servicio.TRANSPORTE, servicio.PREDECESOR,servicio.FECHA_REALIZACION,servicio.CODIGO_SERVICIO, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO, servicio.TPTMFI,servicio.FECHA_ENTREGA, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO  FROM servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and CODIGO_SERVICIO = '".$CODIGO_SERVICIO."' ";
	$resultPRO = mysql_query($query_registroPRO, $conn) or die(mysql_error());
 	while($row = mysql_fetch_array($resultPRO))
  	{
		$GUIA = $row["GUIA_DESPACHO"];
		$TPTMFI = $row["TPTMFI"];
		$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
		$DIRECCION = $row["DIRECCION"];
		$DESCRIPCION = $row["DESCRIPCION"];
		$OBSERVACIONES = $row["OBSERVACIONES"];
		$REALIZADOR = $row["REALIZADOR"];
		$SUPERVISOR = $row["SUPERVISOR"];
		$ESTADO = $row["ESTADO"];
		$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
		$RECLAMOS = $row["RECLAMOS"];
		$FECHA_INICIO = $row["FECHA_INICIO"];
		$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
    	$COMUNA = $row["CODIGO_COMUNA"];
		$NCOMUNA = "";
 		$REGIONES="";
		$query_registro = "SELECT comunas.NOMBRE_COMUNA, regiones.REGIONES FROM regiones,comunas WHERE regiones.CODIGO_REGIONES = comunas.CODIGO_REGIONES AND comunas.CODIGO_COMUNA ='".$COMUNA."'";
		$result = mysql_query($query_registro, $conn) or die(mysql_error());
 		while($row = mysql_fetch_array($result))
  		{
    		$NCOMUNA= $row["NOMBRE_COMUNA"];
    		$REGIONES= $row["REGIONES"];
  		}
 		mysql_free_result($result);



/*PDF Ruta entrega*/

		if($NCOMUNA != "")
		{
			$NCOMUNA = $REGIONES ."-".$NCOMUNA. "-";
		}
			$trd.='
				<tr>
					<td class="encabezado">Proyecto</td>
					<td class="encabezado">Cliente</td>
					<td class="encabezado">Direccion</td>
					<td class="encabezado">Guia</td>
				</tr>
				<tr>
					<td><b>'.$CODIGO_PROYECTO.'</b></td>
					<td>'.$NOMBRE_CLIENTE.'</td>
					<td>'.$NCOMUNA." ".$DIRECCION.'</td>
					<td>'.$GUIA.'</td>
				</tr>
				<tr>
					<td class="encabezado">TP/TM/FI</td>
					<td class="encabezado">Observaciones</td>
					<td class="encabezado">Hora Inicio</td>
					<td class="encabezado">Hora Entrega</td>
				</tr>
				<tr>
					<td>'.$TPTMFI.'</td>
					<td>'.$OBSERVACIONES.'</td>
					<td>'.substr($FECHA_INICIO,11,20).'</td>
					<td>'.substr($FECHA_ENTREGA,11,20).'</td>
				</tr>
				<tr>
					<td id="trans"></td>
					<td id="trans"></td>
					<td id="trans"></td>
					<td id="trans"></td>
				</tr>
			
	

	';
  }
  mysql_free_result($resultPRO);
  }
  
  


?>
<?php
$contenido = '
<h4> Ruta Entrega '.$CODIGO_RUTA.'</h4> 
<table id="tabla1"> 
<tr>
    <td class="encabezado">Ruta</td>
    <td>'.$CODIGO_RUTA.'</td>
	<td class="encabezado">Fecha Inicio</td>
	<td>'.$FECHA.'</td>
	<td class="encabezado" >Fecha Termino</td>
	<td>'.$FECHA_TERMINO.'</td>
	<td class="encabezado">Vehiculor</td>
	<td>'.$PATENTE.'</td>
	<td class="encabezado">Conductor</td>
	<td>'.$CONDUCTOR.'</td>
</tr>
<tr>
    <td class="encabezado">Km Inicio</td>
    <td>'.$KM_INICIO.'</td>
	<td class="encabezado">Km Fin</td>
	<td>'.$KM_FIN.'</td>
	<td class="encabezado">Km Recorridos</td>
	<td>'.$KM_RECORRIDOS.'</td>
	<td class="encabezado">Combustible</td>
	<td>'.$COMBUSTIBLE.'</td>
	<td class="encabezado">Auxiliar</td>
	<td>'.$PEONETAS.'</td>
</tr>
<tr>
    <td class="encabezado">Monto Cumbustible</td>
    <td>'.$MONTO.'</td>
	<td class="encabezado">Litros</td>
	<td>'.$LITRO.'</td>
	<td class="encabezado">Valor Litro</td>
	<td>'.$VALOR_LITRO.'</td>
	<td class="encabezado">Estado</td>
	<td>'.$ESTADO.'</td>
	<td class="encabezado"> Auxiliar 2</td>
	<td>'.$PEONETA2.'</td>
</tr>
<tr>
    <td class="encabezado">auxiliar 3</td>
    <td colspan=3>'.$PEONETA3.'</td>
	<td class="encabezado">auxiliar 3</td>
	<td colspan=3 >'.$PEONETA4.'</td>
</tr>
</table>
<br />
<table id="tabla2">
'.$trd.'
</table>';

include('convertToPDF.php');

if ( isset($_POST['PDF_1']) )
    doPDF('Ruta',$contenido,true,'Style/pdf-ruta.css');
?>


<!DOCTYPE html>
<html>

<head>
	<title> Hoja de Ruta V1.0.0</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	

	<!-- style -->
	<link rel="shortcut icon" href="Imagenes/rocha.png">  

	<link rel="stylesheet" type="text/css" href="Style/ti.css" />
	<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
	<link rel="styleSheet" href="style/bread.css" type="text/css" >
	<link rel="stylesheet" href="style/font-awesome.min.css" />
  	<link rel="stylesheet" href="style/font-awesome.css" />
  	<link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />

	<!-- script -->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
	<script type="text/javascript" src="js/ruta-entrega.js"></script>
	<script src="js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
	<script src='js/breadcrumbs.php'></script> 
</head>

<body id='ruta_entrega'>
	<div id='bread'><div id="menu1"></div></div>

	<div id= 'contenedor_ruta_entrega'>
		<form action="scriptActualizarEstadoServicio.php" method="post" >

		<table id = 'encabezado'>
			<tr>
  				<td width="185" rowspan="4" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  				<td width="" height="26"  align="center"><h3><b> </b></h3></td>
  				<td width="86"  align="center"></td>
  				<td width="106"  align="center"></td>
			</tr>
			<tr>
  				<td rowspan="3" align="center"><h3><b> Ruta Entrega</b></h3></td>
  				<td height="25" align="center">Estado Ruta</td>
 				<td align="center"><select class="form-ruta" name='estado' id='estado'>
									<option><?php echo $ESTADOA ?> </option>
									<option>EN PROCESO</option>
									<option>OK </option>
									<option>NULO </option>
				</select></td>
			</tr>
			<tr>
  				<td height="29" align="center">Fecha</td>
  				<td align="center"><?php echo date("Y-m-d")?></td>
			</tr>
			<tr>
  				<td height="29" align="center">Pagina</td>
  				<td align="center">1 de 1</td>
			</tr>
		</table>


<table class="tabla-ruta-entrega">
  <tr>
    <td align="center" width="70" class='color_ti'>Ruta</td>
    <td align="center" width="92" class='color_ti'>Fecha Inicio</td>
    <td align="center" width="106" class='color_ti'>Fecha Termino</td>
    <td align="center" width="76" class='color_ti'>Vehiculo (*)</td>
    <td align="center" width="87" class='color_ti'>Conductor (*)</td>
    <td width="124">
    <select class="form-ruta" id = "conductor" name = "conductor">
      <option><?php echo $CONDUCTOR ?></option>
      <?php 
		$query_registro = 
		"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DES'";
		$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
		while($row = mysql_fetch_array($result1))
 		{
		?>
      		<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?></option>
     	<?php 
 		} mysql_free_result($result1);?>
      	<option> </option>
    </select></td>
    <td align="center" width="128" class='color_ti'>KM Inicio</td>
    <td width="128"><input onBlur="selecciona();" class="form-ruta" type="text" name='kmi' id='kmi' value="<?php echo  $KM_INICIO?>"  /></td>
    <td align="center" width="69" class='color_ti'>Km Fin (*)</td>
    <td width="106"><input onBlur="selecciona();" class="form-ruta" type="text" name='kmf' id='kmf' value="<?php echo  $KM_FIN?>" /></td>
    <td align="center" width="95" class='color_ti'>Km Recorridos</td>
    <td width="93"><input type="text" name='kmr' class="form-ruta" id='kmr' value="<?php echo  $KM_RECORRIDOS?>" /></td>
  </tr>
  <tr>
    <td rowspan="2"><input class="form-ruta"  onKeyUp="" type="text" id = "ruta" name = "ruta" value="<?php echo $CODIGO_RUTA?>"/></td>
    <td rowspan="2"><input class="form-ruta form-rutad"  readonly type="text"   id= "fecha" name = "fecha" value="<?php echo $FECHA?>"/></td>
    <td rowspan="2"><input class="form-ruta form-rutad" readonly type="text"   id= "fecha_t" name = "fecha_t" value="<?php echo $FECHA_TERMINO?>"/></td>
    <td rowspan="2"><select class="form-ruta"  onchange="selecciona();"  id = "vehiculo" name = "vehiculo">
      <option><?php echo $PATENTE ?></option>
      <?php 
		$query_registro = "select * from VEHICULO WHERE ACTIVO = 1 order by PATENTE ASC";
		$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
		 while($row = mysql_fetch_array($result1))
 		{
		?>
      <option value = "<?php echo ($row['PATENTE']) ?>" > <?php echo ($row['PATENTE']) ?></option>
      <?php 
 	} mysql_free_result($result1);
 	?>
    <option> </option>
    </select></td>
    <td align="center" class='color_ti'>Combustible</td>
    <td><select class="form-ruta" name="combustible" id="coombustible">
    <option><?php echo $COMBUSTIBLE; ?> </option>
    <option>Petroleo </option>
    <option>Bencina</option>
    </select></td>
    <td align="center" class='color_ti'>Monto combustible</td>
    <td><input class="form-ruta" onBlur="litro()"  type="text" name='mon' id='mon' value="<?php echo $MONTO?>" /></td>
    <td align="center" class='color_ti'>Litros</td>
    <td><input class="form-ruta" onBlur="litro()"  type="text" name='lit' id='lit' value="<?php echo $LITRO?>" /></td>
    <td align="center" class='color_ti'>Valor Litro</td>
    <td><input class="form-ruta" type="text" name='val' id='val'  value="<?php echo $VALOR_LITRO?>" /></td>
  </tr>
  <tr>
    <td align="center" class='color_ti'>Auxiliar (*)</td>
    <td><select class="form-ruta" id = "peo" name = "peo">
      	<option><?php echo $PEONETAS ?></option>
      	<?php 
		$query_registro = "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DES'";
		$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
		 while($row = mysql_fetch_array($result1))
 		{
		?>
      	<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?></option>
      	<?php 
 		} mysql_free_result($result1);
 		?>
      <option> </option>
    </select></td>
    <td align="center" class='color_ti'>Auxiliar2</td>
    <td><select class="form-ruta" id = "peo2" name = "peo2">
      	<option><?php echo $PEONETA2 ?></option>
      	<?php 
		$query_registro = "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DES'";
		$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
		while($row = mysql_fetch_array($result1))
 		{
		?>
      	<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?></option>
      <?php } mysql_free_result($result1);?>
      <option> </option>
    </select></td>
    <td align="center" class='color_ti'>Auxiliar3</td>
    <td><select class="form-ruta" id = "peo3" name = "peo3">
      	<option><?php echo $PEONETA3 ?></option>
      	<?php 
		$query_registro = "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DES'";
		$result1 = mysql_query($query_registro, $conn) or die(mysql_error());		
 		while($row = mysql_fetch_array($result1))
 		{
		?>
      <option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?></option>
      <?php } mysql_free_result($result1);?>
      <option> </option>
    </select></td>
    <td align="center" class='color_ti'>Auxiliar4</td>
    <td><select class="form-ruta" id = "peo4" name = "peo4">
      	<option><?php echo $PEONETA4 ?></option>
      <?php 
    $query_registro = "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DES'";
	$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 	while($row = mysql_fetch_array($result1))
 	{
	?>
    <option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?></option>
    <?php } mysql_free_result($result1);
 	?><option> </option></select></td>
  	</tr>
  	<tr>
  	<td align="center" class='color_ti'> Mensaje Vehiculo</td>
  	<td colspan='3'><p class="mensaje-m3"></p></td>
  	<td align="center" class='color_ti'> Total M3 Ruta</td>
  	<td ><p class="mensaje-m3"><?php echo $total_m3 ?></p></td>
  	</tr>
 	</table>
 	
    <a class="agregar-ruta" onClick="agregar();"> <i class="fa fa-truck"></i> Agregar Actividad  </a>


<table id="tabla" class="ruta-actividades">
<tr>
	<th width="100">Rocha</th>
	<th >Región</th>
	<th >Comuna</th>
	<th >Direccion</th>
	<th >Cliente</th>
	<th >FI</th>
	<th >Guia</th>
	<th >M3</th>
	<th >TP/TM/FI</th>
	<th >Reclamo</th>
	<th width="400">Observaciones</th>
	<th width="150">Estado</th>
	<th width="100">Eliminar</th>

</tr>

<?php
$query_registro3 = "select * FROM servicio_ruta where CODIGO_RUTA = '".$CODIGO_RUTA."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
$contador= 1;
 while($row = mysql_fetch_array($result3))
  {
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"]; 
	

$query_registroPRO = "select * FROM servicio where CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";
$resultPRO = mysql_query($query_registroPRO, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($resultPRO))
  {
	$GUIA = $row["GUIA_DESPACHO"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$RECLAMOS = $row["RECLAMOS"];
	$M3 = $row["M3"];
	$FI = $row["FI"];
	$COMUNA = $row["CODIGO_COMUNA"];
	$NCOMUNA = "";
 	$REGIONES="";
$query_registro = "SELECT comunas.NOMBRE_COMUNA, regiones.REGIONES FROM regiones,comunas WHERE regiones.CODIGO_REGIONES = comunas.CODIGO_REGIONES AND comunas.CODIGO_COMUNA ='".$COMUNA."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
    $NCOMUNA= $row["NOMBRE_COMUNA"];
    $REGIONES= $row["REGIONES"];
  }
 mysql_free_result($result);

$query_registro = "SELECT * FROM proyecto WHERE CODIGO_PROYECTO ='".$CODIGO_PROYECTO ."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result))
  {
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
  }
 mysql_free_result($result);
		
		
  }
  mysql_free_result($resultPRO);

echo "<tr><td class='desh-ruta'> <a href='editarProyecto.php?CODIGO_PROYECTO=".urldecode($CODIGO_PROYECTO)."'> <input class='form-ruta1' readonly name =cor".$contador." id =cor".$contador." type = 'text' value = '" .  $CODIGO_PROYECTO . "' /> </a> </td>";	
echo "<td class='desa-ruta' id = 'cel2'><input class='form-ruta1'  name =cod".$contador." id =cod".$contador." type = 'text' value = '".$CODIGO_SERVICIO."' /></td>";	
echo "<td class='desa-ruta' id = 'cel3'><input  class='form-ruta1'  name =des".$contador." id =des".$contador." type = 'text' value='".$DESCRIPCION ."' /></td>";
echo "<td class='desh-ruta' id='cel3'>$REGIONES</td>";
echo "<td class='desh-ruta' id='cel3'>$NCOMUNA</td>";
echo "<td class='desh-ruta' id='cel4'>$DIRECCION</td>";

echo "<td class='desh-ruta' id='cel3'>$NOMBRE_CLIENTE</td>";
echo "<td class='desh-ruta' id='cel3'>$FI</td>";

echo "<td class='desh-ruta' id='cel4'>$GUIA</td>";
echo "<td class='desh-ruta' id='cel4' align='center'>$M3</td>";
echo "<td class='desh-ruta' id='cel5'>$TPTMFI</td>";
echo "<td class='desh-ruta' id = 'cel5'>$RECLAMOS</td>";
echo "<td id='cel6'><input class='form-ruta1' onfocus='suma();' onkeydown='suma();' onchange='suma();' class='form6' id =cane".$contador." name =cane".$contador." type = 'text' value = '".($OBSERVACIONES)."' />  </td>";
echo "<td id='cel11'><select class='form-ruta1'  name =est".$contador." id =est".$contador."/> 
<option> ".$ESTADO."</option>
<option> EN PROCESO </option>
<option> EN RUTA </option>
<option> OK </option>
<option> NULO </option>
</select></td>";
echo "<td align='center' id = 'cel5'><a class='eliminar-ruta' href='scriptEliminarEstadoServicio.php?codigoServicio=".$CODIGO_SERVICIO."&CODIGO_RUTA=".$CODIGO_RUTA."'><i class='fa fa-trash-o fa-2x'></i></a></td></tr>";
 
    $contador++; 
  }
  mysql_free_result($result3);
 
?>
</table>

<div class="con-button-ruta">
<input style="display:none" type="text" value = "<?php echo $contador - 1 ?>" id="cuenta" name="cuenta"  />
<input style="display:none" type="text" value = "<?php echo $CODIGO_RUTA   ?>" id="codru" name="codru"  />
<input type="submit" id="emitir" class='ingreso-servicio1 pdf' value="Emitir Ruta" />
</div>
</form>


<div class="con-button-ruta">
<form  action="" method="POST">
<input name="PDF_1" class='ingreso-servicio1 pdf'  type="submit" value="Generar PDF" id="pdf"/>
</form>
</div>


<div class="con-button-ruta">
<a class="agregar-ruta" href="ExcelInformeRuta.php?codigo_ruta=<?php echo $CODIGO_RUTA;?>" target="_blank">
Generar Excel</a>
</div>

<div class="vehiculo-table">
<table>
<tr> 
<th>Patente</th>
<th>Km</th>
<th>M3</th>
</tr>
  <?php 
$query_registro = 
"select * from VEHICULO order by PATENTE ASC";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$cue = 1;
 while($row = mysql_fetch_array($result1))
 {
	 $PATENTEV = $row['PATENTE'];
	 $KM_INICIOV = $row['KM_INICIO'];
	 $M3TAB = $row['M3'];
	 echo"<tr>
	 	  <td align='center'><input class='form-ruta1' type='text'  id = 'pat".$cue."'  name = 'pat".$cue."' value='".$PATENTEV." '></td>";
	 echo"<td align='center'><input class='form-ruta1' type='text'  id = 'kmiii".$cue."'  name = 'kmiii".$cue."' value='".$KM_INICIOV."'></td>";
	 echo"<td align='center'><input class='form-ruta1' type='text'  id = 'm3ta".$cue."'  name = 'm3ta".$cue."' value='".$M3TAB."'></td>";
	 $cue++;
 }
 ?>
</table>
</div>



</div>

<div id ='ruta_despacho' style='display:none;'>
<table  class='des'>
<?php
	function dameFecha2($fecha,$dia)
	{   
		list($day,$mon,$year) = explode('/',$fecha);
    	return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
	}
	$fecha7 = dameFecha2(date('d/m/Y'),7);
	$query_registro = "select DISTINCT servicio.CODIGO_SERVICIO,servicio.CODIGO_COMUNA,servicio.M3, servicio.RECLAMOS,servicio.TRANSPORTE, servicio.FECHA_PRIMERA_ENTREGA,servicio.PREDECESOR,servicio.FECHA_REALIZACION,servicio.CODIGO_SERVICIO, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO, servicio.TPTMFI,servicio.FECHA_ENTREGA, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.ESTADO = 'EN PROCESO' and servicio.NOMBRE_SERVICIO = 'Despacho'  order by servicio.FECHA_ENTREGA";

	$CUENTR = 0;
	$result = mysql_query($query_registro, $conn) or die(mysql_error());
	$numero = 0;
	$numero1 = 1;
	$FECHA_VARIABLE ="";
 	while($row = mysql_fetch_array($result))
  	{  
    	$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
		$GUIA = $row["GUIA_DESPACHO"];
		$M3 = $row["M3"];
		$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
    	$FECHA_INICIO = $row["FECHA_INICIO"];
		$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
    	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
		$PREDECESOR = $row["PREDECESOR"];
		$TPTMFI = $row["TPTMFI"];
		$DIRECCION = $row["DIRECCION"];
		$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
		$FECHA_INICIO = $row["FECHA_INICIO"];
		$DESCRIPCION = $row["DESCRIPCION"];
		$OBSERVACIONES = $row["OBSERVACIONES"];
		$REALIZADOR = $row["REALIZADOR"];
		$SUPERVISOR = $row["SUPERVISOR"];
		$ESTADO = $row["ESTADO"];
		$RECLAMOS = $row["RECLAMOS"];
		$COMUNA = $row["CODIGO_COMUNA"];
		$TRANSPORTE = $row["TRANSPORTE"];
		$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
		$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
		$NCOMUNA = "";
		$query_registro = "SELECT * FROM comunas WHERE CODIGO_COMUNA ='".$COMUNA."'";
		$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
		$numero = 0;

 		while($row = mysql_fetch_array($result1))
  		{
    		$NCOMUNA= $row["NOMBRE_COMUNA"];
 	 	}
 		mysql_free_result($result1);
		

		$query_registro22 = "select count(servicio.CODIGO_SERVICIO) as a from ruta,servicio,servicio_ruta where ruta.CODIGO_RUTA = servicio_ruta.CODIGO_RUTA AND servicio_ruta.CODIGO_SERVICIO = servicio.CODIGO_SERVICIO AND servicio.CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";
		$result22 = mysql_query($query_registro22, $conn) or die(mysql_error());
		while($row = mysql_fetch_array($result22))
  		{  
			$CUENTR = $row["a"];
		}


		$FECHAAUS = substr($FECHA_ENTREGA,0,11);

		
		if($FECHA_VARIABLE == $FECHAAUS )
		{
			$numero=1;
		}
			else
		{
			$numero = 0;
		}
		if($numero == 0)
		{	
			$FECHA_VARIABLE = $FECHAAUS ;
		}
		$date = new DateTime($FECHAAUS);
	switch ($date->format('m')) {
    case "01":
        $mes = "Enero";
        break;
    case "02":
        $mes = "Febrero";
        break;
    case "03":
        $mes = "Marzo";
        break;
	case "04":
        $mes = "Abril";
        break;
    case "05":
        $mes = "Mayo";
        break;
    case "06":
        $mes = "Junio";
        break;
	case "07":
        $mes = "Julio";
        break;
    case "08":
        $mes = "Agosto";
        break;
    case "09":
        $mes = "Septiembre";
        break;
    case "10":
        $mes = "Octubre";
        break;
	case "11":
        $mes = "Noviembre";
        break;
	case "12":
        $mes = "Diciembre";
        break;
	}
	////////
	switch ($date->format('w')) {
    case "1":
        $dia = "Lunes " . $date->format('d') ." ".$mes ;
        break;
    case "2":
        $dia = "Martes " . $date->format('d')." ".$mes;
        break;
    case "3":
        $dia = "Miercoles " .$date->format('d')." ".$mes;
        break;
	case "4":
        $dia = "Jueves " . $date->format('d')." ".$mes;
        break;
    case "5":
        $dia = "Viernes " . $date->format('d')." ".$mes;
        break;
    case "6":
        $dia = "Sabado " . $date->format('d')." ".$mes;
        break;
	case "0":
        $dia = "Domingo " . $date->format('d')." ".$mes;
        break;
	}

	if($numero == 0)
	{	

	echo 
	"
	<tr><td  align='left' colspan='4'><p>".$dia."</p></td></tr>";
	echo"
	<tr><th>Rocha</th>
	<th>N°</th>
	<th><a style='color:#fff;text-decoration:none;' href='InformeProyectoDespacho.php?ESTADO=EN PROCESO&RUTA=RUTA'>Hoja ruta</a></th>
	<th>Cliente</th>     
	<th>Descripcion</th>
	<th>Comuna</th>
    <th>Direccion</th>
    <th>Guia Despacho</th>
    <th>TP/TM/FI/OS</th>
    <th>Observaciones</th>
	<th>Fecha I</th>
	<th>Fecha E</th>
	<th><a style='color:#fff;text-decoration:none;' id='fechae'> Fecha C</th>
    <th>Vehiculo</th>
	<th>Reclamos</th>
    <th>Estado</th></tr>
	";   	
	$numero = 20;	  
    }
	
	
	$CODIGO_RUTA1 ="";
	$query_registro22 = "select * from servicio_ruta where codigo_servicio = '".$CODIGO_SERVICIO."'";
	$result22 = mysql_query($query_registro22, $conn) or die(mysql_error());
	while($row = mysql_fetch_array($result22))
  	{  
   		$CODIGO_RUTA1 = $row["CODIGO_RUTA"];
  	}
   mysql_free_result($result22);
	
	if($FECHA_REALIZACION  == date("Y-m-d"))
	{
    echo"
    <tr>
    <td id='hoy'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a><input style='display:none;' onchange='enviar();' id = 'cdp".$numero1."' type='text' value='".$CODIGO_PROYECTO."'/></td>";
	echo
	"
	<td id='hoy'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a><input style='display:none;' onchange='enviar();' id = 'cds".$numero1."'  type='text' value='".$CODIGO_SERVICIO."'/></td>";
	
	if ($CUENTR != 0){
	echo "<td class='ruta' id = 'rut".$numero1."' onClick=''>Ruta-".$CODIGO_RUTA1."</td>";
	}
	else if($M3 <= 0 || $M3 == ""){
	echo "<td class='ruta-m3' id = 'rut".$numero1."' onClick=''>Falta M3</td>";	
	}
	else{
	echo  " <td id = 'rut".$numero1."'><a id='cod_ser' href='scriptHojaRutaIngresar.php?CODIGO_RUTA=".$CODIGO_RUTA."&CODIGO_SERVICIO=".$CODIGO_SERVICIO."' >Ruta</a> </td>";
	}

	echo  "<td id='hoy'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td id='hoy'>".($DESCRIPCION)."<input style='display:none;' onchange='enviar();' id = 'des".$numero1."' type='text' value='".$DESCRIPCION."'/></td>";
	echo  "<td id='hoy'>".($NCOMUNA)."</td>";
	echo  "<td id='hoy'>".($DIRECCION)."<input style='display:none;' onchange='enviar();' id = 'dir".$numero1."'  type='text' value='".$DIRECCION."'/></td>";
	echo  "<td id='hoy'>".$GUIA."<input style='display:none;' onchange='enviar();' id = 'gui".$numero1."'  type='text' value='".$GUIA."'/></td>";
	echo  "<td id='hoy'>".$TPTMFI."<input style='display:none;' onchange='enviar();' id = 'tpm".$numero1."'  type='text' value='".$TPTMFI."'/></td>";
	echo  "<td id='hoy'>".($OBSERVACIONES)."<input style='display:none;' onchange='enviar();' id = 'obs".$numero1."'  type='text' value='".$OBSERVACIONES."'/></td>";
	echo  "<td id='hoy'>".($FECHA_INICIO)."</td>";
	echo  "<td id='hoy' align='center'>".$FECHA_PRIMERA_ENTREGA."</td>";
		
	if($ESTADO == "OK")
	{
		echo  "<td id='azul'>".($FECHA_ENTREGA)."</td>";
	}
	else
	{
	if($FECHA_ENTREGA > $fecha7)
		{
			echo  "<td id='verde'>".($FECHA_ENTREGA)."</td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
			echo  "<td id='rojo'>".($FECHA_ENTREGA)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
			echo  "<td id='amarillo'>".($FECHA_ENTREGA)."</td>";		
		}
  }
	
	echo  "<td id='hoy'>".$TRANSPORTE."</td>";
	echo  "<td id='hoy'>".$RECLAMOS."</td>";
	echo  "<td id='hoy'>".$ESTADO."<input style='display:none;' onchange='enviar();' id = 'est".$numero1."' type='text' value='".$ESTADO."'/></td></tr>";
	//$numero--;
	$numero1++;
	}
	else
	{
    echo  "<tr><td> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a><input style='display:none;' onchange='enviar();' id = 'cdp".$numero1."'  type='text' value='".$CODIGO_PROYECTO."'/></td>";
	echo  "<td> <a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a><input style='display:none;' onchange='enviar();' id = 'cds".$numero1."'  type='text' value='".$CODIGO_SERVICIO."'/></td>";
	
	if ($CUENTR != 0){
	echo "<td class='ruta' id = 'rut".$numero1."' onClick=''>Ruta-".$CODIGO_RUTA1."</td>";
	}
	else if($M3 <= 0 || $M3 == ""){
	echo "<td class='ruta-m3' id = 'rut".$numero1."' onClick=''>Falta M3</td>";	
	}
	else{
	echo  " <td id = 'rut".$numero1."'><a id='cod_ser' href='scriptHojaRutaIngresar.php?CODIGO_RUTA=".$CODIGO_RUTA."&CODIGO_SERVICIO=".$CODIGO_SERVICIO."' >Ruta </a> </td>";
	}

	echo  "<td>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td>".($DESCRIPCION)."<input style='display:none;' onchange='enviar();' id = 'des".$numero1."'  type='text' value='".$DESCRIPCION."'/></td>";
	echo  "<td>".($NCOMUNA)."</td>";
	echo  "<td>".($DIRECCION)."<input style='display:none;' onchange='enviar();' id = 'dir".$numero1."' type='text' value='".$DIRECCION."'/></td>";
	echo  "<td>".$GUIA."<input style='display:none;' onchange='enviar();' id = 'gui".$numero1."'  type='text' value='".$GUIA."'/></td>";
	echo  "<td>".$TPTMFI."<input style='display:none;' onchange='enviar();' id = 'tpm".$numero1."'  type='text' value='".$TPTMFI."'/></td>";
	echo  "<td>".($OBSERVACIONES)."<input style='display:none;' onchange='enviar();' id = 'obs".$numero1."' type='text' value='".$OBSERVACIONES."'/></td>";
	echo  "<td>".($FECHA_INICIO)."</td>";
	echo  "<td>".$FECHA_PRIMERA_ENTREGA."</td>";
	
	if($ESTADO == "OK")
	{
		echo  "<td id='azul'>".($FECHA_ENTREGA)."</td>";
	}
	else
	{
	if($FECHA_ENTREGA > $fecha7)
	{
		echo  "<td id='verde'>".($FECHA_ENTREGA)."</td>";
	}
	else if($FECHA_ENTREGA < date('Y-m-d'))
	{
		echo  "<td id='rojo'>".($FECHA_ENTREGA)."</td>";
	}
	else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
	{
		echo  "<td id='amarillo'>".($FECHA_ENTREGA)."</td>";		
	}
  	}
	echo  "<td>".$TRANSPORTE."</td>";
	echo  "<td>".$RECLAMOS."</td>";
	echo  "<td>".$ESTADO."<input style='display:none;' onchange='enviar();' id = 'est".$numero1."' type='text' value='".$ESTADO."'/></td></tr>";
	//$numero--;
	$numero1++;
	}
  }
  mysql_free_result($result);

?>
</table>

</div>	
</body>
</html>