<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
$query_registro = "select empleado.nombres, empleado.apellido_paterno , empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;


 while($row = mysql_fetch_array($result1))
  {
  $nombres = $row["nombres"];
  $apellido = $row["apellido_paterno"];
  $apellidom = $row["apellido_materno"];
  $numero++;
  }
mysql_free_result($result1);
ini_set('max_execution_time', 500);

$nombres = ($nombres);
$apellido = ($apellido);
$apellidom= ($apellidom);


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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
 <title>Cuadro Produccion V1.1.1</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <meta http-equiv="X-UA-Compatible" content="IE=5" />
  <meta http-equiv="X-UA-Compatible" content="IE=7" />
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
  <meta http-equiv="X-UA-Compatible" content="IE=8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="X-UA-Compatible" content="chrome=18" /

  <meta http-equiv="X-UA-Compatible" content="chrome=1" />



  
  <link rel="stylesheet" type="text/css" href="Style/style_proyecto.css" />
  


  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
 <script> 













 // select all desired input fields and attach tooltips to them
      $("title").tooltip({
  events: {
  input: 'click, blur',
  checkbox: 'mouseover click, mouseout',
  date: 'click, blur'
  }
  });















 

 function redireccionar() 
{
location.href="InformeProyectoRochaVendedor.php?ESTADO=TODOS";
} 
 function redireccionar1() 
{
  window.open("ingresoProyecto.php");
} 
 function redireccionar2() 
{
location.href="InformeProyectoRocha.php?ESTADO=TODOS";
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
                $('#buscarcli').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
           function(event, ui)
           {
                       
                   }
                 });
            });
  $(function(){
                $('#buscareje').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : 
           function(event, ui)
           {
                       
                   }
                 });
            });   
 
function colorear1()
{  
  var rangop= document.getElementById('rangopositivo').value;
  var rangon= document.getElementById('rangonegativo').value;
  valor1 = parseInt(parseInt(rangop) + parseInt(rangon));
  fina = parseFloat(parseFloat(rangop) + parseFloat(rangon))
  fina1 = parseFloat(fina) + 1;
  

contador = 0; 
contador2 = 0;
contador1 = 0;
contador3 = 0;
contador5 = 0;
contador6 = 1;

while(contador < 50000 )
{
  if(contador1 == fina1){contador1 = 0;} /////////////////txt
  
  while(contador1 <= fina) ////////// txt
 {
///////////////////////////////////////////////////////////////////////////////////      
var fecha1= document.getElementById('cil'+contador).value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('cul'+contador3).value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);

var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));

//////////////////////////////////////////////////////////////////////////////////

    valor3 = document.getElementById('cul'+contador3).value;      
    valor1 = document.getElementById('cil'+contador).value;            
    valor2 = document.getElementById('cal'+contador1).value;   
    valor4 = document.getElementById('rep'+contador).value;   
         
  if(valor1 == valor2)
  { 
    while(dias >= 0)
    {
    fin =parseInt(contador2)+parseInt(dias);
    fin1 =parseInt(contador2)+parseInt(dias)+1;
    tot =parseInt(contador6) * fina1; 
    while(fin1 <= tot)
    {
    if(valor4 <= dias)
    {
    document.getElementById('cel'+fin).style.backgroundColor="#A4A4A4"; 
        }
        else
        {
    document.getElementById('cel'+fin).style.backgroundColor="#A4A4A4"; 

        }   
    fin1++;
      } 
    dias--;
      }
  }
  else if (valor3 == valor2)
    {
    while(dias >= 0)
    { 
    fin =parseInt(contador2)-parseInt(dias);
    fin1 =parseInt(contador2)-parseInt(dias);
    tot =parseInt(contador5)*fina1-1; 
    while(fin1 > tot)
    {
    if(valor4 <= dias)
    {
    document.getElementById('cel'+fin).style.backgroundColor="#A4A4A4";
    }
    else
        {
    document.getElementById('cel'+fin).style.backgroundColor="#6E6E6E";

        }
    fin1--;
    }       
    dias--;
    }
    }
  contador1++;
  contador2++;
  }
  contador++;
  contador3++;
  contador5++;
  contador6++;
}
}
function fecha()
{
    $( "#cul" ).datepicker({dateFormat: 'yy-mm-dd'});
    
}
  
function enviar()
{
var as1= confirm("Realmente deseas modificar");

if(as1)                   
{
  document.getElementById("formulario1").submit();
}
else
{
  return false;
  //window.location="Materiales.php";
}
} 
 </script>
 
 <?php
 $buscarcod = "";
 $buscarcli = "";
 $buscareje = "";
 $positivo = "3";
 $negativo = "14"; 
 $suma1 = "";
 $suma2 = ''; 
if (isset($_GET["estado"])) 
{    
$estado = $_GET['estado'];
}
else
{
$estado = 'EN PROCESO';	
}
if($estado == 'EN')
{
$estado = 'EN PROCESO';
} 
 
if (isset($_GET["buscar"])) 
{      
$positivo = $_GET["rangopositivo"];
$negativo = $_GET['rangonegativo'];
$suma1 = $_GET["rangopositivo"];
$suma2 = $_GET['rangonegativo'];
$estado = $_GET['estado'];
$buscarcod  = $_GET['buscarcod'];
$buscarcli  = $_GET['buscarcli'];
if (isset($_GET["buscareje"]))
{
$buscareje  = $_GET['buscareje'];
}
}


?>
</head>
<body onload = "colorear1();">
<div id='bread'><div id="menu1"></div></div>

<center><h1>Cuadro Producción </h1> 
<br />  
  <form  method="GET" action="" />      
  <table>
  <tr>
  <td  width="50">Rango- </td>
  <td width="142"> <input type="text" style="border:grey 1px solid;border-radius: 8px;" autocomplete="off" id="rangonegativo" name="rangonegativo" value='<?php echo $suma2 ?>' /> </td>
   <td width="52">Rango+ </td>
  <td width="146"> <input type="text" style="border:grey 1px solid;border-radius: 8px;" autocomplete="off" id="rangopositivo" name="rangopositivo" value='<?php echo $suma1 ?>' /> </td>
  <td width="28">Cod </td>
  <td width="146"><input type="text" style="border:grey 1px solid;border-radius: 8px;" autocomplete="off" id="buscarcod" name="buscarcod" value='<?php echo urldecode($buscarcod) ?>' /></td>
  <td width="28">Clien </td>
  <td width="146"><input type="text" style="border:grey 1px solid;border-radius: 8px;" autocomplete="off" id="buscarcli" name="buscarcli" value='<?php echo urldecode($buscarcli) ?>' /></td>
 <?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
  { } else{ ?>
  <td width="28">Ejecu </td>
  <td width="146"><input type="text" style="border:grey 1px solid;border-radius: 8px;" autocomplete="off" id="buscareje" name="buscareje" value='<?php echo urldecode($buscareje) ?>' /></td>
  <?php } ?>
  <td width="111"><select style="border:grey 1px solid;border-radius: 8px;" id = "estado" name = "estado">
  <option><?php echo $estado ?></option>
  <option>EN PROCESO</option>
  <option>OK</option>
  <option>NULA</option>
  <option>ACTA</option>
  </select></td>
  <td width="10">&nbsp;  </td>
  <td width="173"><input style="border:grey 1px solid;border-radius: 8px; background:#006; color:#FFF;" type="submit" name = "buscar" id='buscar' value="Buscar"/> </td>
  </tr>
  
  </table>  
  <br />

 </form>  
 </center>
<form action = 'scriptActualizarProyecto.php' method='post' id='formulario1'>







<div id="inputs">







<input style = "display:none;" type = 'text' id = 'dos' name='dos' value="<?php echo $estado; ?>"/>

<center>
  
  <h2>Proceso </h2>
    <table rules="all" border="1">
    <tr>
    <td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Corte</td>
 <td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Ruteado</td>
<td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Enchape Recto</td>
<td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Enchape Curvo</td>
<td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Laminado</td>
<td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Perforado</td>
<td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Barniz</td>
<td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Armado</td>
<td align="center" style="background:#FE642E;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% ); color:#fff;">Limpieza</td>
    </tr>
    <tr>
    <td width="100" style="background:#FE642E;">&nbsp; </td>
    <td width="100" style="background:#04B4AE;">&nbsp; </td>
    <td width="100" style="background:#FE2E9A;">&nbsp; </td>
    <td width="100" style="background:#F3F781;">&nbsp; </td>
    <td width="100" style="background:#088A4B;">&nbsp; </td>
    <td width="100" style="background:#8A2908;">&nbsp; </td>
    <td width="100" style="background:#A5DF00;">&nbsp; </td>
    <td width="100" style="background:#0A0A2A;">&nbsp; </td>
    <td width="100" style="background:#FE2E2E;">&nbsp; </td>
    </tr>
    </table>
   <br />
<?php
function dameFecha($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('d/m/Y',mktime(0,0,0,$mon,$day+$dia,$year));        
}
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
function dameFecha1($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('N',mktime(0,0,0,$mon,$day+$dia,$year));        
}
function dameFecha3($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha3(date('d/m/Y'),7);

$linkEntrega = 'entrega';
$linkIngreso = 'ingreso';
$linkConfirmacion = 'confirmacion';
$fin=0;
echo "<table class='datagrid' border='1' cellspacing='0' cellpadding='0'>
<thead>
 <tr>
      <th width='100' id='rocha' rowspan='3'><center>Rocha</center></th>
      <th width='100'id='cliente'rowspan='3'><center>Cliente</center></th>
      <th width='100' rowspan='3'><center>Obra</center></th>
      <th width='100'rowspan='3'><center>Neto</center></th>
      <th rowspan='3'><center>Ejecutivo</center></th>
      <th width='100'rowspan='3'><center><a id='linkIngreso' href=CuadroProduccion.php?linkIngreso=".$linkIngreso."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha Ingreso </a></center></th>
      <th width='100' rowspan='3'><center><a id='linkEntrega' href=CuadroProduccion.php?linkEntrega=".$linkEntrega."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha de Entrega Solicitada </a></center></th>
      <th width='100' rowspan='3'><center><a id='linkConfirmacion' href=CuadroProduccion.php?linkConfirmacion=".$linkConfirmacion."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha de Entrega Real </a></center></th>
      
      <th width='100' rowspan='3'><center>Dias</center></th>";

 if($positivo == "")
 {    
 $contador = -$_GET['rangonegativo'];
 $contador1 = -$_GET['rangonegativo'];
 $contador2 = -$_GET['rangonegativo'];
 $contador3 = -$_GET['rangonegativo'];
 $contadorA = -$_GET['rangonegativo'];
 $contadorB = -$_GET['rangonegativo'];
 $ranngop = $_GET["rangopositivo"];
 $sumf = $_GET["rangopositivo"] + 1;
 $resta = -$_GET['rangonegativo']; 
}
else
{
 $resta = -$negativo; 
 $contador =  -$negativo;   
 $contador1 = -$negativo; 
 $contador2 = -$negativo; 
 $contador3 = -$negativo; 
 $contadorA = -$negativo;
 $contadorB = -$negativo;
 $ranngop = $positivo;
 $sumf = ($positivo + 1);
}
 $contador4 = 0; 
 $contador5 = 0;     
 $numero = 0;
 $contador6 = 0;





 while($contador <= $ranngop)/////////////// valor txt
 {
  switch (dameFecha1(date('d/m/Y'),$contador)) {
    case "1":
        $dia = "Lu";
        break;
    case "2":
        $dia = "Ma";
        break;
    case "3":
       $dia = "Mi";
        break;
  case "4":
        $dia = "Ju";
        break;
    case "5":
        $dia = "Vi";
        break;
    case "6":
        $dia = "Sa";
        break;
  case "7":
        $dia = "Do";
        break;
}









if($estado == "EN"){$estado = "EN PROCESO";}




////////////
if($estado == 'EN PROCESO'){
////////

echo"<th id= 'fd".$contador."' width='3'>".$dia."</th>";
 $contador++;

//////
} else {
////////

echo"<th style='display:none;' id= 'fd".$contador."' width='3'>".$dia."</th>";
 $contador++;

/////////////
}
//////////







}
echo "</tr><tr>"; 
while($contador1 <= $ranngop) /// valor txt
{







////////////
if($estado == 'EN PROCESO'){
////////

 echo"<th id= 'ff".$contador1."'>".substr(dameFecha(date('d/m/Y'),$contador1),0,2)."</th> ";
 $contador1++;

//////
} else {
////////

 echo"<th style='display:none;' id= 'ff".$contador1."'>".substr(dameFecha(date('d/m/Y'),$contador1),0,2)."</th> ";
 $contador1++;

/////////////
}
//////////







}
echo "</tr><tr>"; 
while($contador3 <= $ranngop)///////// valor txt
{
 echo"
 <th style='display:none;'><input type = 'text' id= 'cal".$contador5."' value='".dameFecha2(date('d/m/Y'),$contador3)."' </th>";
 $contador3++;
 $contador5++;
}
echo "</tr></thead>";














if (isset($_GET["linkEntrega"])) 
{
$estado = $_GET["estado"];

if($estado == "EN"){$estado = "EN PROCESO";}

if($buscarcod == "" && $buscarcli == ""  && $buscareje == "")
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."' and proyecto.EJECUTIVO = '".($nombres)." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO  ORDER BY servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{


mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;



}
}
else if($buscarcod != "" && $buscarcli == ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO  ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO  ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

}/// Termino de else if
else if($buscarcod == "" && $buscarcli != ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and NOMBRE_CLIENTE = '".$buscarcli. "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and NOMBRE_CLIENTE  = '".$buscarcli. "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO  ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

}/// Termino de else if

else if($buscarcod == "" && $buscarcli == ""  && $buscareje != "") //// else if 
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.EJECUTIVO  = '".($buscareje). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;


}/// Termino de else if
else if($buscarcod != "" && $buscarcli != ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO  ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if

else if($buscarcod != "" && $buscarcli == ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO  ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
else if($buscarcod != "" && $buscarcli != ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".$nombres ." ".$apellido." ".$apellidom."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
else if($buscarcod == "" && $buscarcli != ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.EJECUTIVO  = '".($buscareje). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY  servicio.FECHA_PRIMERA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}

}

///// Comienzo else if
else if($buscarcod == "" && $buscarcli == ""  && $buscareje == "")
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."' and proyecto.EJECUTIVO = '".($nombres)." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}
else if($buscarcod != "" && $buscarcli == ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

}/// Termino de else if
else if($buscarcod == "" && $buscarcli != ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and NOMBRE_CLIENTE = '".$buscarcli. "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and NOMBRE_CLIENTE  = '".$buscarcli. "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

}/// Termino de else if

else if($buscarcod == "" && $buscarcli == ""  && $buscareje != "") //// else if 
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.EJECUTIVO  = '".($buscareje). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;


}/// Termino de else if
else if($buscarcod != "" && $buscarcli != ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if

else if($buscarcod != "" && $buscarcli == ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
else if($buscarcod != "" && $buscarcli != ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".$nombres ." ".$apellido." ".$apellidom."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
else if($buscarcod == "" && $buscarcli != ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.EJECUTIVO  = '".($buscareje). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
///////////////////////////////////////////////////////////////////////
if (isset($_GET["linkIngreso"])) 
{
$estado = $_GET["estado"];
if($estado == "EN"){$estado = "EN PROCESO";}
if($buscarcod == "" && $buscarcli == ""  && $buscareje == "")
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."' and proyecto.EJECUTIVO = '".($nombres)." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}
else if($buscarcod != "" && $buscarcli == ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

}/// Termino de else if
else if($buscarcod == "" && $buscarcli != ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and NOMBRE_CLIENTE = '".($buscarcli). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

}/// Termino de else if

else if($buscarcod == "" && $buscarcli == ""  && $buscareje != "") //// else if 
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.EJECUTIVO  = '".($buscareje). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;


}/// Termino de else if
else if($buscarcod != "" && $buscarcli != ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if

else if($buscarcod != "" && $buscarcli == ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
else if($buscarcod != "" && $buscarcli != ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".$nombres ." ".$apellido." ".$apellidom."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
else if($buscarcod == "" && $buscarcli != ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.EJECUTIVO  = '".($buscareje). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_INICIO ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}
}
////
if (isset($_GET["linkConfirmacion"])) 
{
$estado = $_GET["estado"];
if($estado == "EN"){$estado = "EN PROCESO";}
if($buscarcod == "" && $buscarcli == ""  && $buscareje == "")
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."' and proyecto.EJECUTIVO = '".($nombres)." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}
else if($buscarcod != "" && $buscarcli == ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and not servicio.ESTADO =  'NULO' and servicio.CATEGORIA = 'Proyecto' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

}/// Termino de else if
else if($buscarcod == "" && $buscarcli != ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and NOMBRE_CLIENTE = '".($buscarcli). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}

}/// Termino de else if

else if($buscarcod == "" && $buscarcli == ""  && $buscareje != "") //// else if 
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.EJECUTIVO  = '".($buscareje). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;


}/// Termino de else if
else if($buscarcod != "" && $buscarcli != ""  && $buscareje == "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and not servicio.ESTADO =  'NULO' and servicio.CATEGORIA = 'Proyecto' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if

else if($buscarcod != "" && $buscarcli == ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and not servicio.ESTADO =  'NULO' and servicio.CATEGORIA = 'Proyecto' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
else if($buscarcod != "" && $buscarcli != ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.EJECUTIVO = '".$nombres ." ".$apellido." ".$apellidom."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and proyecto.CODIGO_PROYECTO = '".($buscarcod). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and not servicio.ESTADO =  'NULO' and servicio.CATEGORIA = 'Proyecto' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}/// Termino de else if
else if($buscarcod == "" && $buscarcli != ""  && $buscareje != "") //// else if 
{
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio WHERE servicio.ESTADO = '".($estado)."'and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.EJECUTIVO = '".($nombres) ." ".($apellido)." ".($apellidom)."' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO  ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
else
{ 
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT DISTINCT proyecto.CODIGO_PROYECTO,PROYECTO.NOMBRE_CLIENTE,PROYECTO.OBRA,PROYECTO.MONTO,PROYECTO.EJECUTIVO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA,servicio.FECHA_PRIMERA_ENTREGA,PROYECTO.DIAS,PROYECTO.REPROGRAMACION,servicio.FECHA_REALIZACION,PROYECTO.FECHA_ACTA from proyecto,servicio  WHERE servicio.ESTADO = '".($estado)."' and NOMBRE_CLIENTE  = '".($buscarcli). "' and proyecto.EJECUTIVO  = '".($buscareje). "' and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Produccion' and servicio.CATEGORIA = 'Proyecto' and not servicio.ESTADO =  'NULO' GROUP BY proyecto.CODIGO_PROYECTO ORDER BY servicio.FECHA_ENTREGA ASC";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
}
}
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 while($row = mysql_fetch_array($result))
  {
    if($contador2 == $sumf)
     {
      $contador2 = $resta;
     }
     if($contador6 == 10)
     {
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 echo "<thead>
 <tr>
      <th id='rocha' rowspan='3'><center>Rocha</center></th>
      <th id='cliente'rowspan='3'><center>Cliente</center></th>
      <th rowspan='3'><center>Obra</center></th>
      <th rowspan='3'><center>Neto</center></th>
      <th rowspan='3'><center>Ejecutivo</center></th>
           <th width='100'rowspan='3'><center><a id='linkIngreso' href=CuadroProduccion.php?linkIngreso=".$linkIngreso."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha Ingreso </a></center></th>
         <th width='100' rowspan='3'><center><a id='linkEntrega' href=CuadroProduccion.php?linkEntrega=".$linkEntrega."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha de Entrega Solicitada </a></center></th>
        <th width='100' rowspan='3'><center><a id='linkConfirmacion' href=CuadroProduccion.php?linkConfirmacion=".$linkConfirmacion."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha de Entrega Real </a></center></th>
  
      <th rowspan='3'><center>Dias</center></th>";
 

 if($positivo == "")
 {    
 $contador = -$_GET['rangonegativo'];   
 $contador1 = -$_GET['rangonegativo']; 
 $contador2 = -$_GET['rangonegativo']; 
 $contador3 = -$_GET['rangonegativo']; 
 $contadorA = -$_GET['rangonegativo']; 
 $contadorB = -$_GET['rangonegativo'];
}   
else
{
 $contador =  -$negativo;   
 $contador1 = -$negativo; 
 $contador2 = -$negativo; 
 $contador3 = -$negativo;
 $contadorA = -$negativo; 
 $contadorB = -$negativo; 
 $ranngop = $positivo;
 $sumf = ($positivo + 1);
}
 $contador5 = 0;     
 $contador6 = 0;
 


 while($contador <= $ranngop) ///////// valor txt
 {
  switch (dameFecha1(date('d/m/Y'),$contador)) {
    case "1":
        $dia = "Lu";
        break;
    case "2":
        $dia = "Ma";
        break;
    case "3":
       $dia = "Mi";
        break;
  case "4":
        $dia = "Ju";
        break;
    case "5":
        $dia = "Vi";
        break;
    case "6":
        $dia = "Sa";
        break;
  case "7":
        $dia = "Do";
        break;
}
 







////////////
if($estado == 'EN PROCESO'){
////////

 echo" <th width='3' id= 'ff".$contador."'>".$dia."</th>";
 $contador++;


//////
} else {
////////


 echo" <th style='display:none;' width='3' id= 'ff".$contador."'>".$dia."</th>";
 $contador++;



/////////////
}
//////////




}
echo "</tr><tr>"; 
while($contador1 <= $ranngop) /////valor txt
{






////////////
if($estado == 'EN PROCESO'){
////////


 echo"<th id= 'ff".$contador1."'>".substr(dameFecha(date('d/m/Y'),$contador1),0,2)."</th> ";
 $contador1++;

//////
} else {
////////

 echo"<th style='display:none;' id= 'ff".$contador1."'>".substr(dameFecha(date('d/m/Y'),$contador1),0,2)."</th> ";
 $contador1++;

/////////////
}
//////////



}
echo "</tr><tr>"; 
while($contador3 <= $ranngop)///// valor txt
{
 echo"
 <th style='display:none;'><input type = 'text' id= 'cal".$contador5."' value='".dameFecha2(date('d/m/Y'),$contador3)."' </th>";
 $contador3++;
 $contador5++;
}
echo "</tr></thead>";
$contador6 = 0;
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
     }

  
  $CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];

  $CLIENTE = $row["NOMBRE_CLIENTE"];
  $OBRA = $row["OBRA"];

  $MONTO = $row["MONTO"];
  $EJECUTIVO = $row["EJECUTIVO"];
  

  
 
  $REPROGRAMACION = $row["REPROGRAMACION"];
  
 
  $FECHA_REALIZACION = $row["FECHA_REALIZACION"];

  $FECHA_ACTA = $row["FECHA_ACTA"];
  $FECHA_ACTUAL = date('Y-m-d');
  
  ////////////
    $controw = 1;
    $sql098 = "SELECT servicio.DIAS,servicio.FECHA_PRIMERA_ENTREGA,servicio.CATEGORIA,servicio.PROCESO, servicio.DESCRIPCION, servicio.ESTADO, servicio.FECHA_INICIO, servicio.FECHA_ENTREGA, proyecto.CODIGO_PROYECTO, proyecto.NOMBRE_CLIENTE, servicio.NOMBRE_SERVICIO, servicio.proceso
FROM servicio, proyecto
WHERE ( servicio.ESTADO =  'EN PROCESO' OR servicio.ESTADO =  'OK')
AND (
proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO
AND servicio.CODIGO_PROYECTO =  '".$CODIGO_PROYECTO."' and not categoria = 'Solicitud'  and not categoria = ''  AND NOMBRE_SERVICIO = 'Produccion' 
) order by categoria asc
";
      $result098 = mysql_query($sql098, $conn) or die(mysql_error());
      while($row = mysql_fetch_array($result098))
      {
		  $controw++;
      }
$query_registro = "SELECT  SUM(OC_PRODUCTO.TOTAL) AS TOTAL
FROM orden_de_compra, proyecto, oc_producto,oc_proveedor
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND proyecto.CODIGO_PROYECTO  =  oc_producto.ROCHA  AND oc_producto.ROCHA = '".$CODIGO_PROYECTO."' AND orden_de_compra.CODIGO_OC = oc_proveedor.CODIGO_OC
AND oc_proveedor.CODIGO_PROVEEDOR = '80' ";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;


 while($row = mysql_fetch_array($result1))
  {
	  $fin+=$row['TOTAL'];
  $TOTALOC = $row["TOTAL"];
  }
	  
	  
$sql098 = "SELECT servicio.DIAS,servicio.FECHA_PRIMERA_ENTREGA,servicio.CATEGORIA,servicio.PROCESO, servicio.DESCRIPCION, servicio.ESTADO, servicio.FECHA_INICIO, servicio.FECHA_ENTREGA, proyecto.CODIGO_PROYECTO, proyecto.NOMBRE_CLIENTE, servicio.NOMBRE_SERVICIO, servicio.proceso
FROM servicio, proyecto
WHERE ( servicio.ESTADO =  'EN PROCESO' OR servicio.ESTADO =  'OK')
AND (
proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO
AND servicio.CODIGO_PROYECTO =  '".$CODIGO_PROYECTO."' and categoria = 'Proyecto'  and not categoria = ''  AND NOMBRE_SERVICIO = 'Produccion' 
) order by categoria asc
";
      $result098 = mysql_query($sql098, $conn) or die(mysql_error());
      while($row = mysql_fetch_array($result098))
      {
		  
		  if($estado == 'EN PROCESO')
		  {
		  if($row["ESTADO"] == 'OK' && $row["CATEGORIA"] == 'Proyecto' )
	  {
      
	  }
	  else
	  {
	  $FECHA_CONFIRMACION = $row["FECHA_ENTREGA"];	   
      $FECHA_INGRESO = $row["FECHA_INICIO"];
      $FECHA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	   $DIAS = $row["DIAS"];
	  }
		  }
		  else
		  {
			  	  $FECHA_CONFIRMACION = $row["FECHA_ENTREGA"];	   
      $FECHA_INGRESO = $row["FECHA_INICIO"];
      $FECHA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	   $DIAS = $row["DIAS"];
		  }
      }	  
	  
  /////////////  
  if($FECHA_REALIZACION  == date("Y-m-d"))
  {
  
     echo "<tr><td rowspan='".$controw."' id='hola' style='background:#9FF;' ><center> <a target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . 
      $CODIGO_PROYECTO . "</a><input style='display:none' name='rocha".$numero."' id = 'rocha".$numero."' type='text' value='".$CODIGO_PROYECTO."'/> </center></td>";
    
   echo "<td style='background:#9FF;' rowspan='".$controw."'><center>" . 
      $CLIENTE ."</center></td>"; 
     echo "<td style='background:#9FF;' rowspan='".$controw."'><center>" . 
      ($OBRA) . "</center></td>";
     echo "<td style='background:#9FF;' rowspan='".$controw."'><center>" . 
       number_format($TOTALOC,0, ",", "."). "</center></td>";
   echo "<td style='background:#9FF;' rowspan='".$controw."'><center>" . 
       ($EJECUTIVO). "</center></td>";
     
  echo "<td style='background:#9FF;' rowspan='".$controw."'><center><input style='background:#9FF;' id = 'cil".$numero."' name='cil".$numero."' type='text' value='".$FECHA_INGRESO."' class='textf'/></center></td>";
  echo "<td style='background:#9FF;' rowspan='".$controw."'><center><input style='background:#9FF;' id = 'col".$numero."'  name='col".$numero."' type='text' value='".$FECHA_ENTREGA."' class='textf'/></center></td>";
  echo "<td style='background:#9FF;' rowspan='".$controw."'><center><input style='background:#9FF;' id = 'cul".$numero."'  name='cul".$numero."' onchange='enviar();' type='text' value='".$FECHA_CONFIRMACION."' class='textf'/></center></td>"; 

  
  }
  else
  {

     echo "<tr><td rowspan='".$controw."' id='hola' ><center> <a target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . 
      $CODIGO_PROYECTO ."</a><input style='display:none' name='rocha".$numero."' id = 'rocha".$numero."' type='text' value='".$CODIGO_PROYECTO."'/> </center></td>";
    
   echo "<td rowspan='".$controw."'><center>" . 
      ($CLIENTE) ."</center></td>";  
     echo "<td rowspan='".$controw."'><center>" . 
      ($OBRA) . "</center></td>";
     echo "<td rowspan='".$controw."'><center>" . 
       number_format($TOTALOC,0, ",", "."). "</center></td>";
   echo "<td rowspan='".$controw."'><center>" . 
       ($EJECUTIVO). "</center></td>";
     
  echo "<td rowspan='".$controw."'><center><input id = 'cil".$numero."' name='cil".$numero."' type='text' value='".$FECHA_INGRESO."' class='textf'/></center></td>";
    echo "<td rowspan='".$controw."'><center><input id = 'col".$numero."'  name='col".$numero."' type='text' value='".$FECHA_ENTREGA."' class='textf'/></center></td>";
  echo "<td rowspan='".$controw."'><center><input  id = 'cul".$numero."'  name='cul".$numero."' onchange='enviar();' type='text' value='".$FECHA_CONFIRMACION."' class='textf'/></center></td>"; 

  } 








  if($FECHA_CONFIRMACION < $FECHA_ACTUAL && $estado == "EN PROCESO")

  {
    echo "<td rowspan='".$controw."' style='background-color:red;color:#fff;'><center>".$DIAS."/(R)</center><input style='display:none' name='dis".$numero."' id = 'dis".$numero."' type='text' value='".$DIAS."'/>
  <input style='display:none' name='rep".$numero."' id = 'rep".$numero."' type='text' value='0'/></td>";
  }
    else if($FECHA_CONFIRMACION > $fecha7 && $estado == "EN PROCESO")
  {
    echo "<td rowspan='".$controw."' style='background-color:#158115;color:#fff;'><center>".$DIAS."/(R)</center><input style='display:none' name='dis".$numero."' id = 'dis".$numero."' type='text' value='".$DIAS."'/>
  <input style='display:none' name='rep".$numero."' id = 'rep".$numero."' type='text' value='0'/></td>";
  }
    else if($FECHA_CONFIRMACION >= date('Y-m-d')  && $FECHA_CONFIRMACION <= $fecha7 && $estado == "EN PROCESO")
  {
    echo "<td rowspan='".$controw."' style='background-color:#F7F059;color:#000;border-right:#E4E4E7 1px solid;'><center>".$DIAS."/(R)</center><input style='display:none' name='dis".$numero."' id = 'dis".$numero."' type='text' value='".$DIAS."'/>
  <input style='display:none' name='rep".$numero."' id = 'rep".$numero."' type='text' value='0'/></td>";
  }
  else
  {
  echo "<td rowspan='".$controw."' style='background-color:#355C94;color:#fff;border-right:#E4E4E7 1px solid;'><center>".$DIAS."/(R)</center><input   style='display:none' name='dis".$numero."' id = 'dis".$numero."' type='text' value='".$DIAS."'/>
  <input style='display:none' name='rep".$numero."' id = 'rep".$numero."' type='text' value='0'/></td>";
  }










  echo "<div>";
     while($contador2 <= $ranngop ) ///////// valor txt 
    { 






////////////
if($estado == 'EN PROCESO'){
////////






	  
	  $contador2++;
	  $contador4++;
	  


////////////
} else {
////////



    $contador2++;
    $contador4++;



////////////
}
////////

    }  
     echo "</tr>";

//comiezo 
 
    $sql555 = "SELECT servicio.CODIGO_SERVICIO,servicio.CATEGORIA,servicio.PROCESO, servicio.DESCRIPCION, servicio.ESTADO, servicio.FECHA_INICIO, servicio.FECHA_ENTREGA, proyecto.CODIGO_PROYECTO, proyecto.NOMBRE_CLIENTE, servicio.NOMBRE_SERVICIO, servicio.proceso
FROM servicio, proyecto
WHERE ( servicio.ESTADO =  'EN PROCESO' OR servicio.ESTADO =  'OK')
AND (
proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO
AND servicio.CODIGO_PROYECTO =  '".$CODIGO_PROYECTO."' and not categoria = 'Solicitud'  and not categoria = ''  AND NOMBRE_SERVICIO = 'Produccion'
) order by categoria DESC
";
      $result555 = mysql_query($sql555, $conn) or die(mysql_error());
      while($row = mysql_fetch_array($result555))
      {
        echo "<tr>";
      $contadorB = $resta;
      $SFECHA_INICIO = $row["FECHA_INICIO"];
      $SFECHA_ENTREGA = $row["FECHA_ENTREGA"];
      $NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"];
      $SERVICIO_ESTADO = $row["ESTADO"];
      $SERVICIO_DESCRIPCION = $row["DESCRIPCION"];
      $SERVICIO_CATEGORIA = $row["CATEGORIA"];
	  $SERVICIO_PROCESO = $row["PROCESO"];
	  $CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
      $contadorC = 0;
      while($contadorB <= $ranngop ) 
      {     
          
        
	  if($row["ESTADO"] == 'OK' && $row["CATEGORIA"] == 'Proyecto' )
	  {
      
	  }
	  else
	  {

////////////
if($estado == 'EN PROCESO'){
////////





        if(dameFecha2(date('d/m/Y'),$contadorB + 1) >= $SFECHA_INICIO and dameFecha2(date('d/m/Y'),$contadorB ) <= $SFECHA_ENTREGA and $SERVICIO_ESTADO == "EN PROCESO")
			  {
				  
				  if($SERVICIO_CATEGORIA == 'Proyecto')
				  {
					   echo "<td title='". $CODIGO_SERVICIO."' style='background:#ccc; height:2px;border-top:#E4E4E7 1px solid;'></td>";
				  }
				  else
				  {
				   switch($SERVICIO_PROCESO)
				   {
					   case 'Corte':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' id='hola11' style='background:#FE642E;height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case 'Ruteado':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#04B4AE; height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case 'Enchape Recto':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#FE2E9A; height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case 'Enchape Curvo':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#F3F781; height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case 'Laminado':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#088A4B; height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case 'Perforado':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#8A2908; height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case 'Barniz':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#A5DF00; height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case 'Armado':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#0A0A2A;; height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case 'Limpieza':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#FE2E2E; height:2px;border-top:#E4E4E7 1px solid;'></td>";
					   break;
					   case '':
				       echo "<td></td>";
					   break;
				   }
				  }
			  }
			  else if(dameFecha2(date('d/m/Y'),$contadorB + 1) >= $SFECHA_INICIO and dameFecha2(date('d/m/Y'),$contadorB) <= $SFECHA_ENTREGA and $SERVICIO_ESTADO == "OK")
			  {
				    if($SERVICIO_CATEGORIA == 'Proyecto')
				  {
					   echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#ccc; height:2px;border-top:#E4E4E7 1px solid;'>&curren;</td>";
				  }
				  else
				  {
				   switch($SERVICIO_PROCESO)
				   {
					   case 'Corte':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#FE642E;height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
					   break;
					   case 'Ruteado':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#04B4AE; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
					   break;
					   case 'Enchape Recto':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#FE2E9A; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:black;'><center>&curren;</center></td>";
					   break;
					   case 'Enchape Curvo':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#F3F781; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
					   break;
					   case 'Laminado':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#088A4B; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
					   break;
					   case 'Perforado':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#8A2908; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
					   break;
					   case 'Barniz':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#A5DF00; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
					   break;
					   case 'Armado':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#0A0A2A;; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
					   break;
					   case 'Limpieza':
				       echo "<td title='".$SERVICIO_DESCRIPCION."' style='background:#FE2E2E; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
					   break;
					   
					     case '':
				       echo "<td></td>";
					   break;
					  
				   }
				  }
			  }
			  else
			  {
				   echo "<td style='height:2px;border-top:#E4E4E7 1px solid;'></td>";
			  }





//////
} else {
////////





        if(dameFecha2(date('d/m/Y'),$contadorB + 1) >= $SFECHA_INICIO and dameFecha2(date('d/m/Y'),$contadorB ) <= $SFECHA_ENTREGA and $SERVICIO_ESTADO == "EN PROCESO")
        {
           switch($NOMBRE_SERVICIO)
           {
             
             case 'Produccion':
               echo "<td title='' style='display:none;background:blue; height:2px;border-top:#E4E4E7 1px solid;'></td>";
            
           }
        }
        else if(dameFecha2(date('d/m/Y'),$contadorB + 1) >= $SFECHA_INICIO and dameFecha2(date('d/m/Y'),$contadorB) <= $SFECHA_ENTREGA and $SERVICIO_ESTADO == "OK")
        {
           switch($NOMBRE_SERVICIO)
           {
            
             case 'Produccion':
               echo "<td title='' style='display:none;background:blue; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             
           }
        }
        else
        {
           echo "<td style='display:none' height:2px;border-top:#E4E4E7 1px solid;'></td>";
        }


      
}
/////////////
}
//////////




      
        $contadorB++;
        $contadorC++;
      }
	  
           echo "</tr>";
    }
//fin 

     $numero++;
     $contador6++;
  }
  echo "<input style='display:none' name='numero' id = 'numero' type='text' value='".$numero."'/> </center></td>";
  echo "<tr><td colspan='2'>Cantidad Rochas ".$numero."</td>";
  echo "<td colspan='5'>Cantidad Neto ". number_format($fin,0, ",", ".")."</td></tr>";
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
<input style = "display:none" type = 'text' name= 'buscarcli1' id= 'buscarcli1' value="<?php echo $buscarcli; ?>"/>
<input style = "display:none" type = 'text' name= 'buscarcod1' id= 'buscarcod1' value="<?php echo $buscarcod; ?>"/>
<input style = "display:none" type = 'text' name= 'buscareje1' id= 'buscareje1' value="<?php echo $buscareje; ?>"/>

</div>

</form> 

<input style = "display:none" type = 'text' id = 'uno' value=""/>
</center>

</body>
</html>