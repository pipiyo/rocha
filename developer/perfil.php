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
$query_registro = "select usuario.NOMBRE_USUARIO,empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result1))
  {
	$nombreu = $row["NOMBRE_USUARIO"];
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);
//////////////////////////////////////////////////////////////////
?>
<!doctype html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<html>
<head>
<meta charset="utf-8">
<title>Perfil</title>
 <link rel="shortcut icon" href="Imagenes/rocha.png">
<LINK REL=StyleSheet HREF="style/960_12_col.css" TYPE="text/css" MEDIA=screen>
 <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/estiloperfil.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.Rut.js" type="text/javascript"></script>
  <script src="js/jquery.Rut.min.js" type="text/javascript"></script>
  
  <script language = javascript>
  
function validar()
{
var p1 = document.getElementById("txt_password").value;
var p2 = document.getElementById("txt_repassword").value;
var boton = document.getElementById('ingresar');

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
  return false;
}
if(p1 != "" && p2 != "")
{
if (p1 != p2) 
{
  boton.disabled=true;
  alert("Las passwords deben de coincidir");
  return false;
  
} 
else 
{
 boton.disabled=false;
 return true; 
}
}
}
  
function reback()
{
//location.href= "Productos.php";
//window.open("Producto.php");
window.close("perfil.php");
}
  </script>
</head>

<body>

<div style="margin-top:50px;" class="container_12"> 

<div style="height:550px;margin:25px;" class='grid_2' ></div>

<div id="MARCO" class='grid_7'> 
<center><h1>Cambio de clave:</h1></center>

<form action="scriptactualizacionpassword.php" name = 'formulario' method="GET"/>
<table WIDTH=500>
<tr height=38>
<td><center>Nombre:</center></td>
<td><center><input style="width:250px;ALIGN=RIGHT;" type="text" readonly name = "txt_codigoMateriales" value="<?php echo $nombres ; ?>"> <br></center></td>
</tr>
<tr  height=38>
<td><center>Apellido:</center></td>
<td><center><input style="width: 250px;ALIGN=RIGHT;" type="text" readonly name = "txt_codigoMateriales" value="<?php echo $apellido ; ?>"> <br></center></td>
</tr>
<tr  height=38>
<td><center>Usuario:</center></td>
<td><center><input style="width: 250px;ALIGN=RIGHT;" type="text" readonly name = "txt_codigoMateriales" value="<?php echo $nombreu ; ?>"> <br></center></td>
</tr>
<tr  height=38>
<td><center>Password:</center></td>
<td><center><input style="width: 250px;ALIGN=RIGHT;" type="password" onchange="validar();" id = "txt_password" name = "txt_password" value=""> <br></center></td>
</tr>
<tr  height=38>
<td><center>Repita Password:</center></td>
<td><center><input style="width: 250px;ALIGN=RIGHT;" type="password" onchange="validar();" id = "txt_repassword" name = "txt_repassword" value=""> <br></center></td>
</tr>
<tr  height=38>
<td colspan="2"><center><input  type="submit" id = "ingresar" name="ingresar" value="Modificar"> <br></center></td>
</tr>
</table>
</form>

</div>
<div onClick="reback();" id="BACK" >
</div>
</body>
</html>