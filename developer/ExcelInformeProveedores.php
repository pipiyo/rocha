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

$query_registro = "SELECT * FROM proveedor ";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$trd = '';
$cont = 1;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_PROVEEDOR = $row["CODIGO_PROVEEDOR"];
	$RUT_PROVEEDOR = $row["RUT_PROVEEDOR"];
	$NOMBRE_FANTASIA = $row["NOMBRE_FANTASIA"];
	$RAZON_SOCIAL = $row["RAZON_SOCIAL"];
	$GIRO = $row["GIRO"];
	$DIRECCION = $row["DIRECCION"];
	$COMUNA = $row["COMUNA"];
	$TELEFONO1 = $row["TELEFONO1"];
	$TELEFONO2 = $row["TELEFONO2"];
	$WEB = $row["WEB"];
	$CONTACTO1 = $row["CONTACTO1"];
	$CONTACTO2 = $row["CONTACTO2"];
	$CELULAR_CONTACTO1 = $row["CELULAR_CONTACTO1"];
	$CELULAR_CONTACTO2 = $row["CELULAR_CONTACTO2"];
	$FORMA_PAGO = $row["FORMA_PAGO"];
	$CATEGORIA = $row["CATEGORIA"];
	$FAMILIA = $row["FAMILIA"];
	$ENTREGA = $row["ENTREGA"];
								
								
   $trd.="<tr>
	<td id = 'par'><center>$CODIGO_PROVEEDOR</center></td>
	<td id = 'par'><center>$RUT_PROVEEDOR</center></td>
	<td id = 'imp'><center>$NOMBRE_FANTASIA</center></td>
	<td id = 'par'><center>$RAZON_SOCIAL</center></td>
	<td id = 'imp'><center>$GIRO</center></td>
	<td id = 'par'><center>$DIRECCION</center></td>
	<td id = 'imp'><center>$COMUNA</center></td>
    <td id = 'par'><center>$TELEFONO1</center></td>
	<td id = 'par'><center>$TELEFONO2</center></td>
	<td id = 'imp'><center>$WEB</center></td>
	<td id = 'par'><center>$CONTACTO1</center></td>
	<td id = 'imp'><center>$CONTACTO2</center></td>
	<td id = 'par'><center>$CELULAR_CONTACTO1</center></td>
	<td id = 'imp'><center>$CELULAR_CONTACTO2</center></td>
	<td id = 'par'><center>$FORMA_PAGO</center></td>
	<td id = 'imp'><center>$CATEGORIA</center></td>
	<td id = 'par'><center>$FAMILIA</center></td>
	<td id = 'imp'><center>$ENTREGA</center></td>
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
	 <tr><td><b>Proveedores</b></td></tr>
	 <tr><td><b>Periodo Informe    :</b>  " .date("MY"). "</td></tr>
	   </thead>
	  </table>
	 <br>  
     </page_header>
  
 
	<table>  
       <thead>
				<tr>
				<th><center>Codigo</center></th>
				<th><center>Rut</center></th>
				<th><center>Nombre</center></th>
				<th><center>Razon social</center></th>
				<th><center>Giro</center></th>
				<th><center>Direccion</center></th>
				<th><center>Comuna</center></th>
				<th><center>Telefono 1</center></th>
				<th><center>Telefono 2</center></th>
				<th><center>Web</center></th>
				<th><center>Contacto 1</center></th>
				<th><center>Contacto 2</center></th>
				<th><center>Celular contacto 1</center></th>
				<th><center>Celular contacto 2</center></th>
				<th><center>Gestion</center></th>
				<th><center>Forma de pago</center></th>
				<th><center>Categoria</center></th>
				<th><center>Familia</center></th>
				<th><center>Entrega</center></th>
				
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