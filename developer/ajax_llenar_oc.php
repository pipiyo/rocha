<?php





if (isset($_POST['consulta'])) {
	


		$LISTA = " IN(";

             require_once('Conexion/Conexion.php');

            mysql_select_db($database_conn, $conn); 

$lugar = array();

foreach ($_POST['consulta'] as $key => $value) {

	$LISTA .= "'".$value."',";

}

$LISTA = substr( $LISTA , 0, -1);

$LISTA .= ")";

$RESPUESTA = array();

$sqla =  "SELECT * FROM producto WHERE CODIGO_PRODUCTO ".$LISTA." ";

$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  
  {

  $RESPUESTA[] = array( "EX" => "CODIGO EXISTE", "DES" => $row['DESCRIPCION'], "STOCK" => $row['STOCK_ACTUAL'], "UM" => $row['UNIDAD_DE_MEDIDA'], "PRECIO" => $row['PRECIO'], "PSD" => $row['PRECIO_SIN_DESCUENTO'],  "CANT" => "1", "DESCUENTO" => "0", "LUGAR" => $row['CODIGO_PRODUCTO'] );

  }

mysql_free_result($resulta);

echo json_encode($RESPUESTA);


}





?>
