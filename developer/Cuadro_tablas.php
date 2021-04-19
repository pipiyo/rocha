<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
ini_set('max_execution_time', 900);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Cuadro Tablas  V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link href='http://fonts.googleapis.com/css?family=Paprika' rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_rocha.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />

  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="jquery.bpopup-x.x.x.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <link rel="stylesheet" href="style/estilopopup.css" />
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
      <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
  
  <script language = javascript>
  
  
$(document).ready(function() {
     $(".tablas").click(function(event) {


     $("#datos").val($(this).val());
   

      $("#FormularioExportacion").submit();
});
}); 
    
  </script>

</head>

<body>
  <div id='bread'><div id="menu1"></div></div>
<center>


<h1>Cuadro Tablas</h1>
<table>
<tr>



</tr>
</table>

<table>

 <form action="Excel_Cuadro_Tablas.php" method="post" target="_blank" id="FormularioExportacion">

<input  type="hidden" id="datos" name="datos" />

</form>




<?php 

mysql_select_db($database_conn, $conn);


$sql_tablas = "SHOW TABLES";	
$result_tablas= mysql_query($sql_tablas, $conn) or die(mysql_error());
 while($Tablas = mysql_fetch_array($result_tablas))
  {	


echo '<tr>';

     
echo '<td><input Style="width:200px;" class="tablas" type="button" value="'.$Tablas[0].'"  ></td>';

     

echo '</tr>';

  }



	mysql_free_result($result_tablas);
  mysql_close($conn);
?>




</table>



</body>
</html>
