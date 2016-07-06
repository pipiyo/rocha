<?php
		$CONSULTA = (isset($_POST['consulta'])) ? trim($_POST['consulta']) : "" ;

             require_once('Conexion/Conexion.php');

            mysql_select_db($database_conn, $conn); 

$RESPUESTA = array();

$sqla = (isset($_POST['des'])) ?  "SELECT * FROM producto WHERE DESCRIPCION LIKE '".$_POST['des']."' and TEMPORADA != '2'  LIMIT 50 " : "SELECT * FROM producto WHERE CODIGO_PRODUCTO = '".$CONSULTA."' and TEMPORADA != '2' LIMIT 25 ";

$resulta = mysql_query($sqla, $conn) or die(mysql_error());

while($row = mysql_fetch_array($resulta))
  {

  $RESPUESTA[] = array( "EX" => "CODIGO EXISTE", "STOCK" => $row['STOCK_ACTUAL'], "UM" => $row['UNIDAD_DE_MEDIDA'], "PRECIO" => $row['PRECIO'], "PSD" => $row['PRECIO_SIN_DESCUENTO'],  "CANT" => "1", "DESCUENTO" => "0"  );

  }
mysql_free_result($resulta);

if (empty($RESPUESTA)) {
$RESPUESTA[] = array( "EX" => "CODIGO NO EXISTE", "CANT" => "" );
};


echo json_encode($RESPUESTA);

?>
