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
  <title>Bodega 2 V1.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_materiales.css" />
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript> 

 $(document).ready( function() {
$(".edit").dblclick( function(event){
var originalSavelo = $(this).text();
$(this).css( "maxWidth", "10px" );
$(this).html("<input style='height:"+ ( parseInt($(this).height())  ) +"px;width:"+(  parseInt($(this).width()) - 3 )+"px;' type='text' id='"+$(this).attr("class").split(' ')[1]+"' name='"+this.id+"' value='"+this.title+"' />");
$(this).children().focus();
$(this).children().keyup( function(e){
if (e.keyCode == 13) {
$.ajax({
    type: "POST",
    url: 'editar_campos.php',
    data: { 'id': this.id, 'campo': this.name, 'dato': this.value },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
}
});
$(this).parent().attr("title", this.value);
$(this).parent().html("<center>"+this.value+"</center>");
}else if (e.keyCode == 27) {
$(this).parent().html("<center>"+originalSavelo+"</center>");
}
});

$(this).children().blur( function(){
  $.ajax({
    type: "POST",
    url: 'editar_campos.php',
    data: { 'id': this.id, 'campo': this.name, 'dato': this.value },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
}
});
$(this).parent().attr("title", this.value);
$(this).parent().html("<center>"+this.value+"</center>");
});

});
});




/////////////////


$(document).ready(function(){
$("#descripcion").keyup( function(e){
$("#listades").empty().hide();
var trayectoria = $(this).offset();
if (this.value.length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_descripcion_producto2.php',
    data: { 'consulta': $(this).val() },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
if (data.length != 0) {
  for(var i=0;i<data.length; i++)
  {
    $("#listades").append("<input  class='desdes'  type = 'button'  value = '"+data[i]+"' />  ");
  }
}else{
$("#listades").empty().hide();
};
}
});
$("#listades").fadeIn("fast").css({
    left: trayectoria.left,
    top: trayectoria.top  + $(this).outerHeight(),
    });
};
});
});

$(document).ready(function(){
$(".desdes").live( "click", function(e){
$("#descripcion").val(this.value);
$("#listades").empty().hide();
});
});



/////////////



 </script>

</head>
<body>

  <div id='bread'><div id="menu1"></div></div>
<div id='contenedor'>
 
<center> <h1> Bodega 2 </h1>   
  <table>

<form action="" method="post" name="formulario">

  <tr>
  <td> Producto: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="producto" name="producto" /> </td>

  <td> Descripcion: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="descripcion" name="descripcion" /> </td>
  
  <td> Generico: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="codgen" name="codgen" /> </td>

  </tr>
  <tr>

  <td> Familia: </td>
<td><select class='textbox' autocomplete="off" id="familia" name="familia" >
<option></option>
<option>GENERICO</option>
<option>M</option>
<option>L</option>
<option>E</option>
  </select></td>



    <td> Categoria: </td>
    <td> <select class="textbox" autocomplete="off" name="categoria" id="categoria"  >
    <option></option>

<option>Superficies Curvas</option>
<option>Superficies Rectas</option>
<option>Almacenamiento</option>
<option>Cajoneras</option>
<option>Mueble De Linea</option>
<option>Partes y Piezas</option>


<option> Accesorios </option>
<option> ACTIU </option>
<option> Articulo Electrico </option>
<option> Baldosas Melamina </option>
<option> Baldosas Metalica </option>
<option> Baldosas Laminadas </option>
<option> Baldosas Tapizadas</option>
<option> Baldosas Vidrio </option>

<option> Cerraduras </option>
<option> Correderas </option>
<option> Cristales </option>
<option> Cubiertas </option>
<option> Embalaje </option>
<option> Full Space </option>
<option> Laminados </option>
<option> Maderas </option>
<option> Mantencion </option>
<option> Maquinas y Herramientas </option>

<option> Muebles Metalicos </option>
<option> Paneleria </option>

<option> Producto</option>
<option> Producto Especial</option>
<option> Quincalleria </option>
<option> Quimicos </option> 
<option> Repiceria </option>
<option> Servicios </option>
<option> Seguridad </option>
<option> Sillas </option>
<option> Soportes </option>
<option> Superficies Curvas </option>
<option> Superficies Rectas </option>
<option> Tapacantos </option>
<option> Tela </option>
<option> Tiradores </option>
<option> Tornillos </option>





  </select></td>



   <td></td>  <td width="138"><input style=""  type="submit" name = "buscarR" id='buscar' value="Buscar"/> </td>
 </tr>

</form>

</table>  
</center>

<table bordercolor="#ccc" id="datagrid" rules="all" cellspacing=0 cellpadding=0 style="font-size: 8pt">
<tr>
<th  height='30' ><center>codigo producto</center></th>
<th><center>descripcion</center></th>
<th><center>stock actual</center></th>
<th><center>stock minimo</center></th>
<th><center>fecha ingreso</center></th>
<th><center>precio</center></th>
<th><center>unidad de medida</center></th>
<th><center>formato</center></th>
<th><center>gestion</center></th>
<th><center>dimension</center></th>
<th><center>relacion</center></th>
<th><center>categoria</center></th>
<th><center>stock maximo</center></th>
<th><center>precio sin descuento</center></th>
<th><center>ruta</center></th>
<th><center>codigo generico</center></th>
<th><center>tipo</center></th>
<th><center>termino</center></th>
<th><center>deshabilitar</center></th>
<th><center>largo</center></th>
<th><center>ancho</center></th>
<th><center>alto</center></th>
<th><center>ruta1</center></th>
<th><center>ruta2</center></th>
<th><center>m3</center></th>
<th><center>familia</center></th>
<th><center>posicion</center></th>
<th><center>cad 2d</center></th>
<th><center>cad 3d</center></th>
<th><center>cuerpo</center></th>
<th><center>frente</center></th>

<?php

$query_registro = (empty($_POST['producto'])) ? (  (empty($_POST['codgen'])) ? (   (empty($_POST['descripcion'])) ?  ( (empty($_POST['familia'])) ? (  (empty($_POST['categoria'])) ? "SELECT * FROM producto2" :  "SELECT *  FROM producto2 WHERE CATEGORIA = '".$_POST['categoria']."' "  ) :  "SELECT *  FROM producto2 WHERE FAMILIA = '".$_POST['familia']."' " )  : "SELECT *  FROM producto2 WHERE DESCRIPCION = '".$_POST['descripcion']."' "    )  : "SELECT *  FROM producto2 WHERE CODIGO_GENERICO = '".$_POST['codgen']."' "  ) : "SELECT * FROM producto2 WHERE CODIGO_PRODUCTO = '".$_POST['producto']."' "  ;

$contador1 = 0;

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
<th><center>Generico</center></th>
<th><center>Precio Venta</center></th>
<th><center>Carro</center></th></tr>";
    $contador1 = 0;
  }

echo "<tr><td class='edit ".$row['CODIGO_PRODUCTO']."' id='CODIGO_PRODUCTO' title='".$row['CODIGO_PRODUCTO']."' ><center>".$row['CODIGO_PRODUCTO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='DESCRIPCION' title='".$row['DESCRIPCION']."' ><center>".$row['DESCRIPCION']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='STOCK_ACTUAL' title='".$row['STOCK_ACTUAL']."' ><center>".$row['STOCK_ACTUAL']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='STOCK_MINIMO' title='".$row['STOCK_MINIMO']."' ><center>".$row['STOCK_MINIMO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='FECHA_INGRESO' title='".$row['FECHA_INGRESO']."' ><center>".$row['FECHA_INGRESO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='PRECIO' title='".$row['PRECIO']."' ><center>".$row['PRECIO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='UNIDAD_DE_MEDIDA' title='".$row['UNIDAD_DE_MEDIDA']."' ><center>".$row['UNIDAD_DE_MEDIDA']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='FORMATO' title='".$row['FORMATO']."' ><center>".$row['FORMATO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='GESTION' title='".$row['GESTION']."' ><center>".$row['GESTION']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='DIMENSION' title='".$row['DIMENSION']."' ><center>".$row['DIMENSION']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='RELACION' title='".$row['RELACION']."' ><center>".$row['RELACION']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='CATEGORIA' title='".$row['CATEGORIA']."' ><center>".$row['CATEGORIA']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='STOCK_MAXIMO' title='".$row['STOCK_MAXIMO']."' ><center>".$row['STOCK_MAXIMO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='PRECIO_SIN_DESCUENTO' title='".$row['PRECIO_SIN_DESCUENTO']."' ><center>".$row['PRECIO_SIN_DESCUENTO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='RUTA' title='".$row['RUTA']."' ><center>".$row['RUTA']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='CODIGO_GENERICO' title='".$row['CODIGO_GENERICO']."' ><center>".$row['CODIGO_GENERICO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='TIPO' title='".$row['TIPO']."' ><center>".$row['TIPO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='TERMINO' title='".$row['TERMINO']."' ><center>".$row['TERMINO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='DESHABILITAR' title='".$row['DESHABILITAR']."' ><center>".$row['DESHABILITAR']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='LARGO' title='".$row['LARGO']."' ><center>".$row['LARGO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='ANCHO' title='".$row['ANCHO']."' ><center>".$row['ANCHO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='ALTO' title='".$row['ALTO']."' ><center>".$row['ALTO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='RUTA1' title='".$row['RUTA1']."' ><center>".$row['RUTA1']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='RUTA2' title='".$row['RUTA2']."' ><center>".$row['RUTA2']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='M3' title='".$row['M3']."' ><center>".$row['M3']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='FAMILIA' title='".$row['FAMILIA']."' ><center>".$row['FAMILIA']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='POSICION' title='".$row['POSICION']."' ><center>".$row['POSICION']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='CAD_2D' title='".$row['CAD_2D']."' ><center>".$row['CAD_2D']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='CAD_3D' title='".$row['CAD_3D']."' ><center>".$row['CAD_3D']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='CUERPO' title='".$row['CUERPO']."' ><center>".$row['CUERPO']."</center></td>
<td class='edit ".$row['CODIGO_PRODUCTO']."' id='FRENTE' title='".$row['FRENTE']."' ><center>".$row['FRENTE']."</center></td></tr>";

}

?>

</center>
</div>
</tr>

<div  id="listades"></div>
</table>

</body>
</html>
