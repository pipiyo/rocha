<?php
session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado =)")
self.location = "index.php"
</script>';
}

?>

<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Abastecimiento V2.1.0</title>
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
	<a href="#"><div id="INFORME ACTIVIDAD"  class="column2 uno-a"><h2> INFORME CUMPLIMIENTO</h2></div></a>
	<a href="#"><div id="INFORME ABASTECIMIENTO" class="column2 uno-a"><h2> PROGRAMA ACTIVIDADES ADQUISICIONES</h2></div></a>

	<a href="#"><div id="MOVIMIENTO BODEGA" class="column1 dos-a"><h2>MOVIMIENTO BODEGAS</h2></div></a>
	<a href="#"><div id="INFORME BODEGA" class="column1 tres-a"><h2>PROGRAMA ACTIVIDADES BODEGA INSUMOS</h2></div></a>
	<a href="#"><div id="ORDEN DE COMPRAS" class="column1 dos-a"><h2>EMISION OC</h2></div></a>
	<a href="#"><div id="LISTADO DE COMPRAS" class="column1 tres-a"><h2>LISTADO OC</h2></div></a>

	<a href="#"><div id="PROVEEDOR" class="column1 cuatro-a"><h3>LISTADO PROVEEDORES</h3></div></a>
	<a href="#"><div id="INFORME CLIENTE COMPRA" class="column1 cinco-a"><h3>INFORME CLIENTE COMPRA</h3></div></a>
	<a href="#"><div id="INFORME OC" class="column1 cuatro-a"><h3>RECEPCION OC</h3></div></a>
	<a href="#"><div id="PRODUCTO" class="column1 cinco-a"   ><h3>BODEGA</h3></div></a>

	<a href="#"><div id="RANKING PROVEEDORES" class="column1 seis-a"><h3> RANKING DE PROVEEDORES</h3></div></a>
	<a href="#"><div id="RANKING PRODUCTOS" class="column1 siete-a"><h3>RANKING DE PRODUCTOS</h3></div></a>
	<a href="#"><div id="VALE EMISION" class="column1 seis-a"><h3>EMISION VALE MATERIALES</h3></div></a>
	<a href="#"><div id="LISTADO VALE EMISION" class="column1 siete-a"><h3>LISTADO VALE MATERIALES</h3></div></a>

	<a href="#"><div id="INFORME PROVEEDOR COMPRA" class="column1 ocho-a"><h3>INFORME PROVEEDOR COMPRA</h3></div></a>
	<a href="#"><div id="PRODUCTOS GENERICOS" class="column1 nueve-a"><h3>PRODUCTO 2 (PROXIMAMENTE)</h3></div></a>
	<a href="#"><div id="" class="column1 ocho-a"> <h3></h3></div></a>
	<a href="#"><div id="" class="column1 nueve-a"><h3></h3></div></a>
</div>	


</body>
</html>
