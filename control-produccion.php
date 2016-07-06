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
$txt_desde = dameFecha3(date("d-m-Y"),2);
$txt_hasta = dameFecha4(date("d-m-Y"),2);
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
$proceso = "";
if (isset($_GET["buscar"])) 
{    
$proceso = $_GET["proceso"];
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
}

$query_registro = "select empleado.nombres, empleado.apellido_paterno , empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$apellido_m = $row["apellido_materno"];
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
mysql_free_result($result2);
?>
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/Dth/xhtml11.dth">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Control Produccion V1.0.0</title>

  
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
    
  <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
    <link rel="shortcut icon" href="Imagenes/rocha.png">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  
  
 <script language = javascript>
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });     
  /*
   $(function() {
    $( document ).tooltip();
  });
  */
  
  </script>



</head>
<body>
<div id='bread'><div id="menu1"></div></div>
  <center> 

<h2>Control Producción</h2>


<form action="" method="get">
<table  id = "formulario">
<tr>

<td width="100"><input class="textbox" placeholder="Desde" name="txt_desde" id="txt_desde" type="text" /></td>
<td width="100"><input class="textbox" placeholder="Hasta" name="txt_hasta" id="txt_hasta" type="text" /></td>
<td width="100"><select class="textbox" id="proceso" name="proceso"  />
<option value="0"></option>
<option value="1">Corte</option>
<option value="2">Enchape Recto</option>
<option value="3">Enchape Curvo</option>
<option value="4">Perforador Multiple</option>
<option value="5">Centro De Mecanizado</option>
<option value="6">Laminado</option>
<option value="7">Ruteado</option>
<option value="8">Barniz</option>
<option value="9">Armado</option>
<option value="10">Mueble Especiales</option>
<option value="11">Limpieza</option>



</select>

</td>
<td width="100"> <input class="textbox3" type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
</tr>
</table>
<?php if($GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF")//1
{?>
<a id='proyectado' href="ingros-control-produccion-proyecto.php"  > Proyectados </a>
<?php } ?>
<!-- -->
<table id = 'table_madre' cellpadding="0" cellspacing="0" width="1900px">
<tr>
<td valign="top">


<table width="100%" id='table_control3' border="1" bordercolor="#ccc" frame="box" rules="all">
<tr><th height="60px"  id='control-azul' width="100px">Fecha</th></tr>

<?php 

function dameFecha5($fecha,$dia)
{   list($year,$mon,$day) = explode('-',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}
function dameFecha6($fecha,$dia)
{   list($year,$mon,$day) = explode('-',$fecha);
    return date('w',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$contador = 0;
$txt_desde1 = $txt_desde;
$txt_hasta1 = $txt_hasta;
while($txt_desde1 < $txt_hasta1)
{
	if($contador == 0)
	{
	$txt_desde1 = $txt_desde;	
	}
	else
	{
	$txt_desde1 = dameFecha5($txt_desde1,1);
	}
	
	if(dameFecha6($txt_desde1,1) == 0 || dameFecha6($txt_desde1,1) == 1  )
	{
    echo "<tr><td  align= 'center'> <b><a id= 'control_feriado' href='ingreso-control-produccion.php?fecha=".$txt_desde1."'>".$txt_desde1."</a></b></td></tr>";	
	}
	else
	{
	echo "<tr><td align= 'center'><a id= 'control_semana' href='ingreso-control-produccion.php?fecha=".$txt_desde1."'> ".$txt_desde1."</a></td></tr>";
	}
	$contador++;
}


switch ($proceso) {
	case 0:
        $proceso_final = "";
        break;
    case 1:
        $proceso_final = "Corte";
        $color = "control-cafe";
        break;
    case 2:
        $proceso_final = "Enchape Recto";
        $color = "control-rosa";
        break;
    case 3:
        $proceso_final = "Enchape Curvo";
        $color = "control-naranjo";
        break;
    case 4:
        $proceso_final = "Perforador Multiple";
        $color = "control-azul1";
        break;
    case 5:
        $proceso_final = "Centro De Mecanizado";
         $color = "control-azul1";
        break;    
    case 6:
        $proceso_final = "Laminado";
         $color = "control-celeste";
        break;
    case 7:
        $proceso_final = "Ruteado";
         $color = "control-celestecl";
        break;
    case 8:
        $proceso_final = "Barniz";
         $color = "control-cafe-claro";
        break; 
    case 9:
        $proceso_final = "Armado";
         $color = "control-verde";
        break;
    case 10:
        $proceso_final = "Mueble Especiales";
         $color = "control-crema";
        break;
    case 11:
        $proceso_final = "Limpieza";
         $color = "control-lila";
        break;          
}

?>

<tr><td align="center" id='totalcontrol' width="100px">Total</td></tr>
<tr><td align="center" id='totalcontrol' width="100px">Promedio</td></tr>
</table>
</td>

<?php if($proceso_final !=  "") {?>
<td valign="top">

<?php 
ini_set('max_execution_time', 500);
$PROYECTADO = 0;
$sql1 = "SELECT * FROM control_produccion where FECHA between '".$txt_desde."' and '".$txt_hasta."'  AND TIPO = '".$proceso_final."' ORDER BY FECHA  DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$PROYECTADO = $row["PROYECTADO"];
  }
mysql_free_result($result2);


?>

<table width="100%"  id='table_control'   border="1" bordercolor="#ccc" frame="box" rules="all">
<tr>
<th id='<?php echo $color; ?>' colspan="6"> <?php  echo $proceso_final.'(Proy-'. $PROYECTADO.')' ?></th> 
</tr>
<tr>
<th  id='<?php echo $color; ?>'>AM</th>
<th  id='<?php echo $color; ?>'>PM</th>
<th  id='<?php echo $color; ?>'>Noche</th>
<th  id='<?php echo $color; ?>'>Total</th>
<th  id='<?php echo $color; ?>'>Cant</th>
<th  id='<?php echo $color; ?>'>%</th>
</tr>
<?php 
$contador = 0;
$txt_desde1 = $txt_desde;
$txt_hasta1 = $txt_hasta;
$AMT=0;
$PMT=0;
$NOT=0;
$PRO=0;
$DIASSEM = 0;
$DIASSEM1 = 0;
while($txt_desde1 < $txt_hasta1)
{
	if($contador == 0)
	{
		$txt_desde1 = $txt_desde;	
	}
	else
	{
		$txt_desde1 = dameFecha5($txt_desde1,1);
	}
	$contador++;
	$numero = 0;

	$PROYECTADO = 0;
	$sql4 = "SELECT distinct * FROM servicio where (FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."' or FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."') and NOMBRE_SERVICIO = 'produccion' and PROCESO = '".$proceso_final."' AND NOT ESTADO = 'NULO'";
	$result4 = mysql_query($sql4, $conn) or die(mysql_error());
	while($row = mysql_fetch_array($result4))
  	{
  		$NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"];
  		$PROCESO = $row["PROCESO"];
  		$ESTADO_N = $row["ESTADO"];
  		$FECHA_INICIO = $row["FECHA_INICIO"];
    	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
    	$PROYECTADOs = $row["CANTIDAD"];
    	$DIAS = $row["DIAS"];

   
    	if(substr($FECHA_INICIO,0,10) <= $txt_desde1 && $FECHA_ENTREGA >= substr($txt_desde1,0,10) )
    	{
    
    		$diasferiados = 0;
    		$cuentadias = 0;
    		while(dameFecha5(substr($FECHA_INICIO,0,10),$cuentadias) <= substr($FECHA_ENTREGA,0,10))
    		{

				if(dameFecha6(substr($FECHA_INICIO,0,10),$cuentadias) == 0 || dameFecha6(substr($FECHA_INICIO,0,10) ,$cuentadias) == 6  )
				{
					$verificador = 0;
					$sql12 = "SELECT id FROM control_produccion where FECHA = '".dameFecha5(substr($FECHA_INICIO,0,10),$cuentadias)."' AND TIPO = '".$proceso_final."' ";
					$result22 = mysql_query($sql12, $conn) or die(mysql_error());
					while($row = mysql_fetch_array($result22))
  					{
  						$verificador++;
  					}
  					mysql_free_result($result22);
       				if ($verificador > 0)
       				{
					$diasferiados++;
	  			 	}
				}
     		$cuentadias++;
			}

			$DIAS = $DIAS + $diasferiados;
      		if($DIAS == 0)
    		{
    			$DIAS = 1;
    		}
    		$PROYECTADOa = $PROYECTADOs / $DIAS;
			$PROYECTADO+=$PROYECTADOa;
       }
    
	}
	
mysql_free_result($result4);
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$txt_desde1."' AND TIPO = '".$proceso_final."' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID = $row["ID"];
	$AM = $row["AM"];
	$PM = $row["PM"];
	$NOCHE = $row["NOCHE"];
	$OB = $row["OBSERVACION"];
	$FECHA = $row["FECHA"];
	$TIPO = $row["TIPO"];
	$TOTAL = $AM + $PM + $NOCHE;
	$AMT+=$AM;
	$PMT+=$PM;
	$NOT+=$NOCHE;
	$numero++;



$PRO+=$PROYECTADO;
if($PROYECTADO == 0 || $TOTAL == 0)
{
$PORCENTAJE = 0 ;	
}
else
{ 
$PORCENTAJE = ($TOTAL / $PROYECTADO) * 100;
}



		if(dameFecha6($txt_desde1,1) == 0 || dameFecha6($txt_desde1,1) == 1  )
	{
		echo "<tr><td title='".$OB."' id='control_fer' align = 'center'>".$AM."</td>";
		echo "<td title='".$OB."'id='control_fer' align = 'center'>".$PM."</td>";
		echo "<td title='".$OB."'id='control_fer' align = 'center'>".$NOCHE."</td>";
		if($PORCENTAJE >= 66)
		{
		echo "<td title='".$OB."' style='background-color:#BCF5A9;color:#000;' align = 'center'>".$TOTAL."</td>";
		}
		else if($PORCENTAJE < 66 && $PORCENTAJE > 32  )
		{
			echo "<td title='".$OB."' style='background-color:#F3F781;color:#000;' align = 'center'>".$TOTAL."</td>";
		}
		else
		{
		echo "<td title='".$OB."' style='background-color:#F78181;color:#fff;' align = 'center'>".$TOTAL."</td>";
		}
		echo "<td title='".$OB."' id='control_fer' align = 'center'><a target='_blank' href='produccion-resultado-control.php?txt_desde=".$txt_desde."&txt_hasta=".$txt_hasta."&txt_desde1=".$txt_desde1."&proceso=".$proceso_final."'>".number_format($PROYECTADO,0, ",", ".")."</a></td>";
		echo "<td title='".$OB."' id='control_fer' align = 'center'>".number_format($PORCENTAJE,1, ",", ".")."%</td>";
		$DIASSEM1++;
	}
	else
	{
		echo "<tr><td title='".$OB."' align = 'center'>".$AM."</td>";
		echo "<td title='".$OB."' align = 'center'>".$PM."</td>";
		echo "<td title='".$OB."' align = 'center'>".$NOCHE."</td>";
		if($PORCENTAJE >= 66)
		{
		echo "<td title='".$OB."' style='background-color:#BCF5A9;color:#000;' align = 'center'>".$TOTAL."</td>";
		}
		else if($PORCENTAJE < 66 && $PORCENTAJE > 32  )
		{
			echo "<td title='".$OB."' style='background-color:#F3F781;color:#000;' align = 'center'>".$TOTAL."</td>";
		}
		else
		{
		echo "<td title='".$OB."' style='background-color:#F78181;color:#fff;' align = 'center'>".$TOTAL."</td>";
		}
		echo "<td title='".$OB."' align = 'center'><a target='_blank'  href='produccion-resultado-control.php?txt_desde=".$txt_desde."&txt_hasta=".$txt_hasta."&txt_desde1=".$txt_desde1."&proceso=".$proceso_final."'>".number_format($PROYECTADO,0, ",", ".")."</a></td>";
		echo "<td title='".$OB."' align = 'center'>".number_format($PORCENTAJE,1, ",", ".")."%</td>";
		$DIASSEM++;
		$DIASSEM1++;
	}
  }
mysql_free_result($result2);





if($numero == 0)
{
	if(dameFecha6($txt_desde1,1) == 0 || dameFecha6($txt_desde1,1) == 1  )
	{
		echo "<tr><td id='control_fer'></td>";
		echo "<td id='control_fer'></td>";
		echo "<td id='control_fer'></td>";
		echo "<td id='control_fer'></td>";
		echo "<td align='center' id='control_fer'></td>";
		echo "<td id='control_fer'></td>";
	}
	else
	{
	echo "<tr><td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	if(number_format($PROYECTADO,1, ",", ".") == '0,0')
{
	echo "<td></td>";
}
else
{
		echo "<td align='center'><a target='_blank'  href='produccion-resultado-control.php?txt_desde=".$txt_desde."&txt_hasta=".$txt_hasta."&txt_desde1=".$txt_desde1."&proceso=".$proceso_final."'>".number_format($PROYECTADO,0, ",", ".")."</a></td>";
}
		echo "<td></td>";
		$DIASSEM++;
	}
}
}
?>
<?php
$TOTAFIN = $AMT + $PMT + $NOT;

if($TOTAFIN == 0 || $PRO == 0)
{
	$PORCENTAJEFIN = 0;
}
else
{
$PORCENTAJEFIN = ($TOTAFIN / $PRO) * 100;
}


if($DIASSEM1 == 0 || $AMT == 0)
{
	$AMP = 0;
}
else
{
	$AMP = $AMT / $DIASSEM1;
}

if($DIASSEM1 == 0 || $PMT == 0)
{
	$PMP = 0;
}
else
{
	$PMP = $PMT / $DIASSEM1;
}

if($DIASSEM1 == 0 || $NOT == 0)
{
	$NOP = 0;
}
else
{
	$NOP = $NOT / $DIASSEM1;
}

if($DIASSEM1 == 0 || $PRO == 0)
{
	$PROP = 0;
}
else
{
	$PROP = $PRO / $DIASSEM1;
}
$TOTALPRO= $AMP + $PMP + $NOP ;

if($TOTALPRO == 0 || $PROP == 0)
{
	$PORCENTAJEPRO = 0;
}
else
{
$PORCENTAJEPRO  = ($TOTALPRO / $PROP) * 100;
}

?>
<tr>
<td id='footercontrolpro' align="center"><?php echo $AMT ?></td>
<td id='footercontrolpro' align="center"><?php echo $PMT ?></td>
<td id='footercontrolpro' align="center"><?php echo $NOT ?></td>
<?php if($PORCENTAJEFIN >= 66)
		{?>
<td style='background-color:#BCF5A9;color:#000;' align="center"><?php echo $TOTAFIN ?></td>
<?php } else if($PORCENTAJEFIN < 66 && $PORCENTAJEFIN > 32  ) { ?>
<td style='background-color:#F3F781;color:#000;' align="center"><?php echo $TOTAFIN ?></td>
<?php } else {?>
<td style='background-color:#F78181;color:#fff;' align="center"><?php echo $TOTAFIN ?></td>
<?php } ?>
<td id='footercontrolpro'align="center"><?php echo number_format($PRO,0, ",", ".") ?></td>
<td id='footercontrolpro'align="center"><?php echo number_format($PORCENTAJEFIN,1, ",", ".") ?>%</td>
</tr>
<tr>
<td  align="center"><?php echo number_format($AMP,0, ",", ".") ?></td>
<td  align="center"><?php echo number_format($PMP,0, ",", ".") ?></td>
<td  align="center"><?php echo number_format($NOP,0, ",", ".") ?></td>
<?php if($PORCENTAJEPRO >= 66)
		{?>
<td style='background-color:#BCF5A9;color:#000;' align="center"><?php echo number_format($TOTALPRO,0, ",", ".") ?></td>
<?php } else if($PORCENTAJEPRO< 66 && $PORCENTAJEPRO > 32  ) { ?>
<td style='background-color:#F3F781;color:#000;' align="center"><?php echo number_format($TOTALPRO,0, ",", ".") ?></td>
<?php } else {?>
<td style='background-color:#F78181;color:#fff;' align="center"><?php echo number_format($TOTALPRO,1, ",", ".") ?></td>
<?php } ?>

<td align="center"><?php echo number_format($PROP,0, ",", ".")  ?></td>
<td align="center"><?php echo number_format($PORCENTAJEPRO ,1, ",", ".") ?>%</td>
</tr>
</table>
</td>
<?php }?>
</tr>
</table>

</form>
</center>
</body>
</html>