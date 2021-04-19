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
mysql_free_result($result1);
$equipo = array();
$query_registro = "select equipo.RUT_SUB  from empleado, equipo where empleado.RUT = equipo.RUT_LIDER and equipo.RUT_LIDER = '".$rut_usuario."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
  	$RUT_SUB = $row["RUT_SUB"];

  	$query_registro1 = "select * from empleado where rut = '".$RUT_SUB."'";

	$result11 = mysql_query($query_registro1, $conn) or die(mysql_error());
 	while($row = mysql_fetch_array($result11))
	{
  	$nombres1= $row["NOMBRES"];
	$apellido1 = $row["APELLIDO_PATERNO"];
	$apellido_m1 = $row["APELLIDO_MATERNO"];
	$VENDEDORNOM = $nombres1 ." ".$apellido1." ".$apellido_m1; 
  	array_push($equipo,$VENDEDORNOM);
  	}
  }
mysql_free_result($result1);


$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO ='';
$INEN = "";
$VENDEDOR ='';
$DESDE = "";
$HASTA = "";
$ROCHAROCHA = "";






$ESTADOV = $_GET["ESTADO"];



$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_INICIO';
if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{    


if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];


$DESDE = $_GET["txt_desde"];
$HASTA = $_GET["txt_hasta"];



}




if ($_GET["buscarfe"] == "INICIO" ) 
{ 
$ordenfecha = 'FECHA_INICIO';
$buscaf = "INICIO";
$INEN = "INICIO";
}
else 
{ 
$ordenfecha = 'FECHA_ENTREGA';
$buscaf = "ENTREGA";
$INEN = "ENTREGA";
}
if (isset($_GET["buscar_vendedor"])) 
{ 
$VENDEDOR = $_GET["buscar_vendedor"];
}
}  

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  
  <title>Cliente V2.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />

  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

  <!--Calendario -->
  <link rel="stylesheet" href="style/calendario.css" />
  <script src="js/calendario.js"></script>

  <!--Autocompletar -->
  <script src="js/autocompletar.js"></script>


  <!-- Tabla -->
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
  <script src='js/encabezado-fixed.js'></script>


  <!-- breadcrumbs -->
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>
  $(function(){
    $('.tabla-fi').tablesorter(); 
  });
  </script>
  
  
</head>

<body>
<div  id='header-radicado-rocha'> 	
<div id='bread'><div id="menu1"></div></div>

<form action="" name= 'formulario' method="get">

<div id='contenedor-ins' class="formulario-informes">

<table  id = "formulario">
  <h1>Informe FI</h1>
<tr>
	<td><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" value="<?php echo $DESDE;?>" /></td>
  	<td><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="<?php echo $HASTA;?>" /></td>

<?php 
	$INICIO1 = "";
	$ENTREGA1 = "";
	if($INEN == "INICIO")
	{
		$INICIO1 = 'selected';
	}	
	else if($INEN == "ENTREGA")
	{
		$ENTREGA1 = 'selected';
	}
?>

  <td>
  <select  class="textbox" onchange="" id = "buscarfe" name = "buscarfe">
    <option value="">Fecha</option>
    <option <?php echo $INICIO1;?> >INICIO</option>
    <option <?php echo $ENTREGA1;?> >ENTREGA</option>
  </select>
  </td>

<tr>
	<td><input placeholder="Rocha" class="textbox" value="<?php echo $BUSCAR_CODIGO;?>"  ></td>

<?php 
	$TODOS1 = "";
	$PROCESO1 = "";
	$NULO1 = "";
	$OK1 = "";
	if($ESTADOV == "TODOS")
	{
		$TODOS1 = 'selected';
	}
	else if($ESTADOV == "EN PROCESO")
	{
		$PROCESO1 = 'selected';
	}
	else if($ESTADOV == "NULO")
	{
		$NULO1 = 'selected';
	}
	else if($ESTADOV == "OK")
	{
		$OK1 = 'selected';
	}
?>

 
  <td>
  	<select class="textbox" onchange="" id = "ESTADO" name = "ESTADO">
    	<option value="">Estado</option>
    	<option <?php echo $TODOS1;?> >TODOS</option>
    	<option <?php echo $PROCESO1;?>>EN PROCESO</option>
    	<option <?php echo $NULO1;?>>NULO</option>
    	<option <?php echo $OK1;?>>OK</option>
  	</select>
  </td>

<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php } else { ?>
	<td>

		<select name="buscar_vendedor" id="buscar_vendedor" type ="text" class="textbox">
			<option value=""> Empleado </option>
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
 			} mysql_free_result($result1);} 
 			?> 
 			<option> </option>	
		</select>
	</td>


	<td> <input type="submit" class="boton" id="buscar" name = "buscar" value = "Buscar" /> </td>

</tr>
</table>
</div>
</div>

</form>
<br />
  


<table class="tabla-fi fixed">
<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);
mysql_select_db($database_conn, $conn);




$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA,servicio.FI, servicio.DIAS,servicio.FECHA_REALIZACION, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO  from  servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'fi' ";	

if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{

	$ejutiv="";
foreach ($equipo as $valor)
{
    $ejutiv .= ",'".$valor."'";
}

$query_registro .= " AND proyecto.ejecutivo in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") ";	

}else if($VENDEDOR != ''){


$query_registro .= "  AND proyecto.ejecutivo = '".$VENDEDOR."' ";

}

if($BUSCAR_CODIGO != '') 
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";
}	

if($ESTADOV != 'TODOS')
{
$query_registro .= " and servicio.ESTADO = '".$ESTADOV."' ";
}

if($ordenfecha == 'FECHA_ENTREGA')
{
$query_registro .= " and  servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}else if($ordenfecha == 'FECHA_INICIO')
{
$query_registro .= " and  servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}


$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FI = $row["FI"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$PROCESO = $row["PROCESO"];
	$EJECUTOR = $row["EJECUTOR"];
	$PREDECESOR = $row["PREDECESOR"];
	$RECLAMOS = $row["RECLAMOS"];
	$DIAS = $row["DIAS"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];


	if($numero == 0)
	{	
  //  echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
	echo"<thead><tr class='cheader'>
	     <th>Rocha</th> 
		 <th >N°</th>
	     <th >Cliente</th>
		 <th >Descripcion</th>
		 <th >Observaciones</th>
	     <th >Fecha I</th>
	  	 <th >Fecha E</th>
		 <th >Fecha C</th>
		 <th >Dias</th>
		 <th >FI</th>
		 <th >Reclamos</th>
         <th>Estado</th></tr></thead>
		 ";
    }
	
	
	if($FECHA_REALIZACION  == date("Y-m-d"))
	{
    echo  "<tr><td id='hoy'> <a  id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td id='hoy'><a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a></td>";
	echo  "<td id='hoy'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td id='hoy'>".($DESCRIPCION)."</td>";
	echo  "<td id='hoy'>".($OBSERVACIONES)."</td>";
	echo  "<td id='hoy' align='center'>".substr($FECHA_INICIO,0,11)."</td>";
    echo  "<td id='hoy' align='center'>".substr($FECHA_PRIMERA_ENTREGA,0,11)."</td>";	
	if($ESTADO == "OK")
	{
		echo  "<td id='azul' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else
	{
		if($FECHA_ENTREGA > $fecha7)
		{
			echo  "<td id='verde' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
			echo  "<td id='rojo' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
			echo  "<td id='amarillo' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";		
		}
	}
	echo  "<td id='hoy' align='center'>".($DIAS)."</td>";
	echo  "<td id='hoy' align='center'>".($FI)."</td>";
	echo  "<td id='hoy' align='center'>".($RECLAMOS)."</td>";
	echo  "<td id='hoy'>".$ESTADO."</td></tr>";
	$numero--;
	}
	else
	{
	echo  "<tr><td> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td> <a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a></td>";
	echo  "<td >".($NOMBRE_CLIENTE)."</td>";
	echo  "<td >".($DESCRIPCION)."</td>";
	echo  "<td >".($OBSERVACIONES)."</td>";
	echo  "<td  align='center'>".substr($FECHA_INICIO,0,11)."</td>";
	echo  "<td  align='center'>".substr($FECHA_PRIMERA_ENTREGA,0,11)."</td>";

	if($ESTADO == "OK")
	{
	echo  "<td id='azul' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else
	{
		if($FECHA_ENTREGA > $fecha7)
		{
			echo  "<td id='verde' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
	else if($FECHA_ENTREGA < date('Y-m-d'))
		{
			echo  "<td id='rojo' align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
			echo  "<td id='amarillo' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";		
		}
		}
	echo  "<td align='center' >".($DIAS)."</td>";
	echo  "<td align='center' >".($FI)."</td>";
	echo  "<td align='center' >".($RECLAMOS)."</td>";
	echo  "<td >".$ESTADO."</td></tr>";
	$numero--;
	}

  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>
</html>
