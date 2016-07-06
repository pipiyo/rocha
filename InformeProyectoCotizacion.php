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

$BUSCAR_CODIGO ='';
$INEN = "";
$DESDE = "";
$HASTA = "";
$ESTADOV = (empty($_GET["ESTADO"]))  ?  " ESTADO = 'EN PROCESO' "  :  "   ESTADO  = '".$_GET["ESTADO"]."' " ;

$ESTADOV = ($_GET["ESTADO"] == "TODOS" )  ?    " NOT ESTADO = '' "    :    $ESTADOV   ;

$txt_desde = '0000-00-00';
$txt_hasta = '2050-11-29';
$buscaf = "ENTREGA";
$ordenfecha = 'FECHA_INICIO';
if (isset($_GET["buscar"])) 
{    

$BUSCAR_CODIGO = $_GET["buscar_codigo"];

$txt_desde =  (empty($_GET["txt_desde"])) ? $txt_desde : $_GET["txt_desde"];
$txt_hasta =  (empty($_GET["txt_hasta"])) ? $txt_hasta : $_GET["txt_hasta"];

$DESDE = (empty($_GET["txt_desde"])) ? $txt_desde  : $_GET["txt_desde"];
$HASTA = (empty($_GET["txt_hasta"])) ?   $txt_hasta   :    $_GET["txt_hasta"];

$buscaf = ($_GET["buscarfe"] == "Inicio" ) ?   "INICIO"    :    $buscaf    ;

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
  <title>Informe Cotizacion V1.0.0</title>
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
     $('.tabla-cotizacion').tablesorter(); 
  });
  </script>

</head>

<body>
<div  id='header-radicado-rocha'> 
	<div id='bread'><div id="menu1"></div></div>
<div id='contenedor-ins' class="formulario-informes">

<form action="" method="get">
	<h1>Informe Cotización </h1>
	<table  id = "formulario">
	<tr>
		<td><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" value="" /></td>
		<td><input Placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" value="" /></td>
		<td>
			<select  class="textbox" onchange="" id = "buscarfe" name = "buscarfe">
				<option value="Entrega">Fecha</option>
    			<option>Entrega</option>
    			<option>Inicio</option>
  			</select>
  		</td>
		<?php 
			$INICIO1 = "";
			$ENTREGA1 = "";
			if($INEN == "INICIO")
			{
				$INICIO1 = 'selected';
			}
			else if($INEN == "ENTREGA")
			{
				$ENTREGA1 = 'selected';
			}
		?>
		<td><input placeholder="Rocha"  class="textbox"  type="text" id="buscar_codigo" name="buscar_codigo" value="<?php echo $BUSCAR_CODIGO;?>"  ></td>
		<?php 
			$TODOS1 = "";
			$PROCESO1 = "";
			$NULO1 = "";
			$OK1 = "";

			if($ESTADOV == "TODOS")
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
		?>

		<td>
  			<select class="textbox"  onchange="" id = "ESTADO" name = "ESTADO">
    			<option><?php echo $_GET["ESTADO"];?></option>
    			<option <?php echo $TODOS1;?> >TODOS</option>
    			<option <?php echo $PROCESO1;?>>EN PROCESO</option>
    			<option <?php echo $NULO1;?>>NULO</option>
    			<option <?php echo $OK1;?>>OK</option>
  			</select>
  		</td>
	</tr> 

	<tr>
		
		<td colspan="4"></td>
  		

		<td> <input type="submit" class="boton" id="buscar" name = "buscar" value = "Buscar" /> </td>
	</tr>
	</table>
</div>
</div>


<table class="tabla-cotizacion fixed">
<?php

/* Parte 1 */

function dameFecha2($fecha,$dia)
{   
list($day,$mon,$year) = explode('/',$fecha);
return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);

/* Parte 2*/

mysql_select_db($database_conn, $conn);


if (in_array("9", $_SESSION['GRUPOS'])) {	
$SUBORDINADOS = array() ;
$query_registroo = "   SELECT NOMBRES,APELLIDO_PATERNO,APELLIDO_MATERNO FROM  empleado where  RUT  = ( SELECT RUT FROM usuario where CODIGO_USUARIO = '".$_SESSION['CODIGO_USUARIO']."'  )  ";
$resulto = mysql_query($query_registroo, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulto))
{  
	$SUBORDINADOS[] = "".$row['NOMBRES']." ".$row['APELLIDO_PATERNO']." ".$row['APELLIDO_MATERNO']."";
}
  mysql_free_result($resulto);
$query_registroo = "   SELECT NOMBRES,APELLIDO_PATERNO,APELLIDO_MATERNO FROM  empleado where  RUT  IN  ( SELECT RUT_SUB FROM equipo WHERE RUT_LIDER = ( SELECT RUT FROM usuario where CODIGO_USUARIO = '".$_SESSION['CODIGO_USUARIO']."'  ) ) ";
$resulto = mysql_query($query_registroo, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($resulto))
  {  
$SUBORDINADOS[] = "".$row['NOMBRES']." ".$row['APELLIDO_PATERNO']." ".$row['APELLIDO_MATERNO']."";
  }
  mysql_free_result($resulto);
$consulta = "";
foreach ($SUBORDINADOS as $key => $value) {
	$consulta .= " '".$value."'," ;
}
$consulta =  substr($consulta, 0, -1);
$query_registro =    "SELECT * FROM servicio WHERE CODIGO_RADICADO IN (    SELECT CODIGO_RADICADO FROM radicado WHERE EJECUTIVO IN(".$consulta.")    )   AND  ".$ESTADOV." AND  NOMBRE_SERVICIO =  'Cotizacion'  AND  FECHA_".$buscaf." between '".$txt_desde."' and '".$txt_hasta."' " ;	
$query_registro = ( empty($_GET["buscar_codigo"]) ) ?   "SELECT * FROM servicio WHERE  CODIGO_RADICADO IN (    SELECT CODIGO_RADICADO FROM radicado WHERE EJECUTIVO IN(".$consulta.")    ) AND  ".$ESTADOV."  AND  NOMBRE_SERVICIO =  'Cotizacion' and  FECHA_".$buscaf." between '".$txt_desde."' and '".$txt_hasta."'  "   :   "SELECT * FROM servicio WHERE CODIGO_RADICADO = '".$_GET['buscar_codigo']."' AND  ".$ESTADOV."   AND  NOMBRE_SERVICIO =  'Cotizacion' and  FECHA_".$buscaf." between '".$txt_desde."' and '".$txt_hasta."'  "
  ;	
} else {

$query_registro =    "SELECT * FROM servicio WHERE NOT CODIGO_RADICADO = '' AND  ".$ESTADOV." AND  NOMBRE_SERVICIO =  'Cotizacion'  AND  FECHA_".$buscaf." between '".$txt_desde."' and '".$txt_hasta."' " ;	
$query_registro = ( empty($_GET["buscar_codigo"]) ) ?   "SELECT * FROM servicio WHERE NOT CODIGO_RADICADO = '' AND  ".$ESTADOV."  AND  NOMBRE_SERVICIO =  'Cotizacion' and  FECHA_".$buscaf." between '".$txt_desde."' and '".$txt_hasta."'  "   :   "SELECT * FROM servicio WHERE CODIGO_RADICADO = '".$_GET['buscar_codigo']."' AND  ".$ESTADOV."   AND  NOMBRE_SERVICIO =  'Cotizacion' and  FECHA_".$buscaf." between '".$txt_desde."' and '".$txt_hasta."'  "
  ;	

};

/* Parte 3*/

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$FECHA_VARIABLE ="";
 while($row = mysql_fetch_array($result))
  {  
	$CODIGO_PROYECTO = $row["CODIGO_RADICADO"];
	$CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
	$DIRECCION = $row["DIRECCION"];
	$FECHA_INICIO = $row["FECHA_INICIO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$PREDECESOR = $row["PREDECESOR"];
	$DIAS = $row["DIAS"];
	$NOMBRE_SERVICIO = $row["NOMBRE_SERVICIO"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];

	if($numero == 0)
	{	
	echo"
		<thead>
			<tr>
	    		<th>Radicado</th> 
				<th>N°</th>
				<th>Nombre Servicio</th>
				<th>Descripcion</th>
				<th>Observaciones</th>
				<th>Fecha I</th>
				<th>Fecha E</th>
				<th>Dias</th>
        		<th>Responsable</th>
        		<th>Estado</th>
        	</tr>
        </thead><tbody>
		 ";
    }
	
	if($FECHA_REALIZACION  == date("Y-m-d"))
	{
    echo  "<tr><td id='hoy'> <a id='cod_ser' target='_blank' href=DescripcionRadicado.php?txt_codigo_proyecto2=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td id='hoy'>  <a href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=Cotizacion>" .$CODIGO_SERVICIO . "</a></td>";
	echo  "<td id='hoy'>".($NOMBRE_SERVICIO)."</td>";
	echo  "<td id='hoy'>".($DESCRIPCION)."</td>";
	echo  "<td id='hoy'>".($OBSERVACIONES)."</td>";
	echo  "<td id='hoy'>".substr($FECHA_ENTREGA,0,11)."</td>";
	if($FECHA_ENTREGA > $fecha7)
	{
		echo  "<td id='verde'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA < date('Y-m-d'))
	{
		echo  "<td id='rojo'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
	{
		echo  "<td id='amarillo'>".substr($FECHA_ENTREGA,0,11)."</td>";		
	}
	echo  "<td id='hoy'>".($DIAS)."</td>";

	echo  "<td id='hoy'>".($SUPERVISOR)."</td>";
	echo  "<td id='hoy'>".$ESTADO."</td></tr>";
	$numero--;
  }
  else
  {
	echo  "<tr><td> <a id='cod_ser' target='_blank' href=DescripcionRadicado.php?txt_codigo_proyecto2=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";  
	echo  "<td><a href=DescripcionServicioRadicado.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=Cotizacion>" .$CODIGO_SERVICIO . "</a></td>";
	echo  "<td>".$NOMBRE_SERVICIO."</td>";
	echo  "<td>".($DESCRIPCION)."</td>";
	echo  "<td>".($OBSERVACIONES)."</td>";
	echo  "<td>".substr($FECHA_ENTREGA,0,11)."</td>";
	if($FECHA_ENTREGA > $fecha7)
	{
		echo  "<td id='verde'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA < date('Y-m-d'))
	{
		echo  "<td id='rojo'>".substr($FECHA_ENTREGA,0,11)."</td>";
	}
	else if($FECHA_ENTREGA >= date('Y-m-d')  and $FECHA_ENTREGA <= $fecha7)
	{
		echo  "<td id='amarillo'>".substr($FECHA_ENTREGA,0,11)."</td>";		
	}
	echo  "<td >".($DIAS)."</td>";

	echo  "<td>".($SUPERVISOR)."</td>";
	echo  "<td>".$ESTADO."</td></tr>";
	$numero--;
  }
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</tbody>
</table>





<div  id="listaradicados"></div>





</body>
</html>
