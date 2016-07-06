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
$valor=0;
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
$BUSCAR_COMUNA ='';
$BUSCAR_CLIENTE ='';
$INEN = "";
$VENDEDOR ='';
$DESDE = "";
$HASTA = "";
$ROCHAROCHA = "";
$ESTADOV = $_GET["ESTADO"];

$ex = '';
$existe_ficha = "";
$ex1 = '';
$sin_ficha = "";

$reprog = '';
$reprogramacion = '';

$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_ENTREGA';
$txt_tp = '';
$txt_fi = '';
if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{    
$valor = $_GET["valor"];

if(isset($_GET["sin_ficha"]))
{
$sin_ficha = $_GET["sin_ficha"];
$ex1 = 'checked';
}

if(isset($_GET["reprogramacion"]))
{
$reprogramacion = $_GET["reprogramacion"];
$reprog= 'checked';
}

if(isset($_GET["existe_ficha"]))
{
$existe_ficha = $_GET["existe_ficha"];
$ex = 'checked';
}

$BUSCAR_CODIGO = $_GET["buscar_codigo"];
if(isset($_GET["txt_tp"]))
{
$txt_tp =  $_GET["txt_tp"];
}
if(isset($_GET["txt_fi"]))
{
$txt_fi =  $_GET["txt_fi"];
}
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

if (isset($_GET["buscar_comuna"])) 
{ 
$BUSCAR_COMUNA = $_GET["buscar_comuna"];
}

if (isset($_GET["buscar_cliente"])) 
{ 
$BUSCAR_CLIENTE = $_GET["buscar_cliente"];
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
$RUTA1 = "";
$AMBOS1 = "";
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
else if($ESTADOV == "EN RUTA")
{
	$RUTA1 = 'selected';
}
else if($ESTADOV == "AMBOS")
{
	$AMBOS1 = 'selected';
}


?>
<!DOCTYPE>
<html>

<head>
<title> Informe Despacho V2.0.0</title>
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
<script language = javascript>
$(function(){
$('#buscar_cliente').autocomplete({
source : 'ajaxCliente.php',
select : 
function(event, ui)
{
                     
}
});
});	

function fecha13()
{
$('#culq').datetimepicker({
dateFormat: 'yy-mm-dd',
showSecond: true,
timeFormat: 'hh:mm:ss',
stepHour: 1,
stepMinute: 1,
stepSecond: 10
});
$('#fechaini').datetimepicker({
dateFormat: 'yy-mm-dd',
showSecond: true,
timeFormat: 'hh:mm:ss',
stepHour: 1,
stepMinute: 1,
stepSecond: 10
});		
}

function valia()
{
obs = document.getElementById('obs');
buscar = document.getElementById('buscar4') ;
despachar = document.getElementById('area').selectedIndex;
if (obs.value != "" && despachar != '0') 
{	  
buscar.disabled=false;
}
else
{
buscar.disabled=true;
}
}

$(function(){
$('#txt_tp').autocomplete({
source : 'ajaxTP.php',
select : 
function(event, ui)
{
      
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
	

$(function() 
{    
$( "#txt_fechae" ).datepicker({dateFormat: 'yy-mm-dd'});
$( "#txt_fechai").datepicker ({dateFormat: 'yy-mm-dd'});
});

function enviar()
{
var as1= confirm("Realmente deseas modificar");

if(as1)                   
{
  document.getElementById("formulario11").submit();
}
else
{
  return false;
  //window.location="Materiales.php";
}
} 

$(function() 
{
$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	
});
function volver()
{
contenedor.style.display = "";
contenedor1.style.display = "none";
}
function valora()
{	
contLin = document.getElementById('valor').value;
contLin++;
}

function agregar(id) 
{
contenedor = document.getElementById('contenedor');
contenedor1 = document.getElementById('contenedor1');
contenedor.style.display = "none";
contenedor1.style.display = ""
num = id.substring(3,5);
cds = document.getElementById('cds' + num).value;
cds = document.getElementById('cds' + num).value;
des = document.getElementById('des' + num).value;
des = document.getElementById('des' + num).value;
dir = document.getElementById('dir' + num).value;
dir = document.getElementById('dir' + num).value;
gui = document.getElementById('gui' + num).value;
gui = document.getElementById('gui' + num).value;
tpm = document.getElementById('tpm' + num).value;
tpm = document.getElementById('tpm' + num).value;
obs = document.getElementById('obs' + num).value;
obs = document.getElementById('obs' + num).value;
cdp = document.getElementById('cdp' + num).value;
cdp = document.getElementById('cdp' + num).value;
est = document.getElementById('est' + num).value;
est = document.getElementById('est' + num).value;

var tr, td, tabla;

tabla = document.getElementById('tabla');
tr = tabla.insertRow(tabla.rows.length);
td = tr.insertCell(tr.cells.length);
td.innerHTML = "<input style= 'width:60px; border:#fff 1px solid;' type='text' id='z" + contLin + "' value='" + cdp + "'>";
td = tr.insertCell(tr.cells.length);
td.innerHTML = "<input style= 'width:60px; border:#fff 1px solid;' type='text' id='a" + contLin + "' name='a" + contLin + "' value='" + cds + "'>";
td = tr.insertCell(tr.cells.length);
td.innerHTML = "<input style= 'border:#fff 1px solid;' type='text' id='c" + contLin + "' value='" + dir + "'>";
td = tr.insertCell(tr.cells.length);
td.innerHTML = "<input style= 'width:60px;border:#fff 1px solid;' type='text' id='d" + contLin + "' value='" + gui + "'>";
td = tr.insertCell(tr.cells.length);
td.innerHTML = "<input style= 'width:60px;border:#fff 1px solid;' type='text' id='f" + contLin + "' value='" + tpm + "'>";
td = tr.insertCell(tr.cells.length);
td.innerHTML = "<input style= 'border:#fff 1px solid;' type='text' id='g" + contLin + "' value='" + obs + "'>";
td = tr.insertCell(tr.cells.length);
td.innerHTML = "<input style= 'border:#fff 1px solid;' type='text' id='j" + contLin + "' value='" + est + "'>";
td = tr.insertCell(tr.cells.length);
td.innerHTML = "<IMG onclick= 'borrar(this);' id='img" + contLin + "' name='img" + contLin + "' SRC='Imagenes/cerrar1.png'>";
document.getElementById('valor').value = contLin;
document.getElementById('contador').value = contLin;
contLin++;
}

function borrarUltima() 
{
ultima = document.all.tabla.rows.length - 1;
if(ultima > -1){
document.all.tabla.deleteRow(ultima);
contLin--;
}	
}

function resta()
{
document.getElementById('contador').value = contLin - 1;	
}
 
function km()
{
kmi= document.getElementById('kmi').value;
kmf= document.getElementById('kmf').value;
total = kmf - kmi;
document.getElementById('kmr').value = total;
}

function litro()
{
lit= document.getElementById('lit').value;
mon= document.getElementById('mon').value;
total = mon / lit;
if( total != 'Infinity')
{
document.getElementById('val').value = total;
}
}

function  borrar(obj)
{
while (obj.tagName!='TR') 
obj = obj.parentNode;
tab = document.getElementById('tabla');
for (i=0; ele=tab.getElementsByTagName('tr')[i]; i++)
if (ele==obj) num=i;
tab.deleteRow(num);	
}


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
<div  class="content_item" id = 'contenedor'>	
<div id = 'contenedor-ins'>	

<input style="display:none;" type="text" name='valor' id='valor' value='<?php echo $valor ?> '/>

<table>
<tr>
<th id="tit_des" height="37" colspan="5" align="center" ><h1>Informe Despacho</h1></th>
</tr>

<tr>
<td ><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" value="<?php echo $DESDE;?>" /></td>
<td ><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="<?php echo $HASTA;?>" /></td>
<td><select class="textbox" onchange="" id = "buscarfe" name = "buscarfe">
<option value="" selected>Fecha</option>
<option <?php echo $INICIO1;?> >INICIO</option>
<option <?php echo $ENTREGA1;?> >ENTREGA</option>
</select>
</td>
<td><input placeholder="TP/TM/OS" class='textbox' name="txt_tp" id="txt_tp" type="text" value="" /></td>
<td><input  placeholder="Comuna"  class="textbox"  type="text" id="buscar_comuna" name="buscar_comuna" value="<?php echo $BUSCAR_COMUNA;?>"  ></td>
</tr> 

<tr>
<td ><input placeholder="Rocha" class='textbox'  type="text" id="buscar_codigo" name="buscar_codigo" value="<?php echo $BUSCAR_CODIGO;?>"  ></td>
<td>
<select class='textbox'  onchange="" id = "ESTADO" name = "ESTADO">
<option <?php echo $TODOS1;?> >TODOS</option>
<option <?php echo $PROCESO1;?>>EN PROCESO</option>
<option <?php echo $NULO1;?>>NULO</option>
<option <?php echo $OK1;?>>OK</option>
<option <?php echo $RUTA1;?>>EN RUTA</option>
<option <?php echo $AMBOS1;?>>AMBOS</option>
</select>
</td>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php } else { ?>
<td>
<select name="buscar_vendedor" id="buscar_vendedor" type ="text" class='textbox' >
<option><?php echo ($VENDEDOR) ?> </option>
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
<td><input placeholder="FI" class='textbox' name="txt_fi" id="txt_fi" type="text" value="" /></td>
<td ><input placeholder="Cliente" width="98" class="textbox"  type="text" id="buscar_cliente" name="buscar_cliente" value="<?php echo $BUSCAR_CLIENTE;?>"  ></td>
</tr>

<tr>
<td><select class="textbox" onchange="" id = "zona" name = "zona">
<option value="" selected>Zona</option>
<option>Norte</option>
<option>Centro</option>
<option>Sur</option>
</select></td>
<td> <input type="checkbox" name="existe_ficha" id="existe_ficha" value="ficha" <?php echo $ex; ?>> Solo ficha | <input type="checkbox" name="sin_ficha" id="sin_ficha" value="sinficha" <?php echo $ex1; ?>> Sin ficha</td>
<td>  <input type="checkbox" name="reprogramacion" id="reprogramacion" value="rp" <?php echo $reprog; ?>> Reprogramados </a></td>
<td> <a href="ListadoRuta.php" style="text-decoration:none;"><input  type="button" class='boton'  value="Listado de ruta"/></a><input type="text" value="Despacho" name = "nombreser" id="nombreser" style="display:none;"/> </td>


<td> <input class='boton'  type="submit" class="des_bus"  name = "buscar" value = "Buscar" /> </td>
<td><a href="ExcelInformeDespacho.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&ESTADO=<?php echo urlencode($ESTADOV);?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></td>

</tr>
</tr>
</table>

</div>





  
<table rules='all' frame='box' class='des'>
<?php
mysql_select_db($database_conn, $conn);
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}	
																																																																																																																											
$fecha7 = dameFecha2(date('d/m/Y'),7);
$zona_txt = (empty($_GET["zona"]) ? '' : $_GET["zona"]);
////Comienzo






if($BUSCAR_COMUNA != '') 
{ 
$query_registro = "select DISTINCT servicio.CODIGO_SERVICIO,servicio.M3, servicio.FI, servicio.RECLAMOS, servicio.GUIA_DESPACHO,servicio.FECHA_PRIMERA_ENTREGA,servicio.FECHA_REALIZACION, servicio.TRANSPORTE, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO,servicio.CODIGO_COMUNA, proyecto.MONTO from servicio, proyecto, comunas where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Despacho' and  comunas.CODIGO_COMUNA  = servicio.CODIGO_COMUNA  and comunas.NOMBRE_COMUNA = '".$BUSCAR_COMUNA."'  ";
}
else
{
$query_registro = "select DISTINCT servicio.CODIGO_SERVICIO,servicio.M3,  servicio.FI, servicio.RECLAMOS, servicio.GUIA_DESPACHO,servicio.FECHA_PRIMERA_ENTREGA,servicio.FECHA_REALIZACION, servicio.TRANSPORTE, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO,servicio.CODIGO_COMUNA, proyecto.MONTO  from  servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Despacho' ";
}

if($BUSCAR_CODIGO!='')
{

$query_registro .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";

}

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


if($txt_tp != '')
{ 
$query_registro .= "  and servicio.TPTMFI = '".$txt_tp ."' ";
}



if($txt_fi != '')
{ 
$query_registro .= "  and  servicio.FI = '".$txt_fi."'  ";
}

if($existe_ficha != '')
{ 
$query_registro .= "  and  not servicio.FI = ''  ";
}

if($sin_ficha == 'sinficha')
{ 
$query_registro .= "  and  servicio.FI = ''  ";
}

if($reprogramacion !="")
{
$query_registro .= "  and  servicio.FECHA_ENTREGA != servicio.FECHA_PRIMERA_ENTREGA ";
}

if($BUSCAR_CLIENTE != '') 
{ 
$query_registro .= " and proyecto.NOMBRE_CLIENTE = '".$BUSCAR_CLIENTE."' ";
}



if($ESTADOV == "AMBOS")
{	
$query_registro .= "  and servicio.ESTADO IN ('EN PROCESO', 'EN RUTA') ";
}else if ($ESTADOV == "TODOS") 
{
	$query_registro .= "  and not servicio.ESTADO = '' ";
}
else if ($ESTADOV != "TODOS" and $ESTADOV != "AMBOS") {
	$query_registro .= "  and servicio.ESTADO = '".$ESTADOV."' ";
}


if($ordenfecha == 'FECHA_ENTREGA')
{
$query_registro .= " and  servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}else if($ordenfecha == 'FECHA_INICIO')
{
$query_registro .= " and  servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}





$CUENTR = 0;
$monto1 = 0;

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 1;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$GUIA = $row["GUIA_DESPACHO"];
	$CODIGO_COMUNA = $row["CODIGO_COMUNA"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
    $FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
    $CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$PREDECESOR = $row["PREDECESOR"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$M3 = $row["M3"];
	$MONTO = $row["MONTO"];
	$RECLAMOS = $row["RECLAMOS"];
	$TRANSPORTE = $row["TRANSPORTE"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	$FI = $row["FI"];
	$monto1 += $MONTO;

	$NCOMUNA = "";
	$NREGIONE = "";
	$ZONA_A ="";
	$query_registro1 = "SELECT comunas.NOMBRE_COMUNA,region_1.NOMBRE,region_1.ZONA  FROM comunas,region_1 WHERE region_1.CODIGO = comunas.CODIGO_REGION1 and comunas.CODIGO_COMUNA  ='".$CODIGO_COMUNA."'";
	$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 	while($row = mysql_fetch_array($result1))
  	{
    	$NCOMUNA= $row["NOMBRE_COMUNA"];
    	$NREGIONE= $row["NOMBRE"];
    	$ZONA_A= $row["ZONA"];
  	}

  	if($zona_txt == $ZONA_A || $zona_txt == "")
	{

$query_registro22 = "select count(servicio.CODIGO_SERVICIO) as a from ruta,servicio,servicio_ruta where ruta.CODIGO_RUTA = servicio_ruta.CODIGO_RUTA AND servicio_ruta.CODIGO_SERVICIO = servicio.CODIGO_SERVICIO AND servicio.CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";
$result22 = mysql_query($query_registro22, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result22))
  {  
	$CUENTR = $row["a"];
}

if($ordenfecha=="FECHA_INICIO")
{
	$FECHAAUS = substr($FECHA_INICIO,0,11);
}
else
{
	$FECHAAUS = substr($FECHA_ENTREGA,0,11);
}
	if($FECHA_VARIABLE == $FECHAAUS )
	{
		$numero=1;
	}
	else
	{
		$numero = 0;
	}
	if($numero == 0)
	{	
	$FECHA_VARIABLE = $FECHAAUS ;
	}
	$date = new DateTime($FECHAAUS);
	switch ($date->format('m')) {
    case "01":
        $mes = "Enero";
        break;
    case "02":
        $mes = "Febrero";
        break;
    case "03":
        $mes = "Marzo";
        break;
	case "04":
        $mes = "Abril";
        break;
    case "05":
        $mes = "Mayo";
        break;
    case "06":
        $mes = "Junio";
        break;
	case "07":
        $mes = "Julio";
        break;
    case "08":
        $mes = "Agosto";
        break;
    case "09":
        $mes = "Septiembre";
        break;
    case "10":
        $mes = "Octubre";
        break;
	case "11":
        $mes = "Noviembre";
        break;
	case "12":
        $mes = "Diciembre";
        break;
	}
	////////
	switch ($date->format('w')) {
    case "1":
        $dia = "Lunes " . $date->format('d') ." ".$mes ;
        break;
    case "2":
        $dia = "Martes " . $date->format('d')." ".$mes;
        break;
    case "3":
        $dia = "Miercoles " .$date->format('d')." ".$mes;
        break;
	case "4":
        $dia = "Jueves " . $date->format('d')." ".$mes;
        break;
    case "5":
        $dia = "Viernes " . $date->format('d')." ".$mes;
        break;
    case "6":
        $dia = "Sabado " . $date->format('d')." ".$mes;
        break;
	case "0":
        $dia = "Domingo " . $date->format('d')." ".$mes;
        break;
	}

	if($numero == 0)
	{	
	if($ESTADOV == 'OK'|| $ESTADOV == 'NULO')
	{
    echo "<tr><td  align='left' colspan='4'><p>".$dia."</p></td></tr>";
    echo"<tr><th>Rocha</th>
	  <th>N°</th>
	  <th>Ruta</th>
	  <th>Cliente</th>";
	  if($GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" || $GRP == "OPE" || $GRP1 == "OPE" || $GRP2 == "OPE" || $GRP3 == "OPE"|| $GRP == "DES" || $GRP1 == "DES" || $GRP2 == "DES" || $GRP3 == "DES")
	{  
		echo"<th>Monto</th>"; 
	}   
 	echo"<th>Descripcion</th>
      <th>Direccion</th>
      <th>Comuna</th>
      <th>Regiones</th>
      <th>Zona</th>
      <th>Guia</th>
      <th>TP/TM/OS</th>
      <th>FI</th>
      <th>Observaciones</th>
	  <th id='fechai'> <a href='InformeProyectoDespacho.php?buscarfe=INICIO&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."&valor=".$valor."'>FechaI</a></th>
	  <th id='fechae'> <a href='InformeProyectoDespacho.php?buscarfe=ENTREGA&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."&valor=".$valor."'>FechaC</a></th>
      <th>Vehiculo</th>
	  <th>Reclamos</th>
      <th>Estado</th></tr>
	";   
	}
	else
	{
    echo "<tr><td  align='left' colspan='4'><p>".$dia."</p></td></tr>";
	echo"<tr><th >Rocha</th>
	 <th>N°</th>
	 <th><a style='color:#fff;text-decoration:none;' href='InformeProyectoDespacho.php?ESTADO=".$ESTADOV."&RUTA=RUTA'>Ruta</a></th>
	 <th>Cliente</th>";
	if($GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" || $GRP == "OPE" || $GRP1 == "OPE" || $GRP2 == "OPE" || $GRP3 == "OPE"|| $GRP == "DES" || $GRP1 == "DES" || $GRP2 == "DES" || $GRP3 == "DES")
	{  
	echo"<th>Monto</th>"; 
	}      
	echo" <th>Descripcion</th>
     <th>Direccion</th>
     <th>Comuna</th>
     <th>Regiones</th>
     <th>Zona</th>
     <th>Guia</th>
     <th>TP/TM/OS</th>
     <th>FI</th>
     <th>Observaciones</th>
	 <th id='fechai'> <a href='InformeProyectoDespacho.php?buscarfe=INICIO&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."&valor=".$valor."'>FechaI</a></th>
     <th id='fechae'> <a href='InformeProyectoDespacho.php?buscarfe=ENTREGA&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."&valor=".$valor."'>FechaC</a></th>
     <th>Vehiculo</th>
     <th>Reclamos</th>
     <th>Estado</th></tr>
	 ";   
	}
		  $numero = 20;	  
    }


$query_registro22 = "select * from servicio_ruta where codigo_servicio = '".$CODIGO_SERVICIO."'";
$result22 = mysql_query($query_registro22, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result22))
  {  
   $CODIGO_RUTA = $row["CODIGO_RUTA"];
  }
 mysql_free_result($result22);
if($FECHA_REALIZACION  == date("Y-m-d"))
{
 echo  "<tr><td  id='hoy'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a><input style='display:none;' onchange='enviar();' id = 'cdp".$numero1."' type='text' value='".$CODIGO_PROYECTO."'/></td>";
 echo  "<td  id='hoy'> <a style='color:#000;text-decoration:none;' 
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        <input style='display:none;' onchange='enviar();' id = 'cds".$numero1."'  type='text' value='".$CODIGO_SERVICIO."'/>
        </td>";
	
	
if ($CUENTR != 0){
echo "<td align='center' class='ruta' id = 'rut".$numero1." hoy' onClick=''>".$CODIGO_RUTA."</td>";
}
else if($M3 <= 0 || $M3 == ""){
echo "<td align='center' class='ruta-m3' id = 'rut".$numero1." hoy' onClick=''>Falta M3</td>";	
}
else{
echo  "<td align='center' id = 'rut".$numero1."' onClick='valora();agregar(this.id);'> Ruta </td>";
}

echo  "<td id='hoy'>".($NOMBRE_CLIENTE)."</td>";
if($GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" || $GRP == "OPE" || $GRP1 == "OPE" || $GRP2 == "OPE" || $GRP3 == "OPE"|| $GRP == "DES" || $GRP1 == "DES" || $GRP2 == "DES" || $GRP3 == "DES")
{  
echo  "<td align='right' id='hoy'>".number_format($MONTO,0,",",".")."</td>";
}
echo  "<td id='hoy'>".($DESCRIPCION)."<input style='display:none;' onchange='enviar();' id = 'des".$numero1."' type='text' value='".$DESCRIPCION."'/></td>";
echo  "<td id='hoy'>".($DIRECCION)."<input style='display:none;' onchange='enviar();' id = 'dir".$numero1."'  type='text' value='".$DIRECCION."'/></td>";
echo  "<td id='hoy'>".$NCOMUNA."</td>";
echo  "<td id='hoy'>".$NREGIONE."</td>";
echo  "<td id='hoy'>".$ZONA_A."</td>";
echo  "<td id='hoy' align='center'>".$GUIA."<input style='display:none;' onchange='enviar();' id = 'gui".$numero1."'  type='text' value='".$GUIA."'/></td>";
echo  "<td id='hoy' align='center'>".$TPTMFI."<input style='display:none;' onchange='enviar();' id = 'tpm".$numero1."'  type='text' value='".$TPTMFI."'/></td>";
echo  "<td id='hoy' align='center'>".$FI."<input style='display:none;' onchange='enviar();' id = 'tpm".$numero1."'  type='text' value='".$TPTMFI."'/></td>";
echo  "<td id='hoy'>".($OBSERVACIONES)."<input style='display:none;' onchange='enviar();' id = 'obs".$numero1."'  type='text' value='".$OBSERVACIONES."'/></td>";

echo  "<td id='hoy'>".($FECHA_INICIO)."</td>";
		
if($ESTADO == "OK")
{
echo  "<td id='azul'>".($FECHA_ENTREGA)."</td>";
}
else
{
if($FECHA_ENTREGA > $fecha7)
{
echo  "<td  id='verde'>".($FECHA_ENTREGA)."</td>";
}
else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td  id='rojo'>".($FECHA_ENTREGA)."</td>";
}
else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
echo  "<td id='amarillo'>".($FECHA_ENTREGA)."</td>";		
		}
}
echo  "<td id='hoy'>".$TRANSPORTE."</td>";
echo  "<td id='hoy' align='center'>".$RECLAMOS."</td>";
echo  "<td id='hoy'>".$ESTADO."<input style='display:none;' onchange='enviar();' id = 'est".$numero1."' type='text' value='".$ESTADO."'/></td></tr>";
$numero1++;
}
else
{
echo  "<tr><td> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a><input style='display:none;' onchange='enviar();' id = 'cdp".$numero1."'  type='text' value='".$CODIGO_PROYECTO."'/></td>";
echo  "<td> <a style='color:#000;text-decoration:none;' 
href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>	
<input style='display:none;' onchange='enviar();' id = 'cds".$numero1."'  type='text' value='".$CODIGO_SERVICIO."'/>
</td>";


if ($CUENTR != 0){
echo "<td align='center' class='ruta' id = 'rut".$numero1." hoy' onClick=''>".$CODIGO_RUTA."</td>";
}
else if($M3 <= 0 || $M3 == ""){
echo "<td align='center' class='ruta-m3' id = 'rut".$numero1." hoy' onClick=''>Falta M3</td>";	
}
else{
echo  "<td align='center' id = 'rut".$numero1."' onClick='valora();agregar(this.id);'> Ruta </td>";
}

echo  "<td>".($NOMBRE_CLIENTE)."</td>";
if($GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" || $GRP == "OPE" || $GRP1 == "OPE" || $GRP2 == "OPE" || $GRP3 == "OPE"|| $GRP == "DES" || $GRP1 == "DES" || $GRP2 == "DES" || $GRP3 == "DES")
{  
echo  "<td align='right'>".number_format($MONTO,0,",",".")."</td>";
}
echo  "<td>".($DESCRIPCION)."<input style='display:none;' onchange='enviar();' id = 'des".$numero1."'  type='text' value='".$DESCRIPCION."'/></td>";
echo  "<td>".($DIRECCION)."<input style='display:none;' onchange='enviar();' id = 'dir".$numero1."' type='text' value='".$DIRECCION."'/></td>";
echo  "<td>".$NCOMUNA."</td>";
echo  "<td>".$NREGIONE."</td>";
echo  "<td>".$ZONA_A."</td>";
echo  "<td align='center'>".$GUIA."<input style='display:none;' onchange='enviar();' id = 'gui".$numero1."'  type='text' value='".$GUIA."'/></td>";
echo  "<td align='center'>".$TPTMFI."<input style='display:none;' onchange='enviar();' id = 'tpm".$numero1."'  type='text' value='".$TPTMFI."'/></td>";
echo  "<td align='center'>".$FI."<input style='display:none;' onchange='enviar();' id = 'tpm".$numero1."'  type='text' value='".$TPTMFI."'/></td>";
echo  "<td>".($OBSERVACIONES)."<input style='display:none;' onchange='enviar();' id = 'obs".$numero1."' type='text' value='".$OBSERVACIONES."'/></td>";

echo  "<td>".($FECHA_INICIO)."</td>";
		
if($ESTADO == "OK")
{
echo  "<td id='azul'>".($FECHA_ENTREGA)."</td>";
}
else
{
if($FECHA_ENTREGA > $fecha7)
{
echo  "<td  id='verde'>".($FECHA_ENTREGA)."</td>";
}
else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td  id='rojo'>".($FECHA_ENTREGA)."</td>";
}
else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
echo  "<td id='amarillo'>".($FECHA_ENTREGA)."</td>";		
		}
  }
echo  "<td>".$TRANSPORTE."</td>";
echo  "<td align='center'>".$RECLAMOS."</td>";
echo  "<td>".$ESTADO."<input style='display:none;' onchange='enviar();' id = 'est".$numero1."' type='text' value='".$ESTADO."'/></td></tr>";
	//$numero--;
	$numero1++;
	}
	}
  }
  mysql_free_result($result);

?>
<?php if($GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" || $GRP == "OPE" || $GRP1 == "OPE" || $GRP2 == "OPE" || $GRP3 == "OPE"|| $GRP == "DES" || $GRP1 == "DES" || $GRP2 == "DES" || $GRP3 == "DES")
{    ?>
<tr>
	<td colspan="4"></td>
	<th><?php echo number_format($monto1,0,",",".");?></th>
</tr>
<?php } ?>
</table>
</div>

<div  class="content_item" id = 'contenedor1'  style="display:none;">

<h1> Hoja de ruta </h1>
<br />

<input class='boton desbutton' type="button" onclick="volver();" value="Volver">

<table  rules='all' frame='box' class='des' id='tabla' > 
      <tr>
        <th>Cod Proyecto</th>
		<th>N°</th>
		<!--<th>Descripcion</th>-->
		<th>Direccion</th>
        <th>Guia</th>
        <th>TP/TM/FI</th>
        <th>Observaciones</th>
        <th>Estado</th>
        <th>Eliminar</th>
	</tr>
    
    
 <?php 
$cont = 1;
while($cont <= 75) 
{
	if(isset($_GET["a".$cont]))
	{
		
$query_registro = "select * from servicio WHERE CODIGO_SERVICIO = '".$_GET["a".$cont]."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {  

	$GUIA = $row["GUIA_DESPACHO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
    $CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$ESTADO = $row["ESTADO"];
	$RECLAMOS = $row["RECLAMOS"];

		echo"<tr><td>".$CODIGO_PROYECTO."</td>";
		echo"<td><input style= 'width:60px; border:#fff 1px solid;' type='text'  id = 'a".$cont."'  name = 'a".$cont."' value='".$CODIGO_SERVICIO."'></td>";
		echo"<td>".$DIRECCION."</td>";
		echo"<td>".$GUIA."</td>";
	    echo"<td >".$TPTMFI."</td>";
		echo"<td>".$OBSERVACIONES."</td>";
		echo"<td>".$ESTADO."</td>";	
		echo"<td><img onclick= 'borrar(this);' SRC='Imagenes/cerrar1.png'></td></tr>";	
	}
	}
	$cont++;
	
}

?>   
 </table>
 <br /> 
 <input class='boton'  onblur="resta()" type ="hidden" value ="" name="contador" id="contador" />
 <input class='boton desbutton'  type="button"  value="Ingresar" onClick="document.formulario.action='scriptHojaRuta.php'; document.formulario.submit();" /> 

 




  
  </form>
</body>
</html>