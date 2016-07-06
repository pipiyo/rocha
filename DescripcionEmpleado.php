<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
/////////////////////////////////////////////////////////////////////////////////////////
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];

/////////////////////////////////////////////////////////////////////////////////////////
$RUT_EMPLEADO = $_GET['RUT_EMPLEADO'];
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM empleado WHERE RUT ='".$RUT_EMPLEADO."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
    $RUT_EMPLEADO = $row["RUT"];
	$CODIGO_EMPLEADO = $row["CODIGO_EMPLEADO"];
	$NOMBRES_EMPLEADO = $row["NOMBRES"];
	$APELLIDO_PATERNO = $row["APELLIDO_PATERNO"];
	$APELLIDO_MATERNO = $row["APELLIDO_MATERNO"];
	$DIRECCION = $row["DIRECCION"];
	$TELEFONO = $row["TELEFONO"];
	$CELULAR = $row["CELULAR"];
	$EMAIL = $row["EMAIL"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$COMUNA = $row["COMUNA"];
	$NACIONALIDAD = $row["NACIONALIDAD"];
	$CARGO = $row["CARGO"];
	$AREA = $row["AREA"];

  }
  mysql_free_result($result);

$USUARIO = "";
$PASS = "";
$CODIGO_USUARIO1 = "";
$query_registroq = "SELECT * FROM usuario WHERE RUT ='".$RUT_EMPLEADO."'";
$resultq = mysql_query($query_registroq, $conn) or die(mysql_error());
$numero = 0;

while($row = mysql_fetch_array($resultq))
  {
    $USUARIO = $row["NOMBRE_USUARIO"];
	$PASS = $row["PASS"];
	$CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
  }
  mysql_free_result($resultq);

$query_registroc = "SELECT * FROM grupo_usuario WHERE CODIGO_USUARIO ='".$CODIGO_USUARIO1."'";
$resultc = mysql_query($query_registroc, $conn) or die(mysql_error());
$numero = 0;
$INF="";
$DAM="";
$ADQ="";
$BOD="";
$DES="";
$PRO="";
$INS="";
$TEC="";
$ADM="";
$SIL="";
$DIS="";
$VEN="";
$OPE="";
$GG="";
$GO="";
$GC="";
$GP="";
 while($row = mysql_fetch_array($resultc))
  {
    $CU = $row["CODIGO_USUARIO"];
	$CG = $row["CODIGO_GRUPO"];
	
	if($CG == "1")
	{
		$INF = 'checked';
	}
	if($CG == "2")
	{
		$DAM = 'checked';
	}
	if($CG == "3")
	{
		$SIL = 'checked';
	}
	if($CG == "4")
	{
		$GG = 'checked';
	}
	if($CG == "5")
	{
		$GC = 'checked';
	}
	if($CG == "6")
	{
		$GO = 'checked';
	}
	if($CG == "7")
	{
		$OPE = 'checked';
	}
	if($CG == "8")
	{
		$DIS = 'checked';
	}
	if($CG == "9")
	{
		$VEN = 'checked';
	}
	if($CG == "10")
	{
		$ADM= 'checked';
	}
	if($CG == "11")
	{
		$TEC= 'checked';
	}
	if($CG == "12")
	{
		$INS= 'checked';
	}
	if($CG == "13")
	{
		$PRO= 'checked';
	}
	if($CG == "14")
	{
		$DES= 'checked';
	}
	if($CG == "15")
	{
		$BOD= 'checked';
	}
	if($CG == "16")
	{
		$ADQ= 'checked';
	}
	if($CG == "17")
	{
		$GP= 'checked';
	}
  }
  mysql_free_result($resultc); 
/////////////////////////////////////////////////////////////////////////////////////////////  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Modificar Proveedor</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />
  <link href='http://fonts.googleapis.com/css?family=Paprika' rel='stylesheet' type='text/css' />
  <link rel="shortcut icon" href="Imagenes/rochag.png">
  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/ingreso-empleado.js"></script>
      <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" > 
  <script language = javascript>

function enviar1()
{
var as1= confirm("Realmente deseas modificar");
if(as1)                   
{
  document.getElementById("formulario22").submit();
}
else
{
  return false;
}
}




</script>

</head>

<body>
	<div id='bread'><div id="menu1"></div></div>
<div id="contenedor_Ingreso_empleado">	
<form  id = 'formulario22' method="POST" action="scriptActualizarEmpleado.php"/>
<table id="tabla_ingreso_empleado" rules="all">

<tr>
  <th  rowspan="3" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></th>
  <th  colspan="4" align="center"><h3>REGISTRO</h3></th>
  <th width="150"></th>
  <th width="150"></th>
</tr>
<tr>
  <th   colspan="4" rowspan="2" align="center"><h2>MODIFICAR EMPLEADO<h2></th>
  <th></th>
  <th></th>
</tr>
<tr>
  <th >&nbsp;Fecha de Hoy</th>
  <th ><input readonly aling="center" id="txt_ing"  name="txt_ing" type ="text"     value="<?php echo date("Y-m-d")?>"></th>
</tr>




<tr>
<td class="pan">  </td>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
</tr>

<tr>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>

</tr>

</table>




<table id="tabla_ingreso_empleado" rules="all">











<tr>
<td >Rut:</td>
<td ><input type="text" required="required" id= "txt_rut" readonly name = "txt_rut" value="<?php echo  $RUT_EMPLEADO;  ?>"> <br></td>



<td >Nuevo Rut:</td>
<td ><input type="text"  id= "txt_nrut" name = "txt_nrut" value=""> <br></td>
</tr>
<tr>
<td >Nombre:</td>
<td ><input type="text"  required="required"  id= "txt_nombre" name = "txt_nombre" value="<?php echo  ($NOMBRES_EMPLEADO);  ?>"> <br></td>

<td >Apellido p:</td>
<td ><input type="text"  required="required"  id = "txt_apellido_paterno" name = "txt_apellido_paterno" value="<?php echo ($APELLIDO_PATERNO);  ?>"> <br></td>
</tr>
<tr>
<td >Apellido m:</td>
<td ><input type="text"  required="required"  id = "txt_apellido_mateno" name = "txt_apellido_materno" value="<?php echo ($APELLIDO_MATERNO);  ?>"> <br></td>

<td >Direccion:</td>
<td ><input type="text" id = "txt_direccion" name = "txt_direccion" value="<?php echo ($DIRECCION);  ?>"> <br></td>
</tr>
<tr>
<td >Telefono:</td>
<td ><input type="text" id = "txt_telefono" name = "txt_telefono" value="<?php echo $TELEFONO;  ?>"> <br></td>

<td >Celular:</td>
<td ><input  type="text" name = "txt_celular" value="<?php echo $CELULAR;  ?>"> <br></td>
</tr>
<tr>
<td >Email:</td>
<td ><input  type="text" name = "txt_email" value="<?php echo $EMAIL;  ?>"> <br></td>

<td>Comuna:</td>
<td>
<select  id = "txt_comuna" name = "txt_comuna" >
<option><?php echo $COMUNA;  ?></option>
<?php 
$query_registro = 
"select * from comunas ORDER BY NOMBRE_COMUNA ASC";
$result2 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
{
?>
<option value = "<?php echo ($row['NOMBRE_COMUNA']); ?>" > <?php echo ($row['NOMBRE_COMUNA']); ?> </option>
<?php 
} mysql_free_result($result2);
?> 
</select>




 <br></td>
</tr>
<tr>


<td >Area:</td>
<td ><select  id = "txt_area" name="txt_area">
 <option><?php echo $AREA;  ?></option>
<option>PRODUCCION</option>
<option>ADQUISICIONES</option>
<option>BODEGA</option>
<option>DESPACHO</option>
<option>INSTALACIONES</option>
<option>COMERCIAL</option>
<option>FINANZAS</option>
<option>RRHH</option>
<option>SISTEMA</option>
<option>DESARROLLO</option>
<option>SILLAS</option>
<option>GERENCIA</option>
<option>DAM</option>
<option>OPERACIONES</option>
</select> <br></td>


<td >Cargo:</td>
<td ><input type="text" id = "txt_cargo" name = "txt_cargo" value="<?php echo $CARGO;  ?>"> <br></td>


</tr>
<tr>
<td >&nbsp;Departamento:</td>
<td >
<select required="required"  id = "departamento" name="departamento">
 <option><?php echo $DEPARTAMENTO ;  ?></option>
<option>Los Conquistadores 1</option>
<option>Los Conquistadores 2</option>
<option>Muebles y Diseños</option>
<option>La Dehesa</option>
<option>Sillas y Sillas</option>
</select>
 </td>
</tr>
<tr>
<th colspan="2" class="last"></th>
</tr>
<tr>

<td colspan="2" class="pan"><h2>Ingreso Usuario</h2></td>
</tr>




<tr>
<td >Usuario:</td>
<td ><input type="text"  id= "txt_user" name = "txt_user" value="<?php echo $USUARIO;  ?>"> <br></td>
</tr>
<tr>
<td >Password:</td>
<td ><input type="text" onchange="validar();" id= "txt_pass" name = "txt_pass" value=""> <br></td>
</tr>
<tr>
<td >Password1:</td>
<td ><input type="text" onchange="validar();" id= "txt_pass1" name = "txt_pass1" value="" /><input type="text" style="Display:none;" id= "txt_cod_user" name = "txt_cod_user" value="<?php echo $CODIGO_USUARIO1;  ?>" /></td>
</tr>




<tr>
<th colspan="2" class="last"></th>
</tr>
<tr>

<td colspan="2" class="pan"><h2>Grupos</h2></td>
</tr>





<tr>
<td >&nbsp;<input type="checkbox" name="ADQ" id="ADQ" value="16" <?php echo $ADQ ?> /> Adquisiciones</td>
<td >&nbsp;<input type="checkbox" name="BOD" id="BOD" value="15" <?php echo $BOD ?> /> Bodega</td>
<td >&nbsp;<input type="checkbox" name="DES" id="DES" value="14" <?php echo $DES ?> /> Despacho</td>
<td >&nbsp;<input type="checkbox" name="TEC" id="TEC" value="11" <?php echo $TEC ?> /> Tecnica</td>

</tr>
<tr>

<td >&nbsp;<input type="checkbox" name="VEN" id="VEN" value="9"<?php echo $VEN ?> /> Ventas</td>
<td >&nbsp;<input type="checkbox" name="DIS" id="DIS" value="8"<?php echo $DIS ?> /> Diseño</td>
<td >&nbsp;<input type="checkbox" name="INS" id="INS" value="12" <?php echo $INS ?> /> instalaciones</td>
<td >&nbsp;<input type="checkbox" name="ADM" id="ADM" value="10" <?php echo $ADM ?> /> Administracion</td>

</tr>
<tr>

<td >&nbsp;<input type="checkbox" name="OPE" id="OPE" value="7"<?php echo $OPE ?> /> Operaciones</td>
<td >&nbsp;<input type="checkbox" name="SIL" id="SIL" value="3" <?php echo $SIL ?> /> Silla</td>
<td >&nbsp;<input type="checkbox" name="INF" id="INF" value="1" <?php echo $INF ?> /> Informatica</td>
<td >&nbsp;<input type="checkbox" name="DAM" id="DAM" value="2" <?php echo $DAM ?> /> Dam</td>

</tr>

<tr>

<td >&nbsp;<input type="checkbox" name="GC" id="GC" value="5" <?php echo $GC ?> /> GC</td>
<td >&nbsp;<input type="checkbox" name="GO" id="GO" value="6" <?php echo $GO ?> /> GO</td>
<td >&nbsp;<input type="checkbox" name="GG" id="GG" value="4" <?php echo $GG ?> /> GG</td>
<td >&nbsp;<input type="checkbox" name="PRO" id="PRO" value="13" <?php echo $PRO ?> /> Produccion</td>

</tr>



<tr>

<td >&nbsp;<input type="checkbox" name="GP" id="GP" value="17" <?php echo $GP ?> /> GP</td>

</tr>




<tr>
</table>
<table id="tabla_ingreso_empleado" rules="all">
	<tr>
<th colspan="2" class="last"></th>
</tr>
<tr>
<td colspan="2" class="pan"><h2>Equipo</h2></td>
</tr>
</table>	

 <?php
$contador = 1;
$query_registroq = "SELECT * FROM equipo WHERE RUT_LIDER ='".$RUT_EMPLEADO."'";
$resultq = mysql_query($query_registroq, $conn) or die(mysql_error());
$numero = 0;

while($row = mysql_fetch_array($resultq))
  {
    echo '<div id="con'.$contador.'" >
        <table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado1">
  		<tr>
  		<td width="275" class="color_ti">Vendedor</td>
  		<td  width="275" >';

$query_registroc = "SELECT * FROM empleado WHERE RUT ='".$row['RUT_SUB']."'";
$resultc = mysql_query($query_registroc, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($resultc))
  {
    $RUT_EMPLEADO = $row["RUT"];
	$CODIGO_EMPLEADO = $row["CODIGO_EMPLEADO"];
	$NOMBRES_EMPLEADO = $row["NOMBRES"];
	$APELLIDO_PATERNO = $row["APELLIDO_PATERNO"];
	$APELLIDO_MATERNO = $row["APELLIDO_MATERNO"];
}

?>


<select class="formulario_ingreso_servicio"  id= "txt_rutem<?php echo $contador?>" name= "txt_rutem<?php echo $contador?>" type ="text">
<option><?php echo $NOMBRES_EMPLEADO. " ".$APELLIDO_PATERNO. " ".$APELLIDO_MATERNO ?> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' order by empleado.nombres";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);

 ?> 
<?php
  		
  echo	'</td></table>
  		 </div>';
    $contador++;

  }
  mysql_free_result($resultq);






while($contador <= 50)
{
  echo '<div style="display:none;"" id="con'.$contador.'" >
        <table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado1">
  		<tr>
  		<td width="275" class="color_ti">Vendedor</td>
  		<td  width="275" >';
?>

<select class="formulario_ingreso_servicio" disabled="disabled" id= "txt_rutem<?php echo $contador?>" name= "txt_rutem<?php echo $contador?>" type ="text">
<option></option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' order by empleado.nombres";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);

 ?> 
<?php
  		
  echo	'</td></table>
  		 </div>';
    $contador++;
}
?>
<input  id='mas' type="button" onclick="myFunction()" value="+">

<table id="tabla_ingreso_empleado" rules="all">
<td width='630' class="pan"></td>
<td class="pan"><input type="submit" onclick="enviar1()" id="ingresar" name="ingresar" value="Modificar" /></td>
</tr>
</table>
  
</form>
</div>
</body>
</html>
