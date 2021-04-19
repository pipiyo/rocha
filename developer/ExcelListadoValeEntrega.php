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



$BUSCAR_CODIGO = $_GET['buscar_codigo'];	
$ES = $_GET['estado1'];
$departamento= $_GET['departamento'];
$BUSCAR_ROCHA = $_GET['buscar_rocha'];
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];



 if($BUSCAR_CODIGO != "" || $ES  != "" && $departamento == '' && $BUSCAR_ROCHA == '')
{

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * from vale_emision where COD_VALE = '".($BUSCAR_CODIGO)."' or ESTADO = '".$ES."' and  (FECHA_TERMINO between '".$txt_desde."' and '".$txt_hasta."')   ORDER BY FECHA_TERMINO asc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 1;
}

else if($departamento != '' && $ES  != "" )

{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * from vale_emision where  DEPARTAMENTO = '".$departamento."' and  ESTADO = '".$ES."'  and  (FECHA_TERMINO between '".$txt_desde."' and '".$txt_hasta."')   ORDER BY FECHA_TERMINO asc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 1;	
}

else if($departamento != '')

{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * from vale_emision where  DEPARTAMENTO = '".$departamento."'  and  (FECHA_TERMINO between '".$txt_desde."' and '".$txt_hasta."') ORDER BY FECHA_TERMINO asc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 1;	
}

else if($BUSCAR_ROCHA  != '' && $ES  != "" )

{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * from vale_emision where   CODIGO_PROYECTO = '".$BUSCAR_ROCHA."' and  ESTADO = '".$ES."'  and  (FECHA_TERMINO between '".$txt_desde."' and '".$txt_hasta."')  ORDER BY FECHA_TERMINO asc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 1;	
}


else if($BUSCAR_ROCHA != '' && $departamento == '' && $BUSCAR_CODIGO == "")
{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * from vale_emision where  CODIGO_PROYECTO = '".$BUSCAR_ROCHA."'  and  (FECHA_TERMINO between '".$txt_desde."' and '".$txt_hasta."')  ORDER BY FECHA_TERMINO asc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 1;	
}


else //// fin de la consulta

{
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM  vale_emision where  ESTADO = '".$ES."'  and  (FECHA_TERMINO between '".$txt_desde."' and '".$txt_hasta."')  ORDER BY FECHA_TERMINO asc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 1;
}

if($BUSCAR_CODIGO == "" && $ES  == "" && $departamento  == "" && $BUSCAR_ROCHA == ""   )
{                   
$query_registro = "SELECT * FROM vale_emision WHERE ESTADO = 'PENDIENTE' and  (FECHA_TERMINO between '".$txt_desde."' and '".$txt_hasta."')  ORDER BY FECHA_TERMINO asc";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
}







///////////////////////////////////////////////////////
 while($row = mysql_fetch_array($result))
  {  
    $CODIGO_VALE= $row["COD_VALE"];
	$FECHA = $row["FECHA"];
	$FECHA_T = $row["FECHA_TERMINO"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$ESTADO = $row["ESTADO"];
	$EMPLEADO = $row["EMPLEADO"];
	$DIFERENCIA_TOTAL = $row["DIFERENCIA_TOTAL"];
 

  
  
  
 
  
  echo '
  <table rules="all" border="1">
	<tr style="">
		<td style="background:#E6E6E6" width="50">ROCHA</td>
        <td >'.$CODIGO_PROYECTO.'</td>
        <td style="background:#E6E6E6">DEPARTAMENTO</td>
        <td >'. $DEPARTAMENTO.'</td>
        <td style="background:#E6E6E6">SOLICITADO</td>
        <td>'.$EMPLEADO.'</td>
</tr>
<tr>
        <td style="background:#E6E6E6" width="50">FECHA</td>
        <td style="background:#E6E6E6;" width="150">'.$FECHA.'</td>
            <td style="background:#E6E6E6" width="50">FECHA T</td>
        <td style="background:#E6E6E6;" width="150">'.$FECHA_T.'</td>
        
   
        <td style="background:#E6E6E6" width="100">N° VALE</td>
        <td style="background:#E6E6E6" width="150">'.$CODIGO_VALE.'</td>
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
';
  

  
  
  
  
  
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
  }
    mysql_free_result($result);
  mysql_free_result($resultPRO);

?>
</table>
</body>

</html>