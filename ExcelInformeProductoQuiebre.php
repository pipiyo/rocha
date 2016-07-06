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

$query_registro = "SELECT * FROM producto ";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$trd = '';
$cont = 1;

 while($row = mysql_fetch_array($result))
  {
	$DESCRIPCION = $row["DESCRIPCION"];
	$CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
	$STOCK_ACTUAL = $row["STOCK_ACTUAL"];
	$PRECIO = $row["PRECIO"];
	$UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
	$FORMATO = $row["FORMATO"];
	$GESTION = $row["GESTION"];
	$Dimension = $row["DIMENSION"];
	$STOCK_MINIMO = $row["STOCK_MINIMO"];
	$FECHA_INGRESO = $row["FECHA_INGRESO"];
	$RELACION =	$row["RELACION"];	
	$CATEGORIA = $row["CATEGORIA"];
	if($STOCK_ACTUAL < $STOCK_MINIMO)
	{								
	 $trd.="<tr>
	<td id = 'par' mso-number-format:'0'><center>&nbsp;$CODIGO_PRODUCTO</center></td>
	<td id = 'par'><center>$DESCRIPCION</center></td>
	<td id = 'imp'><center>$STOCK_ACTUAL</center></td>
	<td id = 'par'><center>$PRECIO</center></td>
	<td id = 'imp'><center>$UNIDAD_DE_MEDIDA</center></td>
	<td id = 'par'><center>$FORMATO</center></td>
	<td id = 'imp'><center>$GESTION</center></td>
	<td id = 'par'><center>$Dimension</center></td>
	<td id = 'imp'><center>$STOCK_MINIMO</center></td>
	<td id = 'par'><center>$FECHA_INGRESO</center></td>
	<td id = 'imp'><center>$RELACION</center></td>
	<td id = 'par'><center>$CATEGORIA</center></td>
    </tr>";
$cont++;
	}
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
	 <tr><td><b>Informe de Producción</b></td></tr>
	 <tr><td><b>Periodo Informe    :</b>  " .date("MY"). "</td></tr>
	   </thead>
	  </table>
	 <br>  
     </page_header>
  
 
	<table>  
       <thead>
				<tr>
				<th><center>Codigo</center></th>
				<th><center>Descripcion</center></th>
				<th><center>Stock</center></th>
				<th><center>Precio</center></th>
				<th><center>u/m</center></th>
				<th><center>Formato</center></th>
				<th><center>Gestion</center></th>
				<th><center>Dimension</center></th>
				<th><center>Stock Minimo</center></th>
				<th><center>Fecha ingreso</center></th>
				<th><center>Relacion</center></th>
				<th><center>Categoria</center></th>
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