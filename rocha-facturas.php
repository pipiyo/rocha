<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
  mysql_select_db($database_conn, $conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title> Informe Radicado V2.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
  <!-- Calendario -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>

  <!-- Calendario -->
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<h1 class="h-facturita">Reporte Factura X Rocha </h1>

<table rules='all' frame='box'  class='rad' id="facturita-tabla">
<?php
$total = 0;
$query_registro = "SELECT * from factura where CODIGO_PROYECTO = '".$_GET["codigo"]."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());


echo"<tr><th>Numero</th>
       <th>Fecha Inicio</th>
       <th>Monto</th>       
     </tr>
       ";      
 while($row = mysql_fetch_array($result))
  {  
  $NUMERO = $row["NUMERO_FACTURA"];
  $FECHA_INICIO = $row["FECHA_INICIO"];
  $MONTO = $row["MONTO"];
  $total += $row["MONTO"];

  echo  "<tr><td align='center'>".$NUMERO . "</td>";
  echo  "<td align='center'>".$FECHA_INICIO."</td>";
  echo  "<td align='right'>".number_format($MONTO,0,",",".")."</td> </tr>";

  }
  $rochatotal = $_GET["total"];
  $dif = $total - $rochatotal;
	echo "<tr><td align='right' id='azul' colspan='2'><b>Total</b></td><td align='right' id='azul'>".number_format($total,0,",",".")."</td></tr>";
  echo "<tr><td align='right' id='azul' colspan='2'><b>Rocha</b></td><td align='right' id='azul'>".number_format($rochatotal,0,",",".")."</td></tr>";
  echo "<tr><td align='right' id='azul' colspan='2'><b>Saldo</b></td><td align='right' id='azul'>".number_format($dif,0,",",".")."</td></tr>";
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>
</body>
</html>
