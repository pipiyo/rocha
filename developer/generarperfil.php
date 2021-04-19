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

<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.Rut.js" type="text/javascript"></script>
  <script src="js/jquery.Rut.min.js" type="text/javascript"></script>

<form action="scriptactualizacionpassword.php" name = 'formulario' method="GET"/>
<div id="popup">
<h5>Cambio de clave</h5>
<table>
<tr>
<td>Nombre:</td>
<td><input  type="text" readonly name = "txt_codigoMateriales" value="<?php echo $nombres ; ?>"></td>
</tr>
<tr>
<td>Apellido:</td>
<td><input  type="text" readonly name = "txt_codigoMateriales" value="<?php echo $apellido ; ?>"></td>
</tr>
<tr>
<td>Usuario:</td>
<td><input type="text" readonly name = "txt_codigoMateriales" value="<?php echo $nombreu ; ?>"> <br></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" onchange="validar();" id = "txt_password" name = "txt_password" value=""> <br></td>
</tr>
<tr>
<td>Repita Password:</td>
<td><input type="password" onchange="validar();" id = "txt_repassword" name = "txt_repassword" value=""> <br></td>
</tr>
<tr>
<td colspan="2"><input  type="submit" id = "ingresar" name="ingresar" value="Modificar"> <br></td>
</tr>
</table>
</div>
</form>

