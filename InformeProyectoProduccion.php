<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

/* Codigo Usuario */

$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];





/* Consulta Usuairo */
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
    $nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$apellido_m = $row["apellido_materno"];
	$numero++;
  }
mysql_free_result($result1);


/* Valores vacios */

$BUSCAR_CODIGO ='';
$VENDEDOR ='';
$PROCESO='';
$CATEGORIA='';
$BUSCAR_VENDEDOR='';
$BUSCAR_RECLAMO='';

/*Valor Estado */

$ESTADOV = $_GET["ESTADO"];


/* Valor Fecha */
$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';





/*bUSCAR EN BETWEEN */
$buscaf = "FECHA_ENTREGA";

/*ORDEN FECHA */
$ordenfecha = 'FECHA_ENTREGA';

if(isset($_GET["buscari"] ))
{
if($_GET["buscari"] == 'Confirmacion')
{
$ordenfecha = 'FECHA_ENTREGA';
}
else
{
$ordenfecha = 'FECHA_INICIO';
}
}



/*Valor traido Por el formulario */

if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{    

$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$buscaf = $_GET["buscarfe"];

if($buscaf == 'Confirmacion')
{
	$buscaf = 'FECHA_ENTREGA';
}
else if($buscaf == 'Entrega')
{
	$buscaf = 'FECHA_PRIMERA_ENTREGA';
}
else if($buscaf == 'Inicio')
{
	$buscaf = 'FECHA_INICIO';
}
if(isset($_GET["buscar_vendedor"] ))  
{
$BUSCAR_VENDEDOR = $_GET["buscar_vendedor"];
}
if(isset($_GET["buscar_reclamo"] ))  
{
$BUSCAR_RECLAMO= $_GET["buscar_reclamo"];
}
if(isset($_GET["categoria"] ))  
{
$CATEGORIA = $_GET["categoria"];
}
if(isset($_GET["PROCESO"] ))  
{
$PROCESO  = $_GET["PROCESO"];
}
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
}

/*Permiso Usuario */


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
   <title> Informe Produccion V1.5.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />



  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  
  <script type="text/javascript" src="js/jquery.min.js"></script>

 
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
   
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >    
  <script language = javascript>
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
function dias5()
{
var fecha1= document.getElementById('fechaini').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('culq').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));

fecha_texto = anyo1+"-"+mes1a+"-"+dia1;
ms = Date.parse(fecha1);
diasem =  new Date(ms).getDay();
dias = dias +1;
final = 0;
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
document.getElementById('diasini').value=final; 


//document.getElementById('dias_radicado').value= new Date(ms).getDay(); 
}
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
  }
  
  
function dias1()
{
var fecha1= document.getElementById('txt_fechai').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae').value;
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
final = 0;
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

      
document.getElementById('txt_dias').value=final; 
}
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	
  });
  </script>
</head>
<body>
	<div id='bread'><div id="menu1"></div></div>
<form action="" method="get" name="formulario">

<div id = 'contenedor-ins'>
<h1>Informe Producción</h1>
<table>
<tr>
<td ><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" value="" /></td>
<td ><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="" /></td>
<td> 
<select class="textbox" onchange="" id = "buscarfe" name = "buscarfe">
 <option value="" selected>Fecha</option>
<option>INICIO</option>
<option>ENTREGA</option>
</select>
</td>
<td ><input placeholder="Rocha" class="textbox"  type="text" id="buscar_codigo" name="buscar_codigo" value="<?php echo $BUSCAR_CODIGO;?>"  ></td>
<td> <input class="textbox" placeholder="Reclamo"   type="text" id="buscar_reclamo" name="buscar_reclamo" value=""  >  </td>

</tr> 

<tr>
<td>
<select class="textbox"  onchange="" id = "ESTADO" name = "ESTADO">
<option>EN PROCESO</option>
<option>TODOS</option>
<option>NULO</option>
<option>OK</option>
</select>
</td>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php } else { ?>
<td>
<select  class="textbox"  name="buscar_vendedor" id="buscar_vendedor" type ="text" class="textbox" >
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
 } mysql_free_result($result1);} 
 ?> 
</select>
</td>

<td>  <select class="textbox"  onchange="" id = "categoria" name = "categoria">
  <option value="">Categoria</option>
  <option>Proceso</option>
  <option>Proyecto</option>
  <option>Solicitud</option>

  </select> </td>
<td>
<select class="textbox" onchange="" id = "PROCESO" name = "PROCESO">
<option value="">Proceso</option>
<option>Armado</option>
<option>Barniz</option>
<option>Centro De Mecanizado</option>
<option>Corte</option>
<option>Enchape Curvo</option>
<option>Enchape Recto</option>
<option>Laminado</option>
<option>Limpieza</option>
<option>Mueble Especiales</option>
<option>Perforador Multiple</option>
<option>Ruteado</option>
</select>
</td>
<td > <input class="boton"  type="submit" id="buscar"  name = "buscar" value = "Buscar" /> </td>
</tr>

<tr>
<td><input type="text" value="Produccion" name = "nombreser" id="nombreser" style="display:none;"/>
<a onClick="document.formulario.action='InformeActividad.php'; document.formulario.submit();" target="_blank">
<img src="Imagenes/informe.png" style = "border:0px;" alt="Exportar a Excel"></a>
</td>
<td>
<a href="ExcelInformeProduccion.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&ESTADO=<?php echo urlencode($ESTADOV);?>&buscarfe=<?php echo urlencode($buscaf);?>&buscar_codigo=<?php echo urlencode($BUSCAR_CODIGO);?>&buscar_vendedor=<?php echo urlencode($BUSCAR_VENDEDOR);?>&categoria=<?php echo urlencode($CATEGORIA);?>&PROCESO=<?php echo urlencode($PROCESO);?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></a></td>
</tr>
</table>
</div>


</form>
<br />

<table class='prod' rules="all" frame="box">
<?php
mysql_select_db($database_conn, $conn);
function dameFecha2($fecha,$dia)
{   
	list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),7);


$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.PROGRESO,servicio.OC,servicio.CANTIDAD,servicio.FECHA_PRIMERA_ENTREGA,servicio.FECHA_REALIZACION, servicio.DIAS, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO  from  servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' ";	

if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
$query_registro .= " AND proyecto.ejecutivo = '".$nombres." ".$apellido." ".$apellido_m."' ";	
}

else if($VENDEDOR != '')
{ 
$query_registro .= " and proyecto.EJECUTIVO = '".($VENDEDOR)."' ";
}




if($BUSCAR_CODIGO != '') 
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";
}	

if($PROCESO != "")
{
	$query_registro .= " and servicio.PROCESO = '".$PROCESO."' ";
}
if($CATEGORIA != "")
{
	$query_registro .= " and servicio.CATEGORIA = '".$CATEGORIA."' ";
}

if($ESTADOV != 'TODOS')
{
$query_registro .= " and servicio.ESTADO = '".$ESTADOV."' ";
}

if($BUSCAR_RECLAMO!= '')
{
$query_registro .= " and servicio.RECLAMOS = '".$BUSCAR_RECLAMO."' ";
}


if(isset($_GET["buscari"] ))
{
if($_GET["buscari"] == 'Reclamo')
{
$query_registro .= " and not  servicio.RECLAMOS = '' ";
}
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
$FECHA_REALIZACION = "";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
    $PROGRESO = $row["PROGRESO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
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


	$query_registro= "SELECT count(`CODIGO_SERVICIO`) AS TOTAL_P FROM `servicio` WHERE `CODIGO_PROYECTO` = '".$CODIGO_PROYECTO."' and  `NOMBRE_SERVICIO` = 'Produccion' and categoria = 'proyecto'";
	$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

	 while($row = mysql_fetch_array($result1))
  	{
  		$TOTAL_P = $row["TOTAL_P"];
  	}
	mysql_free_result($result1);

	$LISTADO_OC = "";
  	$LISTADO_FINAL_OC  ="";
	$query_registro= "select DISTINCT  orden_de_compra.CODIGO_OC from orden_de_compra,proyecto,oc_producto where orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO AND proyecto.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' and orden_de_compra.NOMBRE_PROVEEDOR = 'Muebles&Diseños'";
	$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

	 while($row = mysql_fetch_array($result1))
  	{
  		$LISTADO_OC = $row["CODIGO_OC"];
  		$LISTADO_FINAL_OC.= $LISTADO_OC ." | ";
  	}
	mysql_free_result($result1);



	if($numero == 0)
	{	
 //   echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
	echo"<tr>
	     <th>Rocha</th> 
		 <th>N°</th>
		 <th>Proceso</th>
	     <th>Cliente</th>
		 <th>Descripcion</th>
		 <th>Observaciones</th>
		 <th><a style='color:#fff;text-decoration:none;' id='fechai' href='InformeProyectoProduccion.php?ESTADO=".$ESTADOV."&buscari=Inicio&txt_desde=".$txt_desde ."&txt_hasta=".$txt_hasta."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha I</a></th>
		 <th>Fecha E</th>
		 <th><a style='color:#fff;text-decoration:none;' id='fechae' href='InformeProyectoProduccion.php?ESTADO=".$ESTADOV."&buscari=Confirmacion&txt_desde=".$txt_desde."&txt_hasta=".$txt_hasta."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha C</a></th>
		 <th>Dias</th>
		 <th>OC</th>
		 <th><a style='color:#fff;text-decoration:none;' id='fechae' href='InformeProyectoProduccion.php?ESTADO=".$ESTADOV."&buscari=Reclamo&txt_desde=".$txt_desde."&txt_hasta=".$txt_hasta."&buscar_codigo=".$BUSCAR_CODIGO."'>Reclamo</a></th>
		 <th>Cantidad</th>
		 <th>Progreso</th>
         <th>Estado</th></tr>
		 ";
        $numero = 20;
    }	
	
	if($FECHA_REALIZACION  == date("Y-m-d"))
	{
	if($TOTAL_P == 0)
	{
		echo  "<tr><td id='alerta'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	}
	else
	{
		echo  "<tr><td id='hoy'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	}
    

	echo  "<td id='hoy'> <a style='color:#000;text-decoration:none;' 
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        </td>";
	echo  "<td id='hoy'>".($PROCESO)."</td>";
	echo  "<td id='hoy'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td id='hoy'>".($DESCRIPCION)."</td>";
	echo  "<td id='hoy'>".($OBSERVACIONES)."</td>";
	echo  "<td id='hoy' align='center' >".substr($FECHA_INICIO,0,11)."</td>";
	echo  "<td id='hoy' align='center' >".substr($FECHA_PRIMERA_ENTREGA,0,11)."</td>";	
		if($ESTADO == "OK")
		{
echo  "<td id='azul' align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
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
echo  "<td  id='amarillo' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";		
		}
		}
	echo  "<td id='hoy' align='center' >".($DIAS)."</td>";
	echo  "<td id='hoy' align='center' >".($LISTADO_FINAL_OC)."</td>";
	echo  "<td id='hoy' align='center' >".($RECLAMOS)."</td>";

	echo  "<td id='hoy' align='center' >".($CANTIDAD)."</td>";
	echo  "<td id='hoy' align='center'>".($PROGRESO)."</td>";
    echo  "<td id='hoy'>".$ESTADO."</td></tr>";
	}
	else
	{
		if($TOTAL_P == 0)
	{
		echo  "<tr><td id='alerta'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	}
	else
	{
		echo  "<tr><td> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	}
			
	echo  "<td> <a style='color:#000;text-decoration:none;' 
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        </td>";
	
	//echo  "<td>".($PREDECESOR)."</td>";
	echo  "<td>".($PROCESO)."</td>";
	echo  "<td>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td>".($DESCRIPCION)."</td>";
	echo  "<td>".($OBSERVACIONES)."</td>";
	echo  "<td align='center'>".substr($FECHA_INICIO,0,11)."</td>";
    echo  "<td align='center'>".substr($FECHA_PRIMERA_ENTREGA,0,11)."</td>";
		if($ESTADO == "OK")
		{
			echo  "<td id='azul'  align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else
		{		
		if($FECHA_ENTREGA > $fecha7)
		{
			echo  "<td id='verde' align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
			echo  "<td id='rojo' align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
			echo  "<td  id='amarillo'  align='center'>".substr($FECHA_ENTREGA,0,11)."</td>";		
		}
		}
	echo  "<td align='center'>".($DIAS)."</td>";
    echo  "<td align='center'>".($LISTADO_FINAL_OC)."</td>";
	echo  "<td align='center'>".($RECLAMOS)."</td>";
	echo  "<td align='center'>".($CANTIDAD)."</td>";
	echo  "<td align='center'>".($PROGRESO)."</td>";
    echo  "<td>".$ESTADO."</td></tr>";
	}
	$numero--;
	
  }

  mysql_free_result($result);
  mysql_close($conn);
 
?>
</table>
</body>
</html>