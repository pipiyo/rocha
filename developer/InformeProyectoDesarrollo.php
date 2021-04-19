<?php require_once('Conexion/Conexion.php'); ?>
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

$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO ='';
$INEN = "";
$DESDE = "";
$HASTA = "";
$ROCHAROCHA = "";
$BUSCARCODIGO1 = "";
$VENDEDOR ='';
$CATEGORIA='';



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
if (isset($_GET["buscar_vendedor"])) 
{ 
$VENDEDOR = $_GET["buscar_vendedor"];
}
if(isset($_GET["categoria"] ))  
{
$CATEGORIA = $_GET["categoria"];
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
  <title> Informe Desarrollo V1.3.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_informes.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link rel="stylesheet" href="style/estilopopup.css" />
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

      

document.getElementById('txt_dias').value= final; 
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
<center>
<table  id = "formulario">
<tr>
  <th id="tit_des" height="37" colspan="11" align="center" >Informe Desarrollo</th>
  </tr>











  
  
  
  
<tr>
<td width="80px">Desde</td>
<td width=""><input   class="textbox" name="txt_desde" id="txt_desde" type="text" value="" /></td>
<td width="80px" style="">Hasta</td>
  <td width="">
<input class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="" /></td>









  <td width="100px">
  Fecha 
  </td>
  <td>
  
  
  <select  class="textboxs"  onchange="" id = "buscarfe" name = "buscarfe">
    <option>Confirmacion</option>
    <option>Entrega</option>
    <option>Inicio</option>
  </select>
  </td>










<td width="80px">Rocha</td>
<td width=""><input class="textbox"  type="text" id="buscar_codigo" name="buscar_codigo" value=""  ></td>






</tr> 



<tr>








  
 
  <td>
  Estado
  </td>
  <td>
  <select class="textboxs"  onchange="" id = "ESTADO" name = "ESTADO">
    <option>EN PROCESO</option>
    <option>TODOS</option>
    <option>NULO</option>
    <option>OK</option>
  </select>
  </td>


















<td width="">Vendedor </td>
<td width="">

<select  name="buscar_vendedor" id="buscar_vendedor" type ="text" class="textboxs" >
<option> </option>
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





<td width=""></td>
<td  align="">   </td>


  <td>
  
  </td>
  <td>
 <input  type="submit" id="botondesarrollo" style="width:99%;" name = "buscar" value = "Buscar" />
  </td>


</tr>
<tr>


<td colspan="" align=""> 

<input type="text" value="Desarrollo" name = "nombreser" id="nombreser" style="display:none;"/>



<a onClick="document.formulario.action='InformeActividad.php'; document.formulario.submit();" target="_blank">
<img src="Imagenes/informe.png" style = "border:0px;" alt="Exportar a Excel"></a>

</td>




</tr>





</table>

</center>
</form>
<br />
<center>  
<table id = "informe_Desarrollo" cellpadding="0" cellspacing="0"  style="font-size:9px;width:98%;">

<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);

mysql_select_db($database_conn, $conn);


////Comienzo



if($BUSCAR_CODIGO!='')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA, servicio.DIAS,servicio.FECHA_REALIZACION, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Desarrollo' and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."'";
}
else if($CATEGORIA!='' && $ESTADOV =='TODOS')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA, servicio.DIAS,servicio.FECHA_REALIZACION, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Desarrollo' and servicio.Desarrollo = '".$CATEGORIA."' order by servicio.".$ordenfecha."";
}
else if($CATEGORIA!='')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA, servicio.DIAS,servicio.FECHA_REALIZACION, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Desarrollo' and servicio.Desarrollo = '".$CATEGORIA."' and servicio.ESTADO = '".$ESTADOV."' order by servicio.".$ordenfecha."";
}
else if($ESTADOV=='TODOS')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA,servicio.FECHA_REALIZACION, servicio.DIAS, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Desarrollo' and servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' order by servicio.".$ordenfecha."";
}
else if($VENDEDOR!='' && $ESTADOV =='TODOS')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA, servicio.DIAS,servicio.FECHA_REALIZACION, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Desarrollo' and proyecto.ejecutivo = '".$VENDEDOR."' and  order by servicio.".$ordenfecha."";
}
else if($VENDEDOR!='')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA, servicio.DIAS,servicio.FECHA_REALIZACION, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Desarrollo' and proyecto.ejecutivo = '".$VENDEDOR."' and servicio.ESTADO = '".$ESTADOV."'  order by servicio.".$ordenfecha."";
}
else
{
$query_registro = "select  DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_PRIMERA_ENTREGA,servicio.FECHA_REALIZACION, servicio.DIAS, servicio.RECLAMOS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO, servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.ESTADO = '".$ESTADOV."' and servicio.NOMBRE_SERVICIO = 'Desarrollo' and servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' order by servicio.".$ordenfecha."";
}














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
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$PREDECESOR = $row["PREDECESOR"];
	$RECLAMOS = $row["RECLAMOS"];
	$DIAS = $row["DIAS"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
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
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;' class='nueva_tabla_Desarrollo'><center>Rocha</center></th> 
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>N°</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Predecesor</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Proceso</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cliente</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descripcion</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Observaciones</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center><a style='color:#fff;text-decoration:none;' id='fechai' href='InformeProyectoDesarrollo.php?buscarfe=INICIO&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha I</a></center></th>
	 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center>Fecha E</center></th>
	
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center><a style='color:#fff;text-decoration:none;' id='fechae' href='InformeProyectoDesarrollo.php?buscarfe=ENTREGA&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha C</a></center></th>		
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>      
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Emisor</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Supervisor</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Reclamos</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>Estado</center></th></tr>
		 ";
       $numero = 20;
    }
	
	
	
		if($FECHA_REALIZACION  == date("Y-m-d"))
	{
	
    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	
 
	echo  "<td  style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'> <a style='color:#000;text-decoration:none;' 
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        </td>";
	
	
	
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'><center>".($PREDECESOR)."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($PROCESO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($DESCRIPCION)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($OBSERVACIONES)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'><center>".substr($FECHA_INICIO,0,11)."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'><center>".substr($FECHA_PRIMERA_ENTREGA,0,11)."</center></td>";

	if($ESTADO == "OK")
		{
echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#0000FF; color: white;'><center>".substr($FECHA_ENTREGA,0,11)."</center></td>";
		}
		else
		{
	
	if($FECHA_ENTREGA > $fecha7)
		{
echo  "<td  style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'><center>".substr($FECHA_ENTREGA,0,11)."</center></td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td  style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'><center>".substr($FECHA_ENTREGA,0,11)."</center></td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
echo  "<td  style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'><center>".substr($FECHA_ENTREGA,0,11)."</center></td>";		
		}
		}
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($DIAS)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($REALIZADOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($SUPERVISOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($RECLAMOS)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;background:#39C;'>".$ESTADO."</td></tr>";
	$numero--;
  }
  else
  {
	    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
		
	 
	echo  "<td  style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'> <a style='color:#000;text-decoration:none;' 
     	href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        </td>";
	
	
	
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($PREDECESOR)."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($PROCESO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DESCRIPCION)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBSERVACIONES)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_INICIO,0,11)."</center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_PRIMERA_ENTREGA,0,11)."</center></td>";
	if($ESTADO == "OK")
		{
echo  "<td  style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#0000FF; color: white;'><center>".substr($FECHA_ENTREGA,0,11)."</center></td>";
		}
		else
		{	
	if($FECHA_ENTREGA > $fecha7)
		{
echo  "<td  style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'><center>".substr($FECHA_ENTREGA,0,11)."</center></td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td  style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'><center>".substr($FECHA_ENTREGA,0,11)."</center></td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
echo  "<td  style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'><center>".substr($FECHA_ENTREGA,0,11)."</center></td>";		
		}
		}
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DIAS)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($REALIZADOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($SUPERVISOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($RECLAMOS)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;'>".$ESTADO."</td></tr>";
	$numero--;
  }
  
  }
  
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>

</body>
</html>
