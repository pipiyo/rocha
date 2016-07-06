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

$PRECIO_UNITARIOTO2 = 0;
$ESTADOV = $_GET["ESTADO"];
$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO = '';
$BUSCAR_CODIGO1 = '';
$BUSCAR_CODIGO2 = '';
$BUSCAR_CODIGO3 = '';
$BUSCAR_CODIGO4 = '';
$month = date('m');
$year = date("Y");
$txt_hasta = date("Y-m-d",(mktime(0,0,0,$month+1,1,$year)-1));
$txt_desde = date("Y-m-d",(mktime(0,0,0,$month-0,1,$year)+1));
if (isset($_GET["buscar"])) 
{    
$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$BUSCAR_CODIGO1 = $_GET["buscar_codigo1"];
$BUSCAR_CODIGO2 = $_GET["buscar_codigo2"];
$BUSCAR_CODIGO3 = $_GET["buscar_codigo3"];
$BUSCAR_CODIGO4 = $_GET["buscar_codigo4"];
if($BUSCAR_CODIGO != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
else if($BUSCAR_CODIGO1 != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
else if($BUSCAR_CODIGO2 != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
else if($BUSCAR_CODIGO3 != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
else if($BUSCAR_CODIGO4 != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
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
mysql_free_result($result2);

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
  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

  <!--Calendario -->
  <link rel="stylesheet" href="style/calendario.css" />
  <script src="js/calendario.js"></script>

  <!--Autocompletar -->
  <script src="js/autocompletar.js"></script>

  <!-- Tabla -->
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
  <script src='js/encabezado-fixed.js'></script>

  <!-- breadcrumbs -->
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>
      
  $(function(){
     $('.tabla-radicado').tablesorter(); 
  });

      $(function(){
                $('#buscar_codigo').autocomplete({
                   source : 'ajaxProyectoTodo.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
				    });
					
					  $(function(){
                $('#buscar_codigo1').autocomplete({
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
  </script>

</head>

<body>
<center>
	
<form action="" method="get">
<div  id='header-proyecto-rocha'>
<div id='bread'><div id="menu1"></div></div>
<div id='contenedor-ins' class="formulario-informes">
<h1>Informe Radicado </h1>
<table  id = "formulario">
<tr>
<td><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" /></td>
<td><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" /></td>
<td><input placeholder="Rocha" class="textbox" type="text" id="buscar_codigo" name="buscar_codigo" value=""  ></td>
<td><input Placeholder="Cliente" class="textbox"  type="text" id="buscar_codigo1" name="buscar_codigo1" value=""  ></td>
<td><select name="buscar_codigo2" id="buscar_codigo2" type ="text" class="textbox" >
<option value="">Director </option>
<?php 
$query_registro = 
"select DISTINCT empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' order by empleado.nombres ";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select></td>
</tr>
<tr>
<td><select  class="textbox" name="buscar_codigo3" id="buscar_codigo3">
      <option value="">Linea</option>
      <option>Actiu - Muebles</option>
      <option>Actiu - Sillas</option>
      <option>Andersen</option>
      <option>All Seating</option>
      <option>Basflex</option>
      <option>Biblioteca Muró</option>
      <option>Butacas Importadas</option>
      <option>Bozz</option>
      <option>Campus</option>
      <option>Cerantola</option>
      <option>Contatto</option>
      <option>Cosmetal</option>
      <option>Dali</option>
      <option>Dauphin</option>
      <option>Desmonte y Reubicación</option>
      <option>Esencial </option>
      <option>Estado</option>
      <option>Falcon </option>
      <option>Fletes y Viaticos</option>
      <option>FlexForm</option>
      <option>Flow</option>
      <option>Full Space</option>
      <option>Grammer</option>
      <option>Indumac </option>
      <option>Interno</option>
      <option>Kadena</option>
      <option>Lloy</option>
      <option>Lockers</option>
      <option>Lovato</option>
      <option>Madera</option>
      <option>Mano de Obra</option>
      <option>Mantenimiento Sillas</option>
      <option>Mantenimiento Oficinas </option>
      <option>Manufacturas Muñoz</option>
      <option>Mmobili</option>
      <option>Multiple</option>
      <option>Muma </option>
      <option>Nowy Styl </option>
      <option>Nueva Imagen </option>
      <option>Producto Especial</option>
      <option>Prototipos</option>
      <option>Reparación Sillas</option>
      <option>Staff</option>
      <option>Servicio Refaccion</option>
      <option>Sillas Scanform</option>
      <option>Sillas Varias </option>
      <option>Tessela </option>
      <option>VC Industrial</option>
      </select></td>
<td><select class="textbox" name="buscar_codigo4" id="buscar_codigo4">
      <option value="">Departamento</option>
      <option value="LC">Los Conquistadores</option>
      <option value="LD">La Dehesa</option>
      <option value="MD">Muebles y Diseños </option>
      <option value="SS">Sillas y Sillas</option>
      </select></td>


<?php 
$TODOS1 = "";
$ACTA1 = "";
$PROCESO1 = "";
$NULO1 = "";
$OK1 = "";
$COTIZADO1= "";
$ENVIADO1= "";
$RECOTIZADO1= "";
$REAPROBADO1= "";
$ACEPTADO1 = "";
if($ESTADOV == "TODOS")
{
	$TODOS1 = 'selected';
}
else if($ESTADOV == "ACTA")
{
	$ACTA1 = 'selected';
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
else if($ESTADOV == "COTIZADO")
{
  $COTIZADO1 = 'selected';
}
else if($ESTADOV == "ENVIADO")
{
  $ENVIADO1 = 'selected';
}
else if($ESTADOV == "RECOTIZADO")
{
  $RECOTIZADO1 = 'selected';
}
else if($ESTADOV == "REAPROBADO")
{
  $REAPROBADO1 = 'selected';
}
else if($ESTADOV == "ACEPTADO")
{
  $ACEPTADO1 = 'selected';
}
?>

  <td>

  <select class="textbox"  onchange="" id = "ESTADO" name = "ESTADO">
    <option value="TODOS">Estado</option>
    <option <?php echo $TODOS1;?> >TODOS</option>
    <option <?php echo $COTIZADO1;?>>COTIZADO</option>
    <option <?php echo $ENVIADO1;?>>ENVIADO</option>
    <option <?php echo $RECOTIZADO1;?>>RECOTIZADO</option>
    <option <?php echo $REAPROBADO1;?>>REAPROBADO</option>
    <option <?php echo $ACEPTADO1;?>>ACEPTADO</option>
    <option <?php echo $PROCESO1;?>>EN PROCESO</option>
    <option <?php echo $NULO1;?>>NULO</option>
    <option <?php echo $OK1;?>>OK</option>
  </select>
  </td>
<td align='center'><a href="ExcelInformeRocha.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&ESTADO=<?php echo urlencode($ESTADOV);?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></td>
<td align="center"> <input class="boton" type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>

</tr>
</table>
</div>
</div>
</form>

<br />

<table class='fixed tabla-radicado' id = "informe_produccion">
<thead>
<tr class='cheader'>
<th>Cliente</th>
<th>Radicado</th>
<th>Obra</th> 
<th>Fecha I</th>
<th>Fecha E</th>
<th>Dias</th>
<th>Subtotal</th>
<th>Descuento</th>
<th>Neto</th>
<th>Linea</th>
<th>Puestos</th>
<th>Director</th>
<th>Contacto</th>
<th>Mail</th>
<th>Estado</th></tr>
</thead><tbody>
<?php
ini_set('max_execution_time', 500);
mysql_select_db($database_conn, $conn);

if($ESTADOV=='TODOS')
{ 
$query_registro = "select * from radicado WHERE not ESTADO = 'NULO'";
$query_registro1 = "SELECT sum(NETO) AS NETO ,count(CODIGO_RADICADO) AS CUENTA , DEPARTAMENTO_CREDITO  FROM radicado WHERE not ESTADO = 'NULO'";
$query_registro2 = "SELECT sum(NETO) AS NETO ,count(CODIGO_RADICADO) AS CUENTA , EJECUTIVO  FROM radicado WHERE not ESTADO = 'NULO'";
}
else
{
$query_registro = "select * from radicado WHERE ESTADO = '".$ESTADOV."'";
$query_registro1 = "SELECT sum(NETO) AS NETO ,count(CODIGO_RADICADO) AS CUENTA , DEPARTAMENTO_CREDITO  FROM radicado WHERE ESTADO = '".$ESTADOV."'";
$query_registro2 = "SELECT sum(NETO) AS NETO ,count(CODIGO_RADICADO) AS CUENTA , EJECUTIVO FROM radicado WHERE ESTADO = '".$ESTADOV."'";
}

if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
$ejutiv="";
foreach ($equipo as $valor)
{
    $ejutiv .= ",'".$valor."'";
}
$query_registro .= " AND EJECUTIVO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") "; 
$query_registro1 .= " AND EJECUTIVO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") "; 
$query_registro2 .= " AND EJECUTIVO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") "; 
}
else if($BUSCAR_CODIGO2 != '')
{ 
$query_registro .= " and EJECUTIVO = '".$BUSCAR_CODIGO2."' ";
$query_registro1 .= " and EJECUTIVO = '".$BUSCAR_CODIGO2."' ";
$query_registro2 .= " and EJECUTIVO = '".$BUSCAR_CODIGO2."' ";
}

if($BUSCAR_CODIGO3 !='')
{ 
$query_registro .= " and  DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."'";
$query_registro1 .= " and  DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."'";
$query_registro2 .= " and  DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."'";
}

if($BUSCAR_CODIGO1 !='')
{ 
$query_registro .= " and CLIENTE = '".$BUSCAR_CODIGO1."'";
$query_registro1 .= " and CLIENTE = '".$BUSCAR_CODIGO1."'";
$query_registro2 .= " and CLIENTE = '".$BUSCAR_CODIGO1."'";
}

if($BUSCAR_CODIGO !='')
{ 
$query_registro .= " and CODIGO_RADICADO  = '".$BUSCAR_CODIGO."'";
$query_registro1 .= " and CODIGO_RADICADO  = '".$BUSCAR_CODIGO."'";
$query_registro2 .= " and CODIGO_RADICADO  = '".$BUSCAR_CODIGO."'";
}

if($_GET["txt_desde"] != "" && $_GET["txt_hasta"] != "")
{
$query_registro .= "and FECHA_INGRESO between '".$_GET["txt_desde"]."' and '".$_GET["txt_hasta"]."'";
$query_registro1 .= "and FECHA_INGRESO between '".$_GET["txt_desde"]."' and '".$_GET["txt_hasta"]."'";
$query_registro2 .= "and FECHA_INGRESO between '".$_GET["txt_desde"]."' and '".$_GET["txt_hasta"]."'";
}

if($BUSCAR_CODIGO4 !='')
{ 
$query_registro .= " and CODIGO_RADICADO like '%-".$BUSCAR_CODIGO4."-%'";
$query_registro1 .= " and CODIGO_RADICADO like '%-".$BUSCAR_CODIGO4."-%'";
$query_registro2 .= " and CODIGO_RADICADO like '%-".$BUSCAR_CODIGO4."-%'";
}

$query_registro1 .= " GROUP BY DEPARTAMENTO_CREDITO order by sum(NETO) DESC";
$query_registro2 .= " GROUP BY EJECUTIVO order by sum(NETO) DESC";

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());

$total_radicado = 0;
$dias_dias = 0;
$monto_final = 0;
$subtotal_final = 0;
$puestos_final = 0;

$LD=0;
$LDCM=0;
$LDSCM=0;

$MD=0;
$MDCM=0;
$MDSCM=0;

$LC=0;
$LCCM=0;
$LCSCM=0;

$SS=0;
$SSCM=0;
$SSSCM=0;

$MLD=0;
$MLDCM=0;
$MLDSCM=0;

$MMD=0;
$MMDCM=0;
$MMDSCM=0;

$MLC=0;
$MLCCM=0;
$MLCSCM=0;

$MSS=0;
$MSSCM=0;
$MSSSCM=0;
 while($row = mysql_fetch_array($result))
  {  
  $NOMBRE_CLIENTE = $row["CLIENTE"];
	$CODIGO_PROYECTO = $row["CODIGO_RADICADO"];
	$OBRA = $row["OBRA"];
  $PUESTOS = $row["PUESTOS"];
	$FECHA_INGRESO = $row["FECHA_INGRESO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$ESTADO = $row["ESTADO"];
	$DIAS = $row["DIAS_RADICADO"];
	$SUB_TOTAL = $row["SUB_TOTAL"];
	$DESCUENTO = $row["DESCUENTO"];
	$MONTO= $row["NETO"];
	$DEPARTAMENTO_CREDITO= $row["DEPARTAMENTO_CREDITO"];
	$EJECUTIVO= $row["EJECUTIVO"];
	$CONTACTO= $row["CONTACTO"];
	$ESTADO= $row["ESTADO"];
  $MAIL= $row["MAIL"];
	$NETO2 = $row["MONTO2"];

  if (strpos($CODIGO_PROYECTO, "-LD-") !== false)
  {
    $LD++;
    $MLD += $row["NETO"];
    if (strpos($CODIGO_PROYECTO, "-CM") !== false)
    {
      $LDCM++;
      $MLDCM += $row["NETO"];
    }
    else
    {
      $LDSCM++;
      $MLDSCM += $row["NETO"];
    }   
  }
  else if (strpos($CODIGO_PROYECTO, "-LC-") !== false)
  {
    $LC++;
    $MLC += $row["NETO"];
    if (strpos($CODIGO_PROYECTO, "-CM") !== false)
    {
      $LCCM++;
      $MLCCM+= $row["NETO"];
    }
    else
    {
      $LCSCM++;
      $MLCSCM+= $row["NETO"];
    }   
  }
  else if (strpos($CODIGO_PROYECTO, "-MD-") !== false)
  {
    $MD++;
    $MMD += $row["NETO"];
    if (strpos($CODIGO_PROYECTO, "-CM") !== false)
    {
      $MDCM++;
      $MMDCM += $row["NETO"];
    }
    else
    {
      $MDSCM++;
      $MMDSCM += $row["NETO"];
    }   
  }
  else if (strpos($CODIGO_PROYECTO, "-SS-") !== false)
  {
    $SS++;
    $MSS += $row["NETO"];
    if (strpos($CODIGO_PROYECTO, "-CM") !== false)
    {
      $SSCM++;
      $MSSCM += $row["NETO"];
    }
    else
    {
      $SSSCM++;
      $MSSSCM += $row["NETO"];
    }   
  }
  
	

	  
	echo  "<tr><td >".($NOMBRE_CLIENTE)."</td>";
  echo  "<td align='center'> <a align = 'center' id='cod_ser' target='_blank' href=DescripcionRadicado.php?txt_codigo_proyecto2=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO. "</a></td>";	
	echo  "<td height='20' >".($OBRA)."</td>";
	echo  "<td align='center'  >".substr($FECHA_INGRESO,0,11)."</td>";
	echo  "<td align='center'  >".substr($FECHA_ENTREGA,0,11)."</td>";
	echo  "<td align='center' >".($DIAS)."</td>";
	echo  "<td align='right' >".number_format($SUB_TOTAL,0, ",", ".")."</td>";
	echo  "<td align='center' >".($DESCUENTO)."</td>";
	echo  "<td align='right' >".number_format($MONTO,0, ",", ".")."</td>";
	echo  "<td>".($DEPARTAMENTO_CREDITO)."</td>";
  echo  "<td align='center'  >".$PUESTOS."</td>";
	echo  "<td>".$EJECUTIVO."</td>";
	echo  "<td>".($CONTACTO)."</td>";
	echo  "<td>".($MAIL)."</td>";
	echo  "<td>".($ESTADO)."</td></tr>";

	$total_radicado++;
  $dias_dias  += $row["DIAS_RADICADO"];
  $monto_final +=  $row["NETO"];
  $subtotal_final +=  $row["SUB_TOTAL"];
  $puestos_final +=  $row["PUESTOS"];
 }

  mysql_free_result($result);

  $dias_dias =  $dias_dias / 100;
?>
</tbody>

<tr>
  <td align='right'><b>Total</b></td>
  <td align='center' colspan="3"><b><?php echo $total_radicado; ?></b></td>
  <td align='center'><b>Promedio Días</b></td>
  <td align='center'><b><?php echo  number_format($dias_dias,0); ?></b></td>
  <td align='center'><b><?php echo  number_format($subtotal_final,0,",","."); ?></b></td>
  <td align='center'></td>
  <td align='center'><b><?php echo  number_format($monto_final,0,",","."); ?></b></td>
  <td align='center'></td>
  <td align='center'><b><?php echo  number_format($puestos_final,0,",","."); ?></b></td>
<tr>
</table>

<div class="contenedor-tabla-radicado clearfix">

<table style="width:49%;float:left;margin-right:1%;" class='tabla-radicado' id = "informe_produccion">
  <caption><h1>Informe Radicado x Línea de Producto</h1><caption>
<thead>
<tr class='cheader'>
<th>N°</th>
<th>Linea</th>
<th>Proyecto</th> 
<th>Monto</th>
<th>%</th>
</tr>
</thead>
<tbody>
<?php
  $contador = 1;
  $MONTO3=0;
  $CUENTA3=0;
 while($row = mysql_fetch_array($result1))
  {
  $MONTO= $row["NETO"];
  $DEPARTAMENTO_CREDITO= $row["DEPARTAMENTO_CREDITO"];
  $CUENTA= $row["CUENTA"];
  $POR = 0;

  if($MONTO > 0 && $monto_final > 0)
  {
    $POR = $MONTO / $monto_final * 100; 
  }

  echo "<tr><td>   ".$contador."  </td>";
  echo "<td>".$DEPARTAMENTO_CREDITO."  </td>";
  echo "<td align='center' >   ".$CUENTA."  </td>";
  echo "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
  echo "<td  align='center'>".number_format($POR,2, ",", ".")."%</td></tr>";
    $contador++;
    $MONTO3+=$row['NETO'];
    $CUENTA3+=$row['CUENTA'];
  }
?>
</tbody>
<tr>
<td colspan="2" align="right"><b>Total</b></td>
<td align="center"><b><?php echo number_format($CUENTA3,0, ",", ".") ?></b></td>
<td align="right"><b><?php echo number_format($MONTO3,0, ",", ".") ?></b></td>
</tr>

</table>

<table style="width:49%;float:left;margin-left:1%;" class='tabla-radicado' id = "informe_produccion">
  <caption><h1>Informe Radicado x Director de Proyecto</h1><caption>
<thead>
<tr class='cheader'>
<th>N°</th>
<th>Linea</th>
<th>Proyecto</th> 
<th>Monto</th>
<th>%</th>
</tr>
</thead>
<tbody>
<?php
  $contador = 1;
  $MONTO3=0;
  $CUENTA3=0;
 while($row = mysql_fetch_array($result2))
  {
  $MONTO= $row["NETO"];
  $DEPARTAMENTO_CREDITO= $row["EJECUTIVO"];
  $CUENTA= $row["CUENTA"];
  $POR = 0;

  if($MONTO > 0 && $monto_final > 0)
  {
    $POR = $MONTO / $monto_final * 100; 
  }

  echo "<tr><td>   ".$contador."  </td>";
  echo "<td>".$DEPARTAMENTO_CREDITO."  </td>";
  echo "<td align='center' >   ".$CUENTA."  </td>";
  echo "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
  echo "<td  align='center'>".number_format($POR,2, ",", ".")."%</td></tr>";
    $contador++;
    $MONTO3+=$row['NETO'];
    $CUENTA3+=$row['CUENTA'];
  }
?>
</tbody>
<tr>
<td colspan="2" align="right"><b>Total</b></td>
<td align="center"><b><?php echo number_format($CUENTA3,0, ",", ".") ?></b></td>
<td align="right"><b><?php echo number_format($MONTO3,0, ",", ".") ?></b></td>
</tr>

</table>

</div>

<table  style="width:32%;float:left;margin-right:1%;" class='tabla-radicado' id = "informe_produccion">
  <caption><h1>Informe Radicado x Grupo de Ventas</h1><caption>
  <thead>
    <tr>
      <th>Departamento</th>
      <th>Proyecto</th>
      <th>Monto</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>Los Conquistadores</td>
      <td align="right"><?php echo $LC; ?></td>
      <td align="right"><?php echo number_format($MLC,0,",","."); ?></td>
    </tr>

    <tr>
      <td>La Dehesa</td>
      <td align="right"><?php echo $LD; ?></td>
      <td align="right"><?php echo number_format($MLD,0,",","."); ?></td>
    </tr>

    <tr>
      <td>Muebles y Diseños</td>
      <td align="right"><?php echo $MD; ?></td>
      <td align="right"><?php echo number_format($MMD,0,",","."); ?></td>
    </tr>

    <tr>
      <td>Sillas y Sillas</td>
      <td align="right"><?php echo $SS; ?></td>
      <td align="right"><?php echo number_format($MSS,0,",","."); ?></td>
    </tr>

  </tobdy>
</table>

<table  style="width:32%;float:left;margin-right:1%;" class='tabla-radicado' id = "informe_produccion">
  <caption><h1>Informe Radicado Mercado Publico</h1><caption>
  <thead>
    <tr>
      <th>Departamento</th>
      <th>Proyecto</th>
      <th>Monto</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>Los Conquistadores</td>
      <td align="right"><?php echo $LCCM; ?></td>
      <td align="right"><?php echo number_format($MLCCM,0,",","."); ?></td>
    </tr>

    <tr>
      <td>La Dehesa</td>
      <td align="right"><?php echo $LDCM; ?></td>
      <td align="right"><?php echo number_format($MLDCM,0,",","."); ?></td>
    </tr>

    <tr>
      <td>Muebles y Diseños</td>
      <td align="right"><?php echo $MDCM; ?></td>
      <td align="right"><?php echo number_format($MMDCM,0,",","."); ?></td>
    </tr>

    <tr>
      <td>Sillas y Sillas</td>
      <td align="right"><?php echo $SSCM; ?></td>
      <td align="right"><?php echo number_format($MSSCM,0,",","."); ?></td>
    </tr>

  </tobdy>
</table>

<table  style="width:32%;float:left;margin-right:1%;" class='tabla-radicado' id = "informe_produccion">
  <caption><h1><h1>Informe Radicado Mercado Privado</h1></h1><caption>
  <thead>
    <tr>
      <th>Departamento</th>
      <th>Proyecto</th>
      <th>Monto</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>Los Conquistadores</td>
      <td align="right"><?php echo $LCSCM; ?></td>
      <td align="right"><?php echo number_format($MLCSCM,0,",","."); ?></td>
    </tr>

    <tr>
      <td>La Dehesa</td>
      <td align="right"><?php echo $LDSCM;; ?></td>
      <td align="right"><?php echo number_format($MLDSCM,0,",","."); ?></td>
    </tr>

    <tr>
      <td>Muebles y Diseños</td>
      <td align="right"><?php echo $MDSCM;; ?></td>
      <td align="right"><?php echo number_format($MMDSCM,0,",","."); ?></td>
    </tr>

    <tr>
      <td>Sillas y Sillas</td>
      <td align="right"><?php echo $SSSCM;; ?></td>
      <td align="right"><?php echo number_format($MSSSCM,0,",","."); ?></td>
    </tr>

  </tobdy>
</table>

</body>
</html>