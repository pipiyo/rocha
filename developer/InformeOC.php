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
$BUSCARPOR = "CONFIRMACION";
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO = "";
$BUSCAR_CODIGO1 = "";
$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$ordenfecha = 'FECHA_CONFIRMACION';


if (isset($_GET["buscar"])) 
{ 
$BUSCARPOR = $_GET["buscarfe"];  
$BUSCAR_CODIGO = $_GET["buscar_codigo"];   
$BUSCAR_CODIGO1 = $_GET["buscar_codigo1"];
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>  Recepción OC  V1.2.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  
  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <script src='js/encabezado-fixed.js'></script>

  <script language = javascript>
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
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
                $('#buscar_codigo1').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
  </script>

</head>

<body>


<div id = 'header-radicado-rocha'>
<div id='bread'><div id="menu1"></div></div>   
<div  id="contenedor-des" class="oc-inf">
<form action="" method="get">

<table>
<tr>
  <th id="tit_oc" height="37" colspan="11" align="center"><h1>Recepción OC</h1> </th>
</tr>
<tr>

  <td><input placeholder="Desde" class='textbox' name="txt_desde" id="txt_desde" type="text" /></td>
  <td><input placeholder="Hasta" class='textbox' name="txt_hasta" id="txt_hasta" type="text" /></td>
  <?php 
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
  if (isset($_GET["fechae"]))
  {
	 $ordenfecha = $_GET["fechae"];
  }
  ?>  
  <td>
  <select class='textbox' name = "ESTADO">
    <option value="">ESTADO</option>
    <option <?php echo $TODOS1;?> >TODOS</option>
    <option <?php echo $PROCESO1;?>>EN PROCESO</option>
    <option <?php echo $NULO1;?>>NULO</option>
    <option <?php echo $OK1;?>>OK</option>
  </select>
  </td> 
   <td><input placeholder="Rocha" class='textbox'  type="text" id="buscar_codigo" name="buscar_codigo" value=""  ></td>
  <td> <input type="submit" id="buscar" name = "buscar" class='boton' value = "Buscar" /> </td>
</tr>
<tr>
 
  <td><input placeholder="Proveedor"  class='textbox'  type="text" id="buscar_codigo1" name="buscar_codigo1" value=""  ></td>


<?php 
$INICIO1 = "";
$ENTREGA1 = "";
$CONFIRMACION1 = "";
if($BUSCARPOR  == "REALIZACION")
{
	$INICIO1 = 'selected';
	$BUSCARPOR1 = 'FECHA_REALIZACION';
}
else if($BUSCARPOR  == "ENTREGA")
{
	$ENTREGA1 = 'selected';
	$BUSCARPOR1 = 'FECHA_ENTREGA';
}
else if($BUSCARPOR  == "CONFIRMACION")
{
	$CONFIRMACION1 = 'selected';
	$BUSCARPOR1 = 'FECHA_CONFIRMACION';
}



?>
  <td>
  <select  class='textbox' onchange="" id = "buscarfe" name = "buscarfe">
    <option value="">Buscar por fecha</option>
    <option <?php echo $INICIO1;?> >REALIZACION</option>
    <option <?php echo $ENTREGA1;?> >ENTREGA</option>
    <option <?php echo $CONFIRMACION1;?> >CONFIRMACION</option>
  </select>
  </td>
</tr>
</table>
</form>
</div>
</div>
	
  
<table class="table-oc-inf fixed">

<?php
mysql_select_db($database_conn, $conn);

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),7);
if($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT DISTINCT * FROM orden_de_compra where NOMBRE_PROVEEDOR = '".$BUSCAR_CODIGO1."'  order by ".$ordenfecha."";
}
else if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT DISTINCT * FROM orden_de_compra where ROCHA_PROYECTO = '".$BUSCAR_CODIGO."'  order by ".$ordenfecha."";
}
else if($ESTADOV=='TODOS')
{ 
$query_registro = "SELECT DISTINCT * FROM orden_de_compra where ".$BUSCARPOR1." between '".$txt_desde."' and '".$txt_hasta."' order by ".$ordenfecha."";
}
else
{
$query_registro = "SELECT DISTINCT * FROM orden_de_compra where ESTADO = '".$ESTADOV."' and ".$BUSCARPOR1." between '".$txt_desde."' and '".$txt_hasta."' order by ".$ordenfecha."";
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
  $CODIGO_OC = $row["CODIGO_OC"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
  $FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$CONDICION = $row["CONDICION_PAGO"];
	$OBSERVACION = $row["OBSERVACION"];
	$TOTAL = $row["TOTAL"];
	$PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
	$ESTADO = $row["ESTADO"];
	$ROCHA = $row["ROCHA_PROYECTO"];

  $CODIGO_SERVICIO = "";
  $query_registro1 = "SELECT * FROM servicio where CODIGO_OC = '".$CODIGO_OC."'";
  $result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result1))
  {
    $CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
  }

	if($numero == 0)
	{	
    //echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;height:20px;'>".$dia."</p></td></tr>";
	echo"<thead><tr><th class='cheader'>OC</th>
  <th>N°</th>
	<th>Rocha</th>
	<th>Proveedor</th>
	<th><a style='color:#fff;text-decoration:none;' id='fechai' href='InformeOC.php?fechai=FECHA_REALIZACION&ESTADO=".$ESTADOV."'>Fecha R</a></th>
	<th><a style='color:#fff;text-decoration:none;' id='fechae' href='InformeOC.php?fechae=FECHA_ENTREGA&ESTADO=".$ESTADOV."'>Fecha E</a></th>
	<th><a style='color:#fff;text-decoration:none;' id='fechac' href='InformeOC.php?fechac=FECHA_CONFIRMACION&ESTADO=".$ESTADOV."'>Fecha C</a></th>    
	<th>Total</th>
  <th>Estado</th></tr></thead>
	";
  }
  echo "<tr><td  align='center'> <a target='_blank' href=scriptPacking.php?CODIGO_OC=" .$CODIGO_OC. ">" . 
	    $CODIGO_OC. "</a></td>";
  echo  "<td align='center'>".($CODIGO_SERVICIO)."</td>";
	echo  "<td><a href='editarProyecto.php?CODIGO_PROYECTO=".$ROCHA."'>".$ROCHA."</a></td>";
	echo  "<td>".($PROVEEDOR)."</td>";
	echo  "<td  align='center'>".($FECHA_REALIZACION)."</td>";
  echo  "<td  align='center'>".($FECHA_ENTREGA)."</td>";
	
	if($FECHA_CONFIRMACION > $fecha7)
		{
  echo  "<td align='center' id='verde'>".($FECHA_CONFIRMACION)."</td>";
		}
		else if($FECHA_CONFIRMACION < date('Y-m-d'))
		{
  echo  "<td align='center' id='rojo'>".($FECHA_CONFIRMACION)."</td>";
		}
		else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
		{
  echo  "<td align='center'  id='amarillo'>".($FECHA_CONFIRMACION)."</td>";		
		};
		
		
	echo  "<td  align='right'>".number_format($TOTAL,0,",",".")."</td>";
	echo  "<td align='center'>".$ESTADO."</td></tr>";
	$numero--;
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>
</html>