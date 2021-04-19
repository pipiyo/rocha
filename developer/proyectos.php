<?php require_once('Conexion/Conexion.php');  
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
  $apellidom = $row["apellido_materno"];
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
 <title>Cuadro Rocha V1.1.1</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <meta http-equiv="X-UA-Compatible" content="IE=5" />
  <meta http-equiv="X-UA-Compatible" content="IE=7" />
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
  <meta http-equiv="X-UA-Compatible" content="IE=8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="X-UA-Compatible" content="chrome=18" />
   <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="X-UA-Compatible" content="chrome=1" />



  
  <link rel="stylesheet" type="text/css" href="Style/style_proyecto.css" />
  
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" >
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>


  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script src="js/jquery.ui.datepicker.js"></script>

 <script> 
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
  $(function(){
                $('#buscarcli').autocomplete({
                   source : 'ajaxCliente.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });

  $(function(){
                $('#buscarcod').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
  $(function(){
                $('#buscareje').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });




 
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
if($("#cil"+contador).length) 
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
 $positivo = "";
 $negativo = ""; 
 $suma1 = $_GET["rangopositivo"];
 $suma2 = $_GET['rangonegativo']; 
 $estado = $_GET['estado'];

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

$buscarcli  = $_GET['buscarcli'];

$buscarcod  = $_GET['buscarcod'];
?>
</head>
<body onload = "colorear1();">
<div id='bread'><div id="menu1"></div></div>  


<center><h1>Cuadro Rocha </h1> 
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
  <td width="146"><input type="text" style="border:grey 1px solid;border-radius: 8px;"  name="buscarcli" id="buscarcli" value='<?php echo urldecode($buscarcli) ?>' /></td>
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
   <tr>
   <td> <input style="border:grey 1px solid;border-radius: 8px; background:#006; color:#FFF; height:30px" type="button" onclick="redireccionar1();" name = "" id='' value="Ingreso Rocha"/></td>
  <?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
  {?>
 
  <td width="123"><input style="border:grey 1px solid;border-radius: 8px; background:#006; color:#FFF; height:30px" type="button" onclick="redireccionar();" name = "vendedor" id='venderdor' value="Informe Ventas"/> </td>  <?php } else{ ?>
<?php } ?>

<?php if($GRP == "GO" || $GRP1 == "GO" || $GRP2 == "GO" || $GRP3 == "GO" || $GRP == "GC" || $GRP1 == "GC" || $GRP2 == "GC" || $GRP3 == "GC"|| $GRP == "GG" || $GRP1 == "GG" || $GRP2 == "GG" || $GRP3 == "GG" || $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF")
  {?>
 
  <td width="123"><input style="border:grey 1px solid;border-radius: 8px; background:#006; color:#FFF; height:30px" type="button" onclick="redireccionar2();" name = "vendedoQr" id='venderdQor' value="Informe Rocha"/> </td>  <?php } else{ ?>
<?php } ?>
 </tr>
  </table>  
  <br />
    </center>
 </form>  
<form action = 'scriptActualizarProyecto.php' method='post' id='formulario1'>







<div id="inputs">







<input style = "display:none;" type = 'text' id = 'dos' name='dos' value="<?php echo $estado; ?>"/>

<center>
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
      <th width='100' id='rocha' rowspan='3'><center>Código Madre</center></th>
      <th width='100' id='rocha' rowspan='3'><center>Rocha</center></th>
      <th width='200'id='cliente'rowspan='3'><center>Cliente</center></th>
      <th width='150' rowspan='3'><center>Obra</center></th>
      <th width='100'rowspan='3'><center>Neto</center></th>
      <th width='150' rowspan='3'><center>Ejecutivo</center></th>
      <th width='100'rowspan='3'><center><a id='linkIngreso' href=proyectos.php?linkIngreso=".$linkIngreso."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha Ingreso </a></center></th>
      <th width='100' rowspan='3'><center><a id='linkEntrega' href=proyectos.php?linkEntrega=".$linkEntrega."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha de Entrega Solicitada </a></center></th>
      <th width='100' rowspan='3'><center><a id='linkConfirmacion' href=proyectos.php?linkConfirmacion=".$linkConfirmacion."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha de Entrega Real </a></center></th>
      <th width='100'rowspan='3 align='center'> <center>Fecha Acta </center></th>
      <th width='50' rowspan='3'><center>Dias</center></th>";

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


$query_registro = "SELECT * from proyecto WHERE ESTADO = '".$estado."'";


if($buscarcli  != '') 
{ 
$query_registro .= " and proyecto.NOMBRE_CLIENTE = '".$buscarcli."' ";
}

if($buscarcod != '') 
{ 
$query_registro = "SELECT * from proyecto WHERE CODIGO_PROYECTO = '".$buscarcod."'";
}
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{

  $ejutiv="";
  foreach ($equipo as $valor)
  {
    $ejutiv .= ",'".$valor."'";
  }

  $query_registro .= " AND proyecto.ejecutivo in ('".$nombres." ".$apellido." ".$apellidom."'".$ejutiv.") "; 
}
else if($buscareje  != '')
{
  $query_registro .= "  AND proyecto.ejecutivo = '".$buscareje."' ";
}
if(isset($_GET["linkEntrega"]))
{
  $query_registro .= " ORDER BY FECHA_ENTREGA ASC ";
}
else if(isset($_GET["linkIngreso"]))
{
  $query_registro .= " ORDER BY FECHA_INGRESO ASC ";
}
else
{
  $query_registro .= " ORDER BY FECHA_CONFIRMACION ASC ";
}



$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$LISTA = array();
$IN = " IN(";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 while($row = mysql_fetch_array($result))
  {


      $LISTA["".$row["CODIGO_PROYECTO"].""] = array( "CODPRO" =>  $row["CODIGO_PROYECTO"],
                          "CLIENTE" =>  $row["NOMBRE_CLIENTE"],
                          "CODIGO_MADRE" =>  $row["CODIGO_MADRE"],
                          "OBRA" =>  $row["OBRA"], 
                          "MONTO" =>  $row["MONTO"],
                          "EJECUTIVO" =>  $row["EJECUTIVO"],
                          "FECHA_INGRESO" =>  $row["FECHA_INGRESO"],
                          "FECHA_ENTREGA" =>  $row["FECHA_ENTREGA"], 
                          "DIAS" =>  $row["DIAS"],
                          "REPROGRAMACION" =>  $row["REPROGRAMACION"],
                          "FECHA_CONFIRMACION" =>  $row["FECHA_CONFIRMACION"], 
                          "FECHA_REALIZACION" =>  $row["FECHA_REALIZACION"],
                          "ESTADO" => $row["ESTADO"],
                          "FECHA_ACTA" => $row["FECHA_ACTA"],
                          "FECHA_ACTUAL" => date('Y-m-d'),
                          "SERVICIOS" =>  array() );

       $IN .= "'".$row["CODIGO_PROYECTO"]."',";

 $fin+=$row['MONTO'];
}
mysql_free_result($result);

$IN = substr( $IN , 0, -1);
$IN .= ") ";












if ($IN != " IN) ") {

 $INoc = " IN(";


$SEGUNDO = "";

$TD = "";
  $sql555 = "SELECT servicio.CODIGO_OC,servicio.DESCRIPCION,servicio.ESTADO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA, proyecto.CODIGO_PROYECTO,proyecto.NOMBRE_CLIENTE, servicio.NOMBRE_SERVICIO  from servicio , proyecto WHERE not servicio.CATEGORIA = 'PROCESO' AND servicio.ESTADO in('EN PROCESO','OK','EN RUTA') and (proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.CODIGO_PROYECTO ".$IN." ) ";
      $result555 = mysql_query($sql555, $conn) or die(mysql_error());
      while($row = mysql_fetch_assoc($result555))
      {



$LISTA["".$row["CODIGO_PROYECTO"].""]["SERVICIOS"][] = array(  "CODpro" =>  $row["CODIGO_PROYECTO"],
                                                              "CODoc" =>  $row["CODIGO_OC"], 
                                                              "FECHAI" =>  $row["FECHA_INICIO"],
                                                              "FECHAE" =>  $row["FECHA_ENTREGA"],
                                                              "NOMBRE" =>  $row["NOMBRE_SERVICIO"],
                                                              "ESTADO" =>  $row["ESTADO"], 
                                                              "DES" =>  $row["DESCRIPCION"],
                                                              "NOMPRO" =>  array() );



$INoc .= "'".$row["CODIGO_OC"]."',";

}
  mysql_free_result($result555);


$INoc = substr( $INoc , 0, -1);
$INoc .= ")";

if ($INoc != " IN)") 
{

 $LISTAOC = array();
 $LISTAOCNOM = array();
    $sql5515 = "SELECT CODIGO_OC,NOMBRE_PROVEEDOR FROM orden_de_compra where codigo_oc ".$INoc." ";
      $result5515 = mysql_query($sql5515, $conn) or die(mysql_error());

      while($row = mysql_fetch_assoc($result5515))
      {
       $LISTAOC[] = $row["CODIGO_OC"];
       $LISTAOCNOM[] =  $row["NOMBRE_PROVEEDOR"];
    }
  mysql_free_result($result5515);

array_unique($LISTAOC);
array_unique($LISTAOCNOM);

$LISTAOC = array_values($LISTAOC);
$LISTAOCNOM = array_values($LISTAOCNOM);

$LISTAOCFINAL = array();
foreach ($LISTAOC as $key => $value) {
  $LISTAOCFINAL["".$value.""] = $LISTAOCNOM[$key]; 
}

foreach ($LISTA as $key => $value) {
      
      foreach ($LISTA[$key]["SERVICIOS"] as $llave => $valor) {
           
        if (array_key_exists( $LISTA[$key]["SERVICIOS"][$llave]["CODoc"], $LISTAOCFINAL)) {
            $LISTA[$key]["SERVICIOS"][$llave]["NOMPRO"][] = $LISTAOCFINAL[$LISTA[$key]["SERVICIOS"][$llave]["CODoc"]];
            }
      }
}

}


 unset($LISTAOC);
 unset($LISTAOCNOM);
 unset($LISTAOCFINAL);

}

  mysql_close($conn);

foreach ($LISTA as $key => $value)
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
      <th width='100' id='rocha' rowspan='3'><center>Código Madre</center></th>
      <th id='rocha' rowspan='3'><center>Rocha</center></th>
      <th id='cliente'rowspan='3'><center>Cliente</center></th>
      <th rowspan='3'><center>Obra</center></th>
      <th rowspan='3'><center>Neto</center></th>
      <th rowspan='3'><center>Ejecutivo</center></th>
           <th width='100'rowspan='3'><center><a id='linkIngreso' href=proyectos.php?linkIngreso=".$linkIngreso."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha Ingreso </a></center></th>
         <th width='100' rowspan='3'><center><a id='linkEntrega' href=proyectos.php?linkEntrega=".$linkEntrega."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha de Entrega Solicitada </a></center></th>
        <th width='100' rowspan='3'><center><a id='linkConfirmacion' href=proyectos.php?linkConfirmacion=".$linkConfirmacion."&rangonegativo=".$suma2."&rangopositivo=".$suma1."&buscarcli=".urlencode($buscarcli)."&buscarcod=".urlencode($buscarcod)."&buscareje=".urlencode($buscareje)."&estado=".$estado.">Fecha de Entrega Real </a></center></th>
    <th rowspan='3' align='center'> Fecha Acta </th>
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

    $controw = 1;
   $controw += count($LISTA[$key]["SERVICIOS"]);

  /////////////  
  if($LISTA[$key]["FECHA_REALIZACION"]  == date("Y-m-d"))
  {
  
     echo "<tr>
     <td rowspan='".$controw."'><center>" . 
      ($LISTA[$key]["CODIGO_MADRE"]) ."</center></td> 
     <td rowspan='".$controw."' id='hola' style='background:#9FF;' ><center> <a target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($LISTA[$key]["CODPRO"]).">" . 
      $LISTA[$key]["CODPRO"] . "</a><input style='display:none' name='rocha".$numero."' id = 'rocha".$numero."' type='text' value='".$LISTA[$key]["CODPRO"]."'/> </center></td>
    
   <td style='background:#9FF;' rowspan='".$controw."'><center>" . 
      $LISTA[$key]["CLIENTE"] ."</center></td> 
     <td style='background:#9FF;' rowspan='".$controw."'><center>" . 
      ($LISTA[$key]["OBRA"]) . "</center></td>
     <td style='background:#9FF;' rowspan='".$controw."'><center>" . 
       number_format($LISTA[$key]["MONTO"],0, ",", "."). "</center></td>
   <td style='background:#9FF;' rowspan='".$controw."'><center>" . 
       ($LISTA[$key]["EJECUTIVO"]). "</center></td>
     
  <td style='background:#9FF;' rowspan='".$controw."'><center><input style='background:#9FF;' id = 'cil".$numero."' name='cil".$numero."' type='text' value='".$LISTA[$key]["FECHA_INGRESO"]."' class='textf'/></center></td>
    <td style='background:#9FF;' rowspan='".$controw."'><center><input style='background:#9FF;' id = 'col".$numero."'  name='col".$numero."' type='text' value='".$LISTA[$key]["FECHA_ENTREGA"]."' class='textf'/></center></td>
  <td style='background:#9FF;' rowspan='".$controw."'><center><input style='background:#9FF;' onclick = TINY.box.show({url:'generarActualizarProyecto.php?codigoProyecto=".urlencode($LISTA[$key]["CODPRO"])."&buscarcli=".urlencode($buscarcli)."&confirmacion=".urlencode($LISTA[$key]["FECHA_CONFIRMACION"])."&buscareje=".urlencode($buscareje)."&buscarcod=".urlencode($buscarcod)."&ingreso=".urlencode($LISTA[$key]["FECHA_INGRESO"])."&entrega=".urlencode($LISTA[$key]["FECHA_ENTREGA"])."&estado=".urlencode($estado)."&dis=".urlencode($LISTA[$key]["DIAS"])."&rep=".urlencode($LISTA[$key]["REPROGRAMACION"])."'}) id = 'cul".$numero."'  name='cul".$numero."' onchange='enviar();' type='text' value='".$LISTA[$key]["FECHA_CONFIRMACION"]."' class='textf'/></center></td> 
  <td style='background:#9FF;'  rowspan='".$controw."' align='center'>".substr($LISTA[$key]["FECHA_ACTA"],0,10)." </td>";
  }
  else
  {
     echo "<tr>
     <td rowspan='".$controw."'><center>" . 
      ($LISTA[$key]["CODIGO_MADRE"]) ."</center></td> 
     <td rowspan='".$controw."' id='hola' ><center> <a target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($LISTA[$key]["CODPRO"]).">" . 
      $LISTA[$key]["CODPRO"] . "</a><input style='display:none' name='rocha".$numero."' id = 'rocha".$numero."' type='text' value='".$LISTA[$key]["CODPRO"]."'/> </center></td>

   <td rowspan='".$controw."'><center>" . 
      ($LISTA[$key]["CLIENTE"]) ."</center></td> 
     <td rowspan='".$controw."'><center>" . 
      ($LISTA[$key]["OBRA"]) . "</center></td>
     <td rowspan='".$controw."'><center>" . 
       number_format($LISTA[$key]["MONTO"],0, ",", "."). "</center></td>
   <td rowspan='".$controw."'><center>" . 
       ($LISTA[$key]["EJECUTIVO"]). "</center></td>

  <td rowspan='".$controw."'><center><input id = 'cil".$numero."' name='cil".$numero."' type='text' value='".$LISTA[$key]["FECHA_INGRESO"]."' class='textf'/></center></td>
    <td rowspan='".$controw."'><center><input id = 'col".$numero."'  name='col".$numero."' type='text' value='".$LISTA[$key]["FECHA_ENTREGA"]."' class='textf'/></center></td>
  <td rowspan='".$controw."'><center><input onclick = TINY.box.show({url:'generarActualizarProyecto.php?codigoProyecto=".urlencode($LISTA[$key]["CODPRO"])."&buscarcli=".urlencode($buscarcli)."&confirmacion=".urlencode($LISTA[$key]["FECHA_CONFIRMACION"])."&buscareje=".urlencode($buscareje)."&buscarcod=".urlencode($buscarcod)."&ingreso=".urlencode($LISTA[$key]["FECHA_INGRESO"])."&entrega=".urlencode($LISTA[$key]["FECHA_ENTREGA"])."&estado=".urlencode($estado)."&dis=".urlencode($LISTA[$key]["DIAS"])."&rep=".urlencode($LISTA[$key]["REPROGRAMACION"])."'}) id = 'cul".$numero."'  name='cul".$numero."' onchange='enviar();' type='text' value='".$LISTA[$key]["FECHA_CONFIRMACION"]."' class='textf'/></center></td> 
  <td  rowspan='".$controw."' align='center'>".substr($LISTA[$key]["FECHA_ACTA"],0,10)." </td>";
  } 








  if($LISTA[$key]["FECHA_CONFIRMACION"] < $LISTA[$key]["FECHA_ACTUAL"] && $LISTA[$key]["ESTADO"] == "EN PROCESO")
  {
    echo "<td rowspan='".$controw."' style='background-color:red;color:#fff;'><center>".$LISTA[$key]["DIAS"]."/(R".$LISTA[$key]["REPROGRAMACION"].")</center><input style='display:none' name='dis".$numero."' id = 'dis".$numero."' type='text' value='".$LISTA[$key]["DIAS"]."'/>
  <input style='display:none' name='rep".$numero."' id = 'rep".$numero."' type='text' value='".$LISTA[$key]["REPROGRAMACION"]."'/></td>";
  }
    else if($LISTA[$key]["FECHA_CONFIRMACION"] > $fecha7 && $LISTA[$key]["ESTADO"] == "EN PROCESO")
  {
    echo "<td rowspan='".$controw."' style='background-color:#158115;color:#fff;'><center>".$LISTA[$key]["DIAS"]."/(R".$LISTA[$key]["REPROGRAMACION"].")</center><input style='display:none' name='dis".$numero."' id = 'dis".$numero."' type='text' value='".$LISTA[$key]["DIAS"]."'/>
  <input style='display:none' name='rep".$numero."' id = 'rep".$numero."' type='text' value='".$LISTA[$key]["REPROGRAMACION"]."'/></td>";
  }
    else if($LISTA[$key]["FECHA_CONFIRMACION"] >= date('Y-m-d')  && $LISTA[$key]["FECHA_CONFIRMACION"] <= $fecha7 && $LISTA[$key]["ESTADO"] == "EN PROCESO")
  {
    echo "<td rowspan='".$controw."' style='background-color:#F7F059;color:#000;border-right:#E4E4E7 1px solid;'><center>".$LISTA[$key]["DIAS"]."/(R".$LISTA[$key]["REPROGRAMACION"].")</center><input style='display:none' name='dis".$numero."' id = 'dis".$numero."' type='text' value='".$LISTA[$key]["DIAS"]."'/>
  <input style='display:none' name='rep".$numero."' id = 'rep".$numero."' type='text' value='".$LISTA[$key]["REPROGRAMACION"]."'/></td>";
  }
  else
  {
  echo "<td rowspan='".$controw."' style='background-color:#355C94;color:#fff;border-right:#E4E4E7 1px solid;'><center>".$LISTA[$key]["DIAS"]."/(R".$LISTA[$key]["REPROGRAMACION"].")</center><input   style='display:none' name='dis".$numero."' id = 'dis".$numero."' type='text' value='".$LISTA[$key]["DIAS"]."'/>
  <input style='display:none' name='rep".$numero."' id = 'rep".$numero."' type='text' value='".$LISTA[$key]["REPROGRAMACION"]."'/></td>";
  }







  echo "<div>";
     while($contador2 <= $ranngop ) ///////// valor txt 
    { 

////////////
if($estado == 'EN PROCESO'){
////////

    echo"<td style='height:5px;' id = 'cel".$contador4."' class='col".$contador2."' ></td>";
    $contador2++;
    $contador4++;
   
////////////
} else {
////////

    echo"<td style='display:none;height:5px;' id = 'cel".$contador4."' class='col".$contador2."' ></td>";
    $contador2++;
    $contador4++;

////////////
}
////////

    }
     echo "</tr>";
    






//comiezo 
$menmen = "";
foreach ($LISTA[$key]["SERVICIOS"] as $llave => $valor)
      {
        echo "<div>";
        $menmen = "<tr>";
      $contadorB = $resta;

      $NOMBRE_PROVEEDOR = (empty($LISTA[$key]["SERVICIOS"][$llave]["NOMPRO"][0])) ?  ""  : $LISTA[$key]["SERVICIOS"][$llave]["NOMPRO"][0];

      while($contadorB <= $ranngop ) 
      {     
////////////
if($estado == 'EN PROCESO'){
///////////

        if(dameFecha2(date('d/m/Y'),$contadorB + 1) >= $LISTA[$key]["SERVICIOS"][$llave]["FECHAI"] and dameFecha2(date('d/m/Y'),$contadorB ) <= $LISTA[$key]["SERVICIOS"][$llave]["FECHAE"] and $LISTA[$key]["SERVICIOS"][$llave]["ESTADO"] == "EN PROCESO" || $LISTA[$key]["SERVICIOS"][$llave]["ESTADO"] == "EN RUTA")
        {
           switch($LISTA[$key]["SERVICIOS"][$llave]["NOMBRE"])
           {
             case 'Adquisiciones':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' id='hola11' style='background:#36C444;height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Produccion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:blue; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Despacho':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#FFFF00; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Instalacion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#B10F0F; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Desarrollo':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#E46F1C; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Mantencion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#642EFE; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Sillas':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#0080FF; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Bodega':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#DF01D7; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Sistema':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:black; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'OC':  
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["CODoc"]). " " .($NOMBRE_PROVEEDOR). " ' style='background:#59FF26; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Servicio Tecnico':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#886A08; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
              case 'FI':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#F7BE81; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
               case 'Prevención de Riesgos':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#BCA9F5; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Factura':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#466C75; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Nota de Credito':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#24A882; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
           }
        }
        else if(dameFecha2(date('d/m/Y'),$contadorB + 1) >= $LISTA[$key]["SERVICIOS"][$llave]["FECHAI"] and dameFecha2(date('d/m/Y'),$contadorB) <= $LISTA[$key]["SERVICIOS"][$llave]["FECHAE"] and $LISTA[$key]["SERVICIOS"][$llave]["ESTADO"] == "OK")
        {
           switch($LISTA[$key]["SERVICIOS"][$llave]["NOMBRE"])
           {
             case 'Adquisiciones':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#36C444;height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Produccion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:blue; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Despacho':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#FFFF00; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:black;'><center>&curren;</center></td>";
             break;
             case 'Instalacion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#B10F0F; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Desarrollo':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#E46F1C; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Mantencion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#642EFE; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Sillas':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#0080FF; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Bodega':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#DF01D7; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Sistema':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:black; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'OC':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["CODoc"]). " " .($NOMBRE_PROVEEDOR). " ' style='background:#59FF26; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Servicio Tecnico':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#886A08; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;'><center>&curren;</center></td>";
             break;
               case 'FI':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#F7BE81; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;'><center>&curren;</center></td>";
             break;
              case 'Prevención de Riesgos':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#BCA9F5; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Factura':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#466C75; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Nota de Credito':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#24A882; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;'><center>&curren;</center></td>";
             break;
           }
        }
        else
        {
           $menmen .= "<td style='height:2px;border-top:#E4E4E7 1px solid;'></td>";
        }

//////
} else {
////////

        if(dameFecha2(date('d/m/Y'),$contadorB + 1) >= $LISTA[$key]["SERVICIOS"][$llave]["FECHAI"] and dameFecha2(date('d/m/Y'),$contadorB ) <= $LISTA[$key]["SERVICIOS"][$llave]["FECHAE"] and $LISTA[$key]["SERVICIOS"][$llave]["ESTADO"] == "EN PROCESO" || $LISTA[$key]["SERVICIOS"][$llave]["ESTADO"] == "EN RUTA" )
        {
           switch($LISTA[$key]["SERVICIOS"][$llave]["NOMBRE"])
           {
             case 'Adquisiciones':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' id='hola11' style='display:none;background:#36C444;height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Produccion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:blue; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Despacho':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#FFFF00; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Instalacion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#B10F0F; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Desarrollo':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#E46F1C; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Mantencion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#642EFE; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Sillas':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#0080FF; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Bodega':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#DF01D7; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Sistema':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:black; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break; 
             case 'OC':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["CODoc"]). " " .($NOMBRE_PROVEEDOR). " ' style='display:none;background:#59FF26; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Servicio Tecnico':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#886A08; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
              case 'FI':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#F7BE81; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
              case 'Prevención de Riesgos':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#BCA9F5; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Factura':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#466C75; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
             case 'Nota de Credito':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#24A882; height:2px;border-top:#E4E4E7 1px solid;'></td>";
             break;
           }
        }
        else if(dameFecha2(date('d/m/Y'),$contadorB + 1) >= $LISTA[$key]["SERVICIOS"][$llave]["FECHAI"] and dameFecha2(date('d/m/Y'),$contadorB) <= $LISTA[$key]["SERVICIOS"][$llave]["FECHAE"] and $LISTA[$key]["SERVICIOS"][$llave]["ESTADO"] == "OK")
        {
           switch($LISTA[$key]["SERVICIOS"][$llave]["NOMBRE"])
           {
             case 'Adquisiciones':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#36C444;height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Produccion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:blue; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Despacho':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#FFFF00; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:black;'><center>&curren;</center></td>";
             break;
             case 'Instalacion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#B10F0F; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Desarrollo':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#E46F1C; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Mantencion':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#642EFE; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Sillas':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#0080FF; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Bodega':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:#DF01D7; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Sistema':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='display:none;background:black; height:2px;border-top:#E4E4E7 1px solid;font-size:7px; color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'OC':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["CODoc"]). " " .($NOMBRE_PROVEEDOR). " ' style='display:none;background:#59FF26; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;'><center>&curren;</center></td>";
             break;
             case 'Servicio Tecnico':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#886A08; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;display:none;'><center>&curren;</center></td>";
             break;
               case 'FI':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#F7BE81; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;display:none;'><center>&curren;</center></td>";
             break;
               case 'Prevención de Riesgos':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#BCA9F5; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;display:none;'><center>&curren;</center></td>";
             break;
             case 'Factura':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#466C75; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;display:none;'><center>&curren;</center></td>";
             break;
             case 'Nota de Credito':
               $menmen .= "<td title='".($LISTA[$key]["SERVICIOS"][$llave]["DES"])."' style='background:#24A882; height:2px;border-top:#E4E4E7 1px solid;color:#FFF;display:none;'><center>&curren;</center></td>";
             break;
           }
        }
        else
        {
           $menmen .= "<td style='display:none;height:2px;border-top:#E4E4E7 1px solid;'></td>";
        }
/////////////
}
//////////
        $contadorB++;
        
      }
           $menmen .= "</tr>";
           echo "".$menmen."";
           echo "</div>";
    }
//fin 

     $numero++;
     $contador6++;
  }


  unset($LISTA);
  echo "<input style='display:none' name='numero' id = 'numero' type='text' value='".$numero."'/> </center></td>";
  echo "<tr><td colspan='2'>Cantidad Rochas ".$numero."</td>";
  echo "<td colspan='5'>Cantidad Neto ". number_format($fin,0, ",", ".")."</td></tr>";
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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