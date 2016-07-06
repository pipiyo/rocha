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

$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO ='';
$BUSCAR_LIDER ='';
$BUSCAR_COMUNA ='';
$BUSCAR_RECLAMO ='';
$INEN = "";
$DESDE = "";
$HASTA = "";
$CATEGORIA = "";
$PROCESO = "";
$ROCHAROCHA = "";
$CLIENTE ='';
$VENDEDOR ='';
$ESTADOV = $_GET["ESTADO"];
$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_ENTREGA';
$factura='';

if (isset($_GET["buscar"]) || isset($_GET["buscarfe"])) 
{    
$factura = $_GET["txt_factura"];	
$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$CATEGORIA = $_GET["categoria"];
$VENDEDOR = $_GET["buscar_vendedor"];

$DEPARTAMENTO = $_GET["departamento"];

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Informe Factura V1.0</title>
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
  </script>
  </head>
<body>

<form action="" method="get" name="formulario">
<div id = 'header-radicado-rocha'>	
  <div id='bread'><div id="menu1"></div></div> 
<div id = 'header-sistema'>  
<h1>Informe de Facturación </h1>
<table class="form-sistema">
<tr>
<td><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" value="<?php echo $DESDE;?>" /></td>
<td><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="<?php echo $HASTA;?>" /></td>
<td> 
<select class="textbox" onchange="" id = "buscarfe" name = "buscarfe">
 <option value="" selected>Fecha</option>
<option value="INICIO" <?php echo $INICIO1;?> >Emisión</option>
<option value="ENTREGA" <?php echo $ENTREGA1;?> >Vencimiento</option>
</select>
</td>
<td ><input placeholder="Rocha" class="textbox"  type="text" id="buscar_codigo" name="buscar_codigo" value="<?php echo $BUSCAR_CODIGO;?>"  ></td>
<td ><select class="textbox" id="ESTADO" name="ESTADO">
<option <?php echo $TODOS1;?> >TODOS</option>
<option <?php echo $PROCESO1;?>>EN PROCESO</option>
<option <?php echo $NULO1;?>>NULO</option>
<option <?php echo $OK1;?>>OK</option>
</select></td>
</tr> 
<td>
<select name="buscar_vendedor" id="buscar_vendedor" type ="text" class="textbox" >
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
 } mysql_free_result($result1);
 ?> 
<option> </option>
</select>
</td>
<td>
<select class="textbox" name="departamento" id="departamento">
      <option value="">Departamento</option>
      <option value="LC">Los Conquistadores</option>
      <option value="LD">La Dehesa</option>
      <option value="M&D">Muebles y Diseños </option>
      <option value="S&S">Sillas y Sillas</option>
</select>	
<select style="display:none"  class="textbox" id="categoria" name="categoria">
<option value="">Categoria</option>
<option>Proyecto</option>
<option>Solicitud</option>
</select>
</td>
<td ><input placeholder="Factura" class="textbox" name="txt_factura" id="txt_factura" type="text" value="<?php echo $factura ?>" /></td>
<td colspan="1">Covenio Marco <input type="checkbox" name="convenio" id="covenio" ></td>
<td> <input type="submit" id="buscar" class='boton' name = "buscar" value = "Buscar" /> </td>
</tr>
</table>
</div>
</div>
</form>



<table rules='all' frame='box' class='factura-table fixed'>
<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
$fecha7 = dameFecha2(date('d/m/Y'),7);
mysql_select_db($database_conn, $conn);

////Comienzo

	
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO', servicio.FECHA_PRIMERA_ENTREGA,servicio.ARCHIVO,servicio.RECEPCION, proyecto.CONTACTO,proyecto.FECHA_ACTA,proyecto.MAIL, proyecto.FONO,servicio.FI,servicio.FACTURA,servicio.MONTO_FACTURA, servicio.CODIGO_SERVICIO, servicio.RECLAMOS,servicio.PUESTOS,servicio.DIAS,servicio.LIDER,servicio.INSTALADOR_4,servicio.INSTALADOR_3,servicio.FECHA_REALIZACION,servicio.INSTALADOR_2,servicio.INSTALADOR_1, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_ENTREGA,servicio.FECHA_INICIO,servicio.CODIGO_COMUNA,proyecto.DEPARTAMENTO_CREDITO, proyecto.RUT_CLIENTE , proyecto.EJECUTIVO, proyecto.ORDEN_CC from servicio, proyecto where  proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO  and servicio.NOMBRE_SERVICIO = 'Factura' ";


if($BUSCAR_CODIGO != '') 
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";
}	
if($VENDEDOR != '')
{ 
$query_registro .= " and proyecto.EJECUTIVO = '".($VENDEDOR)."' ";
}

if($DEPARTAMENTO == 'LC')
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO NOT LIKE '%M&D%' and proyecto.CODIGO_PROYECTO NOT LIKE '%S&S%' and proyecto.CODIGO_PROYECTO NOT LIKE '%LD%' ";
}
else if($DEPARTAMENTO != '')
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO LIKE '%".$DEPARTAMENTO."%'";
}

if($factura != '')
{ 
$query_registro .= " and servicio.FACTURA = '".$factura."'";
}
if($BUSCAR_LIDER != '') 
{ 
$query_registro .= " and servicio.LIDER LIKE '%".$BUSCAR_LIDER."%' ";
}
if($BUSCAR_RECLAMO != '') 
{ 
$query_registro .= " and servicio.RECLAMOS = '".$BUSCAR_RECLAMO."'";
}
if($PROCESO != "")
{
	$query_registro .= " and servicio.PROCESO = '".$PROCESO."' ";
}
if($CATEGORIA != "")
{
	$query_registro .= " and servicio.CATEGORIA = '".$CATEGORIA."' ";
}

if ($ESTADOV == "TODOS") 
{
	$query_registro .= "  and not servicio.ESTADO = '' ";
}
else if ($ESTADOV != "TODOS") {
	$query_registro .= "  and servicio.ESTADO = '".$ESTADOV."' ";
}

if (isset($_GET["convenio"])) 
{ 
	$query_registro .= " and proyecto.CODIGO_PROYECTO LIKE '%CM%'";
}

if($ordenfecha == 'FECHA_ENTREGA')
{
$query_registro .= " and  servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}else if($ordenfecha == 'FECHA_INICIO')
{
$query_registro .= " and  servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}



echo"<thead><tr class='cheader'>
       <th>Rocha</th>
       <th>N°</th>
       <th>Cliente</th> 
       <th width='80'>Rut</th> 
       <th>Valor Neto</th>
       <th>iva</th>
       <th>Total</th>
       <th>% FAC</th>
       <th>Factura</th>
       <th width='80'>Fecha de emisión</th>
       <th width='80'>Fecha de Vecimiento</th>
       <th width='80'>Fecha Acta</th>
       <th>Dias</th>
       <th>Ejecutivo</th>
       <th>OC</th>
       <th>Contacto</th>
       <th width='80'>Telefono</th>
       <th>Mail</th>
       <th>Recepción</th>
       <th>Archivo</th>
       <th>Guia</th>
       
       <th  width='80'>Estado</th>
       </tr></thead>";


$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$TOTAL1 = 0;
$TOTAL2 = 0;
$TOTAL3 = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
  $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$GUIA = $row["GUIA_DESPACHO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$TPTMFI = $row["TPTMFI"];
	$CODIGO_COMUNA = $row["CODIGO_COMUNA"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
	$INS1= $row["INSTALADOR_1"];
	$INS2= $row["INSTALADOR_2"];
	$FI= $row["FI"];
	$INS3= $row["INSTALADOR_3"];
	$INS4= $row["INSTALADOR_4"];
	$RECLAMOS = $row["RECLAMOS"];
	$LIDER= $row["LIDER"];
	$PUESTOS = $row["PUESTOS"];
	$RUT_CLIENTE = $row["RUT_CLIENTE"];
	$DIAS = $row["DIAS"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	$FACTURA_S = $row["FACTURA"];
	$MONTO_FACTURA = $row["MONTO_FACTURA"];
	$EJECUTIVO = $row["EJECUTIVO"];
	$ORDEN_CC = $row["ORDEN_CC"];
  $CONTACTO = $row["CONTACTO"];
  $TELEFONO = $row["FONO"];
  $MAIL = $row["MAIL"];
  $FECHA_ACTA = $row["FECHA_ACTA"];
  $RECEPCION= $row["RECEPCION"];
  $ARCHIVO = $row["ARCHIVO"];
	
$valoriva = 0.19;
$val1 = $MONTO_FACTURA * $valoriva;
$val2 = $val1 + $MONTO_FACTURA;

$TOTAL1 += $MONTO_FACTURA;
$TOTAL2 += $val1;
$TOTAL3 += $val2;

$GUIA = "";

$query_registro1 = "SELECT servicio.GUIA_DESPACHO FROM servicio WHERE  servicio.NOMBRE_SERVICIO = 'Despacho' and servicio.CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' and servicio.GUIA_DESPACHO != '0'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
    $GUIA.= "(".$row["GUIA_DESPACHO"].") ";
  }

  //if( strpos($CODIGO_PROYECTO, "LD") !== false)
  //{

  if($FECHA_REALIZACION  == date("Y-m-d"))
  {
    echo  "<tr><td id='hoy'> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	  echo  "<td align='center'  id='hoy'> <a href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">Editor</a></td>";
    echo  "<td  id='hoy'> ".($NOMBRE_CLIENTE)."</td>";
    echo  "<td align='right'  id='hoy'> ".($RUT_CLIENTE)."</td>";
    echo  "<td  id='hoy' align='right'>".number_format($MONTO_FACTURA,0,",",".")."</td>";  
    echo  "<td  id='hoy' align='right'>".number_format($val1,0,",",".")."</td>"; 
    echo  "<td  id='hoy' align='right'>".number_format($val2,0,",",".")."</td>"; 
    echo  "<td  id='hoy'>".($OBSERVACIONES)."</td>";
    echo  "<td  id='hoy' align='right'>".($FACTURA_S)."</td>"; 
	  echo  "<td  id='hoy' align='center' >".substr($FECHA_INICIO,0,11)."</td>";
    echo "<td align='center' id='hoy'>".$FECHA_ACTA."</td>";
	if($ESTADO == "OK")
	{
    echo  "<td align='center' >".($FECHA_ENTREGA)."</td>";
	}
	else
	{
	if($FECHA_ENTREGA > $fecha7)
	{
    echo  "<td align='center'  >".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA < date('Y-m-d'))
    {
    echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
	{
    echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";		
	}
    }
    echo "<td  id='hoy' align='center' >".$DIAS."</td>";
    echo "<td  id='hoy' align='center' >".$EJECUTIVO."</td>";
    echo "<td  id='hoy' align='center' >".$ORDEN_CC."</td>";
	 
    echo "<td  id='hoy'>".$CONTACTO."</td>";
    echo "<td  id='hoy'>".$TELEFONO."</td>";
    echo "<td  id='hoy'>".$MAIL."</td>";

    if($RECEPCION == 1)
    {
      echo "<td style='background:#D0F5A9;' align='center'>OK</td>";
    }
    else
    {
      echo "<td></td>";
    }

    if($ARCHIVO == 1)
    {
      echo "<td style='background:#D0F5A9;' align='center'>OK</td>";
    }
    else
    {
      echo "<td  id='hoy'></td>";
    }

    echo "<td  id='hoy'>".$GUIA."</td>";
    
     echo "<td  id='hoy'>".$ESTADO."</td>";
    echo "</tr>";
	$numero--;
	}
	else
	{
    echo  "<tr><td> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	  echo  "<td align='center'> <a 
     	  href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">Editor</a>
          </td>";
    echo  "<td>".$NOMBRE_CLIENTE."</td>";
    echo  "<td align='right'> ".($RUT_CLIENTE)."</td>";
    echo  "<td align='right'>".number_format($MONTO_FACTURA,0,",",".")."</td>";
    echo  "<td align='right'>".number_format($val1,0,",",".")."</td>"; 
    echo  "<td align='right'>".number_format($val2,0,",",".")."</td>";  
    echo  "<td>".$OBSERVACIONES."</td>";
    echo  "<td align='right'>".($FACTURA_S)."</td>"; 
	
	echo  "<td align='center' >".substr($FECHA_INICIO,0,11)."</td>";
	if($ESTADO == "OK")
	{
    echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
	}
    else
	{
	if($FECHA_ENTREGA > $fecha7)
	{
    echo  "<td  align='center'  >".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA < date('Y-m-d'))
	{
    echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
	{
    echo  "<td align='center'  >".substr($FECHA_ENTREGA,0,11)."</td>";		
	}
	}
  echo  "<td align='center'>".substr($FECHA_ACTA,0,11)."</td>";
	echo  "<td align='center'>".$DIAS."</td>";
	echo  "<td align='center'>".$EJECUTIVO."</td>";
	echo  "<td align='center'>".$ORDEN_CC."</td>";
  echo  "<td>".$CONTACTO."</td>";
  echo  "<td>".$TELEFONO."</td>";
  echo  "<td>".$MAIL."</td>";
  if($RECEPCION == 1)
  {
    echo "<td style='background:#D0F5A9;' align='center'>OK</td>";
  }
  else
  {
    echo "<td></td>";
  }
  if($ARCHIVO == 1)
  {
    echo  "<td style='background:#D0F5A9;' align='center'>OK</td>";
  }
  else
  {
    echo  "<td></td>";
  }
  echo  "<td>".$GUIA."</td>";
  
  echo  "<td>".$ESTADO."</td>";
  echo  "</tr>";
	$numero--;
	}
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
<tr>
	<td colspan='4' align='right'><strong>Total</strong></td> 
	<td align='right'><strong><?php echo number_format($TOTAL1,0,",",".") ?></strong></td>
	<td align='right'><strong><?php echo number_format($TOTAL2,0,",",".") ?></strong></td>
	<td align='right'><strong><?php echo number_format($TOTAL3,0,",",".") ?></strong></td>
</tr>
</table>
</body>
</html>
