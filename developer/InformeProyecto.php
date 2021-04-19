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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>  V1.0</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="stylesheet" type="text/css" href="Style/style_materiales_stock.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script language = javascript>
  </script>

</head>

<body>

  <div id="main">	
    
	<div id="site_content">	
	
	  <div  id="header">
        <div id="site_heading">
	  <h1>Bienvenido <?php echo  utf8_encode($nombres) ." ". utf8_encode($apellido) ?></h1>
	    </div><!--close site_heading-->
        </div><!--close header-->	  			   
  	  
	  <div id="content">   
<center>     
<div  class="content_item">	

<form>
<table align="right">
<col width='50'/>
<col width='100'/>
<col width='110'/>
<col width='100'/>
<col width='200'/>
<tr>
<td align="center">Rango</td> 
<td><center>Desde</center></td>
<td><input id="txt_desde" type="text" /></td>
<td><center>Hasta</center></td>
<td><input id="txt_hasta" type="text" /></td>
</tr>
<tr>
<td align="center">Filtro</td> 
<td align="right">Todos &nbsp;<input type="checkbox" name="todos" value="todos"></td>
<td>Programados &nbsp;<input type="checkbox" name="programados" value="programados"></td>
<td>En proceso &nbsp;<input type="checkbox" name="proceso" value="proceso"></td>
<td>Nulos &nbsp;<input type="checkbox" name="Nulos" value="Nulos"> &nbsp; Ok &nbsp;<input type="checkbox" name="ok" value="ok"></td>
</tr>
</table>
</form>
<table id = "informe_despacho" cellpadding="0" cellspacing="0"  style="font-size:9px;">
<col width='50'/>
<col width='50'/>
<col width='150'/>
<col width='110'/>
<col width='50'/>
<col width='50'/>
<col width='100'/>
<col width='50'/>
<col width='50'/>
<col width='50'/>
<col width='70'/>
<?php
mysql_select_db($database_conn, $conn);
$query_registro = "select  servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,CLIENTE.NOMBRE_CLIENTE,servicio.FECHA_ENTREGA from cliente, servicio, proyecto where cliente.rut_cliente = proyecto.RUT_CLIENTE and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO  order by servicio.FECHA_ENTREGA";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$NOMBRE_CLIENTE = utf8_encode($row["NOMBRE_CLIENTE"]);
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	if($FECHA_VARIABLE == $FECHA_ENTREGA)
	{
		$numero=1;
	}
	else
	{
		$numero = 0;
	}
	if($numero == 0)
	{	
	$FECHA_VARIABLE = $FECHA_ENTREGA;
	}
	$date = new DateTime($FECHA_ENTREGA);
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
    echo "<tr><td  align='left' colspan='4'><h2>".$dia."</h2></td></tr>";
	echo"<tr><th style='border:groove;'><center>Rocha</center></th>
         <th style='border:groove;'><center>Hoja ruta</center></th>
		 <th style='border:groove;'><center>Descripcion</center></th>
         <th style='border:groove;'><center>Direccion</center></th>
         <th style='border:groove;'><center>Guia Despacho</center></th>
         <th style='border:groove;'><center>TP/TM/FI</center></th>
         <th style='border:groove;'><center>Observaciones</center></th>
         <th style='border:groove;'><center>Emisor</center></th>
         <th style='border:groove;'><center>Supervisor</center></th>
         <th style='border:groove;'><center>Vehiculo</center></th>
         <th style='border:groove;'><center>Estado</center></th></tr>
		 ";
       
    }
    echo  "<tr><td style='border:groove;'>".$CODIGO_PROYECTO."</td>";
    echo  "<td style='border:groove;'></td>";
	echo  "<td style='border:groove;'>".$DESCRIPCION."</td>";
	echo  "<td style='border:groove;'></td>";
	echo  "<td style='border:groove;'></td>";
	echo  "<td style='border:groove;'></td>";
	echo  "<td style='border:groove;'>".$OBSERVACIONES."</td>";
    echo  "<td style='border:groove;'>".$REALIZADOR."</td>";
	echo  "<td style='border:groove;'>".$SUPERVISOR."</td>";
	echo  "<td style='border:groove;'></td>";
	echo  "<td style='border:groove;'>".$ESTADO."</td></tr>";
	$numero++;
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</div><!--close content_item-->
</center> 
      </div><!--close content-->	 	  
      </div><!--close site_content-->	
    	
  </div><!--close main-->	
</body>
</html>
