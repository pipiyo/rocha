<!doctype html>
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
<meta charset="utf-8">
<title>Documento sin título</title>

<meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link href='http://fonts.googleapis.com/css?family=Paprika' rel='stylesheet' type='text/css' />

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
$query_registro = "SELECT * FROM  usuario";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 $trd= "";

 while($row = mysql_fetch_array($result))
  {
	$CODIGO = $row["CODIGO_USUARIO"];
	$NOMBRE = $row["NOMBRE_USUARIO"];
	$PASS = $row["PASS"];
	$TIPO = $row["TIPO_USUARIO"];
	$FECHA = $row["FECHA_INGRESO"];
	$ACTIVO = $row["ACTIVO"];
	$RUT = $row["RUT"];
	
								
    $trd.="<tr>
		<td id = 'par'><center>$CODIGO</center></td>
		<td id = 'imp'><center>".($NOMBRE)."</center></td>
		<td id = 'par'><center>$PASS</center></td>
		<td id = 'par'><center>$TIPO</center></td>
		<td id = 'imp'><center>$FECHA</center></td>
		<td id = 'par'><center>$ACTIVO</center></td>
		<td id = 'par'><center>$RUT</center></td>
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
	  <tr><td><b>Muebles y Diseno</b></td></tr>
	 <tr><td><b>Usuarios</b></td></tr>
	 <tr><td><b>Periodo Informe    :</b>  " .date("MY"). "</td></tr>
	   </thead>
	  </table>
	 <br>  
     </page_header>
  
 
	<table>  
       <thead>
				<tr>
				<th><center>Codigo</center></th>
				<th><center>Nombre</center></th>
				<th><center>clave</center></th>
				<th><center>Tipo de usuario</center></th>
				<th><center>Fecha de ingreso</center></th>
				<th><center>Activo</center></th>
				<th><center>Rut</center></th>
	
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