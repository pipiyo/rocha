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
////Comienzo
$VALE = "";
$ROCHA = "";
$CLIENTE = "";
$ESTADO ="";
$DEPARTAMENTO = "";
$DESDE ="0000-00-00";
$HASTA ="2050-01-01";

if (isset($_POST["estado1"])) 
{ 
$ESTADO = $_POST["estado1"];
}
if (isset($_POST["buscar_codigo"])) 
{ 
$VALE = $_POST["buscar_codigo"];
}
if (isset($_POST["buscar_rocha"])) 
{ 
$ROCHA = $_POST["buscar_rocha"];
}
if (isset($_POST["buscar_cliente"])) 
{ 
$CLIENTE = $_POST["buscar_cliente"];
}
if (isset($_POST["departamento"])) 
{ 
$DEPARTAMENTO = $_POST["departamento"];
}
if (isset($_POST["txt_desde"])) 
{
if($_POST["txt_desde"] != "" && $_POST["txt_hasta"] != "") 
{
$DESDE = $_POST["txt_desde"];
}
}
if (isset($_POST["txt_hasta"])) 
{ 
if($_POST["txt_desde"] != "" && $_POST["txt_hasta"] != "") 
{
$HASTA = $_POST["txt_hasta"];
}
}
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
  <title> Listado Vale Materiales V2.0.0</title>
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
   <script src='js/Bloqueo.php'></script> 
  <script src='js/encabezado-fixed.js'></script>
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
                       
                   }
                 });
            });
    $(function(){
                $('#buscar_rocha').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
           function(event, ui)
           {
                       
                   }
                 });
            });
  </script>

  </head>

<body>
<form action="" method="POST" name="formulario">
<div  id='header-radicado-rocha'> 
<div id='bread'><div id="menu1"></div></div>
<div id = 'contenedor-rad'>	
<h1>Listado Vale Materiales</h1>

<table>
<tr>
<td><input placeholder="Vale" class="textbox" name="buscar_codigo" id="buscar_codigo" type="text" value="" /></td>
<td><input placeholder="Rocha" class="textbox" name="buscar_rocha" id="buscar_rocha" type="text" value="" /></td>
<td><input placeholder="Cliente" class="textbox" id="buscar_cliente" name="buscar_cliente" type="text" value="" /> </td>
<td><select class="textbox" onchange="" id = "departamento" name = "departamento">
<option value="" selected>Departamento</option>
<option>PRODUCCION</option>
<option>ADQUICICIONES</option>
<option>ABASTECIMIENTO</option>
<option>DESPACHO</option>
<option>INSTALACIONES</option>
<option>COMERCIAL</option>
<option>FINANZAS</option>
<option>RRHH</option>
<option>SISTEMA</option>
<option>DAM</option>
<option>DESARROLLO</option>
<option>SILLAS</option>
<option>GERENCIA</option>
<option>DAM</option>
<option>DAM</option>
<option>MUEBLES ESPECIALES</option>
<option>SERVICIO TECNICO</option>
</select></td>
<td><select class="textbox" onchange="" id = "estado1" name = "estado1">
<option value="" selected>Estado</option>
<option> PENDIENTE </option>
<option>PENDIENTE F</option>
<option> PENDIENTE V</option>
<option> ENTREGADO</option>
<option> NULO </option>
<option> TODOS</option>
</select></td>
</tr>

<tr>
<td><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" value="" /></td>
<td><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="" /></td>
<td><a href="ExcelListadoValeEntrega.php?estado1=<?php echo $ESTADO ?>&buscar_codigo=<?php echo $VALE ?>&buscar_rocha=<?php echo $ROCHA ?>&departamento=<?php echo $DEPARTAMENTO ?>&txt_desde=<?php echo $DESDE ?>&txt_hasta=<?php echo $HASTA?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;width:15%;" alt="Exportar a Excel" class="right">
</a> </td>
<td> </td>
<td ><input  type="submit" class='boton' value="Buscar" /></td>
</tr>
</table>
</div>
</div>
</form>

<table rules='all' frame='box' class='vale fixed'>
<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),7);
mysql_select_db($database_conn, $conn);



if($ESTADO == "TODOS")
{
$query_registro = "SELECT * FROM  vale_emision where  FECHA_TERMINO between '".$DESDE."' and '".$HASTA."'";
}
else if($ESTADO != "" && $ESTADO != "PENDIENTE F" && $ESTADO != "PENDIENTE V")
{
$query_registro = "SELECT * FROM  vale_emision where  FECHA_TERMINO between '".$DESDE."' and '".$HASTA."' and ESTADO = '".$ESTADO."'"; 
}
else if($ESTADO == "PENDIENTE F")
{
$query_registro = "SELECT * FROM  vale_emision where FECHA_TERMINO  > '0000-00-00' and FECHA_TERMINO between '".$DESDE."' and '".$HASTA."' and ESTADO = 'PENDIENTE'"; 
}
else if($ESTADO == "PENDIENTE V")
{
$query_registro = "SELECT * FROM  vale_emision where FECHA_TERMINO  = '0000-00-00' and ESTADO = 'PENDIENTE'"; 
}
else
{
if($DESDE =="0000-00-00" && $HASTA == "2050-01-01")
{
$query_registro = "SELECT * FROM  vale_emision where  FECHA_TERMINO  > '0000-00-00' and ESTADO = 'PENDIENTE'"; 
}
else
{
$query_registro = "SELECT * FROM  vale_emision where  FECHA_TERMINO between '".$DESDE."' and '".$HASTA."' and ESTADO = 'PENDIENTE'";   
}
}

if($VALE != '')
{ 
$query_registro .= " and COD_VALE = '".$VALE."' ";
}

if($ROCHA != '')
{ 
$query_registro .= " and CODIGO_PROYECTO = '".$ROCHA."' ";
}


if($DEPARTAMENTO  != '')
{ 
$query_registro .= " and  DEPARTAMENTO = '".$DEPARTAMENTO."'";
}

if($CLIENTE  != '')
{ 
$query_registro .= " and CODIGO_PROYECTO IN( select CODIGO_PROYECTO from proyecto where NOMBRE_CLIENTE LIKE '%".$CLIENTE ."%' )";
}




$query_registro .= " ORDER BY FECHA_TERMINO ASC";



$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fin=0;

$totalcuenta=0;
$FECHA_VARIABLE ="";



echo"<thead><tr class='cheader'>
<th>Vale</th>
<th>Rocha</th>
<th>Cliente</th>
<th>Fecha Emision</th>
<th>Fecha Termino</th>
<th>Departamento</th>
<th>Nombre usuario</th>
<th>Excel</th>
<th>Estado</th> 
</tr>
</thead>

       ";      
 while($row = mysql_fetch_array($result))
  {  
  $CODIGO_VALE= $row["COD_VALE"];
  $FECHAIN = $row["FECHA"];
  $FECHA = $row["FECHA_TERMINO"];
  $FECHAR = $row["FECHA_REALIZACION"];
  $DEPARTAMENTO = $row["DEPARTAMENTO"];
  $CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
  $CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
  $ESTADO = $row["ESTADO"];

 $query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO1."'";
 $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
 {
 $nombres = $row["nombres"];
 $apellido = $row["apellido_paterno"];

 } 
 mysql_free_result($result1);

 $query2 = "  SELECT NOMBRE_CLIENTE FROM proyecto WHERE `CODIGO_PROYECTO` = '".$CODIGO_PROYECTO."' ";
 $result2 = mysql_query($query2, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
 {
 $NOM_CLI = $row["NOMBRE_CLIENTE"];
 } 
mysql_free_result($result2);


  $hoy="";
  if( $FECHAR  == date("Y-m-d"))
  {
    $hoy = "id='hoy'";
  }
 
  echo  "<tr><td ".$hoy."><a href=Vale_entrega.php?CODIGO_VALE=" .$CODIGO_VALE. ">" . 
      $CODIGO_VALE . "</a></td>";
  echo  "<td ".$hoy.">".$CODIGO_PROYECTO."</td>";
  echo  "<td ".$hoy.">". $NOM_CLI."</td>";
  echo  "<td ".$hoy."  align='center'>".substr($FECHAIN,0,11)."</td>";
  if($ESTADO == "ENTREGADO")
  {
    echo  "<td align='center' id='azul'>".substr($FECHA,0,11)."</td>";
  }
    else
  {
  if(substr($FECHA,0,11) > $fecha7)
  {
    echo  "<td align='center'  id='verde'>".substr($FECHA,0,11)."</td>";
  }
  else if(substr($FECHA,0,11) < date('Y-m-d'))
  {
    echo  "<td align='center' id='rojo'>".substr($FECHA,0,11)."</td>";
  }
  else if(substr($FECHA,0,11) >= date('Y-m-d')  and substr($FECHA,0,11)  <= $fecha7)
  {
    echo  "<td align='center' id='amarillo'>".substr($FECHA,0,11)."</td>";   
  }
  }

  echo  "<td ".$hoy." align=''>".$DEPARTAMENTO."</td>";
  echo  "<td ".$hoy.">".$nombres ." ". $apellido."</td>";
  echo  "<td ".$hoy." align='center'><a href='ExcelValeEntrega.php?CODIGO_VALE=" .$CODIGO_VALE. "' target='_blank'><img src='Imagenes/Excel1.png' style = 'border:0px;' alt='Exportar a Excel'></a></td>";
  echo  "<td ".$hoy.">".$ESTADO."</td></tr>";

  $totalcuenta++;
	$numero--;
	}
	echo "<tr><td align='center' id='azul'><b>Total</b></td><td align='center' id='azul'><b>".$totalcuenta."</b></td><td align='center' id='azul'><b></b></td><td align='center' id='azul'><b></b></td><td colspan='7' id='azul'></td></tr>";
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>
</html>
