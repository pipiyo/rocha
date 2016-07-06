<?php
require_once('Conexion/Conexion.php');

mysql_select_db($database_conn, $conn); 

$codigo =  trim($_POST['codigo']);
$valor =  trim($_POST['valor']);
$cantidad =  trim($_POST['cantidad']);
$descuento =  trim($_POST['descuento']);
  
$lista = array();


$sql =  "SELECT max(`PRECIO_LISTA_PRECIO`) AS MAYOR, max(COSTO) AS COSTO FROM producto WHERE `CODIGO_GENERICO` = '".$codigo."' and `FAMILIA` = '".$valor."' ";


$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $valor_total = $row["MAYOR"] * $cantidad;

  if($descuento != 0 && $descuento != "")
  {
  	$valor_total1 = ($valor_total * $descuento) / 100;
  	$valor_total = $valor_total - $valor_total1;
  }

  $lista[] = array( "VALORUNITARIO" => $row["MAYOR"], "VALORTOTAL" => $valor_total, "COSTO" => $row["COSTO"]);
  }
mysql_free_result($result);

echo json_encode($lista);


?>

