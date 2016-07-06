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

    border: 1px solid #ccc;
    padding: 5px;
	font-size: 10px !important;
    color:#646464;
}


table th {
    background-color:#016EBF;
	font-size: 10px !important;
    color:#ECECEC;
}

.num {
  mso-number-format:General;
}
.text{
  mso-number-format:"\@";/*force text*/
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

$tabla= $_POST['datos'];


$relleno = "";
$relleno2 = "";
$i=0;
mysql_select_db($database_conn, $conn);



      $relleno .= "<th><center>Codigo</center></th>
				   <th><center>Descripcion</center></th>
				   <th><center>Stock</center></th>
				   <th><center>u/m</center></th>
				   <th><center>Precio</center></th>
				   <th><center>Total</center></th>
				   <th><center>Stock Minimo</center></th>
				   <th><center>Fecha ingreso</center></th>
				   <th><center>Categoria</center></th>";
      $i=7;





$sql_filas = "SELECT * from ".$tabla." where temporada != 2";    
$result_filas= mysql_query($sql_filas, $conn) or die(mysql_error());
 while($filas = mysql_fetch_array($result_filas))
  { 
      $relleno2 .= "<tr>";
      $relleno2 .= "<td class='text' >".$filas[0]."</td>";
      $relleno2 .= "<td>".$filas[1]."</td>";
      $relleno2 .= "<td>".$filas[2]."</td>";
      $relleno2 .= "<td>".$filas[6]."</td>";
      $relleno2 .= "<td>".number_format($filas[5],0, ",", ".")."</td>";
      $relleno2 .= "<td>".number_format($filas[5] * $filas[2],0, ",", ".") ."</td>";
      $relleno2 .= "<td>".$filas[3]."</td>";
      $relleno2 .= "<td>".$filas[4]."</td>";
      $relleno2 .= "<td>".$filas[11]."</td>";
      $relleno2 .= "</tr>";

 }
    mysql_free_result($result_filas);








  $EXCEL= "
	<page> 
     <page_header>		
	 <center><b></b></center>
	 <br>
      <table>
	   <thead>
	  <tr><td><b>Muebles y Diseño </b></td></tr>
	 <tr><td><b>".$tabla."</b></td></tr>
	 <tr><td><b>Periodo Informe    :</b>  " .date("MY"). "</td></tr>
	   </thead>
	  </table>
	 <br>  
     </page_header>
  
<table>

<tr>
".$relleno." 
</tr>

".$relleno2." 


         </table>
	</page>"; 
      mysql_close($conn);       
echo $EXCEL;


     ?>
</body>
</html>


