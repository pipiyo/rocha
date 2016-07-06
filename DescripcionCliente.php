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

$CODIGO_CLIENTE = $_GET['CODIGO_CLIENTE'];
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM cliente WHERE CODIGO_CLIENTE ='".$CODIGO_CLIENTE."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$RUT_CLIENTE = $row["RUT_CLIENTE"];
	$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$DIRECCION = $row["DIRECCION"];
	$COMUNA = $row["COMUNA"];
	$TELEFONO1 = $row["TELEFONO1"];
	$TELEFONO2 = $row["TELEFONO2"];
	$WEB = $row["WEB"];
	$CONTACTO1 = $row["CONTACTO1"];
	$CONTACTO2 = $row["CONTACTO2"];
	$CELULAR_CONTACTO1 = $row["CELULAR_CONTACTO1"];
	$CELULAR_CONTACTO2 = $row["CELULAR_CONTACTO2"];
	$FORMA_PAGO = $row["FORMA_PAGO"];
	$ACTIVO = $row["ACTIVO"];
  $DIRECTOR = $row["EJECUTIVO"];
  $RAZON = $row["RAZON_SOCIAL"];
  $GIRO = $row["GIRO"];
  }

  mysql_free_result($result);


?>
<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Descripcion Cliente V1.1.1</title>
  
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <link rel="stylesheet" type="text/css" href="Style/mantenedores.css" />
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.Rut.js" type="text/javascript"></script>
  <script src="js/jquery.Rut.min.js" type="text/javascript"></script>
  <script src='js/breadcrumbs.php'></script>



<!-- Script -->
<script language = javascript>

  $(document).ready(function(){
    $('#txt_rut').Rut({ });
    $("#content > ul").tabs();
  });

function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}

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

function enviar2()
{
  var as1= confirm("Realmente deseas Desavilitar el cliente");
  if(as1)                   
  {
    document.getElementById("formulario11").submit();
  }
  else
  {
    return false;
  }
}
function enviar3()
{
  var as1= confirm("Realmente deseas Avilitar el cliente");
  if(as1)                   
  {
    document.getElementById("formulario11").submit();
  }
  else
  {
    return false;
  }
}
</script><!-- Fin  Script -->

</head>

<body>
<div id='bread'><div id="menu1"></div></div>


<form  id = 'formulario22' method="GET" action="scriptActualizarCliente.php"/>

<h1>Descripción Cliente</h1>

<table id= "tabla_ingreso_cli">
<tr>
<td  class="td_rosa">Rut:</td>
<td ><input required="required"  class="txt" type="text"   id= "txt_rut" name = "txt_rut" value="<?php echo ($RUT_CLIENTE); ?>" >
<input style='display:none;' required="required"  class="txt" type="text"   id= "txt_rut1" name = "txt_rut1" value="<?php echo ($RUT_CLIENTE); ?>" > <br></td>
<td  class="td_rosa">Nombre:</td>
<td ><input required="required" placeholder="Carrozzi S.A." class="txt"type="text"   id= "txt_nombre" name = "txt_nombre" value="<?php echo ($NOMBRE_CLIENTE); ?>"> <br></td>
</tr>

<tr>
<td class="td_rosa">Razon social:</td>
<td><input required="required" placeholder="Ducasse Industrial" class="txt" type="text" name = "txt_razon" value="<?php echo $RAZON; ?>"> </td>
<td class="td_rosa">Giro:</td>
<td><input class="txt" placeholder="Import. y export. y comercializacion de muebles"   type="text" name = "txt_giro" value="<?php echo $GIRO; ?>"> </td>
</tr>

<tr>
<td  class="td_rosa">Direccion:</td>
<td ><input placeholder="Santa Rosa 1111" class="txt" type="text"  id = "txt_direccion" name = "txt_direccion" value="<?php echo ($DIRECCION); ?>"> <br></td>
<td  class="td_rosa">comuna:</td>
<td ><input placeholder="San Miguel" class="txt" type="text"  id = "txt_comuna" name = "txt_comuna" value="<?php echo ($COMUNA);?>"> <br></td>
</tr>

<tr>
<td class="td_rosa" >telefono 1:</td>
<td ><input placeholder="(2) X XXX XXX" class="txt" type="text"  id = "txt_telefono1" name = "txt_telefono1" value="<?php echo ($TELEFONO1); ?>"> <br></td>
<td class="td_rosa" >telefono 2:</td>
<td ><input placeholder="(2) X XXX XXX" class="txt" type="text"  id = "txt_telefono2" name = "txt_telefono2" value="<?php echo ($TELEFONO2);?>"> <br></td>
</tr>

<tr>
<td class="td_rosa" >Web:</td>
<td ><input placeholder="www.MueblesyDiseño.cl" class="txt" type="text"  name = "txt_web" value="<?php echo ($WEB);?>"> <br></td>
<td class="td_rosa" >Contacto 1:</td>
<td ><input placeholder="Luiz Jara" class="txt"  type="text"  name = "txt_contacto1" value="<?php echo ($CONTACTO1); ?>"> <br></td>
</tr>

<tr>
<td class="td_rosa" >Contacto 2:</td>
<td ><input placeholder="Luiz Jara" class="txt" type="text"  id = "txt_contacto2" name = "txt_contacto2" value="<?php echo ($CONTACTO2);?>"> <br></td>
<td class="td_rosa" >Celular 1:</td>
<td ><input placeholder="(8) XX XXX XXX" class="txt" type="text"  id = "txt_celular1" name = "txt_celular1" value="<?php echo ($CELULAR_CONTACTO1); ?>"> <br></td>
</tr>

<tr>
<td class="td_rosa" >Celular 2:</td>
<td ><input placeholder="(8) XX XXX XXX" class="txt" type="text"  id = "txt_celular2" name = "txt_celular2" value="<?php echo ($CELULAR_CONTACTO2);?>"> <br></td>
<td class="td_rosa" >Forma de pago:</td>
<td ><input placeholder="50%CO 40%CE 10%30" class="txt" type="text"  id = "txt_forma" name = "txt_forma" value="<?php echo ($FORMA_PAGO); ?>"> <br></td>
</tr>

<tr>
<td class="td_rosa" >Activo:</td>
<td ><input class="txt" type="text"  id = "txt_activo" name = "txt_activo" value="<?php echo ($ACTIVO);?>"><br></td>
<td class="td_rosa" >Ejecutivo</td>
<td ><select name="director" id="director" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" >
<option><?php echo ($DIRECTOR) ?> </option>
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
   mysql_close($conn);
 ?> 
</select></td>
</tr>
</table>
<input  class="txtEspecial" id="txt_ing" name="txt_ing" type ="hidden"     value="<?php echo date("Y-m-d")?>">
<input class="BotonSeleste der" type="button" onClick = "enviar1();" id="modificar"  name="modificar" value="Modificar">
</form>





<form  id = 'formulario11' method="GET" action="scriptEliminarCliente.php"/>
<?php
if($ACTIVO == "NO"){
?>
<input class="BotonVerde izq" type="button" onClick = "enviar3();" id="Avilitar"  name="Avilitar" value="Avilitar">
<?php
}else{
?>
<input class="BotonRojo izq" type="button" onClick = "enviar2();" id="Desavilitar"  name="Desavilitar" value="Deshabilitar">
<?php
}
?>
<input type="hidden"   id= "txt_rut" name = "txt_rut" value="<?php echo ($RUT_CLIENTE); ?>" >
</form>


</body>
</html>
