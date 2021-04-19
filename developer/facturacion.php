<?php
session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

?>

<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Facturacion V1.0.0</title>
	<link rel="shortcut icon" href="Imagenes/rocha.png">
    <link rel="styleSheet" href="style/estilo-modulo.css" type="text/css" >
    <link rel="stylesheet" href="style/estilopopup-new.css" />
    <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" >
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
    <script type="text/javascript" src="js/tinybox.js"></script>
    <script src='js/Bloqueo.php'></script>
    <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
    </head>
<body>
<div id='bread'><div id="menu1"></div></div>
<div  class="contenedor">
	<a href="#"><div id="INFORME FACTURACION"  class="column2 uno-fa"><h2>FACTURACIÓN</h2></div></a>
	<a href="#"><div id="INFORME NOTA CREDITO" class="column2 uno-fa"><h2>NOTA DE CREDITO</h2></div></a>

	<a href="#"><div id="" class="column1 dos-fa"><h2></h2></div></a>
	<a href="#"><div id="" class="column1 tres-fa"><h2></h2></div></a>
	<a href="#"><div id="" class="column1 dos-fa"><h2></h2></div></a>
	<a href="#"><div id="" class="column1 tres-fa"><h2></h2></div></a>

	<a href="#"><div id="" class="column1 cuatro-fa"><h3></h3></div></a>
	<a href="#"><div id="" class="column1 cinco-fa"><h3></h3></div></a>
	<a href="#"><div id="" class="column1 cuatro-fa"><h3></h3></div></a>
	<a href="#"><div id="" class="column1 cinco-fa"   ><h3></h3></div></a>


</div>	


</body>
</html>
