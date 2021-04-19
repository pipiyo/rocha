<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
	
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location: index.php"); 
} else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["ultimoAcceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 999999) { 
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

$CODIGO_PROVEEDOR = $_GET['CODIGO_PROVEEDOR'];
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM proveedor WHERE CODIGO_PROVEEDOR ='".$CODIGO_PROVEEDOR."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
    $CODIGO_PROVEEDOR1 = $row["CODIGO_PROVEEDOR"];
	$RUT_PROVEEDOR = $row["RUT_PROVEEDOR"];
	$NOMBRE_FANTASIA = $row["NOMBRE_FANTASIA"];
	$RAZON_SOCIAL = $row["RAZON_SOCIAL"];
	$GIRO = $row["GIRO"];
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
	$CATEGORIA = $row["CATEGORIA"];
	$FAMILIA = $row["FAMILIA"];
	$ENTREGA = $row["ENTREGA"];
	$ACTIVO = $row["ACTIVO"];
  }
  mysql_free_result($result);
  mysql_close($conn);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Descripcion Proveedor V1.1.0</title>
  
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/mantenedores.css" /
  >
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" >
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script type="text/javascript" src="js/tinybox.js"></script>
  <script src='js/Bloqueo.php'></script>
  <script src='js/breadcrumbs.php'></script>

  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript>
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
</script>
</head>

<body>
<div id='bread'><div id="menu1"></div></div>

<h1>Descripción Proveedor</h1>

<form  id = 'formulario22' method="GET" action="scriptActualizarProveedor.php"/>
<table  id= "tabla_ingreso_cli">

<tr>
  <td class="td_rosa">Rut:</td>
  <td><input placeholder="1.111.111-1" class="txt" type="text"    id= "txt_rut" name = "txt_rut" value="<?php echo ($RUT_PROVEEDOR); ?>" />
    </td>

  <td class="td_rosa">Nombre:</td>
  <td><input placeholder="Ducasse Industrial" class="txt" type="text"  id= "txt_nombre" name = "txt_nombre" value="<?php echo ($NOMBRE_FANTASIA); ?>" />
    </td>
</tr>
<tr>
  <td class="td_rosa">Razon social:</td>
  <td><input placeholder="Ducasse Industrial" class="txt"  type="text"  name = "txt_razon" value="<?php echo ($RAZON_SOCIAL);?>" />
    </td>

  <td class="td_rosa">Giro:</td>
  <td><input placeholder="Import. y export. y comercializacion de muebles" class="txt"  type="text"  name = "txt_giro" value="<?php echo ($GIRO);?>" />
    </td>
</tr>
<tr>
  <td class="td_rosa">Direccion:</td>
  <td><input placeholder="Santa Rosa 1111" class="txt" type="text"  id = "txt_direccion" name = "txt_direccion" value="<?php echo ($DIRECCION); ?>" />
    </td>

  <td class="td_rosa">comuna:</td>
  <td><input placeholder="San Miguel" class="txt" type="text"  id = "txt_comuna" name = "txt_comuna" value="<?php echo ($COMUNA);?>" />
    </td>
</tr>
<tr>
  <td class="td_rosa">telefono 1:</td>
  <td><input placeholder="(2) X XXX XXX" class="txt" type="text"  id = "txt_telefono1" name = "txt_telefono1" value="<?php echo ($TELEFONO1); ?>" />
    </td>

  <td class="td_rosa">telefono 2:</td>
  <td><input placeholder="(2) X XXX XXX" class="txt" type="text"  id = "txt_telefono2" name = "txt_telefono2" value="<?php echo ($TELEFONO2);?>" />
    </td>
</tr>
<tr>
  <td class="td_rosa">Web:</td>
  <td><input placeholder="www.MueblesyDiseño.cl" class="txt"  type="text"  name = "txt_web" value="<?php echo ($WEB);?>" />
    </td>

  <td class="td_rosa">Contacto 1:</td>
  <td><input placeholder="Luiz Jara" class="txt"  type="text"  name = "txt_contacto1" value="<?php echo ($CONTACTO1); ?>" />
    </td>
</tr>
<tr>
  <td class="td_rosa">Contacto 2:</td>
  <td><input placeholder="Luiz Jara" class="txt" type="text"  id = "txt_contacto2" name = "txt_contacto2" value="<?php echo ($CONTACTO2);?>" />
    </td>

  <td class="td_rosa">Celular 1:</td>
  <td><input  placeholder="(8) XX XXX XXX" class="txt" type="text"  id = "txt_celular1" name = "txt_celular1" value="<?php echo ($CELULAR_CONTACTO1); ?>" />
    </td>
</tr>
<tr>
  <td class="td_rosa">Celular 2:</td>
  <td><input  placeholder="(8) XX XXX XXX" class="txt" type="text"  id = "txt_celular2" name = "txt_celular2" value="<?php echo ($CELULAR_CONTACTO2);?>" />
    </td>

  <td class="td_rosa">Forma de pago:</td>
  <td><input  placeholder="50%CO 40%CE 10%30" class="txt" type="text"  id = "txt_forma" name = "txt_forma" value="<?php echo ($FORMA_PAGO); ?>" />
    </td>
</tr>
<tr>
  <td class="td_rosa">Categoria:</td>
  <td><input placeholder="Insumos" class="txt" type="text"  id = "txt_categoria" name = "txt_categoria" value="<?php echo ($CATEGORIA); ?>" />
    </td>
    
  <td class="td_rosa">Familia:</td>
  <td><input  placeholder="Tableros" class="txt" type="text"  id = "txt_familia" name = "txt_familia" value="<?php echo ($FAMILIA); ?>" />
    </td>
</tr>
<tr>
  <td class="td_rosa">Entrega:</td>
  <td><input placeholder="48" class="txt"  type="text" id = "txt_entrega" name = "txt_entrega" value="<?php echo ($ENTREGA); ?>" />
    </td>
      <td class="td_rosa">Activo:</td>
  <td><input class="txt" type="text"  id = "txt_activo" name = "txt_activo" value="<?php echo ($ACTIVO);?>"></td>
</tr>
</table>
<input class="txtEspecial"  id="txt_ing" name="txt_ing" type ="hidden" value="<?php echo date("Y-m-d")?>">
<input  class="BotonSeleste der" type="button"   onclick = "enviar1();" id="modificar" name="modificar" value="Modificar" />

</form>

<form  id = 'formulario11' method="GET" action="scriptEliminarProveedor.php"/>

<?php
if($ACTIVO == "NO"){
?>
  <input class="BotonVerde izq" type="button" onClick = "enviar3();" id="Avilitar"  name="Avilitar" value="Avilitar">
<?php
}else{
?>
  <input class="BotonRojo izq" type="button" onClick = "enviar2();" id="Deshabilitar"  name="Deshabilitar" value="Deshabilitar">
<?php
}
?>
  <input   type="hidden"   id= "txt_rut" name = "txt_rut" value="<?php echo ($RUT_PROVEEDOR); ?>" >
</form>
</body>
</html>
