<?php require_once('Conexion/Conexion.php');

session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

mysql_select_db($database_conn, $conn);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>  
  <title>Lista Precio V1.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_materiales.css" />
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript> 

$(document).ready(function(){
$(".circulo").click(function(e){
if ($('circle', this).attr('fill') === 'white' ) {
$('circle', this).attr('fill', 'black');
$.ajax({
    type: "POST",
    url: 'ajax_Cuadro_Cotizacion.php',
    data: { cod: $("#cod"+$(this).attr('id').substring(3,10)+"").text() , des: $("#des"+$(this).attr('id').substring(3,10)+"").text() , pres: $("#pres"+$(this).attr('id').substring(3,10)+"").text() , fam: $("#familia"+$(this).attr('id').substring(3,10)+"").text() },
    dataType:'html',
     error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data){  
}
});
}else{
$('circle', this).attr('fill', 'white');
$.ajax({
    type: "POST",
    url: 'ajax_Cuadro_Cotizacion.php',
    data: { cod: $("#cod"+$(this).attr('id').substring(3,10)+"").text() ,  borrar: true },
    dataType:'html',
     error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data){  
}
});
};
});
});

$(document).ready(function(){
$("#limpiar").click(function(e){


$.ajax({
    type: "POST",
    url: 'ajax_Cuadro_Cotizacion.php',
    data: { del: true },
    dataType:'html',
     error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data){  
      location.reload();
}
});


});
});


$(document).ready(function(){
$("#generarcotizacion").click( function(e){
window.open('Cuadro_Cotizacion.php', '_blank');
});
});

 </script>

</head>
<body>

<div id='contenedor'>
 
<center> <h1> Lista Precio </h1>   
  <table>


<form action="" method="get" name="formulario">

  <tr>
  <td> Producto: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="producto" name="producto" /> </td>
  <td> Familia: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="familia" name="familia" /> </td>

  <td width="138"><input style=""  type="submit" name = "buscarR" id='buscar' value="Buscar"/> </td>
 </tr>

</form>


<tr>
<td width="138"><input style=""  type="button" name = 'generarcotizacion' id='generarcotizacion' value='COTIZAR' /> </td>
</tr>
<tr>
<td width="138"><input style=""  type="button" name = 'limpiar' id='limpiar' value='LIMPIAR' /> </td>
</tr>

</table>	
</center>

<table bordercolor="#ccc" id="datagrid" rules="all" cellspacing=0 cellpadding=0 style="font-size: 8pt">
<tr>
<th height='30'><center>Código</center></th>
<th><center>Descripción</center></th>
<th><center>Producto</center></th>
<th><center>Familia</center></th>
<th><center>Precio Venta</center></th>
<th><center>Carro</center></th></tr>

<?php

$query_registro = (empty($_GET['producto'])) ?   (   (empty($_GET['familia'])) ?   "SELECT CODIGO_PRODUCTO, DESCRIPCION, CATEGORIA, PRECIO, FAMILIA  FROM producto2"   :  "SELECT CODIGO_PRODUCTO, DESCRIPCION, CATEGORIA, PRECIO, FAMILIA  FROM producto2 WHERE FAMILIA = '".$_GET['familia']."' "  )  :  "SELECT CODIGO_PRODUCTO, DESCRIPCION, CATEGORIA, PRECIO, FAMILIA  FROM producto2 WHERE CODIGO_PRODUCTO = '".$_GET['producto']."' "  ;

$contador1 = 0;
$indexTD = 0;
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_assoc($result))
  {
	
	if($contador1 == 15)
	{
	echo"<tr>
<th height='30'><center>Código</center></th>
<th><center>Descripción</center></th>
<th><center>Producto</center></th>
<th><center>Familia</center></th>
<th><center>Precio Venta</center></th>
<th><center>Carro</center></th></tr>";
		$contador1 = 0;
	}

echo "<tr><td id='cod".$indexTD."' ><center>".$row['CODIGO_PRODUCTO']."</center></td>
<td id='des".$indexTD."' ><center>".$row['DESCRIPCION']."</center></td>
<td id='cat".$indexTD."' ><center>".$row['CATEGORIA']."</center></td>
<td id='familia".$indexTD."' ><center>".$row['FAMILIA']."</center></td>
<td id='pres".$indexTD."' ><center>".$row['PRECIO']."</center></td>";

if (array_key_exists($row['CODIGO_PRODUCTO'], $_SESSION['carrito'])) {
  echo "<td ><center><svg id='cir".$indexTD."' class='circulo' height='20' width='20'><circle  cx='10' cy='10' r='8' stroke='RED' stroke-width='3' fill='black' /></svg></center></td></tr>";

} else {

echo "<td><center><svg id='cir".$indexTD."' class='circulo' height='20' width='20'><circle  cx='10' cy='10' r='8' stroke='RED' stroke-width='3' fill='white' /></svg></center></td></tr>";

}


$indexTD++;
}

?>

</center>
</div>
</tr>
</table>
</body>
</html>
