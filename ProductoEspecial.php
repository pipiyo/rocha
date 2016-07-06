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
$ESTADOV = "";

$txt_hasta = '2050-01-01';
$txt_desde = '0000-00-00';
$DESDE = $txt_desde;
$HASTA = $txt_hasta;

$COTIZADOR= "";
$DIRECTOR= "";
$EMPRESA= "";
$RADICADO = "";
$COD_PRO = "";
$CLIENTE= "";

if (isset($_GET["buscar"]))
{
	if($_GET["txt_desde"]!= "" && $_GET["txt_hasta"] != "")
	{
		$DESDE = $_GET["txt_desde"];
		$HASTA = $_GET["txt_hasta"];
	}
	$ESTADOV = $_GET["ESTADO"];
	$RADICADO = $_GET["txt_radicado"];
	$COD_PRO = $_GET["txt_cod_producto"];
	$CLIENTE= $_GET["txt_cliente"];
		
	if (isset($_GET["txt_empresa"])){
		$EMPRESA= $_GET["txt_empresa"];
	}

if (isset($_GET["txt_director"])){
	$DIRECTOR= $_GET["txt_director"];
}

if (isset($_GET["txt_cotizador"])){
	$COTIZADOR= $_GET["txt_cotizador"];
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
 	<title>Listado cotizacion especial V1.0.0</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
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
     $('.table-especial').tablesorter(); 
  });  
	</script>
</head>

<body>
<div id="header-radicado-rocha">	
<div id='bread'><div id="menu1"></div></div>	
<div id="contenedor-rad"> 

<h1 id="h1_PS">Informe Estado Cotizaciones Producto Especial</h1>

<form action="" method="GET" name="formulario">
<table cellspacing="0" class="tablas_Producto_Especial">
<tr>
<td><input placeholder="Desde" class="textbox" type="text" id = 'txt_desde' name = "txt_desde"  value=""></td>
<td><input placeholder="Hasta" class="textbox" type="text" id = 'txt_hasta' name = "txt_hasta"  value=""></td>
<td><input placeholder="Cliente" class="textbox" type="text" id = 'txt_cliente' name = "txt_cliente"  value=""></td>
<td><select class="textbox" type="text" id = 'txt_director' name = "txt_director" ><option value="">Director</option>
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
</select></td>

<td ><select class="textbox" type="text" id = 'txt_cotizador' name = "txt_cotizador"  ><option value="">Cotizador</option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'TEC'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select>

</td>

<td rowspan="2" align="center"><a onClick="document.formulario.action='cotizacion-especial.php'; document.formulario.submit();" target="_blank">
<img src="Imagenes/nuevo.png" style = "border:0px;" alt="Exportar a Excel"></a></td>



</tr>

<td ><input placeholder="Radicado"  class="textbox" type="text" id = 'txt_radicado' name = "txt_radicado"  value=""></td>


<td ><input placeholder="Codigo Producto"  class="textbox" type="text" id = 'txt_cod_producto' name = "txt_cod_producto"  value=""></td>


<td >
<select   id = 'txt_empresa' name = "txt_empresa" type ="text" class="textbox" >
<option value="">Empresa </option>
  <option>Los Conquistadores</option>
      <option>La Dehesa</option>
      <option>Beatriz Gonzalez</option>
      <option>Muebles y Diseños </option>
      <option>Sillas y Sillas</option>
</select>
</td>


<?php 
$TODOS1 = "";
$PROCESO1 = "";
$NULO1 = "";
$OK1 = "";
$COTIZANDO1 ="";
if($ESTADOV == "PENDIENTE")
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
else if($ESTADOV == "COTIZANDO")
{
	$COTIZANDO1 = 'selected';
}
?>

	<td ><select class="textbox" type="text" id = 'ESTADO' name = "ESTADO"  >    <option value="">Estado</option>
	<option <?php echo $PROCESO1;?>>EN PROCESO</option>
    <option <?php echo $TODOS1;?> >PENDIENTE</option>
    <option <?php echo $NULO1;?>>NULO</option>
    <option <?php echo $COTIZANDO1;?>>COTIZANDO</option>
    <option <?php echo $OK1;?>>OK</option>
    </select>
	</td>
	<td ><input class="boton" type="submit" id = 'buscar' name = "buscar"  value="Buscar"></td>
</tr>

</table>
</form>
</div>
</div>




<table class='table-especial fixed'>
<thead>

<tr class='cheader'>
<th>ID</th>
<th> Radicado</th>
<th>Codigo Producto</th>
<th>Cliente</th>
<th>Cantidad de Muebles</th>
<th>Cantidad Item</th>
<th>Tiempo Desarrollo</th>
<th>Tipo de Mueble Hrs</th>
<th>Observaciones</th>
<th>Valor de Venta</th>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php }else { ?>

<th>Costo de Produccion</th>
<?php } ?>

<th>Fecha de Ingreso</th>
<th>Fecha de Entrega</th>
<th>Fecha de Confirmacion</th>
<th>Desface días</th>
<th>Director de Proyecto</th>
<th>Empresa</th>
<th>Cotizador</th>
<th id="thtotal">Estado</th>


</tr>
</thead>
<tboby>
<?php

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);
$numero = 0;





/*---------*/


$query_registro = "select * FROM cotizacion_producto_especial WHERE  FECHA_CONFIRMACION BETWEEN '".$DESDE."'  AND '".$HASTA."'";


if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{

	$ejutiv="";
foreach ($equipo as $valor)
{
    $ejutiv .= ",'".$valor."'";
}

$query_registro .= " AND DIRECTOR_PROYECTO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") ";	

}else if($DIRECTOR != ''){


$query_registro .= " and DIRECTOR_PROYECTO = '".($DIRECTOR)."' ";

}

if($RADICADO != '') 
{ 
$query_registro .= " and CODIGO_RADICADO = '".$RADICADO."'  ";
}	

if($ESTADOV  != "")
{
	$query_registro .= " and ESTADO = '".$ESTADOV."' ";
}
else
{
  $query_registro .= " and ESTADO NOT IN ('OK','NULO') ";
}

if($COD_PRO != "")
{
	$query_registro .= " and CODIGO_PRODUCTO = '".$COD_PRO."' ";
}

if($CLIENTE != '')
{
$query_registro .= " and CLIENTE = '".$CLIENTE."' ";
}

if($EMPRESA != '')
{
$query_registro .= " and EMPRESA = '".$EMPRESA."' ";
}

if($COTIZADOR != '')
{
$query_registro .= " and COTIZADOR = '".$COTIZADOR."'";
}

$result2 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
  {
		$ID = $row["ID"];					 
		$CODIGO_RADICADO = $row["CODIGO_RADICADO"];						 	 	
		$CLIENTE = $row["CLIENTE"];						 	 	
		$RUT_CLIENTE = $row["RUT_CLIENTE"];						 	 	
		$CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];						 	 	
		$CANTIDAD_MUEBLES = $row["CANTIDAD_MUEBLES"];	
		$CANTIDAD_ITEM = $row["CANTIDAD_ITEM"];						 	 	
		$OBSERVACIONES = $row["OBSERVACIONES"];						 	 	
		$VALOR_VENTA = $row["VALOR_VENTA"];						 	 	
		$COSTO_PRODUCCION = $row["COSTO_PRODUCCION"];						 	 	
		$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];					 	 	
		$FECHA_INGRESO = $row["FECHA_INGRESO"];						 	 	
		$FECHA_ENTREGA = $row["FECHA_ENTREGA"];						 	 	
		$TIPO_MUEBLE = $row["TIPO_MUEBLE"];						 	 	
		$COTIZADOR = $row["COTIZADOR"];						 	 	
		$DIRECTOR_PROYECTO = $row["DIRECTOR_PROYECTO"];						 	 							 	 	
	    $DIAS = $row["DIAS"];						 	 	
		$EMPRESA = $row["EMPRESA"];					 	 	
		$ESTADO = $row["ESTADO"];
		$TIEMPO_DESARROLLO = $row["TIEMPO_DESARROLLO"];
	

	
	echo "<tr><td align='center'><a href='cotizacion-especial-descripcion.php?CODIGO_TI=".$ID."''>". $ID."</a></td>";
	echo "<td >". 
	    $CODIGO_RADICADO."</td>";	
	echo "<td >". 
	    $CODIGO_PRODUCTO."</td>";
	
		echo "<td  >". 
	    $CLIENTE."</td>";
	
	echo "<td align='center'>". 
	    $CANTIDAD_MUEBLES."</td>";
		echo "<td align='center'>". 
	    $CANTIDAD_ITEM."</td>"; 
		echo "<td align='center'>". 
	    number_format($TIEMPO_DESARROLLO,0,",",".")."</td>";     

echo "<td >".$TIPO_MUEBLE."</td>";
				
		echo "<td >".$OBSERVACIONES."</td>";
		echo "<td align='right'>".number_format($VALOR_VENTA, 0, ",", ".")."</td>";
		
		if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
}else{
				
		
						echo "<td align='right'>".number_format($COSTO_PRODUCCION, 0, ",", ".")."</td>";
						
}
						
				
						echo "<td align='center' >".$FECHA_INGRESO."</td>";
				
						echo "<td align='center'>".$FECHA_ENTREGA."</td>";
						
						
							
							if($ESTADO == "OK")
		{
			echo "<td id='azul' align='center'>".$FECHA_CONFIRMACION."</td>";
		}
		else
	{	
		
		
		if($FECHA_CONFIRMACION > $fecha7)
		{
			echo "<td id='verde' align='center'>".$FECHA_CONFIRMACION."</td>";	
		}
		else if($FECHA_CONFIRMACION < date('Y-m-d'))
		{
			echo "<td id='rojo' align='center'>".$FECHA_CONFIRMACION."</td>";			
		}
		else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
		{
			echo "<td id='amarillo' align='center'>".$FECHA_CONFIRMACION."</td>";	
	 	 		
		}
				
	}
						
						
						
		
								echo "<td align='center'>".$DIAS."</td>";
		
								echo "<td >".$DIRECTOR_PROYECTO."</td>";
	
								echo "<td>".$EMPRESA."</td>";
	
										echo "<td>".$COTIZADOR."</td>";		

    echo "<td id='td_borde_derecho'>".$ESTADO."</td></tr>";
    $numero++;
  }
  mysql_free_result($result2);

?>

<tboby>
</table>



<br />
<table>
<tr>
<td valign="top">



<table class="table-especial">

<th style="width:200px;">Director de Proyecto</th>
<th style="width:75px;">Cantidad de Cotizaciones</th>
<th  style="width:75px;">Valor de Venta</th>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php }else { ?>
<th style="width:75px;">Costo de Produccion</th>
<th style="width:75px;" id="thtotal">%</th>
<?php } ?>
</tr>
<?php
$VALOR1=0;
$COSTO1=0;
$tot1=0;
$ID1=0;
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{


    $query_registro2 = "SELECT count(ID) AS ID,sum(VALOR_VENTA) AS VALOR,sum(COSTO_PRODUCCION) AS COSTO,DIRECTOR_PROYECTO FROM cotizacion_producto_especial where  DIRECTOR_PROYECTO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") GROUP BY DIRECTOR_PROYECTO";
}
else
{
	$query_registro2 = "SELECT count(ID) AS ID,sum(VALOR_VENTA) AS VALOR,sum(COSTO_PRODUCCION) AS COSTO,DIRECTOR_PROYECTO FROM cotizacion_producto_especial GROUP BY DIRECTOR_PROYECTO";
}
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
  {
	
	$ID = $row["ID"];						 	 	
	$VALOR = $row["VALOR"];						 	 	
    $COSTO = $row["COSTO"];		
	
	$VALOR1 +=$row['VALOR'];
	$COSTO1+=$row['COSTO'];
	$ID1+=$row['ID'];			 	 	
	$DIRECTOR_PROYECTO = $row["DIRECTOR_PROYECTO"];
	
	if($VALOR <= 0 ||  $COSTO <= 0)
	{
		$tot= 0;
	}
	else
	{
		$tot = $COSTO / $VALOR * 100;
		$tot1+=$tot;
	}

	echo "<tr><td>".$DIRECTOR_PROYECTO."</td>";
		
	echo "<td align='right'>".$ID."</td>";
	
	echo "<td align='right'>".number_format($VALOR, 0, ",", ".")."</td>";
	
	if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
}else{
	echo "<td align='right'>".number_format($COSTO, 0, ",", ".")."</td>";

    echo "<td id='td_borde_derecho'>".number_format($tot, 0, ",", ".")."%</td>";
}
echo '</tr>';
  }
  mysql_free_result($result2);
  if($VALOR1 <= 0 ||  $COSTO1 <= 0)
	{
		$tot1= 0;
	}
	else
	{
		
			$tot1 = $COSTO1 / $VALOR1 * 100;
	}


?>
<tr>
<td  align='right' colspan="1"><b>total</b></td>
<td  align='right'><b><?php echo  $ID1  ?></b></td>
<td  align='right'><b><?php echo  number_format($VALOR1, 0, ",", ".");  ?></b></td>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php }else { ?>
<td  align='right'><b><?php echo  number_format($COSTO1, 0, ",", ".");  ?></b></td>
<td align="center" id='td_borde_derecho'><b><?php echo number_format($tot1, 0, ",", ".");  ?>%</b></td>
<?php } ?>
</tr>
</table>






</td>
<td valign="top">








<table  class="table-especial">

<th style="width:200px;">Empresa</th>
<th style="width:75px;">Cantidad de Cotizaciones</th>
<th style="width:75px;">Valor de Venta</th>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php }else { ?>
<th style="width:75px;">Costo de Produccion</th>
<th style="width:75px;" id="thtotal">%</th>
<?php } ?>
</tr>
<?php
$VALOR1=0;
$COSTO1=0;
$tot1=0;
$ID1=0;
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
$query_registro2 = "SELECT count(ID) AS ID,sum(VALOR_VENTA) AS VALOR,sum(COSTO_PRODUCCION) AS COSTO,EMPRESA FROM cotizacion_producto_especial where  DIRECTOR_PROYECTO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.")  GROUP BY EMPRESA";
}
else
{
$query_registro2 = "SELECT count(ID) AS ID,sum(VALOR_VENTA) AS VALOR,sum(COSTO_PRODUCCION) AS COSTO,EMPRESA FROM cotizacion_producto_especial GROUP BY EMPRESA";
}
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
  {
	
	$ID = $row["ID"];						 	 	
	$VALOR = $row["VALOR"];						 	 	
    $COSTO = $row["COSTO"];					 	 	
	$EMPRESA = $row["EMPRESA"];
		$ID1+=$row['ID'];
		$VALOR1 +=$row['VALOR'];
	$COSTO1+=$row['COSTO'];
	
		if($VALOR <= 0 ||  $COSTO <= 0)
	{
		$tot= 0;
	}
	else
	{
		$tot = $COSTO / $VALOR * 100;
			$tot1+=$tot;
	}


	echo "<tr><td>".$EMPRESA."</td>";
		
	echo "<td align='right'>".$ID."</td>";
	
	echo "<td align='right'>".number_format($VALOR, 0, ",", ".")."</td>";
	if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
}
else
{
	echo "<td align='right'>".number_format($COSTO, 0, ",", ".")."</td>";
    echo "<td id='td_borde_derecho'>".number_format($tot, 0, ",", ".")."%</td>";
}
echo '</tr>';
  }
  mysql_free_result($result2);
  if($VALOR1 <= 0 ||  $COSTO1 <= 0)
	{
		$tot1= 0;
	}
	else
	{
		
			$tot1 = $COSTO1 / $VALOR1 * 100;
	}


?>
<tr>
<td  align='right' colspan="1"><b>total</b></td>
<td  align='right'><b><?php echo  $ID1  ?></b></td>
<td  align='right'><b><?php echo  number_format($VALOR1, 0, ",", ".");  ?></b></td>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php }else { ?>
<td  align='right'><b><?php echo  number_format($COSTO1, 0, ",", ".");  ?></b></td>
<td align="center" id='td_borde_derecho'><b><?php echo number_format($tot1, 0, ",", ".");  ?>%</b></td>
<?php } ?>
</tr>
</table>





</td>
<td valign="top">



<table  class="table-especial">

<th style="width:200px;">Cotizador</th>
<th style="width:75px;">Cantidad de Cotizaciones</th>
<th style="width:75px;">Valor de Venta</th>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php }else { ?>
<th style="width:75px;">Costo de Produccion</th>
<th style="width:75px;" id="thtotal">%</th>
<?php } ?>
</tr>
<?php
$VALOR1=0;
$COSTO1=0;
$tot1=0;
$ID1=0;
if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
$query_registro2 = "SELECT count(ID) AS ID,sum(VALOR_VENTA) AS VALOR,sum(COSTO_PRODUCCION) AS COSTO,COTIZADOR FROM cotizacion_producto_especial where  DIRECTOR_PROYECTO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.")  GROUP BY COTIZADOR";
}
else
{
$query_registro2 = "SELECT count(ID) AS ID,sum(VALOR_VENTA) AS VALOR,sum(COSTO_PRODUCCION) AS COSTO,COTIZADOR FROM cotizacion_producto_especial GROUP BY COTIZADOR";
}
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
  {
	
	$ID = $row["ID"];						 	 	
	$VALOR = $row["VALOR"];						 	 	
    $COSTO = $row["COSTO"];					 	 	
	$COTIZADOR = $row["COTIZADOR"];
		$ID1+=$row['ID'];
		$VALOR1 +=$row['VALOR'];
	$COSTO1+=$row['COSTO'];
	
		if($VALOR <= 0 ||  $COSTO <= 0)
	{
		$tot= 0;
	}
	else
	{
		$tot = $COSTO / $VALOR * 100;
			$tot1+=$tot;
	}


	echo "<tr><td>".$COTIZADOR."</td>";
		
	echo "<td align='right'>".$ID."</td>";
	
	echo "<td align='right'>".number_format($VALOR, 0, ",", ".")."</td>";
	
	if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
}
else
{
	echo "<td align='right'>".number_format($COSTO, 0, ",", ".")."</td>";
    echo "<td id='td_borde_derecho'>".number_format($tot, 0, ",", ".")."%</td>";
}
echo '</tr>';
  }
  mysql_free_result($result2);
  
  	if($VALOR1 <= 0 ||  $COSTO1 <= 0)
	{
		$tot1= 0;
	}
	else
	{
		
			$tot1 = $COSTO1 / $VALOR1 * 100;
	}

?>
<tr>
<td  align='right' colspan="1"><b>total</b></td>
<td  align='right'><b><?php echo  $ID1  ?></b></td>
<td  align='right'><b><?php echo  number_format($VALOR1, 0, ",", ".");  ?></b></td>
<?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{?>
<?php }else { ?>
<td  align='right'><b><?php echo  number_format($COSTO1, 0, ",", ".");  ?></b></td>
<td align="center" id='td_borde_derecho'><b><?php echo number_format($tot1, 0, ",", ".");  ?>%</b></td>
<?php }?>
</tr>
</table>

</td>
</tr>
</table>


</div>

<div onClick="reback();" id="BACK" >
</div>
</div>
</body>
</html>