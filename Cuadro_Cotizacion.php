<?php require_once('Conexion/Conexion.php');
session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Cuadro Cotizacion V1.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>

  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript> 

 $(function(){
    $( "#editor" ).sortable();
    $( "#editor" ).disableSelection();
  });


$(document).ready(function(){
$("#agregarpiso").click(function(e){
if($("#piso").val().length != 0){
$("#editor").append("<tr><th colspan='5' >"+$("#piso").val()+"</th></tr>");
}
  });
  });

$(document).ready(function(){
$(".cantidad").keyup(function(e){
var sum = 0;
$(".cantidad").each(function() {
  if ($(this).val().length != 0) {
    sum = parseInt(sum) + parseInt($(this).val());
    };
});
$("#totalpaneles").text("TOTAL PANELES "+sum);
});
});

$(document).ready(function(){
$("#preview").click(function(e){
var lista = Array();
$("#editor").find('tr').each(function(i, v) {
    lista[i] = Array();
  var $indexrow = $(this).attr('id').substring(3,10);
  $(this).children().each(function(ii, vv){
if (ii == '4') {
   lista[i][ii] = $("#cantidad"+$indexrow).val(); 
   lista[i][ii+1] = $("#precio"+$indexrow).val();
}else{
 lista[i][ii] = $(this).text();
};
    }); 
});
  var indexTH = "";
  var single = false;
  var listaindex = Array();
for (var i = 0 ; i < lista.length ;  i++) 
{
single = false;
if(lista[i].length < 3){
  indexTH = lista[i][0];
  listaindex[i] = indexTH;
  single = true;
  delete lista[i][0];
}
for(var e = 0 ; e < lista[i].length ;  e++){
if (e == 0 && single === false) {
delete lista[i][0];
lista[i][0] = indexTH; 
}
};
};
lista = JSON.stringify(lista);
listaindex = JSON.stringify(listaindex);
$.ajax({
    type: "POST",
    url: 'ajax_preview_cotizacion.php',
    data: { lista: lista, index: listaindex  },
    dataType:'html',
     error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data){
window.open('cuadro_cotizacion_final.php', '_blank');
}
});
});
});

 </script>
</head>
<body>
<center>

  <h1> Cuadro Cotizacion </h1>   

  <tr>
    <td width="138"><input type="text" name = 'piso' id='piso' value=""/> </td>
 </tr>

<tr>
<td width="138"><input type="button" name = 'agregarpiso' id='agregarpiso' value='+' /> </td>
</tr>

  <table  rules="all" border="1" >

<tr>
  <th>UBICACION</th>
  <th>CODIGO</th>
  <th>DESCRIPCION</th>
  <th>MATERIAL</th>
  <th>CANTIDAD</th>
</tr>

<tr><th colspan="5" >&nbsp</th></tr>
<tbody id="editor">

<?php

$index = 0;
foreach ($_SESSION['carrito'] as $key => $value) {
echo "<tr id='row".$index."' >
<td></td>
<td>".$_SESSION['carrito'][$key]['COD']."</td>
<td>".$_SESSION['carrito'][$key]['DES']."</td>
<td>".$_SESSION['carrito'][$key]['FAM']."</td>
<td><input id='cantidad".$index."' class='cantidad' type='text' name=''  value=''/>
<input id='precio".$index."' Style='display:none;' type='text' name=''  value='".$_SESSION['carrito'][$key]['PRES']."'/></td>
</tr>";
$index++;
}

?>

</tbody>

<tr><td colspan="3" ></td>
<td colspan="2" id="totalpaneles" >TOTAL PANELES</td>
</tr>

<tr><td colspan="4" ></td>
<td width="138"><input style=""  type="button" name = 'preview' id='preview' value='OK' /> </td>
</tr>

</center>
</table>

</body>
</html>
