<?php
require_once('Conexion/Conexion.php'); 

$LISTA = json_decode($_POST['lista']);
$LISTA1 = json_decode($_POST['lista1']);
$INDEX = array_values(array_filter(json_decode($_POST['index'])));
$COTIZACION = array();
$COTIZACION[0] = array();

foreach ($INDEX as $llave => $value) {

	if ($value != '') {
	$COTIZACION[$value] =  array();
	}

};

foreach ($LISTA as $key => $value) {

if (in_array($LISTA[$key][0], $INDEX)) {
	$COTIZACION[$LISTA[$key][0]][] = $LISTA[$key];
}else if(count($LISTA[$key]) > 3){

	$COTIZACION[0][] =  $LISTA[$key];		
};

};

session_start();




$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];

mysql_select_db($database_conn, $conn);


  $LISTA1[1][1] = str_replace(".","",$LISTA1[1][1]); 
  $LISTA1[1][1] = str_replace(",",".",$LISTA1[1][1]);

  $LISTA1[2][1] = str_replace(".","",$LISTA1[2][1]); 
  $LISTA1[2][1] = str_replace(",",".",$LISTA1[2][1]);

  $LISTA1[3][1] = str_replace(".","",$LISTA1[3][1]); 
  $LISTA1[3][1] = str_replace(",",".",$LISTA1[3][1]);

  $LISTA1[4][1] = str_replace(".","",$LISTA1[4][1]); 
  $LISTA1[4][1] = str_replace(",",".",$LISTA1[4][1]);

  $LISTA1[5][1] = str_replace(".","",$LISTA1[5][1]); 
  $LISTA1[5][1] = str_replace(",",".",$LISTA1[5][1]);

  $LISTA1[6][1] = str_replace(".","",$LISTA1[6][1]); 
  $LISTA1[6][1] = str_replace(",",".",$LISTA1[6][1]);

  $LISTA1[7][1] = str_replace(".","",$LISTA1[7][1]); 
  $LISTA1[7][1] = str_replace(",",".",$LISTA1[7][1]);

$sql = "INSERT INTO cotizacion (CODIGO_RADICADO,FECHA_INGRESO,USER,NETO,DESCUENTO,SUB_TOTAL,DESCUENTO2,SUB_TOTAL2,IVA,TOTAL) values ('".$LISTA1[0][1]."','".date("Y-m-d")."','".$CODIGO_USUARIO."','".$LISTA1[1][1]."','".$LISTA1[2][1]."','".$LISTA1[3][1]."','".$LISTA1[4][1]."','".$LISTA1[5][1]."','".$LISTA1[6][1]."','".$LISTA1[7][1]."')";

$result = mysql_query($sql, $conn) or die(mysql_error());



$sqlA = "SELECT * FROM cotizacion ORDER BY CODIGO_COTIZACION DESC LIMIT 1";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
{
  $CODIGO_COT = $row["CODIGO_COTIZACION"];
}
mysql_free_result($resultA);


foreach ($COTIZACION as $key => $value)
{
	foreach ($COTIZACION[$key] as $llave => $valor) 
	{
  		$insertar = "(";
  		$contador = 0;
  		foreach ($COTIZACION[$key][$llave] as $kk => $vv) 
  		{
  			if($contador == 4 || $contador == 5 || $contador == 6 || $contador == 7 )
  			{
  				$vv = str_replace(".","",$vv); 
  				$vv = str_replace(",",".",$vv);
  			}
  			$insertar .= "'".trim($vv)."',";
  			$contador++;
  		}

  		$insertar .= "'".$CODIGO_COT."')";

  		$sql = "INSERT INTO cotizacion_producto (CANTIDAD,CODIGO_PRODUCTO,DESCRIPCION,POM,VALOR_UNITARIO,DESCUENTO,VALOR_TOTAL,COSTO,UBICACION,CODIGO_COTIZACION) VALUES " . $insertar;
  		$result = mysql_query($sql, $conn) or die(mysql_error());

  		$sql = "DELETE FROM cotizacion_producto WHERE CODIGO_COTIZACION = '".$CODIGO_COT ."' AND CODIGO_PRODUCTO = '' ";
  		$result = mysql_query($sql, $conn) or die(mysql_error());
	}
}

$_SESSION['cotizacion'] = $COTIZACION;
$_SESSION['lista1'] = $LISTA1;

?>
