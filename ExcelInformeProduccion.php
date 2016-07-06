<?php require_once('Conexion/Conexion.php');?>
<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");
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

<html>
<head>  
<title> </title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
    background-color:blue;
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

<table id = "informe_instalacion" cellpadding="0" cellspacing="0"  style="font-size:10px; width:98%;">
<?php
function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);
mysql_select_db($database_conn, $conn);
$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$txt_desde = $_GET["txt_desde"];
$ESTADOV = $_GET["ESTADO"];
$txt_hasta = $_GET["txt_hasta"];
$VENDEDOR = $_GET["buscar_vendedor"];
$PROCESO = $_GET["PROCESO"];
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_ENTREGA';
$DESDE = $_GET["txt_desde"];
$CATEGORIA = $_GET["categoria"];
$HASTA = $_GET["txt_hasta"];
////Comienzo

    
$query_registro = "select DISTINCT 'servicio.CODIGO_SERVICIO', servicio.FECHA_PRIMERA_ENTREGA,servicio.FI, servicio.PROCESO, proyecto.DEPARTAMENTO_CREDITO, servicio.CODIGO_SERVICIO, servicio.RECLAMOS,servicio.PUESTOS,servicio.DIAS,servicio.LIDER,servicio.INSTALADOR_4,servicio.INSTALADOR_3,servicio.FECHA_REALIZACION,servicio.INSTALADOR_2,servicio.INSTALADOR_1, servicio.GUIA_DESPACHO, proyecto.NOMBRE_CLIENTE, servicio.CODIGO_SERVICIO,servicio.TPTMFI, servicio.DIRECCION, servicio.ESTADO, servicio.SUPERVISOR, servicio.REALIZADOR,servicio.OBSERVACIONES, servicio.DESCRIPCION, proyecto.CODIGO_PROYECTO,servicio.FECHA_ENTREGA,servicio.FECHA_INICIO,servicio.CODIGO_COMUNA from cliente, servicio, proyecto where cliente.rut_cliente = proyecto.RUT_CLIENTE and proyecto.CODIGO_PROYECTO = servicio.CODIGO_PROYECTO  and servicio.NOMBRE_SERVICIO = 'produccion' ";



if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
    $ejutiv="";
foreach ($equipo as $valor)
{
    $ejutiv .= ",'".$valor."'";
}

$query_registro .= " AND proyecto.ejecutivo in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") "; 
}


else if($VENDEDOR != '')
{ 
$query_registro .= " and proyecto.EJECUTIVO = '".($VENDEDOR)."' ";
}

if($BUSCAR_CODIGO != '') 
{ 
$query_registro .= " and proyecto.CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' ";
}   

if($PROCESO != '') 
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

if($ordenfecha == 'FECHA_ENTREGA')
{
$query_registro .= " and  servicio.FECHA_ENTREGA between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}else if($ordenfecha == 'FECHA_INICIO')
{
$query_registro .= " and  servicio.FECHA_INICIO between '".$txt_desde."' and '".$txt_hasta."'   order by servicio.".$ordenfecha."";
}




$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
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
    $INS1= $row["INSTALADOR_1"];
    $INS2= $row["INSTALADOR_2"];
    $FI= $row["FI"];
    $PROCESO= $row["PROCESO"];
    $INS3= $row["INSTALADOR_3"];
    $INS4= $row["INSTALADOR_4"];
    $RECLAMOS = $row["RECLAMOS"];
    $LIDER= $row["LIDER"];
    $PUESTOS = $row["PUESTOS"];
    $LINEA = $row["DEPARTAMENTO_CREDITO"];
    $DIAS = $row["DIAS"];
    $FECHA_REALIZACION = $row["FECHA_REALIZACION"];
    $FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];



/*  if($FECHA_VARIABLE == $FECHA_INICIO)
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
  //  echo " <tr><td>&nbsp; </td></tr><tr><td align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
    echo"<tr><th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:20px;'><center>Rocha</center></th>
        <th style=' width:40px; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>N°</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cliente</center></th>     
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descripcion</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Direccion</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>Comuna</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>Provincia</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'>Region</th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Observaciones</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Linea</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px;'><center><a style='color:#fff;text-decoration:none;' id='fechai' href='InformeProyectoInstalacion.php?buscarfe=INICIO&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha I</a></center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px;'><center><a style='color:#fff;text-decoration:none;' id='fechae' href='InformeProyectoInstalacion.php?buscarfe=ENTREGA&ESTADO=".$ESTADOV."&buscari=".$buscaf."&txt_desde=".$DESDE."&txt_hasta=".$HASTA."&buscar_codigo=".$BUSCAR_CODIGO."'>Fecha E</a></center></th>
        <th style=' width:30px; border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Proceso</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Lider</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>Instalador1</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>Instalador2</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>Instalador1</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>Instalador2</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;width:80px'><center>FI</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Reclamos</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Puestos</center></th>
        <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>Estado</center></th></tr>
        ";      
          $numero = 20;
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
    
    if($FECHA_REALIZACION  == date("Y-m-d"))
    {
    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:25px;background:#39C;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
    echo  "<td  style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'> <a style='color:#000;text-decoration:none;' 
        href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        </td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($DESCRIPCION)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".($DIRECCION)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".$NCOMUNA."</td>";  
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".$NREGIONE."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".$NREGION1."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".$OBSERVACIONES."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".$LINEA."</td>";
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".substr($FECHA_INICIO,0,11)."</td>";  
        if($ESTADO == "OK")
        {
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#0000FF; color: white;'>".($FECHA_ENTREGA)."</td>";
        }
        else
        {
        if($FECHA_ENTREGA > $fecha7)
        {
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'>".substr($FECHA_ENTREGA,0,11)."</td>";
        }
        else if($FECHA_ENTREGA < date('Y-m-d'))
        {
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'>".substr($FECHA_ENTREGA,0,11)."</td>";
        }
        else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
        {
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'>".substr($FECHA_ENTREGA,0,11)."</td>";        
        }
        }
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'>".$DIAS."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$PROCESO."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".($LIDER)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".($INS1)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".($INS2)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".($INS3)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".($INS4)."</td>";

    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'><center>".($RECLAMOS)."</center></td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#39C;'><center>".($PUESTOS)."</center></td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;background:#39C;'>".$ESTADO."</td></tr>";
    $numero--;
    }
    else
    {
    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;height:25px;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
    echo  "<td  style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'> <a style='color:#000;text-decoration:none;' 
        href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). ">" .$CODIGO_SERVICIO . "</a>
        </td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DESCRIPCION)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DIRECCION)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".$NCOMUNA."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".$NREGIONE."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".$NREGION1."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$OBSERVACIONES."</td>";
     echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$LINEA."</td>";
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".substr($FECHA_INICIO,0,11)."</td>";  
        if($ESTADO == "OK")
        {
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#0000FF; color: white;'>".substr($FECHA_ENTREGA,0,11)."</td>";
        }
        else
        {
        if($FECHA_ENTREGA > $fecha7)
        {
    echo  "<td  align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#3ADF00;'>".substr($FECHA_ENTREGA,0,11)."</td>";
        }
        else if($FECHA_ENTREGA < date('Y-m-d'))
        {
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#DF0101;color:#FFF;'>".substr($FECHA_ENTREGA,0,11)."</td>";
        }
        else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
        {
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:#FFFF00;'>".substr($FECHA_ENTREGA,0,11)."</td>";        
        }
        }
    echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$DIAS."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$PROCESO."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".($LIDER)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".($INS1)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".($INS2)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".($INS3)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".($INS4)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".$FI."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($RECLAMOS)."</center></td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($PUESTOS)."</center></td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;font-size:10px;'>".$ESTADO."</td></tr>";
    $numero--;
    }
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>

</html>