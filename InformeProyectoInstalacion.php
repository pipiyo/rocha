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
$ex = '';
$existe_ficha = "";
$ex1 = '';
$sin_ficha = "";
$VENDEDOR ='';
$ESTADOV = $_GET["ESTADO"];
$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_ENTREGA';

 

if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{  

$BUSCAR_CODIGO = $_GET["buscar_codigo"];
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
if(isset($_GET["existe_ficha"]))
{
$existe_ficha = $_GET["existe_ficha"];
$ex = 'checked';
} 
if(isset($_GET["sin_ficha"]))
{
$sin_ficha = $_GET["sin_ficha"];
$ex1 = 'checked';
}
if (isset($_GET["buscar_codigo_reclamo"])) 
{ 
$BUSCAR_RECLAMO = $_GET["buscar_codigo_reclamo"];
}
if (isset($_GET["buscar_cliente"])) 
{ 
$CLIENTE = $_GET["buscar_cliente"];
}
if (isset($_GET["buscar_vendedor"])) 
{ 
$VENDEDOR = $_GET["buscar_vendedor"];
}
if (isset($_GET["buscar_lider"])) 
{ 
$BUSCAR_LIDER = $_GET["buscar_lider"];
}
if (isset($_GET["buscar_comuna"])) 
{ 
$BUSCAR_COMUNA = $_GET["buscar_comuna"];
}
if (isset($_GET["txt_categoria"])) 
{ 
$CATEGORIA = $_GET["txt_categoria"];
}
if (isset($_GET["txt_procesoi"])) 
{ 
$PROCESO = $_GET["txt_procesoi"];
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

/*Equipo*/
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
  <title> Informe Instalacion V2.0.0</title>
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

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
  <script language = javascript>
   $(function() 
   {
   $( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
   $( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	
   });     

   $(function(){

	 $('#buscar_cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
				   function(event, ui)
				   {
                      $('#rut').slideUp('slow', function()
					   {
                            $('#rut').val(
                                 ui.item.rut);
							
                       });
                       $('#rut').slideDown('slow');
                   }
                 });
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
<div id='bread'><div id="menu1"></div></div>
<form action="" method="get" name="formulario">
<div id = 'contenedor-ins'>	
<h1>Informe Instalaciones </h1>
<table>
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
<td ><input placeholder="Lider" class="textbox"  type="text" id="buscar_lider" name="buscar_lider" value="<?php echo $BUSCAR_LIDER;?>"  ></td>
</tr> 
<tr>
<td>
<select class="textbox" id="ESTADO" name="ESTADO">
<option <?php echo $TODOS1;?> >TODOS</option>
<option <?php echo $PROCESO1;?>>EN PROCESO</option>
<option <?php echo $NULO1;?>>NULO</option>
<option <?php echo $OK1;?>>OK</option>
</select>
</td>
<td ><input placeholder="Cliente" class="textbox"  type="text" id="buscar_cliente" name="buscar_cliente" value="<?php echo $CLIENTE;?>"  ></td>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php } else { ?>
<td>
<select name="buscar_vendedor" type ="text" class="textbox" >
 <option value="" selected>Vendedor</option>
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
 } mysql_free_result($result1);} 
 ?> 
<option> </option>
</select>
</td>
<td ><input  placeholder="Comuna" class="textbox"  type="text" id="buscar_comuna" name="buscar_comuna" value="<?php echo $BUSCAR_COMUNA;?>"  ></td>
<td align=""> <input placeholder="Reclamo"  class="textbox"  type="text" id="buscar_codigo_reclamo" name="buscar_codigo_reclamo" value="<?php echo $BUSCAR_RECLAMO;?>"  > </td>
</tr>

<tr>
<td ><select class="textbox"  id = "txt_categoria" name="txt_categoria">
<option value="">Categoria</option>
<option>Proceso</option>
<option>Proyecto</option>
<option>Solicitud</option>
<option></option>
</select></td>		
<td ><select class="textbox"  id = "txt_procesoi" name="txt_procesoi">
<option value="">Proceso</option>
<option>Revisión de proyecto</option>
<option>Rectificacón de medidas</option>
<option>Recepción de mercaderia</option>
<option>Instalación</option>
<option>Refaccion</option>
<option>Acta de Recepción</option>
<option>Servicio Técnico</option>
<option></option>
</select></td>	
<td> <input  type="button" class='boton'  value="Informe" onClick="document.formulario.action='InformeActividad.php';document.formulario.submit();" /><input type="text" value="Instalacion" name = "nombreser" id="nombreser" style="display:none;"/> </td>
<td>
<a href="ExcelInformeInstalaciones.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&ESTADO=<?php echo urlencode($ESTADOV);?>&buscar_comuna=<?php echo urlencode($BUSCAR_COMUNA);?>&buscar_codigo=<?php echo urlencode($BUSCAR_CODIGO);?>&buscar_vendedor=<?php echo urlencode($VENDEDOR);?>&buscar_lider=<?php echo urlencode($BUSCAR_LIDER);?>&buscar_cliente=<?php echo urlencode($CLIENTE);?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a></td>
<td> <input type="submit" id="buscar" class='boton' name = "buscar" value = "Buscar" /> </td>
</tr>
<tr>
	<td> <input type="checkbox" name="existe_ficha" id="existe_ficha" value="ficha" <?php echo $ex; ?>> Solo ficha | <input type="checkbox" name="sin_ficha" id="sin_ficha" value="sinficha" <?php echo $ex1; ?>> Sin ficha</td>
</tr>
</table>
</div>
</form>



<table rules='all' frame='box' class='ins'>
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
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.PROCESO, servicio.FECHA_PRIMERA_ENTREGA,servicio.FI, servicio.CODIGO_SERVICIO, servicio.RECLAMOS,servicio.PUESTOS,servicio.DIAS,servicio.LIDER,servicio.INSTALADOR_4,servicio.INSTALADOR_3,servicio.FECHA_REALIZACION,servicio.INSTALADOR_2,servicio.INSTALADOR_1, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_ENTREGA,servicio.FECHA_INICIO,servicio.CODIGO_COMUNA,proyecto.DEPARTAMENTO_CREDITO from  servicio, proyecto, comunas where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO  and servicio.NOMBRE_SERVICIO = 'Instalacion' and  comunas.CODIGO_COMUNA  = servicio.CODIGO_COMUNA  and comunas.NOMBRE_COMUNA = '".$BUSCAR_COMUNA."'  ";
$query_registro1 = "select sum(servicio.PUESTOS) AS PUESTO, proceso from  servicio, proyecto, comunas where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO  and servicio.NOMBRE_SERVICIO = 'Instalacion' and  comunas.CODIGO_COMUNA  = servicio.CODIGO_COMUNA  and comunas.NOMBRE_COMUNA = '".$BUSCAR_COMUNA."'  ";
}
else
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.PROCESO, servicio.FECHA_PRIMERA_ENTREGA,servicio.FI, servicio.CODIGO_SERVICIO, servicio.RECLAMOS,servicio.PUESTOS,servicio.DIAS,servicio.LIDER,servicio.INSTALADOR_4,servicio.INSTALADOR_3,servicio.FECHA_REALIZACION,servicio.INSTALADOR_2,servicio.INSTALADOR_1, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_ENTREGA,servicio.FECHA_INICIO,servicio.CODIGO_COMUNA,proyecto.DEPARTAMENTO_CREDITO from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO  and servicio.NOMBRE_SERVICIO = 'Instalacion' ";
$query_registro1 = "select sum(servicio.PUESTOS) AS PUESTO, proceso from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO  and servicio.NOMBRE_SERVICIO = 'Instalacion' ";
}


if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
	$ejutiv="";
foreach ($equipo as $valor)
{
    $ejutiv .= ",'".$valor."'";
}

$query_registro .= " AND proyecto.ejecutivo in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") ";	
$query_registro1 .= " AND proyecto.ejecutivo in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") ";	
}


else if($VENDEDOR != '')
{ 
$query_registro .= " and proyecto.EJECUTIVO = '".($VENDEDOR)."' ";
$query_registro1 .= " and proyecto.EJECUTIVO = '".($VENDEDOR)."' ";
}

if($BUSCAR_CODIGO != '') 
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";
$query_registro1 .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";
}	

if($CLIENTE != '') 
{ 
$query_registro .= " and proyecto.NOMBRE_CLIENTE = '".$CLIENTE."' ";
$query_registro1 .= " and proyecto.NOMBRE_CLIENTE = '".$CLIENTE."' ";
}

if($BUSCAR_LIDER != '') 
{ 
$query_registro .= " and servicio.LIDER LIKE '%".$BUSCAR_LIDER."%' ";
$query_registro1 .= " and servicio.LIDER LIKE '%".$BUSCAR_LIDER."%' ";
}
if($BUSCAR_RECLAMO != '') 
{ 
$query_registro .= " and servicio.RECLAMOS = '".$BUSCAR_RECLAMO."'";
$query_registro1 .= " and servicio.LIDER LIKE '%".$BUSCAR_LIDER."%' ";
}
if($PROCESO != "")
{
$query_registro .= " and servicio.PROCESO = '".$PROCESO."' ";
$query_registro1 .= " and servicio.PROCESO = '".$PROCESO."' and not servicio.PROCESO  = 'Tapizado' ";
}
else
{
$query_registro1 .= " and  servicio.PROCESO not in('Tapizado','') ";	
}



if($CATEGORIA != "")
{
	$query_registro .= " and servicio.CATEGORIA = '".$CATEGORIA."' ";
	$query_registro1 .= " and servicio.CATEGORIA = '".$CATEGORIA."' ";
}
if($existe_ficha != '')
{ 
$query_registro .= "  and  not servicio.FI = ''  ";
$query_registro1 .= "  and  not servicio.FI = ''  ";
}

if($sin_ficha == 'sinficha')
{ 
$query_registro .= "  and  servicio.FI = ''  ";
$query_registro1 .= "  and  servicio.FI = ''  ";
}


if ($ESTADOV == "TODOS") 
{
	$query_registro .= "  and not servicio.ESTADO = '' ";
	$query_registro1 .= "  and not servicio.ESTADO = '' ";
}
else if ($ESTADOV != "TODOS") {
	$query_registro .= "  and servicio.ESTADO = '".$ESTADOV."' ";
	$query_registro1 .= "  and servicio.ESTADO = '".$ESTADOV."' ";
}

if($ordenfecha == 'FECHA_ENTREGA')
{
$query_registro .= " and  servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
$query_registro1 .= " and  servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'  group by proceso";
}else if($ordenfecha == 'FECHA_INICIO')
{
$query_registro .= " and  servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
$query_registro1 .= " and  servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."'   group by proceso";
}

echo "<tr><th colspan=2>Puestos</th><th colspan=2>Proceso</th>";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result1))
  {  
  	echo "<tr><td colspan=2 align='center'>".$row["PUESTO"]."</td> <td colspan=2>".$row["proceso"]."</td></tr>";
  }

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$GUIA = $row["GUIA_DESPACHO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$TPTMFI = $row["TPTMFI"];
	$CODIGO_COMUNA = $row["CODIGO_COMUNA"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
	$INS1= $row["INSTALADOR_1"];
	$INS2= $row["INSTALADOR_2"];
	$FI= $row["FI"];
	$INS3= $row["INSTALADOR_3"];
	$INS4= $row["INSTALADOR_4"];
	$RECLAMOS = $row["RECLAMOS"];
	$LIDER= $row["LIDER"];
	$PUESTOS = $row["PUESTOS"];
	$PROCESO = $row["PROCESO"];
	$DIAS = $row["DIAS"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	if($numero == 0)
	{	
	echo"<tr><th>Rocha</th>
	     <th>N°</th>
	     <th>Cliente</th>     
		 <th>Descripcion</th>
         <th>Direccion</th>
         <th>Comuna</th>
         <th>Observaciones</th>
	     <th width='80'><a id='fechai' href='InformeProyectoInstalacion.php?buscarfe=INICIO&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>FechaI</a></th>
		 <th width='80'><a id='fechae' href='InformeProyectoInstalacion.php?buscarfe=ENTREGA&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>FechaE</a></th>
		 <th>Dias</th>
		 <th>Lider</th>
         <th>Instalador1</th>
		 <th>FI</th>
		 <th>Reclamos</th>
		 <th>Puestos</th>
		 <th>Linea</th>
		 <th>Proceso</th>
         <th>Estado</th></tr>
		 ";      
		  $numero = 20;
    }


$NCOMUNA = "";
$NREGIONE = "";
$query_registro1 = "SELECT comunas.NOMBRE_COMUNA,regiones.REGIONES  FROM comunas,regiones WHERE regiones.CODIGO_REGIONES = comunas.CODIGO_REGIONES and comunas.CODIGO_COMUNA  ='".$CODIGO_COMUNA."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
    $NCOMUNA= $row["NOMBRE_COMUNA"];
    $NREGIONE= $row["REGIONES"];
  }
  if($FECHA_REALIZACION  == date("Y-m-d"))
  {
    echo  "<tr><td id='hoy'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td  id='hoy'> <a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
           </td>";
	echo  "<td  id='hoy'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td  id='hoy'>".($DESCRIPCION)."</td>";
	echo  "<td  id='hoy'>".($DIRECCION)."</td>";
	echo  "<td  id='hoy'>".$NCOMUNA."</td>";
	echo  "<td  id='hoy'>".($OBSERVACIONES)."</td>";
	echo  "<td  id='hoy' align='center' >".substr($FECHA_INICIO,0,11)."</td>";
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
	echo  "<td  id='hoy'>".$LIDER."</td>";
	echo  "<td  id='hoy'>".$INS1."</td>";
    echo  "<td  id='hoy' align='center'>".$FI."</td>";
	echo  "<td  id='hoy' align='center'>".$RECLAMOS."</td>";
	echo  "<td  id='hoy' align='center'>".$PUESTOS."</td>";
	echo  "<td  id='hoy'>".$DEPARTAMENTO_CREDITO."</td>";
	echo  "<td  id='hoy'>".$PROCESO."</td>";
	echo  "<td  id='hoy'>".$ESTADO."</td></tr>";
	$numero--;
	}
	else
	{
    echo  "<tr><td> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td> <a 
     	  href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
          </td>";
	echo  "<td>".$NOMBRE_CLIENTE."</td>";
	echo  "<td>".$DESCRIPCION."</td>";
	echo  "<td>".$DIRECCION."</td>";
	echo  "<td>".$NCOMUNA."</td>";
	echo  "<td>".$OBSERVACIONES."</td>";
	echo  "<td align='center' >".substr($FECHA_INICIO,0,11)."</td>";
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
	echo  "<td align='center'>".$DIAS."</td>";
	echo  "<td>".$LIDER."</td>";
	echo  "<td>".$INS1."</td>";
    echo  "<td align='center'>".$FI."</td>";
	echo  "<td align='center'>".$RECLAMOS."</td>";
	echo  "<td align='center'>".$PUESTOS."</td>";
	echo  "<td>".$DEPARTAMENTO_CREDITO."</td>";
	echo  "<td>".$PROCESO."</td>";
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
