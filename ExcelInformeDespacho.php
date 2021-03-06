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
    background-color:#FC0;
	font-size: 10px !important;
    color:#black;
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
mysql_select_db($database_conn, $conn);

$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
$ESTADOV = $_GET["ESTADO"];

if($ESTADOV=='TODOS')
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO', servicio.PREDECESOR,servicio.TRANSPORTE, servicio.CODIGO_SERVICIO, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO,servicio.FECHA_ENTREGA ,servicio.FECHA_PRIMERA_ENTREGA ,servicio.CODIGO_COMUNA,proyecto.MONTO  from cliente, servicio, proyecto where cliente.rut_cliente = proyecto.RUT_CLIENTE and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.NOMBRE_SERVICIO = 'Despacho' and servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."' order by servicio.FECHA_INICIO";
}
else
{
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO', servicio.PREDECESOR ,servicio.TRANSPORTE ,servicio.FECHA_PRIMERA_ENTREGA ,servicio.FECHA_ENTREGA,servicio.CODIGO_SERVICIO, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO, servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_INICIO,servicio.CODIGO_COMUNA,proyecto.MONTO   from cliente, servicio, proyecto where cliente.rut_cliente = proyecto.RUT_CLIENTE and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO and servicio.ESTADO in ('EN PROCESO', 'EN RUTA') and servicio.NOMBRE_SERVICIO = 'Despacho' and servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."' order by servicio.FECHA_INICIO";
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$GUIA = $row["GUIA_DESPACHO"];
    $TRANSPORTE = $row["TRANSPORTE"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
    $CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$PREDECESOR = $row["PREDECESOR"];
	$TPTMFI = $row["TPTMFI"];
    $CODIGO_COMUNA = $row["CODIGO_COMUNA"];
	$DIRECCION = $row["DIRECCION"];
	$NOMBRE_CLIENTE = ($row["NOMBRE_CLIENTE"]);
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
    $MONTO = $row["MONTO"];
    $monto1 += $MONTO;
	if($FECHA_VARIABLE == $FECHA_INICIO)
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

    $NCOMUNA = "";
$NREGIONE = "";
$NREGION1 = "";
$query_registro1 = "SELECT comunas.NOMBRE_COMUNA,regiones.REGIONES  FROM comunas,regiones WHERE regiones.CODIGO_REGIONES = comunas.CODIGO_REGIONES and comunas.CODIGO_COMUNA  ='".$CODIGO_COMUNA."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
    $NCOMUNA= $row["NOMBRE_COMUNA"];
    $NREGIONE= $row["REGIONES"];
  }
mysql_free_result($result1);


$query_registro1 = "SELECT comunas.NOMBRE_COMUNA,region_1.NOMBRE FROM comunas,region_1 WHERE region_1.CODIGO= comunas.CODIGO_REGION1 and comunas.CODIGO_COMUNA  ='".$CODIGO_COMUNA."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
    $NREGION1= $row["NOMBRE"];
  }
 mysql_free_result($result1); 

 $CONDUCTOR = "";
$query_registro1 = "SELECT ruta.CONDUCTOR FROM ruta, servicio, servicio_ruta WHERE ruta.CODIGO_RUTA = servicio_ruta.CODIGO_RUTA AND servicio_ruta.CODIGO_SERVICIO = servicio.CODIGO_SERVICIO AND SERVICIO.CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
    $CONDUCTOR = $row["CONDUCTOR"];
  }
 mysql_free_result($result1); 



	if($numero == 0)
	{	
         echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
	     echo"<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Rocha</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>N�</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Hoja ruta</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cliente</center></th>   
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Monto</center></th>    
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descripcion</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Direccion</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>Comuna</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>Provincia</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'>Region</th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Guia Despacho</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>TP/TM/FI</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha Inicio</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha Entrega</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha Confirmacion</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Observaciones</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Vehiculo</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Conductor</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>Estado</center></th></tr>
		 ";
       
    }
    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CODIGO_SERVICIO)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".number_format($MONTO,0,',','.')."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DESCRIPCION)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DIRECCION)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".$NCOMUNA."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".$NREGIONE."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".$NREGION1."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$GUIA."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$TPTMFI."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($FECHA_ENTREGA)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($FECHA_INICIO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$FECHA_PRIMERA_ENTREGA."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBSERVACIONES)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid; border-bottom: #E4E4E7 1px solid;'>".$TRANSPORTE ."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid; border-bottom: #E4E4E7 1px solid;'>".$CONDUCTOR."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$ESTADO."</td></tr>";
	$numero++;
  }
  
  
  mysql_free_result($result);

?>
<tr>
    <td colspan="4"></td>
    <th><?php echo number_format($monto1,0,",",".");?></th>
</tr>
<?php   mysql_close($conn);?>
</table>
</body>

</html>