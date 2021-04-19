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
  <title>Cuadro Cotizacion Final V1.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript> 

$(document).ready(function(){
$("#descuento").keyup(function(){
var des = ((( parseInt( ($("#subtotal").text()).replace(/\./g, '') ) )*( parseInt($("#descuento").val()) )/100).toFixed(0)).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
$("#destotal").text(""+des+"");
var des2 = ( ( parseInt($("#subtotal").text().replace(/\./g, '')) ) - ( parseInt(des.replace(/\./g, '')) ) ).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
var iva = ((( parseInt(des2.replace(/\./g, '')) )*(19)/100).toFixed(0)).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
var ivam = ( ( parseInt(des2.replace(/\./g, '')) ) - ( parseInt(iva.replace(/\./g, '')) ) ).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
$("#mostrarimpuesto").text(""+iva+"");
$("#subtotal2").text(""+des2+"");
$("#neto").text(""+des2+"");
$("#totalfinal").text(""+ivam+"");
  });
  });

$(document).ready(function(){
$("#descuento2").keyup(function(){
var des = ((( parseInt( ($("#subtotal2").text()).replace(/\./g, '') ) )*( parseInt($("#descuento2").val()) )/100).toFixed(0)).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
$("#destotal2").text(""+des+"");
var des2 = ( ( parseInt($("#subtotal2").text().replace(/\./g, '')) ) - ( parseInt(des.replace(/\./g, '')) ) ).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
$("#neto").text(""+des2+"");
var iva = ((( parseInt(des2.replace(/\./g, '')) )*(19)/100).toFixed(0)).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
var ivam = ( ( parseInt(des2.replace(/\./g, '')) ) - ( parseInt(iva.replace(/\./g, '')) ) ).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
$("#totalfinal").text(""+ivam+"");
$("#mostrarimpuesto").text(""+iva+"");
  });
  });

 </script>

</head>
<body>
<center>

  <h1> Cuadro Cotizacion Final </h1>
  <table  rules="all" border="1" >
<tr>
  <th>UBICACION</th>
  <th>CODIGO</th>
  <th>DESCRIPCION</th>
  <th>MATERIAL</th>
  <th>CANTIDAD</th>
  <th>VALOR UNITARIO</th>
  <th>VALOR TOTAL</th>
</tr>

<tr><th colspan="7" >&nbsp</th></tr>

<tbody id="editor">

<?php



$ValorTotalSumFinal = 0;

foreach ($_SESSION['cotizacion'] as $key => $value) {

$ValorTotal = "";
$ValorTotalSum = 0;
$P = false;
  
  if ($key != '0') {
  echo  "<tr><th colspan='7' >".$key."</th></tr>";
  $ValorTotal = "".$key."";
}


foreach ($_SESSION['cotizacion'][$key] as $llave => $valor) {
  
  echo "<tr>";

foreach ($_SESSION['cotizacion'][$key][$llave] as $kk => $vv) {
 
  echo "<td>".$vv."</td>";
$P = true;
}

$ValorTotalSum += $_SESSION['cotizacion'][$key][$llave][4] * $_SESSION['cotizacion'][$key][$llave][5];
echo "<td>".($_SESSION['cotizacion'][$key][$llave][4] * $_SESSION['cotizacion'][$key][$llave][5])."</td></tr>";

}

$ValorTotalSumFinal += $ValorTotalSum;

if ($P) {
  
echo "<tr><td colspan='5' ></td>
<td colspan='2' >TOTAL ".$ValorTotal." ".number_format($ValorTotalSum,0, ",", ".")."</td>
</tr>";

}

}

?>

</tbody>

<tr><td colspan="4" ></td><td>SUBTOTAL 1</td><td> </td><td id='subtotal' ><?php echo "".number_format($ValorTotalSumFinal,0, ",", ".").""; ?></td></tr>
<tr><td colspan="4" ></td><td>DESCUENTO 1</td><td> <input type="text" name = 'descuento' id='descuento' value='' /> </td><td id='destotal' > </td></tr>
<tr><td colspan="4" ></td><td>SUBTOTAL 2</td><td> </td><td id='subtotal2' > </td></tr>
<tr><td colspan="4" ></td><td>DESCUENTO 2</td><td>  <input type="text" name = 'descuento' id='descuento2' value='' />  </td><td id='destotal2' > </td></tr>
<tr><td colspan="4" ></td><td>NETO</td><td> </td><td id="neto" > </td></tr>
<tr><td colspan="4" ></td><td>IMPUESTO</td><td> 19% </td><td id="mostrarimpuesto" > </td></tr>
<tr><td colspan="4" ></td><td>TOTAL</td><td> </td><td id="totalfinal" > </td></tr>

</center>
</table>

</body>
</html>
