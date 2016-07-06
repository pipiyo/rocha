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

//////////////////////////////////////////////////////////////

if (isset($_GET["ingresar"]))
{
$RUT = $_GET['txt_rut'];
mysql_select_db($database_conn, $conn);	
$query_registro = "SELECT * FROM EMPLEADO WHERE RUT ='".$RUT."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$numero++;
  }
mysql_free_result($result1);

/////////////////////////////////////////////////////////////////////////////////////////////////// 

if($numero == 0)
{
$RUT = $_GET['txt_rut'];
$NOMBRE = $_GET['txt_nombre'];
$APELLIDO_PATERNO = $_GET['txt_apellido_paterno'];
$APELLIDO_MATERNO = $_GET['txt_apellido_materno'];
$DIRECCION = $_GET['txt_direccion'];
$TELEFONO = $_GET['txt_telefono'];
$CELULAR = $_GET['txt_celular'];
$EMAIL = $_GET['txt_email'];
$COMUNA = $_GET['txt_comuna'];
$CARGO = $_GET['txt_cargo'];
$AREA = $_GET['txt_area'];
$USER = $_GET['txt_user'];
$DEPARTAMENTO = $_GET['departamento'];

///////////////////////////////////////////////////////////////////////////////////////////////////	
$sql = "INSERT INTO empleado (RUT, NOMBRES,APELLIDO_PATERNO,APELLIDO_MATERNO,DIRECCION,TELEFONO,CELULAR,EMAIL,COMUNA,CARGO,AREA,DEPARTAMENTO) values ('".$RUT."','".$NOMBRE."','".$APELLIDO_PATERNO."','".$APELLIDO_MATERNO."','".$DIRECCION."','".$TELEFONO."','".$CELULAR."','".$EMAIL."','".$COMUNA."','".$CARGO."','".$AREA."','".$DEPARTAMENTO."')";
$result = mysql_query($sql, $conn) or die(mysql_error());
mysql_select_db($database_conn, $conn);
//////////////////////////////////////////////////////////////////////////////

if($USER == "")
{

}else{

$query_registroa = "SELECT MAX(CODIGO_USUARIO) as cuenta FROM USUARIO";
$resulta = mysql_query($query_registroa, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($resulta))
  {
	$cuenta = $row["cuenta"];
  }
mysql_free_result($resulta);

///////////////////////////////////////////////////////////////////////////////

$cuenta =$cuenta++;
$USUARIO = $_GET['txt_user'];
$PASS = $_GET['txt_pass'];
$sqla = "INSERT INTO usuario (NOMBRE_USUARIO,PASS,FECHA_INGRESO,ACTIVO,RUT)values ('".$USUARIO."','".$PASS."','".date("Y-m-d")."','SI','".$RUT."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());

if (isset($_GET["INF"]))  
{
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['INF']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["DAM"])) 
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['DAM']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["SIL"]))  
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['SIL']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["GG"])) 
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['GG']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["GC"]))   
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['GC']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["GO"]))   
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['GO']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["OPE"]))  
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['OPE']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["DIS"]))  
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['DIS']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["VEN"]))   
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['VEN']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["ADM"]))  
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['ADM']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["TEC"])) 
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['TEC']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["INS"]))   
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['INS']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["PRO"]))  
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['PRO']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["DES"]))  
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['DES']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["BOD"])) 
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['BOD']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["ADQ"])) 
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['ADQ']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
if  (isset($_GET["GP"])) 
{ 
$sql_insert = "INSERT INTO grupo_usuario (codigo_grupo,codigo_usuario) VALUES ('".$_GET['GP']."','".$cuenta."');";
$resultb = mysql_query($sql_insert, $conn) or die(mysql_error());
}
}

echo '<script language = javascript>
  alert("Ingresado :D")
  window.close("Empleados.php") </script>';

}
else
{
///////////////////////////////////////////////////////////////////////////////
echo '<script language = javascript>
	 alert("Rut ya ingresado")
	 window.close("Empleados.php")';
}



}


//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Ingreso Empleado V1.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />
  <link rel="shortcut icon" href="Imagenes/rochag.png">
  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.Rut.js" type="text/javascript"></script>
  <script src="js/jquery.Rut.min.js" type="text/javascript"></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript>

function reempleado() 
{
//location.href= "abastecimiento.html";
window.close("IngresoEmpleado.php");
//window.open("Empleados.php");
} 
  
$(document).ready(function(){
$('#txt_rut').Rut({ });
$("#content > ul").tabs();
});

$(document).ready(function(){
$("#txt_pass").keyup(function(e){
var p1 = document.getElementById("txt_pass").value;
var espacios = false;
var cont = 0;
while (!espacios && (cont < p1.length)) {
if (p1.charAt(cont) == " ")
espacios = true;
cont++; 
}
if (espacios) 
{
alert ("La contraseña no puede contener espacios en blanco");
$("#txt_pass").val("");
$("#txt_pass1").val("");
return false;
}
});
});

$(document).ready(function(){
$("#txt_pass1").blur(function(e){
var p1 = document.getElementById("txt_pass").value;
var p2 = document.getElementById("txt_pass1").value;
if (!p2) 
{ 
}else if (p1 != p2) 
{
alert("Las passwords deben de coincidir");
$("#txt_pass1").val("");
} 
});
});

$(document).ready(function(){
$("#txt_user").blur(function(e){
var U = document.getElementById("txt_user").value;
if (!U){ 
$("input.GRUPOS").attr("disabled", true);
}else{
  $("input.GRUPOS").removeAttr("disabled");
}
});
});
</script>




</head>
<body>
<div id='bread'><div id="menu1"></div></div>
<div id="contenedor_Ingreso_empleado">	
<form  name = 'formulario' method="GET"/>
<table id="tabla_ingreso_empleado" rules="all">



<tr>
  <th  rowspan="3" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></th>
  <th  colspan="4" align="center"><h3>REGISTRO</h3></th>
  <th width="150"></th>
  <th width="150"></th>
</tr>
<tr>
  <th   colspan="4" rowspan="2" align="center"><h2>INGRESAR EMPLEADO<h2></th>
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
<td >&nbsp;Rut:</td>
<td ><input type="text" required="required" placeholder="&nbsp;1.111.111-1" id= "txt_rut" name = "txt_rut" value=""> </td>

<td >&nbsp;Nombre:</td>
<td ><input type="text" placeholder="Manuel" required="required" id= "txt_nombre" name = "txt_nombre" value=""> </td>
</tr>
<tr>

<td >&nbsp;Apellido p:</td>
<td ><input type="text" placeholder="Cisternas" required="required" id = "txt_apellido_paterno" name = "txt_apellido_paterno" value=""> </td>


<td >&nbsp;Apellido m:</td>
<td ><input type="text" placeholder="Cisternas" required="required" id = "txt_apellido_mateno" name = "txt_apellido_materno" value=""> </td>

</tr>

<tr>
<td >&nbsp;Direccion:</td>
<td ><input type="text" placeholder="Santa Rosa 1111"  id = "txt_direccion" name = "txt_direccion" value=""> </td>
<td >&nbsp;Telefono:</td>
<td ><input type="text"  placeholder="(2) X XXX XXX" id = "txt_telefono" name = "txt_telefono" value=""> </td>

</tr>

<tr>
<td >&nbsp;Celular:</td>
<td ><input placeholder="(8) XX XXX XXX" type="text" name = "txt_celular" value=""> </td>
<td >&nbsp;Email:</td>
<td ><input  type="text" placeholder="rocha@rocha.cl" name = "txt_email" value=""> </td>
</tr>


<tr>

<tr>
<td >&nbsp;Comuna:</td>
<td ><select  id = "txt_comuna" name = "txt_comuna" >
<option>Comuna</option>
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
</select></td>


<td >&nbsp;Cargo:</td>
<td ><input type="text" required="required" placeholder="Instalador" id = "txt_cargo" name = "txt_cargo" value=""> </td>



</tr>

<tr>
<td >&nbsp;Area:</td>
<td ><select required="required"  id = "txt_area" name="txt_area">
  <option></option>
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
</select> </td>

<td ></td>
<td class="blank"></td>
</tr>
<tr>
<td >&nbsp;Departamento:</td>
<td >
<select required="required"  id = "departamento" name="departamento">
<option value="">Departamento</option>
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
<td >&nbsp;Usuario:</td>
<td ><input  type="text"  id= "txt_user" name = "txt_user" value=""> </td>

</tr>
<tr>
<td >&nbsp;Password:</td>
<td ><input  type="text" disabled class="GRUPOS" id= "txt_pass" name = "txt_pass" value=""> </td>
</tr>
<tr>
<td >&nbsp;Password1:</td>
<td ><input type="text" disabled class="GRUPOS"  id= "txt_pass1" name = "txt_pass1" value=""> </td>
</tr>

<tr>
<th colspan="2" class="last"></th>
</tr>
<tr>

<td colspan="2" class="pan"><h2>Grupos</h2></td>
</tr>



<tr>
<td >&nbsp;<input type="checkbox" disabled name="ADQ" id="ADQ" class="GRUPOS" value="16"><label for="ADQ"> Adquisiciones</label></td>
<td >&nbsp;<input type="checkbox" disabled name="BOD" id="BOD" class="GRUPOS" value="15"><label for="BOD"> Bodega</label></td>
<td >&nbsp;<input type="checkbox" disabled name="DES" id="DES" class="GRUPOS" value="14"><label for="DES"> Despacho</label></td>
<td >&nbsp;<input type="checkbox" disabled name="TEC" id="TEC" class="GRUPOS" value="11"><label for="TEC"> Tecnica</label></td>
</tr>


<tr>
<td >&nbsp;<input type="checkbox" disabled name="VEN" id="VEN" class="GRUPOS" value="9"><label for="VEN"> Ventas</label></td>
<td >&nbsp;<input type="checkbox" disabled name="INS" id="INS" class="GRUPOS" value="12"><label for="INS"> instalaciones</label></td>
<td >&nbsp;<input type="checkbox" disabled name="ADM" id="ADM" class="GRUPOS" value="10"><label for="ADM"> Administracion</label></td>
<td >&nbsp;<input type="checkbox" disabled name="DIS" id="DIS" class="GRUPOS" value="8"><label for="DIS"> Diseño</label></td>
</tr>
<tr>


<td >&nbsp;<input type="checkbox" disabled name="SIL" id="SIL" class="GRUPOS" value="3"><label for="SIL"> Silla</label></td>
<td >&nbsp;<input type="checkbox" disabled name="INF" id="INF" class="GRUPOS" value="1"><label for="INF"> Informatica</label></td>
<td >&nbsp;<input type="checkbox" disabled name="DAM" id="DAM" class="GRUPOS" value="2"><label for="DAM"> Dam</label></td>
<td >&nbsp;<input type="checkbox" disabled name="OPE" id="OPE" class="GRUPOS" value="7"><label for="OPE"> Operaciones</label></td>

</tr>
<tr>

<td >&nbsp;<input type="checkbox" disabled name="GC" id="GC" class="GRUPOS" value="5"><label for="GC"> GC</label></td>
<td >&nbsp;<input type="checkbox" disabled name="GO" id="GO" class="GRUPOS" value="6"><label for="GO"> GO</label></td>
<td >&nbsp;<input type="checkbox" disabled name="GG" id="GG" class="GRUPOS" value="4"><label for="GG"> GG</label></td>
<td >&nbsp;<input type="checkbox" disabled name="PRO" id="PRO" class="GRUPOS" value="13"><label for="PRO"> Produccion</label></td>

</tr>


<tr>

<td >&nbsp;<input type="checkbox" disabled name="GP" id="GP" class="GRUPOS" value="17"><label for="GP"> GP</label></td>

</tr>


<tr>
<td class="pan"></td>
<td class="pan"></td>
<td class="pan"></td>
<td class="pan"><input type="submit" id="ingresar" name="ingresar" value="Ingresar"> </td>

</tr>
</table>

</form>



</div>

</body>
</html>
