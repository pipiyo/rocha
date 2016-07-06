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

$query_registro = "SELECT * FROM proyecto ";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$trd = '';
$cont = 1;

 while($row = mysql_fetch_array($result))
  {
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$OBRA = $row["OBRA"];
	$FECHA_INGRESO = $row["FECHA_INGRESO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$ESTADO = $row["ESTADO"];
	$DIAS = $row["DIAS"];
	$SUB_TOTAL = $row["SUB_TOTAL"];
	$DESCUENTO = $row["DESCUENTO"];
	$MONTO= $row["MONTO"];
	$EJECUTIVO= $row["EJECUTIVO"];
	$CONTACTO= $row["CONTACTO"];
	$ESTADO= $row["ESTADO"];
	$MAIL= $row["MAIL"];
								
								
   $trd.="<tr>
	<td id = 'par'><center>$NOMBRE_CLIENTE</center></td>
	<td id = 'par'><center>$CODIGO_PROYECTO</center></td>
	<td id = 'imp'><center>$OBRA</center></td>
	<td id = 'par'><center>$FECHA_INGRESO</center></td>
	<td id = 'imp'><center>$FECHA_ENTREGA</center></td>
	<td id = 'imp'><center>$FECHA_CONFIRMACION</center></td>
	<td id = 'par'><center>$DIAS</center></td>
	<td id = 'par'><center></center></td>
	<td id = 'par'><center>$SUB_TOTAL</center></td>
	<td id = 'par'><center>$DESCUENTO </center></td>
	<td id = 'par'><center>$MONTO</center></td>
	<td id = 'par'><center></center></td>
	<td id = 'par'><center>$EJECUTIVO</center></td>
	<td id = 'par'><center>$CONTACTO</center></td>
	<td id = 'par'><center>$MAIL</center></td>
	<td id = 'par'><center>$ESTADO</center></td>
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
	  <tr><td><b>Muebles y Diseño</b></td></tr>
	 <tr><td><b>Informe Rocha</b></td></tr>
	 <tr><td><b>Periodo Informe    :</b>  " .date("MY"). "</td></tr>
	   </thead>
	  </table>
	 <br>  
     </page_header>
  
 
	<table>  
       <thead>
				<tr>
				<th><center>Cliente</center></th>
				<th><center>Rocha</center></th>
				<th><center>Obra</center></th>
				<th><center>Fecha Ingreso</center></th>
				<th><center>Fecha Entrega</center></th>
				<th><center>Fecha Confirmacion</center></th>
				<th><center>Dias</center></th>
				<th><center>US$</center></th>
				<th><center>Sub total</center></th>
				<th><center>Descuento</center></th>
				<th><center>Neto</center></th>
				<th><center>Linea</center></th>
				<th><center>Director</center></th>
				<th><center>Contacto</center></th>
				<th><center>Mail</center></th>
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