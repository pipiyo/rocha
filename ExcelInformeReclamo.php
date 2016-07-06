<?php require_once('Conexion/Conexion.php');?>
<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">
<head>  
<title> </title>

<style>
body 
{
   font-family: tahoma,arial,sans-serif; 
}  

h2 
{
    color:#4E4E4E;
    font-weight:bold;
}

p 
{
    color:#666;
}

legend 
{
    color:#0168B3;
    font-family: Arial;
}

 th {
    background-color:#939;
	font-size: 10px !important;
    color:#FFF;
}

tbody tr:nth-child(2n) td, tbody tr.even td {
    background-color:#ECECEC;
}

table td {
    border: 1px solid #ECECEC;
    padding: 5px;
	font-size: 10px !important;
    color:#646464;
}

.boton 
{
    background-color:#EE3A43;
    border:0;
    color:#FFF;
    padding:5px 20px;
    cursor:pointer;
}

.boton_limpiar 
{
    background-color:#B8D45A;
    border:0;
    color:#5E7C38;
    padding:3px 10px;
    cursor:pointer;
}

.boton:hover 
{
    background-color:#769056;    
}

.boton_limpiar:hover 
{
    background-color:#C7DD7F;
}

.page {
    width: 950px;
}

.menu {
    border: 0 none;
    font-family: tahoma,arial,sans-serif;
    font-size: 12px;
}

#header #title .TituloPanelCADEM {
    font-family: tahoma,arial,sans-serif;
}

.display-label, .editor-label {
    margin: 0 0 1.5em;
}

#main {   
    float:left;
    
}

textarea.roles_textarea 
{
    width:190px;
    height:50px;
}


.borde
{
	border: 1px solid #ccc;
}
</style>

</head>

<body>
<table>

<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}


$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
$ESTADOV = $_GET["ESTADO"];


$fecha7 = dameFecha2(date('d/m/Y'),7);

mysql_select_db($database_conn, $conn);



if($ESTADOV=='TODOS')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_REALIZACION,reclamos.CODIGO_RECLAMO,servicio.NOMBRE_SERVICIO, reclamos.AREA, reclamos.RAZON, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto,reclamos where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO AND  servicio.RECLAMOS = reclamos.CODIGO_RECLAMO and servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."' order by servicio.FECHA_INICIO ";
}

else
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO',servicio.FECHA_REALIZACION,reclamos.CODIGO_RECLAMO,servicio.NOMBRE_SERVICIO, reclamos.AREA, reclamos.RAZON, servicio.DIAS,servicio.CODIGO_SERVICIO,servicio.PREDECESOR, servicio.EJECUTOR, servicio.PROCESO,servicio.FECHA_ENTREGA, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO from servicio, proyecto,reclamos where proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO AND  servicio.RECLAMOS = reclamos.CODIGO_RECLAMO and servicio.ESTADO = '".$ESTADOV."' and servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."' order by servicio.FECHA_INICIO  ";

}

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$PREDECESOR = $row["PREDECESOR"];
	$DIAS = $row["DIAS"];
	$CODIGO_RECL =  $row["CODIGO_RECLAMO"];
    $AREA_RECL =  $row["AREA"];
	$RAZON_RECL =  $row["RAZON"];
	$NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
/*	if($FECHA_VARIABLE == $FECHA_INICIO)
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
	case "12":
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
	case "0":
        $dia = "Domingo " . $date->format('d')." ".$mes;
        break;
	}*/
	if($numero == 0)
	{	
  //  echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
	echo"<tr>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;' class='nueva_tabla_bodega'><center>Rocha</center></th> 
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>N°</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Nombre Servicio</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Reclamo</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Area</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Razon</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cliente</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descripcion</center></th>
		   <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Observaciones</center></th>
		  <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center><a style='color:#fff;text-decoration:none;' id='fechai' href='InformeProyectoBodega.php?fechai=FECHA_INICIO&ESTADO=".$ESTADOV."'>Fecha I</a></center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:100px;'><center><a style='color:#fff;text-decoration:none;' id='fechae' href='InformeProyectoBodega.php?fechae=FECHA_ENTREGA&ESTADO=".$ESTADOV."'>Fecha E</a></center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>
       
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Emisor</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Supervisor</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>Estado</center></th></tr>
		 ";
       $numero = 20;
    }
	
	if($FECHA_REALIZACION  == date("Y-m-d"))
	{
    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td onclick=TINY.box.show({url:'generarDescricionServicioReclamo.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO																																																																																																																																																																																																																																																																																																																																																																																												). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "'}) style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($CODIGO_SERVICIO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($NOMBRE_SERVICIO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($CODIGO_RECL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($AREA_RECL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($RAZON_RECL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($DESCRIPCION)."</td>";
		echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($OBSERVACIONES)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($FECHA_INICIO)."</td>";
	if($FECHA_ENTREGA > $fecha7)
		{
echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'>".($FECHA_ENTREGA)."</td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'>".($FECHA_ENTREGA)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'>".($FECHA_ENTREGA)."</td>";		
		}
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($DIAS)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($REALIZADOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#CEECF5;'>".($SUPERVISOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;background:#CEECF5;'>".$ESTADO."</td></tr>";
	$numero--;
  }
  else
  {
	  echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td onclick=TINY.box.show({url:'generarDescricionServicioReclamo.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "'}) style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CODIGO_SERVICIO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_SERVICIO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CODIGO_RECL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($AREA_RECL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($RAZON_RECL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DESCRIPCION)."</td>";
		echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBSERVACIONES)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($FECHA_INICIO)."</td>";
	if($FECHA_ENTREGA > $fecha7)
		{
echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'>".($FECHA_ENTREGA)."</td>";
		}
		else if($FECHA_ENTREGA < date('Y-m-d'))
		{
echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'>".($FECHA_ENTREGA)."</td>";
		}
		else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
		{
echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'>".($FECHA_ENTREGA)."</td>";		
		}
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DIAS)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($REALIZADOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($SUPERVISOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;'>".$ESTADO."</td></tr>";
	$numero--;
  }
  }
  mysql_free_result($result);
  mysql_close($conn);
  ?>
</table>
</body>

</html>