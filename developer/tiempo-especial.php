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

$ESTADOV = "";


$txt_hasta = '2050-01-01';
$txt_desde = '0000-00-00';
$DESDE = $txt_desde;
$HASTA = $txt_hasta;
$COTIZADOR= "";
$DIRECTOR= "";
$EMPRESA= "";
$RADICADO = "";
$COD_PRO = "";
$CLIENTE= "";

if (isset($_GET["buscar"]))
{
	$ESTADOV = $_GET["ESTADO"];
if($_GET["txt_desde"]!= "" && $_GET["txt_hasta"] != "")
{
  $DESDE = $_GET["txt_desde"];
  $HASTA = $_GET["txt_hasta"];
  }
	$RADICADO = $_GET["txt_radicado"];
	$COD_PRO = $_GET["txt_cod_producto"];
	$CLIENTE= $_GET["txt_cliente"];

if (isset($_GET["txt_empresa"]))
{
	$EMPRESA= $_GET["txt_empresa"];
}

if(isset($_GET["txt_director"]))
{
	$DIRECTOR= $_GET["txt_director"];

}

if(isset($_GET["txt_cotizador"]))
{
	$COTIZADOR= $_GET["txt_cotizador"];
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




$VALOR1=0;
$COSTO1=0;
$tot1=0;
$ID1=0;
$color=1;
$prefix ="";

?>
<!DOCTYPE html>
<html xml:lang="en">

<head>
  <title>Listado tiempo especial V1.0.0</title>
  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">

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
     $('.tabla-tiempo').tablesorter(); 
  });
  </script>
</head>

<body>
<div  id='header-radicado-rocha'> 

<div id='bread'><div id="menu1"></div></div>
<div id='contenedor-ins' class="formulario-informes">
<h1>Informe Tiempo Especial </h1>
<form action="" method="GET" name="formulario">
<table>

<tr>

<td ><input placeholder="Desde" class="textbox" type="text" id = 'txt_desde' name = "txt_desde"  value=""></td>

<td ><input placeholder="Hasta" class="textbox" type="text" id = 'txt_hasta' name = "txt_hasta"  value=""></td>

<td ><input  placeholder="Cliente" class="textbox" type="text" id = 'txt_cliente' name = "txt_cliente"  value=""></td>


<td><select  placeholder="Desde" class="textbox" type="text" id = 'txt_director' name = "txt_director" ><option value=""> Director </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' order by empleado.nombres ";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select>
</td>

<td ><select class="textbox" type="text" id = 'txt_cotizador' name = "txt_cotizador"  ><option value=""> Cotizador </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'TEC'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select>

</td>

<td rowspan="2" align="center"><a href='ingreso-tiempo-especial.php' >
<img src="Imagenes/nuevo.png" style = "border:0px;" alt="Exportar a Excel"></a></td>



</tr>

<td ><input placeholder="Rocha" class="textbox" type="text" id = 'txt_radicado' name = "txt_radicado"  value=""></td>

<td ><input placeholder="Producto" class="textbox" type="text" id = 'txt_cod_producto' name = "txt_cod_producto"  value=""></td>

<td >
<select   class="textbox" name = "txt_empresa" type ="text" class="selecion_multiplePS" >
<option value="">Empresa </option>
  <option>Los Conquistadores</option>
      <option>La Dehesa</option>
      <option>Beatriz Gonzalez</option>
      <option>Muebles y Diseños </option>
      <option>Sillas y Sillas</option>
</select>
</td>


<?php 
$TODOS1 = "";
$PROCESO1 = "";
$NULO1 = "";
$OK1 = "";
if($ESTADOV == "PENDIENTE")
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





<td ><select class="textbox" type="text" id = 'ESTADO' name = "ESTADO"  >    <option value="">Estado</option>
<option <?php echo $PROCESO1;?>>EN PROCESO</option>
    <option <?php echo $TODOS1;?> >PENDIENTE</option>
    
    <option <?php echo $NULO1;?>>NULO</option>
    <option <?php echo $OK1;?>>OK</option>
    </select>
</td>


<td ><input class="boton" type="submit" id = 'buscar' name = "buscar"  value="Buscar"></td>

</tr>

</table>

</div>
</div>
</form>

<table class="tabla-tiempo fixed">
<thead>
<tr>
<th>ID</th>
<th> Rocha</th>
<th>Proyecto</th>
<th >Cliente</th>
<th>Motivo</th>
<th>Fecha Registro Sistema</th>
<th>Fecha Probable</th>
<th>Fecha Instalación</th>
<th>Tiempo producción Requerido</th>
<th>Fecha Entrega Solicitud</th>
<th>Fecha Recibo Información</th>
<th>Tiempo Producción</th>
<th>Desfase Días</th>
<th>Director de Proyecto</th>
<th>Empresa</th>
<th>Cotizador</th>
<th  id="thtotal">Estado</th>
</tr>
</thead><tbody>

<?php

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);





$query_registro = "select *  from solicitud_tiempo_especial WHERE  FECHA_INSTALACION BETWEEN '".$DESDE."'  AND '".$HASTA."'";


if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{

  $ejutiv="";
foreach ($equipo as $valor)
{
    $ejutiv .= ",'".$valor."'";
}

$query_registro .= " AND DIRECTOR_PROYECTO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") ";  

}else if($DIRECTOR != ''){


$query_registro .= "  DIRECTOR_PROYECTO = '".($DIRECTOR)."' ";

}

if($RADICADO != '') 
{ 
$query_registro .= " and CODIGO_PROYECTO = '".$RADICADO."'  ";
} 

if($ESTADOV  != "")
{
  $query_registro .= " and ESTADO = '".$ESTADOV."' ";
}
else
{
  $query_registro .= " and ESTADO NOT IN ('OK','NULO') ";
}

if($COD_PRO != "")
{
  $query_registro .= " and PROYECTO = '".$COD_PRO."' ";
}

if($CLIENTE != '')
{
$query_registro .= " and CLIENTE = '".$CLIENTE."' ";
}

if($EMPRESA != '')
{
$query_registro .= " and EMPRESA = '".$EMPRESA."' ";
}

if($COTIZADOR != '')
{
$query_registro .= " and ADMINISTRATIVO = '".$COTIZADOR."'";
}




$query_registro .= " order by FECHA_INSTALACION ASC";





$result2 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
  {
	
	
	
		$ID = $row["ID"];					 
		$CODIGO_RADICADO = $row["CODIGO_PROYECTO"];						 	 	
		$CLIENTE = $row["CLIENTE"];						 	 	
		$RUT_CLIENTE = $row["RUT"];						 	 	
		$PROYECTO = $row["PROYECTO"];						 	 						 	 	
		$OBSERVACIONES = $row["OBSERVACION"];								 	 	
		$FECHA_CONFIRMACION = $row["FECHA_INSTALACION"];					 	 	
		$FECHA_INGRESO = $row["FECHA_INGRESO"];						 	 	
		$FECHA_ENTREGA = $row["FECHA_PROBABLE"];						 	 						 	 	
		$COTIZADOR = $row["ADMINISTRATIVO"];						 	 	
		$DIRECTOR_PROYECTO = $row["DIRECTOR_PROYECTO"];						 	 							 	 	
	    $DIAS = $row["DIAS_PRODUCCION"];						 	 	
		$EMPRESA = $row["EMPRESA"];					 	 	
		$ESTADO = $row["ESTADO"];
		$FECHA_RECIBO = $row["FECHA_RECIBO"];						 	 	
		$FECHA_SOLICITUD = $row["FECHA_SOLICITUD"];					 	 	
		$DIAS_VALIDEZ = $row["DIAS_VALIDEZ"]; 
	
	$iter = $DIAS - $DIAS_VALIDEZ;
	echo "<tr><td><a href='descripcion-tiempo-especial.php?CODIGO_TI=".$ID."''>". $ID."</a></td>";
	echo "<td>". $CODIGO_RADICADO."</td>";	
	echo "<td>". $PROYECTO."</td>";
	echo "<td>".$CLIENTE."</td>";
	echo "<td>".$OBSERVACIONES."</td>";
	echo "<td >".$FECHA_INGRESO."</td>";
  echo "<td >".$FECHA_ENTREGA."</td>";
  if($ESTADO == "OK")
	{
		echo "<td id='azul'>".$FECHA_CONFIRMACION."</td>";
	}
	else
	{	
		if($FECHA_CONFIRMACION > $fecha7)
		{
			echo "<td id='verde'>".$FECHA_CONFIRMACION."</td>";	
		}
		else if($FECHA_CONFIRMACION < date('Y-m-d'))
		{
			echo "<td id='rojo'>".$FECHA_CONFIRMACION."</td>";			
		}
		else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
		{
			echo "<td id='amarillo'>".$FECHA_CONFIRMACION."</td>";	
		}	
	}
	echo "<td>".$DIAS."</td>";
	echo "<td>".$FECHA_SOLICITUD."</td>";
	echo "<td>".$FECHA_RECIBO."</td>";
	echo "<td>".$DIAS_VALIDEZ ."</td>";
	echo "<td>".$iter ."</td>";
	echo "<td>".($DIRECTOR_PROYECTO)."</td>";
  echo "<td>".$EMPRESA."</td>";
  echo "<td>".$COTIZADOR."</td>";		
  echo "<td id='td_borde_derecho'>".$ESTADO."</td></tr>";
  }
  mysql_free_result($result2);

?>
</tbody>
</table>




<div  style='width:700px;margin-top:20px;'>
<table class="tabla-tiempo">
<tr>
<td valign="top">
<table width='700'  cellspacing="0" class="tablas_Producto_Especial3a">
<th height="10" colspan="2">Director de Proyecto</th>
<th>Cantidad de Cotizaciones</th>
</tr>

<?php 
$VALOR1=0;
$COSTO1=0;
$tot1=0;
$ID1=0;
$query_registro2 = "SELECT count(ID) AS ID,DIRECTOR_PROYECTO  FROM solicitud_tiempo_especial GROUP BY DIRECTOR_PROYECTO";
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
  {
	
	$ID = $row["ID"];						 	 	 	 	
	$DIRECTOR_PROYECTO = $row["DIRECTOR_PROYECTO"];
	$ID1+=$row['ID'];


	echo "<tr><td colspan='2'>".$DIRECTOR_PROYECTO."</td>";
	echo "<td id='td_borde_derecho'>".$ID."</td></tr>";
	
  }
  mysql_free_result($result2);

?>
<tr>
<td align="center" colspan="2"><b>total</b></td>
<td align="center" id='td_borde_derecho'><b><?php echo  number_format($ID1, 0, ",", ".");  ?></b></td>

</tr>
</table>
</div>


</body>
</html>