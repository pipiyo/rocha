<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location: index.php"); 
} else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["ultimoAcceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 10) { 
     //si pasaron 10 minutos o más 
      session_destroy(); // destruyo la sesión 
      echo '<script language = javascript>
alert("Sesion Caducada ")
self.location = "index.php"
</script>'; //envío al usuario a la pag. de autenticación 
      //sino, actualizo la fecha de la sesión 
    }else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
   } 
} 
}
mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$GRP = '';
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

$query = "SELECT * FROM grupo_usuario, usuario, grupo where grupo.ID_GRUPO = grupo_usuario.CODIGO_GRUPO and grupo_usuario.CODIGO_USUARIO = usuario.CODIGO_USUARIO and usuario.CODIGO_USUARIO = '".$CODIGO_USUARIO."'";
$result2 = mysql_query($query, $conn) or die(mysql_error());
$numero = 0;
$GRP = "";
$GRP1 = "";
$GRP2 = "";
$GRP3 = "";
 while($row = mysql_fetch_array($result2))
  {
	if($numero == 0)
	{
	$GRP = $row["INICIALES_GRUPO"];
	}
	if($numero == 1)
	{
	$GRP1 = $row["INICIALES_GRUPO"];
	}
	if($numero == 2)
	{
	$GRP2 = $row["INICIALES_GRUPO"];
	}
	if($numero == 3)
	{
	$GRP3 = $row["INICIALES_GRUPO"];
	}
	$numero++;
  }
mysql_free_result($result2);
$estado = "EN PROCESO";
?>

<form  method="POST" action="radicados.php"  target="_blank"/>        
  <div id="popup">
  <table>
  <tr><h5> Cuadro Radicado</h3></tr>
  <tr>
  <td>Codigo </td>
  
  <td ><input  type="text" autocomplete="off" id="buscarcod" name="buscarcod" value='' /></td>
  </tr>
  <tr>
  <td>Cliente </td>
  <td><input  type="text" onClick="completar()" onFocus="completar()" autocomplete="off" id="buscarcli" name="buscarcli" value='' /></td>
  </tr>
  <tr>
  
 <?php if ($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN" )
{ ?>
  
  <?php } else { ?>
  <td>Dir. Proyecto </td>
  <td><input  type="text" autocomplete="off" id="buscareje" name="buscareje" value='' /></td>
   <?php }  ?>
  </tr>
  <tr>
  

  
  <?php 
$PROCESOO1 = "";
$OK1 = "";
$NULO1 = "";
$ACTA1 = "";
if($estado == "EN PROCESO")
{
	$PROCESOO1 = 'selected';
}
else if($estado == "OK")
{
	$OK1 = 'selected';
}
else if($estado == "NULO")
{
	$NULO1 = 'selected';
}
else if($estado == "ACTA")
{
	$ACTA1 = 'selected';
}
?>

  
 

  <td>
  <select onchange="" id = "estado" name = "estado">
    <option value="TODOS">Estado</option>
    <option>EN PROCESO</option>
    <option>OK</option>
    <option>NULO</option>
    <option>ACTA</option>
  </select>
  </td>
  

  
  
 
  <td><input type="submit" name = "buscar" id='buscar' value="Buscar"/> </td>
   </tr>
  </table>	
    </div>
 </form> 