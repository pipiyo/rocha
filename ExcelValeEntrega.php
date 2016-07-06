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

<table>
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

$CODIGO_VALE = $_GET['CODIGO_VALE'];
$query_registro = "SELECT * FROM vale_emision where COD_VALE = '".$CODIGO_VALE."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {  
    $CODIGO_VALE= $row["COD_VALE"];
	$FECHA = $row["FECHA"];
	$FECHA_T = $row["FECHA_TERMINO"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$ESTADO = $row["ESTADO"];
	$EMPLEADO = $row["EMPLEADO"];
	$DIFERENCIA_TOTAL = $row["DIFERENCIA_TOTAL"];
  }
  mysql_free_result($result);
  ?>
  <table rules="all" border="1">
	<tr style="">
		<td style="background:#E6E6E6" width="50">ROCHA</td>
        <td ><?php echo $CODIGO_PROYECTO?></td>
        <td style="background:#E6E6E6">DEPARTAMENTO</td>
        <td ><?php echo $DEPARTAMENTO?></td>
        <td style="background:#E6E6E6">SOLICITADO</td>
        <td><?php echo $EMPLEADO?></td>
</tr>
<tr>
        <td style="background:#E6E6E6" width="50">FECHA</td>
        <td style="background:#E6E6E6;" width="150"><?php echo $FECHA?></td>
            <td style="background:#E6E6E6" width="50">FECHA T</td>
        <td style="background:#E6E6E6;" width="150"><?php echo $FECHA_T?></td>
        
   
        <td style="background:#E6E6E6" width="100">N° VALE</td>
        <td style="background:#E6E6E6" width="150"><?php echo $CODIGO_VALE?></td>
	</tr>
		</table>
        
        
<table style="font-size:11px;" style="margin-top:10px;" rules="all" border="1" width="100%">
<tr style="background:#E6E6E6;">
<th>Codigo Producto</th>
<th>Descripcion</th>
<th>Cantidad Solicitada</th>
<th>U/M</th>
<th>Cantidad Entregada</th>
<th>Diferencia</th>
<th>Observaciones</th>
</tr>

  
  <?php
  
  
  
  
  
$query_registro3 = "select DIFERENCIA,CANTIDAD_ENTREGADA,CODIGO_PRODUCTO, OBSERVACIONES,CANTIDAD_SOLICITADA FROM producto_vale_emision where CODIGO_VALE = '".$CODIGO_VALE."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
$contador= 1;
 while($row = mysql_fetch_array($result3))
  {
	$COD_PRODUCTO = $row["CODIGO_PRODUCTO"]; 
	$OBSERVACIONES = $row["OBSERVACIONES"]; 
	$CANTIDAD_SOLICITADA = $row["CANTIDAD_SOLICITADA"];
	$CANTIDAD_ENTREGADA = $row["CANTIDAD_ENTREGADA"];
	$DIFERENCIA = $row["DIFERENCIA"];

$query_registroPRO = "select DESCRIPCION, UNIDAD_DE_MEDIDA,STOCK_ACTUAL FROM producto where CODIGO_PRODUCTO = '".$COD_PRODUCTO."'";
$resultPRO = mysql_query($query_registroPRO, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($resultPRO))
  {
	$DESCRIPCIONES= $row["DESCRIPCION"]; 
	$UNIDAD_DE_MEDIDA= $row["UNIDAD_DE_MEDIDA"]; 
	$STOCK= $row["STOCK_ACTUAL"];
  }

  	
echo "<tr><td>".$COD_PRODUCTO."</td>";	
echo "<td>".$DESCRIPCIONES."</td>";
echo "<td>".($CANTIDAD_SOLICITADA)."</td>";
echo "<td>".($UNIDAD_DE_MEDIDA)."</td>";
echo "<td>".($CANTIDAD_ENTREGADA)."</td>"; 
echo "<td>".($DIFERENCIA)."</td>"; 
echo "<td>".($OBSERVACIONES)."</td></tr>"; 
 
  }
  mysql_free_result($resultPRO);
  
  
  
  
  
	/*
	
	if($numero == 0)
	{	
    echo "<tr><td  align='left' colspan='4'><p style='color:#A4A4A4; font-size:15px;'>".$dia."</p></td></tr>";
	echo"<tr>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Rocha</center></th> 
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>N°</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Predecesor</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Proceso</center></th>
	     <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cliente</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descripcion</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha I</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha E</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>
		  <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>OC</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Observaciones</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Emisor</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Supervisor</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Ejecutor</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>Estado</center></th></tr>
		 ";
       
    }
    echo  "<tr><td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CODIGO_SERVICIO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($PREDECESOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($PROCESO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DESCRIPCION)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($FECHA_INICIO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($FECHA_ENTREGA)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DIAS)."</td>";
	echo  "<td align='center' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;background:'>".($OC)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBSERVACIONES)."</td>";
    echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($REALIZADOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($SUPERVISOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($EJECUTOR)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$ESTADO."</td></tr>";
	$numero++;
  }
  
  */

?>
</table>
</body>

</html>