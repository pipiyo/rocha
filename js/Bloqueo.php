<?php header("Content-type: application/javascript"); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
?>

$(document).ready(function(){

var pathname = window.location.pathname;
var dirArray = pathname.split('/');
for(var i=0;i<dirArray.length;i++)
{
var pagina = dirArray[i];
}

var caducar = <?php echo json_encode($_SESSION['NOMBRE_USUARIO']); ?>;
if (caducar.length > 0)
{
var lista = <?php echo json_encode($_SESSION['OBJETOS']); ?>;
var listasub = <?php echo json_encode($_SESSION['SUBOBJETOS']); ?>;
  for(var i=0;i<lista.length; i++)
{
if (lista[i].COD == "CUADRO RADICADO") 
{
    var abrir = "TINY.box.show({url:'generarradicado.php' , width: 300 , height:300 });";
}else if (lista[i].COD == "CUADRO ROCHA") 
{
    var abrir = "TINY.box.show({url:'generarrocha.php' , width: 300 , height:300 });";
}else if (lista[i].COD == "PRODUCTO") 
{
    var abrir = "TINY.box.show({url:'generarproducto.php',width:280,height:240});";
}else if (lista[i].COD == "PRODUCTOS GENERICOS") 
{
    var abrir = "TINY.box.show({url:'generarproducto2GEN.php',width:280,height:240});";
}else if (lista[i].COD == "CUADRO PRODUCCION") 
{
    var abrir = "TINY.box.show({url:'generarCuadroRocha.php'});";
}else if (lista[i].COD == "CUADRO DESPACHO") 
{
    var abrir = "TINY.box.show({url:'generarCuadroDespacho.php'});";
}
else if (lista[i].COD == "BODEGA DESPACHO") 
{
    var abrir = "TINY.box.show({url:'generarproducto.php',width:280,height:240});";
}
else if (lista[i].COD == "BODEGA SILLAS") 
{
    var abrir = "TINY.box.show({url:'generarproducto.php',width:280,height:240});";
}
else if (pagina  == "Home.php" ) 
{
    var abrir = "window.open('"+lista[i].PHP+"','_blank');";
}
else
{
	var abrir = "window.open('"+lista[i].PHP+"','_self');";
};


    var nuevafuncion = new Function(abrir);
    $("[id='"+lista[i].COD+"']").live( "click", nuevafuncion );
}
  for(var e=0;e<listasub.length; e++)
{
$("."+listasub[e]+"").hide(); 
}
}else{
alert("usuario no autenticado")
self.location = "index.php"
};
});