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
$CLIENTE='';
$BUSCAR_CODIGO ='';
$BUSCAR_CLIENTE ='';
$INEN = "";
$VENDEDOR = "";
$DESDE = "";
$HASTA = "";
$ROCHAROCHA = "";
$AREA = "";

$ESTADOV = $_GET["ESTADO"];

$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_INICIO';
if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{    

$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$AREA  = (empty($_GET['area'])) ? "" : $_GET['area'] ;
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

if (isset($_GET["buscar_cliente"])) 
{ 
$CLIENTE = $_GET["buscar_cliente"];
}
if (isset($_GET["buscar_vendedor"])) 
{ 
$VENDEDOR = $_GET["buscar_vendedor"];
}


}  


if (isset($_POST["ingresars"])) 
{
mysql_select_db($database_conn, $conn);
$NOMBRE_SERVICIO = $_POST['txt_nombre_servicio'];
$FECHAES= $_POST['txt_fechae_servicio'];
$FECHAIS= $_POST['txt_fechai_servicio'];
$REALIZADOR= $_POST['txt_realizador'];
$SUPERVISOR= $_POST['txt_supervisor'];
$OBSERVACIONESS= $_POST['txt_observaciones_s'];
$DIRECCION2 = $_POST['txt_direccions'];
$TTF = $_POST['txt_ttf'];
$GUIA = $_POST['txt_guia'];
$CATEGORIA = $_POST['txt_categoria'];
$INS1 = $_POST['ins1'];
$INS2 = $_POST['ins2'];
$INS3 = $_POST['ins3'];
$INS4 = $_POST['ins4'];
$LIDER = $_POST['lider'];
$CANTIDAD_DIAS = $_POST['txt_cantidad_dias'];
$PREDECESOR = $_POST['txt_predecesor'];
$PUESTOS1 = $_POST['puestos'];
$SERVICIO = $_POST['txt_servicio'];
$DOCUMENTO = $_POST['txt_documento'];
$TECNICO1= $_POST['tec1'];
$TECNICO2 = $_POST['tec2'];

$CODIGO_PROYECTO = $_POST['rochar'];


if($NOMBRE_SERVICIO == "Produccion")
{ 
$EJECUTOR = $_POST['txt_ejecutor'];
$PROCESO = $_POST['txt_proceso'];
}
else
{
$EJECUTOR = $_POST['txt_ejecutors'];
$PROCESO = $_POST['txt_procesos'];
}
$FECHA = date('Y/m/d');
$DESCRIPCIONS = $_POST['txt_descripcion_s'];
$FECHA_REALIZACION = date("Y-m-d");

$sql3 = "SELECT COUNT(CODIGO_PROYECTO) AS CODIGO_PROYECTO1 FROM proyecto WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO."'";
$result3 = mysql_query($sql3, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result3))
  {
	$CODIGO_PROYECTO1 = $row["CODIGO_PROYECTO1"];
  }

if($CODIGO_PROYECTO1 != 0 )
{
if  (!(isset($_POST["actis"])))  
{ 
$AREA = $_POST['area'];
$RAZON= $_POST['razon'];
$AREA1 = $_POST['area1'];
$AREA2 = $_POST['area2'];
$sql1 = "INSERT INTO reclamos (ROCHA,AREA,AREA1,AREA2,RAZON,FECHA_INICIO,ESTADO) values ('".($CODIGO_PROYECTO)."','".($AREA)."','".($AREA1)."','".($AREA2)."','".($RAZON)."','".($FECHAIS)."','EN PROCESO')";
$result1= mysql_query($sql1, $conn) or die(mysql_error());
}

$sql3 = "SELECT * FROM reclamos ORDER BY CODIGO_RECLAMO DESC LIMIT 1";
$result3 = mysql_query($sql3, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result3))
  {
	$RECLAMOS = $row["CODIGO_RECLAMO"];
	
  }
  
 if  (isset($_POST["actis"]))  
{
	$RECLAMOS = $_POST['txt_reclamos']; 
}
  $CUENTA = 0;
  $sql5= "SELECT count(CODIGO_RECLAMO) as CODIGO_RECLAMO FROM reclamos where CODIGO_RECLAMO = ".$RECLAMOS."";
$result5 = mysql_query($sql5, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result5))
  {
	$CUENTA = $row["CODIGO_RECLAMO"];
  }
if($CUENTA > 0)
{
$sql = "INSERT INTO servicio (DOCUMENTO_SERVICIO_TECNICO,TIPO_SERVICIO,TECNICO_1,TECNICO_2,PROCESO,EJECUTOR,PUESTOS,PREDECESOR,DIAS,LIDER,INSTALADOR_1,INSTALADOR_2,INSTALADOR_3,INSTALADOR_4,DESCRIPCION,NOMBRE_SERVICIO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,ESTADO,CODIGO_USUARIO,CODIGO_PROYECTO,DIRECCION,TPTMFI,GUIA_DESPACHO,FECHA_REALIZACION,RECLAMOS,FECHA_PRIMERA_ENTREGA,OC,CATEGORIA) values ('".($DOCUMENTO)."','".($SERVICIO)."','".($TECNICO1)."','".($TECNICO2)."','".($PROCESO)."','".($EJECUTOR)."','".($PUESTOS1)."','".($PREDECESOR)."','".($CANTIDAD_DIAS)."','".($LIDER)."','".($INS1)."','".($INS2)."','".($INS3)."','".($INS4)."','".($DESCRIPCIONS)."','".($NOMBRE_SERVICIO)."','".($FECHAIS)."','".($FECHAES)."','".($REALIZADOR)."','".($SUPERVISOR)."','".($OBSERVACIONESS)."','EN PROCESO','".($CODIGO_USUARIO)."','".($CODIGO_PROYECTO)."','".($DIRECCION2)."','".($TTF)."','".($GUIA)."','".$FECHA_REALIZACION."','".$RECLAMOS."','".($FECHAES)."','SIN OC','".$CATEGORIA."')";
$result = mysql_query($sql, $conn) or die(mysql_error());
header("Location: InformeProyectoReclamos.php?ESTADO=EN PROCESO");
}
else
{
	echo '<script language = javascript>
alert("El reclamo que ingreso no existe")
self.location = "InformeProyectoReclamos.php?ESTADO=EN PROCESO"
</script>';
}
}
else
{
	echo '<script language = javascript>
alert("El rocha que ingreso no existe")
self.location = "InformeProyectoReclamos.php?ESTADO=EN PROCESO"
</script>';
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
  <title> Informe Reclamos V1.1.0</title>
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <link rel="stylesheet" href="style/estilopopup-new.css" />

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script type="text/javascript" src="js/tinybox.js"></script>

  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  
  
  
  <script language = javascript>
  
    $(function(){
                $('#buscar_cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select : function(event, ui){
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
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
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
function fecha()
  {
	  $('#txt_fechai').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
	  $('#txt_fechae').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
				 $('#txt_fechai_servicio').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
	  $('#txt_fechae_servicio').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
  }
  
  
  
function dias1()
{
var fecha1= document.getElementById('txt_fechai_servicio').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae_servicio').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);
var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));
        
		if(mes1 == '01')
{
	mesito = 'JANUARY';
}
else  if(mes1 == '02')
{
	mesito = 'FEBRUARY';
}
else  if(mes1 == '03')
{
	mesito = 'MARCH';
}
else  if(mes1 == '04')
{
	mesito = 'APRIL';
}
else  if(mes1 == '05')
{
	mesito = 'MAY';
}
else  if(mes1 == '06')
{
	mesito = 'JUNE';
}
else  if(mes1 == '07')
{
	mesito = 'JULY';
}
else  if(mes1 == '08')
{
	mesito = 'AUGUST';
}
else  if(mes1 == '09')
{
	mesito = 'SEPTEMBER';
}
else  if(mes1 == '10')
{
	mesito = 'OCTOBER';
}
else  if(mes1 == '11')
{
	mesito = 'NOVEMBER';
}
else  if(mes1 == '12')
{
	mesito = 'DECEMBER';
}
ms = Date.parse(mesito +" "+ dia1+","+anyo1);
diasem =  new Date(ms).getDay();
dias = dias +1;
final=0;
inicio=0;

while(inicio < dias)
{
	if(diasem == 6 )
	{
		diasem=-1;
	}
	else if( diasem == 0)
	{
		
	}
	else
	{
		final++;
	}
	inicio++;
	diasem++;
}

      
		
		
document.getElementById('txt_cantidad_dias').value=final; 
}
function validar()
{
	actis = document.getElementById("actis");
	if(actis.checked == true)
	{
    document.getElementById("cod_rcla").disabled = true;

	document.getElementById("area").disabled = true;
	document.getElementById("razon").disabled = true;
	document.getElementById("txt_reclamos").disabled = false;

	
	}
	else
	{
	 document.getElementById("cod_rcla").disabled= false;	
	 	document.getElementById("area").disabled = false;
	document.getElementById("razon").disabled = false;
	document.getElementById("txt_reclamos").disabled = true;
	}
 
}
  
  
  function vacio()
{
	rochar = document.getElementById("rochar");
	
	if(rochar.value == "")
	{
		document.getElementById("ingresars").disabled = true;
	}
	else
	{
		document.getElementById("ingresars").disabled = false;
	}
}
  
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });
  
  function seleccion1()
{
Sillas = document.getElementById('Sillas');	
Produccion= document.getElementById('Produccion');	
General = document.getElementById('General');	
Despacho = document.getElementById('Despacho');
Instalacion = document.getElementById('Instalacion');
Servicio = document.getElementById('Servicio');

var Nombre = document.getElementById('txt_nombre_servicio').selectedIndex;

if(Nombre == '1')
{
	javascript:TINY.box.size(740,650,1)
	
	Sillas.style.display = "none";
	Servicio.style.display = "none";
	Produccion.style.display = "";
	Despacho.style.display = "none";
	General.style.display = "none";
	Instalacion.style.display = "none";
}
 
else if(Nombre == '2')
{
	javascript:TINY.box.size(740,650,1)	
	
	Sillas.style.display = "none";
	Produccion.style.display = "none";
    Servicio.style.display = "none";
    Instalacion.style.display = "none";
    General.style.display = "";
	Despacho.style.display = "";
}
else if (Nombre == '3')
{
	javascript:TINY.box.size(740,650,1)
	
	Sillas.style.display = "none";
	Produccion.style.display = "none";
    Servicio.style.display = "none";
	Instalacion.style.display = "";
	General.style.display = "";
	Despacho.style.display = "none";
}

else if (Nombre == '9')
{
	javascript:TINY.box.size(740,650,1)
	
	Sillas.style.display = "none";
	Produccion.style.display = "none";
	Servicio.style.display = "";
	Instalacion.style.display = "none";
	General.style.display = "none";
	Despacho.style.display = "none";
}
else if (Nombre == '6')
{
	javascript:TINY.box.size(740,650,1)
	
	Sillas.style.display = "";
	Servicio.style.display = "none";
	Produccion.style.display = "none";
	Instalacion.style.display = "none";
	General.style.display = "none";
	Despacho.style.display = "none";
}

else if (Nombre == '4' || '5' || '7' || '8')
{
	javascript:TINY.box.size(740,650,1)
	
	Sillas.style.display = "none";
	Servicio.style.display = "none";
	Produccion.style.display = "none";
	Instalacion.style.display = "none";
	General.style.display = "none";
	Despacho.style.display = "none";
	Desarrollo.style.display = "";
	Mantencion.style.display = "";
	Bodega.style.display = "";
	Sistema.style.display = "";
}

else 
{
	javascript:TINY.box.size(740,650,1)
	
   Sillas.style.display = "none";	
   Produccion.style.display = "none";
   Servicio.style.display = "none";
   Instalacion.style.display = "none";
   Despacho.style.display = "none";
   General.style.display = "none";
}

}

 function completar()
 {
  
                $('#rochar').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
                       
                   }
                 });
               
  }
  
  </script>

</head>


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

<body>
<div id='bread'><div id="menu1"></div></div>
<form action="" method="get">
<div id = 'contenedor-ins'>	
<h1>Informe Reclamo </h1>	
<table  id = "formulario">
<tr>
<td><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" value="<?php echo $DESDE;?>" /></td>
<td><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="<?php echo $HASTA;?>" /></td>
<td>
	<select   class="textbox" onchange="" id = "buscarfe" name = "buscarfe">
    <option value="">Buscar por</option>
    <option <?php echo $INICIO1;?> >INICIO</option>
    <option <?php echo $ENTREGA1;?> >ENTREGA</option>
   </select>
 </td>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php } else { ?>
<td>
<select name="buscar_vendedor" id="buscar_vendedor" type ="text" class="textbox" >
<option value="">Vendedor </option>
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
 <td style="font-size:14px;">
  <select class="textbox"  onchange="" id = "area" name = "area">
  <option value="">Nombre Servicio</option>
  <option>Adquisiciones</option>
  <option>Produccion</option>
  <option>Despacho</option>
  <option>Instalacion</option>
  <option>Desarrollo</option>
  <option>Mantencion</option>
  <option>Sillas</option>
  <option>Bodega</option>
  <option>Sistema</option>
  <option>Servicio Tecnico</option>
  <option>Prevención de Riesgos</option>
  <option>FI</option>
  </select>
  </td>

</tr> 
<tr>

<td><input placeholder="Rocha" class="textbox"  type="text" id="buscar_codigo" name="buscar_codigo" value="<?php echo $BUSCAR_CODIGO;?>"  ></td>
<td><input placeholder="Reclamo" class="textbox"  type="text" id="buscar_codigo_reclamo" name="buscar_codigo_reclamo" value=""  ></td>
<td style="font-size:14px;">
  <select class="textbox"  onchange="" id = "ESTADO" name = "ESTADO">
    <option value="">Estado</option>
    <option <?php echo $TODOS1;?> >TODOS</option>
    <option <?php echo $PROCESO1;?>>EN PROCESO</option>
    <option <?php echo $NULO1;?>>NULO</option>
    <option <?php echo $OK1;?>>OK</option>
  </select>
</td>
<td>
<input placeholder="Cliente" class="textbox"  type="text" id="buscar_cliente" name="buscar_cliente" value="<?php echo $BUSCAR_CLIENTE;?>"  >
</td>
<td> <input class="boton" type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>

</tr>
<tr>



<td colspan="4" align="left">
<a href="ExcelInformeReclamo.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&ESTADO=<?php echo urlencode($ESTADOV);?>&buscarfe=<?php echo urlencode($buscaf);?>&buscar_codigo=<?php echo urlencode($BUSCAR_CODIGO);?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a></td>
<td width="85">
<input class="boton" type="button" onclick="TINY.box.show({url:'generarReclamo.php',width:740,height:650})" value="Generar" id="generar" name ="generar" />
</td>

</tr>	
</table>

</div>


<table class='recl' rules='all' frame='box'>

<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);

mysql_select_db($database_conn, $conn);










$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA,servicio.FECHA_REALIZACION,reclamos.CODIGO_RECLAMO,servicio.NOMBRE_SERVICIO, reclamos.AREA, reclamos.RAZON, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto,reclamos where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO AND  servicio.RECLAMOS = reclamos.CODIGO_RECLAMO ";	







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


if(empty($_GET['buscar_codigo_reclamo'])){



if($CLIENTE != '') 
{ 
$query_registro .= " and proyecto.NOMBRE_CLIENTE = '".$CLIENTE."' ";
}

if($BUSCAR_CODIGO != '') 
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";
}	
if($AREA != '') 
{ 
$query_registro .= " and servicio.NOMBRE_SERVICIO = '".$AREA."' ";
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
}else{
$query_registro .= " and reclamos.CODIGO_RECLAMO = '".$_GET['buscar_codigo_reclamo']."' ";



};













$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	$FECHA_CONFIRMACION = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$PREDECESOR = $row["PREDECESOR"];
	$DIAS = $row["DIAS"];
	$CODIGO_RECL =  $row["CODIGO_RECLAMO"];
    $AREA_RECL =  $row["AREA"];
	$RAZON_RECL =  $row["RAZON"];
	$NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
/*	if($FECHA_VARIABLE == $FECHA_INICIO)
	{
		$numero=1;
	}
	else
	{
		$numero = 0;
	}
	if($numero == 0)
	{	
	$FECHA_VARIABLE = $FECHA_INICIO;
	}
	$date = new DateTime($FECHA_INICIO);
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
	}*/
	if($numero == 0)
	{	
  //  echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
	echo"<tr>
	     <th>Rocha</th> 
		 <th>N°</th>
		 <th>Nombre Servicio</th>
	     <th>Reclamo</th>
		 <th>Area</th>
		 <th>Razon</th>
	     <th>Cliente</th>
		 <th>Descripcion</th>
		 <th>Observaciones</th>
		 <th><a id='fechai' href='InformeProyectoReclamos.php?buscarfe=INICIO&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha I</a></th>
		 <th>Fecha E</th>
		 <th><a id='fechac' href='InformeProyectoReclamos.php?buscarfe=ENTREGA&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha C</a></th>
		 <th>Dias</th>
         <th>Estado</th></tr>
		 ";
       $numero = 20;
    }
	
	if($FECHA_REALIZACION  == date("Y-m-d"))
	{
    echo  "<tr><td id='hoy'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	
	echo  "<td align='center' id='hoy'> <a align='center'
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=reclamo>" .$CODIGO_SERVICIO . "</a>
        </td>";
	echo  "<td id='hoy'>".($NOMBRE_SERVICIO)."</td>";
	echo  "<td align='center' id='hoy' onclick=TINY.box.show({url:'generarModificarReclamo.php?CODIGO_RECLAMO=" .urlencode($CODIGO_RECL). "'})>".($CODIGO_RECL)."</td>";
	echo  "<td id='hoy'>".($AREA_RECL)."</td>";
	echo  "<td id='hoy'>".($RAZON_RECL)."</td>";
	echo  "<td id='hoy'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td id='hoy'>".($DESCRIPCION)."</td>";
	echo  "<td id='hoy'>".($OBSERVACIONES)."</td>";
	echo  "<td id='hoy align='center'>".substr($FECHA_INICIO,0,11)."</td>";
	echo  "<td id='hoy' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
	if($FECHA_CONFIRMACION > $fecha7)
		{
	echo  "<td align='center' id='verde'>".substr($FECHA_CONFIRMACION,0,11)."</td>";
		}
		else if($FECHA_CONFIRMACION < date('Y-m-d'))
		{
	echo  "<td align='center' id='rojo'>".substr($FECHA_CONFIRMACION,0,11)."</td>";
		}
		else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
		{
	echo  "<td align='center' id='amarillo'>".substr($FECHA_CONFIRMACION,0,11)."</td>";		
		}
	echo  "<td id='hoy'align='center'>".($DIAS)."</td>";
	echo  "<td id='hoy'>".$ESTADO."</td></tr>";
	$numero--;
  }
  else
  {
	echo  "<tr><td> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td align='center'> <a align='center'
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=reclamo>" .$CODIGO_SERVICIO . "</a>
        </td>";
	echo  "<td>".($NOMBRE_SERVICIO)."</td>";
    echo  "<td align='center' onclick=TINY.box.show({url:'generarModificarReclamo.php?CODIGO_RECLAMO=" .urlencode($CODIGO_RECL). "'})>".($CODIGO_RECL)."</td>";
	echo  "<td>".($AREA_RECL)."</td>";
	echo  "<td>".($RAZON_RECL)."</td>";
	echo  "<td>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td>".($DESCRIPCION)."</td>";
    echo  "<td>".($OBSERVACIONES)."</td>";
	echo  "<td align='center'>".substr($FECHA_INICIO,0,11)."</td>";
	echo  "<td align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
	if($FECHA_CONFIRMACION > $fecha7)
		{
	echo  "<td align='center' id='verde'>".substr($FECHA_CONFIRMACION,0,11)."</td>";
		}
		else if($FECHA_CONFIRMACION < date('Y-m-d'))
		{
	echo  "<td align='center' id='rojo'>".substr($FECHA_CONFIRMACION,0,11)."</td>";
		}
		else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
		{
	echo  "<td align='center' id='amarillo'>".substr($FECHA_CONFIRMACION,0,11)."</td>";		
		}
	echo  "<td align='center' >".($DIAS)."</td>";
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
