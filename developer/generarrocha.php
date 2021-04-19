<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
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


<div id="popup"> 
<form id="form_filtro_proyecto" method="GET" action="proyectos.php"  target="_blank"/> 
      
  <h5>Cuadro Rocha</h5>
  <table >
  <tr>
  <td>Rango-</td>
  <td> <input type="text" autocomplete="off" id="rangonegativo" name="rangonegativo" value='3' /> </td>
  </tr>
  <tr>
  <td>Rango+ </td>
  
  <td> <input  type="text" autocomplete="off" id="rangopositivo" name="rangopositivo" value='14' /> </td>
  </tr>
  <tr>
  <td>Rocha </td>
  
  <td><input  type="text"  onClick="completar()" onFocus="completar()" id="buscarcod" name="buscarcod" value='' /></td>
  </tr>
  <tr>
  <td>Cliente </td>
  <td><input type="text" onClick="completar()" onFocus="completar()" autocomplete="off" id="buscarcli" name="buscarcli" value='' /></td>
  </tr>
  <tr>
 <?php if ($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN" )
{ ?>
  <?php } else { ?>
  <td>Dir. Proyecto </td>
  <td><input type="text"  onClick="completar()" onFocus="completar()" id="buscareje" name="buscareje" value='' /></td>
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

  <td style=" font-size:14px;">
  <select onchange="" id = "estado" name = "estado">
    <option></option>
    <option <?php echo $PROCESOO1;?> >EN PROCESO</option>
    <option <?php echo $OK1;?>>OK</option>
    <option <?php echo $NULO1;?>>NULO</option>
    <option <?php echo $ACTA1;?>>ACTA</option>
  </select>
  </td>
    <td>Liviano <input type="checkbox"  id="light" name="light" /></td>
      </tr>
      <tr>
       <td></td> 
  <td><input type="button" name = "buscar" id='buscar_filtro_rocha' value="Buscar"/> </td>
  
  </tr>
  </table>	

 </form> 
 </div>