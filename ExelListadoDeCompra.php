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

thead th {
    background-color:#016EBF;
	font-size: 10px !important;
    color:#ECECEC;
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
$ESTADO =  $_GET['estado'];

function dameFecha2($fecha,$dia)
{   list($day,$mon,$year) = explode('/',$fecha);
    return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));        
}

$fecha7 = dameFecha2(date('d/m/Y'),7);

if($ESTADO == "")
{
$query_registro = "SELECT  orden_de_compra.CODIGO_USUARIO , orden_de_compra.FACTURAS ,orden_de_compra.NETO,orden_de_compra.ROCHA_PROYECTO, orden_de_compra.ENVIADO, orden_de_compra.FECHA_CONFIRMACION, orden_de_compra.FECHA_ENVIO_VALIJA, orden_de_compra.CODIGO_OC,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR FROM orden_de_compra   ORDER BY orden_de_compra.CODIGO_OC desc ";
}
else
{
$query_registro = "SELECT  orden_de_compra.CODIGO_USUARIO , orden_de_compra.FACTURAS ,orden_de_compra.NETO,orden_de_compra.ROCHA_PROYECTO, orden_de_compra.ENVIADO, orden_de_compra.FECHA_CONFIRMACION, orden_de_compra.FECHA_ENVIO_VALIJA, orden_de_compra.CODIGO_OC, orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR FROM orden_de_compra where estado = '".$ESTADO."'  ORDER BY orden_de_compra.CODIGO_OC desc";	
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$trd = '';
$cont = 1;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$FECHA_REALIZACION = $row["FECHA_REALIZACION"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$DESPACHAR = $row["DESPACHAR_DIRECCION"];
	$TOTAL = $row["NETO"];
	$NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
	$ESTADO = $row["ESTADO"];
	$ENVIADO = $row["ENVIADO"];
	$ROCHA_PROYECTO = $row["ROCHA_PROYECTO"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$FECHA_ENVIOV = $row["FECHA_ENVIO_VALIJA"];
    $FACTURAS = $row["FACTURAS"];
	$COD_USER = $row["CODIGO_USUARIO"];						
					
					
$query_registroS = "SELECT NOMBRE_USUARIO FROM usuario where CODIGO_USUARIO = '".$COD_USER."'";
$resultS = mysql_query($query_registroS, $conn) or die(mysql_error());


 while($row = mysql_fetch_array($resultS))					
	{
		$nom_user = $row["NOMBRE_USUARIO"];	
	}			
	
  if($ESTADO == "OK")
    {
	$pegar = "<td style= 'background:#0000FF;color:#fff;'>$FECHA_CONFIRMACION</td>";	
    }
	else
	{	
	if($FECHA_CONFIRMACION > $fecha7)
	{
	$pegar =  "<td style= 'background:#3ADF00;color:#fff;'>$FECHA_CONFIRMACION</td>";	
    }
	else if($FECHA_CONFIRMACION < date('Y-m-d'))
	{
	$pegar = "<td style= 'background:#DF0101;color:#fff;'>$FECHA_CONFIRMACION</td>";			
	}
    else if($FECHA_CONFIRMACION >= date('Y-m-d')  and $FECHA_CONFIRMACION <= $fecha7)
    {
	$pegar =  "<td style= 'background:#FFFF00;color:#000;'>$FECHA_CONFIRMACION</td>";			
	}
	}

   $trd.="<tr>
	<td id = 'par'><center>$CODIGO_OC</center></td>
	<td id = 'imp'><center>$ROCHA_PROYECTO</center></td>
	<td id = 'par'><center>$NOMBRE_PROVEEDOR</center></td>
	<td id = 'par'><center>$FECHA_REALIZACION</center></td>
	<td id = 'imp'><center>$FECHA_ENTREGA</center></td>
	".$pegar."
		<td id = 'par'><center>$nom_user</center></td>
			<td id = 'imp'><center>".number_format($TOTAL,0, "", "")."</center></td>
				<td id = 'par'><center>$FACTURAS</center></td>

<td id = 'imp'><center>$FECHA_ENVIOV</center></td>
    

	
	
	<td id = 'imp'><center>$ESTADO</center></td>
	
	

    </tr>";
$cont++;
}
  mysql_free_result($result);
  mysql_close($conn);
  
  $content= "
	<page> 
     <page_header>		
	 <center><b></b></center>
	 <br>
      <table>
	   <thead>
	  <tr><td><b>Muebles y Diseño </b></td></tr>
	 <tr><td><b>Listado De Compra</b></td></tr>
	 <tr><td><b>Periodo Informe    :</b>  " .date("MY"). "</td></tr>
	   </thead>
	  </table>
	 <br>  
     </page_header>
  
 
	<table>  
       <thead>
				<tr>
<th><center>Nro</center></th>
<th><center>Rocha</center></th>
<th><center>Proveedor</center></th>
<th><center>Fecha realizacion</center></th>
<th><center>Fecha entrega</center></th>
<th><center>Fecha confirmacion</center></th>
<th><center>User</center></th>

<th><center>Total</center></th>
<th><center>Factura</center></th>

<th><center>Fecha Envio por valija</center></th>


<th><center>Estado</center></th>
				
			    </tr>
                </thead>
		        ".$trd." 			
    </table>      
	</page>	   	  
    ";     
echo $content;	
     ?>
</body>
</html>