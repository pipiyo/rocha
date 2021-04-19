
<?php require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$USUARIO = $_SESSION['NOMBRE_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];

if (isset($_GET["ingresar1"])) 
{
	mysql_select_db($database_conn, $conn);
	$OBSERVACIONES = $_GET['txt_observaciones1'];
	$CODIGO1 = $_GET['txt_codigo_proyecto1'];
	$FECHA = date('Y/m/d');

	$sql = "INSERT INTO actualizaciones (OBSERVACIONES,FECHA,USUARIO,NOMBRE_USUARIO) values ('".($OBSERVACIONES)."','".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."')";
	$result = mysql_query($sql, $conn) or die(mysql_error());

	$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
	$result8 = mysql_query($sql8, $conn) or die(mysql_error());
	while($row = mysql_fetch_array($result8))
  	{
  		$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  	}
	mysql_free_result($result8);

	$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO1)."')";
	$resulta = mysql_query($sqla, $conn) or die(mysql_error());

	header("Location: DescripcionRadicado.php?txt_codigo_proyecto2=".urlencode($CODIGO1) ."");
}

	$RADICADO = $_GET["txt_codigo_proyecto2"];

	require_once('Conexion/Conexion.php');
	mysql_select_db($database_conn, $conn);

	$contador = "select * from radicado where CODIGO_RADICADO = '".$RADICADO."'";
	$result1 = mysql_query($contador,$conn) or die(mysql_error());

	$cuenta = 0;

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
	$DESCUENTO2 = $row["DESCUENTO2"];
	$MONTO2 = $row["MONTO2"];
}
mysql_free_result($result1);  
$ESTADOV = "EN PROCESO";

if(isset($_GET["ESTADO"]))
{ 
	$ESTADOV = $_GET["ESTADO"];
}

$OK='';
$PROCESO ='';
$TODOS='';

if($ESTADOV == 'EN PROCESO')
{
	$PROCESO = 'checked';
}
if($ESTADOV == 'OK')
{
	$OK = 'checked';
}
if($ESTADOV == 'TODOS')
{
	$TODOS = 'checked';
}

$t_iva= "";
$t_Iva_Retenido="";
$t_Retencio="";

if($TIPO_IVA == 'Iva')
{
	$t_iva = 'selected';
}
else if($TIPO_IVA == 'Iva Retenido')
{
	$t_Iva_Retenido = 'selected';
}
else if($TIPO_IVA == 'Retencio')
{
	$t_Retencio = 'selected';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
	<title>Editar Proyecto V1.1.0</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<link rel="shortcut icon" href="Imagenes/rocha.png">

	<link rel="stylesheet" type="text/css" href="Style/Estilo_descripcion_radicado1.css" />
	<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
	<link rel="stylesheet" href="style/estilopopup.css" />
	<link rel="styleSheet" href="style/bread.css" type="text/css" >

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
	<script src="js/jquery.ui.datepicker.js"></script>
	<script type="text/javascript" src='js/radicado.js'></script>
	<script type="text/javascript" src="js/tinybox.js"></script>
	<script src='js/breadcrumbs.php'></script>
</head>

<body>
<div id='bread'><div id="menu1"></div></div>
  
<div id="main">	
<div id="site_content">
	<form id="MODRAD" action="scriptModificarRadicado.php" method="post">
		<table id= "tabla_descripcion_radicado" width="935">
    		<tr>
      			<td width="108" rowspan="7" class="color_radicado_a" align="center"><?php echo $RADICADO ?> <input type="hidden" id = "codigo_radicado" name= "codigo_radicado" value="<?php echo $RADICADO ?>" /></td>
      			<td width="125" class="color_radicado_a">Cliente</td>
      			<td width="139" ><input id="cliente" name="cliente" type ="text" class="txt_text"  value="<?php echo ($CLIENTE) ?>"></div></td>
      			<td width="117" class="color_radicado_a">Director</td>
      			<td width="137"><select name="director" id="director" type ="text" class="txt_text" >
									<option><?php echo ($DIRECTOR) ?> </option>
									<?php 
									$query_registro = 
									"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
									grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' ORDER BY empleado.nombres ASC ";
									$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 									while($row = mysql_fetch_array($result1))
 									{
									?>
										<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 									<?php 
 									} mysql_free_result($result1);
			 						?> 
								</select></td>
      			<td width="147" class="color_radicado_a">Fecha de Ingreso</td> 
      			<td width="116"><input onchange="dias();" id="fecha_ingreso" name="fecha_ingreso" type ="text" class="txt_text"   value="<?php echo $FECHA_INGRESO ?>"></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_a">Rut</td>
      			<td><input id="rut" name="rut" type ="text" class="txt_text"  value="<?php echo $RUT_CLIENTE?>"> <div id="resultado2"  class="nube"></div> </td>
      			<td class="color_radicado_a">Diseñador</td>
      			<td><select name="disenador" id="disenador" type ="text" class="txt_text"  >
					<option><?php echo $DISENADOR ?> </option>
					<?php 
					$query_registro = 
					"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
					grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DAM'  ORDER BY empleado.nombres ASC  ";
					$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
	 				while($row = mysql_fetch_array($result1))
 					{
					?>
					<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 					<?php 
 					} mysql_free_result($result1);
 					?> 
					</select></td>
      			<td class="color_radicado_a">Fecha de Entrega</td>
      			<td><input onchange="dias();" id="fecha_entrega" name="fecha_entrega" type ="text" class="txt_text" value="<?php echo $FECHA_ENTREGA ?>"></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_a">Obra</td>
      			<td><input id="obra" name="obra" type ="text" class="txt_text"  value="<?php echo $OBRA?>"></td>
     			<td class="color_radicado_a">Contacto</td>
      			<td><input id="contacto" name="contacto" type ="text" class="txt_text"   value="<?php echo $CONTACTO?>"></td>
      			<td class="color_radicado_a">Dias Radicado</td>
      			<td><input  onchange="dias();" id="dias_radicado" name="dias_radicado"  type ="text" class="txt_text"  value="<?php echo $DIAS_RADICADO ?>"></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_a">Direccion Obra</td>
      			<td><input id="direccion_obra" name="direccion_obra" type ="text" class="txt_text"    value="<?php echo $DIRECCION_OBRA?>"></td>
      			<td class="color_radicado_a">Fono</td>
     	 		<td><input id="fono" name="fono"  type ="text" class="txt_text"    value="<?php echo $FONO?>"></td>
      			<td class="color_radicado_a">Fecha Contacto</td>
      			<td><input  id="fecha_contacto"  name="fecha_contacto"  type ="text" class="txt_text"  value="<?php echo $FECHA_CONTACTO ?>"></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_a">OC</td>
      			<td><input id="oc" name="oc" type ="text" class="txt_text" value="<?php echo $OC?>"></td>
      			<td class="color_radicado_a">Mail</td>
      			<td><input id="mail" name="mail" type ="text" class="txt_text" value="<?php echo $MAIL?>"></td>
      			<td class="color_radicado_a">Fecha Inicio Rocha</td>
      			<td><input onchange="dias2();" id="fecha_inicior"  name="fecha_inicior" type ="text" class="txt_text"  value="<?php echo $FECHA_INICIOR ?>"></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_a">Condicion de Pago</td>
      			<td><input id="condicion_pago" name="condicion_pago" type ="text" class="txt_text" value="<?php echo $CONDICION_PAGO?>"></td>
      			<td class="color_radicado_a">Validez Cotizacion</td>
      			<td><input id="validez" name="validez" type ="text" class="txt_text" value="<?php echo $VALIDEZ?>"></td>
      			<td class="color_radicado_a"><p>Fecha Entrega Rocha</p></td>
      			<td><input onchange="dias2();" id="fecha_entregar"  name="fecha_entregar" type ="text" class="txt_text"  value="<?php echo $FECHA_ENTREGAR ?>" /></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_a">Linea</td>
      			<td><select class="txt_text" name="departamento_credito" id="departamento_credito">
      				<option><?php echo $DEPARTAMENTO_CREDITO?></option>
					<option><?php echo $DEPARTAMENTO_CREDITO?></option>
					<?php 
					$query_registro = 
					"select * from linea ORDER BY NOMBRE_LINEA ASC";
					$result2 = mysql_query($query_registro, $conn) or die(mysql_error());
					while($row = mysql_fetch_array($result2))
					{
					?>
					<option value = "<?php echo ($row['NOMBRE_LINEA']); ?>" > <?php echo ($row['NOMBRE_LINEA']); ?> </option>
				<?php 
				} mysql_free_result($result2);
				?> 
				</select></td>
      			<td class="color_radicado_a">Puestos</td>
      			<td><input id="puestos" name="puestos" type ="text" class="txt_text" value="<?php echo $PUESTOS?>"></td>
      			<td class="color_radicado_a">Dias Rocha</td>
      			<td><input onchange="dias2();" id="dias_rocha" name="dias_rocha" type ="text" class="txt_text" value="<?php echo $DIAS_ROCHA ?>"></td>
    		</tr>
    		<tr>
      			<td rowspan="8" class="color_radicado_c"></td>
      			<td  colspan="4" class="color_radicado_b">Observaciones</td>
      			<td class="color_radicado_b">Sub Total</td>
      			<td><input  onchange="totalw();" id="sub_total" name="sub_total"  type ="text" class="txt_text txt_derecha" value="<?php echo number_format($SUB_TOTAL,0, ",", ".") ?>"></td>
    		</tr>
    		<tr>
     	 		<td onclick="TINY.box.show({url:'generarobsradicado.php?RADICADO=<?php echo urlencode($RADICADO)?>',width:680,height:320})" colspan="4" rowspan="7"><?php $sql111 = "SELECT actualizaciones.NOMBRE_USUARIO, actualizaciones.OBSERVACIONES, actualizaciones.FECHA,actualizaciones.USUARIO FROM actualizaciones_general, 
				actualizaciones,radicado where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
				and actualizaciones_general.CODIGO_GENERAL = radicado.CODIGO_RADICADO and radicado.CODIGO_RADICADO = '".($RADICADO)."' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
				$result111 = mysql_query($sql111, $conn) or die(mysql_error());
				echo "<textarea class='txt_texta' id='txt_observaciones' name = 'txt_observaciones'>";
 				while($row = mysql_fetch_array($result111))
  				{
					$OBSERVACIONES_A = $row["OBSERVACIONES"];
					$FECHA_A = $row["FECHA"];
					$USUARIO_A = $row["USUARIO"];
					$NOMBRE_A = $row["NOMBRE_USUARIO"];
    				echo "" .$NOMBRE_A ." ".$FECHA_A . " ".$OBSERVACIONES_A . "\n"; 
  				}
  				echo "</textarea>"; ?> </td>

      			<td class="color_radicado_b">Descuento  <input  id="activara" type="checkbox" name="activara" value="" onclick="descuentoa();"></td>
      			<td><input readonly="readonly" onchange="totalw();" id="descuento" name="descuento" type ="text" class='txt_text txt_center' value="<?php echo $DESCUENTO?>"></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_b">Neto</td>
      			<td><input id="neto" name="neto" type ="text" class='txt_text txt_derecha' onchange="totalw();"  value="<?php echo number_format($NETO,0, ",", ".")?>"></td>
    		</tr>
			<tr>
      			<td class="color_radicado_b"> Descuento 2  <input id="activars" name="activars" type="checkbox" value="" onclick="descuentoas();"/></td>
      			<td><input readonly="readonly" onchange="totalas();" id="descuento2" name="descuento2" type ="text" class='txt_text txt_center' value="<?php echo number_format($DESCUENTO2,0, ",", ".")?>"></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_b">Neto 2</td>
      			<td><input readonly="readonly" onchange="totalas();"   id="neto2" name="neto2" type ="text" class='txt_text txt_derecha' value="<?php echo number_format($MONTO2,0, ",", ".")?>"></td>
    		</tr>
			<tr>
      			<td class="color_radicado_b">Impuesto <select onchange="elije();" class='txt_impuesto' id = "iva1" name="iva1">
				<option>Seleccione</option>
				<option <?php echo $t_Iva_Retenido?>>Iva Retenido</option>
				<option <?php echo $t_iva?>>Iva</option>
				<option <?php echo $t_Retencio?>>Retencion</option>
				</select></td>
      			<td><input id="iva" name="iva" type ="text" class='txt_text txt_derecha'  value="<?php echo number_format($IVA,0, ",", ".")?>"></td>
    		</tr>
    		<tr>
      			<td class="color_radicado_b">Total</td>
      			<td><input id="total" name="total" type ="text" class='txt_text txt_derecha'  value="<?php echo number_format($TOTAL,0, ",", ".")?>"></td>
    		</tr>
    		<tr>
      			<td  class="color_radicado_b">Estado</td>
      			<td><select  class='txt_text' id = "estado" name="estado">
					<option><?php echo $ESTADO ?></option>
					<option>EN PROCESO</option>
					<option>COTIZADO</option>
					<option>ENVIADO</option>
					<option>PREAPROBADO</option>
					<option>ACEPTADO</option>
					<option>NULO</option>
					<option>COPIAR</option>
					<option>VERSIONAR</option>
					</select></td>
			</tr>
    	</table>

<div class="botones">
	<?php
	if($ESTADO == "ENVIADO")
	{
	?>	
		<input type="button" id="ACEPTADO" value="Ingresar"  class="boton">
	<?php
	}else{
	?>
  		<input type="button" id="ACEPTADO" value="Ingresar"  class="boton">
	<?php
	}; 
?>
<?php if($CODIGO_USUARIO ==  1 || $CODIGO_USUARIO ==  20){ ?>
<?php
	$sqlA = "SELECT COUNT(CODIGO_RADICADO) AS CUENTA FROM cotizacion where CODIGO_RADICADO = '".$RADICADO."'";
	$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
	while($row = mysql_fetch_array($resultA))
	{
  		$CUENTA = $row["CUENTA"];
	}

	$sqlB = "select COUNT(cotizacion.CODIGO_RADICADO) as CUENTA
			from acabado, cotizacion_producto, cotizacion
			WHERE acabado.ID_CP = cotizacion_producto.ID 
			and cotizacion_producto.CODIGO_COTIZACION  = cotizacion.CODIGO_COTIZACION 
			and cotizacion.CODIGO_RADICADO = '".$RADICADO."'";

	$resultB = mysql_query($sqlB, $conn) or die(mysql_error());
	while($row = mysql_fetch_array($resultB))
	{
  		$CUENTAB = $row["CUENTA"];
	}
?>

<?php if($CUENTA == 0){ ?>
 	<a class='button_actividades' href="ingreso-cotizacion.php?radicado=<?php echo urlencode($RADICADO) ?>"> 
    	<input class="boton1a" id="rochaeredado" name="rochaeredado" type="button" value="Cotizar" />
 	</a>
 <?php }else{?>
 	<a class='button_actividades' href="script-cotizacion.php?radicado=<?php echo urlencode($RADICADO) ?>" TARGET="_blank"> 
    	<input class="boton1a" id="rochaeredado" name="rochaeredado" type="button" value="Ver cotización" />
 	</a>
 	<?php if($ESTADO == 'EN PROCESO' || $ESTADO == 'COTIZADO') { ?>
 	<a class='button_actividades' href="editar-cotizacion.php?radicado=<?php echo urlencode($RADICADO) ?>"> 
    	<input class="boton1a" id="rochaeredado" name="rochaeredado" type="button" value="Editar" />
 	</a>
 	<?php if($CUENTAB > 0) { ?>
 	<a class='button_actividades' href="editar-acabado.php?radicado=<?php echo urlencode($RADICADO) ?>"> 
    	<input class="boton1a" id="rochaeredado" name="rochaeredado" type="button" value="Editar Acabado" />
 	</a>
 	<?php } else { ?>
 	<a class='button_actividades' href="acabado.php?radicado=<?php echo urlencode($RADICADO) ?>"> 
    	<input class="boton1a" id="rochaeredado" name="rochaeredado" type="button" value="Acabado" />
 	</a>
 	<?php } ?>
 	<?php } ?>
 <?php } ?>

 <?php } ?>
 	<a class='button_actividades' href="IngresoRadicado.php?radicado_copia=<?php echo urlencode($RADICADO) ?>" TARGET="_blank"> 
    	<input class="boton1a" id="rochaeredado" name="rochaeredado" type="button" value="Copiar Radicado" />
 	</a>
</div>


</form>
<form id = 'formulario'  name = 'formulario' method="GET" action=""/>
	<table id = "tabla_actividades">
		<tr>
			<td  class="color_radicado_a" width="200">Actividades</td>
			<td  class="color_radicado_a" align="center" width="81">Todas</td>
			<td  align="center" width="81"><input   <?php echo $TODOS; ?>  type="radio" name="ESTADO" value="TODOS" /></td>
			<td  class="color_radicado_a" align="center" width="81">En Proceso</td>
			<td  align="center" width="81"><input  <?php echo $PROCESO; ?>  type="radio" name="ESTADO" value="EN PROCESO" /></td>
			<td  class="color_radicado_a" align="center" width="81">Ok</td>
			<td  align="center" width="90"><input  <?php echo $OK; ?>  type="radio" name="ESTADO" value="OK" /></td>
			<td  align="center" width=""><input type="submit" value="Aceptar" class="boton2" /></td>
			<td  align="center" width="81"><a class='button_actividades' href='ingreso-servicio-radicado.php?CODIGO_RADICADO=<?php echo  urlencode($RADICADO)  ?>'>  
				 <input type="button"  value="Generar" class="boton2" id = "txt_actividades" name = "txt_actividades">  </a>  </td>
			<td  class="color_radicado_a" align="center" width="76"><a style="display:none" href="#" id="mas"> + </a> <a  href="#" id="menos"> - </a></td>
		</tr>
	</table>
<input id = "txt_codigo_proyecto2" name = "txt_codigo_proyecto2" style="display:none;" value="<?php echo $RADICADO ?>">
</form>

<div id = "servicios">
	<table id = "tabla_actividades_lista"  >
		</tr>
		<?php
		$fin=0;
		if($ESTADOV == "TODOS")
		{
			$sql555 = "select * FROM servicio where CODIGO_RADICADO = '".$RADICADO."'";
		}
		else
		{
			$sql555 = "select * FROM servicio where CODIGO_RADICADO = '".$RADICADO."' AND ESTADO  = '".$ESTADOV."'";
		}
		$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 		while($row = mysql_fetch_array($result555))
  		{
			$NOMBRE_SERVICIO1 = $row["NOMBRE_SERVICIO"];
			$CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
			$FECHA_I1 = $row["FECHA_INICIO"];
			$FECHA_E1 = $row["FECHA_ENTREGA"];
			$REALIZADOR1 = $row["REALIZADOR"];
			$SUPERVISOR1 = $row["SUPERVISOR"];
			$OBSERVACION1 = $row["OBSERVACIONES"];
			$DESCRIPCION1 = $row["DESCRIPCION"];
			$CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
			$ESTADO1 = $row["ESTADO"];
			$DIAS1 = $row["DIAS"];
			$PREDECESOR1  = $row["PREDECESOR"];
			if($NOMBRE_SERVICIO1 == "Visita")
			{
				echo "<tr><th class='visita' rowspan='2' colspan='10'> <a href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($RADICADO). "&editar=Visita>" . $NOMBRE_SERVICIO1 . "</a></th>";
				echo "<th class='visita'> N° </th>";	
				echo "<th class='visita'>Descripcion</th>";
				echo "<th width='80' class='visita'>Fecha Inicio</th>";	
				echo "<th width='80' class='visita'>Fecha Entrega</th>";	
				echo "<th class='visita'>Dias</th>";	
				echo "<th class='visita'>Observacion</th>";	
				echo "<th class='visita'>Estado</th></tr>";	
			}
			if($NOMBRE_SERVICIO1 == "Reunion")
			{
				echo "<tr><th align='center' class='reunion' rowspan='2' colspan='10'> <a  href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($RADICADO). "&editar=Reunion>" . $NOMBRE_SERVICIO1 . "</a></th>";
				echo "<th class='reunion'> N° </th>";	
				echo "<th class='reunion'>Descripcion</th>";
				echo "<th class='reunion'>Fecha Inicio</th>";	
				echo "<th width='80' class='reunion'>Fecha Entrega</th>";	
				echo "<th class='reunion'>Dias</th>";		
				echo "<th class='reunion'>Observacion</th>";	
				echo "<th class='reunion'>Estado</th></tr>";	
			}
			if($NOMBRE_SERVICIO1 == "Planimetria")
			{
				echo "<tr><th align='center' class='planimetria' rowspan='2' colspan='10'> <a href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($RADICADO). "&editar=Planimetria>" . $NOMBRE_SERVICIO1 . "</a></th>";
				echo "<th class='planimetria' > N° </th>";	
				echo "<th class='planimetria' >Descripcion</th>";
				echo "<th width='80' class='planimetria' >Fecha Inicio</th>";	
				echo "<th width='80' class='planimetria' >Fecha Entrega</th>";	
				echo "<th class='planimetria' >Dias</th>";	
				echo "<th class='planimetria' >Observacion</th>";	
				echo "<th class='planimetria' >Estado</th></tr>";		
			}
			if($NOMBRE_SERVICIO1 == "Cotizacion")
			{
				echo "<tr><th align='center' class='cotizacion' rowspan='2' colspan='10'> <a  href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($RADICADO). "&editar=Cotizacion>" . $NOMBRE_SERVICIO1 . "</a></th>";
				echo "<th class='cotizacion'> N° </th>";	
				echo "<th class='cotizacion'>Descripcion</th>";
				echo "<th width='80' class='cotizacion'>Fecha Inicio</th>";	
				echo "<th width='80' class='cotizacion'>Fecha Entrega</th>";	
				echo "<th class='cotizacion'>Dias</th>";		
				echo "<th class='cotizacion'>Observacion</th>";	
				echo "<th class='cotizacion'>Estado</th></tr>";		
			}
			if($NOMBRE_SERVICIO1 == "Presentacion")
			{
				echo "<tr><th align='center' class='presentacion' rowspan='2' colspan='10'> <a href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($RADICADO). "&editar=Presentacion>" . $NOMBRE_SERVICIO1 . "</a></th>";
				echo "<th class='presentacion'> N° </th>";	
				echo "<th class='presentacion'>Descripcion</th>";
				echo "<th width='80' class='presentacion'>Fecha Inicio</th>";	
				echo "<th width='80' class='presentacion'>Fecha Entrega</th>";	
				echo "<th class='presentacion'>Dias</th>";	
				echo "<th class='presentacion'>Observacion</th>";	
				echo "<th class='presentacion'>Estado</th></tr>";		
			}
			if($NOMBRE_SERVICIO1 == "TI")
			{
				echo "<tr><th align='center'class='ti' rowspan='2' colspan='10'> <a href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($RADICADO). "&editar=Presentacion>" . $NOMBRE_SERVICIO1 . "</a></th>";
				echo "<th class='ti'> N° </th>";	
				echo "<th class='ti'>Descripcion</th>";
				echo "<th width='80' class='ti'>Fecha Inicio</th>";	
				echo "<th width='80' class='ti'>Fecha Entrega</th>";	
				echo "<th class='ti'>Dias</th>";	
				echo "<th class='ti'>Observacion</th>";	
				echo "<th class='ti'>Estado</th></tr>";		
			}

    		echo "<tr><td class='des-actividad'>  <a style='color:black;text-decoration:none;' href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($RADICADO). "&editar=" . urlencode($NOMBRE_SERVICIO1). ">".$CODIGO_SERVICIO1."</a>  </td>";
			echo "<td class='des-actividad'>".($DESCRIPCION1)."</td>";
			echo "<td class='des-actividad'>".$FECHA_I1."</td>";	
			echo "<td class='des-actividad'>".$FECHA_E1."</td>";	
			echo "<td class='des-actividad'>".$DIAS1."</td>";	
			echo "<td class='des-actividad'>".($OBSERVACION1)."</td>";	
			echo "<td class='des-actividad'>".$ESTADO1."</td></tr>";
			echo "<tr><td></td></tr>";
  		}
?>
	</table>
</div>
<br />

<div id="popup3" style="display:none">
<form method="GET" action="" />
    <div class="content-popup3">
    	<div class="close"><a href="#" id="close">Cerrar</a></div>
			<p><b>Observacion:</b></p>
    		<textarea rows="17" cols="74" id="txt_observaciones1" name = "txt_observaciones1"></textarea>
			<input readonly type="submit" id="ingresar1" name="ingresar1" value="Ingresar">
			<input style="display:none;" type="text" id = "txt_codigo_proyecto1" name = "txt_codigo_proyecto1" value="<?php echo $RADICADO?>"/>
    	</div>
</form>

</div>
</div> 
</body>
</html>
