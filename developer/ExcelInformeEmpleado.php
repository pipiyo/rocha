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
$query_registro = "SELECT * FROM  empleado";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 $trd= "";

 while($row = mysql_fetch_array($result))
  {
	$RUT_EMPLEADO = $row["RUT"];
	$CODIGO_EMPLEADO = $row["CODIGO_EMPLEADO"];
	$NOMBRES_EMPLEADO = $row["NOMBRES"];
	$APELLIDO_PATERNO = $row["APELLIDO_PATERNO"];
	$APELLIDO_MATERNO = $row["APELLIDO_MATERNO"];
	$DIRECCION = $row["DIRECCION"];
	$TELEFONO = $row["TELEFONO"];
	$CELULAR = $row["CELULAR"];
	$EMAIL = $row["EMAIL"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$COMUNA = $row["COMUNA"];
	$NACIONALIDAD = $row["NACIONALIDAD"];
	$CARGO = $row["CARGO"];
								
   $trd.="<tr>
	<td id = 'par'><center>$RUT_EMPLEADO</center></td>
	<td id = 'par'><center>".($NOMBRES_EMPLEADO)."</center></td>
	<td id = 'imp'><center>".($APELLIDO_PATERNO)."</center></td>
	<td id = 'par'><center>$APELLIDO_MATERNO </center></td>
	<td id = 'imp'><center>".($DIRECCION)."</center></td>
	<td id = 'par'><center>$TELEFONO </center></td>
	<td id = 'imp'><center>$CELULAR</center></td>
    <td id = 'par'><center>$EMAIL</center></td>
    <td id = 'imp'><center>".($COMUNA)."</center></td>
    <td id = 'par'><center>$CARGO</center></td>
    </tr>";
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
				<th><center>Rut</center></th>
				<th><center>Nombre</center></th>
				<th><center>Apellido p</center></th>
				<th><center>Apellido m</center></th>
				<th><center>Direccion</center></th>
				<th><center>Telefono</center></th>
				<th><center>Celular</center></th>
				<th><center>Email</center></th>
				<th><center>Comuna</center></th>
				<th><center>Cargo</center></th>		
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