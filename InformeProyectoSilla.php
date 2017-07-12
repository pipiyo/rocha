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

$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$BUSCAR_COMUNA='';
$TODOS='';
$BUSCAR_CODIGO ='';
$BUSCAR_LIDER ='';
$BUSCAR_COMUNA ='';
$BUSCAR_RECLAMO ='';
$INEN = "";
$DESDE = "";
$HASTA = "";
$CATEGORIA = "";
$PROCESO = "";
$ROCHAROCHA = "";
$CLIENTE ='';
$VENDEDOR ='';
$ESTADOV = $_GET["ESTADO"];
$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_ENTREGA';

if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{    
$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$VENDEDOR = $_GET["buscar_vendedor"];
$PROCESO = $_GET["txt_procesoi"];
$BUSCAR_COMUNA = $_GET["buscar_comuna"];
$CATEGORIA = $_GET["categoria"];
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




}  




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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Informe Sillas V2.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
  <!-- Calendario -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <!-- Calendario -->
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script src='js/encabezado-fixed.js'></script>
  <script language = javascript>
   $(function() 
   {
   $( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
   $( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	
   });     

  $(function(){
                $('#buscar_codigo').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
                   }
                 });
   });
  $(function(){
	$('#buscar_comuna').autocomplete({
	source : 'ajaxComuna.php',
	select : function(event, ui)
	{
	}
	});	
	});
  </script>
  </head>
<body>

<form action="" method="get" name="formulario">
<div id = 'header-radicado-rocha'>	
  <div id='bread'><div id="menu1"></div></div> 
<div id = 'header-sistema'>  
<h1 style="margin:0">Informe Sillas </h1>
<table class="form-sistema">
<tr>
<td ><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" value="<?php echo $DESDE;?>" /></td>
<td ><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="<?php echo $HASTA;?>" /></td>
<td> 
<select class="textbox" onchange="" id = "buscarfe" name = "buscarfe">
 <option value="" selected>Fecha</option>
<option <?php echo $INICIO1;?> >INICIO</option>
<option <?php echo $ENTREGA1;?> >ENTREGA</option>
</select>
</td>
<td ><input placeholder="Rocha" class="textbox"  type="text" id="buscar_codigo" name="buscar_codigo" value="<?php echo $BUSCAR_CODIGO;?>"  ></td>
<td ><select class="textbox" id="ESTADO" name="ESTADO">
<option <?php echo $TODOS1;?> >TODOS</option>
<option <?php echo $PROCESO1;?>>EN PROCESO</option>
<option <?php echo $NULO1;?>>NULO</option>
<option <?php echo $OK1;?>>OK</option>
</select></td>
</tr>
<tr>
<td>
<select name="buscar_vendedor" id="buscar_vendedor" type ="text" class="textbox" >
<option value="">Vendedor</option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
<option> </option>
</select>
</td>

<td>
<select  class="textbox" id="categoria" name="categoria">
<option value="">Categoria</option>
<option>Proyecto</option>
<option>Solicitud</option>
</select>
</td>
<td ><select class="textbox"  id = "txt_procesoi" name="txt_procesoi">
<option value="">Proceso</option>
<option>Revisión de proyecto</option>
<option>Rectificacón de medidas</option>
<option>Instalación</option>
<option>Refaccion</option>
<option>Acta de Recepción</option>
<option>Servicio Técnico</option>
<option></option>
</select></td>	
<td><input  placeholder="Comuna"  class="textbox"  type="text" id="buscar_comuna" name="buscar_comuna" value="<?php echo $BUSCAR_COMUNA;?>"  ></td>
<td> <input type="submit" id="buscar" class='boton' name = "buscar" value = "Buscar" /> </td>
</tr>
<tr>
<td colspan="4"></td>
<td>
<a href="ExcelInformeSillas.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&ESTADO=<?php echo urlencode($ESTADOV);?>&buscarfe=<?php echo urlencode($buscaf);?>&buscar_codigo=<?php echo urlencode($BUSCAR_CODIGO);?>&buscar_vendedor=<?php echo urlencode($BUSCAR_VENDEDOR);?>&categoria=<?php echo urlencode($CATEGORIA);?>&PROCESO=<?php echo urlencode($PROCESO);?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a></td>

</tr>
</table>
</div>
</div>
</form>



<table rules='all' frame='box' class='silla fixed'>
<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),7);
mysql_select_db($database_conn, $conn);

////Comienzo


if($BUSCAR_COMUNA != '') 
{ 
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.CODIGO_COMUNA,servicio.OC,servicio.CANTIDAD,servicio.FECHA_PRIMERA_ENTREGA,servicio.FECHA_REALIZACION, servicio.DIAS, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO  
	from servicio, proyecto, comunas where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Sillas' and  comunas.CODIGO_COMUNA  = servicio.CODIGO_COMUNA  and comunas.NOMBRE_COMUNA = '".$BUSCAR_COMUNA."'  ";
}
else
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.OC,servicio.CODIGO_COMUNA,servicio.CANTIDAD,servicio.FECHA_PRIMERA_ENTREGA,servicio.FECHA_REALIZACION, servicio.DIAS, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO  from  servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Sillas' ";
}

if($BUSCAR_CODIGO != '') 
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";
}	


if($BUSCAR_LIDER != '') 
{ 
$query_registro .= " and servicio.LIDER LIKE '%".$BUSCAR_LIDER."%' ";
}
if($BUSCAR_RECLAMO != '') 
{ 
$query_registro .= " and servicio.RECLAMOS = '".$BUSCAR_RECLAMO."'";
}
if($PROCESO != "")
{
	$query_registro .= " and servicio.PROCESO = '".$PROCESO."' ";
}
if($CATEGORIA != "")
{
	$query_registro .= " and servicio.CATEGORIA = '".$CATEGORIA."' ";
}

if ($ESTADOV == "TODOS") 
{
	$query_registro .= "  and not servicio.ESTADO = '' ";
}
else if ($ESTADOV != "TODOS") {
	$query_registro .= "  and servicio.ESTADO = '".$ESTADOV."' ";
}

if($ordenfecha == 'FECHA_ENTREGA')
{
$query_registro .= " and  servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}else if($ordenfecha == 'FECHA_INICIO')
{
$query_registro .= " and  servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}

echo"<thead><tr class='cheader'>
       <th>Rocha</th>
       <th>N°</th>
       <th>Proceso</th>
       <th>Cliente</th>     
       <th>Descripcion</th>
       <th>Observaciones</th>
       <th width='80'><a id='fechai' href='InformeProyectoInstalacion.php?buscarfe=INICIO&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>FechaI</a></th>
       <th>Fecha E</th>
       <th width='80'><a id='fechae' href='InformeProyectoInstalacion.php?buscarfe=ENTREGA&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>FechaC</a></th>
       	<th>Comuna</th>
       <th>Dias</th>
       <th>OC</th>
       <th>Reclamos</th>
       <th>Cantidad</th>
       <th>Estado</th></tr></thead>";


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
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$CODIGO_COMUNA = $row["CODIGO_COMUNA"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$PROCESO = $row["PROCESO"];
	$EJECUTOR = $row["EJECUTOR"];
	$PREDECESOR = $row["PREDECESOR"];
	$DIAS = $row["DIAS"];
	$OC = $row["OC"];
	$RECLAMOS = $row["RECLAMOS"];
	$CANTIDAD = $row["CANTIDAD"];
 	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];

	$query_registro1 = "SELECT comunas.NOMBRE_COMUNA,region_1.NOMBRE,region_1.ZONA  FROM comunas,region_1 WHERE region_1.CODIGO = comunas.CODIGO_REGION1 and comunas.CODIGO_COMUNA  ='".$CODIGO_COMUNA."'";
	$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 	$NCOMUNA= $row["NOMBRE_COMUNA"];
    	$NREGIONE= $row["NOMBRE"];
    	$ZONA_A= $row["ZONA"];
 	while($row = mysql_fetch_array($result1))
  	{
    	$NCOMUNA= $row["NOMBRE_COMUNA"];
    	$NREGIONE= $row["NOMBRE"];
    	$ZONA_A= $row["ZONA"];
  	}


  if($FECHA_REALIZACION  == date("Y-m-d"))
  {
    echo  "<tr><td id='hoy'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td  id='hoy'> <a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
           </td>";
    echo  "<td  id='hoy'>".($PROCESO)."</td>";
	echo  "<td  id='hoy'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td  id='hoy'>".($DESCRIPCION)."</td>";

	echo  "<td  id='hoy'>".($OBSERVACIONES)."</td>";
	echo  "<td  id='hoy' align='center' >".substr($FECHA_INICIO,0,11)."</td>";
	echo  "<td  id='hoy' align='center' >".substr($FECHA_PRIMERA_ENTREGA,0,11)."</td>";
	if($ESTADO == "OK")
	{
    echo  "<td align='center' id='azul'>".($FECHA_ENTREGA)."</td>";
	}
	else
	{
	if($FECHA_ENTREGA > $fecha7)
	{
    echo  "<td align='center'  id='verde'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA < date('Y-m-d'))
    {
    echo  "<td align='center' id='rojo'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
	{
    echo  "<td align='center' id='amarillo'>".substr($FECHA_ENTREGA,0,11)."</td>";		
	}
    }
	echo  "<td  id='hoy' align='center' >".$DIAS."</td>";
    echo  "<td  id='hoy' align='right' >".$OC."</td>";
    echo  "<td  id='hoy' align='right' >".$RECLAMOS."</td>";
    echo  "<td  id='hoy' align='right' >".number_format($CANTIDAD,0)."</td>";
	echo  "<td  id='hoy'>".$ESTADO."</td></tr>";
	$numero--;
	}
	else
	{
    echo  "<tr><td> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td> <a 
     	  href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
          </td>";
    echo  "<td>".($PROCESO)."</td>";      
	echo  "<td>".$NOMBRE_CLIENTE."</td>";
	echo  "<td>".$DESCRIPCION."</td>";
	echo  "<td>".$OBSERVACIONES."</td>";
	echo  "<td align='center' >".substr($FECHA_INICIO,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_PRIMERA_ENTREGA,0,11)."</td>";
	if($ESTADO == "OK")
	{
    echo  "<td align='center' id='azul'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
    else
	{
	if($FECHA_ENTREGA > $fecha7)
	{
    echo  "<td  align='center' id='verde' >".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA < date('Y-m-d'))
	{
    echo  "<td align='center' id='rojo'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
	{
    echo  "<td align='center' id='amarillo' >".substr($FECHA_ENTREGA,0,11)."</td>";		
	}
	}
	echo  "<td>".$NCOMUNA."</td>";
	echo  "<td align='center'>".$DIAS."</td>";
	echo  "<td align='right' >".$OC."</td>";
	echo  "<td align='right' >".$RECLAMOS."</td>";
	echo  "<td align='right' >".number_format($CANTIDAD,0)."</td>";
	echo  "<td>".$ESTADO."</td></tr>";
	$numero--;
	}
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>
</html>
