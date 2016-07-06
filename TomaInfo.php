<?php require_once('Conexion/Conexion.php'); ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}


mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".($CODIGO_USUARIO)."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;


 while($row = mysql_fetch_array($result1))
  {
	  
	  
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  
  
  }
  
  
mysql_free_result($result1);
$CODIGO_OC = "";
$BUSCAR_CLI = "";
$BUSCAR_CODIGO = "";
$BUSCAR_DESCRIPCION = "";	
$BUSCAR_ROCHA = "";	
$ES = "";
$contador1 = 0;
if (isset($_GET["buscar"])) 
{
	$ES = $_GET['estado1'];
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
 <title>Toma Informacion V1.0.0</title>
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  
  <link rel="stylesheet" type="text/css" href="Style/style_informes.css" />
  
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />

 <script language = javascript> 
  

			
	 $(function() 
  {
		$( ".textf" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });  
  
function enviar()
{
var as1= confirm("Realmente deseas modificar");

if(as1)                   
{
  document.getElementById("formulario1").submit();
}
else
{
  return false;
  //window.location="Materiales.php";
}
} 
 </script>
</head>
<body>
<br />
<center>
  <form  method="GET"/>  
  <h1 id="tit_tomainfo">Toma de informacion</h1>    
  <br />
  <table width="1009">
  <tr>
  <td width="55"> Numero: </td>
  <td width="144"> <input style="border:grey 1px solid;border-radius: 8px;" type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /> </td>
  
  <td width="72"> RutCliente: </td>
  <td width="173"> <input style="border:grey 1px solid;border-radius: 8px; " type="text" autocomplete="off" id="buscar_usuario" name="buscar_usuario" /> </td>
  <td width="6">&nbsp;  </td>
  <td width="50"> Estado: </td>
  <td width="137">
  <select style="   font: normal .90em arial, sans-serif;
  color:  font-size:14px; #1D1D1D; border-radius: 8px;"  id = "estado1" name = "estado1">
    <option>  </option>
    <option> Pendiente </option>
    <option> En Proceso</option>
    <option> Nulo </option>
    <option> OK </option>
  </select>
  </td>
  
  <td width="8">&nbsp;  </td>
  <td width="175"><input style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; cursor:pointer; color:#000;background-color: #FA9600; height:25px;border-radius: 10px; border:#fff 1px solid;" type="submit" name = "buscar" id='buscar' value="Buscar"/> </td>
    
  </tr>
  </table>	
 </form>  
 <br />
 </center>

<table id = "informe_tomainfo" width="100%">
<thead>
<tr>
<th style="height:25px;"><center>CodigoTI</center></th>
<th><center>RutCliente</center></th>
<th><center>Obra</center></th>
<th><center>DireccionProyecto</center></th>
<th><center>Contacto</center></th>
<th><center>Fono</center></th>
<th><center>Mail</center></th>
<th><center>Puntos</center></th>
<th><center>Dias</center></th>
<th><center>Puestos</center></th>
<th><center>Estado</center></th>
</tr>
</thead>
<?php

//listado de materiales
////////////////////////////////

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);

if (isset($_GET["buscar"])) 
{
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_CLI = $_GET['buscar_usuario'];
$ES = $_GET['estado1'];




if($BUSCAR_CODIGO != "" || $BUSCAR_CLI  != "" || $ES  != "")
{








if(  $BUSCAR_CODIGO != "")
{

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM ti where CODIGO_TI = '".($BUSCAR_CODIGO)."' ";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

}else if($ES  != ""){
		
	mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM ti where ESTADO = '".$ES."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
		
}else if(   $BUSCAR_CLI  != "" ){
		
	mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM ti where RUT_CLIENTE = '".$BUSCAR_CLI."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
		
} else {

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM ti where ESTADO = 'EN PROCESO' ";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

}

 






 }
}











 if($BUSCAR_CODIGO == "" && $BUSCAR_CLI  == "" && $ES  == "")
{                   

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM ti ";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

}

 while($row = mysql_fetch_array($result))
  {

	$CODIGO_OC = $row["CODIGO_TI"];
	$RUT_CLIENTE = $row["RUT_CLIENTE"];		
	$OBRA	= $row["OBRA"];	
	$DIRECTOR_PROYECTO	= $row["DIRECTOR_PROYECTO"];	
	$CONTACTO		= $row["CONTACTO"];
	$FONO		= $row["FONO"];
	$PUNTOS		= $row["PUNTOS"];
	$MAIL		= $row["MAIL"];
	$FECHA_INGRESO		= $row["FECHA_INGRESO"];
	$FECHA_INICIO		= $row["FECHA_INICIO"];
	$FECHA_ENTREGA		= $row["FECHA_ENTREGA"];
	$DIAS		= $row["DIAS"];
	$PUESTOS		= $row["PUESTOS"];
	$ESTADO = $row["ESTADO"];
	$MENSAJE = 2;
	
	if ($contador1 == 20)
	{
echo "<tr>
<th style='height:25px;'><center>CodigoTI</center></th>
<th><center>RutCliente</center></th>
<th><center>Obra</center></th>
<th><center>DireccionProyecto</center></th>
<th><center>Contacto</center></th>
<th><center>Fono</center></th>
<th><center>Mail</center></th>
<th><center>Puntos</center></th>
<th><center>Dias</center></th>
<th><center>Puestos</center></th>
<th><center>Estado</center></th>
</tr>";
$contador1 = 0;
	}
	




	
 
		echo "<tbody><tr><td style=' width:; border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><a target='_blank' style='text-decoration:none; color:#000;' href='TiDescripcion.php?CODIGO_TI=".$CODIGO_OC."'><center> " . 
	 $CODIGO_OC . "</a></center></td>";
	  echo "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:25px;'><center><center>" . 
	    ($RUT_CLIENTE) . "</center></td>";
	 echo "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:;'><center>" . 
	    ($OBRA) . "</center></td>";	
     echo "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:;'><center>" . 
	    ($DIRECTOR_PROYECTO) . "</center></td>";
     echo "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:;'><center>" . 
	    $CONTACTO . "</center></td>";
		
		
		
		
		
		
	 echo "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:;'><center>".$FONO."</center></td>";	
		
		
		
		
		
		
	
	 echo "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:;'><center>" . 
	    $MAIL. "</center></td>";
		
     if($PUNTOS > 2.01)
	{
	echo "<td  align='right' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#090'><center>" .$PUNTOS.   "</center></td>"; 	
	}
	else if ($PUNTOS >1.01)
	{
	echo "<td  align='right' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CF3;'><center>" .$PUNTOS.   "</center></td>"; 	
	}
	else
	{
		echo "<td  align='right' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#900'><center>" .$PUNTOS.   "</center></td>";
	}
	
	
	
	
	
	 	
		
		
	echo "<td align='right' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:;'><center>" .$DIAS.   "</center></td>"; 	
	
	
	

	echo "<td  align='right' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>" .$PUESTOS.   "</center></td>"; 	

	
	
	
     echo "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>" . 
	    $ESTADO. "</center></td></tr></tbody>"; 
		
		
		
		
		
		
    $numero++;
	$contador1++;
  


  
  }


  
  
  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>

<input style="display:none; " name="esta" id="esta" value="<?php echo $ES;?>" />
<input style="display:none;"type="text" autocomplete="off" id="buscar_codigo1" name="buscar_codigo1" value="<?php echo $BUSCAR_CODIGO?>" />
<input style="display:none;" type="text" autocomplete="off" id="buscar_usuario1" name="buscar_usuario1"  value="<?php echo $BUSCAR_DESCRIPCION?>"  />

</body>
</html>