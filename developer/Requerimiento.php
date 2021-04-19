<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

//antes de hacer los cálculos, compruebo que el usuario está logueado 
//utilizamos el mismo script que antes 


$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);

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
?>

<head>

  <link rel="StyleSheet" href="Style/style_rocha.css" type="text/css" media="screen">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  
  <title>Modificar Producto V1.1.0</title>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  


  
<script language = javascript>  
  
function remodificar()
{
//location.href= "Productos.php";
//window.open("Producto.php");
window.close("DescripcionProducto.php");
}

function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}

function enviar()
{
var as= confirm("Realmente deseas Modificar");

if(as)
{
  document.getElementById("formulario11").submit();
}
else
{
  return false;
  //window.location="Materiales.php";
}
}
</script>

</head>

<body id='body_requerimiento'>






<form  id = 'formulario11' method="GET" action="scriptRequerimiento.php"/>

<div id = 'wrap_requerimiento'>

<h1>Requerimiento</h1>
<textarea class='textbox-requerimiento solicitud_requerimiento' name="solicitud_requerimiento" > </textarea>
<select  placeholder="Area" class='textbox-requerimiento solicitud_requerimiento' name="departamento_requerimiento"> 
<option>Area</option>
<option>PRODUCCION</option>
<option>ADQUICICIONES</option>
<option>ABASTECIMIENTO</option>
<option>DESPACHO</option>
<option>INSTALACIONES</option>
<option>COMERCIAL</option>
<option>FINANZAS</option>
<option>RRHH</option>
<option>SISTEMA</option>
<option>DAM</option>
<option>DESARROLLO</option>
<option>SILLAS</option>
<option>GERENCIA</option>
<option>DAM</option>
<option>DAM</option>
<option>MUEBLES ESPECIALES</option>
<option>SERVICIO TECNICO</option>
</select>
<input type="submit" id = 'modificar' class='textbox-requerimiento-boton solicitud_requerimiento' name = 'modificar'   value="Ingresar" />
</div>

<h1 id="h1_requerimiento">Requerimiento en camino</h1>

<table id="tabla_servicio_requerimiento" cellpadding="0" cellspacing="0" width="935">
<col width="60" />
</tr>

<?php
$sql555 = "select * FROM servicio where NOMBRE_SERVICIO ='SISTEMA' AND ESTADO  = 'EN PROCESO'  ORDER BY FECHA_INICIO asc ";
$result555 = mysql_query($sql555, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result555))
  {
	$NOMBRE_SERVICIO1 = $row["NOMBRE_SERVICIO"];
	$CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$FECHA_I1 = $row["FECHA_INICIO"];
	$FECHA_E1 = $row["FECHA_ENTREGA"];
	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	$REALIZADOR1 = $row["REALIZADOR"];
	$SUPERVISOR1 = $row["SUPERVISOR"];
	$OBSERVACION1 = $row["OBSERVACIONES"];
	$DESCRIPCION1 = $row["DESCRIPCION"];
	$CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
	$ESTADO1 = $row["ESTADO"];
	$DIAS1 = $row["DIAS"];
	$PREDECESOR1  = $row["PREDECESOR"];
	$RECLAMOS  = $row["RECLAMOS"];
	
	 if($NOMBRE_SERVICIO1 == "Sistema")
	{
	echo "<tr><td align='center' style='background:#000;color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
	text-decoration:none;' href='#'>" . 
	$NOMBRE_SERVICIO1 . "</a></td>";
	echo "<td style='background:#000;color:#fff;'>N°</td>";	
	echo "<td style='background:#000;color:#fff;'>Descripcion</td>";
	echo "<td style='background:#000;color:#fff;'>Fecha Inicio</td>";	
	echo "<td style='background:#000;color:#fff;'>Fecha Entrega</td>";
	echo "<td style='background:#000;color:#fff;'>Confirmacion</td>";		
	echo "<td style='background:#000;color:#fff;'>Dias</td>";	
	echo "<td style='background:#000;color:#fff;'>Usuario</td>";
	echo "<td style='background:#000;color:#fff;'>Observacion</td>";	
	echo "<td style='background:#000;color:#fff;'>Estado</td></tr>";		
	}
	
	
    echo "<tr><td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><a style='color:#000;
	text-decoration:none;' href='#'>" . 
	    $CODIGO_SERVICIO1 . "</a></td>";
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'>".($DESCRIPCION1)."</td>";
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'>".$FECHA_I1 ."</td>";	
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'>".$FECHA_PRIMERA_ENTREGA ."</td>";	
    echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'>".$FECHA_E1."</td>";	
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'>".$DIAS1."</td>";	
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'>".$REALIZADOR1."</td>";	
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'>".$OBSERVACION1."</td>";	
	echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;border-right:#E4E4E7 1px solid'>".$ESTADO1."</td></tr>";
	
	echo"<tr><td> &nbsp; </td></tr>";
  }
	
?>
</table>








<h1 id="h1_requerimiento">Solicitud</h1>




<table rules="all" id="tabla_registroactividades_descripcionServicio">
<tr>
<th>N°</th>
<th>Observaciones</th>
<th>Departamento</th>
<th>Fecha</th>
<th>Estado</th>
<?php if ( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF")
{ ?>
<th>Aceptar</th>
<th>Eliminar</th>
<?php } ?>
</tr>
<?php


$sql111 = "SELECT * from requerimiento order by CODIGO_REQUERIMIENTO desc Limit 10 ";
$result111 = mysql_query($sql111, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result111))
  {

	$OBSERVACIONES = $row["OBSERVACIONES"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$FECHA = $row["FECHA"];
	$ESTADO = $row["ESTADO"];
	$CODIGO_REQUERIMIENTO= $row["CODIGO_REQUERIMIENTO"];

	echo "<tr><td>".$CODIGO_REQUERIMIENTO."</td>";
	echo "<td>".$OBSERVACIONES."</td>";		
	echo "<td>".$DEPARTAMENTO."</td>";		
	echo "<td>".$FECHA."</td>";	
	echo "<td>".$ESTADO."</td>";	
 if ( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF")
{ 
echo "<td><a href='requerimiento_actualizar.php?CODIGO_REQUERIMIENTO=".$CODIGO_REQUERIMIENTO."&ESTADO=APROBADO'>Aceptar</a></td>";	
echo "<td><a href='requerimiento_actualizar.php?CODIGO_REQUERIMIENTO=".$CODIGO_REQUERIMIENTO."&ESTADO=RECHAZADO'>Eliminar</a></td>";
}
echo '</tr>';
  }
  
   mysql_free_result($result111);

?>
</table>
</form>

  
</body>
</html>
