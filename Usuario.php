<?php require_once('Conexion/Conexion.php');?>
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

$RUT_EMPLEADO = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>UsuarioV1.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  
  <link rel="stylesheet" type="text/css" href="Style/style_Empleado.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
   <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
  
  <script language = javascript> 
  
  $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
 </script>
 
</head>

<body>
  <div id='bread'><div id="menu1"></div></div>
<div id="main">	 
<div  id="site_content">	
	
	  <div  id="header">
        <div id="site_heading"><center>
          <h1>Usuario</h1>
	    </center></div><!--close site_heading-->
      </div><!--close header-->	  			   
  	  
<div id="content">
  <form  method="GET"/>      
  <center>
  <table>
  <tr>
  
  <td height="50px">
  
  <td><h2>Rut: </h2></td>
  <td><input type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /> </td>
  <td width="93px">
  <td><h2>Nombre: </h2></td>
  <td><input type="text" autocomplete="off" id="buscar_nombre" name="buscar_nombre" /> </td>
  <td><input type="submit" name = "buscar" id='buscar' value="Buscar"/> </td>
  </td>

	</td>

  </tr>
  </table>
  </center>	
 </form>
<div class="datagrid1">
<table id="title" border="0" cellspacing=1 cellpadding=2 style="font-size: 8pt">
<col width="300" />
<col width="290" />
<col width="290" />
<col width="305" />
<tr>
<th><center>Rut</center></th>
<th><center>Nombre</center></th>
<th><center>Usuario</center></th>
<th><center>Activo</center></th>
</tr>
<?php
$BUSCAR_CODIGO = "";
$BUSCAR_DESCRIPCION = "";
$BUSCAR_NOMBRE = "";
//listado de materiales
////////////////////////////////
if (isset($_GET["buscar"])) 
{
$RUT_EMPLEADO= "";
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_NOMBRE = $_GET['buscar_nombre'];

if($BUSCAR_CODIGO != "" && $BUSCAR_NOMBRE != "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT usuario.ACTIVO, usuario.NOMBRE_USUARIO, usuario.PASS, empleado.RUT,empleado.NOMBRES, 
empleado.APELLIDO_MATERNO, empleado.APELLIDO_PATERNO FROM empleado,usuario WHERE empleado.RUT = usuario.RUT and empleado.RUT = '".$BUSCAR_CODIGO."'";
}
if($BUSCAR_CODIGO != "" && $BUSCAR_NOMBRE == "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT usuario.ACTIVO, usuario.NOMBRE_USUARIO, usuario.PASS, empleado.RUT,empleado.NOMBRES, 
empleado.APELLIDO_MATERNO, empleado.APELLIDO_PATERNO FROM empleado,usuario WHERE empleado.RUT = usuario.RUT and empleado.RUT = '".$BUSCAR_CODIGO."'";
	}
if($BUSCAR_CODIGO == "" && $BUSCAR_NOMBRE != "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT  usuario.ACTIVO, usuario.NOMBRE_USUARIO, usuario.PASS, empleado.RUT,empleado.NOMBRES, 
empleado.APELLIDO_MATERNO, empleado.APELLIDO_PATERNO,concat(NOMBRES,' ',APELLIDO_PATERNO,' ',APELLIDO_MATERNO) 
AS nombres FROM empleado, usuario WHERE empleado.RUT = usuario.RUT HAVING nombres like '%".($BUSCAR_NOMBRE)."%' ";
	}
}
if($BUSCAR_CODIGO == ""  && $BUSCAR_NOMBRE == "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT usuario.ACTIVO, usuario.NOMBRE_USUARIO, usuario.PASS, empleado.RUT,empleado.NOMBRES, empleado.APELLIDO_MATERNO, empleado.APELLIDO_PATERNO FROM  empleado,usuario WHERE empleado.RUT = usuario.RUT";
}

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result))
  {
	$RUT_EMPLEADO = $row["RUT"];
	$NOMBRES_EMPLEADO = $row["NOMBRES"];
	$APELLIDO_PATERNO = $row["APELLIDO_PATERNO"];
	$APELLIDO_MATERNO = $row["APELLIDO_MATERNO"];
	$PASS = $row["PASS"];
	$NOMBRE_USUARIO1 = $row["NOMBRE_USUARIO"];
	$ACTIVO = $row["ACTIVO"];
    echo "<tbody><tr><td><center> <a href=DescripcionEmpleado.php?RUT_EMPLEADO=" .$RUT_EMPLEADO. ">" . 
	    $RUT_EMPLEADO . "</a></center></td>";
    echo "<td id = 'des'><center>" . 
	    ($NOMBRES_EMPLEADO)." ".($APELLIDO_PATERNO). "</center></td>";
     echo "<td><center>" . 
	    ($NOMBRE_USUARIO1) . "</center></td>";
     echo "<td><center>" . 
	    ($ACTIVO).   "</center></td></tr></tbody>"; 	
    $numero++;
  }
  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  
  mysql_free_result($result);
  mysql_close($conn);

?>
</table>
</div>
<table>

</table>
</div>
</div>
</div>


</body>
</html>
