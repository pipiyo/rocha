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



$DESDE = "";
$HASTA = "";
$ROCHAROCHA = "";

$BUSCAR_CODIGO = "";





$txt_desde = '';
$txt_hasta = '';



if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];


$DESDE = $_GET["txt_desde"];
$HASTA = $_GET["txt_hasta"];

}








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
   <title> Informe Movimiento Bodega V1.0.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_informes.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />    
  <link rel="stylesheet" href="style/estilopopup.css" />
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
      
  <script language = javascript>
  $(function(){
                $('#buscar_codigo').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {      
                   }
                 });
				    });
  $(function() 

  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
  });     
  
  function enviar()
{
var as1= confirm("Realmente deseas modificar");

if(as1)                   
{
  document.getElementById("formulario11").submit();
}
else
{
  return false;
  //window.location="Materiales.php";
}
} 
function dias1()
{
var fecha1= document.getElementById('txt_fechai').value;
var dia1= fecha1.substr(8);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae').value;
var dia2= fecha2.substr(8);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);
var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));
        
document.getElementById('txt_dias').value=parseInt(dias) + 1; 
}
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	
  });
  </script>
</head>
<body>
	<div id='bread'><div id="menu1"></div></div>
<form action="" method="get">
<center>
<table  id = "formulario">
<tr>
  <th id="tit_pro" height="37" colspan="11" align="center" >Informe Movimiento Bodega</th>
  </tr>

<tr>

<td width="250">Fecha Inicio &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input style="border:grey 1px solid;border-radius: 8px;" name="txt_desde" id="txt_desde" type="text"  value="<?php echo $DESDE;?>" /></td>



<td width="150" align="left"> <input type="submit" style=" color:#000;background-color: #3ADF00; height:25px;border-radius: 10px; width:70px; border:#fff 1px solid;" id="buscar" name = "buscar" value = "Buscar" /> </td>



</tr>
<tr>


<td width="250">Fecha Termino &nbsp; &nbsp; &nbsp;<input style="border:grey 1px solid;border-radius: 8px;" name="txt_hasta" id="txt_hasta" type="text"  value="<?php echo $HASTA;?>" /></td>












</tr>

<tr>

</tr>

</table>
</center>
</form>
<br />
<center>  



<table id = "informe_produccion" cellpadding="0" cellspacing="0"  style="font-size:9px; width:98%;">
<?php
mysql_select_db($database_conn, $conn);
function dameFecha2($fecha,$dia)
{   
	list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),0);





if ($txt_desde != "" and $txt_hasta != "" )  
{


$sql111 = "SELECT actualizaciones_general.CODIGO_PRODUCTO,producto.DESCRIPCION, actualizaciones_general.CODIGO_GENERAL, actualizaciones.INGRESO, actualizaciones.NOMBRE_USUARIO, actualizaciones.EGRESO, actualizaciones.FECHA,actualizaciones.USUARIO,actualizaciones.ROCHA FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and actualizaciones.FECHA between '".$DESDE."' and '".$HASTA."'";


}
else
{


$sql111 = "SELECT actualizaciones_general.CODIGO_PRODUCTO,producto.DESCRIPCION, actualizaciones_general.CODIGO_GENERAL, actualizaciones.INGRESO, actualizaciones.NOMBRE_USUARIO, actualizaciones.EGRESO, actualizaciones.FECHA,actualizaciones.USUARIO,actualizaciones.ROCHA FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and actualizaciones.FECHA = '".$fecha7."'";


}







	





$result111 = mysql_query($sql111, $conn) or die(mysql_error());
$INGRESOS = 0;
$EGRESOS = 0;
$numero = 0;
 while($row = mysql_fetch_array($result111))
 {

	$DESCRIPCION_P = $row["DESCRIPCION"];
	$ROCHAP = $row["ROCHA"];
	$INGRESOP = $row["INGRESO"];
	$EGRESOP = $row["EGRESO"];
	$CODIGO_PRODUCTO12 = $row["CODIGO_PRODUCTO"];
	$NOMBRE_USUARIOP= $row["NOMBRE_USUARIO"];
	
	
	
	

	

	if($numero == 0)
	{	

	echo"<tr>
	     <th style='color:#000; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px; background:#3ADF00;'><center>Documento</center></th> 
		 <th style='color:#000; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; background:#3ADF00;'><center>User</center></th>
		 <th style='color:#000; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; background:#3ADF00;'><center>Codigo</center></th>
	     <th style='color:#000; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; background:#3ADF00;'><center>Descripcion</center></th>
		 <th style='color:#000; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; background:#3ADF00;'><center>Ingreso</center></th>
		  <th style='color:#000; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; background:#3ADF00;'><center>Egreso</center></th>
		  </tr>
		 ";
    	$numero = 20;
	
	}	

    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;'><center>".$ROCHAP."</center></td>";
	
	
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:;'><center>".$NOMBRE_USUARIOP."</center></td>";
	
	
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:;'>".$CODIGO_PRODUCTO12."</td>";
	
	
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:;'>".$DESCRIPCION_P."</td>";
	
	
		echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:;'><center>".$INGRESOP."</center></td>";
		echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:;'><center>".$EGRESOP."</center></td>";
	echo  "</tr>";
	$numero--;
	}
	
  mysql_close($conn);
?>
</table>
</body>
</html>