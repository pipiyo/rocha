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


<?php
mysql_select_db($database_conn, $conn);

$CODIGO_RUTA = $_GET["codigo_ruta"];
$query_registro = "SELECT * FROM ruta where CODIGO_RUTA = '".$CODIGO_RUTA."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
    $CODIGO_RUTA= $row["CODIGO_RUTA"];
	$ESTADO = $row["ESTADO"];
	$FECHA = $row["FECHA"];
	$CONDUCTOR = $row["CONDUCTOR"];
    $KM_INICIO = $row["KM_INICIO"];
	$KM_FIN = $row["KM_FIN"];
	$KM_RECORRIDOS = $row["KM_RECORRIDOS"];
	$FECHA_TERMINO = $row["FECHA_TERMINO"];
	$PEONETAS = $row["PEONETAS"];
	$PEONETA2 = $row["PEONETA2"];
	$PEONETA3 = $row["PEONETA3"];
	$PEONETA4 = $row["PEONETA4"];
	$MONTO = $row["MONTO"];
	$LITRO = $row["LITRO"];
	$VALOR_LITRO = $row["VALOR_LITRO"];
	$PATENTE = $row["PATENTE"];
	$COMBUSTIBLE = $row["COMBUSTIBLE"];
  }

?>
<table  style="margin-top:10px;" rules="all" border="1" width="100%" >
  <tr>
    <td width="70" style=" background:#E6E6E6;">Ruta</td>
    <td width="92" style=" background:#E6E6E6;">Fecha Inicio</td>
    <td width="106" style=" background:#E6E6E6;">Fecha Termino</td>
    <td width="76" style=" background:#E6E6E6;">Vehiculo</td>
    <td width="87" style=" background:#E6E6E6;">Conductor</td>
    <td width="124"><?php echo $CONDUCTOR ?></td>
    <td width="128" style=" background:#E6E6E6;">KM Inicio</td>
    <td width="128"><?php echo  $KM_INICIO?></td>
    <td width="69" style=" background:#E6E6E6;">Km Fin</td>
    <td width="106"><?php echo  $KM_FIN?></td>
    <td width="95" style=" background:#E6E6E6;">Km Recorridos</td>
    <td width="93"><?php echo  $KM_RECORRIDOS?></td>
  </tr>
  <tr>
    <td rowspan="2" ><?php echo $CODIGO_RUTA?></td>
    <td rowspan="2"><?php echo $FECHA?></td>
    <td rowspan="2"><?php echo $FECHA_TERMINO?></td>
    <td rowspan="2"><?php echo $PATENTE ?></td>
    <td style=" background:#E6E6E6;">Combustible</td>
    <td><?php echo $COMBUSTIBLE; ?></td>
    <td style=" background:#E6E6E6;">Monto combustible</td>
    <td><?php echo $MONTO?></td>
    <td style=" background:#E6E6E6;">Litros</td>
    <td><?php echo $LITRO?></td>
    <td style=" background:#E6E6E6;">Valor Litro</td>
    <td><?php echo $VALOR_LITRO?></td>
  </tr>
  <tr>
    <td style=" background:#E6E6E6;">Auxiliar</td>
    <td><?php echo $PEONETA2 ?></td>
    <td style=" background:#E6E6E6;">Auxiliar2</td>
    <td><?php echo $PEONETA2 ?></td>
    <td style=" background:#E6E6E6;">Auxiliar3</td>
    <td><?php echo $PEONETA3 ?></td>
    <td style=" background:#E6E6E6;">Auxiliar4</td>
    <td><?php echo $PEONETA4 ?></td>
  </tr>
  </table>


<br />

<table>

<?php
$query_registro = "select * FROM servicio_ruta where CODIGO_RUTA = '".$CODIGO_RUTA."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {  
  
  $CODIGO_SERVICIO = $row["CODIGO_SERVICIO"];
  
 $query_registro1 = "select * FROM servicio where CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";
 $result1 = mysql_query($query_registro1, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {  
  
   $GUIA = $row["GUIA_DESPACHO"];
	$TPTMFI = $row["TPTMFI"];
	$DIRECCION = $row["DIRECCION"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$OBSERVACIONES = $row["OBSERVACIONES"];
	$REALIZADOR = $row["REALIZADOR"];
	$SUPERVISOR = $row["SUPERVISOR"];
	$ESTADO = $row["ESTADO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$RECLAMOS = $row["RECLAMOS"];
  }

if($numero == 0)
{	
	echo"<tr><th width='36' height='30'>Codigo Proyecto</th>
<th width='1O0' height='30'>Direccion</th>
<th width='90' height='30'>Guia</th>
<th width='70' height='30'>TP/TM/FI</th>
<th width='70' height='30'>Reclamo</th>
<th width='100' height='30'>Observaciones</th>
<th width='200' height='30'>Estado</th></tr>
		 "; 
    }
	
    echo "<tr><td>". $CODIGO_PROYECTO . "</td>";	
echo "<td>".($DIRECCION)."</td>";
echo "<td>".($GUIA)."</td>";
echo "<td>".($TPTMFI)."</td>";
echo "<td>".($RECLAMOS)."</td>";
echo "<td>".$OBSERVACIONES."</td>";
echo "<td>".$ESTADO."</td></tr>";

 
  $numero++;
  }
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>

<br />
<table>
<tr>
<td>Emision: Fabian Godoy/ Jefe Centro Logistico </td>
<tr>
</table>

</body>

</html>