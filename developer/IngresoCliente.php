<?php require_once('Conexion/Conexion.php'); ?>
<?php
session_start();
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

//////////////////////////////////////////////////////////////

$RUTC= '';
$NOMBREC = '';



if (isset($_GET["rutcopia"]))  {
  $RUTC= $_GET['rutcopia'];
}


if (isset($_GET["nombrecopia"]))  {
  $NOMBREC = $_GET['nombrecopia'];
}



if (isset($_GET["ingresar"])) 
{
$CODIGO = $_GET['txt_rut'];
mysql_select_db($database_conn, $conn); 
$query_registro = "SELECT * FROM cliente WHERE RUT_CLIENTE ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
  $numero++;
  }
mysql_free_result($result1);

  
if($numero == 0)
{
$RUT = $_GET['txt_rut'];
$NOMBRE = $_GET['txt_nombre'];
$DIRECCION = $_GET['txt_direccion'];
$COMUNA = $_GET['txt_comuna'];
$TELEFONO1 = $_GET['txt_telefono1'];
$TELEFONO2 = $_GET['txt_telefono2'];
$WEB = $_GET['txt_web'];
$CONTACTO1 = $_GET['txt_contacto1'];
$CONTACTO2 = $_GET['txt_contacto2'];
$CELULAR1 = $_GET['txt_celular1'];
$CELULAR2 = $_GET['txt_celular2'];
$FORMA = $_GET['txt_forma'];
$GIRO = $_GET['txt_giro'];
$RAZON = $_GET['txt_razon'];

$sql = "INSERT INTO cliente (RUT_CLIENTE, NOMBRE_CLIENTE,DIRECCION,COMUNA,TELEFONO1,TELEFONO2,WEB,CONTACTO1,CONTACTO2,CELULAR_CONTACTO1,CELULAR_CONTACTO2,FORMA_PAGO,GIRO,RAZON_SOCIAL) values ('".$RUT."','".$NOMBRE."','".$DIRECCION."','".$COMUNA."','".$TELEFONO1."','".$TELEFONO2."','".$WEB."','".$CONTACTO1."','".$CONTACTO2."','".$CELULAR1."','".$CELULAR2."','".$FORMA."','".$GIRO."','".$RAZON."')";

$result = mysql_query($sql, $conn) or die(mysql_error());
mysql_select_db($database_conn, $conn);




echo '<script language = javascript>
alert("Cliente Ingresado correctamente")

  window.close("IngresoCliente.php")
  </script>';






}
else
{
  echo '<script language = javascript>
  alert("El codigo del producto ya existe")
  self.location = "Cliente.php"
  </script>';
  }
}
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

?>
<!DOCTYPE html>
<html>
<head>
  <title>Ingreso Cliente 2.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" >
  <link rel="shortcut icon" href="Imagenes/rochag.png">
  <link rel="stylesheet" type="text/css" href="Style/mantenedores.css" >
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.Rut.js" type="text/javascript"></script>
  <script src="js/jquery.Rut.min.js" type="text/javascript"></script>
  <script src='js/breadcrumbs.php'></script>
 
<script language = javascript>

$(document).ready(function(){
  $('#txt_rut').Rut({ });
  $("#content > ul").tabs();
});

function justNumbers(e){
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true;
  return /\d/.test(String.fromCharCode(keynum));
}

function mostrardiv(){
  formulario = document.getElementById('formulario');
  formulario1 = document.getElementById('formulario1');
  formulario1.style.display = "";
  formulario.style.display = "none";
}   

function mostrardiv1() {
  formulario = document.getElementById('formulario');
  formulario1 = document.getElementById('formulario1');
  formulario1.style.display = "none";
  formulario.style.display = "";
}   
function enviar(){
  var as= confirm("Realmente deseas Borrar");
  if(as)
  {
    document.getElementById("formulario11").submit();
  }
  else
  {
    return false;
  }
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
</script>

</head>

<body>
<div id='bread'><div id="menu1"></div></div> 
<h1>Ingreso Cliente</h1>
<form  id = 'formulario'  name = 'formulario' method="GET"/>

<table id= "tabla_ingreso_cli">
<tr>
<td class="td_rosa">Rut:</td>
<td ><input class="txt" type="text" required="required" placeholder="1.111.111-1"  id= "txt_rut" name = "txt_rut" value="<?php echo $RUTC ?>"> <br></td>
<td class="td_rosa">Nombre:</td>
<td><input required="required" placeholder="Carrozzi S.A." class="txt" type="text"  id= "txt_nombre" name = "txt_nombre" value="<?php echo $NOMBREC ?>"> <br></td>
</tr>

<tr>
<td class="td_rosa">Razon social:</td>
<td><input required="required" placeholder="Ducasse Industrial" class="txt" type="text" name = "txt_razon" value=""> </td>
<td class="td_rosa">Giro:</td>
<td><input class="txt" placeholder="Import. y export. y comercializacion de muebles"   type="text" name = "txt_giro" value=""> </td>
</tr>

<tr>
<td class="td_rosa">Direccion:</td>
<td><input placeholder="Santa Rosa 1111" class="txt" type="text" id = "txt_direccion" name = "txt_direccion" value=""> <br></td>
<td class="td_rosa">Comuna:</td>
<td><input placeholder="San Miguel" class="txt" type="text" id = "txt_comuna" name = "txt_comuna" value=""> <br></td>
</tr>

<tr>
<td class="td_rosa">Telefono 1:</td>
<td><input placeholder="(2) X XXX XXX" class="txt" type="text" id = "txt_telefono1" name = "txt_telefono1" value=""> <br></td>
<td class="td_rosa">Telefono 2:</td>
<td><input placeholder="(2) X XXX XXX" class="txt" type="text" id = "txt_telefono2" name = "txt_telefono2" value=""> <br></td>
</tr>

<tr>
<td class="td_rosa">Web:</td>
<td><input placeholder="www.MueblesyDiseño.cl" class="txt" type="text" name = "txt_web" value=""> <br></td>
<td class="td_rosa">Contacto 1:</td>
<td><input placeholder="Luiz Jara" class="txt" type="text" name = "txt_contacto1" value=""> <br></td>
</tr>

<tr>
<td class="td_rosa">Contacto 2:</td>
<td><input placeholder="Luiz Jara" class="txt" type="text" id = "txt_contacto2" name = "txt_contacto2" value=""> <br></td>
<td class="td_rosa">Celular 1:</td>
<td><input placeholder="(8) XX XXX XXX" class="txt" type="text" id = "txt_celular1" name = "txt_celular1" value=""> <br></td>
</tr>

<tr>
<td class="td_rosa">Celular 2:</td>
<td><input placeholder="(8) XX XXX XXX" class="txt" type="text" id = "txt_celular2" name = "txt_celular2" value=""> <br></td>
<td class="td_rosa">Forma de pago:</td>
<td><input placeholder="50%CO 40%CE 10%30" class="txt" type="text" id = "txt_forma" name = "txt_forma" value=""> <br></td>
</tr>

</table>

<input class="BotonSeleste der" type="submit" id="ingresar" name="ingresar" value="Ingresar">

</form>
</body>
</html>
