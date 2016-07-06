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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
  <title> Informe Radicado V2.0.0</title>
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
   <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
  <script src='js/encabezado-fixed.js'></script>

 

  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>

   $(function(){
                $('#txt_cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
           function(event, ui)
           {
                       
                   }
                 });
            });

  function redireccionar() 
  {
  location.href="IngresoRadicado.php";
  } 


$(function(){
  $('.rad').tablesorter(); 
});

  </script>

  </head>

<body>
<form action="" method="POST" name="formulario">
<div  id='header-radicado-rocha'> 
<div id='bread'><div id="menu1"></div></div>
<div id = 'contenedor-rad'>	
<h1>Radicado</h1>

<table>
<tr>
<td><input placeholder="Radicado" class="textbox" name="txt_radicado" id="txt_radicado" type="text" value="" /></td>
<td><input placeholder="Cliente" class="textbox" name="txt_cliente" id="txt_cliente" type="text" value="" /></td>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php } else { ?>
<td>
<select name="buscar_vendedor" type ="text" class="textbox" >
<option value="" selected>Vendedor</option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' ORDER BY empleado.nombres";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);} 
 ?> 
<option> </option>
</select></td>
<td><select class="textbox" onchange="" id = "estado" name = "estado">
<option value="TODOS" selected>Estado</option>
<option>TODOS</option>
<option>EN PROCESO</option>
<option>COTIZADO</option>
<option>ENVIADO</option>
<option>RECOTIZADO</option>
<option>PREAPROBADO</option>
<option>ACEPTADO</option>
<option>NULO</option>
<option>COPIAR</option>
</select></td>

<td ><input  type="submit" class='boton' value="Buscar" /></td>
</tr>

<tr>
<td> <input onclick="redireccionar();" type="button" class='boton'  value="Ingreso Radicado" /></td>
</tr>
</table>
</div>
</div>
</form>

<table rules='all' frame='box' id="uno" class='rad fixed'>
<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),7);
mysql_select_db($database_conn, $conn);

////Comienzo
$RADICADO = "";
$CLIENTE = "";
$VENDEDOR = "";
$ESTADO ="";
if (isset($_POST["estado"])) 
{ 
$ESTADO = $_POST["estado"];
}
if (isset($_POST["txt_radicado"])) 
{ 
$RADICADO = $_POST["txt_radicado"];
}
if (isset($_POST["txt_cliente"])) 
{ 
$CLIENTE = $_POST["txt_cliente"];
}
if (isset($_POST["buscar_vendedor"])) 
{ 
$VENDEDOR = $_POST["buscar_vendedor"];
}


if($ESTADO == "TODOS")
{
$query_registro = "SELECT * from radicado where NOT ESTADO = 'NULO' AND NOT ESTADO = 'ACEPTADO'";
}
else
{
$query_registro = "SELECT * from radicado where ESTADO = '".$ESTADO."'"; 
}

if($RADICADO != '')
{ 
$query_registro .= " and CODIGO_RADICADO = '".$RADICADO."' ";
}

if($CLIENTE != '')
{ 
$query_registro .= " and CLIENTE = '".$CLIENTE."'";
}

if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
$ejutiv="";
foreach ($equipo as $valor)
{
$ejutiv .= ",'".$valor."'";
}

$query_registro .= " AND EJECUTIVO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") "; 
}


else if($VENDEDOR != '')
{ 
$query_registro .= " and EJECUTIVO = '".($VENDEDOR)."' ";
}


$query_registro .= " ORDER BY FECHA_ENTREGA";



$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fin=0;

$totalcuenta=0;
$FECHA_VARIABLE ="";



echo"<thead><tr class='cheader'><th>Radicado</th>
       <th>Cliente</th>
       <th>Obra</th> 
       <th>Linea</th>      
       <th>Monto</th>
       <th>OC</th>
       <th>Ejecutivo</th>
       <th>Fecha I</th>
       <th>Fecha E</th>
       <th>Fecha Contacto</th>
       <th>Fecha I Rocha</th>
       <th>Fecha E Rocha</th>
       <th>Dias</th>  
       </tr>
       </thead>
       <tbody>
       ";      
 while($row = mysql_fetch_array($result))
  {  
  $CODIGO_RADICADO = $row["CODIGO_RADICADO"];
  $CLIENTE = $row["CLIENTE"];
  $OBRA = $row["OBRA"];
  $NETO = $row["NETO"];
  $EJECUTIVO = $row["EJECUTIVO"];
  $FECHA_INGRESO = $row["FECHA_INGRESO"];
  $FECHA_ENTREGA = $row["FECHA_ENTREGA"];
  $FECHA_CONTACTO = $row["FECHA_CONTACTO"];
  $DIAS = $row["DIAS_RADICADO"];
  $REPROGRAMACION = $row["REPROGRAMACION"];
  $ESES = $row["ESTADO"];
  $FECHA_INICIO_ROCHA = $row["FECHA_INICIO_ROCHA"];
  $FECHA_ENTREGA_ROCHA = $row["FECHA_ENTREGA_ROCHA"];
  $OC = $row["OC"];
  $LINEA = $row["DEPARTAMENTO_CREDITO"];


  $FECHA_ACTUAL = date('Y-m-d');
  $fin+=$row['NETO'];

  $hoy="";
  if( $FECHA_INGRESO   == date("Y-m-d"))
  {
    $hoy = "id='hoy'";
  }
  if( $ESES == "PREAPROBADO")
  {
    $hoy = "id='aceptado'";
  }
  echo  "<tr><td ".$hoy."><a target='_blank' href=DescripcionRadicado.php?txt_codigo_proyecto2=". urlencode($CODIGO_RADICADO).">" . 
      $CODIGO_RADICADO . "</a></td>";
  echo  "<td ".$hoy.">".$CLIENTE."</td>";
  echo  "<td ".$hoy.">".$OBRA."</td>";
  echo  "<td ".$hoy.">".$LINEA."</td>";
  echo  "<td ".$hoy." align='right'>".number_format($NETO,0, ",", ".")."</td>";
  echo  "<td ".$hoy." align='right'>".$OC."</td>";
  echo  "<td ".$hoy.">".$EJECUTIVO."</td>";
  echo  "<td ".$hoy." align='center'>".$FECHA_INGRESO."</td>";
  echo  "<td ".$hoy." align='center'>".$FECHA_ENTREGA."</td>";
  echo  "<td ".$hoy." align='center'>".$FECHA_CONTACTO."</td>";
  echo  "<td ".$hoy." align='center'>".$FECHA_INICIO_ROCHA."</td>";
  echo  "<td ".$hoy." align='center'>".$FECHA_ENTREGA_ROCHA."</td>";
  if($ESTADO == "OK")
  {
    echo  "<td align='center' id='azul'>".$DIAS."/(R".$REPROGRAMACION.")"."</td></tr>";
  }
    else
  {
  if( $FECHA_ENTREGA  > date('Y-m-d'))
  {
    echo  "<td align='center'  id='verde'>".$DIAS."/(R".$REPROGRAMACION.")"."</td></tr>";
  }
  else if( $FECHA_ENTREGA  < date('Y-m-d'))
  {
    echo  "<td align='center' id='rojo'>".$DIAS."/(R".$REPROGRAMACION.")"."</td></tr>";
  }
  else if( $FECHA_ENTREGA  >= date('Y-m-d'))
  {
    echo  "<td align='center' id='amarillo'>".$DIAS."/(R".$REPROGRAMACION.")"."</td></tr>";   
  }
  }
  $totalcuenta++;
	$numero--;
	}
  echo "</tbody>";
	echo "<tr><td align='center' id='azul'><b>Total</b></td><td align='center' id='azul'><b>".$totalcuenta."</b></td><td align='center' id='azul'><b>Total</b></td><td align='center' id='azul'><b>".number_format($fin,0, ",", ".")."</b></td><td colspan='9' id='azul'></td></tr>";
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>
</html>
