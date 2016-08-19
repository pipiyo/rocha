<?php 
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
	echo '<script language = javascript>
	alert("usuario no autenticado")
	self.location = "index.php"
	</script>';
}
mysql_select_db($database_conn, $conn);
/* Funciones para la suma y resta de días */

function dameFecha3($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day-$dia,$year));        
}
function dameFecha4($fecha,$dia)
{   list($day,$mon,$year) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

if(date("w") == 1)
{
	$txt_desde = dameFecha3(date("d-m-Y"),3);
	$txt_hasta = dameFecha4(date("d-m-Y"),3);
}
else if(date("w") == 2)
{
	$txt_desde = dameFecha3(date("d-m-Y"),4);
	$txt_hasta = dameFecha4(date("d-m-Y"),2);
}
else if(date("w") == 3)
{
	$txt_desde = dameFecha3(date("d-m-Y"),5);
	$txt_hasta = dameFecha4(date("d-m-Y"),1);
}
else if(date("w") == 4)
{
	$txt_desde = dameFecha3(date("d-m-Y"),6);
	$txt_hasta = dameFecha4(date("d-m-Y"),0);
}
else if(date("w") == 5)
{
	$txt_desde = dameFecha3(date("d-m-Y"),7);
	$txt_hasta = dameFecha4(date("d-m-Y"),6);
}
else if(date("w") == 6)
{
	$txt_desde = dameFecha3(date("d-m-Y"),1);
	$txt_hasta = dameFecha4(date("d-m-Y"),5);
}
else if(date("w") == 0)
{
	$txt_desde = dameFecha3(date("d-m-Y"),2);
	$txt_hasta = dameFecha4(date("d-m-Y"),4);
}

if (isset($_GET["buscar"])) 
{    
	if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
	{
		$txt_desde = $_GET["txt_desde"];
		$txt_hasta = $_GET["txt_hasta"];
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Informe de cumplimiento V1.0</title>

		<meta charset="utf-8" >
		
		<link rel="shortcut icon" href="Imagenes/rocha.png">
		<link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
	  	

	  	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

	  	<!--Calendario -->
	  	<link rel="stylesheet" href="style/calendario.css" />
	  	<script src="js/calendario.js"></script>

	 
	    <script src='js/breadcrumbs.php'></script>
	    <link rel="styleSheet" href="style/bread.css" type="text/css" >
	 	
	 	<script language = javascript>
	  	$(function() 
	  	{
			$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
			$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	
	  	});     
	  	</script>
	</head>
	<body>
		<div id='bread'>
			<div id="menu1"></div>
		</div> 
		<h2 id='indi_h2'>Producutividad despacho / Desde <?php echo $txt_desde ?> / Hasta <?php echo $txt_hasta ?> </h2>

		<form action="" method="get">
			<table  id = "formulario" class="center">
				<tr>
					<td width="100">Desde</td>
					<td width="100"><input class='textbox' name="txt_desde" id="txt_desde" type="text" /></td>
					<td width="100">Hasta</td>
					<td width="100"><input class='textbox'  name="txt_hasta" id="txt_hasta" type="text" /></td>
					<td width="100"> <input class='casillaBotonPS1' type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
				</tr>
			</table>
		</form>
		<table class="normal-table">
			<tr>
				<th> Vehiculo</th>
				<th> Q </th>
				<th> % </th>
			</tr>
		<?php
			$query_registro1 = "SELECT count(TRANSPORTE) as total, TRANSPORTE FROM servicio where not TRANSPORTE in ('null','') AND FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' AND not ESTADO in('NULO') group by TRANSPORTE";
			
			$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

			$num = array();
			$nam = array();
			while($row = mysql_fetch_array($result1))
			{  	
				array_push($num,$row[0]);
				array_push($nam,$row[1]);	
			}
			
			$f = 0;
			for($i=0; $i < count($num); $i++) {
				$total =  $num[$i] * 100 / array_sum($num);
				$f += $total;
				echo "<tr> <td>".$nam[$i]."</td> <td align='right'>".$num[$i]."</td> <td align='right'>".number_format($total,0,",",".")."%</td> </tr>";
			}
		?>

			<tr>
				<td>Total</td>
				<td><?php echo array_sum($num);?></td>
				<td><?php echo number_format($f,0,",",".");?> %</td>
			</tr>
		</table>

		<?php mysql_free_result($result1); ?>

		<table class="normal-table">
			<tr>
				<th> Zona</th>
				<th> Q </th>
				<th> % </th>
			</tr>
		<?php
			$query_registro1 = "SELECT count(region_1.ZONA) as total, region_1.ZONA from comunas, servicio, region_1 where region_1.CODIGO = comunas.CODIGO_REGION1 and comunas.CODIGO_COMUNA  = servicio.CODIGO_COMUNA and servicio.NOMBRE_SERVICIO = 'Despacho' AND FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' AND not ESTADO in('NULO') and not TRANSPORTE in ('null','') group by region_1.ZONA";
			
			$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
			$num = array();
			$nam = array();
			while($row = mysql_fetch_array($result1))
			{  	
				array_push($num,$row[0]);
				array_push($nam,$row[1]);
			}

			$f = 0;
			for($i=0; $i < count($num); $i++) {
				$total =  $num[$i] * 100 / array_sum($num);
				$f += $total;
				echo "<tr> <td>".$nam[$i]."</td> <td align='right'>".$num[$i]."</td> <td align='right'>".number_format($total,0,",",".")."%</td> </tr>";
			}
		?>
			<tr>
				<td>Total</td>
				<td><?php echo array_sum($num);?></td>
				<td><?php echo number_format($f,0,",",".");?> %</td>
			</tr>
		</table>
		<?php mysql_free_result($result1); ?>

		<table class="normal-table">
			<tr>
				<th> Centro de costo</th>
				<th> Q </th>
				<th> % </th>
			</tr>
		<?php
			$query_registro1 = "SELECT servicio.CODIGO_PROYECTO, servicio.RECLAMOS FROM servicio where not TRANSPORTE in ('null','') AND FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."' AND not ESTADO in('NULO')";
			
			$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
			$num = array();
			$nam = array();
			while($row = mysql_fetch_array($result1))
			{  	
				array_push($num,$row[0]);
				array_push($nam,$row[1]);
			}

			$tp = 0;
			$rh = 0;
			$rc = 0;
			$to = 0;
			for($i=0; $i < count($num); $i++){

				$query_registro2 = "SELECT  CODIGO_RECLAMO FROM RECLAMOS WHERE CODIGO_RECLAMO = '".$nam[$i]."'";
				$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
				$ok = 0;
				while($row2 = mysql_fetch_array($result2))
				{
					$ok = 1;
				}  	
				mysql_free_result($result2);

				if(substr($num[$i],0,2) == "TP"){
					$tp++;
				}else if($ok == 1){
					$rc++;
				}else{
					$rh++;
				}
				$to++;
			} 
			$rh_porcentaje = 0;
			$tp_porcentaje = 0;
			$rc_porcentaje = 0;
			$to_porcentaje = 0;

			if($rh > 0){$rh_porcentaje =  $rh * 100 / $to;}
			if($tp > 0){$tp_porcentaje =  $tp * 100 / $to;}
			if($rc > 0){$rc_porcentaje =  $rc * 100 / $to;}
			if($to > 0){$to_porcentaje =  $to * 100 / $to;}

			echo "<tr> <td>Rocha</td> <td align='right'>".$rh."</td> <td align='right'>".number_format($rh_porcentaje,0,",",".")."%</td> </tr>";
			echo "<tr> <td>TP</td> <td align='right'>".$tp."</td> <td align='right'>".number_format($tp_porcentaje,0,",",".")."%</td> </tr>";
			echo "<tr> <td>Reclamo</td> <td align='right'>".$rc."</td> <td align='right'>".number_format($rc_porcentaje,0,",",".")."%</td> </tr>";
		?>
			<tr>
				<td>Total</td>
				<td><?php echo $to;?></td>
				<td><?php echo number_format($to_porcentaje,0,",",".")?>%</td>
			</tr>
		</table>
		<?php mysql_free_result($result1); ?>
	</body>
</html>