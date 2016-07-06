<?php require_once('Conexion/Conexion.php');  ?>
<?php
//Hola chicos
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
	<title>Home V2.0.0</title>
	<link rel="shortcut icon" href="Imagenes/rocha.png">

	
	<link rel="styleSheet" href="style/estilo.css" type="text/css" >
    <link rel="stylesheet" href="style/estilopopup-new.css" type="text/css">
	<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" >
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
	<script type="text/javascript" src="js/tinybox.js"></script>

	<script src='js/Bloqueo.php'></script>
	<link rel="styleSheet" href="style/bread.css" type="text/css" >
	<script type="text/javascript">

$(document).ready(function(){
$("#user").click(function(){
$("#option").css({display: ""});
});
});
$(document).mouseup(function (e)
{
var container = $("#option");
if (!container.is(e.target) && container.has(e.target).length === 0)
{
container.hide();
}
});
$(document).ready(function(){
$("#cambioclave").click(function(e){
TINY.box.show({url:'generarperfil.php', width: 500 , height:450  });
$("#option").css("display", "none");
});
});


$(document).ready(function(){
$("#buscar_filtro_rocha").live("click" ,function(e){
if ($('#light').is(':checked')) 
{
$('#form_filtro_proyecto').get(0).setAttribute('action', 'proyectoslight.php');	
}else{
$('#form_filtro_proyecto').get(0).setAttribute('action', 'proyectos.php');	
}
$('#form_filtro_proyecto').submit();
});
});




	</script>
	</head>
<body>


<div class="contenedor">
	<div class="column2 radicados" id="CUADRO RADICADO"  ><h2> RADICADOS</h2></div>
	<div class="column2 rocha" id="CUADRO ROCHA" ><h2> ROCHAS :)</h2></div>

	<a href="#"><div class="column1 abastecimiento"  id="MODULO ABASTECIMIENTO" ><h2> ABASTECIMIENTO</h2></div></a>
	<a href="#"><div class="column1 produccion"  id="MODULO PRODUCCION"  ><h2> PRODUCCIÓN</h2></div></a>
	<a href="#"><div class="column1 despacho" id="MODULO DESPACHO" ><h3> DESPACHO</h3></div></a>
	<a href="#"><div class="column1 instalaciones" id="MODULO INSTALACION" ><h2> INSTALACIONES</h2></div></a>

	<a href="#"><div class="column1 mantencion" id="INFORME MANTENCION" ><h2> MANTECION</h2></div></a>
	<a href="#"><div class="column1 reclamo" id="INFORME RECLAMOS" ><h2> RECLAMOS</h2></div></a>
	<a href="#"><div class="column1 rrhh" id="" ><h2> RRHH</h2></div></a>
	<a href="#"><div class="column1 st" id="INFORME SERVICIO TECNICO" ><h2> SERVICIO TECNICO</h2></div></a>

	<a href="#"><div class="column1 comercial" id="MODULO COMERCIAL" ><h2> COMERCIAL</h2></div></a>
	<a href="#"><div class="column1 desarrollo" id="MODULO DESARROLLO" ><h2> DESARROLLO</h2></div></a>
	<a href="#"><div class="column1 sillas" id="MODULO SILLAS"  ><h2> SILLAS</h2></div></a>
	<a href="#"><div class="column1 gerencia" id="MODULO GERENCIA" ><h3> GERENCIA</h3></div></a>

	<a href="#"><div class="column1 sistema" id="MODULO SISTEMA" ><h2> SISTEMA</h2></div></a>
	<a href="#"><div class="column1 prevencion" id="INFORME PREVENCION" ><h2> PREVENCIÓN</h2></div></a>
	<a href="#"><div class="column1 dam" id="" ><h2>DAM</h2></div></a>
	<a href="#"><div class="column1 radicados" id="MODULO FACTURACION" ><h2>ADMINISTRACIÓN</h2></div></a>

        <div style="float:right;" >
<a  id = 'cerrar' href="desconectar_usuario.php" ><IMG SRC="Imagenes/cerrar.png"></a>
</div>
    <div style="float:left;">
<a onClick="TINY.box.show({url:'generarperfil.php'})"><IMG SRC="Imagenes/USER.png"></a></div>
</div>	
</body>
</html>
