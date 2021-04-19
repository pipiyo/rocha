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

$ESTADOV = $_GET["ESTADO"];
$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';

$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
if (isset($_GET["buscar"])) 
{    
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
}
if($ESTADOV == 'EN PROCESO')
{
	$PROCESO = 'checked';
}
if($ESTADOV == 'OK')
{
	$OK = 'checked';
}
if($ESTADOV == 'NULO')
{
	$NULO = 'checked';
}
if($ESTADOV == 'PROGRAMADOS')
{
	$PROGRAMADOS = 'checked';
}
if($ESTADOV == 'TODOS')
{
	$TODOS = 'checked';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Informe Instalacion</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="stylesheet" type="text/css" href="Style/style_info_instalaciones.css" />
 <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
   <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script language = javascript>
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });     
  </script>

</head>

<body>

    
	<div id="site_content">	  			   

<form action="" method="get">
<table  id = "formulario">
<tr>
  <th height="37" colspan="9" align="center" >Informe Instalaciones</th>
  </tr>
<tr>
<td width="88"><center>Desde</center></td>
<td width="100"><input name="txt_desde" id="txt_desde" type="text" /></td>
<td width="63"><center>Hasta</center></td>
<td width="103"><input name="txt_hasta" id="txt_hasta" type="text" /></td>
<td width="59" align="center">Filtro</td> 
<td width="71" align="right">Todos &nbsp;<input type="radio" name="ESTADO" value="TODOS" <?php echo $TODOS ?>></td>
<td width="116">Programados &nbsp;<input type="radio" name="ESTADO" value="PROGRAMADOS"  <?php echo $PROGRAMADOS ?>></td>
<td width="110">En proceso &nbsp;<input type="radio" name="ESTADO" value="EN PROCESO"  <?php echo $PROCESO ?>></td>
<td width="127">Nulos &nbsp;<input type="radio" name="ESTADO" value="NULO"  <?php echo $NULO ?>> &nbsp; Ok &nbsp;<input type="radio" name="ESTADO" value="OK" <?php echo $OK ?> ></td>
</tr>
<tr>
  <td>&nbsp;</td>
<td> <input type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
</tr>
</table>
</form>

<br />



<table id = "informe_instalacion" cellpadding="0" cellspacing="0"  style="font-size:9px;">
<col width='115'/>
<col width='115'/>
<col width='115'/>
<col width='115'/>
<col width='115'/>
<col width='115'/>
<col width='115'/>
<col width='115'/>
<col width='115'/>
<?php
mysql_select_db($database_conn, $conn);

if($ESTADOV=='TODOS')
{
$query_registro = "select servicio.PUESTOS,servicio.DIAS,servicio.LIDER,servicio.INSTALADOR_4,servicio.INSTALADOR_3,servicio.INSTALADOR_2,servicio.INSTALADOR_1, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,CLIENTE.NOMBRE_CLIENTE,servicio.FECHA_INICIO from cliente, servicio, proyecto where cliente.rut_cliente = proyecto.RUT_CLIENTE and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Instalacion' and servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' order by servicio.FECHA_INICIO";
}
else
{
$query_registro = "select servicio.PUESTOS,servicio.DIAS,servicio.LIDER,servicio.INSTALADOR_4,servicio.INSTALADOR_3,servicio.INSTALADOR_2,servicio.INSTALADOR_1, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO, servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,CLIENTE.NOMBRE_CLIENTE,servicio.FECHA_INICIO from cliente, servicio, proyecto where cliente.rut_cliente = proyecto.RUT_CLIENTE and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.ESTADO = '".$ESTADOV."' and servicio.NOMBRE_SERVICIO = 'Instalacion' and servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' order by servicio.FECHA_INICIO";
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1= 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$GUIA = $row["GUIA_DESPACHO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$INS1= $row["INSTALADOR_1"];
	$INS2= $row["INSTALADOR_2"];
	$INS3= $row["INSTALADOR_3"];
	$INS4= $row["INSTALADOR_4"];
	$LIDER= $row["LIDER"];
	$PUESTOS = $row["PUESTOS"];
	$DIAS = $row["DIAS"];
	if($FECHA_VARIABLE == $FECHA_INICIO)
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
	case "11":
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
	case "7":
        $dia = "Domingo " . $date->format('d')." ".$mes;
        break;
	}

if($numero == 0)
{	
echo "<tr><td align='left' colspan='2 '><p style='color:#fff; font-size:15px;'>".$dia."</p></td></tr>";
$numero1 = 0;     
}
     if($numero1 > 0)
	 {
     echo"<tr> <td> &nbsp; </td> <tr>";
	 echo"<tr> <td> &nbsp; </td> <tr>";  //border-left: #E4E4E7 1px solid; border-bottom: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;
	 }
     echo"<tr><th style='border-left: #E4E4E7 1px solid;border-top: #E4E4E7 1px solid;'><center>Rocha</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode(      $CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;'><center>Cliente</center></th>";
     echo"<td style='border-top: #E4E4E7 1px solid;'><center>".($NOMBRE_CLIENTE)."</center></td>";
     echo"<th style='border-top: #E4E4E7 1px solid;'><center>Descripcion</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;'><center>".($DESCRIPCION)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;'><center>Direccion</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;'><center>".($DIRECCION)."</center></td></tr>";
	 echo"<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;'><center>FI</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;'><center>".($TPTMFI)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;'><center>Observaciones</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;'><center>".($OBSERVACIONES)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;'><center>Emisor</center></th>";
     echo "<td style='border-top: #E4E4E7 1px solid;'><center>".$REALIZADOR."</center></td>";
     echo"<th style='border-top: #E4E4E7 1px solid;'><center>Supervisor</center></th>";
     echo"<td style='border-top: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;'><center>".($SUPERVISOR)."</center></td></tr>";
	 echo"<tr><th style='border-left: #E4E4E7 1px solid;border-top: #E4E4E7 1px solid;'><center>Lider</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;'><center>".($LIDER)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;'><center>Instalador1</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;'><center>".($INS1)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;'><center>Instalador2</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;'><center>".($INS2)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;'><center>Instalador3</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;'><center>".($INS3)."</center></td></tr>";
	 echo"<tr><th style='border-left: #E4E4E7 1px solid;border-top: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Instalador4</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($INS4)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Puestos</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($PUESTOS)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DIAS)."</center></td>";
	 echo"<th style='border-top: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Estado</center></th>";
	 echo"<td style='border-top: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;'><center>".$ESTADO."</center></td></tr>";
   
   
	$numero++;
    $numero1++; 
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table> 
</div> 		
</body>
</html>
