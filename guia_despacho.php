<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
ini_set('max_execution_time', 500);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.rut,empleado.nombres, empleado.apellido_paterno , empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$apellido_m = $row["apellido_materno"];
	$rut_usuario= $row["rut"];
	$numero++;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title> Guia Despacho V1.0.0</title>
<meta name="description" content="mantenedor linea" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<link rel="shortcut icon" href="Imagenes/rocha.png">
<link rel="stylesheet" type="text/css" href="Style/style_mantenedores.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
<script type="text/javascript" src="js/tinybox.js"></script>
<script src='js/Bloqueo.php'></script>
<script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>

<body>
<div id='bread'><div id="menu1"></div></div> 
<form action="" method="GET">
<div class='contenedor_guia'>
<h1 class='h-linea'> Guia Despacho</h1>

<input type='text' name='guia' class='textbox form' placeholder="Guia">

<select required name="nombre" class='textbox form' >
<option value="" disabled selected>Empresa</option>
<option>Multioficina</option>
<option>Muebles y diseños</option>
<option>Sillas y sillas</option>
</select>

<select  name="estado" class='textbox form' >
<option>Estado</option>
<option>Pendiente</option>
<option>OK</option>
<option>Nulo</option>
</select>
<input type='submit' value='buscar' name='buscarl' class='textbox_boton form1'>
</div>
</form>	


<!-- TABLA LINEA -->
<div class='section'>
<table class='tabla-guia' rules='all' border='1'>
<?php
$EMPRESA = "";


if (isset($_GET["buscarl"]))
{
$EMPRESA = $_GET["nombre"];
$ESTADO = $_GET["estado"];
$GUIA = $_GET["guia"];

switch ($EMPRESA) {
    case "Multioficina":
        $guia_despacho = "guia_despacho_mu";
        break;
    case "Muebles y diseños":
        $guia_despacho = "guia_despacho_md";
        break;
    case "Sillas y sillas":
        $guia_despacho = "guia_despacho_si";
        break;
}

$query_registro = "select * FROM ".$guia_despacho."";

if($GUIA != "")
{
$query_registro .= " where CODIGO_GUIA = '".$GUIA."'";	
}
if($ESTADO != "Estado")
{
if($GUIA != "")
{	
$query_registro .= " and ESTADO = '".$ESTADO."'";	
}
else
{
$query_registro .= " where ESTADO = '".$ESTADO."'";		
}
$query_registro .= " order by CODIGO_GUIA";   
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fila = 0;
 while($row = mysql_fetch_array($result))
  {  
  $CODIGO_GUIA = $row["CODIGO_GUIA"];
	$ESTADO = $row["ESTADO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
  $FECHA_VALIJA = $row["FECHA_VALIJA"];

    $sql1 = "SELECT * FROM SERVICIO WHERE CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
	$CODIGO_ROCHA = $row["CODIGO_PROYECTO"];
  $FECHA_INICIO = $row["FECHA_INICIO"];
  $FECHA_ENTREGA = $row["FECHA_ENTREGA"];
    }
	mysql_free_result($result2);


	if($numero == 0)
	{	
	echo"<tr>
	     <th>N°</th> 
	     <th>Rocha</th>
		   <th>Servicio</th> 
       <th>Fecha I</th> 
       <th>Fecha E</th> 
		   <th>Valija</th>
		   <th>Estado</th>
	     </tr>
		 ";
 	$numero = 20;
    }

if($fila == 0)
{
  $color_fila = 'uno';
}
else
{
  $color_fila = 'dos';
  $fila = -1;
}
echo  "<tr class=".$color_fila."><td align='center'><a 
        href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_ROCHA ). ">" .$CODIGO_SERVICIO . "</a></td>";
echo  "<td align='center'>".$CODIGO_ROCHA."</td>";
echo  "<td align='center'>".$CODIGO_SERVICIO."</td>";
echo  "<td align='center'>".$FECHA_INICIO."</td>";
echo  "<td align='center'>".$FECHA_ENTREGA."</td>";
echo  "<td align='center'>".$FECHA_VALIJA."</td>";
echo  "<td align='center'>".$ESTADO."</td></tr>";
	$fila++;
	$numero--;
  }
}
else
{
	
}

?>
</table>
<div>






</body>
</html>
